<?php

namespace App\Models\Empresa;

use App\Models\BaseModel;
use Illuminate\Foundation\Http\FormRequest;

class UserEmpresa extends BaseModel
{
    protected $table = 'tb_user_empresa';

    protected $fillable = ['id_empresa', 'id_usuario'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected function validarRequest(FormRequest $request)
    {
        // TODO: Implement validarRequest() method.
    }

    public static function inserirArray(array $data)
    {
        // TODO: Implement inserirArray() method.
    }

    public static function inserirRequest(FormRequest $request)
    {
        // TODO: Implement inserirRequest() method.
    }

    public static function editarRequest(FormRequest $request)
    {
        // TODO: Implement editarRequest() method.
    }
}
