<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
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
    //protected $redirectTo = '/dashboard';

    public function redirectTo()
    {
      $role = Auth::user()->is_permission;
      switch($role)
      {
        case 1:
          return '/dashboard';
          break;
        case 2:
          return '/';
          break;
          case 3:
            return '/';
            break;
        default:
          return '/';
          break;
      }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     protected $username;

     /**
      * Create a new controller instance.
      */
     public function __construct()
     {
         $this->middleware('guest')->except('logout');

         $this->username = $this->findUsername();
     }

     /**
      * Get the login username to be used by the controller.
      *
      * @return string
      */
     public function findUsername()
     {
         $login = request()->input('login');

         $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

         request()->merge([$fieldType => $login]);

         return $fieldType;
     }

     /**
      * Get username property.
      *
      * @return string
      */
     public function username()
     {
         return $this->username;
     }


  


 }
