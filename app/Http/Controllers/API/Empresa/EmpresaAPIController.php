<?php

namespace App\Http\Controllers\API\Empresa;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmpresaRequest;
use App\Models\Empresa\Empresa;
use App\Services\EmpresaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpresaAPIController extends Controller
{
    public function index(){
        return Empresa::get();
    }

    public function show($id)
    {
        return Empresa::find($id);
    }

    public function store(EmpresaRequest $request)
    {
        $validated = $request->validated();
        if($validated){
            try {
                DB::beginTransaction();
                EmpresaService::salvar($request);
                DB::commit();
                return response()->json([
                    'message' => 'Successfully created Empresa!'
                ], 201);
            }catch (\Exception $exception){
                DB::rollBack();
                return response()->json([
                    'message' => 'Error create Empresa!',
                    'error'=> $exception->getMessage()
                ], 500);
            }

        }



    }


    public function delete(Request $request, $id)
    {
        $Funcionario = Funcionario::findOrFail($id);
        $Funcionario->delete();

        return 204;
    }
}
