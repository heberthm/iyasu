<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;

use App\Models\abonos_clientes;

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
    

    
                    $actionBtn = '<a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id.'" data-target="#modalVerAbono"  class="fa fa-eye mostrar_abono"></a> 
                   
                    <a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id.'" data-target="#modalEditarAbono"    class="fa fa-edit editarAbono"></a>
    
                    <a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id.'title="Eliminar história clínica" class="fa fa-trash deleteProduct"></a>';
                    
                     
                    return $actionBtn;
                    
                   
                })
               
               
                ->make(true);
            } 
    


            $id_clientes = cliente::select('id_cliente')->get(); 

          
           
           
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
       
        try{
            $id = array('id' => $request->id);
            $updateArray = [
                            'nombre' => $request->nombreCLiente,
                            'celular' => $request->celular,
                            'valor_abono' => $request->valor_abono,
                            'descripcion' => $request->descripcion,
                            'responsable' => $request->responsable,
                           
                           ];
              
              $id  = abonos_clientes::where($id)->update($updateArray);
     
            } catch (\Exception  $exception) {
                return back()->withError($exception->getMessage())->withInput();
            }
    
              return response()->json(['success'=>'Successfully']);
         



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abonos_clientes::where('id_abonos', $id)->delete();
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
