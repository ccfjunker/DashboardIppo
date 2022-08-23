<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

abstract class BaseModel extends Model
{
    protected static function getDBTable($table, $coluna, $valor){
        return DB::table($table)->where($coluna, $valor);
    }
    protected abstract function validarRequest(FormRequest $request);

    public abstract static function inserirArray(array $data);

    public abstract static function inserirRequest(FormRequest $request);

    public abstract static function editarRequest(FormRequest $request);

    public static function getArrayTrabalho(){
        return retornaArrayTrabalho();
    }

    public static function getArrayGenero(){
        return retornaArrayGenero();
    }
}
