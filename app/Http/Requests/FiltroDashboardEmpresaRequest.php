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
            'selectTrabalho'=>'nullable|sometimes|in:HO,HI,PS',
            'selectIdade'=>'nullable|sometimes|in:-18,18-24,25-32,33-39,40-47,48-54,55-63,64-'
        ];
    }
}
