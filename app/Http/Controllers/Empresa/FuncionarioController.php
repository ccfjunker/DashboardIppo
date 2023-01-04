<?php

namespace App\Http\Controllers\Empresa;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ListDataTableController;
use App\Http\Requests\DataTableRequest;
use App\Http\Requests\FuncionarioRequest;
use App\Models\Pessoa\Funcionario;
use App\Services\FuncionarioService;
use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;

class FuncionarioController extends ListDataTableController
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
            'category_name' => 'dashboard',
            'page_name' => 'funcionarios',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'generos' => retornaArrayGenero(),
            'trabalhos' => retornaArrayTrabalho()
        ];
        return view('empresa.funcionario.index')->with($data);
    }

    public function store(FuncionarioRequest $request){
        FuncionarioService::salvar($request);
        return response()->json('Usuário cadastrado com sucesso!', 200);
    }

    public function delete($id){
        FuncionarioService::deletar($id);
        return response()->json('Usuário deletado com sucesso!', 200);
    }

    public function show($id){
        return Funcionario::find($id);
    }

    public function list(DataTableRequest $request){
        $whereArray = [
            'id_empresa'=>[
                'operador'=>'=',
                'valor'=>getEmpresaFromLoggedUser()->id
            ]
        ];
        $records = $this->getList($request, Funcionario::class, $whereArray);

        $data_arr = array();

        foreach($records as $record){

            $data_arr[] = array(
                "id" => $record->id,
                "nome" => $record->nome . " " .$record->sobrenome,
                "nome_social" => $record->nome_social,
                "telefone" => $record->telefone,
                "cpf" => $record->cpf,
                "email" => $record->email,
                "data_nascimento" => dateFormatted($record->data_nascimento),
                "engajou"=>$record->engajou,
                "genero"=>$record->genero,
                "trabalho"=>$record->trabalho,
            );
        }

        return array(
            "draw" => intval($this->draw),
            "iTotalRecords" => $this->totalRecords,
            "iTotalDisplayRecords" => $this->totalRecordswithFilter,
            "aaData" => $data_arr
        );
    }

}
