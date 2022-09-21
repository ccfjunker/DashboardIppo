<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
            "nome" => "required|max:100|unique:tb_empresa,nome".$id,
            "cupom" => "required|max:30|unique:tb_empresa,cupom".$id,
            "total_funcionario"=>"nullable|sometimes|numeric",
        ];
    }
}
