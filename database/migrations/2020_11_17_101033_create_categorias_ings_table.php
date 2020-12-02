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
            $table->increments('id');
            $table->string('nombre');
            $table->string('detalle');
            //$table->mediumInteger('subcategorias_id')->default(0); 
            //$table->mediumInteger('subcategorias_id'); 
            $table->integer('subcategorias_id')->unsigned()->nullable(false)->onDelete('cascade')->constrained();

            $table->timestamps();
        });
        Schema::table('categorias_ings', function($table) {
            $table->foreign('subcategorias_id')
                ->references('id')->on('subcategorias') ;
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
