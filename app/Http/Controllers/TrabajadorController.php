<?php

namespace App\Http\Controllers;

use App\Models\trabajador;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{

    public function indexTrabajador()
    {
        $trabajador = trabajador::paginate(10);//el numero de filas
        return view('trabajador.viewTrabajador', compact('trabajador'));
    }


    public function createTrabajador()
    {
        return view('trabajador.formTrabajador');
    }

  
    public function saveTrabajador(Request $request)
    {
        $trabajador = $this->validate($request, [
            "tnum"         => "required",
            "contrasenia"  => "required",
            "tnombre"      => "required",
            "tapellido"    => "required",
            "rol_id"       => "required",      
        ]);

        trabajador::create([
            "tnum"           => $trabajador["tnum"],
            "contrasenia"    => $trabajador["contrasenia"],
            "tnombre"        => $trabajador["tnombre"],
            "tapellido"      => $trabajador["tapellido"],
            "rol_id"         => $trabajador["rol_id"],
        ]);

        return redirect('/readTrabajador')->with('Guardado', "Trabajador Registrado");
    }
 
    public function editTrabajador($tnum)
    {
        $trabajador = trabajador::findOrFail($tnum);

        return view('trabajador.modifyTrabajador', compact('trabajador'));
    }


    public function updateTrabajador(Request $request, $tnum)
    {
        $trabajador = request()->except((['_token', '_method']));
        trabajador::where('tnum', '=', $tnum)->update($trabajador);

        return redirect('/readTrabajador')->with('Editado', "Trabajador editado");
    }


    public function deleteTrabajador($tnum)
    {
        trabajador::destroy($tnum);
        return redirect('/readTrabajador')->with('Eliminado', "Trabajador Eliminado");
    }
}
