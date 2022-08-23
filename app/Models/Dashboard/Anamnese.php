<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Dashboard\Anamnese
 *
 * @property int $id
 * @property int $id_funcionario
 * @property int $id_empresa
 * @property string $data_criacao
 * @property string $data_atualizacao
 * @property string $proprietario
 * @property string|null $cronicos
 * @property string|null $mental
 * @property string|null $alimentacao
 * @property string|null $fisico
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Empresa\Empresa $empresa
 * @property-read \App\Models\Pessoa\Funcionario $funcionario
 * @method static \Illuminate\Database\Eloquent\Builder|Anamnese newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Anamnese newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Anamnese query()
 * @method static \Illuminate\Database\Eloquent\Builder|Anamnese whereAlimentacao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anamnese whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anamnese whereCronicos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anamnese whereDataAtualizacao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anamnese whereDataCriacao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anamnese whereFisico($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anamnese whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anamnese whereIdEmpresa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anamnese whereIdFuncionario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anamnese whereMental($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anamnese whereProprietario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anamnese whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Anamnese extends Model{

    protected $table = 'tb_anamnese';



    public function empresa(){
        return $this->belongsTo('App\Models\Empresa\Empresa', 'id_empresa');
    }

    public function funcionario(){
        return $this->belongsTo('App\Models\Pessoa\Funcionario', 'id_funcionario');
    }




    protected $fillable = [
        'id',
        'id_empresa',
        'id_funcionario',
        'data_atualizacao',
        'data_criacao',
        'proprietario',
        'cronicos',
        'mental',
        'alimentacao',
        'fisico',
        'empresa',
        'funcionario'
    ];
}
