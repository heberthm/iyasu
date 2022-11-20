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
            $table->bigIncrements('id_control');
            $table->string('id_cliente')->required();
            $table->string('user_id')->required();
            $table->string('peso',3)->nullable();
            $table->string('abd',3)->nullable();
            $table->string('grasa',3)->nullable();
            $table->string('agua',3)->nullable();
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
