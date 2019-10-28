<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clientes;

class PagesController extends Controller
{
    public function index() {

    	return view('index' , ['clientes' => clientes::all()]);

    }
}
