<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Request;
use App\User; 
use Auth;
use Session;
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
    //protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
            //return redirect('login');
    }

    public function signon()
    {
        # code...
        return view('signon.dooyum_ternam');
    }

    protected function authenticated(Request $request, $user)
    {
        flash(translate('welcome_back').' '.$user->other_name.' '.$user->first_name.' '.$user->middle_name)->success();
        return redirect()->intended('dash');
    }

    public function logout(Request $request)
    {
        # code...
        Auth::logout(); 
        session(['role' => '']); 
        Session::flush(); 
        flash(translate('you_are_logged_out'))->success();
        return redirect('/login'); 
    }
}
