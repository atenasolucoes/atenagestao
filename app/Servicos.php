<?php

namespace atenagestao;

use Illuminate\Database\Eloquent\Model;

class Servicos extends Model
{
   protected  $fillable = ['user_id', 'nome_servico', 'codigo_interno', 'valor', 'comissao', 'observacoes'];
}
