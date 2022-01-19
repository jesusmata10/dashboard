<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personas_id');
            $table->string('estado_id');
            $table->string('ciudad_id');
            $table->string('municipio_id');
            $table->string('parroquia_id');
            $table->string('urbanizacion');
            $table->string('tzona');
            $table->string('nzona');
            $table->string('tcalle');
            $table->string('ncalle');
            $table->string('tvivienda');
            $table->string('nvivienda');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('personas_id')->references('id')->on('personas')->onUpdate('cascade')->onDelete('cascade');
            /*
            $table->id();
            $table->foreignId('personas_id');
            $table->foreignId('estado_id');
            $table->foreignId('ciudad_id');
            $table->foreignId('municipio_id');
            $table->foreignId('parroquia_id');
            $table->string('urbanizacion');
            $table->string('tzona');
            $table->string('nzona');
            $table->string('tcalle');
            $table->string('ncalle');
            $table->string('tvivienda');
            $table->string('nvivienda');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('personas_id')->references('id')->on('personas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('entidades');
            $table->foreign('municipio_id')->references('id')->on('municipios');
            $table->foreign('parroquia_id')->references('id')->on('parroquias');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            */

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direccion');
    }
}
