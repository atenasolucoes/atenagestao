<?php

namespace atenagestao;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{

  protected  $fillable = [ 'tipo','situacao', 'nf_apelido', 'rs_nome', 'cpf_cnpj', 'rg', 'ins_estadual', 'ins_municipal'];
}
