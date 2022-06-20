<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminAuthenticated​;
use RealRashid\SweetAlert\Facades\Alert;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    // public function getData(Request $req){
    //     $req->validate([
    //         'username'=>'required',
    //         'password' => 'required',
    //     ]);
    //     return $req->input();
    // }

    public function redirectTo() {
        $role = Auth::user()->role;
        switch ($role) {
          case 'admin':
            Alert::toast('Welcome to Mantalongon National High School!');
            return '/admin-dashboard';
            break;
          case 'adviser':
            Alert::toast('Welcome to Mantalongon National High School!');
            return '/adviser';
            break;
            case 'none-advisory':
                Alert::toast('Welcome to Mantalongon National High School!');
                return '/non_advisory';
                break;

          default:
            return '/login';
          break;
        }
      }

}
