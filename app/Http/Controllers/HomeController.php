<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\profesionales;

use App\Models\terapias;

use App\Models\Cliente;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        $profesionales = profesionales::select('id','nombre')->get(); 
        $terapias = terapias::select('id','terapia', 'color')->orderBy('terapia', 'ASC')->get(); 
        return view('inicio', compact('profesionales', 'terapias'));
    }
}
