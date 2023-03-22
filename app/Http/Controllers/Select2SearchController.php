<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\ModelNotFoundException;  

use App\Models\Cliente;
use App\Models\controles;
use App\models\profesionales;
use App\models\terapias;
use App\models\terapias_adicionales;




class Select2SearchController extends Controller
{

    public function index()
    {
    	return view('cliente');
    }

    public function selectSearch(Request $request)
    {
    	

        if($request->has('q')){
            $search = $request->q;
          
            $cliente =Cliente::select("user_id", "id_cliente", "cedula", "nombre", "celular", "estado")
                   
            		->where('nombre',  'LIKE', "%${search}%" )
              //  ->orwhere('cedula', 'LIKE', "%$search%")
                ->where('estado', 1)
                   // ->orWhere('cedula', 'LIKE', "%{$search}%") 
            		->get();
        }
        return response()->json($cliente);
        
    }

  
    public function mostrarCliente($id_clientes) 
   {

    $id_clientes = Cliente::leftjoin('historias_clinicas', 'historias_clinicas.id_cliente', '=', 'clientes.id_cliente')
    ->select('clientes.id_cliente', 'clientes.user_id', 'clientes.id_cliente', 'clientes.cedula', 'clientes.nombre',  'clientes.celular', 
    'clientes.direccion', 'clientes.barrio', 'clientes.email', 'clientes.edad', 'clientes.fecha_nacimiento', 'clientes.municipio','clientes.estado',
    'historias_clinicas.id', 'historias_clinicas.estatura', 'historias_clinicas.peso_inicial', 
    'historias_clinicas.abd_inicial', 'historias_clinicas.agua_inicial', 'historias_clinicas.grasa_inicial', 'historias_clinicas.imc', 
    'historias_clinicas.grasa_viseral', 'historias_clinicas.edad_metabolica', 'historias_clinicas.terapias', 'historias_clinicas.terapias_adicionales',
      'historias_clinicas.paquete_desintoxicacion', 'historias_clinicas.tipo_lavado', 'historias_clinicas.num_lavado', 'historias_clinicas.dias_lavados',
      'historias_clinicas.profesional', 'historias_clinicas.observaciones','historias_clinicas.created_at')

    ->where('clientes.id_cliente',  $id_clientes)
   
    ->get();


    if($id_clientes === null){
   // $id_cliente = cliente::where('id_cliente',  $id_cliente)->firstOrFail();

   
    return Redirect()->Route('inicio');

} else {


    $profesionales = profesionales::select('id','nombre')->get(); 
    $terapias = terapias::select('id','terapia')->get();
    $terapias_adicionales = terapias_adicionales::select('id','terapias_adicionales')->get();
    $controles = controles::select()->get(); 

    
    return view('cliente', compact('id_clientes', 'profesionales', 'terapias', 'terapias_adicionales', 'controles'));
   
 }

    
       
  } 
 
}