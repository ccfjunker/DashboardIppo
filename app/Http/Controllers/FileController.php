<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function downloadModeloFuncionario()
    {

            $myFile = storage_path('planilhas\modelo-funcionarios.csv');
            return response()->download($myFile);


    }
}
