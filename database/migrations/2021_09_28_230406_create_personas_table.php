<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('apellidos')->length(255);
            $table->string('nombres')->length(255);
            $table->string('cedula')->length(10);
            $table->string('telefono_fijo')->length(15);
            $table->string('celular')->length(15);
            $table->string('correo')->length(255);
            $table->string('rif')->length(10);
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('personas');
    }
}
