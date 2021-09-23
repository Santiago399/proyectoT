<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipoMaterialController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
}
