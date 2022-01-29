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

    public static function consulta()
    {
        $data = DB::table('personas as p')
                    ->select( DB::raw( 'row_number() OVER (ORDER BY p.nombres) as num'), 'p.id', 'p.nombres', 'p.apellidos', 'p.personas_id', 'p.cedula', 'p.correo', 'p.rif', 'p.fecha', 'p.lugarnac', 'p.nacionalidad', 'p.celular', 'p.telefono_fijo', 'd.estado_id', 'd.ciudad_id', 'municipio_id', 'parroquia_id', 'urbanizacion', 'tzona', 'nzona', 'tcalle', 'ncalle', 'tvivienda', 'nvivienda')
                    ->join('direccion as d', 'd.personas_id', 'p.id' )
                    ->first();
        /*$data = DB::table('personas')
            ->join('direccion', 'personas.id', '=', 'direccion.personas_id')
            ->select('personas.*', 'direccion.*')
            ->first();*/

            return $data;
    }

    public static function carga_familiar()
    {
        $data = DB::table('personas as p')
                    ->select( DB::raw( 'row_number() OVER (ORDER BY p.nombres) as num'), 'p.id', 'p.nombres', 'p.apellidos', 'p.personas_id', 'p.cedula', 'p.correo', 'p.rif', 'p.fecha', 'p.lugarnac', 'p.nacionalidad', 'p.celular', 'p.telefono_fijo', 'p.parentezco')
                    ->join('direccion as d', 'd.personas_id', 'p.id', 'd.estado_id' )
                    //->where('personas_id', '=' , 'decrytp($id)')
                    ->first();

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
