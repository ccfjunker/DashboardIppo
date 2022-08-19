<?php

namespace App\Model\Dashboard;

use Illuminate\Database\Eloquent\Model;

class Anamnese extends Model{

    protected $table = 'tb_anamnese';



    public function empresa(){
        return $this->belongsTo('App\Model\Empresa\Empresa', 'id_empresa');
    }

    public function funcionario(){
        return $this->belongsTo('App\Model\Pessoa\Funcionario', 'id_funcionario');
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
