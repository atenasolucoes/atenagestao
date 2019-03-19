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
            $table->string('nf_apelido');
            $table->string('rs_nome');
            $table->string('cpf_cpnj')->nullable();
            $table->string('rg')->nullable();
            $table->string('ins_estadual')->nullable();
            $table->string('ins_municipal')->nullable();
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