<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;;
use App\Ordens;
use Illuminate\Support\Facades\Crypt;

class OrdensController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Ordens $ordens)
    {

        $desencriptar = Crypt::decrypt(request('clientes_id'));
        Request::merge(['clientes_id' => $desencriptar]);
        $novaOrdem = request()->validate([

        	'clientes_id' => 'required',
        	'servico' => 'required',
        	'dataServico' => 'required',
        	'valor' => 'required',
        	'pago' => 'required',
            'estado' => 'required',
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
        $ordem->update(request(['servico', 'dataServico', 'valor', 'pago', 'estado','observacao']));
        return redirect('/'. $ordem->clientes_id.'/edit');
    }


    public function destroy($id)
    {
    	Ordens::destroy($id);
    	return redirect()->back();
    }
}
