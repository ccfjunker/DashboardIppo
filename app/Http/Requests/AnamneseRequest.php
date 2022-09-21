<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnamneseRequest extends FormRequest
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
            'id'=>"nullable|sometimes|numeric",
            'id_empresa'=>'required|numeric|exists:tb_empresa,id',
            'id_funcionario'=>'required|numeric|exists:tb_funcionario,id',
            'data_atualizacao'=>"nullable|sometimes|date_format:Y-m-d",
            'data_criacao'=>"nullable|sometimes|date_format:Y-m-d",
            'proprietario'=>"nullable|sometimes|string",
            'cronicos'=>"nullable|sometimes|string",
            'mental'=>"nullable|sometimes|string",
            'alimentacao'=>"nullable|sometimes|string",
            'fisico'=>"nullable|sometimes|string"
        ];
    }
}
