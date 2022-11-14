<?php

namespace App\Http\Controllers\WhatsApp;

use App\Http\Controllers\Controller;
use App\Http\Requests\FellingRequest;
use App\Services\FellingService;
use DB;
use Log;

class FellingController extends Controller
{

    /**
     * Store
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FellingRequest $request)
    {

        $validated = $request->validated();
        if ($validated) {
            try {
                DB::beginTransaction();
                $response = FellingService::salvar($request);
                DB::commit();
                return response()->json([
                    'message' => $response[1]
                ], $response[0]);
            } catch (\Exception $exception) {
                DB::rollBack();
                return response()->json([
                    'message' => 'Error create Felling!',
                    'error' => $exception->getMessage()
                ], 500);
            }
        }
    }
}
