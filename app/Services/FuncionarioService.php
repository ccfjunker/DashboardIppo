<?php

namespace App\Services;

use App\Http\Requests\FiltroDashboardEmpresaRequest;
use App\Http\Requests\FuncionarioRequest;
use App\Models\Pessoa\Funcionario;
use Illuminate\Support\Facades\DB;

class FuncionarioService
{
    public static function insereArray(array $funcionarioArray){
        return Funcionario::create($funcionarioArray);
    }

    public static function atualizaArray(array $funcionarioArray){
        return Funcionario::find($funcionarioArray['id'])->update($funcionarioArray);
    }

    public static function salvar(FuncionarioRequest $request){
        if($request['id'] !== NULL && $request->has('id')){
            self::atualizaArray($request->all());
        }else{
            self::insereArray($request->all());
        }
    }



    public static function findByCPF($cpf){
        return Funcionario::where('cpf', '=', $cpf)->first();
    }

    public static function buscaLista(FiltroDashboardEmpresaRequest $request){
        $anamneses = Funcionario::where('id', '>', '0');

        if(isUserAdmin()){
            if($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))){
                $anamneses->where('id_empresa', $request->input('selectEmpresa'));
            }
        }else{
            $anamneses->where('id_empresa', \Auth::user()->empresas[0]->id);
        }


        if($request->has('inputDataInicial') && !empty($request->input('inputDataInicial')) && $request->has('inputDataFinal') && !empty($request->input('inputDataFinal'))){
            $anamneses->whereHas('anamneses', function ($query) use ($request) {
                return   $query->whereBetween(DB::raw('DATE(data_atualizacao)'), [dateDB($request->input('inputDataInicial')), dateDB($request->input('inputDataFinal'))]);
            })->get();
        }

        if($request->has('selectTrabalho') && !empty($request->input('selectTrabalho'))){
            $anamneses->where('trabalho', $request->input('selectTrabalho'));
        }

        if($request->has('selectSexo') && !empty($request->input('selectSexo'))){
                $anamneses->where('genero', $request->input('selectSexo'));
        }

        if($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))){
            $anamneses->where('id_empresa', $request->input('selectEmpresa'));
        }
        return $anamneses->get();
    }

    public static function buscaListaAnamnese(FiltroDashboardEmpresaRequest $request){
        $anamneses = Funcionario::where('id', '>', '0');

        if(isUserAdmin()){
            if($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))){
                $anamneses->where('id_empresa', $request->input('selectEmpresa'));
            }
        }else{
            $anamneses->where('id_empresa', \Auth::user()->empresas[0]->id);
        }



        if($request->has('inputDataInicial') && !empty($request->input('inputDataInicial')) && $request->has('inputDataFinal') && !empty($request->input('inputDataFinal'))){
            $anamneses->whereHas('anamneses', function ($query) use ($request) {
                return   $query->whereBetween(DB::raw('DATE(data_atualizacao)'), [dateDB($request->input('inputDataInicial')), dateDB($request->input('inputDataFinal'))]);
            })->get();
        }

        if($request->has('selectTrabalho') && !empty($request->input('selectTrabalho'))){
            $anamneses->where('trabalho', $request->input('selectTrabalho'));
        }

        if($request->has('selectSexo') && !empty($request->input('selectSexo'))){
            $anamneses->where('genero', $request->input('selectSexo'));
        }

        if($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))){
            $anamneses->where('id_empresa', $request->input('selectEmpresa'));
        }
        return $anamneses->with('anamneses')->get();
    }

    public static function buscaListaEngajados(FiltroDashboardEmpresaRequest $request){
        $anamneses = Funcionario::where('id', '>', '0');

        if(isUserAdmin()){
            if($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))){
                $anamneses->where('id_empresa', $request->input('selectEmpresa'));
            }
        }else{
            $anamneses->where('id_empresa', \Auth::user()->empresas[0]->id);
        }

        if($request->has('inputDataInicial') && !empty($request->input('inputDataInicial')) && $request->has('inputDataFinal') && !empty($request->input('inputDataFinal'))){
            $anamneses->whereHas('anamneses', function ($query) use ($request) {
                return   $query->whereBetween(DB::raw('DATE(data_atualizacao)'), [dateDB($request->input('inputDataInicial')), dateDB($request->input('inputDataFinal'))]);
            })->get();
        }

        if($request->has('selectTrabalho') && !empty($request->input('selectTrabalho'))){
            $anamneses->where('trabalho', $request->input('selectTrabalho'));
        }

        if($request->has('selectSexo') && !empty($request->input('selectSexo'))){
            $anamneses->where('genero', $request->input('selectSexo'));
        }

        if($request->has('selectEmpresa') && !empty($request->input('selectEmpresa'))){
            $anamneses->where('id_empresa', $request->input('selectEmpresa'));
        }
        return $anamneses->with('anamneses')->where('engajou', '=', 'S')->get();
    }
}
