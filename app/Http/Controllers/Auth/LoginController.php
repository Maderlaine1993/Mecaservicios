<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\trabajador;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'tnum' => ['required', 'numeric'],
            'contrasenia' => ['required'],
        ]);

        $trabajador = trabajador::where('tnum', $credentials['tnum'])
            ->where('contrasenia', $credentials['contrasenia'])
            ->first();

        if (!$trabajador) {
            throw ValidationException::withMessages([
                'tnum' => __('auth.failed'),
            ]);
        }

        if ($trabajador->rol_id == 1) {
            Auth::login($trabajador);
            return redirect('/home');
        } elseif ($trabajador->rol_id == 3) {
            Auth::login($trabajador);
            return redirect('/home');
        } else {
            throw ValidationException::withMessages([
                'tnum' => __('auth.failed'),
            ]);
        }
    }
}
