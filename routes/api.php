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
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'API\AuthAPIController@login');
    Route::post('register', 'API\AuthAPIController@signup');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::middleware(['funcao'])->group(function () {
            Route::get('logout', 'API\AuthAPIController@logout');
            Route::get('user', 'API\AuthAPIController@user');

            Route::get('funcionarios', 'API\Pessoa\FuncionarioAPIController@index');
            Route::get('funcionario/{id}', 'API\Pessoa\FuncionarioAPIController@show');
            Route::post('funcionario', 'API\Pessoa\FuncionarioAPIController@store');
            Route::delete('funcionario/{id}', 'API\Pessoa\FuncionarioAPIController@delete');

            Route::get('empresas', 'API\Empresa\EmpresaAPIController@index');
            Route::get('empresa/{id}', 'API\Empresa\EmpresaAPIController@show');
            Route::post('empresa', 'API\Empresa\EmpresaAPIController@store');
            Route::put('empresa/{id}', 'API\Empresa\EmpresaAPIController@update');
            Route::delete('empresa/{id}', 'API\Empresa\EmpresaAPIController@delete');

            Route::get('anamneses', 'API\Dashboard\AnamneseAPIController@index');
            Route::post('anamnese', 'API\Dashboard\AnamneseAPIController@store');
            Route::delete('anamnese/{id}', 'API\Dashboard\AnamneseAPIController@delete');

            Route::get('import-export-excel', 'API\ImportExportExcel\ImportExportExcelController@index');
            Route::post('import-export-excel', 'API\ImportExportExcel\ImportExportExcelController@import');
            Route::get('export-excel', 'API\ImportExportExcel\ImportExportExcelController@export');
        });
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('felling', 'WhatsApp\FellingController@store');