<?php

namespace App\Http\Controllers;

use App\Models\listado_cita_medica;
use App\Models\mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ListadoCitaMedicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      
          if(request()->ajax()) {
            return datatables()->of(listado_cita_medica::select("id", "user_id", "id_mascota", "cliente", "mascota", "motivo_consulta", "created_at")
            ->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')) 
          
            ->addColumn('created_at', function($row)  {  
                $date = date("h:i", strtotime($row->created_at));
                    return $date;
              })
            ->addColumn('action', 'atencion')
            ->rawColumns(['action'])
            ->addColumn('action', function($data) {


                $actionBtn = '<a href="/mascota/'.$data->id_mascota.'" data-toggle="tooltip"  data-id="'.$data->id_mascota.'" title="Ir a consulta médica" class=" fa fa-stethoscope cita"></a> 
               
                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" title="Eliminar registro" class="fa fa-trash deletePost"></a>';
                
                 
                return $actionBtn;
               
            })
           
           
            ->make(true);
        } 
        return view('inicio');
    



    }



    public function seleccionarMascota($id){

    	// Fetch Employees by Departmentid
        $mascota['data'] = mascota::orderby("id","asc")
        			->select('id','nombre')
        			->where('id',$id)
        			->get();
  
        return response()->json($mascota);
     
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
      try {
            $save = new Listado_cita_medica;
    
            $save->user_id           = $request->userId;
            $save->id_mascota        = $request->idMascota;
            $save->cliente           = $request->nombreCliente;
            $save->mascota           = $request->nombre_Mascota;
            $save->motivo_consulta   = $request->motivo_consulta;
             $save->especie          = $request->buscarEspecie;
         
        } catch (\Exception  $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
   
            $save->save();
            return response()->json(['success'=>'Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\listado_cita_medica  $listado_cita_medica
     * @return \Illuminate\Http\Response
     */
    public function show(listado_cita_medica $listado_cita_medica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\listado_cita_medica  $listado_cita_medica
     * @return \Illuminate\Http\Response
     */
    public function edit(listado_cita_medica $listado_cita_medica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\listado_cita_medica  $listado_cita_medica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, listado_cita_medica $listado_cita_medica)
    {
        //
    }

   


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\registros_contable  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        listado_cita_medica::find($id)->delete();
     
        return response()->json(['success'=>'registro eliminado correctamente.']);
    }

}
