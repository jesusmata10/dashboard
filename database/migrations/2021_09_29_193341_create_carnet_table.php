<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarnetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('carnet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personas_id');
            $table->string('serial')->unique()->length(10);
            $table->string('codigo')->unique()->length(10);
            $table->boolean('status')->default(true);
            $table->foreignId('user_id');
            $table->timestamps();

            $table->foreign('personas_id')->references('id')->on('personas')
              ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carnet');
    }
}
