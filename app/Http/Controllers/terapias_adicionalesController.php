<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\terapias_adicionales;

class terapias_adicionalesController extends Controller
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
  
            $id = terapias_adicionales::select('id', 'user_id', 'terapias_adicionales', 'valor_terapia')->get();
              
  
             return datatables()->of($id)
                                                                                                         
              ->addColumn('action', 'atencion')
              ->rawColumns(['action'])
              ->addColumn('action', function($data) {
  
  
                  $actionBtn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-target="#modalEditarTerapia"  title="Editar terapia" class="fa fa-edit editarTerapia"></a>
                  <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'title="Eliminar terapia" class="fa fa-trash eliminarTerapia"></a>';
                  
                   
                  return $actionBtn;
                 
              })
             
             
              ->make(true);
          } 

        return view('terapias_adicionales');
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
          
            'terapia'              =>    'required|max:90',
            'valor_terapia'        =>    'required|max:12',
            
           ]);
   
          try {
          $data = new terapias_adicionales();
   
          $data ->user_id               = $request->userId;
          $data->terapias_adicionales   = $request->terapia;
          $data->valor_terapia          = $request->valor_terapia;
              
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
        $id_terapias_adicionales  = terapias_adicionales::find($id);
        return response()->json($id_terapias_adicionales);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_terapias = terapias_adicionales::find($id);
        return response()->json($id_terapias);
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
        $id_terapia = $request->input('id_terapia');

        $data = terapias_adicionales::find($id_terapia);
          
        $data ->user_id               = $request->userId;
        $data->terapias_adicionales   = $request->terapia;
        $data->valor_terapia          = $request->valor_terapia;
       
               

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
        terapias_adicionales::find($id)->delete();
     
        return response()->json(['success'=>'deleted successfully.']);
    }
}
