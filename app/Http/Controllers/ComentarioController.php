<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentarios;

class ComentarioController extends Controller
{
    public function __construct () 
    {
    	$this->middleware('auth');
    }

    public function create (Comentarios $comentarios)
    {
    	$comentarios = request()->validate(['ordemId' => 'required', 'userId' => 'required', 'comentario' => 'required']);
    	Comentarios::Create($comentarios);

    	return redirect()->back();
    }
}
