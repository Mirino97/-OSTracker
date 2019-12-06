<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use App\Equipamentos;

class EquipamentosController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Clientes $id)
    {	
    	$cliente = $id;
    	$clientes_id = $cliente->id;
    	$equipamentos = Equipamentos::all()->where('clientes_id', $clientes_id);
    	//dd($equipamento->get('id'));
        return view('equipamentos', compact('cliente', 'equipamentos'));
    }

    public function create(request $equipamento)
    {	
    	$novoEquipamento = request()->validate([

        	'clientes_id' => 'required',
        	'nome' => 'required',
        	'usuario' => 'nullable',
        	'processador' => 'nullable',
        	'ram' => 'nullable',
        	'hd' => 'nullable',
        	'ethernet' => 'nullable',
        	'ip' => 'nullable',
        	'ipfixo' => 'nullable',
        	'programas' => 'nullable',
        ]);
        Equipamentos::Create($novoEquipamento);

        return redirect()->back();
    }
}
