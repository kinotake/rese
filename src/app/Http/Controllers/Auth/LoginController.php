<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    // protected $redirectTo ='/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function redirectPath($request)
    // {
    //     $request->authenticate();
 
    //     $request->session()->regenerate();

    //     if (Auth::User()->role == 2) {

    //         return redirect('/owner');

    //         }
    //     return redirect('login');
    // }

    public function redirectPath()
    {
        $role = Auth::user()->role_id;
        if($role == 1){
            return '/';
        }
        if($role == 2){
            return '/owner';
        }
        if($role == 3){
            return '/administrator';
        }
    }
}
