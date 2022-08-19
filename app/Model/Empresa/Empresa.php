<?php

namespace App\Model\Empresa;

use App\Model\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class Empresa extends BaseModel
{
    protected $table = 'tb_empresa';

    public static function findByCupom($valor){
        return self::where('cupom', $valor)->first();
    }

    public function funcionarios(){
        return $this->hasMany('App\Model\Pessoa\Funcionario');
    }

    public function anamneses(){
        return $this->hasMany('App\Model\Dashboard\Anamnese');
    }

    protected $fillable = ['nome', 'cupom'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected function validarRequest(FormRequest $request)
    {
        // TODO: Implement validarRequest() method.
    }

    public static function inserirArray(array $data){
        return self::create($data);
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
