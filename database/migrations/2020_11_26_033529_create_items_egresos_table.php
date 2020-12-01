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
            //$table->unsignedBigInteger('egreso_id');
            $table->mediumInteger('egreso_id');  
            
            //$table->foreign('egreso_id')->references('id')->on('egresos');
             
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
        Schema::dropIfExists('items_egresos');
    }
}
