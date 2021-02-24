<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Asset;
use App\Borrow;
use App\borrows_statuse;
use App\borrow_asset;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Restore;


class BorrowsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrows = Borrow::join('users','brw_usr_id','=','usr_id')
                         ->join('assets','brw_ass_id','=','ass_id')
                         ->get();

        // dd($borrows);
        return view('borrows.lists-borrow', compact('borrows'));
        
    }
    
    public function borrowsItem()
    {
        $name = user::join('roles','role_id','=','id')->where('name','student')->select('users.usr_name','users.usr_id')->get();
        $borrow_asset=borrow_asset::join('borrows_statuses','bas_brs_id','=','brs_id')->where('brs_status',1)->orWhere('brs_status',2)->get();
        // dd($borrow_asset);

         $hitung_asset=borrow_asset::join('borrows_statuses','bas_brs_id','=','brs_id')->where('brs_status',1)->orWhere('brs_status',2)->count();
         // dd($hitung_asset);
        $assets = Asset::where('ass_status',1)->orwhere('ass_status',2)->get();
        return view('borrows.borrows-item', compact(['assets','name','borrow_asset','hitung_asset']));
    }

    public function save(Request $request)
    {
        $cek=borrow_asset::join('borrows','bas_brw_id','=','brw_id')
                        ->join('borrows_statuses','bas_brs_id','brs_id')
                        ->where('brw_usr_id',$request->input('name'))
                        ->where('brs_status',0)
                        ->orWhere('brs_status',1)->first();
                        if($cek){
                            return back()->withToastError('peminjam masih punya histori peminjaman belum selesai');
                        }

        foreach ($request->input('asset') as $asset) {
            # code...
        

           $brs = new borrows_statuse();
           $brs->brs_status = 0;
           $brs->save();
          $id= $brs->brs_id;


           $brw= new borrow();
           $brw->brw_usr_id = $request->input('name');
           $brw->brw_brs_id = $id;
           $brw->save();
           $brw_id=$brw->brw_id; 


           $brra= new borrow_asset();
           $brra->bas_ass_id=$asset;
           $brra->bas_brw_id=$brw_id;
           $brra->bas_brs_id=$id;
           $brra->save();
          
          


}
  return redirect('borrows-asset')->withSuccess('  berhasil meminjam');

        // return redirect('lists-borrow');

    }

    public function verify($id)
    {
        
        $assets = Asset::whereAssId($id)->first();
        $assets->ass_status = 3;
        $assets->ass_updated_by = Auth::user()->usr_id;
        $assets->save();
        return redirect('lists-borrow');

    }

    public function returnAdd($id)
    {
        $assets = Asset::whereAssId($id)->first();
        $assets->ass_status = 1;

        $restore = new Restore();
        $restore->rst_brw_id = $id;
        $restore->rst_ass_id = $id;
        $restore->rst_usr_id = Auth::user()->usr_id;
        $restore->save();

        $assets->save();
        return redirect('return/list-return');


    }

    public function listreturn()
    {
        $list= Restore::join('users','rst_usr_id','=','usr_id')
                         ->join('assets','rst_ass_id','=','ass_id')
                         ->join('borrows','rst_brw_id','=','brw_id')
                         ->select('restores.*','users.*','assets.*','borrows.updated_at as f')
                         ->get();
                         // dd($list);
        return view('returns.list-return',compact(['list']));
    }

    public function print()
    {
    $list= Restore::join('users','rst_usr_id','=','usr_id')
                         ->join('assets','rst_ass_id','=','ass_id')
                         ->join('borrows','rst_brw_id','=','brw_id')
                         ->select('restores.*','users.*','assets.*','borrows.created_at as f')
                         ->get();

    $pdf = PDF::loadview('returns.pdf', compact('list'))->setPaper('A4' ,'potrait');
        return $pdf->stream();
    }

    public function returnHistory()
    {
        $list= Restore::join('users','rst_usr_id','=','usr_id')
                         ->join('assets','rst_ass_id','=','ass_id')
                         ->join('borrows','rst_brw_id','=','brw_id')
                         ->select('restores.*','users.*','assets.*','borrows.created_at as f')
                         ->onlyTrashed()
                         ->get();
        return view('returns.return-history',compact(['list']));
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $borrows = Borrow::join('users','brw_usr_id','=','usr_id')
                         ->join('assets','brw_ass_id','=','ass_id')
                         ->whereBrwId($id)->first();
                         //dd($borrows);
        return view('borrows.detail-borrow', compact(['borrows']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Restore::find($id);
        $data->delete();
        return redirect('return/list-return');
    }
}
