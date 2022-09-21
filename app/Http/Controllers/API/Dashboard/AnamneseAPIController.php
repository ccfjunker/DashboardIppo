<?php

namespace App\Http\Controllers\API\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnamneseRequest;
use App\Models\Dashboard\Anamnese;
use App\Services\AnamneseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnamneseAPIController extends Controller
{
    public function index()
    {
        return Anamnese::with(['empresa'])->get();
    }

    public function store(AnamneseRequest $request)
    {
        $validated = $request->validated();
        if($validated){
            try {
                DB::beginTransaction();
                AnamneseService::salvar($request);
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
}
