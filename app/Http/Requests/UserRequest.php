<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "email" => "required|string|email|unique:users|unique:tb_pessoa",
            "password" => "required|string|confirmed|min:8",
            "funcao"=>"required|in:A,E",
            "id"=>"numeric",
            "id_pessoa"=>"numeric",
            "genero" => "required|max:2",
            "nome" => "required|max:40",
            "sobrenome" => "required|max:100",
            "nome_social" => "required|max:40",
            "telefone" => "required|digits:11|unique:tb_pessoa",
            "cpf" => "required|digits:11|unique:tb_pessoa",
            "data_nascimento" => "required",
        ];
    }

    public function retornaPessoaArrayRequest(){
        return [
            'cpf'=>self::input('cpf'),
            'nome'=>self::input('nome'),
            'email'=>self::input('email'),
            'telefone'=>self::input('telefone'),
            'data_nascimento'=>dateDB(self::input('data_nascimento'),),
            'sobrenome'=>self::input('sobrenome'),
            'nome_social'=>self::input('nome_social'),
        ];
    }
}
