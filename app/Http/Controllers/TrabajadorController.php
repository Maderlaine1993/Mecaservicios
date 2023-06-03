<?php

namespace App\Http\Controllers;

use App\Models\rol;
use App\Models\trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrabajadorController extends Controller
{

    public function indexTrabajador()
    {
        $trabajador = DB::table('trabajador')
            ->join('rol','rol.id_rol', '=', 'trabajador.rol_id')
            ->select('trabajador.*', 'rol.descripcion')
            ->paginate(10);//el numero de filas

        return view('trabajador.viewTrabajador', compact('trabajador'));
    }


    public function createTrabajador()
    {
        $rol = rol::all();

        return view('trabajador.formTrabajador', compact('rol'));
    }


    public function saveTrabajador(Request $request)
    {
        $trabajador = $this->validate($request, [
            "contrasenia"  => "required",
            "tnombre"      => "required",
            "tapellido"    => "required",
            "rol_id"       => "required",
        ]);

        trabajador::create([
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
        $rol=rol::all();

        return view('trabajador.modifyTrabajador', compact('trabajador', 'rol'));
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
