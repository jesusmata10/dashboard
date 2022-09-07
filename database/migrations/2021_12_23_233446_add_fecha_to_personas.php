<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFechaToPersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personas', function (Blueprint $table) {
            $table->date('fecha')->after('cedula');
            $table->string('lugarnac', 50)->nullable()->after('rif');
            $table->string('nacionalidad', 50)->nullable()->after('lugarnac');
            $table->string('sexo', 10)->nullable()->after('nacionalidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personas', function (Blueprint $table) {
            //
        });
    }
}
