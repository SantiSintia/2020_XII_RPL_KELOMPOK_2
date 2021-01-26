<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\asset_categories;
use App\asset_types;

class TypeAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = asset_types::join('asset_categories','asc_id','=','ast_asset_categories_id')->get();
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
        $categories = asset_categories::all();
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
         $id = $request->asc_name;
         $data = asset_types::join('asset_categories','asc_id','=','ast_asset_categories_id')
                            ->whereAstAssetCategoriesId($id)
                            ->first();
         $code = $data->asc_code;
         $originCode = asset_types::OrderBy('ast_original_code','DESC')->first();
          //dd($originCode);
         $t = $code.'.'.str_pad('2'+1,'3',"0",STR_PAD_LEFT);
    
         
        return redirect('typeAsset');
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
