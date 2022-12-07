<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;

use \App\Models\abonos_clientes;

use Illuminate\Support\Facades\Auth;


class abonosClientesController extends Controller
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
    
              $id = cliente::join('abonos_clientes', 'abonos_clientes.id_cliente', '=', 'clientes.id_cliente')
              ->select('clientes.id_cliente', 'clientes.user_id', 'clientes.id_cliente', 'clientes.cedula', 'clientes.nombre', 
               'clientes.celular', 'abonos_clientes.id_abonos', 'abonos_clientes.id_cliente', 'abonos_clientes.user_id', 'abonos_clientes.descripcion', 
               'abonos_clientes.responsable', 'abonos_clientes.valor_abono', 'abonos_clientes.created_at' )
          
              
              ->where('clientes.user_id', Auth::user()->id)
              ->get();
                        
    
               return datatables()->of($id)

               ->addColumn('created_at', function($row)  {  
                $date = date("d-m-Y h:i a", strtotime($row->created_at));
                    return $date;
              })
                                                                                                           
                ->addColumn('action', 'atencion')
                ->rawColumns(['action'])
                ->addColumn('action', function($data) {
    
    
                    $actionBtn = '<a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id_abonos.'" data-target="#modalVerAbono"  title="Ver datos del abono" class="fa fa-eye mostrar_abono"></a> 
                   
                    <a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id_abonos.'" data-target="#modalEditarAbono"  title="Editar datos del abono" class="fa fa-edit edit"></a>
    
                    <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id_abonos.'title="Eliminar história clínica" class="fa fa-trash deletePost"></a>';
                    
                     
                    return $actionBtn;
                    
                   
                })
               
               
                ->make(true);
            } 
    

            

            $id_abonos = abonos_clientes::select('id_cliente', 'id_abonos', 'nombre', 'celular', 'valor_abono', 'saldo', 
            'responsable', 'created_at')->get(); 

           
           
            return view('abonos', compact('id_abonos'));
           
          
        
    

        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'nombre'              =>    'max:60',
            'celular'             =>    'required|max:25',
            'valor_abono'         =>    'required|max:12',
            'descripcion'         =>    'required|max:120',
            'responsable'         =>    'required|max:40',
          ]);
   
        //  try {
          $data = new abonos_clientes;
   
          $data ->user_id       = $request->userId;
          $data ->id_cliente    = $request->livesearch;
          
          $data->nombre         = $request->nombreCliente;
          $data->celular        = $request->celular;
          $data->valor_abono    = $request->valor_abono;
          $data ->descripcion   = $request->descripcion;
          $data ->responsable   = $request->responsable;
         
          $data->save();

         // $id =$data->id;
       
         return response()->json(['success'=>'Successfully']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
