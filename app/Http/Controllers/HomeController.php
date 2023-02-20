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
                 
        if(request()->ajax()) {

            //  $id = $request->id_cliente;
  
            $id = Cliente::select('id_cliente as id','nombre',  'email', 'celular', 'direccion', 'barrio', 'municipio', 'fecha_nacimiento','created_at');
  
             return datatables()->of($id)
  
             ->addColumn('created_at', function($row)  {  
              $date = date("d-m-Y", strtotime($row->created_at));
              return $date;
            })
                                                                                                         
              ->addColumn('action', 'atencion')
              ->rawColumns(['action'])
              ->addColumn('action', function($data) {
  
             
  
                  $actionBtn = '<input data-id="'.$data->id.'" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive"  "'.$data->id.'" ? "checked" : " " >';
                  
                   
                  return $actionBtn;
             
              })
             
             
              ->make(true);
          } 
      
        $profesionales = profesionales::select('id','nombre')->get(); 
        $terapias = terapias::select('id','terapia', 'color')->orderBy('terapia', 'ASC')->get(); 
        return view('inicio', compact('profesionales', 'terapias'));
    }

   

}
