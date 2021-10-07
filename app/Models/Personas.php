<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;

    protected $table = "personas";

    protected $fillable = [

        'apellidos',
        'nombres',
        'cedula',
        'telefono_fijo',
        'celular',
        'correo',
        'rif',

    ];

    protected $hidden = [

        'created_at',
        'updated_at',

    ];
}
