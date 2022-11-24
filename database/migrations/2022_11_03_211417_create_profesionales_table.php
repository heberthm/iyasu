<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesionales', function (Blueprint $table) {
            $table->bigIncrements('id_profesional');
            $table->string('user_id')->required();
            $table->string('id_cliente')->required();
            $table->string('id_pagos')->required();
            $table->string('cedula',18)->unique()->required();
            $table->string('nombre',60)->required();
            $table->string('profesion',60)->required();
            $table->string('fecha_nacimiento',60)->nullable();
            $table->string('celular',30)->nullable();
            $table->string('porcentaje',30)->nullable();

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
        Schema::dropIfExists('profesionales');
    }
}
