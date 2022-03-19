<?php

namespace App\Http\Controllers;

use App\Models\Tvivienda;
use Illuminate\Http\Request;
use App\Http\Requests\ViviendaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class TviviendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hogar = Tvivienda::consulta('numero', 'id', 'nombre');

        return view('parametros.hogar.index', compact('hogar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parametros.hogar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ViviendaRequest $request)
    {

        //dd($request);
        $vivienda = new Tvivienda();
        $vivienda->nombre = $request->nombre;
        $vivienda->save();

        if ($vivienda->save()) {
            return redirect('/parametro/hogar')->with('success', '¡Zona creado sastifactoriamente!');
        } else {
            return redirect('/parametro/hogar')->with('error', '¡Ha ocurrido un error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tvivienda  $tvivienda
     * @return \Illuminate\Http\Response
     */
    public function show(Tvivienda $tvivienda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tvivienda  $tvivienda
     * @return \Illuminate\Http\Response
     */
    public function edit(Tvivienda $tvivienda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tvivienda  $tvivienda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tvivienda $tvivienda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tvivienda  $tvivienda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tvivienda $tvivienda)
    {
        //
    }
}
