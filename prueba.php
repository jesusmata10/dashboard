<?php

namespace App\Http\Controllers;

use App\Factura;
use App\Clientes;
use App\EstatusFactura;
use App\Factura_historico;
use App\Formas_pago;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\Factura\FacturaRequest;
use Illuminate\Support\Facades\Auth;
use PDF;

class FacturaController extends Controller
{
    protected static $result;

    public function __construct()
    {
        self::$result = $this->access(8);

        if (is_null(self::$result))
            return redirect()->route('home')->with('message', __('messages.out_permission'));
    }
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
                'name' => 'Facturas',
            ],
        ];

        $data        = Factura::datatable($request);
        $clientes    = Clientes::all('id', 'razon_social');
        $formas_pago = Formas_pago::all('id', 'descripcion');
        $search      = Factura::all('n_control', 'n_factura');

        return view('factura.index', compact('breadcrumb', 'data', 'clientes', 'search', 'formas_pago'));
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
                'link' => '/facturas',
                'name' => 'Facturas'
            ],
            [
                'link' => '#',
                'name' => 'Nueva Factura'
            ]
        ];

        $clientes = Clientes::select('clientes.id', 'clientes.razon_social')
                            ->join('clientes_servicios as cs', 'clientes.id', 'cs.cliente_id')
                            ->where('cs.n_circuito', '!=', null)
                            ->distinct()
                            ->get();
        $statusFactura = EstatusFactura::all('id', 'descripcion');
        $formaPago = Formas_pago::all('id', 'descripcion');


        return view('factura.create', compact('breadcrumb','clientes', 'statusFactura', 'formaPago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(FacturaRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        try {
            $factura = Factura::create($input);

            return redirect('/itemsFactura/create/' . $factura->id)->with('success', __('messages.stored_information'));
        } catch (\Illuminate\Database\QueryException $e) {
            \Log::error('FacturaController.store', [
                'message' => $e->getMessage(),
            ]);

            return redirect('/facturas')->with('error', __('messages.information_not_stored'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        $total = 0;
        return view('factura.facturaPdf', compact('factura', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {
        //
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function pdf(Factura $factura)
    {
        $factura::where('id', $factura->id)->update(['estatus_factura_id' => 2]);

        $data = Factura_historico::create([
            'cliente_id' => $factura->cliente_id,
            'fecha' => Carbon::createFromDate(),
            'data' => $factura,
            'user_id' => Auth::user()->id
        ]);

        $total = 0;
        return PDF::loadView('factura.pdf', compact('factura', 'total'))
                  ->setPaper('letter')
                  ->stream('factura.pdf');
    }

    public function pdfFile(Factura $factura)
    {

        $total = 0;
        return PDF::loadView('factura.pdf', compact('factura', 'total'))
                  ->setPaper('letter')
                  ->stream('factura.pdf');
    }
}
