<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\profesionales;

use App\Models\terapias;

use App\Models\Cliente;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
      /*
      
        if(request()->ajax()) {

            //  $id = $request->id_cliente;
  
            $id = Cliente::select('id_cliente as id','nombre',  'email', 'celular', 'direccion', 'barrio', 'municipio', 'fecha_nacimiento','created_at', 'estado')
            ->orderBy('created_at','desc');
  
             return datatables()->of($id)

             ->addColumn('fecha_nacimiento', function($row)  {  
                $date = date("d-m-Y", strtotime($row->fecha_nacimiento));
                return $date;
              })
  
             ->addColumn('created_at', function($row)  {  
              $date = date("d-m-Y", strtotime($row->created_at));
              return $date;
              })


             /*

              ->editColumn('estado', static function ($data) {
                return '<input type="checkbox" class="js-switch" value="'.$data->id.'"/>';
              })
             ->rawColumns(['estado'])

             */
             
             /*

            ->editColumn('estado', function ($data) {
                $checkbox =  '<input  class="switch" data-id="'.$data->id.'" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" >';
               
               
                return $checkbox;
              })
             
             ->rawColumns(['estado'])
                  
             
             
              ->make(true);
          } 

               */

      
        $profesionales = profesionales::select('id','nombre')->get(); 
        $clientes = Cliente::select('id_cliente','nombre', 'email','celular', 'direccion','barrio', 'municipio', 'fecha_nacimiento', 'created_at', 'estado')->get(); 
        $terapias = terapias::select('id','terapia', 'color')->orderBy('terapia', 'ASC')->get(); 
        return view('inicio', compact('profesionales', 'terapias', 'clientes'));
    }


/* ================================

 ACTUALIZAR ESTADO DEL CLIENTE
 
 ==================================== */ 
     
    public function updateStatus(Request $request)
    {
       // $cliente = Cliente::where('id_cliente', $id);
        $cliente = Cliente::find($request->id); 
        $cliente->estado = $request->estado; 
        $cliente->save(); 
        return response()->json(['success'=>'Status change successfully.']); 
    }
   

}
