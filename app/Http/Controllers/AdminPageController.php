<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminPageController extends Controller
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
        return view('index');
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
      if ($request->usr_password == $request->re_password) {
         $edit = User::whereUsrId($request->id)->first();
         $edit->usr_name     = $request->usr_name;
         $edit->usr_phone    = $request->usr_phone;
         $edit->usr_password = hash::make($request->usr_password);
         //dd($edit);
         $edit->save();
         return redirect('admin/profile')->withSuccess('Data telah disimpan');     
      }else{
        return back()->withError('Password tidak sama');
      }


    	
    }

   	public function manageAssets()
   	{
   		return view('assets.manage-assets');
   	}

   	public function manageUsers()
   	{
   		return view('users.manage-users');
   	}

    public function detail()
    {
      return view('users.manage-detail-users');
    }

    

}
