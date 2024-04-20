<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    public function iniciotec()
    {
        return view('incios.principal_tec');
    }
}
