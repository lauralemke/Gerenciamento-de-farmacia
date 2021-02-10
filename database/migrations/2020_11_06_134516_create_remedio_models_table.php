<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemedioModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remedio_models', function (Blueprint $table) {
            $table->id();
            $table->string("nome", 100);
            $table->string("faixa_preta", 3);
            $table->string("generico", 3);
            $table->string("forma", 100);
            $table->string("indicacao", 100);
            $table->string("preco", 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remedio_models');
    }
}
