<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;


use App\Models\Cliente;


class XeditableController extends Controller
{
public function index()
    {
        $data = Cliente::take(5)->get();
        return view('cliente',compact('data'));
    }
    /**
     * Write Your Code..
     *
     * @return string    
    */
    public function update(Request $request)
    {
        if($request->ajax()){
            User::find($request->input('pk'))->update([$request->input('name') => $request->input('value')]);
            return response()->json(['success' => true]);
        }
    }   
}
