<?php

namespace App\Services;

use App\Http\Requests\EmpresaRequest;
use App\Models\Empresa\Empresa;

class EmpresaService
{
    public static function buscaLista(){
        return Empresa::all();
    }

    public static function salvar(EmpresaRequest $request){
        if($request->has('id')){
            self::atualizaArray($request->all());
        }else{
            self::insereArray($request->all());
        }
    }

    public static function insereArray(array $empresaArray){
        return Empresa::create($empresaArray);
    }

    public static function atualizaArray(array $empresaArray){
        $empresa = Empresa::find($empresaArray['id']);
        $empresa->nome = $empresaArray['nome'];
        $empresa->cupom = $empresaArray['cupom'];
        if(!empty($empresaArray['total_funcionario'])){
            $empresa->total_funcionario = $empresaArray['total_funcionario'];
        }
        $empresa->save();
        return $empresa;
    }
}
