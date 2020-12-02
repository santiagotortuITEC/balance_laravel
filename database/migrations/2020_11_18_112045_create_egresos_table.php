<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEgresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egresos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->mediumInteger('valor');
            $table->string('detalle');
            //$table->mediumInteger('categorias_ings_id')->default(0); 
            $table->integer('categorias_ings_id')->unsigned()->nullable(false)->onDelete('cascade')->constrained();
            $table->timestamps();
        });

        Schema::table('egresos', function($table) {
            $table->foreign('categorias_ings_id')
                ->references('id')->on('categorias_ings') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('egresos');
    }
}
