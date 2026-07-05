<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vendidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendidos', function (Blueprint $table){
            $table->id();
            $table->string('tipo');
            $table->string('detalle');
            $table->integer('total');
            $table->string('tipo_de_pago');
            $table->string('tienda');
            $table->integer('comanda');
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
        //
    }
}
