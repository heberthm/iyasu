<?php

namespace App\Http\Controllers;

use App\Models\libro_diarios;
use Illuminate\Http\Request;

class LibroDiarioController extends Controller
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
  
            $id = libro_diarios::select('id', 'user_id', 'responsable', 'descripcion', 'valor', 'created_at' )->get();
                
            return datatables()->of($id)

             ->addColumn('created_at', function($row)  {  
              $date = date("d-m-Y h:i a", strtotime($row->created_at));
                  return $date;
            })
                                                                                                         
              ->addColumn('action', 'atencion')
              ->rawColumns(['action'])
              ->addColumn('action', function($data) {
  

  
                  $actionBtn = '<a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id.'" data-target="#modalVerLibroDiario"  title="Ver datos del abono" class="fa fa-eye verLibroDiario"></a> 
                 
                  <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-target="#modalEditarLibroDiario" title="Editar libro diario"   class="fa fa-edit editarLibroDiario"></a>   
                  
                  <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" title="Eliminar libro diario" class="fa fa-trash eliminarLibroDiario"></a>';
                  
                   
                  return $actionBtn;
                  
                 
              })
             
             
              ->make(true);
          } 
  


         
        //  $id_abonos = abonos_clientes::select('id', 'id_clientes')->get(); 
         
         
         

        return view('libro_diario');
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
            'descripcion'                          =>    'max:860',
            'responsable'                          =>    'max:60',
            'valor'                                =>    'max:12',
           
           
          ]);
   
        //  try {
          $data = new libro_diarios();
   
                 
          $data->descripcion     = $request->descripcion;
          $data->responsable     = $request->responsable;
          $data->valor           = $request->valor;
                 
  
       
          /*    
          } catch (\Exception  $exception) {
              return back()->withError($exception->getMessage())->withInput();
          }
          */
        
   
          $data->save();
  
         // $id =$data->id;
       
         return response()->json(['success'=>'Successfully']);
            
      }
 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\libro_diario  $libro_diario
     * @return \Illuminate\Http\Response
     */
    public function show(libro_diarios $libro_diario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\libro_diario  $libro_diario
     * @return \Illuminate\Http\Response
     */
    public function edit(libro_diarios $libro_diario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\libro_diario  $libro_diario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, libro_diarios $libro_diario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\libro_diario  $libro_diario
     * @return \Illuminate\Http\Response
     */
    public function destroy(libro_diarios $libro_diario)
    {
        //
    }
}
