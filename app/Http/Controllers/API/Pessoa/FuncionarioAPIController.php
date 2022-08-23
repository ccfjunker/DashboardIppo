<?php

namespace App\Http\Controllers\API\Pessoa;

use App\Http\Controllers\Controller;
use App\Http\Requests\FuncionarioRequest;
use App\Models\Pessoa\Funcionario;
use App\Services\FuncionarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            try {
                DB::beginTransaction();
                FuncionarioService::insereRequest($request);
                DB::commit();
                return response()->json([
                    'message' => 'Successfully created Funcionario!'
                ], 201);
            }catch (\Exception $exception){
                DB::rollBack();
                return response()->json([
                    'message' => 'Error create Funcionario!',
                    'error'=> $exception->getMessage()
                ], 500);
            }

        }



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
