<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;
use App\User;
use App\Asset;
use App\asset_description;
use App\Borrow;
use App\borrows_statuse;
use App\borrow_asset;
use App\Replacement;
use App\Replacement_asset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use PDF;
use App\Restore;


class BorrowsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function ListBorrow()
    {
        return borrow_asset::join('borrows', 'bas_brw_id', '=', 'brw_id')
            ->join('users', 'bas_brw_id', '=', 'brw_id')
            ->join('assets', 'bas_ass_id', '=', 'ass_id');

    }

    public function index()
    {
        $borrows = borrow_asset::join('assets', 'borrow_assets.bas_ass_id', '=', 'assets.ass_id')
            ->join('borrows', 'borrow_assets.bas_brw_id', '=', 'borrows.brw_id')
            ->join('users', 'borrows.brw_usr_id', '=', 'users.usr_id')
            ->where('borrows.brw_status', '=', 1)
            ->select('borrow_assets.bas_brw_id', 'users.usr_name', DB::raw('count(*) as total'))
            ->groupBy('borrow_assets.bas_brw_id')
            ->get();
        //return $borrows;
        // dd($borrows);
        return view('borrows.lists-borrow', compact('borrows'));

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
        $role    = User::join('roles', 'role_id', '=' , 'id')
                     ->whereUsrId($id)->first();
                     //dd($role);
 
            $data ['user'] = Student::whereStdUsrId($cek_user->brw_usr_id)
                ->join('users' , 'students.std_usr_id' , '=' , 'users.usr_id')
                ->first();


        return view('borrows.detail-borrow', $data);
    }


    public function borrowsItem()
    {
        $name = user::join('roles', 'role_id', '=', 'id')->where('name', '!=','student')->select('users.usr_name', 'users.usr_id')->get();
        $borrow_asset = borrow_asset::where('bas_status', 1)->get();
        // dd($borrow_asset);

        $hitung_asset = borrow_asset::where('bas_status', 1)->count();
        // dd($hitung_asset);
        $assets = Asset::where('ass_status', 1)->get();
        return view('borrows.borrows-item', compact(['assets', 'name', 'borrow_asset', 'hitung_asset']));
    }

    public function save(Request $request)
    {
        $cek = borrow_asset::join('borrows', 'bas_brw_id', '=', 'brw_id')
            ->where('brw_usr_id', $request->input('name'))
            ->where('bas_status', 0)
            ->first();
        if ($cek) {
            return back()->withToastError('peminjam masih punya histori peminjaman yang belum selesai');
        }

        $brw = new borrow();
        $brw->brw_usr_id = $request->input('name');
        $brw->brw_status = '1';
        $brw->brw_created_by = Auth::user()->usr_id;
        $brw->save();
        $brw_id = $brw->brw_id;

        foreach ($request->input('asset') as $asset) {
            $brra = new borrow_asset();
            $brra->bas_ass_id = $asset;
            $brra->bas_brw_id = $brw_id;
            $brra->bas_status = '1';
            $brra->bas_created_by = Auth::user()->usr_id;
            $brra->save();


        }
        return redirect('borrows-asset')->withSuccess('  berhasil meminjam');

        // return redirect('lists-borrow');

    }

    // public function verify($id)
    // {

    //     $assets = Asset::whereAssId($id)->first();
    //     $assets->ass_status = 3;
    //     $assets->ass_updated_by = Auth::user()->usr_id;
    //     $assets->save();
    //     return redirect('lists-borrow');

    // }

    // public function returnAdd($id)
    // {
    //     $assets = Asset::whereAssId($id)->first();
    //     $assets->ass_status = 1;

    //     $restore = new Restore();
    //     $restore->rst_brw_id = $id;
    //     $restore->rst_ass_id = $id;
    //     $restore->rst_usr_id = Auth::user()->usr_id;
    //     $restore->save();

    //     $assets->save();
    //     return redirect('return/list-return');


    // }

    public function listreturn()
    {
        $borrows = borrow_asset::join('assets', 'borrow_assets.bas_ass_id', '=', 'assets.ass_id')
            ->join('borrows', 'borrow_assets.bas_brw_id', '=', 'borrows.brw_id')
            ->join('users', 'borrows.brw_usr_id', '=', 'users.usr_id')
            ->where('borrows.brw_status', '=', 2)
            ->select('borrow_assets.bas_brw_id', 'users.usr_name', DB::raw('count(*) as total'))
            ->groupBy('borrow_assets.bas_brw_id')
            ->get();
        //return $borrows;
        // dd($borrows);
        return view('returns.list-return', compact('borrows'));

    }

    public function print()
    {
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

        $pdf = PDF::loadview('returns.pdf', $data)->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    // public function returnHistory()
    // {
    //     $list = Restore::join('users', 'rst_usr_id', '=', 'usr_id')
    //         ->join('assets', 'rst_ass_id', '=', 'ass_id')
    //         ->join('borrows', 'rst_brw_id', '=', 'brw_id')
    //         ->select('restores.*', 'users.*', 'assets.*', 'borrows.created_at as f')
    //         ->onlyTrashed()
    //         ->get();
    //     return view('returns.return-history', compact(['list']));
    // }


    public function listreturnDetail($id)
    {
        $data ['borrows'] = borrow_asset::where('bas_brw_id', $id)
            ->join('assets', 'borrow_assets.bas_ass_id', '=', 'assets.ass_id')
            ->join('borrows', 'borrow_assets.bas_brw_id', '=', 'borrows.brw_id')
            ->join('users', 'borrows.brw_created_by', '=', 'users.usr_id')
            ->whereNotIn('bas_status', [1])
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\cr $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Restore::find($id);
        $data->delete();
        return redirect('return/list-return');
    }


    public function Return  ($id, $slug){
        $brw = borrow_asset::whereBasId($id)->first();

        //update Borrow Assets
        $brw->bas_status = $slug;
        $brw->bas_updated_by  = Auth::user()->usr_id;
        $brw->save();
        //update assets
        if($slug == 3){
            Asset::whereAssId($brw->bas_ass_id)->update([
                'ass_status' => '1',
                'ass_updated_by' => Auth::user()->usr_id
            ]);
        } else {
            Asset::whereAssId($brw->bas_ass_id)->update([
                'ass_status' => $slug,
                'ass_updated_by' => Auth::user()->usr_id
            ]);
        }

        //update borrow
        $cek = borrow_asset::whereBasBrwId($brw->bas_brw_id)->whereBasStatus(1)->first();
        if($cek){
            return back()->withSuccess('pengembalian Barang Berhasil');
        } else {
            Borrow::whereBrwId($brw->bas_brw_id)->update([
                'brw_status' => 2,
                'brw_updated_by' => Auth::user()->usr_id
            ]);
            return back()->withSuccess('pengembalian Barang Berhasil');
        }
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

    public function replacement($id,$ass_id){
        $borrow = Borrow::join('borrow_assets','brw_id','=','bas_brw_id')
                         ->whereBrwId($id)
                         ->whereBasAssId($ass_id)->first();
        //dd($borrow);
        return view('returns.replacement',compact('borrow','ass_id'));
    }

    public function saveReplacement(Request $request){
        //Create New Replacement Asset
        $asd = new asset_description();
        $asd->asd_ass_id = $request->ass_id;
        $asd->asd_inggridient = $request->asd_inggridient;
        $asd->asd_merk = $request->asd_merk;
        $asd->asd_spesification = $request->asd_spesification;  
        $asd->asd_condition = $request->asd_condition;
        //dd($asd);
        $asd->save();

        //Create Replacement_asset
        $ra = new Replacement_asset();
        $ra->ra_asd_id = $asd->asd_id;
        $ra->ra_status    = '1';
        //dd($ra);
        $ra->save();

        //Create Replacement
        $replacement = new Replacement();
        $replacement->r_usr_id  = $request->usr_id;
        $replacement->r_bas_id  = $request->bas_id;
        $replacement->r_ra_id   = $ra->ra_id;
        //dd($replacement);
        $replacement->save();

        //Update Borrow Asset
        $brw = borrow_asset::whereBasId($request->bas_id)->first();
        $brw->bas_status = '5';
        $brw->save();

        //Update Asset
        $asset = Asset::whereAssId($request->ass_id)->first();
        $asset->ass_status = '1';
        $asset->save();

        return redirect('/return/history');

    }

    public function fix($id , $ass_id)
    {
         $borrow = borrow_asset::whereBasAssId($ass_id)->first();
         $borrow->bas_status = '4';
         $borrow->save();

         $asset = Asset::whereAssId($ass_id)->first();
         $asset->ass_status ='1';
         $asset->save();
         return back();
    }

}
