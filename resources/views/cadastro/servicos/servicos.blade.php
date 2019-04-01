@extends('template')
@section('conteudo')
<section class="container-fluid">
 <div class="row bg-light text-dark p-2 ">
  <div class="col-3">
    <h5>Lista de Serviços</h5>
  </div>
  <div class="col-9">
    <ul class="nav justify-content-end">
      <li class="nav-item">
        <form method="GET" action="{{route('cadastros.servicos')}}">
       <div class="input-group">
        <input type="text" class="form-control" name="busca" placeholder="Pesquisar Serviço" >
        <div class="input-group-append">
          <button class="btn btn-secondary" type="button" id="button-addon2">Buscar</button>
        </div>
      </div>
    </form>
    </li>

  </ul>
</div>
</div>
</section>
<section class="container bg-light">
  <div class="mt-2 p-3 ">
    <div class="row p-2">
      
      <div class="col text-right">
        <button class="btn btn-dark" href="#" data-toggle="modal" data-target="#cadastro">
        Adicionar Serviço</button> 
      </div>
    </div>   


    @if(count($servicos) == 0)
    <div class="alert alert-info">
      Não há serviço cadastrado
    </div>
    @else
    <div class="table-responsive">
    <table class="table table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Código Interno</th>
          <th scope="col">Valor Unitário</th>
          <th scope="col">Comissão</th>
          <th scope="col">Cadastrado em</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($servicos as $servico)
        <tr>
          <th scope="row">{{$servico->id}}</th>
          <td>{{$servico->nome_servico}}</td>
          <td>{{$servico->codigo_interno}}</td>
          <td>{{$servico->valor}}</td>
          <td>{{$servico->comissao}}</td>
          <td>{{date('d/m/Y H:m:s',strtotime($servico->created_at))}}</td>
          <td>
            <a href="{{route('cadastros.verservico',$servico->id)}}"><i class="material-icons  btn-info rounded">search</i></a>
             <a href="{{route('cadastros.editarservico',$servico->id).'?editar='.$servico->id}}"><i class="material-icons  btn-secondary rounded">edit</i></a>
           
          </td>
        </tr>
        @endforeach
      </tbody>
    </table></div>
    @endif

    <nav>
  <ul class="pagination justify-content-center ">
    <li class="page-item  {{($servicos->currentPage() == 1) ? 'disabled' : ''}}">
      <a class="page-link" href="{{$servicos->previousPageUrl($servicos->currentPage()-1)}}" tabindex="-1">Anterior</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">{{$servicos->currentPage()}}</a></li>
    <li class="page-item"><a class="page-link" href="#">de</a></li>
    <li class="page-item"><a class="page-link" href="#">{{$servicos->lastPage()}}</a></li>
    <li class="page-item {{( $servicos->lastPage() ==  $servicos->currentPage() ) ? 'disabled' : ''}}">
      <a class="page-link" href="{{$servicos->nextPageUrl($servicos->currentPage()+1)}}">Próximo</a>
    </li>
  </ul>
</nav>
  </div>

  
</section>

<div class="modal fade" id="cadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Serviço</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-warning">
          Os campos marcados com * são de preenchimento obrigatório
        </div>
        <form method="GET" action="{{route('cadastros.novoservico')}}" id="form-cad">
         <h5>Dados Gerais</h5><hr>
        
        <div class="form-row">
          <div class="form-group col-md-6">
            <label id="nome_servico">* Nome do serviço</label>
            <input type="text" name="nome_servico" class="form-control" required="">
          </div>
          <div class="form-group col-md-6">
            <label id="codigo_interno">* Codigo Interno</label>
            <input type="text" name="codigo_interno" class="form-control" required="">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label id="valor">Valor unitário</label>
            <input type="number" name="valor" class="form-control" required="">
          </div>
          <div id="comissao" class="form-group col-md-6">
            <label >Comissão</label>
            <input  type="number" name="comissao" class="form-control" >
          </div>
        </div>
          
           <h5>Informações/observações</h5> <hr>
        <div id="" class="form-group ">
          <textarea id="info" class="form-control" name="observacoes"></textarea>
        </div>
        <button class="btn btn-primary btn-block" >Salvar</button>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

    </div>
  </div>
</div>
</div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
<script>
  $('#info').summernote({
    placeholder: 'Informações complementadores do cliente aqui',
    tabsize: 2,
    height: 100
  });
</script>

        @stop