<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonosClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonos_clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_cliente')->nullable();
            $table->string('user_id')->nullable();
            $table->unsignedBigInteger('id_tratamiento')->nullable();
            $table->string('nombre',60)->nullable();
            $table->string('celular',25)->nullable();
            $table->string('valor_tratamiento',12)->nullable();
            $table->string('saldo_actual',12)->nullable();
            $table->string('valor_abono',12)->nullable();
            $table->string('saldo',12)->nullable();
            $table->string('responsable',40)->nullable();
            $table->string('descripcion',120)->nullable();
            $table->string('estado',20)->nullable();

            $table->timestamps();

                //KEYS
                $table->index(['id_tratamiento']);
  
                $table->foreign('id_tratamiento')->references('id')->on('registrar_tratamientos')->onDelete('cascade')->onUpdate('cascade');
    


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abonos');
    }
}
