@extends('template')
@section('conteudo')
<section class="container-fluid">
 <div class="row bg-light text-dark p-2 ">
  <div class="col-3">
   <a class="btn btn-secondary" href="{{route('cadastros.clientes')}}">Voltar</a>
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
        <h5>{{$cliente->rs_nome}}
          @if(empty($_GET['editar']))
          <a href="{{route('cadastros.ficha',$cliente->id).'?editar='.$cliente->id}}"><i class="material-icons  btn-secondary rounded">edit</i></a>
          @elseif(!empty($_GET['editar']))
          <a href="{{route('cadastros.ficha',$cliente->id)}}"><i class="material-icons  btn-info rounded">search</i></a>
          @endif
        </h5>
        <h6>({{$cliente->nf_apelido}})</h6>
      </div>
      <div class="col text-right">
        Atualizado em : {{date('d/m/Y H:i:s',strtotime($cliente->updated_at))}}
      </div>
    </div> 
  </div>
  <div>
    <div class="row p-2">
      @if(empty($_GET['editar']))
      <div class="col-md-6">
        <h6>Dados Gerais</h6><hr>
        <p><b>CPF/CNPJ: </b>{{($cliente->cpf_cnpj != '') ? $cliente->cpf_cnpj : '--------'}}</p>
        @if($cliente->tipo == 'PF')<p><b>RG: </b> {{($cliente->rg != '')? $cliente->rg : '--------'}}</p>@endif
        <p><b>Email: </b>{{($cliente->email != '') ? $cliente->email : '--------'}}</p>
        <p><b>Telefone: </b> {{($cliente->fone1 != '') ? $cliente->fone1 : '--------'}}
         {{($cliente->fone2 != '')? ' | '.$cliente->fone2 : ''}}
       </p>
       @if($cliente->tipo == 'PJ')
       <p><b>Inscrição Estadual: </b> {{($cliente->ins_estadual != '')? $cliente->ins_estadual : '--------'}}</p>
       <p><b>Inscrição Municipal: </b> {{($cliente->ins_municipal != '')? $cliente->ins_municipal : '--------'}}</p>
       @endif


     </div>
     <div class="col-md-6">
       <h6>Endereço</h6><hr>
       <p><b>Tipo: </b> {{$cliente->tipo_end}}</p>
       <p><b>CEP: </b> {{$cliente->cep}}</p>
       <p><b>Rua: </b> {{$cliente->rua}}</p>
       <p><b>Numero: </b> {{$cliente->numero}}</p>
       <p><b>Bairro: </b> {{$cliente->bairro}}</p>
       <p><b>Cidade: </b> {{$cliente->cidade.'/'.$cliente->uf}}</p>
     </div>
     <div class="col-md-12">
       <h6>Informações/Observações</h6><hr>
       <?php echo $cliente->info; ?>

     </div>
     <div class="col-md-12">
        <a class="btn btn-danger btn-block mt-5" href="{{route('cadastros.excluircliente',$cliente->id)}}"  onclick = "if (!confirm('Deseja continuar esta ação?')) return false;"> Excluir ficha de cliente</a>
     </div>
     @elseif(!empty($_GET['editar']) == $cliente->id)
   @include('cadastro.cliente.editar_cliente')
   @endif
   </div>
   
 </div>


</section>



<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
<script>
  $('#info').summernote({
    placeholder: 'Informações complementadores do cliente aqui',
    tabsize: 2,
    height: 100
  });
</script>
<script type="text/javascript">

  $(document).ready(function () {
    $("#cep").on("keypress", function(){
      var cepvalor = $(this).val();
      if( cepvalor.length == 5){  $(this).val(cepvalor + '-') }
    });

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

<script type="text/javascript" >

  $(document).ready(function() {

    function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
              }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                          if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                              }
                            });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                      }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                  }
                });
          });

        </script>
        @stop