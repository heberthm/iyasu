<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosHonorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos_honorarios', function (Blueprint $table) {
            $table->bigIncrements('id_cliente');
            $table->string('cedula',18)->unique()->required();
            $table->string('user_id')->required();
            $table->string('id_profesional',25)->required();
            $table->string('valor_pago',60)->nullable();
            $table->string('fecha_pago',60)->nullable();
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
        Schema::dropIfExists('pagos');
    }
}
