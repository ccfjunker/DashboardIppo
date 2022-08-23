<?php

namespace App\Services\Admin;

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

        $data['saude_cronica'] = $this->generateArrayDataChartSaudeCronica($anamneses);
        $data['saude_mental'] = $this->generateArrayDataChartSaudeMental($anamneses);
        $data['saude_alimentar'] = $this->generateArrayDataChartSaudeAlimentar($anamneses);
        $data['atividade_fisica'] = $this->generateArrayDataChartAtividadeFisica($anamneses);

        return $data;
    }

    private function generateArrayDataChartSaudeCronica($anamneses): array
    {
        $data = array();
        foreach(Parametro::OPCOES_SAUDE_CRONICA as $opcao){
            $data[$opcao] = 0;
        }

        foreach($anamneses as $anamnese){
            $arrayOpcao = json_decode($anamnese->cronicos);
            if($arrayOpcao){
                foreach ($arrayOpcao as $opcao){
                    $data[$opcao] ++;
                }
            }

        }

        return $data;
    }

    private function generateArrayDataChartSaudeMental($anamneses): array
    {
        $data = array();
        foreach(Parametro::OPCOES_SAUDE_MENTAL as $opcao){
            $data[$opcao] = 0;
        }

        foreach($anamneses as $anamnese){
            $arrayOpcao = json_decode($anamnese->mental);
            if($arrayOpcao){
                foreach ($arrayOpcao as $opcao){
                    $data[$opcao] ++;
                }
            }

        }

        return $data;
    }



    private function generateArrayDataChartSaudeAlimentar($anamneses): array
    {
        $data = array();
        foreach(Parametro::OPCOES_SAUDE_ALIMENTAR as $opcao){
            $data[$opcao] = 0;
        }

        foreach($anamneses as $anamnese){
            $arrayOpcao = json_decode($anamnese->alimentacao);
            if($arrayOpcao){
                foreach ($arrayOpcao as $opcao){
                    $data[$opcao] ++;
                }
            }

        }

        return $data;
    }
    private function generateArrayDataChartAtividadeFisica($anamneses){
        $data = array();
        foreach(Parametro::OPCOES_ATIVIDADE_FISICA as $opcao){
            $data[$opcao] = 0;
        }

        foreach($anamneses as $anamnese){
            $arrayOpcao = json_decode($anamnese->fisico);
            if($arrayOpcao){
                foreach ($arrayOpcao as $opcao){
                    $data[$opcao] ++;
                }
            }

        }

        return $data;
    }

    public function getFilteredsAnamneses(FiltroDashboardEmpresaRequest $request){
        $anamneses = Anamnese::whereNotNull('data_criacao');
        if($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))){
            $anamneses->where('id_empresa', $request->input('selectEmpresa'));
        }

        if($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))){
            $anamneses->where('id_empresa', $request->input('selectEmpresa'));
        }

        if($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))){
            $anamneses->where('id_empresa', $request->input('selectEmpresa'));
        }

        if($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))){
            $anamneses->where('id_empresa', $request->input('selectEmpresa'));
        }

        return $anamneses->get();
    }

}
