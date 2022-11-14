<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class FellingRequest extends FormRequest
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
            "nome" => "sometimes|max:50",
            "sobrenome" => "sometimes|max:50",
            "telefone" => "sometimes|digits:11",
            "cpf" => "required|digits:11",
            "qualidade_de_alimentacao" => "sometimes|numeric|in:1,2,3,4,5",
            "nivel_de_estresse" => "sometimes|numeric|in:1,2,3,4,5",
            "qualidade_de_sono" => "sometimes|numeric|in:1,2,3,4,5",
            "nivel_de_ansiedade" => "sometimes|numeric|in:1,2,3,4,5",
            "nivel_de_humor" => "sometimes|numeric|in:1,2,3,4,5"
        ];
    }
    /**
     * Get the error messages for the defined validation rules.*
     * @return array
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors()
        ], 422));
    }
}
