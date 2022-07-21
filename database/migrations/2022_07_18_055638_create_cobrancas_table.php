<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCobrancasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobrancas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('confirma_pagamento_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('periodo_id');
            $table->string('ano');



            $table->foreign('confirma_pagamento_id')->references('id')->on('confirma_pagamentos');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('periodo_id')->references('id')->on('periodos');
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
        Schema::dropIfExists('cobrancas');
    }
}
