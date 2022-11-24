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

          $id = controles::select('id_cliente', 'num_control', 'peso', 'abd',  'grasa', 'agua', 'created_at' )

          ->where('id_cliente',  $id);

           return datatables()->of($id)

           ->addColumn('created_at', function($row)  {  
            $date = date("d-m-Y", strtotime($row->created_at));
            return $date;
          })
                                                                                                       
            ->addColumn('action', 'atencion')
            ->rawColumns(['action'])
            ->addColumn('action', function($data) {

           /*

                $actionBtn = '<a href="javascript:void(0)" data-toggle="modal"  data-id="'.$data->id_historia_clinica.'" data-target="#modalEditarHistoriaClinica"  title="Editar datos de história clínica" class="fa fa-edit edit"></a>

                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id_historia_clinica.'title="Eliminar história clínica" class="fa fa-trash deletePost"></a>';
                
                 
                return $actionBtn;
           */

               
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
 
        $data ->user_id            = $request->userId;
        $data ->id_cliente         = $request->id_cliente;        
        $data->num_control         = $request->num_control;
        $data->peso                = $request->peso;
        $data->abd                = $request->abd;
        $data->grasa              = $request->grasa;       
        $data->agua               = $request->agua;
             
     
            
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
        //
    }
}
