<?php

namespace App\Http\Controllers\API\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Anamnese;
use Illuminate\Http\Request;

class AnamneseAPIController extends Controller
{
    public function index()
    {
        return Anamnese::with(['empresa'])->get();
    }
}
