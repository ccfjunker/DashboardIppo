<?php

namespace App\Services;

use App\Http\Requests\PessoaRequest;
use App\Models\Pessoa\Pessoa;

class PessoaService
{
    public static function inserePessoaArray(array $pessoaArray){
        return Pessoa::inserirArray($pessoaArray);
    }

    public static function findByCPF($cpf){
        return Pessoa::findByCPF($cpf);
    }
}
