
 <form method="GET" action="{{route('cadastros.editarficha', $cliente->id)}}" id="form-cad">
         <h5>Infomações pessoais/empresariais</h5><hr>
         <div class="form-row">

          <div class="form-group col-md-6">
            <label>* Tipo de cliente</label>
            <select id="tipo" class="form-control" name="tipo" required="">
              <option value="{{$cliente->tipo}}">{{$cliente->tipo}}</option>
              <option value="PF">Pessoa Fisíca (PF)</option>
              <option value="PJ">Pessoa Jurídica (PJ)</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label> * Situação</label>
            <select class="form-control" name="situacao" required="">
              <option value="{{$cliente->situacao}}">{{$cliente->situacao}}</option>
              <option value="ativo">Ativo</option>
              <option value="inativo">Inativo</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label id="nf_apelido">* Apelido</label>
            <input type="text" name="nf_apelido" class="form-control" required="" value="{{$cliente->nf_apelido}}">
          </div>
          <div class="form-group col-md-6">
            <label id="rs_nome">* Nome</label>
            <input type="text" name="rs_nome" class="form-control" required="" value="{{$cliente->rs_nome}}" >
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label id="cpf_cnpj">CPF</label>
            <input type="text" name="cpf_cnpj" class="form-control" required="" value="{{$cliente->cpf_cnpj}}">
          </div>
          <div id="rg" class="form-group col-md-6">
            <label >RG</label>
            <input  type="text" name="rg" class="form-control" value="{{$cliente->rg}}" >
          </div>
          <div id="ins_e" class="form-group col-md-6 ">
            <label >Inscrição Estadual</label>
            <input  type="text" name="ins_estadual" class="form-control" value="{{$cliente->ins_estadual}}" >
          </div>
          <div id="ins_m" class="form-group col-md-6 ">
            <label >Inscrição Municipal</label>
            <input  type="text" name="ins_municipal" class="form-control" value="{{$cliente->ins_municipal}}">
          </div>

          <div class="form-group col-md-6">
            <label >E-mail</label>
            <input type="text" name="email" class="form-control"value="{{$cliente->email}}" >
          </div>
          <div  class="form-group col-md-6">
            <label >Telefone 1</label>
            <input id="fone1" type="text" name="fone1" data-id="#fone1"  class="form-control" value="{{$cliente->fone1}}">
          </div>
          <div id="ins_e" class="form-group col-md-6 ">
            <label >Telefone 2</label>
            <input id="fone2" type="text" name="fone2" data-id="#fone2" class="form-control" value="{{$cliente->fone2}}">
          </div>
          
        </div>
        <h5>Endereço</h5> <hr>
        <h6>Principal</h6>
        <div class="form-row">

          <div class="form-group col-md-3">
            <label>Tipo</label>
            <select id="tipo_end" class="form-control" name="tipo_end" required="">
              <option value="{{$cliente->tipo_end}}">{{$cliente->tipo_end}}</option>
              <option value="residencial">Residencial</option>
              <option value="comercial">Comercial</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label>CEP</label>
            <input id="cep" type="text" name="cep"  class="form-control" value="{{$cliente->cep}}" >
          </div>
          <div class="form-group col-md-4">
            <label>Rua</label>
            <input id="rua" type="text" name="rua"  class="form-control" value="{{$cliente->rua}}">
          </div>
          <div class="form-group col-md-2">
            <label>N°</label>
            <input id="numero" type="text" name="numero"  class="form-control" value="{{$cliente->numero}}" >
          </div>
          <div class="form-group col-md-3">
            <label>Bairro</label>
            <input id="bairro" type="text" name="bairro"  class="form-control" value="{{$cliente->bairro}}">
          </div>
          <div class="form-group col-md-4">
            <label>Cidade</label>
            <input id="cidade" type="text" name="cidade"  class="form-control" value="{{$cliente->cidade}}">
          </div>
          <div class="form-group col-md-2">
            <label>UF</label>
            <input id="uf" type="text" name="uf"  class="form-control" value="{{$cliente->uf}}" >
          </div>
        </div>
        <h5>Informações/observações</h5> <hr>
        <div id="" class="form-group ">
          <textarea id="info" class="form-control" name="info">{{$cliente->info}}</textarea>
        </div>
        <button class="btn btn-primary btn-block" >Salvar</button>
      </form>

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
         if( valor.length == 10){  $(this).val( valor + '-') }


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

