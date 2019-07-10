<?php

namespace atenagestao\Http\Controllers;

use Illuminate\Http\Request;
use atenagestao\Servicos;
use atenagestao\User;
use Illuminate\Support\Facades\Auth;

class ServicosController extends Controller
{
    public function index(Request $get)
    {
    	if($get->busca){
            $servicos =  Servicos::where('nome_servico', 'like', '%'.$get->busca.'%')->Paginate(10);
        }else{
            $servicos = Servicos::Paginate(10);
        }
    	return view('cadastro.servicos.servicos')->with(compact('servicos'));
    }

    public function cadastrar(Request $request)
    {
       $servico = Servicos::create($request->all());
    	return redirect(route('cadastros.servicos'));
    }
   
    public function editar(Request $request, $id)
    {
        $cliente = Servicos::find($id);
        $cliente->update($request->all());
        $cliente->save();
        return redirect(route('cadastros.verservico',$id));
    }
      public function verservico($id)
    {
        $servico = Servicos::find($id);
        return view('cadastro.servicos.editar_servico')->with(compact('servico'));
    }

    public function excluir($id)
    {
    	$delete = Servicos::find($id);
    	$delete->delete();
    	return redirect(route('cadastros.servicos'));
    }
}
