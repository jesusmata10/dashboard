<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;

    protected $table = "personas";

    protected $fillable = [

        'nombres',
        'apellidos',
        'cedula',
        'fecha',
        'telefono_fijo',
        'celular',
        'correo',
        'rif',
        'lugarnac',
        'nacionalidad',
        'personas_id',
        'parentezco'

    ];

    protected $hidden = [

        'created_at',
        'updated_at',
    ];


}
