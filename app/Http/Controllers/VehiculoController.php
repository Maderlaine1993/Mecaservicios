<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiculoController extends Controller
{

    public function indexVehiculo()
    {
        $vehiculo = DB::table('vehiculo')
            ->join('cliente','vehiculo.nit_cliente', '=', 'cliente.nit')
            ->select('vehiculo.*', 'cliente.cnombre')
            ->paginate(10);//el numero de filas

        return view('vehiculo.vistavehiculo', compact('vehiculo'));
    }


    public function createVehiculo()
    {
        $cliente = Cliente::all();

        return view('vehiculo.formvehiculo', compact('cliente'));
    }


    public function saveVehiculo(Request $request)
    {
        $vehiculo = $this->validate($request, [
            "placa"       => "required",
            "marca"       => "required",
            "linea"       => "required",
            "modelo"      => "required",
            "nit_cliente" => "required",
        ]);

        Vehiculo::create([
            "placa"       => $vehiculo["placa"],
            "marca"       => $vehiculo["marca"],
            "linea"       => $vehiculo["linea"],
            "modelo"      => $vehiculo["modelo"],
            "nit_cliente" => $vehiculo["nit_cliente"],
        ]);

        return redirect('/readVehiculo')->with('Guardado', "Vehiculo Registrado");
    }

    public function editVehiculo($placa)
    {
        $vehiculo = Vehiculo::findOrFail($placa);
        $cliente=Cliente::all();

        return view('vehiculo.modifyvehiculo', compact('vehiculo', 'cliente'));
    }


    public function updateVehiculo(Request $request, $placa)
    {
        $vehiculo = request()->except((['_token', '_method']));
        Vehiculo::where('placa', '=', $placa)->update($vehiculo);

        return redirect('/readVehiculo')->with('Editado', "Vehiculo editado");
    }


    public function deleteVehiculo($placa)
    {
        Vehiculo::destroy($placa);
        return redirect('/readVehiculo')->with('Eliminado', "Vehiculo Eliminado");
    }
}
