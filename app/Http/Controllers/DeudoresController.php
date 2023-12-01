<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\abonos_clientes;
use App\Models\registrar_tratamientos;
use Carbon\Carbon;



class DeudoresController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(request()->ajax()) {
    
            //  $id = $request->id_cliente;
          //  $date = Carbon::today()->subDays(30);
        
            $id = registrar_tratamientos::select('id', 'nombre', 'celular',  'valor_tratamiento', 'saldo',  'estado', 'updated_at' )
            

           ->where('saldo', '>', 0);

         
           /*
           ->whereDate('created_at', '<', now()->subDays(30)->format('Y-m-d h:i a'))
           ->where('saldo', '>', 0)
           ->OrderBy('id', 'desc')->limit(1)
           ->groupBy('nombre')
           ->get();

           */

            return datatables()->of($id)

            ->addColumn('updated_at', function($row) {
              return  $row->updated_at->diffForHumans();
          })
                     
             
              ->make(true);
          } 
  


         
        //  $id_abonos = abonos_clientes::select('id', 'id_clientes')->get(); 
         
         
         

        return view('deudores');
    }

}
