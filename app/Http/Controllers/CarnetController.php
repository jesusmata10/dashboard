<?php

namespace App\Http\Controllers;

use App\Models\Carnet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CarnetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $carnet = Carnet::consulta($request);
        //dd($carnet);
        return view('carnet.index', compact('carnet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carnet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = DB::table('personas')
            ->select('id', 'cedula', 'nombres', 'apellidos')
            ->where('cedula', $request['cedula'])
            ->first();

        if ($persona == '') {
            return redirect('/carnetPatria/create')->with('error', 'Cedula no registrada en el sistemas');
        }

        try {
            $input = $request->all();
            $input['personas_id'] = $persona->id;
            $input['user_id'] = Auth::id();
            $input['status'] = true;

            $carnet = new Carnet();
            $carnet->serial = $input['serial'];
            $carnet->codigo = $input['codigo'];
            $carnet->personas_id = $input['personas_id'];
            $carnet->user_id = $input['user_id'];
            $carnet->save();

            return redirect('/carnetPatria')->with('success', 'Registro Sastifatorio');
        } catch (Exception $e) {
            \Log::error('CarnetController.store', [
                'message' => $e->getMessage(),
            ]);
            return redirect('/carnetPatria/create')->with('error', '!Ha ocurrido un error¡');
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
}
