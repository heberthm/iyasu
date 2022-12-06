<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\registrar_tratamiento;

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
    
            //  $id = $request->id_cliente;
  
            $id = registrar_tratamiento::select('id_tratamiento','id_cliente', 'id_suer', 'nombre', 'celular',
            'tratamiento', 'valor_tratamiento', 'responsable', 'created_at')->get();
              
  
             return datatables()->of($id)

             ->addColumn('created_at', function($row)  {  
              $date = date("d-m-Y h:i a", strtotime($row->created_at));
                  return $date;
            })
                                                                                                         
              ->addColumn('action', 'atencion')
              ->rawColumns(['action'])
              ->addColumn('action', function($data) {
  
  
                  $actionBtn = '<a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id_tratamiento.'" data-target="#modalVerTratamiento"  title="Ver datos del tratamiento" class="fa fa-eye mostrar_historia"></a> 
                 
                  <a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id_tratamiento.'" data-target="#modalEditarTratamiento"  title="Editar datos del tratamiento" class="fa fa-edit edit"></a>
  
                  <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id_tratamiento.'title="Eliminar tratamiento" class="fa fa-trash deletePost"></a>';
                  
                   
                  return $actionBtn;
                  
                 
              })
             
             
              ->make(true);
          } 
  
    


        return view('registrar_tratamientos');
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
        //
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
