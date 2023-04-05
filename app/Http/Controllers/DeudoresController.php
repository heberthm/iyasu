<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\abonos_clientes;
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
        
            $id = abonos_clientes::select('id', 'nombre', 'celular', 'id_tratamiento', 'valor_tratamiento', 'saldo', 'valor_abono', 'created_at' )
            
    
         
          // ->whereDate('created_at', $date)

           
           ->whereDate('created_at', '<=', today()->subDays(30)->format('Y-m-d h:i a'))
           ->where('saldo', '>', 0)
           ->OrderBy('id', 'desc')->limit(1)
           ->groupBy('nombre')
           ->get();

            return datatables()->of($id)

             ->addColumn('created_at', function($row)  {  
              $date = date("d-m-Y h:i a", strtotime($row->created_at));
                  return $date;
            })
                      
                     
             
              ->make(true);
          } 
  


         
        //  $id_abonos = abonos_clientes::select('id', 'id_clientes')->get(); 
         
         
         

        return view('deudores');
    }

}
