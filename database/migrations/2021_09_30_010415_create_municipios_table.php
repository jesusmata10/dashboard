<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entidad_id');
            $table->string('codigo_entidad', 2);
            $table->string('codigo_municipio', 2);
            $table->string('nombre_municipio', 255);
            $table->boolean('estatus')->default(true);
            $table->timestamps();
            $table->foreign('entidad_id')->references('id')->on('entidades')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipios');
    }
}
