<?php

namespace atenagestao;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{

  protected  $fillable = [ 'tipo','situacao', 'nf_apelido', 'rs_nome', 'cpf_cnpj', 'rg','fone1', 'fone2','email', 'ins_estadual', 'ins_municipal', 'tipo_end', 'cep', 'numero','rua', 'bairro','cidade','uf','info'];
}
