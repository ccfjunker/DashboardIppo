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
 * @property int $id_pessoa
 * @property int $id_empresa
 * @property string $genero
 * @property string $trabalho
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Dashboard\Anamnese[] $anamneses
 * @property-read int|null $anamneses_count
 * @property-read \App\Models\Empresa\Empresa $empresa
 * @property-read \App\Models\Pessoa\Pessoa $pessoa
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereGenero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereIdEmpresa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereIdPessoa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereTrabalho($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Funcionario extends BaseModel
{
    protected $table = 'tb_funcionario';

    public function pessoa(){
        return $this->belongsTo('App\Models\Pessoa\Pessoa', 'id_pessoa');
    }

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



    protected $fillable = [
        'id',
        'id_pessoa',
        'id_empresa',
        'engajou',
        'genero',
        'trabalho',
    ];

    protected $hidden = [
      'created_at',
      'updated_at'
    ];

    public static function findByIdPessoa($valor){
        return self::where('id_pessoa', $valor)->first();
    }

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
