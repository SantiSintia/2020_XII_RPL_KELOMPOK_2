<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Asset;
use App\Borrow;
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
        $assets = Asset::where('ass_status',1)->orwhere('ass_status',2)->get();
        return view('borrows.borrows-item', compact('assets'));
    }

    public function save(Request $request, $id)
    {
        $assets = Asset::whereAssId($id)->first();
        $assets->ass_status = 2;

        $borrow = new Borrow();
        $borrow->brw_ass_id = $id;
        $borrow->brw_usr_id = Auth::user()->usr_id;
        $borrow->save();

        $assets->save();
        return redirect('lists-borrow');

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
