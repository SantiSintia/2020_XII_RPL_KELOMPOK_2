<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\asset_categories;
use App\asset_types;
use Illuminate\Support\Facades\Auth;

class TypeAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = $category = asset_categories::join('asset_types','asc_id','=','ast_asset_categories_id')
                                            ->whereNotNull('asc_parent_asset_categories_id')
                                            ->get();
        //dd($type);
        return view('assets.type-asset',compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = asset_categories::whereNotNull('asc_parent_asset_categories_id')->get();
        //dd($categories);
        return view('assets.create-type-asset',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'ast_type'           => 'required',
            'ast_name'           => 'required|min:1'
        ]);
        $ast_name = asset_types::whereAstName($request->ast_name)->first();
        if($ast_name)
        {
            Alert::error('Gagal', $request->input('ast_name') .  ' sudah Tersedia');
            return back();
        }else{

            $type = asset_types::where('ast_asset_categories_id' , $request->input('ast_type'))
                ->OrderBy('ast_original_code' , 'DESC')
                ->first();
            if ($type){
                $max_num_type = $type->ast_original_code + 1 ;
            } else {
                $max_num_type = 1 ;
            }

            $cat = asset_categories::whereAscId($request->input('ast_type'))->first();
            $create = new  asset_types();
            $create->ast_asset_categories_id = $cat->asc_id;
            $create->ast_code =  $cat->asc_code . '.' . str_pad($max_num_type, 3, '0', STR_PAD_LEFT) ;
            $create->ast_original_code = $max_num_type ;
            $create->ast_name = $request->input('ast_name') ;
            $create->ast_created_by = Auth::user()->usr_id;
            $create->save();
            return redirect('typeAsset')->withSuccess($request->input('ast_name'). '  berhasil disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        return view('blank-page');
    }
}
