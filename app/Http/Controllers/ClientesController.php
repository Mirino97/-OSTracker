<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clientes;

class ClientesController extends Controller
{

    public function create()
    {

        $teste = request()->validate([

            'nome' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'email' => ['required', 'email:rfc'],
            'cnpj' => 'required'

        ]);
        
        try {

            clientes::Create($teste);

        } 
        catch (\Exception $e) {

            switch ($e) {
                case ($e->errorInfo['0'] === '23000'):
                return redirect('/')->withErrors('Este e-mail já está cadastrado! Código do erro: '.$e->errorInfo['0']);
                break;
                    
                default:
                return redirect('/')->withErrors('Oops! Um erro aconteceu! Favor encaminhar o código para um técnico responsável. Código: '.$e->getMessage().'.');
            break;
            }
        }

        return redirect('/');

    }
            // Why can't this be $cliente direto?
    public function edit(clientes $id)
    {
        $cliente = $id;
        return view('editar', compact('cliente'));
    }

    public function update(clientes $id)
    {   
        $id->update(request(['nome', 'telefone', 'endereco', 'email', 'cnpj']));
        return redirect('/');
    }


    public function destroy($id)
    {
        clientes::destroy($id);
        return redirect()->back();
    }
}
