<?php

namespace App\Http\Controllers;

use App\Asset;
use App\asset_categories;
use App\asset_types;
use App\Http\Controllers\Controller;
use App\Origin;
use App\asset_description;
use App\borrow_asset;
use App\Borrow;
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
        $asset->ass_name   = $request->input('asset_name') . $reg_name;
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

    public function historyasset($id)
    {
        $data ['asset'] = borrow_asset::where('bas_ass_id', $id)
            ->join('borrows' , 'borrow_assets.bas_brw_id' , '=' , 'borrows.brw_id')
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
        return view ('assets.history-asset', $data);
    }

    public function repair($id)
    {
        $asset = Asset::whereAssId($id)->first();
        $asset->ass_status = 1;
        $asset->save();
        return back()->withSuccess('berhasil diperbaiki');

    }


    public function edit($id)
    {
        $asset=Asset::join('asset_descriptions','asd_ass_id','=','ass_id')
        ->join('asset_types','ass_asset_type_id','=','ast_id')
        ->join('origins','ass_origin_id','=','ori_id')
        ->where('ass_id',$id)->first();
        // dd($asset->)
        // dd($asset);
         $data ['origin'] = Origin::select('ori_id' , 'ori_name')->get();
        $data ['assets'] = asset_types::select('ast_id' , 'ast_name')->get();
        $data ['asset_categories']=asset_categories::select('asc_id','asc_name')->get();
        return view('assets.edit-asset', $data,compact(['asset']));
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
            // dd($request->input('asd_inggridient'));

        if($request->asset_price<0){
             return back()->withToastError('Jumlah tidak boleh minus');
         }else{

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
            $asset=Asset::where('ass_id',$id)->first();
            $asset->ass_name=$request->input('asset_name');
        $asset->ass_asset_type_id = $request->input('type_asset');
        $asset->ass_origin_id   =  $request->input('asset_origin');
        $asset->ass_year   = $request->input('asset_year') ;
        $asset->ass_price =$request->input('asset_price');
         $asset->ass_registration_code   = $reg_code .'/'. $type->ast_code . '/' . $origin->ori_code . '/' . $request->input('asset_year');
         $asset->update();

         $ased= asset_description::where('asd_ass_id',$id)->first();
         $asd=asset_description::where('asd_id',$ased->asd_id)->first();
         // dd($asd);

         if($request->input('asd_voltage')== null){
            if ($request->input('asd_inggridient')==null) {
                
            }else{
                 $asd->asd_inggridient=$request->input('asd_inggridient');
         $asd->asd_merk=$request->input('asd_merk');
         $asd->asd_spesification=$request->input('asd_spesification');
        
         $asd->asd_condition=$request->input('asset_condition');
         $asd->update();
         return redirect('asset')->withSuccess($request->input('asset_name'). '  berhasil disimpan');

            }
         }


         $asd->asd_inggridient=$request->input('asd_inggridient');
         $asd->asd_merk=$request->input('asd_merk');
         $asd->asd_spesification=$request->input('asd_spesification');
         $asd->asd_voltage=$request->input('asd_voltage');
         $asd->asd_condition=$request->input('asset_condition');
         $asd->update();
         return redirect('asset')->withSuccess($request->input('asset_name'). '  berhasil disimpan');
         
         }
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
