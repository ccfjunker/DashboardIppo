<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\DashboardIppoException;
use App\Http\Controllers\Controller;
use App\Http\Requests\FiltroDashboardEmpresaRequest;
use App\Models\Empresa\Empresa;
use App\Models\Pessoa\Funcionario;
use App\Services\Admin\DashboardService;
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

    public function index()
    {
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'options_genero' => Funcionario::getArrayGenero(),
            'options_trabalho' => Funcionario::getArrayTrabalho(),
            'options_empresa' => Empresa::getArrayOptions()
        ];
        return view('pages.admin.dashboard')->with($data);
    }

    public function dataFilteredForTheCharts(FiltroDashboardEmpresaRequest $request)
    {
        try {
            $dashboardService =  new DashboardService();
            return response()->json($dashboardService->getDataFilteredForTheCharts($request));
        } catch (\Throwable $exception) {
            return response($exception->getMessage(), 500);
        }
    }
}
