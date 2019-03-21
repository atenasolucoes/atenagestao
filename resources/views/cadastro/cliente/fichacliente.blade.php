@extends('template')
@section('conteudo')
<section class="container-fluid">
 <div class="row bg-light text-dark p-2 ">
  <div class="col-3">
   <a class="btn btn-secondary" href="{{route('cadastros.clientes')}}">Voltar</a>
  </div>
  <div class="col-9">
    <ul class="nav justify-content-end">
      <li class="nav-item">
       <div class="input-group">
        <input type="text" class="form-control" placeholder="Pesquisar Cliente" >
        <div class="input-group-append">
          <button class="btn btn-secondary" type="button" id="button-addon2">Buscar</button>
        </div>
      </div>
    </li>

  </ul>
</div>
</div>
</section>
<section class="container bg-light">
  <div class="mt-2 p-3">
    <div class="row p-2">
      <div class="col">
        <h5>{{$cliente->rs_nome}}</h5>
      </div>
    </div> 
  </div>
  <div>
    <div class="row p-2">
      <div class="col">
        <p><b>Tipo: </b> {{$cliente->tipo}}</p>
        <p><b>Situação: </b> {{$cliente->situacao}}</p>
      </div>

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