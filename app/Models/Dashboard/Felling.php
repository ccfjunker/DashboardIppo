<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Dashboard\Felling
 *
 * @property int $id
 * @property int $id_funcionario
 * @property int $id_empresa
 * @property string $data_criacao
 * @property string $data_atualizacao
 * @property string $cpf
 * @property string|null $label
 * @property string|null $nivel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Empresa\Empresa $empresa
 * @property-read \App\Models\Pessoa\Funcionario $funcionario
 * @mixin \Eloquent
 */
class Felling extends Model{

    protected $table = 'tb_felling';



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
        'data_criacao',
        'data_atualizacao',
        'cpf',
        'label',
        'nivel',
    ];
}
