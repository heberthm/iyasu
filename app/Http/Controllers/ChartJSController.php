<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\registrar_tratamientos;

use App\Models\Cliente;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class ChartJSController extends Controller
{

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {

        $registros = registrar_tratamientos::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');



        $clientes = Cliente::count();

        $suma_tratamientos = registrar_tratamientos::sum('valor_tratamiento');

        $ingresos_hoy = registrar_tratamientos::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))
            ->sum('valor_tratamiento');

        $clientes_hoy = registrar_tratamientos::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))
            ->count();


        return view('estadisticas', compact('registros', 'clientes', 'suma_tratamientos', 'ingresos_hoy', 'clientes_hoy'));
    }
}
