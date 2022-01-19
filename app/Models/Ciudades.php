<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
    use HasFactory;

    protected $table = 'ciudades';

    protected $fillable = [

        'estado_id',
        'ciudad',
        'capital',
        'status'

    ];

    protected $hidden = [

        'created_at',
        'updated_at',

    ];

}
