@extends('template')
@section('conteudo')
<section class="container-fluid">
 <div class="row bg-light text-dark p-2 ">
  <div class="col-3">
   <a class="btn btn-secondary" href="{{route('cadastros.servicos')}}">Voltar</a>
 </div>
 <div class="col-9">
  

</ul>
</div>
</div>
</section>
<section class="container bg-light">
  <div class="mt-2 p-3">
    <div class="row p-2">
      <div class="col">
        <h5>{{$servico->nome_servico}}
          @if(empty($_GET['editar']))
          <a href="{{route('cadastros.verservico',$servico->id).'?editar='.$servico->id}}"><i class="material-icons  btn-secondary rounded">edit</i></a>
          <script type="text/javascript">
            $(document).ready(function () {
              $('form input').prop('readonly', true);
               $('form textarea').prop('readonly', true);
                $('form button').prop('disabled', true);
            })
          </script>
          @elseif(!empty($_GET['editar']))
          <a href="{{route('cadastros.verservico',$servico->id)}}"><i class="material-icons  btn-info rounded">search</i></a>
           <script type="text/javascript">
            $(document).ready(function () {
              $('form input').prop('readonly', false);
               $('form textarea').prop('readonly', false);
                $('form button').prop('disabled', false);
            })
          </script>
          @endif
        </h5>
      </div>
      <div class="col text-right">
        Atualizado em : {{date('d/m/Y H:i:s',strtotime($servico->updated_at))}}
      </div>
    </div> 
  </div>
 
    <div class=" p-2">
      <div class="alert alert-warning">
          Os campos marcados com * são de preenchimento obrigatório
        </div>
        <form method="GET" action="{{route('cadastros.editarservico',$servico->id)}}" id="form-cad">
         <h5>Dados Gerais</h5><hr>
        
        <div class="form-row">
          <div class="form-group col-md-6">
            <label id="nome_servico">* Nome do serviço</label>
            <input type="text" name="nome_servico" class="form-control" required="" value="{{$servico->nome_servico}}">
          </div>
          <div class="form-group col-md-6">
            <label id="codigo_interno">* Codigo Interno</label>
            <input type="text" name="codigo_interno" class="form-control" required="" value="{{$servico->codigo_interno}}">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label id="valor">Valor unitário</label>
            <input type="number" name="valor" class="form-control" required="" value="{{$servico->valor}}" step=0.01>
          </div>
          <div id="comissao" class="form-group col-md-6">
            <label >Comissão</label>
            <input  type="number" name="comissao" class="form-control" value="{{$servico->nome_servico}}" step=0.01 >
          </div>
        </div>
          
           <h5>Informações/observações</h5> <hr>
        <div id="" class="form-group ">
          <textarea id="info" class="form-control" name="observacoes"> {{$servico->observacoes}}</textarea>
        </div>
        <button class="btn btn-primary btn-block" >Editar</button>
      </form>
   </div>
   <div>
      <a class="btn btn-danger btn-block mt-5" href="{{route('cadastros.excluirservico',$servico->id)}}"  onclick = "if (!confirm('Deseja continuar esta ação?')) return false;"> Excluir serviço</a>
   </div>



</section>



<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
<script>
  $('#info').summernote({
    placeholder: 'Informações complementadores do serviço aqui',
    tabsize: 2,
    height: 100,
  });
</script>

<script type="text/javascript">

 $(document).ready(function () {
   $('input').keypress(function (e) {
        var code = null;
        code = (e.keyCode ? e.keyCode : e.which);                
        return (code == 13) ? false : true;
   });

}); 

</script>


        @stop