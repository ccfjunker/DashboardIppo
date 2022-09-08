<?php

namespace App\Models\Empresa;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\Empresa\Empresa
 *
 * @property int $id
 * @property string $nome
 * @property string $cupom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa query()
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereCupom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Empresa whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Dashboard\Anamnese[] $anamneses
 * @property-read int|null $anamneses_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pessoa\Funcionario[] $funcionarios
 * @property-read int|null $funcionarios_count
 */
class Empresa extends BaseModel
{
    protected $table = 'tb_empresa';

    public static function findByCupom($valor){
        return self::where('cupom', $valor)->first();
    }

    public function funcionarios(){
        return $this->hasMany('App\Models\Pessoa\Funcionario', 'id_empresa');
    }

    public function anamneses(){
        return $this->hasMany('App\Models\Dashboard\Anamnese', 'id_empresa');
    }

    public static function getArrayOptions(): ?\Illuminate\Support\Collection
    {
        if(isUserAdmin())
            return self::select(['id', 'nome'])->get();
        return null;
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
