<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cidade_id');
            $table->unsignedBigInteger('plano_id');
            $table->unsignedBigInteger('cobrador_id');
            $table->unsignedBigInteger('vendedor_id');
            $table->unsignedBigInteger('vencimento_id');

            $table->string('codigo');
            $table->string('nome');
            $table->string('rg');
            $table->string('cpf');
            $table->string('data_nascimento')->nullable();
            $table->string('contato');

            $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->foreign('plano_id')->references('id')->on('planos');
            $table->foreign('cobrador_id')->references('id')->on('cobradors');
            $table->foreign('vendedor_id')->references('id')->on('vendedors');
            $table->foreign('vencimento_id')->references('id')->on('vencimentos');

            $table->timestamps();
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
