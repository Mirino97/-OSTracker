<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ordens;

class OrdensController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Ordens $ordens)
    {
        $novaOrdem = request()->validate([

        	'clientes_id' => 'required',
        	'servico' => 'required',
        	'dataServico' => 'required',
        	'valor' => 'required',
        	'pago' => 'required',
        	'observacao' => 'nullable',
        ]);
        try {

            $ordens->addOrdens($novaOrdem);

        } catch (\Exception $e) {
        	 switch ($e) {   

                default:
                    return redirect('/')->withErrors('Oops! Um erro aconteceu! Favor encaminhar o código para um técnico responsável. Código: '.$e->getMessage().'.');
                    break;
            }
        }

            return redirect()->back();

    }


    public function show(Ordens $ordens)
    {	
        return view('/{id}/edit', compact('ordens'));
    }

    public function edit(Ordens $ordem)
    {
        return view('editarOrdem', compact('ordem'));
    }

    public function update(Ordens $ordem)
    {   
        $ordem->update(request(['servico', 'dataServico', 'valor', 'pago', 'observacao']));
        return redirect('/'. $ordem->clientes_id.'/edit');
    }


    public function destroy($id)
    {
    	ordens::destroy($id);
    	return redirect()->back();
    }
}
