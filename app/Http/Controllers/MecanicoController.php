<?php

namespace App\Http\Controllers;

use App\Models\mecanico;
use Illuminate\Http\Request;

class MecanicoController extends Controller
{
    public function index()
    {
        $mecanico = mecanico::paginate(10);//el numero de filas
        return view('mecanico.vistaMecanico', compact('mecanico'));
    }

    public function editMecanico($id_mec)
    {
        $mecanico= mecanico::findOrFail($id_mec);

        return view('mecanico.modifyMecanico', compact('mecanico'));
    }


    public function updateMecanico(Request $request, $id_mec)
    {
        $mecanico = request()->except((['_token', '_method']));
        mecanico::where('id_mec', '=', $id_mec)->update($mecanico);

        return redirect('/readmecanico')->with('Editado', "Mecanico Editado");
    }

    public function deleteMecanico($id_mec)
    {
        mecanico::destroy($id_mec);
        return redirect('/readmecanico')->with('Eliminado', "Mecanico Eliminado");
    }

}
