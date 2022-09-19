<?php

namespace App\Services;

use App\Exceptions\DashboardIppoException;
use App\Http\Requests\AnamneseRequest;
use App\Models\Dashboard\Anamnese;

class AnamneseService
{
    public static function salvar(AnamneseRequest $request){
        if($request->has('id')){
            self::atualizaArray($request->all());
        }else{
            self::insereArray($request->all());
        }
    }

    public static function insereArray(array $anamneseArray){
        return Anamnese::create($anamneseArray);
    }

    public static function atualizaArray(array $anamneseArray){
        return Anamnese::find($anamneseArray['id'])->update($anamneseArray);
    }
}
