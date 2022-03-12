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

    /*public function personas()
    {
        return $this->belongsTo(personas::class);
    }*/

    public static function consulta($search)
    {
        $data = DB::table('carnet as c')
            ->select(DB::raw('row_number() OVER (ORDER BY p.cedula) as num'), 'p.id', 'p.nombres', 'p.apellidos', 'p.cedula', 'c.serial', 'p.celular', 'c.codigo', 'c.personas_id')
            ->join('personas as p', 'p.id', 'c.personas_id');

        if ($search->cedula != null) {
            $data->where('p.cedula', $search->cedula);
        }

        if ($search->serial != null) {
            $data->where('c.serial', $search->serial);
        }

        if ($search->codigo != null) {
            $data->where('c.codigo', $search->codigo);
        }

        return $data->orderBy('p.cedula')->distinct();
    }

    public static function sqlreport($texto)
    {
        $sqlreport = DB::table('carnet as c')
            ->select(
                DB::raw('row_number() OVER (ORDER BY p.cedula) as num'),
                'p.id',
                'p.nombres',
                'p.apellidos',
                'p.cedula',
                'p.celular',
                'c.serial',
                'c.codigo',
                'c.personas_id'
            )
            ->join('personas as p', 'p.id', 'c.personas_id')
            ->where('p.cedula', 'LIKE', '%' . $texto->cedula . '%')
            //->orwhere('c.serial', 'LIKE', '%' . $texto->serial . '%')
            //->orwhere('c.codigo', 'LIKE', '%' . $search->codigo . '%')
            ->orderBy('p.cedula', 'asc');

        return $sqlreport;
    }
}
