<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendaModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda_models', function (Blueprint $table) {
            $table->id();
            $table->integer('cliente_id')->unsigned();
            $table->integer('remedio_models_id')->unsigned();
            $table->date("data_venda");
            $table->time("hora_venda");
            $table->integer('funcionario_models_id')->unsigned();
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
        Schema::dropIfExists('venda_models');
    }
}
