<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\profesionales;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;


class profesionalesController extends Controller
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
  
            $id = profesionales::select('id', 'cedula', 'nombre', 'celular', 'fecha_nacimiento',  
                                          'profesion', 'email')->get();
              
  
             return datatables()->of($id)

             ->addColumn('fecha_nacimiento', function($row)  {  
                $date = date("d-m-Y", strtotime($row->fecha_nacimiento));
                    return $date;
              })
           
                                                                                                         
              ->addColumn('action', 'atencion')
              ->rawColumns(['action'])
              ->addColumn('action', function($data) {
  
  
                  $actionBtn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-target="#modalMostrarProfesional"  title="Ver datos del profesional" class="fa fa-eye verProfesional"></a> 
                 
                  <a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id.'" data-target="#modalEditarProfesional"  title="Editar datos del profesional" class="fa fa-edit editarProfesional"></a>
  

                  <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'title="Eliminar datos del profesional" class="fa fa-trash eliminarProfesional"></a>';
                  
                   
                  return $actionBtn;
                 
              })
             
             
              ->make(true);
          } 
  
          $profesionales = profesionales::select('id','nombre')->get(); 

         
          return view('profesionales');
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
        $validatedData = $request->validate([
          
            'cedula'              =>    'required|max:18',
            'nombre'              =>    'required|max:40',
            'profesion'           =>    'required|max:60',
            'email'               =>    'required|max:40',
            'celular'             =>    'required|max:25',
           ]);
   
          try {
          $data = new profesionales;
   
          $data ->user_id           = $request->userId;
          $data->cedula             = $request->cedula;
          $data->nombre             = $request->nombre;
          $data->celular            = $request->celular;
          $data->profesion          = $request->profesion;
          $data->fecha_nacimiento   = $request->fecha_nacimiento;    
          $data->email              = $request->email;   
           
       
              
          } catch (\Exception  $exception) {
              return back()->withError($exception->getMessage())->withInput();
          }
   
          
          
   
          $data->save();
  
         // $id =$data->id;
       
         return response()->json(['success'=>'Successfully']);
            
  
    }


    
    public function verificarProfesional(Request $request)
    {
      if($request->get('cedula'))
      {
       $cedula = $request->get('cedula');
       $data = DB::table("profesionales")
        ->where('cedula', $cedula)
        ->where('user_id', Auth::user()->id)
        ->count();
       if($data > 0)
       {
        echo 'unique';
       }
       else
       {
        echo 'not_unique';
       }
     
      }
    } 
 


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_profesional  = profesionales::find($id);
        return response()->json($id_profesional);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_profesional  = profesionales::find($id);
        return response()->json($id_profesional);
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
        $id_profesional = $request->input('id_profesional');

        $data = profesionales::find($id_profesional);
          
       
        $data->cedula             = $request->cedula;
        $data->nombre             = $request->nombre;
        $data->celular            = $request->celular;
        $data->profesion          = $request->profesion;
        $data->fecha_nacimiento   = $request->fecha_nacimiento;    
        $data->email              = $request->email;   
               

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
        profesionales::find($id)->delete();
     
        return response()->json(['success'=>'deleted successfully.']);
    }
}
