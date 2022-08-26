<?php

namespace App\Services;

use App\Http\Requests\FiltroDashboardEmpresaRequest;
use App\Models\Dashboard\Anamnese;
use App\Util\Parametro;

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

        $colaboradores = $this->getListaFuncionarios($request);

        $data['saude_cronica'] = $this->generateArrayDataChartSaudeCronica($anamneses);
        $data['saude_mental'] = $this->generateArrayDataChartSaudeMental($anamneses);
        $data['saude_alimentar'] = $this->generateArrayDataChartSaudeAlimentar($anamneses);
        $data['atividade_fisica'] = $this->generateArrayDataChartAtividadeFisica($anamneses);
        $data['colaboradores'] = $this->generateArrayDataChartColaboradores($colaboradores);

        return $data;
    }

    public function getListaFuncionarios(FiltroDashboardEmpresaRequest $request){
        if(!isUserAdmin()){
            return FuncionarioService::buscaLista(auth()->user()->empresas[0]->id);
        }else{
            if($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))){
                return FuncionarioService::buscaLista($request->input('selectEmpresa'));
            }else{
                return FuncionarioService::buscaLista();
            }
        }

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
            $anamneses->whereBetween('data_atualizacao', [$request->input('inputDataInicial'), $request->input('inputDataFinal')]);
        }

        if($request->has('selectTrabalho') && !empty($request->input('selectTrabalho'))){
            $anamneses->whereHas('funcionario', function ($query) use ($request) {
                return $query->where('trabalho', $request->input('selectTrabalho'));
            })->get();
        }

        if($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))){
            $anamneses->where('id_empresa', $request->input('selectEmpresa'));
        }



        return $anamneses->get();
    }

    private function generateArrayDataChartColaboradores($colaboradores){
        $data = array();
        $data['cadastrados_total']['s'] = count($colaboradores);
        $data['cadastrados_total']['n'] = 0;
        $data['cadastrados_engajamento']['s'] = count($colaboradores);
        $data['cadastrados_engajamento']['n'] = 0;
        $data['lista_cadastro'] = $colaboradores;

        return $data;
    }
}
