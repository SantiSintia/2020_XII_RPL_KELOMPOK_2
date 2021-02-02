<?php

namespace App\Http\Controllers;

use App\Asset;
use App\asset_categories;
use App\asset_types;
use App\Http\Controllers\Controller;
use App\Origin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets = Asset::join('asset_categories','ass_asset_category_id','=','asc_id')
                       ->join('asset_types','ass_asset_type_id','=','ast_id')
                       ->join('origins','ass_origin_id','=','ori_id')
                       ->get();
        return view('assets.list-asset',compact('assets'));
    }

    // public function list()
    // {
    //     return view('assets.list-detail-asset');
    // }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data ['origin'] = Origin::select('ori_id' , 'ori_name')->get();
        $data ['assets'] = asset_types::select('ast_id' , 'ast_name')->get();
        return view('assets.create-asset', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = asset_types::whereAstId($request->input('type_asset'))->first();
        $origin  = Origin::whereOriId($request->input('asset_origin'))->first();
        $assets = Asset::whereAssAssetTypeId($request->input('type_asset'))
            ->count();
        $reg_code = str_pad($assets + 1 , 3, '0', STR_PAD_LEFT);


        $asset = new Asset();
        $asset->ass_asset_category_id = $type->ast_asset_categories_id;
        $asset->ass_asset_type_id = $request->input('type_asset');
        $asset->ass_origin_id   =  $request->input('asset_origin') ;
        $asset->ass_year   = $request->input('asset_year') ;
        $asset->ass_registration_code   = $reg_code .'/'. $type->ast_code . '/' . $origin->ori_code . '/' . $request->input('asset_year'); // 001/P01.001/INV.YYS/2016
        $asset->ass_name   = $request->input('asset_name');
        $asset->ass_price = $request->input('asset_price');
        $asset->ass_created_by  =  Auth::user()->usr_id;
        $asset->save();
        return redirect('asset')->withSuccess($request->input('asset_name'). '  berhasil disimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asset = Asset::join('asset_categories','ass_asset_category_id','=','asc_id')
                      ->join('asset_types','ass_asset_type_id','=','ast_id')
                      ->join('origins','ass_origin_id','=','ori_id')
                      ->join('asset_descriptions','ass_id','=','asd_ass_id')
                      ->whereAssId($id)->first();
        // dd($asset);
        return view('assets.list-detail-asset', compact(['asset']));
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
