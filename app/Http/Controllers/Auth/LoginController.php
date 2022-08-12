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
    protected $redirectTo = '/admindashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)

    {

        $input = $request->all();



        $this->validate($request, [

            'email' => 'required|email',

            'password' => 'required',

        ]);



        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {

            if(auth()->user()->is_admin == "admin") {

                return redirect('admindashboard');
            }
            elseif(auth()->user()->is_admin == "reservator") {

                return redirect('reservatordashboard');
            }
            elseif(auth()->user()->is_admin == "kepalapuskesmas") {

                return redirect('kepalapuskesmas');
            }
            elseif(auth()->user()->is_admin == "penyewa") {

                return redirect('penyewa');
            }
            else{

                return redirect()->route('login');
            }

        }else{

            return redirect()->route('login')

                ->with('error','Email-Address And Password Are Wrong.');

        }



    }
}
