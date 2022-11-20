<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ValidarFormularioRequest;

use Illuminate\Support\Facades\Auth;

use Redirect,Response;


use App\Models\Mascota;
use App\Models\Cliente;




class MascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      
                
        if(request()->ajax()) {

          //  $id = $request->id_cliente;

          $id = Mascota::select("id", "user_id", "id_cliente", "nombre", "especie", "raza", "edad","esterilizado")
            
          ->where('id_cliente', '=', $id)

          ->where('user_id', Auth::user()->id);

           return datatables()->of($id)
              
           
                                                                      
            ->addColumn('action', 'atencion')
            ->rawColumns(['action'])
            ->addColumn('action', function($data) {


                $actionBtn = '<a href="/mascota/'.$data->id.'" data-toggle="tooltip"  data-id="'.$data->id.'" title="Ir a consulta médica" class=" fa fa-stethoscope cita"></a> 
               
                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" title="Eliminar mascota" class="fa fa-trash deletePost"></a>

                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" title="Establecer como fallecido" class="fa fa-adjust defuncion"></a>
                <a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id.'" data-target="#modalTraspasarMascota"  title="Traspasar a otro propietario" class="fa fa-exchange traspasar"></a>';
                
                 
                return $actionBtn;
               
            })
           
           
            ->make(true);
        } 

       
        return view('cliente');
       // dd($id_cliente);
      
    }



    public function buscarMascota(Request $request)
    {
     
        try{
            $data = Mascota::where("id_cliente",$request->id_cliente)->get(["id", "id_cliente", "nombre", "especie"]);
       
        } catch (\Exception  $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

          return response()->json($data);
     

    }


  //evets


    public function mostrarMascotas($id)
    {

       
      try{ 
        // $id_clientes = Mascota::where('id_cliente',$id_clientes)->get('id', 'id_cliente','nombre','raza', 'especie', 'edad', 'color', 'sexo');
 
        $id = Mascota::select('id', 'id_cliente','nombre','raza', 'especie', 'edad', 'peso', 'color', 'sexo')->where('id', $id)->get(); 

        } catch (\Exception  $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return view('mascota', compact('id'));

     /*
        if($request->ajax()){
            $id_clientes = Mascota::all();
              return response()->json([
                 'success' => true,
                  'id_clientes' => $id_clientes
              ]);
           
        }
        return view('cliente' );
      */  
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
      
      try{  

        $validatedData = $request->validate([
            
            'nombre'           =>    'required|max:20',
            'especie'          =>    'required|max:20',
            'raza'             =>    'required|max:20',
            'edad'             =>    'required|max:10',
            'sexo'             =>    'required|max:8',
            'color'            =>    'required|max:15',
            'peso'             =>    'required|max:8',
            'esterilizado'     =>    'required|max:20',
            'caracteristicas'  =>    'required|max:90',

         ]);
   
          $save = new Mascota;
   
          $save -> user_id = $request->userId;
          $save -> id_cliente = $request->id_cliente;
          $save->nombre = $request->nombre;
      
          $save->especie = $request->especie;
          $save->raza = $request->raza;
          $save->edad = $request->edad;
          $save->color = $request->color;
          $save->sexo = $request->sexo;
          $save->peso = $request->peso;
          $save->esterilizado = $request->esterilizado;
          $save->caracteristicas = $request->caracteristicas;
          $save->foto = $request->foto;
          
            
          $save->save();

        } catch (\Exception  $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

          return response()->json(['success'=>'Successfully']);
           
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_cliente)
    {
         
     /*
        
        if(request()->ajax()) {
            return datatables()->of(Mascota::select("user_id", "id_cliente", "nombre", "especie", "raza", "edad")
          //  ->where('id_cliente',  $id_cliente =2)

            ->where('id_cliente','=', $id_cliente)

            ->where('user_id', Auth::user()->id)) 
                                                            
            ->addColumn('action', 'atencion')
            ->rawColumns(['action'])
            ->addColumn('action', function($data) {


                $actionBtn = '<a href="#" data-toggle="tooltip"  data-id="'.$data->id.'" title="editar registro" class=" fa fa-stethoscope cita"></a> 
               
                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" title="Eliminar registro" class="fa fa-trash deletePost"></a>';
                
                 
                return $actionBtn;
               
            })
           
           
            ->make(true);
        } 

       
        return view('cliente');
       // dd($id_cliente);


       */
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
        Mascota::find($id)->delete();
     
        return response()->json(['success'=>'Mascota eliminado correctamente.']);
    }
  


}