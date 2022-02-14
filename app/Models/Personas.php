<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        'parentesco',
        'user_id'

    ];

    protected $hidden = [

        'created_at',
        'updated_at',
    ];

    public static function consulta($id)
    {
        $data = DB::table('personas as p')
            ->select(DB::raw('row_number() OVER (ORDER BY p.nombres) as num'), 'p.id', 'p.nombres', 'p.apellidos', 'p.personas_id', 'p.cedula', 'p.correo', 'p.rif', 'p.fecha', 'p.lugarnac', 'p.nacionalidad', 'p.celular', 'p.telefono_fijo', 'e.estado', 'd.ciudad_id', 'ciu.ciudad', 'd.municipio_id', 'm.municipio', 'parroquia_id', 'pa.parroquia', 'urbanizacion', 'tzona', 'tz.nombre as zona', 'nzona', 'tcalle', 't.nombre as calle', 'ncalle', 'tvivienda', 'tv.nombre as vivienda', 'nvivienda')
            ->join('direccion as d', 'd.personas_id', 'p.id')
            ->join('entidades as e', 'e.id', 'd.estado_id')
            ->join('ciudades as ciu', 'ciu.id', 'd.ciudad_id')
            ->join('municipios as m', 'm.id', 'd.municipio_id')
            ->join('parroquias as pa', 'pa.id', 'd.parroquia_id')
            ->join('tzonas as tz', 'tz.id', 'd.tzona')
            ->join('tcalles as t', 't.id', 'd.tcalle')
            ->join('tviviendas as tv', 'tv.id', 'd.tvivienda')
            ->where('p.id', '=', $id)
            ->first();

        return $data;
    }

    public static function carga_familiar($id)
    {
        $data = DB::table('personas as p')
            ->select(DB::raw('row_number() OVER (ORDER BY p.nombres) as num'), 'p.id', 'p.nombres', 'p.apellidos', 'p.personas_id', 'p.cedula', 'p.correo', 'p.fecha', 'p.lugarnac', 'p.nacionalidad', 'p.celular', 'p.telefono_fijo', 'p.parentesco')
            ->where('p.personas_id', '=', $id)
            ->get();

        return $data;
    }

    public static function sqlReport($search)
    {
        $datatable = DB::table('personas as p') ->select(DB::raw('row_number() OVER (ORDER BY p.nombres) as num'), 'p.id', 'p.nombres', 'p.apellidos', 'p.personas_id', 'p.cedula', 'p.correo', 'p.rif', 'p.fecha', 'p.lugarnac', 'p.nacionalidad', 'p.celular', 'p.telefono_fijo', 'e.estado', 'd.ciudad_id', 'ciu.ciudad', 'd.municipio_id', 'm.municipio', 'parroquia_id', 'pa.parroquia', 'urbanizacion', 'tzona', 'tz.nombre as zona', 'nzona', 'tcalle', 't.nombre as calle', 'ncalle', 'tvivienda', 'tv.nombre as vivienda', 'nvivienda')
            ->join('direccion as d', 'd.personas_id', 'p.id')
            ->join('entidades as e', 'e.id', 'd.estado_id')
            ->join('ciudades as ciu', 'ciu.id', 'd.ciudad_id')
            ->join('municipios as m', 'm.id', 'd.municipio_id')
            ->join('parroquias as pa', 'pa.id', 'd.parroquia_id')
            ->join('tzonas as tz', 'tz.id', 'd.tzona')
            ->join('tcalles as t', 't.id', 'd.tcalle')
            ->join('tviviendas as tv', 'tv.id', 'd.tvivienda');
            //->where('p.id', '=', $id)

        if ($search->nombres != null) {
            $datatable->where('p.nombres', $search->nombres);
        }

        if ($search->apellidos != null) {
            $datatable->where('p.apellidos', $search->apellidos);
        }

         if ($search->cedulas != null) {
            $datatable->where('pr.cedula', $search->cedulas);
        }

        return $datatable->orderBy('cedula')->distinct()->get();
    }

}
