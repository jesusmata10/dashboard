<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    use HasFactory;

    protected $table = "municipios";

    protected $fillable = [

        'entidad_id',
        'nombre_municipio',
        'estatus',

    ];

    protected $hidden = [

        'created_at',
        'updated_at,'

    ];

    protected $attributes = [
        'estatus' => true
    ];
}

