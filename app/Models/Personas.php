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
        'parentezco'

    ];

    protected $hidden = [

        'created_at',
        'updated_at',
    ];

    public static function consulta($id)
    {
        $data = DB::table('personas as p')
                    ->select( DB::raw( 'row_number() OVER (ORDER BY p.nombres) as num'), 'p.id', 'p.nombres', 'p.apellidos', 'p.personas_id', 'p.cedula', 'p.correo', 'p.rif', 'p.fecha', 'p.lugarnac', 'p.nacionalidad', 'p.celular', 'p.telefono_fijo', 'e.estado', 'd.ciudad_id', 'ciu.ciudad', 'd.municipio_id', 'm.municipio', 'parroquia_id', 'pa.parroquia', 'urbanizacion', 'tzona', 'tz.nombre as zona', 'nzona', 'tcalle', 't.nombre as calle', 'ncalle', 'tvivienda', 'tv.nombre as vivienda', 'nvivienda')
                    ->join('direccion as d', 'd.personas_id', 'p.id')
                    ->join('entidades as e', 'e.id', 'd.estado_id')
                    ->join('ciudades as ciu', 'ciu.id', 'd.ciudad_id')
                    ->join('municipios as m', 'm.id', 'd.municipio_id')
                    ->join('parroquias as pa', 'pa.id', 'd.parroquia_id')
                    ->join('tzonas as tz', 'tz.id', 'd.tzona' )
                    ->join('tcalles as t', 't.id', 'd.tcalle')
                    ->join('tviviendas as tv', 'tv.id', 'd.tvivienda')
                    ->where('p.id', '=', $id)
                    ->first();

            return $data;
    }

    public static function carga_familiar($id)
    {
        //$data = Personas::all()->where('personas_id', '=', $id);
        $data = DB::table('personas as p')
                    ->select( DB::raw( 'row_number() OVER (ORDER BY p.nombres) as num'), 'p.id', 'p.nombres', 'p.apellidos', 'p.personas_id', 'p.cedula', 'p.correo', 'p.fecha', 'p.lugarnac', 'p.nacionalidad', 'p.celular', 'p.telefono_fijo', 'p.parentezco')
                    ->where('p.personas_id', '=', $id)
                    ->get();

                    return $data;
    }

    /*public static function sqlReport($search)
    {
        $datatable = DB::table('productos as p')->select( DB::raw( 'row_number() OVER (ORDER BY p.nombre) as num'), 'p.id', 'p.nombre as producto_nombre', 'p.precio', 'p.proveedores_id', 'p.url', 'pr.nombre')
        ->join('proveedores as pr', 'pr.id', 'p.proveedores_id');

        if ($search->nombre != null) {
            $datatable->where('p.nombre', $search->nombre);
        }

        if ($search->precio != null) {
            $datatable->where('p.precio', $search->precio);
        }

         if ($search->nombres!= null) {
            $datatable->where('pr.nombre', $search->nombres);
        }

        return $datatable->orderBy('p.nombre')->distinct()->get();
    }*/
/*
     public static function consulta()
    {
        $data = DB::table('productos as p')
                    ->select( DB::raw( 'row_number() OVER (ORDER BY p.nombre) as num'), 'p.id', 'p.nombre', 'p.precio', 'p.proveedores_id', 'pr.nombre as nombre_proveedor')
                    ->join('proveedores as pr', 'pr.id', 'p.proveedores_id')
                    ->get();

                    return $data;
    }

    public static function sqlReport($search)
    {
        $datatable = DB::table('productos as p')->select( DB::raw( 'row_number() OVER (ORDER BY p.nombre) as num'), 'p.id', 'p.nombre as producto_nombre', 'p.precio', 'p.proveedores_id', 'p.url', 'pr.nombre')
        ->join('proveedores as pr', 'pr.id', 'p.proveedores_id');

        if ($search->nombre != null) {
            $datatable->where('p.nombre', $search->nombre);
        }

        if ($search->precio != null) {
            $datatable->where('p.precio', $search->precio);
        }

         if ($search->nombres!= null) {
            $datatable->where('pr.nombre', $search->nombres);
        }

        return $datatable->orderBy('p.nombre')->distinct()->get();
    }
    */

}
