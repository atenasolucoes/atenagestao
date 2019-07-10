@extends('template')
@section('conteudo')
@inject('clientes','atenagestao\Clientes')
<section class="container-fluid">
 <div class="row bg-light text-dark p-2 ">
  <div class="col-3">
    <h5>Adicionar orçamento</h5>
  </div>
  <div class="col-9">
    <ul class="nav justify-content-end">
      <li class="nav-item">

      </li>

    </ul>
  </div>
</div>
</section>
<section class="container bg-light">
  <div class="mt-2 p-3 ">
    <div class="alert alert-warning">
      Os campos marcados com * são de preenchimento obrigatório
    </div>

    <h6>Dados gerais</h6> 

    <form method="POST" action="{{route('orcamento.adicionarnovo')}}" class="">
      {{csrf_field()}}
      <div class="form-row">
        <div class="form-group col-md-3">
          <label>Cliente*</label>
          <select class="form-control" required="" name="cliente_id">
          <option value="">Escolha o cliente</option>        
           <?php foreach ($c = $clientes->all() as $cliente) { ?>
            <option value="{{$cliente->id}}">{{$cliente->rs_nome.' | '.$cliente->situacao}}</option>
          <?php }; ?>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label>Data*</label>
        <input class="form-control" type="date" name="data" value="{{date('Y-m-d')}}">
      </div>
      <div class="form-group col-md-3">
        <label>Previsão de Entrega</label>
        <input class="form-control" type="date" name="previsao_entrega">
      </div>
      <div class="form-group col-md-3">
        <label>Responsavel</label>
        <input class="form-control" type="text" name="responsavel">
      </div>
      <div class="form-group col-md-3">
        <label>Aos cuidados de </label>
        <input class="form-control" type="text" name="aos_cuidados">
      </div>
      <div class="form-group col-md-3">
        <label>Validade </label>
        <input class="form-control" type="text" name="validade" >
      </div>
      <div class="form-group col-md-12">
        <label>Introdução </label>
        <textarea class="form-control" type="text" name="introducao" id="info" >            </textarea>
        <small>Esse texto irá  aparecer no início  da proposta para o cliente, caso não queira inserir basta deixar em branco</small>
      </div>
      <h6>Serviços</h6>
      <div class="form-row form-servico">
        <div class="form-group col-md-3">
          <label>Serviço* </label>
          <input class="form-control" type="text" name="">
        </div>
        <div class="form-group col-md-2">
          <label>Detalhes </label>
          <input class="form-control" type="text" name="">
        </div>
        <div class="form-group col-md-2">
          <label>Quantidade* </label>
          <input class="form-control" type="text" name="">
        </div>
        <div class="form-group col-md-2">
          <label>Valor* </label>
          <input class="form-control" type="text" name="">
        </div>
        <div class="form-group col-md-1">
          <label>Desconto </label>
          <input class="form-control" type="text" name="">
        </div>
        <div class="form-group col-md-1">
          <label>Subtotal </label>
          <input class="form-control" type="text" name="">
        </div>
        <div class="form-group col-md-1">
          <label>Del </label><br>
          <button type="button" class="botao-servico" >x</button>
        </div>
      </div>
     
      <div>
        <button id="servico" type="button">Adicionar outro serviço</button>
      </div>



    </div>
    <button>Adicinar orçamento</button>
  </form>



</div>


</section>

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
<script>
  $('#info').summernote({
    placeholder: 'Informações complementadores do cliente aqui',
    tabsize: 2,
    height: 200
  });
</script>
<script type="text/javascript">
  $(document).ready(function () {
    var i =1;
    $(".form-servico").attr('id',i);
    $(".botao-servico").attr('id',i);
    $("#servico").click(function(){
      var form = $(".form-servico").html();
      $(".form-servico").append(form);
      $(".form-servico:last").attr('id',i++);
       $(".botao-servico").attr('id',i++);
    });

  });
</script>



@stop