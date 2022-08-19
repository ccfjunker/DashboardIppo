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
            'id_empresa'=>'required|numeric',
            'genero' => 'required|max:2',
            'nome' => 'required|max:40',
            'sobrenome' => 'required|max:100',
            'nome_social' => 'required|max:40',
            'telefone' => 'required|max:11|min:11|numeric',
            'cpf' => 'required|max:11|min:11|numeric',
            'email' => 'required',
            'data_nascimento' => 'required',
        ];
    }
}
