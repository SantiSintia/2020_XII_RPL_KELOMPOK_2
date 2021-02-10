<?php

namespace App\Http\Controllers;

use App\Asset;
use App\asset_categories;
use App\asset_types;
use App\Http\Controllers\Controller;
use App\Origin;
use App\asset_description;
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
        $data ['asset_categories']=asset_categories::select('asc_id','asc_name')->get();
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

       
        $jumlah=$request->input('total');
        //dd($jumlah);

        if ($jumlah < 0) {
            return back()->withToastError('Jumlah tidak boleh minus');
        }else{

        for ($i=1; $i <= $jumlah ; $i++) { 
            // dd($i);
        
        $type = asset_types::whereAstId($request->input('type_asset'))->first();
        $origin  = Origin::whereOriId($request->input('asset_origin'))->first();
        // dd($request->input('asset_origin'));
        $assets = Asset::whereAssAssetTypeId($request->input('type_asset'))
            ->count();
        $reg_code = str_pad($assets + 1 , 3, '0', STR_PAD_LEFT);
        $count = Asset::whereAssAssetTypeId($request->input('type_asset'))->count();
        $reg_name = str_pad($count + 1 , STR_PAD_RIGHT);
        //dd($reg_name);
        
        $check_name = Asset::whereAssName($request->input('assert_name'))->first();
        //dd($check_name);

        
        $asset = new Asset();
        $asset->ass_asset_category_id = $type->ast_asset_categories_id;
        $asset->ass_asset_type_id = $request->input('type_asset');
        $asset->ass_origin_id   =  $request->input('asset_origin');
        $asset->ass_year   = $request->input('asset_year') ;
        $asset->ass_registration_code   = $reg_code .'/'. $type->ast_code . '/' . $origin->ori_code . '/' . $request->input('asset_year'); // 001/P01.001/INV.YYS/2016
        $asset->ass_status = $request->input('ass_status');
        if ($count > 0) {
            if ($check_name == null) {
        $asset->ass_name   = $request->input('asset_name') . ' ke ' . $i;
        $asset->ass_price = $request->input('asset_price');
        $asset->ass_status = $request->input('ass_status');
        $asset->ass_created_by  =  Auth::user()->usr_id;
        //dd($asset);
        $asset->save();
        $last_ass_id=$asset->ass_id;
        $descriptions= new asset_description();
        $descriptions->asd_ass_id=$last_ass_id;
        $descriptions->asd_inggridient=$request->input('asd_inggridient');
        $descriptions->asd_merk=$request->input('asd_merk');
        $descriptions->asd_spesification=$request->input('asd_spesification');
        $descriptions->asd_condition=$request->input('asset_condition');
         $descriptions->asd_voltage=$request->input('asd_voltage');
         $descriptions->save();
            }else{
        $asset->ass_name   = $request->input('asset_name') . ' ke ' . $reg_name;
        //dd($asset);
        $asset->ass_price = $request->input('asset_price');
        $asset->ass_created_by  =  Auth::user()->usr_id;
        //dd($asset);
        $asset->save();
        $last_ass_id=$asset->ass_id;
        $descriptions= new asset_description();
        $descriptions->asd_ass_id=$last_ass_id;
        $descriptions->asd_inggridient=$request->input('asd_inggridient');
        $descriptions->asd_merk=$request->input('asd_merk');
        $descriptions->asd_spesification=$request->input('asd_spesification');
        $descriptions->asd_condition=$request->input('asset_condition');
         $descriptions->asd_voltage=$request->input('asd_voltage');
         $descriptions->save();
            }
      
        }else{
        $asset->ass_name   = $request->input('asset_name') . ' ke ' . $i;
        $asset->ass_price = $request->input('asset_price');
        $asset->ass_created_by  =  Auth::user()->usr_id;
        //dd($asset);
        $asset->save();
        $last_ass_id=$asset->ass_id;
        $descriptions= new asset_description();
        $descriptions->asd_ass_id=$last_ass_id;
        $descriptions->asd_inggridient=$request->input('asd_inggridient');
        $descriptions->asd_merk=$request->input('asd_merk');
        $descriptions->asd_spesification=$request->input('asd_spesification');
        $descriptions->asd_condition=$request->input('asset_condition');
         $descriptions->asd_voltage=$request->input('asd_voltage');
         $descriptions->save();
        }
       
        // $descriptions->ass_id;
         }
        return redirect('asset')->withSuccess($request->input('asset_name'). '  berhasil disimpan');
    
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
        $data = Asset::find($id);
        $data->delete();
 
        return redirect('/asset');
    }
}
