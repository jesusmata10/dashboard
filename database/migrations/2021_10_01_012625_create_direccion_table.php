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
            $table->foreignId('entidades_id');
            $table->foreignId('municipios_id');
            $table->foreignId('parroquias_id');
            $table->string('urbanizacion');
            $table->string('tzona');
            $table->string('nzona');
            $table->string('tcalle');
            $table->string('ncalle');
            $table->string('tvivienda');
            $table->string('nvivienda');
            $table->timestamps();

            $table->foreign('personas_id')->references('id')->on('personas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('entidades_id')->references('id')->on('entidades');
            $table->foreign('municipios_id')->references('id')->on('municipios');
            $table->foreign('parroquias_id')->references('id')->on('parroquias');
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
