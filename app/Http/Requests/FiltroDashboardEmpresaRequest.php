<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FiltroDashboardEmpresaRequest extends FormRequest{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'selectEmpresa'=>'numeric',
            'inputDataInicial'=>'nullable|sometimes|date_format:d/m/Y',
            'inputDataFinal'=>'nullable|sometimes|date_format:d/m/Y',
            'inputIdade'=>'nullable|sometimes|numeric',
            'selectGenero'=>'nullable|sometimes|in:H,M',
            'selectTrabalho'=>'nullable|sometimes|in:HO,HI,PS'
        ];
    }
}
