@extends('template')
@section('conteudo')
<section class="container-fluid">
 <div class="row bg-light text-dark ">
  <div class="col p-1">
    <h5>Clientes</h5>
  </div>
  <div class="col">
    <ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link text-dark" href="#">Pesquisar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="#" data-toggle="modal" data-target="#cadastro">
        Cadastrar</a>
      </li>

    </ul>
  </div>
</div>
</section>
<section class="container bg-light">
  <div class="mt-2 p-3">
    <h6>Lista do Clientes</h6>
    @if(count($clientes) == 0)
    <div class="alert alert-info">
      Não há cliente cadastrado
    </div>
    @else
    <table class="table table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Tipo</th>
          <th scope="col">Situação</th>
          <th scope="col">Cadastrado em</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($clientes as $cliente)
        <tr>
          <th scope="row">{{$cliente->id}}</th>
          <td>{{$cliente->rs_nome}}</td>
          <td>{{($cliente->tipo == 'PF') ? 'Pessoa Física' : 'Pessoa Jurídica'}}</td>
          <td>{{$cliente->situacao}}</td>
          <td>{{date('d/m/Y H:m:s',strtotime($cliente->created_at))}}</td>
          <td>
            <i class="material-icons  btn-info rounded">search</i>
            <i class="material-icons  btn-secondary rounded">edit</i>
            <a href="{{route('cadastros.excluircliente',$cliente->id)}}"><i class="material-icons  btn-danger rounded">clear</i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>

  
</section>

<div class="modal fade" id="cadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-warning">
          Os campos marcados com * são de preenchimento obrigatório
        </div>
        <form method="GET" action="{{route('cadastros.novocliente')}}" id="form-cad">
         <div class="form-row">
          <div class="form-group col-md-6">
            <label>* Tipo de cliente</label>
            <select id="tipo" class="form-control" name="tipo" required="">
              <option value="">Selecione</option>
              <option value="PF">Pessoa Fisíca (PF)</option>
              <option value="PJ">Pessoa Jurídica (PJ)</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label> * Situação</label>
            <select class="form-control" name="situacao" required="">
              <option value="">Selecione</option>
              <option value="ativo">Ativo</option>
              <option value="inativo">Inativo</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label id="nf_apelido">* Apelido</label>
            <input type="text" name="nf_apelido" class="form-control" required="">
          </div>
          <div class="form-group col-md-6">
            <label id="rs_nome">* Nome</label>
            <input type="text" name="rs_nome" class="form-control" required="">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label id="cpf_cnpj">CPF</label>
            <input type="text" name="cpf_cnpj" class="form-control" required="">
          </div>
          <div id="rg" class="form-group col-md-6">
            <label >RG</label>
            <input  type="text" name="rg" class="form-control" >
          </div>
          <div id="ins_e" class="form-group col-md-6 ">
            <label >Inscrição Estadual</label>
            <input  type="text" name="ins_estadual" class="form-control" >
          </div>
          <div id="ins_m" class="form-group col-md-6 ">
            <label >Inscrição Municipal</label>
            <input  type="text" name="ins_municipal" class="form-control" >
          </div>
       
          <div class="form-group col-md-6">
            <label >E-mail</label>
            <input type="text" name="email" class="form-control" >
          </div>
          <div  class="form-group col-md-6">
            <label >Telefone 1</label>
            <input id="fone1" type="text" name="fone1" data-id="#fone1"  class="form-control" >
          </div>
          <div id="ins_e" class="form-group col-md-6 ">
            <label >Telefone 2</label>
            <input id="fone2" type="text" name="fone2" data-id="#fone2" class="form-control" >
          </div>
         
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
<script type="text/javascript">

  $(document).ready(function () {
$("input").on("keypress", function(){
var c = $(this).data('id');
var valor = $(c).val();
if( valor.length == 1){  $(this).val('(' + valor) }
if( valor.length == 3){  $(this).val( valor + ') ') }
if( valor.length == 10){  $(this).val( valor + '- ') }


 });

    $("#ins_e").hide();
    $("#ins_m").hide();

   $("#tipo").on("change", function(){
    var tipo = $(this).val();   
    
    if (tipo == "PJ") {
      $("#nf_apelido").text("* Nome Fantasia");
      $("#rs_nome").text("* Razão Social");
      $("#cpf_cnpj").text("CNPJ");
      $("#rg").hide();
      $("#ins_e").show();
      $("#ins_m").show();
    } else {
     $("#nf_apelido").text("* Apelido");
     $("#rs_nome").text("* Nome");
     $("#cpf_cnpj").text("CPF");
     $("#rg").show();
      $("#ins_e").hide();
        $("#ins_m").hide();
   }

 });

 });
</script>
@stop