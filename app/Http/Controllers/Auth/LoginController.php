<?php

namespace App\Http\Controllers\Auth;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
     // protected $redirectTo = RouteServiceProvider::HOME;
     protected function redirectTO()
     {
         if(Auth::user()->userType =='ADMIN')
         {
             return 'admin/dashboard';
         }
         else if(Auth::user()->userType =='CLASSTEACHER')
         {
             return 'class-teacher/dashboard';
         }
         else if(Auth::user()->userType =='STUDENT')
         {
             return 'student/dashboard';
         }
     }

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
