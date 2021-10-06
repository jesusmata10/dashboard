<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Models\User;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumb = [
            [
                'link' => '#',
                'name' => 'Configuración'
            ],
            [
                'link' => '#',
                'name' => 'Usuarios'
            ]
        ];

        $data = User::all();

        //$users = $data->paginate(10);
        //$report = $data->get(10);
        $rol = User::userRol();

        return view('usuarios.index', compact('breadcrumb', 'rol', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumb = [
            [
                'link' => '#',
                'name' => 'Configuración'
            ],
            [
                'link' => '#',
                'name' => 'Usuarios'
            ]
        ];

        return view('usuarios.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input                   = $request->all();
        $input['remember_token'] = Str::random(10);
        $input['password']       = Hash::make($request->password);
        try {
            DB::transaction(function () use ($request, $input) {
                $user = User::create($input);

                $input['user_id'] = $user->id;

                Perfile::create($input);

                $user->syncRoles($request->rol);
                //Mail::to($user->email)->send(new SendMail($perfil));
            });

            return redirect('/usuario')->with('success', __('messages.stored_information'));
        } catch (QueryException $e) {
            \Log::error('UserController.store', [
                'message' => $e->getMessage()
            ]);

            return redirect('/usuario')->with('error', __('messages.information_not_stored'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $breadcrumb = [
            [
                'link' => '#',
                'name' => 'Configuración'
            ],
            [
                'link' => '/usuario',
                'name' => 'Usuarios'
            ],
            [
                'link' => '/usuario',
                'name' => 'Editar Usuario'
            ]
        ];

        $entidad = Entidad::all();

        $user = User::select('u.*', 'u.id as id_user', 'sp.*', 'e.nombre_entidad', 'm.nombre_municipio', 'p.nombre_parroquia')->from('seguridad.users as u')
            ->join('seguridad.perfiles as sp', 'sp.user_id', 'u.id')
            ->join('entidades as e', 'e.id', 'sp.entidad_id')
            ->join('municipios as m', 'm.id', 'sp.municipio_id')
            ->join('parroquias as p', 'p.id', 'sp.parroquia_id')
            ->where('u.id', decrypt($id))->first();
        //dd($user);
        $rol = $user->roles->implode('name', ',');

        $roles = Role::orderBy('name')->pluck('name', 'id');

        // $entidad = Entidad::all(['id', 'entidad'])->sortBy('entidad');

        return view('usuarios.edit', ['breadcrumb' => $breadcrumb, 'user' => $user, 'rol' => $rol, 'roles' => $roles, 'entidad' => $entidad]);
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
        //
    }
}
