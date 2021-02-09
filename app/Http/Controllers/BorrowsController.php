<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Asset;
use App\Borrow;
use Illuminate\Support\Facades\Auth;


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

    public function detail()
    {
        return view('borrows.detail-borrow');
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
        $assets->save();
        return redirect('lists-borrow');

    }

    public function returnAdd()
    {
        return view('returns.return-add');
    }
    public function listreturn()
    {
        return view('returns.list-return');
    }
    public function returnHistory()
    {
        return view('returns.return-history');
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
    public function show(cr $cr)
    {
        //
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
    public function destroy(cr $cr)
    {
        //
    }
}
