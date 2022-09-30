<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataTableRequest;
use App\User;

class ListDataTableController extends Controller
{
    protected $draw;
    protected $start;
    protected $rowperpage;
    protected $columnIndex_arr;
    protected $columnName_arr;
    protected $search_arr;
    protected $order_arr;
    protected $columnName;
    protected $columnIndex;
    protected $columnSortOrder;
    protected $searchValue;
    protected $totalRecords;
    protected $totalRecordswithFilter;

    protected function getList(DataTableRequest $request, $className, $whereArray = array()){
        $this->draw = $request->get('draw');
        $this->start = $request->get("start");
        $this->rowperpage = $request->get("length"); // Rows display per page

        $this->columnIndex_arr = $request->get('order');
        $this->columnName_arr = $request->get('columns');
        $this->order_arr = $request->get('order');
        $this->search_arr = $request->get('search');

        $this->columnIndex = $this->columnIndex_arr[0]['column']; // Column index
        $this->columnName = $this->columnName_arr[$this->columnIndex]['data']; // Column name
        $this->columnSortOrder = $this->order_arr[0]['dir']; // asc or desc
        $this->searchValue = $this->search_arr['value']; // Search value

        // Total records
        $modelCount = $className::select('count(*) as allcount');
        foreach ($whereArray as $key => $value){
            $modelCount->where($key, $value['operador'], $value['valor']);
        }
        $this->totalRecords = $modelCount->count();
        $this->totalRecordswithFilter = $modelCount->count();

        // Fetch records
        $modelRecords =  $className::orderBy($this->columnName,$this->columnSortOrder)
            ->skip($this->start)
            ->take($this->rowperpage);

        foreach ($whereArray as $key => $value){
            $modelRecords->where($key, $value['operador'], $value['valor']);
        }

        return $modelRecords->get();
    }

}
