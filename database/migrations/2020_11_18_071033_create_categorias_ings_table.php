<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasIngsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias_ings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('detalle');
            //$table->mediumInteger('subcategorias_id')->default(0); 
            $table->mediumInteger('subcategorias_id'); 
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
        Schema::dropIfExists('categorias_ings');
    }
}
