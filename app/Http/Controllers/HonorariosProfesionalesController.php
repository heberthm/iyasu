<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\pagos_honorarios;

use App\Models\profesionales;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;


class  HonorariosProfesionalesController extends Controller
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
  
            $id = pagos_honorarios::select('id', 'id_profesional', 'nombre', 'cedula', 'celular','valor_pago', 'created_at', )->get();
    
              
  
             return datatables()->of($id)

             ->addColumn('created_at', function($row)  {  
                $date = date("d-m-Y  h:i a", strtotime($row->created_at));
                    return $date;
              })
           
                                                                                                         
              ->addColumn('action', 'atencion')
              ->rawColumns(['action'])
              ->addColumn('action', function($data) {
  
  
                  $actionBtn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-target="#modalVerPagoHonorario"  title="Ver datos de honorarios de profesional" class="fa fa-eye verPagoHonorario"></a> 
                 
                  <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-target="#modalEditarPagoHonorario"  title="Editar datos de pago de honorarios" class="fa fa-edit editarPagoHonorario"></a>
  

                  <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'title="Eliminar datos de honorario" class="fa fa-trash eliminarpagoHonorario"></a>';
                  
                   
                  return $actionBtn;
                 
              })
             
             
              ->make(true);
          } 
  
                 
          return view('honorarios_profesionales');
         // dd($id_cliente);
        
           
  }
   

  public function selectSearchPagosHonorarios(Request $request)
  {
      

      if($request->has('q')){
          $search = $request->q;
        
          $profesional =profesionales::select('id',  "nombre", 'cedula', "celular")
                 
                  ->where('nombre',  'LIKE', "%${search}%" )
                  ->get();
      }
      return response()->json($profesional);
      
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
          
            'nombre'              =>    'required|max:40',
            'cedula'              =>    'required|max:18',
            'celular'             =>    'required|max:18',
            'valor_honorario'     =>    'required|max:12',
          
           ]);
   
          try {
          $data = new pagos_honorarios();
   
          $data ->user_id           = $request->userId;
          $data->id_profesional     = $request->id_profesional;
          $data->nombre             = $request->nombre;
          $data->cedula             = $request->cedula;
          $data->celular            = $request->celular;
          $data->valor_pago         = $request->valor_honorario;
              
       
              
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
        $id_pagos  = pagos_honorarios::find($id);
        return response()->json($id_pagos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_pagos  = pagos_honorarios::find($id);
        return response()->json($id_pagos);
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
        $id = $request->input('id_pagos');

        $data = pagos_honorarios::find($id);
        
       
          $data->user_id           = $request->userId;
          $data->nombre             = $request->nombre;
          $data->cedula             = $request->cedula;
          $data->celular            = $request->celular;
          $data->valor_pago         = $request->valor_pago;
            

            

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
        pagos_honorarios::find($id)->delete();
     
        return response()->json(['success'=>'deleted successfully.']);
    }
}
