<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Carnet extends Model
{
    use HasFactory;

    protected $table = 'carnet';

    protected $fillable = [
        'personas_id', 'serial', 'codigo', 'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function consulta($search)
    {
        $data = DB::table('carnet as c')
            ->select(DB::raw('row_number() OVER (ORDER BY p.cedula) as num'), 'p.id', 'p.nombres', 'p.apellidos', 'p.cedula', 'c.serial', 'c.codigo', 'c.personas_id')
            ->join('personas as p', 'p.id', 'c.personas_id');

        if (null != $search->cedula) {
            $data->where('p.cedula', $search->cedula);
        }

        return $data->orderBy('p.cedula')->distinct()->get();
    }


}
