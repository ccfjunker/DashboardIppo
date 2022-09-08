<?php

namespace App\Http\Controllers\API\ImportExportExcel;

use App\Http\Controllers\Controller;
use App\Imports\ImportAnamnese;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportExcelController extends Controller
{
    public function import(Request $request)
    {
        Excel::import(new ImportAnamnese(), request()->file('import_file'));
        return response()->json('Registros importados com sucesso', 200);


    }
}
