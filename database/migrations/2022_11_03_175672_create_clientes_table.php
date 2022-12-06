<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id_cliente');
            $table->string('cedula',18)->unique()->required();
            $table->string('user_id')->required();
            $table->date('fecha_nacimiento',18)->required();
            $table->string('edad',14)->required();
            $table->string('nombre',60)->required();
            $table->string('direccion',150)->nullable();
            $table->string('barrio',60)->nullable();
            $table->string('municipio',60)->nullable();
            $table->string('celular',30)->nullable();
            $table->string('email',60)->nullable();
            $table->string('estado',14)->nullable();

                                                
            $table->timestamps();
            $table->softDeletes();

    
        });
    }


    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
        
    }
}
