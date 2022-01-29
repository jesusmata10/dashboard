<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entidades;
use App\Models\Tzona;
use App\Models\Tcalle;
use App\Models\Tvivienda;
use App\Models\Personas;
use App\Models\Direccion;
use Illuminate\Support\Facades\DB;
//use Carbon\Carbon;
//use Illuminate\Support\Str;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $persona = Personas::all()->where('personas_id', '=', 0);
        $carga_familiar = DB::table('personas')
                ->where('personas_id', '=', $request->id)
                ->get();
        //dd($persona);
        return view('persona.index', compact('persona', 'carga_familiar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entidad = Entidades::all();
        $zonas = Tzona::all();
        $area = Tcalle::all();
        $hogar = Tvivienda::all();


        return view('persona.create', compact('entidad', 'zonas', 'area', 'hogar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$date = $request->fecha;
        //$date = Carbon::now();
        //$fecha = $date->format('Y-m-d');
        //dd($request);


        try {
            //$date = $date->format('Y-m-d');

            $input = $request->all();
            $input['personas_id'] = 0;
            $input['parentezco'] = 'Jefe de hogar';
            //$input['estado_id'] = $request->estado_id == '' ? '0' : '0';
            $input['status'] = 1;
            //dd($input);
            $solicitud = Personas::create($input);

            /*$direccion = Direccion::create($input);*/
            //$direccion['personas_id'] = $solicitud->id;

            $personaDireccionSave = new Direccion();
            $personaDireccionSave->personas_id = $solicitud->id;
            $personaDireccionSave->estado_id = $request->estado_id;
            $personaDireccionSave->ciudad_id = $request->ciudad_id;
            $personaDireccionSave->municipio_id = $request->municipio_id;
            $personaDireccionSave->parroquia_id = $request->parroquia_id;
            $personaDireccionSave->urbanizacion = $request->urbanizacion;
            $personaDireccionSave->tzona = $request->tzona;
            $personaDireccionSave->nzona = $request->nzona;
            $personaDireccionSave->tcalle = $request->tcalle;
            $personaDireccionSave->ncalle = $request->ncalle;
            $personaDireccionSave->tvivienda = $request->tvivienda;
            $personaDireccionSave->nvivienda = $request->nvivienda;
            $personaDireccionSave->status = 1;
            $personaDireccionSave->save();

            if(isset($request->personaTemp)){
                foreach($request->personaTemp as $familia){
                    $servicios = json_decode($familia);

                    $familiaSave = new Personas();
                    $familiaSave->personas_id = $solicitud->id;
                    $familiaSave->nombres = $servicios->nombres;
                    $familiaSave->apellidos = $servicios->apellidos;
                    $familiaSave->cedula = $servicios->cedula;
                    $familiaSave->fecha = $servicios->fecha;
                    $familiaSave->correo = $servicios->correo = '' ? '$solicitud->correo' : '0';
                    $familiaSave->rif = $servicios->rif = '' ? 'solicitud->rif' : '0';
                    $familiaSave->lugarnac = 0;
                    $familiaSave->nacionalidad = 0;
                    $familiaSave->telefono_fijo = 0;
                    $familiaSave->celular = $solicitud->celular;
                    //$familiaSave->rif = 'null';
                    $familiaSave->parentezco = $servicios->parentezco;
                    $familiaSave->save();

                    $direccionSave = new Direccion();
                    $direccionSave->personas_id = $solicitud->id;
                    $direccionSave->estado_id = $personaDireccionSave->estado_id;
                    $direccionSave->municipio_id = $personaDireccionSave->municipio_id;
                    $direccionSave->ciudad_id = $personaDireccionSave->ciudad_id;
                    $direccionSave->parroquia_id = $personaDireccionSave->parroquia_id;
                    $direccionSave->urbanizacion = $personaDireccionSave->urbanizacion;
                    $direccionSave->tzona = $personaDireccionSave->tzona;
                    $direccionSave->nzona = $personaDireccionSave->nzona;
                    $direccionSave->tcalle = $personaDireccionSave->tcalle;
                    $direccionSave->ncalle = $personaDireccionSave->ncalle;
                    $direccionSave->tvivienda = $personaDireccionSave->tvivienda;
                    $direccionSave->nvivienda = $personaDireccionSave->nvivienda;
                    $direccionSave->status = 1;
                    $direccionSave->save();
                }
            }
            return redirect('/personas')->with('message', __('Registro Sastifatorio'));
        } catch (Exception $e) {
            dd($e);
            return redirect('/personas')->with('searchError', __('messages.information_not_stored'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $carga_familiar = Personas::all()->where('personas_id', '=', decrypt($id));
        //$persona = DB::table('personas')->where('id', decrypt($id))->first();
        $persona = Personas::consulta();
        /*$carga_familiar = DB::table('personas as p ')
                 ->select(DB::raw('row_number() OVER (ORDER BY p.nombres) as numero'))
                 ->select('nombres', 'apellidos', 'cedula', 'fecha')
                 ->where('personas_id', '=', decrypt($id))
                 ->get();*/
        //dd($persona);
        $entidad = Entidades::all();
        $zonas = Tzona::all();
        $area = Tcalle::all();
        $hogar = Tvivienda::all();

        return view('persona.show', compact('persona', 'entidad', 'zonas', 'area', 'hogar', 'carga_familiar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*try {
            $data = Personas::where('id', $id)->delete();

            return back()->with('success', __('¡Producto eliminado sastifactoriamente!'));

        } catch (Exception $e) {

            return back()->with('error', __('¡Ha ocurrido un Error'));

        }*/
    }
}
