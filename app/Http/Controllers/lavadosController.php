<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\lavados;

class lavadosController extends Controller
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
  
            $id = lavados::select('id', 'user_id', 'lavado', 'valor_lavado')->get();
              
  
             return datatables()->of($id)
                                                                                                         
              ->addColumn('action', 'atencion')
              ->rawColumns(['action'])
              ->addColumn('action', function($data) {
  
  
                  $actionBtn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-target="#modalEditarLavado"  title="Editar terapia" class="fa fa-edit editarLavado"></a>
                  <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'title="Eliminar terapia" class="fa fa-trash eliminarLavado"></a>';
                  
                   
                  return $actionBtn;
                 
              })
             
             
              ->make(true);
          } 

        return view('lavados');
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
          
            'lavado'              =>    'required|max:90',
            'valor_lavado'        =>    'required|max:12',
            
           ]);
   
          try {
          $data = new lavados();
   
          $data ->user_id           = $request->userId;
          $data->lavado            = $request->lavado;
          $data->valor_lavado      = $request->valor_lavado;
              
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
        $id_lavado = lavados::find($id);
        return response()->json($id_lavado);
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
        $id_lavado = $request->input('id_lavado');

        $data = lavados::find($id_lavado);
          
        $data ->user_id           = $request->userId;
        $data->lavado             = $request->lavado;
        $data->valor_lavado       = $request->valor_lavado;
       
               

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
        lavados::find($id)->delete();
     
        return response()->json(['success'=>'deleted successfully.']);
    }
}
