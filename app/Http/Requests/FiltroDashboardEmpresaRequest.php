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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'inputIdEmpresa'=>'numeric|required',
            'inputDataInicial'=>'required|date',
            'inputDataFinal'=>'date|after:inputDataInicial',
            'inputIdade'=>'numeric',
            'selectGenero'=>'in:H,M',
            'selectTrabalho'=>'in:HO,HI,PS',
        ];
    }
}
