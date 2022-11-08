<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    protected function authenticated()
    {
        if(\Auth::User()->email_verified_at==null) {
            \Auth::logout();
            return redirect('/login')->with('error', 'No has verificado el email');

        }else if(\Auth::user()->actived==0) {
            \Auth::logout();
            return redirect('/login')->with('error', 'El administrador no te ha verificado');
        }else
            return view('welcome');
        
    }
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    
}
