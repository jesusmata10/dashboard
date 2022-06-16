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
            $table->unsignedBigInteger('personas_id');
            $table->string('primer_nombre', 50);
            $table->string('segundo_nombre', 50)->nullable();
            $table->string('primer_apellido', 50);
            $table->string('segundo_apellido', 50)->nullable();
            $table->string('cedula', 10)->unique();
            $table->string('telefono_fijo', 15)->nullable();
            $table->string('celular', 15);
            $table->string('correo', 255)->unique();
            $table->string('rif', 14)->nullable();
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('user_create_id')->nullable();
            $table->string('parentesco')->nullable();
            $table->string('vocero_id', 255)->nullable();
            $table->timestamps();
            $table->foreign('personas_id')->references('id')->on('personas');
            $table->foreign('user_create_id')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
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
