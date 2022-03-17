<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonasRequest;
use App\Models\Direccion;
use App\Models\Entidades;
use App\Models\Personas;
use App\Models\Tcalle;
use App\Models\Tvivienda;
use App\Models\Tzona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $persona = Personas::sqlReport($request);
        $lista = $persona->paginate(2);
        $report = $persona->get(2);

        $carga_familiar = DB::table('personas')
            ->where('personas_id', '=', $request->id)
            ->get();
        //dump($persona->all());
        $datatable = Personas::sqlReport($request);

        return view('persona.index', compact('persona', 'carga_familiar', 'datatable', 'lista', 'report'));
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PersonasRequest $request)
    {
        //dd($request);
        try {
            $input = $request->all();
            $input['personas_id'] = 0;
            $input['parentesco'] = 'Jefe de hogar';
            $input['user_id'] = Auth::id();
            $input['status'] = 1;  //acomodar en la tabla como booleano
            //dd($input);
            $solicitud = Personas::create($input);

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
            //$personaDireccionSave->user_id = $solicitud->user_id;
            $personaDireccionSave->save();

            if (isset($request->personaTemp)) {
                foreach ($request->personaTemp as $familia) {
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
                    $familiaSave->user_id = $solicitud->user_id;
                    $familiaSave->parentesco = $servicios->parentezco;
                    $familiaSave->save();

                    /*$direccionSave = new Direccion();
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
                    $direccionSave->save();*/
                }
            }

            return redirect('/personas')->with('message', __('Registro Sastifatorio'));
        } catch (Exception $e) {
            \Log::error('PersonasController.store', [
                'message' => $e->getMessage(),
            ]);

            return redirect('/personas')->with('searchError', __('messages.information_not_stored'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona = Personas::consulta(decrypt($id));
        $carga_familiar = Personas::carga_familiar(decrypt($id));

        return view('persona.show', compact('persona', 'carga_familiar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entidad = Entidades::all();
        $zonas = Tzona::all();
        $area = Tcalle::all();
        $hogar = Tvivienda::all();
        $persona = Personas::consulta(decrypt($id));
        //dd($persona);
        $cargaFamiliar = Personas::carga_familiar(decrypt($id));

        return view('persona.edit', compact('persona', 'cargaFamiliar', 'entidad', 'zonas', 'area', 'hogar'));
    }

    /**
     * Update the specified resource in storage.
     *+"num": 1
     * +"id": 8
     * +"nombres": "maria antonia"
     * +"apellidos": "perez"
     * +"personas_id": 0
     * +"cedula": "V-17475727"
     * +"correo": "rosa@gmail.com"
     * +"rif": "J-17475727-1"
     * +"fecha": "1979-06-15"
     * +"lugarnac": "caracas"
     * +"nacionalidad": "venezuela"
     * +"celular": "111111111111"
     * +"telefono_fijo": "000000000000"
     * +"estado": "Bolivariano de Miranda"
     * +"ciudad_id": "292"
     * +"ciudad": "Santa Teresa"
     * +"municipio_id": "233"
     * +"municipio": "Independencia"
     * +"parroquia_id": "631"
     * +"parroquia": "Santa Teresa del Tuy"
     * +"urbanizacion": "mopia"
     * +"tzona": "1"
     * +"zona": "sector"
     * +"nzona": "2"
     * +"tcalle": "1"
     * +"calle": "vereda"
     * +"ncalle": "28B"
     * +"tvivienda": "1"
     * +"vivienda": "casa"
     * +"nvivienda": "23".
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
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

    public function pdf(Request $request)
    {
        $persona = Personas::sqlReport($request);
        $lista = $persona->paginate(2);
        $report = $persona->get(2);
        //dd($datatable);
        return PDF::loadView('persona.pdf', compact('lista', 'report'))
            ->setPaper('letter', 'landscape')
            ->stream('persona.pdf');
    }

    public function constanciaResidenciaPdf(Request $request)
    {
        $datatable = Personas::sqlReport($request);
        //dd($datatable);
        return PDF::loadView('reportes.residenciapdf', compact('datatable'))
            ->setPaper('letter')
            ->stream('reportes.residenciapdf');
    }
}
