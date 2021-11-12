<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->unique();
            $table->string('peso');
            $table->string('tamaño');
            $table->integer('cantidad');
            $table->foreignId('tipo_id');
            $table->foreignId('marca_id');
            $table->string('estado');
            $table->timestamps();

            $table->foreign('tipo_id')->references('id')->on('tipo_materiales');
            $table->foreign('marca_id')->references('id')->on('marcas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiales');
    }
}
