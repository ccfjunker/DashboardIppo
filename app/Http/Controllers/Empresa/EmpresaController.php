<?php

namespace App\Http\Controllers\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Empresa\Empresa;
use App\Models\Pessoa\Funcionario;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
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
            'category_name' => 'empresa',
            'page_name' => 'empresa',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0
        ];
        return view('dashboard2')->with($data);
    }

}
