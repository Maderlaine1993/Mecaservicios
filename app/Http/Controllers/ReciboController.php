<?php

namespace App\Http\Controllers;

use App\Models\recibo;
use App\Models\servicioMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;;//creada la class

class ReciboController extends Controller
{

    public function indexRecibo()
    {
        $recibo = DB::table('recibo')
            ->join('servicio_mecanico','servicio_mecanico.id_serv_mec', '=', 'recibo.serv_mec_id')
            ->select('recibo.*', 'servicio_mecanico.cliente_nit')
            ->paginate(10);//el numero de filas

        return view('recibo.vistaRecibo', compact('recibo'));
    }

    public function generarPDF($id_recibo)
    {

        $recibo = recibo::findOrFail($id_recibo);

        //Para visualizar llaves foraneas
        $servicio_mecanico = servicioMe::all();

        $pdf = PDF::loadView('Recibo.boleta', compact('recibo','servicio_mecanico'));

        return $pdf->stream('BoletaPago.pdf');

    }

}
