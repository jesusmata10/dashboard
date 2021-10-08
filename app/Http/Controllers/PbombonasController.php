<?php

namespace App\Http\Controllers;

use App\Models\Pbombonas;
use Illuminate\Http\Request;

class PbombonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bombonas = Pbombonas::consulta('id', 'nombre', 'numero');

        return view('parametros.bombona.index', compact('bombonas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parametros.bombona.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bombona = new Pbombonas();
        $bombona->nombre = $request->nombre;
        $bombona->save();

        if ($bombona->save()) {
            return redirect('/parametro/bombona')->with('success', __('¡Zona creado sastifactoriamente!'));
        } else {
            return redirect('/parametro/bpmbona')->with('error', __('messages.information_not_stored'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pbombonas  $pbombonas
     * @return \Illuminate\Http\Response
     */
    public function show(Pbombonas $pbombonas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pbombonas  $pbombonas
     * @return \Illuminate\Http\Response
     */
    public function edit(Pbombonas $pbombonas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pbombonas  $pbombonas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pbombonas $pbombonas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pbombonas  $pbombonas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pbombonas $pbombonas)
    {
        //
    }
}
