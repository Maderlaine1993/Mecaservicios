<?php

namespace App\Http\Controllers;

use App\Models\Repuesto;
use Illuminate\Http\Request;

class RepuestoController extends Controller
{
 
    public function indexRepuesto()
    {
        $repuesto = Repuesto::paginate(10);//el numero de filas
        return view('repuesto.vistaRepuesto', compact('repuesto'));
    }

    public function createRepuesto()
    {
        return view('repuesto.formRepuesto');
    }

    public function saveRepuesto(Request $request)
    {
        $repuesto = $this->validate($request, [
            "id_repuesto"=> "required",
            "rnombre"    => "required",
            "rcantidad"  => "required",
            "rprecio"    => "required",
            "stock_min"  => "required",
        ]);

        Repuesto::create([
            "id_repuesto"  => $repuesto["id_repuesto"],
            "rnombre"      => $repuesto["rnombre"],
            "rcantidad"    => $repuesto["rcantidad"],
            "rprecio"      => $repuesto["rprecio"],
            "stock_min"    => $repuesto["stock_min"],
        ]);

        return redirect('/readRepuesto')->with('Guardado', "Repuesto Registrado");
    }


    public function editRepuesto($id_repuesto)
    {
        $repuesto = Repuesto::findOrFail($id_repuesto);

        return view('repuesto.modifyRepuesto', compact('repuesto'));
    }

    public function updateRepuesto(Request $request, $id_repuesto)
    {
        $repuesto = request()->except((['_token', '_method']));
        Repuesto::where('id_repuesto', '=', $id_repuesto)->update($repuesto);

        return redirect('/readRepuesto')->with('Editado', "Repuesto editado");
    }

    public function deleteRepuesto($id_repuesto)
    {
        Repuesto::destroy($id_repuesto);
        return redirect('/readRepuesto')->with('Eliminado', "Cliente Eliminado");
    }
}
