<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('funcionarios', 'API\Pessoa\FuncionarioAPIController@index');
Route::get('funcionario/{id}', 'API\Pessoa\FuncionarioAPIController@show');
Route::post('funcionario', 'API\Pessoa\FuncionarioAPIController@store');
Route::put('funcionario/{id}', 'API\Pessoa\FuncionarioAPIController@update');
Route::delete('funcionario/{id}', 'API\Pessoa\FuncionarioAPIController@delete');

Route::get('anamneses', 'API\Dashboard\AnamneseAPIController@index');
Route::get('import-export-excel', 'API\ImportExportExcel\ImportExportExcelController@index');
Route::post('import-export-excel', 'API\ImportExportExcel\ImportExportExcelController@import');
Route::get('export-excel', 'API\ImportExportExcel\ImportExportExcelController@export');
