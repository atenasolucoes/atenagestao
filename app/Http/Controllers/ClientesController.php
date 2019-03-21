<?php

namespace atenagestao\Http\Controllers;

use Illuminate\Http\Request;
use atenagestao\Clientes;

class ClientesController extends Controller
{
    public function index()
    {
    	$clientes = Clientes::all();
    	return view('cadastro.cliente.clientes')->with(compact('clientes'));
    }

    public function cadastrar(Request $request)
    {
    	Clientes::create($request->all());
    	return redirect(route('cadastros.clientes'));
    }

      public function ficha($id)
    {
        $cliente = Clientes::find($id);
        return view('cadastro.cliente.fichacliente')->with(compact('cliente'));
    }

    public function excluir($id)
    {
    	$delete = Clientes::find($id);
    	$delete ->delete();
    	return redirect(route('cadastros.clientes'));
    }
}
