<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidades', function (Blueprint $table) {
            $table->id();
            $table->string('estado', 50);
            $table->string('iso_3166-2', 25);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * INSERT PARA MYSQL
     *
     *
     *
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (1, 1, 'Amazonas');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (2, 2, 'Anzoátegui');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (3, 3, 'Apure');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (4, 4, 'Aragua');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (5, 5, 'Barinas');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (6, 6, 'Bolívar');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (7, 7, 'Carabobo');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (8, 8, 'Cojedes');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (9, 9, 'Delta Amacuro');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (10, 10, 'Falcón');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (11, 11, 'Guárico');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (12, 12, 'Lara');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (13, 13, 'Mérida');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (14, 14, 'Miranda');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (15, 15, 'Monagas');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (16, 16, 'Nueva Esparta');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (17, 17, 'Portuguesa');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (18, 18, 'Sucre');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (19, 19, 'Táchira');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (20, 20, 'Trujillo');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (21, 21, 'Vargas');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (22, 22, 'Yaracuy');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (23, 23, 'Zulia');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (24, 24, 'Distrito Capital');
    INSERT INTO `entidades` (`id`, `codigo_entidad`, `nombre_entidad`) VALUES (25, 25, 'Dependencias Federales');
    */

    /**
     * Reverse the migrations.
     *
     *
     * *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entidades');
    }
}
