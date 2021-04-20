<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Borrow;
use App\borrows_statuse;
use App\borrow_asset;
use Illuminate\Support\Facades\Hash;

use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware(['auth']);
         
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('users.index-user');
    }

   public function profile()
    {
        return view('profiles.profile');
    }

    public function changeProfile()
    {
        return view('profiles.reset-password');
    }
    
    public function saveChangeProfile(Request $request)
    {

         if (Auth()->user()->hasRole('student')) {
            if ($request->usr_password) {
                 if ($request->usr_password == $request->re_password) {
                 $edit = User::whereUsrId($request->id)->first();
                 $edit->usr_name     = $request->usr_name;
                 $edit->usr_phone    = $request->usr_phone;
                 $edit->usr_password = hash::make($request->usr_password);
                 //dd($edit);
                 $edit->save();
                 return redirect('user/profile')->withSuccess('Data telah disimpan');     
      }else{
        return back()->withError('Password tidak sama');
      }
            }else{
                 $edit = User::whereUsrId($request->id)->first();
                 $edit->usr_name     = $request->usr_name;
                 $edit->usr_phone    = $request->usr_phone;
                 $edit->save();
                return redirect('user/profile')->withSuccess('Data telah disimpan');
            }
          
        }elseif(Auth()->user()->hasRole('teacher')){
            if ($request->usr_password) {
               if ($request->usr_password == $request->re_password) {
                 $edit = User::whereUsrId($request->id)->first();
                 $edit->usr_name     = $request->usr_name;
                 $edit->usr_phone    = $request->usr_phone;
                 $edit->usr_password = hash::make($request->usr_password);
                 //dd($edit);
                 $edit->save();
                 return redirect('user/profile')->withSuccess('Data telah disimpan');     
      }else{
        return back()->withError('Password tidak sama');
      }
            }else{
                $edit = User::whereUsrId($request->id)->first();
                 $edit->usr_name     = $request->usr_name;
                 $edit->usr_phone    = $request->usr_phone;
                 $edit->save();
                return redirect('user/profile')->withSuccess('Data telah disimpan');
            }
            
        }elseif(Auth()->user()->hasRole('staff')){
            if ($request->usr_password) {
                if ($request->usr_password == $request->re_password) {
                 $edit = User::whereUsrId($request->id)->first();
                 $edit->usr_name     = $request->usr_name;
                 $edit->usr_phone    = $request->usr_phone;
                 $edit->usr_password = hash::make($request->usr_password);
                 //dd($edit);
                 $edit->save();
                 return redirect('staff/profile')->withSuccess('Data telah disimpan');     
      }else{
        return back()->withError('Password tidak sama');
      }
            }else{
                 $edit = User::whereUsrId($request->id)->first();
                 $edit->usr_name     = $request->usr_name;
                 $edit->usr_phone    = $request->usr_phone;
                 $edit->save();
                return redirect('staff/profile')->withSuccess('Data telah disimpan');
            }
        }

      
    }
}