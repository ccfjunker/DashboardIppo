<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ListDataTableController;
use App\Http\Requests\DataTableRequest;
use App\Http\Requests\UserRequest;
use App\Services\EmpresaService;
use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;

class UserController extends ListDataTableController
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
            'category_name' => 'list',
            'page_name' => 'users',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'empresas' => EmpresaService::buscaLista()
        ];
        return view('pages.admin.users')->with($data);
    }

    public function create()
    {

        $data = [
            'category_name' => 'create',
            'page_name' => 'user_create',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0
        ];
        return view('pages.admin.user_create')->with($data);
    }

    public function store(UserRequest $request){
        UserService::salvar($request);
        return response()->json('Usuário cadastrado com sucesso!', 200);
    }

    public function getUsersList(DataTableRequest $request){
        $records = $this->getList($request, User::class)->get();
        $data_arr = array();

        foreach($records as $record){

            $data_arr[] = array(
                "id" => $record->id,
                "email" => $record->email,
                "funcao" => helperDescricaoFuncao($record->funcao)
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
