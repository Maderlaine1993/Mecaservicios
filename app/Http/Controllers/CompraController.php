<?php

namespace App\Http\Controllers;

use App\Models\compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        $compras = compra::paginate(10);//el numero de filas
        return view('compra.vistaCompras', compact('compras'));
    }
}
