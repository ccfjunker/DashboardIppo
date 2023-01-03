<?php

namespace App\Services;

use App\Http\Requests\FiltroDashboardEmpresaRequest;
use App\Http\Requests\FuncionarioRequest;
use App\Models\Pessoa\Funcionario;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class FuncionarioService
{
    public static function saveBotConversa(array $funcionarioArray)
    {
        $key = env('BOT_CONVERSA_KEY');
        $url = "https://backend.botconversa.com.br/api/v1/webhook/";
        $headers = ['API-KEY' => $key];
        $client = new Client();

        $response_user = $client->post($url . 'subscriber/', [
            'headers' => $headers,
            'json' => [
                "phone" => "+" . $funcionarioArray["telefone"],
                "first_name" => $funcionarioArray["nome"],
                "last_name" => $funcionarioArray["sobrenome"]
            ]
        ]);
        $result_user = $response_user->getBody();
        $user_array = json_decode($result_user, true);
        $id = $user_array["id"];

        $request_fields = $client->createRequest('GET', $url . 'custom_fields/', [
            'headers' => $headers
        ]);
        $response_fields = $client->send($request_fields);
        $result_fields = $response_fields->getBody();
        $fields_array = json_decode($result_fields, true);
        $id_field_cpf = "";
        $id_field_id_empresa = "";
        $id_field_nome_empresa= "";
        $id_field_cupom_empresa= "";
        foreach ($fields_array as $field) {
            if ($field["key"] === "CPF") {
                $id_field_cpf = $field["id"];
            }
            if ($field["key"] === "ID_EMPRESA") {
                $id_field_id_empresa = $field["id"];
            }
            if ($field["key"] === "NOME_EMPRESA") {
                $id_field_nome_empresa = $field["id"];
            }
            if ($field["key"] === "CUPOM_EMPRESA") {
                $id_field_cupom_empresa = $field["id"];
            }
        }

        $empresa = Empresa::find($funcionarioArray["id_empresa"]);
        $client->post($url . 'subscriber/' . $id . '/custom_fields' .
            '/' . $id_field_cpf . '/', [
            'headers' => $headers,
            'json' => [
                "value" => $funcionarioArray["cpf"]
            ]
        ]);
        $client->post($url . 'subscriber/' . $id . '/custom_fields' .
            '/' . $id_field_id_empresa . '/', [
            'headers' => $headers,
            'json' => [
                "value" => $funcionarioArray["id_empresa"]
            ]
        ]);
        $client->post($url . 'subscriber/' . $id . '/custom_fields' .
            '/' . $id_field_nome_empresa . '/', [
            'headers' => $headers,
            'json' => [
                "value" => $empresa["nome"]
            ]
        ]);
        $client->post($url . 'subscriber/' . $id . '/custom_fields' .
            '/' . $id_field_cupom_empresa . '/', [
            'headers' => $headers,
            'json' => [
                "value" => $empresa["cupom"]
            ]
        ]);

        $request_flows = $client->createRequest('GET', $url . 'flows/', [
            'headers' => $headers
        ]);
        $response_flows = $client->send($request_flows);
        $result_flows = $response_flows->getBody();
        $flows_array = json_decode($result_flows, true);
        $id_flow = "";
        foreach ($flows_array as $flow) {
            if ($flow["name"] === "Fluxo de Cadastro") {
                $id_flow = $flow["id"];
            }
        }

        $client->post($url . 'subscriber/' . $id . '/send_flow' . '/', [
            'headers' => $headers,
            'json' => [
                "flow" => $id_flow
            ]
        ]);
    }
    public static function insereArray(array $funcionarioArray)
    {
        return Funcionario::create($funcionarioArray);
    }

    public static function atualizaArray(array $funcionarioArray)
    {
        return Funcionario::find($funcionarioArray['id'])->update($funcionarioArray);
    }

    public static function salvar(FuncionarioRequest $request)
    {
        if ($request['id'] !== NULL && $request->has('id')) {
            self::atualizaArray($request->all());
        } else {
            self::insereArray($request->all());
            self::saveBotConversa($request->all());
        }
    }



    public static function findByCPF($cpf)
    {
        return Funcionario::where('cpf', '=', $cpf)->first();
    }

    public static function buscaLista(FiltroDashboardEmpresaRequest $request)
    {
        $anamneses = Funcionario::where('id', '>', '0');

        if (isUserAdmin()) {
            if ($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))) {
                $anamneses->where('id_empresa', $request->input('selectEmpresa'));
            }
        } else {
            $anamneses->where('id_empresa', \Auth::user()->empresas[0]->id);
        }


        if ($request->has('inputDataInicial') && !empty($request->input('inputDataInicial')) && $request->has('inputDataFinal') && !empty($request->input('inputDataFinal'))) {
            $anamneses->whereHas('anamneses', function ($query) use ($request) {
                return   $query->whereBetween(DB::raw('DATE(data_atualizacao)'), [dateDB($request->input('inputDataInicial')), dateDB($request->input('inputDataFinal'))]);
            })->get();
        }

        if ($request->has('selectTrabalho') && !empty($request->input('selectTrabalho'))) {
            $anamneses->where('trabalho', $request->input('selectTrabalho'));
        }

        if ($request->has('selectSexo') && !empty($request->input('selectSexo'))) {
            $anamneses->where('genero', $request->input('selectSexo'));
        }

        if ($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))) {
            $anamneses->where('id_empresa', $request->input('selectEmpresa'));
        }
        return $anamneses->get();
    }

    public static function buscaListaAnamnese(FiltroDashboardEmpresaRequest $request)
    {
        $anamneses = Funcionario::where('id', '>', '0');

        if (isUserAdmin()) {
            if ($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))) {
                $anamneses->where('id_empresa', $request->input('selectEmpresa'));
            }
        } else {
            $anamneses->where('id_empresa', \Auth::user()->empresas[0]->id);
        }



        if ($request->has('inputDataInicial') && !empty($request->input('inputDataInicial')) && $request->has('inputDataFinal') && !empty($request->input('inputDataFinal'))) {
            $anamneses->whereHas('anamneses', function ($query) use ($request) {
                return   $query->whereBetween(DB::raw('DATE(data_atualizacao)'), [dateDB($request->input('inputDataInicial')), dateDB($request->input('inputDataFinal'))]);
            })->get();
        }

        if ($request->has('selectTrabalho') && !empty($request->input('selectTrabalho'))) {
            $anamneses->where('trabalho', $request->input('selectTrabalho'));
        }

        if ($request->has('selectSexo') && !empty($request->input('selectSexo'))) {
            $anamneses->where('genero', $request->input('selectSexo'));
        }

        if ($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))) {
            $anamneses->where('id_empresa', $request->input('selectEmpresa'));
        }
        return $anamneses->with('anamneses')->get();
    }

    public static function buscaListaEngajados(FiltroDashboardEmpresaRequest $request)
    {
        $anamneses = Funcionario::where('id', '>', '0');

        if (isUserAdmin()) {
            if ($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))) {
                $anamneses->where('id_empresa', $request->input('selectEmpresa'));
            }
        } else {
            $anamneses->where('id_empresa', \Auth::user()->empresas[0]->id);
        }

        if ($request->has('inputDataInicial') && !empty($request->input('inputDataInicial')) && $request->has('inputDataFinal') && !empty($request->input('inputDataFinal'))) {
            $anamneses->whereHas('anamneses', function ($query) use ($request) {
                return   $query->whereBetween(DB::raw('DATE(data_atualizacao)'), [dateDB($request->input('inputDataInicial')), dateDB($request->input('inputDataFinal'))]);
            })->get();
        }

        if ($request->has('selectTrabalho') && !empty($request->input('selectTrabalho'))) {
            $anamneses->where('trabalho', $request->input('selectTrabalho'));
        }

        if ($request->has('selectSexo') && !empty($request->input('selectSexo'))) {
            $anamneses->where('genero', $request->input('selectSexo'));
        }

        if ($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))) {
            $anamneses->where('id_empresa', $request->input('selectEmpresa'));
        }
        return $anamneses->with('anamneses')->where('engajou', '=', 'S')->get();
    }
}
