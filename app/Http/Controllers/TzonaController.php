<?php

namespace App\Http\Controllers;

use App\Models\Tzona;
use Illuminate\Http\Request;

class TzonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $zonas = Tzona::all();

        return view('parametros.zona.index',compact('zonas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parametros.zona.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //dd($request);
        $zona = new Tzona();
        $zona->nombre = $request->nombre;
        $zona->save();

        if ($zona->save()) {
            return redirect('/parametro/zona')->with('success', __('¡Zona creado sastifactoriamente!'));
        } else {
            return redirect('/parametro/zona')->with('error', __('messages.information_not_stored'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tzona  $tzona
     * @return \Illuminate\Http\Response
     */
    public function show(Tzona $tzona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tzona  $tzona
     * @return \Illuminate\Http\Response
     */
    public function edit(Tzona $tzona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tzona  $tzona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tzona $tzona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tzona  $tzona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tzona $tzona)
    {
        //
    }
}
