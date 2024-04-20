<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function iniciogen()
    {
        return view('incios.principal_gen');
    }
}
