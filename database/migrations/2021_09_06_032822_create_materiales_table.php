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
            $table->string('nombre', 50);
            $table->string('peso');
            $table->string('tamaño');
            $table->integer('cantidad');
            $table->string('estado');
            $table->foreignId('tipo_id');
            $table->foreignId('marca_id');
            $table->foreignId('proveedor_id');
            $table->timestamps();

            $table->foreign('tipo_id')->references('id')->on('tipo_materiales');
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('proveedor_id')->references('id')->on('proveedores');



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
