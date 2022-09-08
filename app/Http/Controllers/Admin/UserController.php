<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataTableRequest;
use App\Http\Requests\UserRequest;
use App\Services\EmpresaService;
use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = User::select('count(*) as allcount')->count();
        $totalRecordswithFilter = User::select('count(*) as allcount')->count();

        // Fetch records
        $records = User::orderBy($columnName,$columnSortOrder)
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach($records as $record){

            $data_arr[] = array(
                "id" => $record->id,
                "email" => $record->email,
                "funcao" => helperDescricaoFuncao($record->funcao)
            );
        }

        return array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );
    }
}
