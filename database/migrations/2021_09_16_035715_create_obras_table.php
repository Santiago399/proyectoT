<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('fechaInicio');
            $table->string('fechaEntrega');
            $table->string('estado');
            $table->string('cantidadMaterial');
            $table->string('tipoMaterial');
            $table->foreignId('cliente_id');
            $table->foreignId('categoria_id');
            $table->foreignId('usuario_id');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('usuario_id')->references('id')->on('usuarios');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obras');
    }
}
