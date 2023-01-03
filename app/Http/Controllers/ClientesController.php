<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;

use App\Http\Requests\ValidarFormularioRequest;

use Illuminate\Support\Facades\Auth;

use Redirect;

use Carbon\Carbon;



use Illuminate\Support\Facades\DB;

use App\Models\Cliente;
use App\models\profesionales;


class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function index()
    {
      

          if(request()->ajax()) {
            return datatables()->of(Cliente::select("user_id", "id_cliente", "nombre", "celular", 'fecha_nacimiento', "created_at")
            
            ->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')
            ->whereMonth('fecha_nacimiento', Carbon::now()->month))
          
            ->addColumn('fecha_nacimiento', function($row)  {  
                $date = date("d-m-Y", strtotime($row->fecha_nacimiento));
                    return $date;
              })
           
           
           
            ->make(true);
        } 

        
        return view('inicio');
 
      
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
             
      $validatedData = $request->validate([
         
          'nombre'              =>    'required|max:35',
          'celular'             =>    'required|max:26',
          'direccion'           =>    'required|max:50',
          'barrio'              =>    'required|max:25',
          'email'               =>    'required|max:50'
      ]);
   


        $insertArr = [ 
                       'user_id' => $request->userId,
                       'cedula' => $request->cedula2,
                       'fecha_nacimiento' => $request->fecha_nacimientos,
                       'edad' => $request->edad2,
                       'nombre' => $request->nombre,
                       'celular' => $request->celular,
                       'direccion' => $request->direccion,
                       'barrio' => $request->barrio,
                       'municipio' => $request->municipio,
                       'email' => $request->email,
                       'estado' => $request->estado,

                    ];
                    
        $event = cliente::insert($insertArr);   
       
        return Response::json($event);
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
          'cedula'              =>    'required|unique:clientes|max:18',
          'fecha_nacimiento'    =>    'required|max:14',
          'edad'                =>    'required|max:14',
          'nombre'              =>    'required|max:35',
          'celular'             =>    'required|max:26',
          'direccion'           =>    'required|max:50',
          'barrio'              =>    'required|max:25',
          'email'               =>    'required|max:50',
        ]);
 
      //  try {
        $data = new Cliente;
 
        $data ->user_id            = $request->userId;
        
        $data->cedula              = $request->cedula;
        $data->fecha_nacimiento    = $request->fecha_nacimiento;
        $data->edad                = $request->edad;
        $data->nombre              = $request->nombre;       
        $data->celular             = $request->celular;
        $data->direccion           = $request->direccion;
        $data->barrio              = $request->barrio;
        $data->municipio           = $request->municipio;
        $data->email               = $request->email;
        $data->estado              = $request->estado;
        
     
        /*    
        } catch (\Exception  $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        */
      
 
        $data->save();

        $id =$data->id;
     
        return redirect()->route('cliente', $id);
          
    }


    public function verificarCliente(Request $request)
    {
      if($request->get('cedula'))
      {
       $cedula = $request->get('cedula');
       $data = DB::table("clientes")
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
    public function show(Cliente $id)
    {
        // $cliente = cliente::select('id_cliente')->get();
       //   return view('cliente', compact('id'));
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
  
     
    public function update(Request $request, $id_cliente)
    { 
      
      try{
        $id = array('id_cliente' => $request->id_cliente);
        $updateArray = [
                        'cedula' => $request->cedula,
                        'fecha_nacimiento' => $request->fecha_nacimiento,
                        'edad' => $request->edad1,
                        'nombre' => $request->nombre,
                        'celular' => $request->celular,
                        'direccion' => $request->direccion,
                        'barrio' => $request->barrio,
                        'email' => $request->email,
                       
                       ];
          
          $id_cliente  = Cliente::where($id)->update($updateArray);
 
        } catch (\Exception  $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

          return response()->json(['success'=>'Successfully']);
     
         /*
        $cliente = Cliente::findOrFail($id_cliente);
        $name = $request->get('name');
        $value = $request->get('value');
        $cliente->$name = $value;
        return $cliente->data();
       */

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
