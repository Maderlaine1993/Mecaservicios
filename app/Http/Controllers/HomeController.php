<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $trabajador = Auth::guard()->user();

        if ($trabajador->rol_id == 1) {
            return view('home');
        } elseif ($trabajador->rol_id == 3) {
            return view('home_dos');
        } else {
            return redirect('/login');
        }
    }
}
