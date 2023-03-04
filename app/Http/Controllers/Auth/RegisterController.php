<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    public function index()
    {
      
                
        if(request()->ajax()) {

          //  $id = $request->id_cliente;

          $id = User::select('id','name', 'email', 'created_at');

           return datatables()->of($id)

           ->addColumn('created_at', function($row)  {  
            $date = date("d-m-Y", strtotime($row->created_at));
            return $date;
          })
                                                                                                       
            ->addColumn('action', 'atencion')
            ->rawColumns(['action'])
            ->addColumn('action', function($data) {

           

                $actionBtn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-target="#modalEditarUsuario"  title="Editar datos del usuario" class="fa fa-edit editarUsuario"></a>

                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" title="Eliminar usuario" class="fa fa-trash eliminarUsuario"></a>';
                
                 
                return $actionBtn;
           

               
            })
           
           
            ->make(true);
        } 

       
        return view('register');

    }



    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;

   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function registration()
    {

          return view('register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'clave' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        
        return User::create([
            'name' => $request['nombre'],
            'email' => $request['email'],
            'password' => Hash::make($request['clave']),
        ]);
    }

    public function edit($id)
    {
       
        $id_usuario  = User::find($id);
        return response()->json($id_usuario);
    }


    public function update(Request $request, $id)
    {
       
              $id = $request->input('id_usuario');

              $user = User::find($id);

              $user ->name  = $request->nombre;
              $user->email = $request->email;
              $user->password = Hash::make($request->clave);
              
              $user->save();
           
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
        User::find($id)->delete();
     
        return response()->json(['success'=>'deleted successfully.']);
    }



}
