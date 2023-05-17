<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Cliente;

use App\Models\terapias;

use Illuminate\Support\Facades\DB;

use App\Models\registrar_tratamientos;

class registrar_tratamientoController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function index()
     {
       
                 
         if(request()->ajax()) {
            
  
            $id = Cliente::join('registrar_tratamientos', 'registrar_tratamientos.id_cliente', '=', 'clientes.id_cliente')
            ->select('clientes.id_cliente', 'clientes.nombre',  'clientes.user_id', 'clientes.celular',  'registrar_tratamientos.id', 'registrar_tratamientos.id_cliente',
             'registrar_tratamientos.user_id', 'registrar_tratamientos.tratamiento', 'registrar_tratamientos.valor_tratamiento', 'registrar_tratamientos.responsable', 
             'registrar_tratamientos.created_at',  'registrar_tratamientos.saldo', 'registrar_tratamientos.estado')->get();
  
            
  
             return datatables()->of($id)


             ->addColumn('created_at', function($row)  {  
              $date = date("d-m-Y h:i a", strtotime($row->created_at));
                  return $date;
            })
                                                                                                         
              ->addColumn('action', 'atencion')
              ->rawColumns(['action'])
              ->addColumn('action', function($data) {
  
  
                  $actionBtn = '<a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id.'" data-target="#modalVerTratamiento"  title="Ver datos del tratamiento" class="fa fa-eye verTratamiento"></a> 
                 
                  <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-target="#modalEditarTratamiento"  title="Editar datos del tratamiento" class="fa fa-edit editarTratamiento"></a>
  
                  <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" title="Eliminar tratamiento" class="fa fa-trash eliminarTratamiento"></a>';
                  
                   
                  return $actionBtn;
                  
                 
              })
             
             
              ->make(true);
          } 
  
    
          $terapias = terapias::select('id','terapia', 'valor_terapia')->get();
         /* $tratamientos = registrar_tratamientos::select('id')->OrderBy('id', 'desc')->limit(1)->get(); */

        return view('registrar_tratamientos', compact('terapias'));

      

    }


    
    public function selectSearchAbonos(Request $request)
    {
    	

        if($request->has('q')){
            $search = $request->q;
          
            $id =registrar_tratamientos::select('id as id_tratamiento', "id_cliente", "nombre", "celular", "saldo", "tratamiento", "valor_tratamiento", "estado")
                   
            		->where('nombre',  'LIKE', "%${search}%" )
                    ->where('saldo', '!=', 0)
                  
                   // ->orWhere('cedula', 'LIKE', "%{$search}%") 
            		->get();
        }
        return response()->json($id);
        
    }



    public function mensajePagoDeuda(Request $request)
    {
    	
                
            $id =registrar_tratamientos::select('id',  "saldo", "created_at")
                   
                ->whereDate('created_at', '=', now()->subDays(30))->get()
                ->get();
       
     return response()->json($id);
        
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

       
          try {
          $data = new registrar_tratamientos();
   

          foreach ($request->txt_tratamientos as $key){
          
           
            $data->user_id             = $request->userId;
            $data->id_cliente          = $request->livesearch;   
            $data->tratamiento         = $request->txt_tratamientos[$key];
            $data->nombre              = $request->nombreCliente;  
            $data->celular             = $request->celular;           
            $data->valor_tratamiento   = $request->txt_tratamientos[$key];
            $data->saldo               = $request->saldo;
            $data->responsable         = $request->responsable;
            $data->estado              = $request->estado;
       
          }
        
          
        
               
       
              
          } catch (\Exception  $exception) {
              return back()->withError($exception->getMessage())->withInput();
          }
                
   
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
        $id_tratamiento  = registrar_tratamientos::find($id);
        return response()->json($id_tratamiento);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $id_tratamiento  = registrar_tratamientos::find($id);
        return response()->json($id_tratamiento);
      
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
        $id_tratamiento = $request->input('id_tratamiento');

        $data = registrar_tratamientos::find($id_tratamiento);
          
        $data->user_id             = $request->userId;
        $data ->id_cliente         = $request->id_cliente;   
        $data ->tratamiento        = $request->tratamiento2;  
        $data ->nombre             = $request->nombreCliente;  
        $data ->celular            = $request->celular;           
     /*   $data->tratamiento         = $tratam;  */
        $data->valor_tratamiento   = $request->valor_tratamiento2;
        $data->responsable         = $request->responsable;
       
         

        $data->save();
     
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
        registrar_tratamientos::find($id)->delete();
     
        return response()->json(['success'=>'deleted successfully.']);
    }
}
