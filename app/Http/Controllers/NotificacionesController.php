<?php

namespace App\Http\Controllers;

use App\Models\notificaciones;
use Illuminate\Http\Request;

class NotificacionesController extends Controller
{

    public function index()
    {
        $notificacion = notificaciones::paginate(10);//el numero de filas
        return view('notificaciones.vistaNoti', compact('notificacion'));
    }

    public function deleteNoti($id_noti)
    {
        notificaciones::destroy($id_noti);
        return redirect('/readnotificacion')->with('Eliminado', "Notificacion Enviada");
    }

}
