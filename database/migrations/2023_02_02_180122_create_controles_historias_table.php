<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlesHistoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controles_historias', function (Blueprint $table) {
           
        $table->unsignedBigInteger('id_control');
        $table->unsignedBigInteger('id_historia');

        $table->foreign('id_control')->references('id')->on('controles')->onDelete('cascade');
        $table->foreign('id_historia')->references('id')->on('historias_clinicas')->onDelete('cascade');

        //PRIMARY KEYS
        $table->primary(['id_control','id_historia']);
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
        Schema::dropIfExists('controles_historias');
    }
}
