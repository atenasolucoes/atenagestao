<?php

namespace atenagestao;

use Illuminate\Database\Eloquent\Model;

class Servicos extends Model
{
   protected  $fillable = [ 'nome_servico', 'codigo_interno', 'valor', 'comissao', 'observacoes'];
}
