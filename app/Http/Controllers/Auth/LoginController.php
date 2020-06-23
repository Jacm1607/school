<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->estado) {
            $roles_user = $user->roles()->where('estado',1)->get();
            if ($roles_user->isNotEmpty()) {
                $user->setSession($roles_user->toArray());
            } else {
                $this->guard()->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return view('auth/login')->withErrors(['password' => 'Usuario sin rol activo.']);
            }
        } else {
            $this->guard()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return view('auth/login')->withErrors(['password' => 'Usuario inactivo contactese con el Administrador.']);
        }
    }
}
