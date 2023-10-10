<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descripciones', function (Blueprint $table) {
        
            $table->id();
            $table->string('id_cliente')->required();
            $table->string('user_id')->required();
            $table->string('no_factura')->required();
            $table->string('nombre',60)->nullable();
            $table->string('celular',30)->nullable();
            $table->string('responsable',40)->nullable();
            $table->string('estado',20)->nullable();
            $table->string('saldo',12)->nullable();
         
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
        Schema::dropIfExists('descripciones');
    }
}
