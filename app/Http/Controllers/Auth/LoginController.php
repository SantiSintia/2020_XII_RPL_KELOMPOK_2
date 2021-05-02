<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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

    public function authenticated(Request $request, $user)
    {
       // dd($user->usr_is_active);
        if ($user->usr_is_active == 0) {
              Auth::logout();
              return redirect('/')->withToastError('Gagal login karena akun sudah tidak aktif');
         }elseif($user->usr_is_active == 1){
            if ($user->role_id == 1) {
                 return redirect()->route('admin/dashboard');
            }elseif($user->role_id == 2){
                 return redirect()->route('user/dashboard');
            }elseif($user->role_id == 3){
                 return redirect()->route('user/dashboard');
             }else{
                 return redirect()->route('staff/dashboard');
             }

         }
           

        
    }

    public function username()
    {
        return 'usr_email';
    }
}
