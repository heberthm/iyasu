<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;

use \App\Models\abonos_clientes;

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
    
              $id = abonos_clientes::select('id_cliente', 'id_abonos', 'nombre', 'celular', 'valor_abono', 'saldo', 
                                            'responsable', 'created_at')->get();
                
    
               return datatables()->of($id)
                                                                                                           
                ->addColumn('action', 'atencion')
                ->rawColumns(['action'])
                ->addColumn('action', function($data) {
    
    
                    $actionBtn = '<a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id_abonos.'" data-target="#modalMostrarHistoriaClinica"  title="Ver datos história clínica" class="fa fa-eye mostrar_historia"></a> 
                   
                    <a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id_abonos.'" data-target="#modalEditarHistoriaClinica"  title="Editar datos de história clínica" class="fa fa-edit edit"></a>
    
                    <a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id_abonos.'" data-target="#modalVerControlesMedicos"  title="Ver controles realizados" class="fa fa-street-view control"></a>


                    <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id_abonos.'title="Eliminar história clínica" class="fa fa-trash deletePost"></a>';
                    
                     
                    return $actionBtn;
                   
                })
               
               
                ->make(true);
            } 
    
           
            return view('abonos');
           // dd($id_cliente);
          
        
    

        
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
