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
        $id = $this->request->get('id') ? ',' . $this->request->get('id') : '';
        return [
            "id"=>"nullable|sometimes|numeric",
            'id_empresa'=>'required|numeric|exists:tb_empresa,id',
            "trabalho"=>"required|in:HO,HI,PS",
            "genero" => "required|in:H,M",
            "nome" => "required|max:40",
            "sobrenome" => "required|max:100",
            "nome_social" => "max:40",
            "telefone" => "required|digits:11|unique:tb_funcionario,telefone".$id,
            "cpf" => "required|digits:11|unique:tb_funcionario,cpf".$id,
            "email" => "required|string|email|unique:tb_funcionario,email".$id,
            "data_nascimento" => "required|date_format:Y-m-d"
        ];
    }


}
