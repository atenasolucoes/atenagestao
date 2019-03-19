<?php

namespace atenagestao;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{

  protected  $fillable = [ 'tipo', 'nf_apelido', 'rs_nome', 'cpf_cpnj', 'rg', 'ins_estadual', 'ins_municipal'];
}
