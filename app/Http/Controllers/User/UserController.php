<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Borrow;
use Auth;
use Illuminate\Support\Facades\DB;
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
    public function index(){
        $borrow = Borrow::('brw_usr_id', Auth::user()->usr_id)
                        ->count();
    return view('users.index-user' , compact('borrow'));
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



    public function listBorrows()
    {
      $borrows = borrow_asset::join('assets', 'borrow_assets.bas_ass_id', '=', 'assets.ass_id')
            ->join('borrows', 'borrow_assets.bas_brw_id', '=', 'borrows.brw_id')
            ->join('users', 'borrows.brw_usr_id', '=', 'users.usr_id')
            ->where('borrows.brw_status', '=', 1)
            ->where('brw_usr_id', Auth::user()->usr_id)
            ->select('borrow_assets.bas_brw_id', 'users.usr_name', DB::raw('count(*) as total'))
            ->groupBy('borrow_assets.bas_brw_id')
            ->get();
        //return $borrows;
        // dd($borrows);
       return view('users.list-borrows',compact(['borrows']));
    }

    public function show($id)
    {
        $data ['borrows'] = borrow_asset::where('bas_brw_id', $id)
            ->join('assets', 'borrow_assets.bas_ass_id', '=', 'assets.ass_id')
            ->join('borrows', 'borrow_assets.bas_brw_id', '=', 'borrows.brw_id')
            ->join('users', 'borrows.brw_created_by', '=', 'users.usr_id')
            ->where('bas_status', 1)
            ->select(
                'borrows.*' , 'borrow_assets.*','assets.*' , 'users.*','borrows.created_at as brw_created_at'
            )
            ->get();
        $data ['borrowId'] = Borrow::whereBrwId($id)->first();
        $cek_user = Borrow::whereBrwId($id)->first();
 
            $data ['user'] = Student::whereStdUsrId($cek_user->brw_usr_id)
                ->join('users' , 'students.std_usr_id' , '=' , 'users.usr_id')
                ->first();

        return view('borrows.detail-borrow', $data);
    }



    public function History(){
        $data ['history'] = borrow_asset::join('borrows' , 'borrow_assets.bas_brw_id' , '=' , 'borrows.brw_id')
            ->join('assets' , 'borrow_assets.bas_ass_id' , '=' , 'assets.ass_id')
            ->join('users as UserId' ,  'borrows.brw_usr_id' ,  '='  , 'UserId.usr_id')
            ->join('users as CreatedBy' ,  'borrow_assets.bas_created_by' ,  '='  , 'CreatedBy.usr_id')
            ->join('users as UpdatedBy' ,  'borrow_assets.bas_updated_by' ,  '='  , 'UpdatedBy.usr_id')
            ->join('students' , 'borrows.brw_usr_id' , '=' , 'students.std_usr_id')
            ->select(
                'CreatedBy.usr_name as CreatedByName','UpdatedBy.usr_name as UpdatedByName' ,  'UserId.usr_name  as UserByName',
                'borrows.*'  ,  'assets.*' , 'borrow_assets.*',
                'borrow_assets.created_at as  CreatedAt', 'borrow_assets.updated_at as  UpdatedAt',
                'students.*'
            )
            ->orderBy('bas_id'  , 'DESC')
            ->get();
        return view ('returns.return-history', $data);
    }
}