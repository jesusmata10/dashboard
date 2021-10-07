<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroquias extends Model
{
    use HasFactory;

    protected $table = "parroquias";

    protected $fillable = [

        'municipio_id',
        'nombre_parroquia',
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
