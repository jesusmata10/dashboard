<?php

namespace App\Http\Controllers;

use App\Models\Tcalle;
use Illuminate\Http\Request;
use App\Http\Requests\AreaRequest;
use Illuminate\Support\Str;

class TcalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $calle = Tcalle::consulta('id', 'numero', 'nombre');

        return view('parametros.area.index', compact('calle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parametros.area.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        $calle = new Tcalle();
        $calle->nombre = $request->nombre;
        $calle->save();

        if ($calle->save()) {
            return redirect('/parametro/area')->with('success', __('¡Zona creado sastifactoriamente!'));
        } else {
            return redirect('/parametro/area')->with('error', __('messages.information_not_stored'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tcalle  $tcalle
     * @return \Illuminate\Http\Response
     */
    public function show(Tcalle $tcalle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tcalle  $tcalle
     * @return \Illuminate\Http\Response
     */
    public function edit(Tcalle $tcalle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tcalle  $tcalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tcalle $tcalle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tcalle  $tcalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tcalle $tcalle)
    {
        //
    }
}
