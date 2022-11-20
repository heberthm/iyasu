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
            $table->bigIncrements('id_abonos');
            $table->string('id_cliente',18)->unique()->required();
            $table->string('user_id')->required();
            $table->string('id_profesional',25)->required();
            $table->string('valor_abono',12)->nullable();
            $table->string('saldo',12)->nullable();
            $table->string('fecha_abono',12)->nullable();
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
        Schema::dropIfExists('abonos');
    }
}
