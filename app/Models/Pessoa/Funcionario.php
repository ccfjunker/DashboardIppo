<?php

namespace App\Models\Pessoa;

use App\Http\Requests\FuncionarioRequest;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

/**
 * App\Models\Pessoa\Funcionario
 *
 * @property int $id
 * @property int $id_empresa
 * @property string $genero
 * @property string $trabalho
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Dashboard\Anamnese[] $anamneses
 * @property-read int|null $anamneses_count
 * @property-read \App\Models\Empresa\Empresa $empresa
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereGenero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereIdEmpresa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereTrabalho($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $nome
 * @property string $sobrenome
 * @property string|null $nome_social
 * @property string $telefone
 * @property string $cpf
 * @property string $email
 * @property string $data_nascimento
 * @property string $engajou
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereCpf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereDataNascimento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereEngajou($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereNomeSocial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereSobrenome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereTelefone($value)
 */
class Funcionario extends BaseModel
{
    protected $table = 'tb_funcionario';

    public function empresa(){
        return $this->belongsTo('App\Models\Empresa\Empresa', 'id_empresa');
    }

    public function anamneses(){
        return $this->hasMany('App\Models\Dashboard\Anamnese', 'id_funcionario');
    }

    public function getTrabalhoAttribute($value)
    {
        return helperDescricaoTabalho($value);
    }

    public function getGeneroAttribute($value)
    {
        return helperDescricaoGenero($value);
    }

    public function getEngajouAttribute($value)
    {
        return helperDescricaoEngajou($value);
    }

    public function getCpfAttribute($value)
    {
        return $value;
    }

    public function getTelefoneAttribute($value)
    {
        return maskTelefone($value);
    }



    protected $fillable = [
        'id',
        'id_empresa',
        'cpf',
        'nome',
        'sobrenome',
        'nome_social',
        'telefone',
        'email',
        'data_nascimento',
        'engajou',
        'genero',
        'trabalho',
    ];

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
        return self::create($data);
    }

    public static function inserirRequest(FormRequest $request)
    {
        $funcionarioRequet = cast($request, FuncionarioRequest::class);
        $validated = $funcionarioRequet->validated();
    }

    public static function editarRequest(FormRequest $request)
    {
        // TODO: Implement editarRequest() method.
    }
}
