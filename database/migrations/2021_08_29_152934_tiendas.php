<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tiendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiendas', function (Blueprint $table){
            $table->id();
            $table->string('nombre_comercial');
            $table->string('razon_social');
            $table->string('rut_comercial');
            $table->string('correo');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('suscripcion_activa')->nullable();
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
