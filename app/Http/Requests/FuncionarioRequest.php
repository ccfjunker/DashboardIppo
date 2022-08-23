<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest
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
            'id'=>'numeric',
            'id_empresa'=>'required|numeric|exists:tb_empresa,id',
            "trabalho"=>"required|in:HO,HI,PS",
            "genero" => "required|in:H,M",
            "nome" => "required|max:40",
            "sobrenome" => "required|max:100",
            "nome_social" => "max:40",
            "telefone" => "required|digits:11|unique:tb_pessoa",
            "cpf" => "required|digits:11|unique:tb_pessoa",
            "email" => "required|string|email|unique:tb_pessoa",
            "data_nascimento" => "required|date_format:Y-m-d"
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
