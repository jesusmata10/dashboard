<?php

namespace App\Http\Controllers;

use App\Models\Ciudades;
use App\Models\Direccion;
use App\Models\Entidades;
use App\Models\Municipios;
use App\Models\Parroquias;
use App\Models\Personas;
use App\Models\Tcalle;
use App\Models\Tvivienda;
use App\Models\Tzona;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $breadcrumb = [
            [
                'link' => '#',
                'name' => 'Configuración',
            ],
            [
                'link' => '#',
                'name' => 'Usuarios',
            ],
        ];

        $data = User::consulta();
        //dd($data);

        //$users = $data->paginate(10);
        //$report = $data->get(10);
        $rol = User::userRol();
        // dd($rol);

        return view('usuarios.index', compact('breadcrumb', 'rol', 'data', 'report'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $entidad = Entidades::all();
            $zonas = Tzona::all('id', 'nombre');
            $hogar = Tvivienda::all();
            $area = Tcalle::all();
            $roles = Role::select('id', 'name')->orderBy('name')->get();
            $input = $request->all();

            return view('usuarios.create', compact('entidad', 'roles', 'zonas', 'hogar', 'area'));
        } catch (QueryException $e) {
            \Log::error('UserController.create', ['message' => $e->getMessage()]);

            return view('usuarios.create')->with('error', ('¡Ha ocurrido un error!'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();
        $input['user_id'] = Auth::id();
        $input['personas_id'] = isset($request->personas_id) ? $request->personas_id : 0;
        $input['fecha'] = Carbon::parse($request['fecha'])->format('Y-m-d');
        $input['remember_token'] = Str::random(10);
        $input['password'] = Hash::make($request->password);
        $input['status'] = 1;

        try {
            DB::transaction(function () use ($request, $input) {
                $user = User::create($input);

                $persona = Personas::create($input);

                $personaDireccionSave = new Direccion();
                $personaDireccionSave->personas_id = $persona->id;
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

                //$role = Role::findByName($request->rol, 'web');
                $roles = Role::select('id', 'name')->orderBy('name')->get();
                $user->assignRole($request->rol);
                // $user->syncRoles($request->rol);
            });

            return redirect('/usuario')->with('success', '¡Registro Sastifactorio!');
        } catch (QueryException $e) {
            \Log::error('UserController.store', [
                'message' => $e->getMessage(),
            ]);

            return redirect('/usuario')->with('error', '¡Ha ocurrido un Problema!');
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
        $breadcrumb = [
            [
                'link' => '#',
                'name' => 'Configuración',
            ],
            [
                'link' => '/usuario',
                'name' => 'Usuarios',
            ],
            [
                'link' => '/usuario',
                'name' => 'Editar Usuario',
            ],
        ];

        $entidad = Entidades::all();

        $user = User::select('u.*', 'u.id as id_user', 'sp.*', 'e.nombre_entidad', 'm.nombre_municipio', 'p.nombre_parroquia')->from('seguridad.users as u')
            ->join('seguridad.perfiles as sp', 'sp.user_id', 'u.id')
            ->join('entidades as e', 'e.id', 'sp.entidad_id')
            ->join('municipios as m', 'm.id', 'sp.municipio_id')
            ->join('parroquias as p', 'p.id', 'sp.parroquia_id')
            ->where('u.id', decrypt($id))->first();

        $rol = $user->roles->implode('name', ',');

        $roles = Role::orderBy('name')->pluck('name', 'id');

        // $entidad = Entidad::all(['id', 'entidad'])->sortBy('entidad');

        return view('usuarios.edit', ['breadcrumb' => $breadcrumb, 'user' => $user, 'rol' => $rol, 'roles' => $roles, 'entidad' => $entidad]);
    }

    /**
     * Update the specified resource in storage.
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
    }

    public function municipioAjaxUser(Request $request)
    {
        // dd($request->all());
        if ($request->ajax()) {
            // $lista = Municipio::listaMunicipios($request->entidad_id);
            $lista = Municipios::where('entidad_id', $request->entidad_id)->get();
            // dd($lista);
            echo '<option disabled selected value="">Seleccione una opci&oacute;n</option>';
            // echo '<option value="TODOS">TODOS LOS MUNICIPIOS</option>';

            foreach ($lista as $value) {
                echo '<option value=' . $value->id . '>' . $value->municipio . '</option>';
            }
        }
    }

    public function parroquiaAjaxUser(Request $request)
    {
        if ($request->ajax()) {
            // $lista = Parroquia::listaParroquias($request->municipio_id);
            $lista = Parroquias::where('municipio_id', $request->municipio_id)->get();

            echo '<option disabled selected value="">Seleccione una opci&oacute;n</option>';
            // echo '<option value="TODAS">TODAS LAS PARROQUIAS</option>';

            foreach ($lista as $value) {
                echo '<option value=' . $value->id . '>' . $value->parroquia . '</option>';
            }
        }
    }

    public function ciudadAjaxUser(Request $request)
    {
        if ($request->ajax()) {
            // $lista = Municipio::listaMunicipios($request->entidad_id);
            $lista = Ciudades::where('estado_id', $request->entidad_id)->get();

            // dd($lista);
            echo '<option disabled selected value="">Seleccione una opci&oacute;n</option>';
            // echo '<option value="TODOS">TODOS LOS MUNICIPIOS</option>';

            foreach ($lista as $value) {
                echo '<option value=' . $value->id . '>' . $value->ciudad . '</option>';
            }
        }
    }
}
