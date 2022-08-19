<?php

namespace App\Http\Controllers;

use App\Http\Requests\FiltroDashboardEmpresaRequest;
use App\Model\BaseModel;
use App\Model\Dashboard\Anamnese;
use App\Model\Pessoa\Funcionario;
use Illuminate\Http\Request;

class HomeController extends Controller
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
            'options_trabalho'=>Funcionario::getArrayTrabalho()
        ];
        return view('dashboard2')->with($data);
    }

    public function dataFilteredForTheCharts(FiltroDashboardEmpresaRequest $request){
        $validated = $request->validated();
        if(!$validated){
            return null;
        }
        $dataAnamneses = Anamnese::where('id_empresa', $request->input('inputIdEmpresa'));

        if($request->has('inputDataInicial')) {
            $dataAnamneses->where('data_atualizacao', '>=', $request->input('inputDataInicial'));
        }

        if($request->has('inputDataFinal')) {
            $dataAnamneses->where('data_atualizacao', '<=', $request->input('inputDataFinal'));
        }else{
            $dataAnamneses->where('data_atualizacao', '<=', $request->input('inputDataInicial'));
        }

        if($request->has('inputIdade')) {
            $dataAnamneses->where('idade', $request->input('inputIdade'));
        }

        if($request->has('selectGenero')) {
            $dataAnamneses->where('genero', '>=', $request->input('selectGenero'));
        }

        if($request->has('selectTrabalho')) {
            $dataAnamneses->where('trabalho', $request->input('selectTrabalho'));
        }

        return $dataAnamneses->get();

    }
}
