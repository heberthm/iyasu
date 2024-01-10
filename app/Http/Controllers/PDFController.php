<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\abonos_clientes;

use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller

{

    public function generarFactura(Request $request, $id)

    {

        $abonos = abonos_clientes::where('id', $request->id_abono)->get();


        $pdf = PDF::loadView('factura',  compact('abonos'));

        return $pdf->stream('factura.pdf');
    }

    public function pdfAbonosClientes()
    
    {

        $data = abonos_clientes::all();

        view()->share('abonos', $data);

        $pdf = PDF::loadView('factura');

        return $pdf->stream('factura.pdf');
    }
}
