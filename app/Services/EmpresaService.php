<?php

namespace App\Services;

use App\Models\Empresa\Empresa;

class EmpresaService
{
    public static function buscaLista(){
        return Empresa::all();
    }
}
