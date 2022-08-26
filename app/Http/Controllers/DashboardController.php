<?php

namespace App\Http\Controllers;

use App\Http\Requests\FiltroDashboardEmpresaRequest;
use App\Models\BaseModel;
use App\Models\Dashboard\Anamnese;
use App\Models\Empresa\Empresa;
use App\Models\Pessoa\Funcionario;
use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'options_genero'=>Funcionario::getArrayGenero(),
            'options_trabalho'=>Funcionario::getArrayTrabalho(),
            'options_empresa'=>Empresa::getArrayOptions()
        ];
        return view('dashboard2')->with($data);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  FiltroDashboardEmpresaRequest  $request
     */
    public function dataFilteredForTheCharts(FiltroDashboardEmpresaRequest $request){


        $dashboardService =  new DashboardService();

        return response()->json( $dashboardService->getDataFilteredForTheCharts($request) );


    }


}
