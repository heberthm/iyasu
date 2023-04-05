<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosContablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros_contables', function (Blueprint $table) {
            $table->id();
            $table->text('saldo',12)->nullable();
            $table->text('ingreso',12)->nullable();
            $table->text('egreso',12)->nullable();
            $table->text('responsable',100)->nullable();
            $table->text('descripcion',250)->nullable();
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
        Schema::dropIfExists('registros_contable');
    }
}
