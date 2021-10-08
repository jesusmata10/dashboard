<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Tcalle extends Model
{
    use HasFactory;

    protected $fillable = [

        'nombre',

    ];

    protected $hidden = [

        'created_at',
        'updated_at',

    ];

    public static function consulta()
    {
        $data = DB::table('tcalles')
                    ->select( DB::raw( 'row_number() OVER (ORDER BY nombre) as numero'), 'id', 'nombre')
                    ->get();

                    return $data;
    }
}
