<?php

namespace atenagestao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clientes extends Model
{

 use SoftDeletes;

  protected  $fillable = [ 'tipo','situacao', 'nf_apelido', 'rs_nome', 'cpf_cnpj', 'rg','fone1', 'fone2','email', 'ins_estadual', 'ins_municipal', 'tipo_end', 'cep', 'numero','rua', 'bairro','cidade','uf','info'];

  public function orcamento()
    {
    	  return $this->hasMany('atenagestao\Orcamento', 'cliente_id');
    }

}
