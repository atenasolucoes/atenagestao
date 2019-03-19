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
              <a class="nav-link text-dark" href="#" data-toggle="modal" data-target="#cadastro">Cadastrar</a>
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
    @endif
  </div>
  
</section>

<div class="modal fade" id="cadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form method="GET" action="#" id="form-cad">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" required="">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Senha</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Senha">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Endereço</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Endereço 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartamento, hotel, casa, etc.">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Cidade</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEstado">Estado</label>
      <select id="inputEstado" class="form-control">
        <option selected>Escolher...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputCEP">CEP</label>
      <input type="text" class="form-control" id="inputCEP">
    </div>
  </div>
  
  <button class="btn btn-primary btn-block" >Salvar mudanças</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        
      </div>
    </div>
  </div>
</div>
@stop