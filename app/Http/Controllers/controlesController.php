<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\controles;

use App\Models\Cliente;

class controlesController extends Controller
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

          $id = cliente::join('controles', 'controles.id_cliente', '=', 'clientes.id_cliente')
          ->select('clientes.id_cliente',  'controles.id', 'controles.id_cliente', 'controles.user_id',  
          'controles.num_control', 'controles.peso', 'controles.abd', 'controles.grasa', 'controles.grasa',
           'controles.agua', 'controles.created_at')

          ->where('clientes.id_cliente',  $id);

           return datatables()->of($id)

           ->addColumn('created_at', function($row)  {  
            $date = date("d-m-Y", strtotime($row->created_at));
            return $date;
          })
                                                                                                       
            ->addColumn('action', 'atencion')
            ->rawColumns(['action'])
            ->addColumn('action', function($data) {

           

                $actionBtn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-target="#modalEditarControl"  title="Editar datos de control clínico" class="fa fa-edit editarControl"></a>

                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" title="Eliminar control médico" class="fa fa-trash eliminarControl"></a>';
                
                 
                return $actionBtn;
           

               
            })
           
           
            ->make(true);
        } 

       
        return view('cliente', compact('id'));

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
          
          'num_control'         =>    'required|max:3',
          'peso'                =>    'required|max:3',
          'abd'                 =>    'required|max:3',
          'grasa'               =>    'required|max:3',
          'agua'                =>    'required|max:3',
         ]);
 
        try {
        $data = new controles;
 
        $data->user_id            = $request->userId;
        $data->id_cliente         = $request->id_cliente;
        $data->id_historia        = $request->id_historia;           
        $data->num_control         = $request->num_control;
        $data->peso                = $request->peso;
        $data->abd                 = $request->abd;
        $data->grasa               = $request->grasa;       
        $data->agua                = $request->agua;
             
     
            
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
       
        $id_control  = controles::find($id);
        return response()->json($id_control);
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
       
              $id = $request->input('id_control');

              $control = controles::find($id);
              $control ->user_id  = $request->userId;
              $control->num_control = $request->num_control;
              $control->peso = $request->peso;
              $control->abd = $request->abd;
              $control->grasa = $request->grasa;
              $control->agua = $request->agua;
              $control->save();
           
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
        controles::find($id)->delete();
     
        return response()->json(['success'=>'deleted successfully.']);
    }
}
