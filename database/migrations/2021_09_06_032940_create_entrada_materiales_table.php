<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradaMaterialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_materiales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('material_id');
            $table->foreignId('entrada_id');
            $table->integer('cantidadMat');
            $table->timestamps();

            $table->foreign('entrada_id')->references('id')->on('entradas');
            $table->foreign('material_id')->references('id')->on('materiales');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrada_materiales');
    }
}
