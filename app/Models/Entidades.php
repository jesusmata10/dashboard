<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidades extends Model
{
    use HasFactory;

    protected $table = "entidades";

    protected $fillable = [

        'codigo_entidad',
        'nombre_entidad',
        'estatus',

    ];

    protected $hidden = [

        'created_at',
        'updated_at',

    ];

    protected $attributes = [
        'estatus' => true
    ];
}

