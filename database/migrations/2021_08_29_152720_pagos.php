<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pagos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->string('tienda');
            $table->string('enero')->nullable();
            $table->string('febrero')->nullable();
            $table->string('marzo')->nullable();
            $table->string('abril')->nullable();
            $table->string('mayo')->nullable();
            $table->string('junio')->nullable();
            $table->string('julio')->nullable();
            $table->string('agosto')->nullable();
            $table->string('septiembre')->nullable();
            $table->string('octubre')->nullable();
            $table->string('noviembre')->nullable();
            $table->string('diciembre')->nullable();
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
