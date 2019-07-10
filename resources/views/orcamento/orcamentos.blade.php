@extends('template')
@section('conteudo')
<section class="container-fluid">
  <div class="row bg-light text-dark p-2 ">
    <div class="col-3">
      <h5>Orçamentos</h5>
    </div>
    <div class="col-9">
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <form method="GET" action="">
            <div class="input-group">
              <input type="text" class="form-control" name="busca" placeholder="Pesquisar Serviço">
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
        <a class="btn btn-dark" href="{{route('orcamento.adicionar')}}">
          Adicionar Orçamento</a>
      </div>
    </div>

    @if(count($orcamentos) == 0)
    <div class="alert alert-info">
      Não há orçamento cadastrado
    </div>
    @else

    <div class="table-responsive">
      <table class="table table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Cliente</th>
            <th scope="col">Data</th>
            <th scope="col">Previsão de entrega</th>
            <th scope="col">Situacão</th>
            <th scope="col">Valor</th>
            <th scope="col">Data de emissão</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orcamentos as $orcamento)
          <tr>
            <th scope="row">{{$orcamento->id}}</th>
            <td><a href="{{route('cadastros.ficha',$orcamento->cliente->id)}}">{{$orcamento->cliente->rs_nome}}</a></td>
            <td>{{date('d/m/Y',strtotime($orcamento->data))}}</td>
            <td>{{$orcamento->previsao_entrega}}</td>
            <td>{{$orcamento->situacao}}</td>
            <td>{{$orcamento->valor}}</td>
            <td>{{date('d/m/Y H:m:s',strtotime($orcamento->created_at))}}</td>
            <td>


            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
    @endif


  </div>


</section>


@stop