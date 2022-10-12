<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarnetCreateRequest;
use App\Models\Carnet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;


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
        //dump($carnet);
        $lista = $carnet->paginate(2);
        $report = $carnet->get(2);
        //dd($lista);

        return view('carnet.index', compact('carnet', 'report', 'lista'));
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
    public function store(CarnetCreateRequest $request)
    {
        $persona = DB::table('personas')
            ->select('id', 'cedula', 'primer_nombre', 'primer_apellido')
            ->where('cedula', $request['cedula'])
            ->first();
        //dd($persona);
        if ($persona == '') {
            return redirect()->route('carnet.create')->with('error', 'Cedula no registrada en el sistemas');
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
            return back()->with('error', '!Ha ocurrido un error¡');
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
        return view('carnet.edit');
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

        $carnet = Carnet::edit(decrypt($id));

        return view('carnet.edit', compact('carnet'));
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

        try {

            $carnet = Carnet::find(decrypt($id));

            $carnet->serial = $request->serial;
            $carnet->codigo = $request->codigo;
            $carnet->save();

            return redirect()->route('carnet.index')->with('success', '¡El carnet ha sido actualizado sastifactoriamente!');
        } catch (Exception $e) {
            return back()->with('error', '¡Ha ocurrido un Error');
        }
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

        //dd($id);
        try {
            /*$data = Carnet::where('id', decrypt($id))->delete();*/
            $data = Carnet::findOrFail($id);
            //dd($data);
            $data->delete();

            return back()->with('success', '¡Carnet eliminado sastifactoriamente!');
        } catch (Exception $e) {

            return back()->with('error', '¡Ha ocurrido un Error');
        }
    }

    public function pdf(Request $request)
    {
        $carnet = Carnet::consulta($request);
        $lista = $carnet->paginate(2);
        $report = $carnet->get(2);
        //dd($datatable);
        return PDF::loadView('carnet.pdf', compact('lista', 'report'))
            ->setPaper('letter', 'landscape')
            ->stream('persona.pdf');
    }
}
