<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrarTratamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrar_tratamiento', function (Blueprint $table) {
            $table->bigIncrements('id_tratamiento');
            $table->string('id_cliente')->required();
            $table->string('user_id')->required();
            $table->string('nombre',60)->nullable();
            $table->string('celular',25)->nullable();
            $table->string('tratamiento',400)->nullable();
            $table->string('valor_tratamiento',12)->nullable();
            $table->string('responsable',40)->nullable();
          
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
        Schema::dropIfExists('registrar_tratamiento');
    }
}
