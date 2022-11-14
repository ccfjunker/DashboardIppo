<?php

namespace App\Services;

// use App\Http\Requests\FiltroDashboardEmpresaRequest;
// use App\Http\Requests\FuncionarioRequest;
// use App\Models\Pessoa\Funcionario;

use App\Http\Requests\FellingRequest;
use App\Models\Dashboard\Felling;
use Log;

class FellingService
{
    public static function insereArray(array $fellingArray)
    {
        $response = array();

        $funcionario = FuncionarioService::findByCPF($fellingArray['cpf']);
        try {
            if ($funcionario) {
                $id_funcionario = $funcionario->id;
                $id_empresa = $funcionario->id_empresa;
                $array_fellings = [
                    'id_empresa' => $id_empresa,
                    'id_funcionario' => $id_funcionario,
                    'cpf' => $fellingArray['cpf'],
                    'label' => '',
                    'nivel' => '',
                ];
                $criou = false;
                if (array_key_exists('qualidade_de_alimentacao', $fellingArray) && $fellingArray['qualidade_de_alimentacao']) {
                    $array_fellings['label'] = "Qualidade de alimentação";
                    $array_fellings['nivel'] = $fellingArray['qualidade_de_alimentacao'];
                    Felling::create($array_fellings);
                    $criou = true;
                }
                if (array_key_exists('nivel_de_estresse', $fellingArray) && $fellingArray['nivel_de_estresse']) {
                    $array_fellings['label'] = "Nível de estresse";
                    $array_fellings['nivel'] = $fellingArray['nivel_de_estresse'];
                    Felling::create($array_fellings);
                    $criou = true;
                }
                if (array_key_exists('qualidade_de_sono', $fellingArray) && $fellingArray['qualidade_de_sono']) {
                    $array_fellings['label'] = "Qualidade de Sono";
                    $array_fellings['nivel'] = $fellingArray['qualidade_de_sono'];
                    Felling::create($array_fellings);
                    $criou = true;
                }
                if (array_key_exists('nivel_de_ansiedade', $fellingArray) && $fellingArray['nivel_de_ansiedade']) {
                    $array_fellings['label'] = "Nível de ansiedade";
                    $array_fellings['nivel'] = $fellingArray['nivel_de_ansiedade'];
                    Felling::create($array_fellings);
                    $criou = true;
                }
                if (array_key_exists('nivel_de_humor', $fellingArray) && $fellingArray['nivel_de_humor']) {
                    $array_fellings['label'] = "Nível de humor";
                    $array_fellings['nivel'] = $fellingArray['nivel_de_humor'];
                    Felling::create($array_fellings);
                    $criou = true;
                }
                if ($criou == true) {
                    array_push($response, 201);
                    array_push($response, "Criado com Sucesso");
                } else {
                    array_push($response, 422);
                    array_push($response, "Nenhum dado salvo pois nao houve recebimento de dados");
                }
            } else {
                array_push($response, 422);
                array_push($response, "Funcionario Inexistente na Base de Dados, Verifique o CPF");
            }
        } catch (\Throwable $th) {
            array_push($response, 422);
            array_push($response, "Erro Interno do servidor");
        }
        return $response;
    }

    public static function salvar(FellingRequest  $request)
    {
        return self::insereArray($request->all());
    }
}
