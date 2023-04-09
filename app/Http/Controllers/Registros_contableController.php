<?php

namespace App\Http\Controllers;

use App\Models\registros_contable;

use Illuminate\Http\Request;

use DataTables;

use Carbon\Carbon;


use Redirect,Response;



class Registros_contableController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

             
               
      if(request()->ajax()) {
            $registros = registros_contable::select('id', 'saldo', 'ingreso', 'egreso', 'responsable', 'descripcion', 'created_at')->orderBy('created_at', 'asc');
            
            return datatables()->of($registros)
          
            ->addColumn('created_at', function($row)  {  
               $date = date('d-m-Y h:i', strtotime($row->created_at));

                return $date;
               // return Carbon::parse($row->created_at)->format('d-m-Y h:i');
              })
            ->addColumn('action', 'atencion')
            ->rawColumns(['action'])
            ->addColumn('action', function($data) {



             //   $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" title="editar registro" class=" fa fa-edit edit"></a>';
   
                $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" title="Eliminar registro" class="fa fa-trash deletePost"></a>';

                return $btn;

               
               
            })

           
            ->make(true);
        }
        return view('registros_contables');



    }



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
      
     /*
        $validatedData = $request->validate([
            
            'saldo'            =>    'required|max:12',
            'ingreso'          =>    'required|max:12',
            'egreso'           =>    'required|max:12',
            'responsable'      =>    'required|max:100',
            'descripcion'      =>    'required|max:200',
            

          ]);
    */
   
          $save = new registros_contable;
   
         
         
          $save-> ingreso = $request->ingreso;
          $save-> egreso = $request->egreso;
          $save-> responsable = $request->responsable;
          $save-> descripcion = $request->descripcion;

        
            
          $save->save();

       

          return response()->json(['success'=>'Successfully']);
           
          
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function guardar_ingreso(Request $request)
    {
      
     /*
        $validatedData = $request->validate([
            
            'saldo'            =>    'required|max:12',
            'ingreso'          =>    'required|max:12',
            'egreso'           =>    'required|max:12',
            'responsable'      =>    'required|max:100',
            'descripcion'      =>    'required|max:200',
            

          ]);
    */
   
          $save = new registros_contable;
   
         
         
          $save-> ingreso = $request->ingreso;
          $save-> responsable = $request->responsable;
          $save-> descripcion = $request->descripcion;

        
            
          $save->save();

       

          return response()->json(['success'=>'Successfully']);
           
          
    }


    

    public function guardar_egreso(Request $request)
    {
      
     /*
        $validatedData = $request->validate([
            
            'saldo'            =>    'required|max:12',
            'ingreso'          =>    'required|max:12',
            'egreso'           =>    'required|max:12',
            'responsable'      =>    'required|max:100',
            'descripcion'      =>    'required|max:200',
            

          ]);
    */
   
          $save = new registros_contable;
   
         
         
          $save-> egreso = $request->egreso;
          $save-> responsable = $request->responsable;
          $save-> descripcion = $request->descripcion;

        
            
          $save->save();

       

          return response()->json(['success'=>'Successfully']);
           
          
    }
    

   /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            
            registros_contable::find($request->pk)
              
            ->update([$request->name => $request->value]);

            return response()->json(['success'=>'Successfully']);
        }
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\registros_contable  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        registros_contable::find($id)->delete();
     
        return response()->json(['success'=>'registro eliminado correctamente.']);
    }



}