<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function indexServicio()
    {
        $servicio = Servicio::orderBy('id_servicio', 'asc')->paginate(10); //Realizamos una paginación para el num de filas
        return view('servicios.viewServices', compact('servicio'));
    }

    public function createServicio(){
        return view('servicios.formServices');
    }

    public function saveServicio(Request $request){

        $servicio = $this->validate($request, [
            "snombre" => "required",
            "scosto"  => "required",
        ]);

        Servicio::create([
            "snombre" => $servicio["snombre"],
            "scosto"  => $servicio["scosto"],
        ]);

        return redirect('/Servicios/list')->with('Guardado', "Servicio Nuevo Registrado");
    }

    public function editServicio($id_servicio){

        $servicio = Servicio::findOrFail($id_servicio);
        return view('servicios.modifyServices', compact('servicio'));
    }

    public function updateServicio(Request $request, $id_servicio){

        $servicio = request()->except((['_token', '_method']));
        Servicio::where('id_servicio', '=', $id_servicio)->update($servicio);

        return redirect('/Servicios/list')->with('Editado', "Servicio Modificado");
    }

    public function deleteServicio($id_servicio){

        Servicio::destroy($id_servicio);
        return redirect('/Servicios/list')->with('Eliminado', "El Servicio se ha Eliminado");

    }
}
