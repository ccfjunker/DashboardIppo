<?php

namespace App\Models\Pessoa;

use App\Http\Requests\PessoaRequest;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

/**
 * App\Models\Pessoa\Pessoa
 *
 * @property int $id
 * @property string $nome
 * @property string $sobrenome
 * @property string $nome_social
 * @property string $telefone
 * @property string $cpf
 * @property string $email
 * @property string $data_nascimento
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereCpf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereDataNascimento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereNomeSocial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereSobrenome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereTelefone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
       return self::inserirArray([
           'cpf'=>$request->input('cpf'),
           'nome'=>$request->input('nome'),
           'email'=>$request->input('email'),
           'telefone'=>$request->input('telefone'),
           'data_nascimento'=>dateDB($request->input('data_nascimento'),),
           'sobrenome'=>$request->input('sobrenome'),
           'nome_social'=>$request->input('nome_social'),
       ]);
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
