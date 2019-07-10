<?php

namespace atenagestao\Http\Controllers;

use Illuminate\Http\Request;
use atenagestao\Orcamento;

class OrcamentoController extends Controller
{
     public function index(Request $get)
    {        
    if($get->busca){
            $orcamentos =  Orcamento::where('nome_servico', 'like', '%'.$get->busca.'%')->Paginate(10);
        }else{
            $orcamentos = Orcamento::Paginate(10);
        }
      
    	return view('orcamento.orcamentos')->with(compact('orcamentos'));
    }

    public function cadastrar(Request $request)
    {
          	return view('orcamento.adicionar_orcamento');
    }

     public function novo(Request $request)
    {
        $orca = Orcamento::create($request->all());
        $orca ->fill(['situacao' => 'aberto']);
        $orca ->save();
   
        return redirect(route('orcamento.orcamentos'));
    }
}



