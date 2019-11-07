<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ordens;

class OrdensController extends Controller
{

    public function store(ordens $ordens)
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


    public function show(ordens $ordens)
    {	
   
        return view('/{id}/edit', compact('ordens'));
    }

    public function edit($id)
    {

    }

    // 
    public function update(clientes $id)
    {   

    }


    public function destroy($id)
    {
    	ordens::destroy($id);
    	return redirect()->back();
    }
}
