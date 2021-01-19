<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\asset_categories;

class CategoryAssetController extends Controller
{
    public function index()
    {
        $category = asset_categories::all();

        return view('assets.category-asset', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = asset_categories::all();

        return view('assets.create-category-asset', compact('category'));
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
            'asc_name'           => 'required',
            'asc_original_code'  => 'required|max:2',
            'asc_code'           => 'required|max:3'
        ]);

        $category = new asset_categories;
        $category->asc_parent_asset_categories_id = $request->asc_parent_asset_categories_id;
        $category->asc_name = $request->asc_name;      
        $category->asc_original_code = $request->asc_original_code;
        $category->asc_code = $request->asc_code;
        $category->save();

        return redirect('categoryAsset');
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
    public function destroy($id)
    {
        //
    }

}
