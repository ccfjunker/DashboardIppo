<?php

namespace App\Services;

use App\Http\Requests\FiltroDashboardEmpresaRequest;
use App\Models\Dashboard\Anamnese;
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

        $colaboradores = FuncionarioService::buscaLista($request);
        $colaboradoresAnamnese = FuncionarioService::buscaListaAnamnese($request);
        $colaboradoresEngajados = FuncionarioService::buscaListaEngajados($request);

        $data['saude_cronica'] = $this->generateArrayDataChartSaudeCronica($anamneses);
        $data['saude_mental'] = $this->generateArrayDataChartSaudeMental($anamneses);
        $data['saude_alimentar'] = $this->generateArrayDataChartSaudeAlimentar($anamneses);
        $data['atividade_fisica'] = $this->generateArrayDataChartAtividadeFisica($anamneses);
        $data['colaboradores'] = $this->generateArrayDataChartColaboradores($colaboradores, $colaboradoresAnamnese, $colaboradoresEngajados);

        return $data;
    }





    private function generateArrayDataChartSaudeCronica($anamneses): array
    {
        $data = array();
        foreach(Parametro::OPCOES_SAUDE_CRONICA as $opcao){
            $data['opcoes'][$opcao] = 0;
        }
        $data['totais']['indicaram'] = 0;
        $data['totais']['nao_indicaram'] = 0;

        foreach($anamneses as $anamnese){
            $arrayOpcao = json_decode($anamnese->cronicos);
            if($arrayOpcao && !empty($arrayOpcao)){
                foreach ($arrayOpcao as $opcao){
                    $data['opcoes'][$opcao] ++;
                }
                $data['totais']['indicaram'] ++;
            }else{
                $data['totais']['nao_indicaram'] ++;
            }


        }

        return $data;
    }

    private function generateArrayDataChartSaudeMental($anamneses): array
    {
        $data = array();
        foreach(Parametro::OPCOES_SAUDE_MENTAL as $opcao){
            $data['opcoes'][$opcao] = 0;
        }
        $data['totais']['indicaram'] = 0;
        $data['totais']['nao_indicaram'] = 0;

        foreach($anamneses as $anamnese){
            $arrayOpcao = json_decode($anamnese->mental);
            if($arrayOpcao && !empty($arrayOpcao)){
                foreach ($arrayOpcao as $opcao){
                    $data['opcoes'][$opcao] ++;
                }
                $data['totais']['indicaram'] ++;
            }else{
                $data['totais']['nao_indicaram'] ++;
            }


        }

        return $data;
    }

    private function generateArrayDataChartSaudeAlimentar($anamneses): array
    {
        $data = array();
        foreach(Parametro::OPCOES_SAUDE_ALIMENTAR as $opcao){
            $data['opcoes'][$opcao] = 0;
        }
        $data['totais']['indicaram'] = 0;
        $data['totais']['nao_indicaram'] = 0;

        foreach($anamneses as $anamnese){
            $arrayOpcao = json_decode($anamnese->alimentacao);
            if($arrayOpcao && !empty($arrayOpcao)){
                foreach ($arrayOpcao as $opcao){
                    $data['opcoes'][$opcao] ++;
                }
                $data['totais']['indicaram'] ++;
            }else{
                $data['totais']['nao_indicaram'] ++;
            }


        }

        return $data;
    }

    private function generateArrayDataChartAtividadeFisica($anamneses){
        $data = array();
        foreach(Parametro::OPCOES_ATIVIDADE_FISICA as $opcao){
            $data['opcoes'][$opcao] = 0;
        }
        $data['totais']['indicaram'] = 0;
        $data['totais']['nao_indicaram'] = 0;

        foreach($anamneses as $anamnese){
            $arrayOpcao = json_decode($anamnese->fisico);
            if($arrayOpcao && !empty($arrayOpcao)){
                foreach ($arrayOpcao as $opcao){
                    $data['opcoes'][$opcao] ++;
                }
                $data['totais']['indicaram'] ++;
            }else{
                $data['totais']['nao_indicaram'] ++;
            }


        }

        return $data;
    }

    public function getFilteredsAnamneses(FiltroDashboardEmpresaRequest $request){
        $anamneses = Anamnese::whereNotNull('data_criacao');
        if(!isUserAdmin()){
            $anamneses->where('id_empresa', auth()->user()->empresas[0]->id);
        }else{
            if($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))){
                $anamneses->where('id_empresa', $request->input('selectEmpresa'));
            }
        }

        if($request->has('inputDataInicial') && !empty($request->input('inputDataInicial')) && $request->has('inputDataFinal') && !empty($request->input('inputDataFinal'))){
            $anamneses->whereBetween(DB::raw('DATE(data_atualizacao)'), [dateDB($request->input('inputDataInicial')), dateDB($request->input('inputDataFinal'))]);
        }

        if($request->has('selectTrabalho') && !empty($request->input('selectTrabalho'))){
            $anamneses->whereHas('funcionario', function ($query) use ($request) {
                return $query->where('trabalho', $request->input('selectTrabalho'));
            })->get();
        }

        if($request->has('selectSexo') && !empty($request->input('selectSexo'))){
            $anamneses->whereHas('funcionario', function ($query) use ($request) {
                return $query->where('genero', $request->input('selectSexo'));
            })->get();
        }

        if($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))){
            $anamneses->where('id_empresa', $request->input('selectEmpresa'));
        }



        return $anamneses->get();
    }

    private function generateArrayDataChartColaboradores($colaboradores, $colaboradoresAnamnese, $colaboradoresEngajados){
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
