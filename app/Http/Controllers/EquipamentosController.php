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

    public function destroy($id)
    {
        Equipamentos::destroy($id);
        return redirect()->back();
    }

    public function edit(Equipamentos $equipamento)
    {
        return view('editarEquipamento', compact('equipamento'));
    }

    public function update(Equipamentos $equipamento)
    {   
        $equipamento->update(request(['nome', 'usuario', 'processador', 'ram', 'hd', 'ethernet', 'ip', 'ipfixo']));
        return redirect('/'. $equipamento->clientes_id.'/equipamento');
    }
}
