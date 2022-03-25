<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    #protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user){
        # Manda para a página do administrador caso o usuário esteja cadastrado como tendo esse papel
        if($user->hasRole('administrador')){
            return redirect()->route('adminDashboard');
        }
        # manda para página do bibliotecário
        if($user->hasRole('bibliotecario')){
            return redirect()->route('bibliotecarioDashboard');
        }
        # manda para página do usuário
        if($user->hasRole('usuario')){
            return redirect()->route('userDashboard');
        }
            
    }
}
