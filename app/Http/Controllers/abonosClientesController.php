<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;

use App\Models\abonos_clientes;

use App\Models\registrar_tratamientos;

use Barryvdh\DomPDF\Facade\Pdf;

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
    
                $id = registrar_tratamientos::join('abonos_clientes', 'abonos_clientes.id_cliente', '=', 'registrar_tratamientos.id_cliente')
               ->select('registrar_tratamientos.tratamientos', 'abonos_clientes.id', 'abonos_clientes.id_cliente', 'abonos_clientes.user_id', 'abonos_clientes.nombre', 
               'abonos_clientes.responsable', 'abonos_clientes.valor_abono','abonos_clientes.valor_tratamiento',   'abonos_clientes.saldo_actual',  'abonos_clientes.saldo',
               'abonos_clientes.created_at' )->get();
                  
        
    
               return datatables()->of($id)

               ->addColumn('created_at', function($row)  {  
                $date = date("d-m-Y h:i a", strtotime($row->created_at));
                    return $date;
              })
                                                                                                           
                ->addColumn('action', 'atencion')
                ->rawColumns(['action'])
                ->addColumn('action', function($data) {
    

    
                    $actionBtn = '<a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id.'" data-target="#modalVerAbono"  title="Ver datos del abono" class="fa fa-eye verAbono"></a> 
                  
                    <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-target=""  title="Imprimir recibo de abono" class="fa fa-print verFactura"></a>

                    <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-target="#modalEditarAbono" title="Editar abono"   class="fa fa-edit editarAbono"></a>';
                    
                     
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
            'responsable'         =>    'required|max:40',
          ]);
   
        //  try {
          $data = new abonos_clientes;
   
          $data ->user_id       = $request->userId;
          $data ->id_cliente    = $request->livesearch;
          $data ->id_tratamiento = $request->id_tratamiento;
          
          $data->nombre            = $request->nombreCliente;
          $data->celular           = $request->celular;
          $data->valor_abono       = $request->valor_abono;
          $data ->responsable      = $request->responsable;
          $data ->valor_tratamiento   = $request->valor_tratamiento2;
          $data ->saldo_actual       = $request->valor_tratamiento;
          $data ->saldo            = $request->saldo;
         
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrarAbonos($id)
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
