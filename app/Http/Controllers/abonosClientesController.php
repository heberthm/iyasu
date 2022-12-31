<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;

use App\Models\abonos_clientes;

use App\Models\registrar_tratamientos;

use Illuminate\Support\Facades\Auth;


class abonosClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
        {
          
                    
            if(request()->ajax()) {
    
              //  $id = $request->id_cliente;
    
              $id = abonos_clientes::leftjoin('clientes', 'clientes.id_cliente', '=', 'abonos_clientes.id_cliente')
              ->select('clientes.id_cliente', 'clientes.user_id', 'clientes.id_cliente', 'clientes.cedula', 'clientes.nombre', 
               'clientes.celular', 'abonos_clientes.id', 'abonos_clientes.id_cliente', 'abonos_clientes.user_id', 'abonos_clientes.descripcion', 
               'abonos_clientes.responsable', 'abonos_clientes.valor_abono', 'abonos_clientes.created_at' )->get();
                  
               
    
               return datatables()->of($id)

               ->addColumn('created_at', function($row)  {  
                $date = date("d-m-Y h:i a", strtotime($row->created_at));
                    return $date;
              })
                                                                                                           
                ->addColumn('action', 'atencion')
                ->rawColumns(['action'])
                ->addColumn('action', function($data) {
    

    
                    $actionBtn = '<a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id.'" data-target="#modalVerAbono"  title="Ver datos del abono" class="fa fa-eye verAbono"></a> 
                   
                    <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-target="#modalEditarAbono" title="Editar abono"   class="fa fa-edit editarAbono"></a>   
                    
                    <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" title="Eliminar abono" class="fa fa-trash eliminarAbono"></a>';
                    
                     
                    return $actionBtn;
                    
                   
                })
               
               
                ->make(true);
            } 
    


            $id_clientes = cliente::select('id_cliente')->get(); 

          //  $id_abonos = abonos_clientes::select('id', 'id_clientes')->get(); 
           
           
            return view('abonos', compact('id_clientes'));
  
    

        
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
        $id_abonos  = abonos_clientes::find($id);
        return response()->json($id_abonos);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $id_abono  = abonos_clientes::find($id);
        return response()->json($id_abono);
      
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
     
        $id = $request->input('id_abono');

        $abono = abonos_clientes::find($id);
        $abono->nombre = $request->nombreCliente;
        $abono->celular = $request->celular;
        $abono->valor_abono = $request->valor_abono;
        $abono->descripcion = $request->descripcion;
        $abono->save();
     
        return response()->json(['success'=>'update successfully.']);
      
         


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abonos_clientes::find($id)->delete();
     
        return response()->json(['success'=>'deleted successfully.']);
    }
}
