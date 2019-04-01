<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->string('situacao');
            $table->string('nf_apelido');
            $table->string('rs_nome');
            $table->string('cpf_cnpj')->nullable();
            $table->string('rg')->nullable();
            $table->string('fone1')->nullable();
            $table->string('fone2')->nullable();
            $table->string('email')->nullable();
            $table->string('ins_estadual')->nullable();
            $table->string('ins_municipal')->nullable();
            $table->string('tipo_end')->nullable();
            $table->string('cep')->nullable();
            $table->string('numero')->nullable();
            $table->string('rua')->nullable();
             $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->longtext('info')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
