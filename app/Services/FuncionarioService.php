<?php

namespace App\Services;

use App\Http\Requests\FuncionarioRequest;
use App\Models\Pessoa\Funcionario;

class FuncionarioService
{
    public static function insereArray(array $pessoaArray){
        return Funcionario::inserirArray($pessoaArray);
    }

    public static function insereRequest(FuncionarioRequest $request){
        $funcionarioArray = $request->all();
        if(!$request->has('id_pessoa')){
            $funcionarioArray['id_pessoa'] = PessoaService::inserePessoaArray($request->retornaPessoaArrayRequest())->id;
        }
        return self::insereArray($funcionarioArray);
    }

    public static function buscaLista($id_empresa = null){
        if($id_empresa != null){
            return Funcionario::whereIdEmpresa($id_empresa)->with('pessoa')->get();
        }else{
            return Funcionario::with('pessoa')->get();
        }

    }
}
