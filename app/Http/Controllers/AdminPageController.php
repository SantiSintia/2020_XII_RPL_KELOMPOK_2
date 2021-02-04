<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Teacher;
use App\Student;
use App\User;
use Illuminate\Support\Facades\Hash;

use RealRashid\SweetAlert\Facades\Alert;

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

   	// public function manageAssets()
   	// {
   	// 	return view('assets.manage-assets');
   	// }

   	public function manageUsers()
   	{
      $users =User::where('role_id',2)->orwhere('role_id',3)->get();
   		return view('users.manage-users', compact('users'));
   	}

    public function detail($id)
    {
      $role    = User::join('roles', 'usr_id', '=' , 'id')
                     ->whereUsrId($id)->first();
      if($role->name == "teacher")
      {
      $user = User::join('teachers','users.usr_id','=','tc_usr_id')
                     ->where('users.usr_id',$id)->first();
      }else
      {
      $user = User::join('students','users.usr_id','=','std_usr_id')
                     ->where('users.usr_id',$id)->first();
      }
      
      return view('users.manage-detail-users', compact(['user','role']));
    }

    public function status($id)
    {
      $data = \DB::table('users')->where('usr_id',$id)->first();

      $status_sekarang = $data->usr_is_active;

      if ($status_sekarang == 1) {
         \DB::table('users')->where('usr_id',$id)->update([
            'usr_is_active'=>0
         ]);
      }else{
        \DB::table('users')->where('usr_id',$id)->update([
            'usr_is_active'=>1
         ]);
      }
      return redirect('admin/user')->withSuccess('Data telah di ubah');;
    }

    

}
