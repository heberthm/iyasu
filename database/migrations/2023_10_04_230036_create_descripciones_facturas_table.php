<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescripcionesFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descripciones_facturas', function (Blueprint $table) {
          
            $table->id();

            $table->unsignedBiginteger('id_facturas')->unsigned();
            $table->unsignedBiginteger('id_descripciones')->unsigned();

            $table->foreign('id_facturas')->references('id')
                  ->on('facturas')->onDelete('cascade');

            $table->foreign('id_descripciones')->references('id')
                ->on('descripciones')->onDelete('cascade');



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
        Schema::dropIfExists('descripciones_facturas');
    }
}
