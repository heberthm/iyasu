<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerapiasAdicionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terapias_adicionales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id')->required();
            $table->string('terapias_adicionales',380)->nullable();
            $table->string('valor_terapia',12)->nullable();
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
        Schema::dropIfExists('terapias_adicionales');
    }
}
