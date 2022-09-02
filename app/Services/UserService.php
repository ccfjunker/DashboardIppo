<?php

namespace App\Services;

use App\Http\Requests\PessoaRequest;
use App\Http\Requests\UserRequest;
use App\Models\Pessoa\Pessoa;
use App\User;
use App\Util\Parametro;

class UserService
{
    public static function insereArray(array $pessoaArray){
        return User::inserirArray($pessoaArray);
    }

    public static function insereRequest(UserRequest $request){
        $userArray = $request->all();
        if(!$request->has('id_pessoa')){
            $userArray['id_pessoa'] = PessoaService::inserePessoaArray($request->retornaPessoaArrayRequest())->id;
        }
        return self::insereArray($userArray);
    }

    public static function getUsersList(){
        return User::with('pessoa')->get();
    }
}
