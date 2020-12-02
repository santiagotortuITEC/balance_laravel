<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsEgresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_egresos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreitem'); 
            $table->mediumInteger('cantidaditem'); 
           // $table->mediumInteger('egreso_id');   
            $table->integer('egreso_id')->unsigned()->nullable(false)->onDelete('cascade')->constrained();
            $table->timestamps();
        });

        Schema::table('items_egresos', function($table) {
            $table->foreign('egreso_id')
                ->references('id')->on('egresos') ;
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_egresos');
    }
}
