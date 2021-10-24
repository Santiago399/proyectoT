<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DatatableController extends Controller
{

    public function usuario(){
        $usuarios = User::select('id', 'name', 'email')->get();

        return datatables()->of($usuarios)->toJson();
    }

}
