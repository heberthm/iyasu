<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id')->required();
            $table->integer('id_cliente')->unsigned();  
            $table->string('num_control',3)->nullable();
            $table->string('peso',3)->nullable();
            $table->string('abd',3)->nullable();
            $table->string('grasa',3)->nullable();
            $table->string('agua',3)->nullable();

           
               //KEYS
            $table->index(['id_cliente']);
  
            $table->foreign('id_cliente')->references('id_cliente')->on('historias_clinicas')->onDelete('cascade')->onUpdate('cascade');


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
        Schema::dropIfExists('controles');
    }
}
