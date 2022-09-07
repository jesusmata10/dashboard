<?php

namespace Database\Seeders;

use App\Models\Tcalle;
use App\Models\Tvivienda;
use App\Models\Tzona;
use Illuminate\Database\Seeder;

class ParametroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zona1 = new Tzona();
        $zona1->nombre = 'sector';
        $zona1->save();

        $zona2 = new Tzona();
        $zona2->nombre = 'manzana';
        $zona2->save();

        $calle1 = new Tcalle();
        $calle1->nombre = 'vereda';
        $calle1->save();

        $calle2 = new Tcalle();
        $calle2->nombre = 'calle';
        $calle2->save();

        $hogar1 = new Tvivienda();
        $hogar1->nombre = 'casa';
        $hogar1->save();
    }
}
