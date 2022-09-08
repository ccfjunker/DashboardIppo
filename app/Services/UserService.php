<?php

namespace App\Services;

use App\Http\Requests\UserRequest;
use App\Models\Empresa\UserEmpresa;
use App\User;
use App\Util\Parametro;

class UserService
{
    public static function insereArray(array $pessoaArray){
        $pessoaArray['password'] = \Hash::make($pessoaArray['password']);
        return User::create($pessoaArray);
    }

    public static function atualizaArray(array $userArray){
        $userArray['password'] = \Hash::make($userArray['password']);
        return User::find($userArray['id'])->update($userArray);
    }

    public static function salvar(UserRequest $request){
        if($request->has('id')){
            self::atualizaArray($request->all());
        }else{
            $user = self::insereArray($request->all());
            if($request->has('id_empresa')){
                UserEmpresa::create([
                    'id_empresa' => $request->input('id_empresa'),
                    'id_usuario' => $user->id
                ]);
            }
        }
    }


    public static function getUsersList(){
        return User::get();
    }
}
