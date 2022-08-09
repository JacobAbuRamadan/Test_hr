<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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


protected function authenticated(Request $request, $user)
{
if ( $user->type=='super-admin') {
    return redirect()->route('employees.index');
}
if ( $user->type=='hr') {
    return redirect()->route('employees.index');
}

if ( $user->type=='employee') {
    return redirect()->route('userdata.index');

}
if ( $user->type=='user') {
    return redirect()->route('not.allowed');

}


return redirect('/home');


}

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

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
