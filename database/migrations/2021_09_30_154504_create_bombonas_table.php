<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBombonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('bombonas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('nombres de las bombonas');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        Schema::create('kilo_bombonas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('');
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
        Schema::dropIfExists('bombonas');
    }
}
