<?php

namespace atenagestao;

use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
 protected  $fillable = ['cliente_id', 'data', 'previsao_entrega', 'responsavel', 'aos_cuidados', 'validade','introducao', 'situacao','created_at', 'updated_at'];
 
	
    public function cliente()
    {
    	  return $this->belongsTo('atenagestao\Clientes', 'cliente_id')->withTrashed();
    }

    
}

