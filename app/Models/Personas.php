<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Personas extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'cedula',
        'fecha',
        'telefono_fijo',
        'celular',
        'email',
        'rif',
        'lugarnac',
        'nacionalidad',
        'personas_id',
        'user_create_id',
        'parentesco',
        'user_id',
        'vocero_id',
        'sexo',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $with = [
        'carnet', 'direccion',
    ];

    public function carnet(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Carnet::class);
    }

    public function direccion(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Direccion::class);
    }

    public static function consulta($id)
    {
        return DB::table('personas as p')
            ->select(DB::raw('row_number() OVER (ORDER BY p.cedula) as num'), 'p.id', 'p.primer_nombre', 'p.segundo_nombre', 'p.primer_apellido', 'p.segundo_apellido', 'p.personas_id', 'p.cedula', 'p.email', 'p.rif', 'p.fecha', 'p.lugarnac', 'p.nacionalidad', 'p.celular', 'p.telefono_fijo', 'e.estado', 'd.estado_id', 'd.ciudad_id', 'ciu.ciudad', 'd.municipio_id', 'm.municipio', 'parroquia_id', 'pa.parroquia', 'urbanizacion', 'tzona', 'tz.nombre as zona', 'nzona', 'tcalle', 't.nombre as calle', 'ncalle', 'tvivienda', 'tv.nombre as vivienda', 'nvivienda')
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
    }

    public static function carga_familiar($id)
    {
        return DB::table('personas as p')
            ->select(DB::raw('row_number() OVER (ORDER BY p.cedula) as num'), 'p.id', 'p.primer_nombre', 'p.segundo_nombre', 'p.primer_apellido', 'p.segundo_apellido', 'p.personas_id', 'p.cedula', 'p.email', 'p.fecha', 'p.lugarnac', 'p.nacionalidad', 'p.celular', 'p.telefono_fijo', 'p.parentesco')
            ->where('p.personas_id', '=', $id)
            ->get();
    }

    public static function sqlReport($search)
    {
        $datatable = DB::table('personas as p')
            ->select(
                DB::raw('row_number() OVER (ORDER BY p.cedula) as num'),
                'p.id',
                'p.primer_nombre',
                'p.segundo_nombre',
                'p.primer_apellido',
                'p.segundo_apellido',
                'p.personas_id',
                'p.cedula',
                'p.email',
                'p.rif',
                'p.fecha',
                'p.lugarnac',
                'p.nacionalidad',
                'p.celular',
                'p.telefono_fijo',
                'e.estado',
                'd.ciudad_id',
                'ciu.ciudad',
                'd.municipio_id',
                'm.municipio',
                'parroquia_id',
                'pa.parroquia',
                'urbanizacion',
                'tzona',
                'tz.nombre as zona',
                'nzona',
                'tcalle',
                't.nombre as calle',
                'ncalle',
                'tvivienda',
                'tv.nombre as vivienda',
                'nvivienda'
            )
            ->join('direccion as d', 'd.personas_id', 'p.id')
            ->join('entidades as e', 'e.id', 'd.estado_id')
            ->join('ciudades as ciu', 'ciu.id', 'd.ciudad_id')
            ->join('municipios as m', 'm.id', 'd.municipio_id')
            ->join('parroquias as pa', 'pa.id', 'd.parroquia_id')
            ->join('tzonas as tz', 'tz.id', 'd.tzona')
            ->join('tcalles as t', 't.id', 'd.tcalle')
            ->join('tviviendas as tv', 'tv.id', 'd.tvivienda')
            ->where('p.personas_id', '=', 0);

        if ($search->cedula != null) {
            $datatable->where('p.cedula', $search->cedula);
        }

        if ($search->primer_nombre != null) {
            $datatable->where('p.primer_nombre', $search->primer_nombre);
        }

        if ($search->segundo_nombre != null) {
            $datatable->where('p.segundo_nombre', $search->segundo_nombre);
        }

        if ($search->primer_apellido != null) {
            $datatable->where('p.primer_apellido', $search->primer_apellido);
        }

        if ($search->segundo_apellido != null) {
            $datatable->where('p.segundo_apellido', $search->segundo_apellido);
        }

        return $datatable->orderBy('p.cedula')->distinct();
    }
}
