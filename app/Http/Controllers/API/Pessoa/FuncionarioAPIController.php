<?php

namespace App\Http\Controllers\API\Pessoa;

use App\Http\Controllers\Controller;
use App\Http\Requests\FuncionarioRequest;
use App\Model\Pessoa\Funcionario;
use Illuminate\Http\Request;

class FuncionarioAPIController extends Controller
{
    public function index(){
        return Funcionario::with(['pessoa', 'empresa'])->get();
    }

    public function show($id)
    {
        return Funcionario::find($id)->with(['pessoa', 'empresa']);
    }

    public function store(FuncionarioRequest $request)
    {
        $validated = $request->validated();
        if($validated){
            return Funcionario::inserirRequest($request);
        }

        return null;

    }

    public function update(Request $request, $id)
    {
        $Funcionario = Funcionario::findOrFail($id);
        $Funcionario->update($request->all());

        return $Funcionario;
    }

    public function delete(Request $request, $id)
    {
        $Funcionario = Funcionario::findOrFail($id);
        $Funcionario->delete();

        return 204;
    }
}
