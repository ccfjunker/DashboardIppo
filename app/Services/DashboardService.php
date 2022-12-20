<?php

namespace App\Services;

use App\Http\Requests\FiltroDashboardEmpresaRequest;
use App\Models\Dashboard\Anamnese;
use App\Models\Dashboard\Felling;
use App\Util\Parametro;
use Illuminate\Support\Facades\DB;

class DashboardService
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  FiltroDashboardEmpresaRequest  $request
     */
    public function getDataFilteredForTheCharts(FiltroDashboardEmpresaRequest $request): array
    {
        $data = array();

        $anamneses = $this->getFilteredsAnamneses($request);
        $fellings = $this->getFilteredFelling($request);
        $colaboradores = FuncionarioService::buscaLista($request);
        $colaboradoresAnamnese = FuncionarioService::buscaListaAnamnese($request);
        $colaboradoresEngajados = FuncionarioService::buscaListaEngajados($request);

        $data['saude_cronica'] = $this->generateArrayDataChartSaudeCronica($anamneses);
        $data['saude_mental'] = $this->generateArrayDataChartSaudeMental($anamneses);
        $data['saude_alimentar'] = $this->generateArrayDataChartSaudeAlimentar($anamneses);
        $data['atividade_fisica'] = $this->generateArrayDataChartAtividadeFisica($anamneses);
        $data['colaboradores'] = $this->generateArrayDataChartColaboradores($colaboradores, $colaboradoresAnamnese, $colaboradoresEngajados);
        $data['fellings'] = $fellings;

        return $data;
    }





    private function generateArrayDataChartSaudeCronica($anamneses): array
    {
        $data = array();
        foreach (Parametro::OPCOES_SAUDE_CRONICA as $opcao) {
            $data['opcoes'][$opcao] = 0;
        }
        $data['totais']['indicaram'] = 0;
        $data['totais']['nao_indicaram'] = 0;

        foreach ($anamneses as $anamnese) {
            $arrayOpcao = json_decode($anamnese->cronicos);
            if ($arrayOpcao && !empty($arrayOpcao)) {
                foreach ($arrayOpcao as $opcao) {
                    $data['opcoes'][$opcao]++;
                    // FIXME: write in a better way
                    if ($opcao == "Não possuo doenças crônicas") {
                        $data['totais']['indicaram']--;
                        $data['totais']['nao_indicaram']++;
                    }
                }
                $data['totais']['indicaram']++;
            } else {
                $data['totais']['nao_indicaram']++;
            }
        }

        return $data;
    }

    private function generateArrayDataChartSaudeMental($anamneses): array
    {
        $data = array();
        foreach (Parametro::OPCOES_SAUDE_MENTAL as $opcao) {
            $data['opcoes'][$opcao] = 0;
        }
        $data['totais']['indicaram'] = 0;
        $data['totais']['nao_indicaram'] = 0;

        foreach ($anamneses as $anamnese) {
            $arrayOpcao = json_decode($anamnese->mental);
            if ($arrayOpcao && !empty($arrayOpcao)) {
                foreach ($arrayOpcao as $opcao) {
                    $data['opcoes'][$opcao]++;
                    // FIXME: write in a better way
                    if ($opcao == "Não tive ou não tenho essa necessidade") {
                        $data['totais']['indicaram']--;
                        $data['totais']['nao_indicaram']++;
                    }
                }
                $data['totais']['indicaram']++;
            } else {
                $data['totais']['nao_indicaram']++;
            }
        }

        return $data;
    }

    private function generateArrayDataChartSaudeAlimentar($anamneses): array
    {
        $data = array();
        foreach (Parametro::OPCOES_SAUDE_ALIMENTAR as $opcao) {
            $data['opcoes'][$opcao] = 0;
        }
        $data['totais']['indicaram'] = 0;
        $data['totais']['nao_indicaram'] = 0;

        foreach ($anamneses as $anamnese) {
            $arrayOpcao = json_decode($anamnese->alimentacao);
            if ($arrayOpcao && !empty($arrayOpcao)) {
                foreach ($arrayOpcao as $opcao) {
                    $data['opcoes'][$opcao]++;
                    // FIXME: write in a better way
                    if ($opcao == "Balanceada") {
                        $data['totais']['indicaram']--;
                        $data['totais']['nao_indicaram']++;
                    }
                }
                $data['totais']['indicaram']++;
            } else {
                $data['totais']['nao_indicaram']++;
            }
        }

        return $data;
    }

    private function generateArrayDataChartAtividadeFisica($anamneses)
    {
        $data = array();
        foreach (Parametro::OPCOES_ATIVIDADE_FISICA as $opcao) {
            $data['opcoes'][$opcao] = 0;
        }
        $data['totais']['indicaram'] = 0;
        $data['totais']['nao_indicaram'] = 0;

        foreach ($anamneses as $anamnese) {
            $arrayOpcao = json_decode($anamnese->fisico);
            if ($arrayOpcao && !empty($arrayOpcao)) {
                foreach ($arrayOpcao as $opcao) {
                    $data['opcoes'][$opcao]++;
                    // FIXME: write in a better way
                    if ($opcao == "Não faço exercícios") {
                        $data['totais']['indicaram']--;
                        $data['totais']['nao_indicaram']++;
                    }
                }
                $data['totais']['indicaram']++;
            } else {
                $data['totais']['nao_indicaram']++;
            }
        }

        return $data;
    }

    public function getFilteredsAnamneses(FiltroDashboardEmpresaRequest $request)
    {
        $anamneses = Anamnese::whereNotNull('created_at');
        if (!isUserAdmin()) {
            $anamneses->where('id_empresa', auth()->user()->empresas[0]->id);
        } else {
            if ($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))) {
                $anamneses->where('id_empresa', $request->input('selectEmpresa'));
            }
        }

        if ($request->has('inputDataInicial') && !empty($request->input('inputDataInicial')) && $request->has('inputDataFinal') && !empty($request->input('inputDataFinal'))) {
            $anamneses->whereBetween(DB::raw('DATE(data_atualizacao)'), [dateDB($request->input('inputDataInicial')), dateDB($request->input('inputDataFinal'))]);
        }

        if ($request->has('selectIdade') && !empty($request->input('selectIdade'))) {
            $anamneses->whereHas('funcionario', function ($query) use ($request) {
                $first_age = explode("-", $request->input('selectIdade'))[0];
                $second_age = explode("-", $request->input('selectIdade'))[1];
                if ($first_age) {
                    $first_date = date('d-m-Y', strtotime('-' . $first_age . ' years'));
                    $day1 = explode("-", $first_date)[0];
                    $month1 = explode("-", $first_date)[1];
                    $year1 = explode("-", $first_date)[2];
                }
                if ($second_age) {
                    $second_date = date('d-m-Y', strtotime('-' . $second_age . ' years'));
                    $day2 = explode("-", $second_date)[0];
                    $month2 = explode("-", $second_date)[1];
                    $year2 = explode("-", $second_date)[2];
                }

                return $first_age && $second_age
                    ? ($query->where('data_nascimento', '<', $year1 . '-' . $month1 . '-' . $day1)
                        ->where('data_nascimento', '>=', $year2 . '-' . $month2 . '-' . $day2))
                    : ($first_age ? $query->where('data_nascimento', '<', $year1 . '-' . $month1 . '-' . $day1)
                        : $query->where('data_nascimento', '>=', $year2 . '-' . $month2 . '-' . $day2));
            })->get();
        }

        if ($request->has('selectTrabalho') && !empty($request->input('selectTrabalho'))) {
            $anamneses->whereHas('funcionario', function ($query) use ($request) {
                return $query->where('trabalho', $request->input('selectTrabalho'));
            })->get();
        }

        if ($request->has('selectSexo') && !empty($request->input('selectSexo'))) {
            $anamneses->whereHas('funcionario', function ($query) use ($request) {
                return $query->where('genero', $request->input('selectSexo'));
            })->get();
        }

        if ($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))) {
            $anamneses->where('id_empresa', $request->input('selectEmpresa'));
        }



        return $anamneses->get();
    }

    public function getFilteredFelling(FiltroDashboardEmpresaRequest $request)
    {
        // Consulta com o banco
        $fellings = Felling::whereNotNull('data_criacao');

        // Filtros
        if (!isUserAdmin()) {
            $fellings->where('id_empresa', auth()->user()->empresas[0]->id);
        } else {
            if ($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))) {
                $fellings->where('id_empresa', $request->input('selectEmpresa'));
            }
        }

        // TO DO, Alter this, insert on Table
        if ($request->has('inputDataInicial') && !empty($request->input('inputDataInicial')) && $request->has('inputDataFinal') && !empty($request->input('inputDataFinal'))) {
            $fellings->whereBetween(DB::raw('DATE(data_atualizacao)'), [dateDB($request->input('inputDataInicial')), dateDB($request->input('inputDataFinal'))]);
        }

        if ($request->has('selectIdade') && !empty($request->input('selectIdade'))) {
            $fellings->whereHas('funcionario', function ($query) use ($request) {
                $first_age = explode("-", $request->input('selectIdade'))[0];
                $second_age = explode("-", $request->input('selectIdade'))[1];
                if ($first_age) {
                    $first_date = date('d-m-Y', strtotime('-' . $first_age . ' years'));
                    $day1 = explode("-", $first_date)[0];
                    $month1 = explode("-", $first_date)[1];
                    $year1 = explode("-", $first_date)[2];
                }
                if ($second_age) {
                    $second_date = date('d-m-Y', strtotime('-' . $second_age . ' years'));
                    $day2 = explode("-", $second_date)[0];
                    $month2 = explode("-", $second_date)[1];
                    $year2 = explode("-", $second_date)[2];
                }

                return $first_age && $second_age
                    ? ($query->where('data_nascimento', '<', $year1 . '-' . $month1 . '-' . $day1)
                        ->where('data_nascimento', '>=', $year2 . '-' . $month2 . '-' . $day2))
                    : ($first_age ? $query->where('data_nascimento', '<', $year1 . '-' . $month1 . '-' . $day1)
                        : $query->where('data_nascimento', '>=', $year2 . '-' . $month2 . '-' . $day2));
            })->get();
        }

        if ($request->has('selectTrabalho') && !empty($request->input('selectTrabalho'))) {
            $fellings->whereHas('funcionario', function ($query) use ($request) {
                return $query->where('trabalho', $request->input('selectTrabalho'));
            })->get();
        }

        if ($request->has('selectSexo') && !empty($request->input('selectSexo'))) {
            $fellings->whereHas('funcionario', function ($query) use ($request) {
                return $query->where('genero', $request->input('selectSexo'));
            })->get();
        }

        if ($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))) {
            $fellings->where('id_empresa', $request->input('selectEmpresa'));
        }
        $qualidade_de_alimentacao = clone $fellings;
        $nivel_de_estresse = clone $fellings;
        $qualidade_do_sono = clone $fellings;
        $nivel_de_ansiedade = clone $fellings;
        $nivel_de_humor = clone $fellings;

        $qualidade_de_alimentacao->select('label', 'data_criacao', 'nivel')->where('label', 'Qualidade de alimentação')->orderBy('data_criacao')->get()->groupBy('data_criacao');
        $nivel_de_estresse->select('label', 'data_criacao', 'nivel')->where('label', 'Nível de estresse')->orderBy('data_criacao')->get()->groupBy('data_criacao');
        $qualidade_do_sono->select('label', 'data_criacao', 'nivel')->where('label', 'Qualidade de Sono')->orderBy('data_criacao')->get()->groupBy('data_criacao');
        $nivel_de_ansiedade->select('label', 'data_criacao', 'nivel')->where('label', 'Nível de ansiedade')->orderBy('data_criacao')->get()->groupBy('data_criacao');
        $nivel_de_humor->select('label', 'data_criacao', 'nivel')->where('label', 'Nível de humor')->orderBy('data_criacao')->get()->groupBy('data_criacao');

        $newFellings = array();
        array_push($newFellings, $qualidade_de_alimentacao->get());
        array_push($newFellings, $nivel_de_estresse->get());
        array_push($newFellings, $qualidade_do_sono->get());
        array_push($newFellings, $nivel_de_ansiedade->get());
        array_push($newFellings, $nivel_de_humor->get());

        return $newFellings;
    }

    private function generateArrayDataChartColaboradores($colaboradores, $colaboradoresAnamnese, $colaboradoresEngajados)
    {
        $colaboradoresTotal = count($colaboradores);
        $colaboradoresTotalAnamnese = count($colaboradoresAnamnese);
        $colaboradoresTotalEngajados = count($colaboradoresEngajados);

        $data = array();
        $data['cadastrados_total']['s'] = $colaboradoresTotalAnamnese;
        $data['cadastrados_total']['n'] = $colaboradoresTotal;
        $data['cadastrados_engajamento']['s'] = $colaboradoresTotalEngajados;
        $data['cadastrados_engajamento']['n'] = $colaboradoresTotalAnamnese;
        $data['lista_cadastro'] = $colaboradores;

        return $data;
    }
}
