<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\mecanico;
use App\Models\Repuesto;
use App\Models\Servicio;
use App\Models\servicioMe;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServicioMeController extends Controller
{

    public function indexServ_Mec()
    {
        $servicio_mecanico= DB::table('servicio_mecanico')
            ->join('servicio','servicio_mecanico.servicio_id', '=', 'servicio.id_servicio')
            ->join('repuesto','servicio_mecanico.repuesto_id', '=', 'repuesto.id_repuesto')
            ->join('mecanico','servicio_mecanico.mecanico_id', '=', 'mecanico.id_mec')
            ->join('cliente','servicio_mecanico.cliente_nit', '=', 'cliente.nit')
            ->join('vehiculo','servicio_mecanico.vehiculo_placa', '=', 'vehiculo.placa')
            ->select('servicio_mecanico.*', 'servicio.snombre','mecanico.mnombre','cliente.cnombre','repuesto.rnombre','vehiculo.placa')
            ->paginate(10);//el numero de filas

        return view('servicioMe.vistaServicioMe', compact('servicio_mecanico'));
    }


    public function createServ_Mec()
    {
        $servicio = Servicio::all();
        $repuesto = Repuesto::all();
        $mecanico = mecanico::all();
        $cliente  = Cliente::all();
        $vehiculo  = Vehiculo::all();

        return view('servicioMe.formServicioMe', compact('servicio', 'repuesto','mecanico','cliente','vehiculo'));
    }


    public function saveServ_Mec(Request $request)
    {
        $servicio_mecanico = $this->validate($request, [
            "servicio_id"    => "required",
            "repuesto_id"    => "required",
            "mecanico_id"    => "required",
            "cliente_nit"    => "required",
            "vehiculo_placa" => "required",
            "fecha"          => "required",
            "estado"         => "required"
        ]);

        // Convertir las fechas al formato deseado
        $fecha = Carbon::createFromFormat('d/m/Y', $request->fecha)->toDateString();

        servicioMe::create([
            "servicio_id"    => $servicio_mecanico["servicio_id"],
            "repuesto_id"    => $servicio_mecanico["repuesto_id"],
            "mecanico_id"    => $servicio_mecanico["mecanico_id"],
            "cliente_nit"    => $servicio_mecanico["cliente_nit"],
            "vehiculo_placa" => $servicio_mecanico["vehiculo_placa"],
            "fecha"          => $fecha,
            "estado"         => $servicio_mecanico["estado"],
        ]);

        return redirect('/readServ_Mec')->with('Guardado', "Servicio Mecanico Registrado");
    }

    public function editServ_Mec($id_serv_mec)
    {
        $servicio_mecanico = servicioMe::findOrFail($id_serv_mec);
        $servicio = Servicio::all();
        $repuesto = Repuesto::all();
        $mecanico = mecanico::all();
        $cliente = Cliente::all();
        $vehiculo = Vehiculo::all();

        return view('servicioMe.modifyservicioMe', compact('servicio_mecanico','repuesto','servicio', 'mecanico','cliente','vehiculo'));
    }

    public function updateServ_Mec(Request $request, $id_serv_mec)
    {
        $servicio_mecanico = request()->except((['_token', '_method']));
        servicioMe::where('id_serv_mec', '=', $id_serv_mec)->update($servicio_mecanico);

        return redirect('/readServ_Mec')->with('Editado', "Servicio Mecanico editado");
    }

    public function deleteServ_Mec($id_serv_mec)
    {
        servicioMe::destroy($id_serv_mec);

        return redirect('/readServ_Mec')->with('Eliminado', "Servicio Mecanico Eliminado");
    }
}
