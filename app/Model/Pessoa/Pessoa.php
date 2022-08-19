<?php

namespace App\Model\Pessoa;

use App\Http\Requests\PessoaRequest;
use App\Model\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class Pessoa extends BaseModel
{
    protected $table = 'tb_pessoa';

    public static function findByCPF($valor){
        return self::where('cpf', $valor)->first();
    }

    public static function findByTelefone($valor){
        return self::where('telefone', $valor)->first();
    }

    public static function findByEmail($valor){
        return self::where('email', $valor)->first();
    }

    public static function inserirArray(array $data){
        return self::create($data);
    }

    public static function inserirRequest(FormRequest $request){

    }

    public static function editarRequest(FormRequest $request){

    }

    protected function validarRequest(FormRequest $request){

    }

    protected $fillable = [
        'cpf',
        'nome',
        'sobrenome',
        'nome_social',
        'telefone',
        'email',
        'data_nascimento',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
