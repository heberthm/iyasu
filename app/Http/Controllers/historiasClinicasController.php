<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


use App\Models\historias_clinicas;

use App\Models\Cliente;

class historiasClinicasController extends Controller
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
    
              $id = Cliente::join('historias_clinicas', 'historias_clinicas.id_cliente', '=', 'clientes.id_cliente')
              ->select('clientes.id_cliente', 'clientes.user_id', 'clientes.cedula', 'clientes.nombre',  'clientes.celular', 'clientes.estado',
              'clientes.direccion', 'clientes.barrio', 'clientes.email', 'clientes.edad', 'clientes.fecha_nacimiento', 'clientes.municipio',
              'historias_clinicas.id', 'historias_clinicas.estatura', 'historias_clinicas.peso_inicial', 
              'historias_clinicas.abd_inicial', 'historias_clinicas.agua_inicial', 'historias_clinicas.grasa_inicial', 'historias_clinicas.imc', 
              'historias_clinicas.grasa_viseral', 'historias_clinicas.edad_metabolica', 'historias_clinicas.terapias', 'historias_clinicas.terapias_adicionales',
              'historias_clinicas.paquete_desintoxicacion', 'historias_clinicas.tipo_lavado', 'historias_clinicas.num_lavado', 'historias_clinicas.dias_lavados',
              'historias_clinicas.profesional', 'historias_clinicas.observaciones','historias_clinicas.created_at')
             
              ->where('clientes.id_cliente',  $id);
    
               return datatables()->of($id)

               ->addColumn('created_at', function($row)  {  
                $date = date("d-m-Y", strtotime($row->created_at));
                return $date;
              })
                                                                                                           
                ->addColumn('action', 'atencion')
                ->rawColumns(['action'])
                ->addColumn('action', function($data) {
    
    
                    $actionBtn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-target="#modalMostrarHistoriaClinica"  title="Ver datos história clínica" class="fa fa-eye mostrar_historia"></a> 
                   
                    <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-target="#modalEditarHistoriaClinica"  title="Editar datos de história clínica" class="fa fa-edit editarHistoria"></a>
    
                    <a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id.'" data-target="#modalVerControlesMedicos"  title="Control médico" class="fa fa-street-view verControl"></a>

                    <a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id.'" title="Eliminar abono" class="fa fa-trash eliminarHistoria"></a>';


                    
                     
                    return $actionBtn;
                   
                })
               
               
                ->make(true);
            } 
    
           
            return view('cliente', compact('id'));
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
          'nombre'                               =>    'max:60',
          'estatura'                             =>    'max:3',
          'estatura'                             =>    'max:3',
          'profesional'                          =>    'max:60',
          'peso_inicial'                         =>    'max:3',
          'abd_inicial'                          =>    'max:3',
          'grasa_inicial'                        =>    'max:3',
          'agua_inicial'                         =>    'max:3',
          'imc'                                  =>    'max:3',
          'grasa_viseral'                        =>    'max:3',
          'edad_metabolica'                      =>    'max:3',
          'terapias'                             =>    'max:60',
          'paquete_desintoxicacion'              =>    'max:60',
          'terapias_adicionales'                 =>    'max:60',
          'tipo_lavado'                          =>    'max:60',
          'num_lavado'                           =>    'max:3',
          'dias_lavados'                         =>    'max:3',
          'observaciones'                        =>    'max:600',
         
        ]);
 
      //  try {
        $data = new historias_clinicas();
 
        $getterapias = $request->terapias;
        $terap = implode(',', $getterapias);

        $getterapias_adicionales = $request->terapias_adicionales;
        $teraps = implode(',', $getterapias_adicionales);

        $data->user_id          = $request->userId;
        $data->id_cliente       = $request->id_cliente;
        $data->nombre           = $request->nombre;
         $data->edad            = $request->edad;
        $data->profesional      = $request->profesional;
        $data->estatura         = $request->estatura;
        $data->peso_inicial     = $request->peso_inicial;
        $data->abd_inicial      = $request->abd_inicial;
        $data->grasa_inicial    = $request->grasa_inicial;
        $data->agua_inicial     = $request->agua_inicial;
        $data->imc              = $request->imc;
        
        $data->grasa_viseral     = $request->grasa_viseral;
        $data->edad_metabolica   = $request->edad_metabolica;
        $data->terapias = $terap;
        $data->terapias_adicionales = $teraps;
        $data->paquete_desintoxicacion     = $request->paquete_desintoxicacion;
      
        $data->tipo_lavado     = $request->tipo_lavado;
        $data->num_lavado      = $request->num_lavado;
        $data->dias_lavados    = $request->dias_lavados;
        $data->observaciones   = $request->observaciones;
       

     
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $id_historia  = historias_clinicas::find($id);
      return response()->json($id_historia);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $id_historia  = historias_clinicas::find($id);
      return response()->json($id_historia);
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
                        'profesional' => $request->profesional,
                        'estatura' => $request->estatura,
                        'peso_inicial' => $request->peso_inicial,
                        'abd_inicial' => $request->abd_inicial,
                        'grasa_inicial' => $request->grasa_inicial,
                        'agua_inicial' => $request->agua_inicial,
                        'imc' => $request->imc,
                        'grasa_viseral' => $request->grasa_viseral,

                        'edad_metabolica' => $request->edad_metabolica,
                        'terapias' => $request->terapias,
                        'paquete_desintoxicacion' => $request->paquete_desintoxicacion,
                        'terapias_adicionales' => $request->terapias_adicionales,

                        'tipo_lavado' => $request->tipo_lavado,
                        'num_lavado' => $request->num_lavado,
                        'dias_lavados' => $request->dias_lavados,
                        'observaciones' => $request->observaciones,
                       
                       ];
          
          $id_cliente  = historias_clinicas::where($id)->update($updateArray);
 
        } catch (\Exception  $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

          return response()->json(['success'=>'Successfully']);
     
        
    } 



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        historias_clinicas::find($id)->delete();
     
        return response()->json(['success'=>'Mascota eliminado correctamente.']);
    }
}