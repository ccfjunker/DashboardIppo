<?php

namespace App\Model\Pessoa;

use App\Http\Requests\FuncionarioRequest;
use App\Model\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class Funcionario extends BaseModel
{
    protected $table = 'tb_funcionario';

    public function pessoa(){
        return $this->belongsTo('App\Model\Pessoa\Pessoa', 'id_pessoa');
    }

    public function empresa(){
        return $this->belongsTo('App\Model\Empresa\Empresa', 'id_empresa');
    }

    public function anamneses(){
        return $this->hasMany('App\Model\Dashboard\Anamnese');
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
