<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $table = 'direccion';

    protected $fillable = [

        'personas_id',
        'estado_id',
        'municipio_id',
        'ciudad_id',
        'parroquia_id',
        'urbanizacion',
        'tzona',
        'nzona',
        'tcalle',
        'ncalle',
        'tvivienda',
        'nvivienda',
        'status'


    ];

    protected $hidden = [

        'created_at',
        'updated_at'

    ];

}
