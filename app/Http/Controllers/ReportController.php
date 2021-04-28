<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Student;
use App\location_asset;
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
use App\asset_categories;
use PDF;

class ReportController extends Controller
{
	public function asset()
	{
		$assets = Asset::join('asset_categories','ass_asset_category_id','=','asc_id')
                       ->join('asset_types','ass_asset_type_id','=','ast_id')
                       ->join('origins','ass_origin_id','=','ori_id')
                       ->get();
        $totalasset= Asset::count();
        $totalharga= Asset::sum('ass_price');

        return view('report.asset',compact('assets','totalasset', 'totalharga'));
	}

	public function allcondition()
	{
		$assets= Asset::all();

        return view('report.asset-all', compact('assets'));
	}

	public function goodcondition()
	{
		$assets = Asset::where('ass_status', 1)->get();

        return view('report.asset-good', compact('assets'));
	}

	public function brokencondition()
	{
		$assets = Asset::where('ass_status', 4)->get();

        return view('report.asset-broken', compact('assets'));
	}

	public function lostcondition()
	{
		$assets = Asset::where('ass_status', 5)->get();

        return view('report.asset-lost', compact('assets'));

	}

    public function borrow()
    {
        $borrow = borrow_asset::join('borrows' , 'borrow_assets.bas_brw_id' , '=' , 'borrows.brw_id')
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

        return view('report.borrow-pdf1', compact('borrow'));
    }

    public function reportLocation(){
     $assets= Asset::join('location_assets' , 'location_assets.la_id' , '=', 'assets.ass_la_id' )
     ->get();

        return view('report.asset-location', compact('assets'));   
    }

    public function location()
    {

        $location=location_asset::where('parent_id','=',null)->get();

         // dd($location);
        return view('asset-location.list-location',compact(['location']));
    }

    public function JsonLokasi($id)
    {
        $lokasi=location_asset::where('parent_id','=',$id)->get();

        return response()->json(compact(['lokasi']));

    }


    public function create()
    {
        $lokasi=location_asset::where('parent_id','=',null)->get();
        return view('asset-location.create-location',compact(['lokasi']));
    }
    public function store(request $request)
    {
        $induk= $request->input('induk');
        $sub=$request->input('lokasi');
        $status=$request->input('status');

        $cek1=location_asset::where('location_name',$sub)->where('parent_id',$induk)->first();
        $cek=location_asset::where('location_name',$sub)->where('parent_id',null)->first();

        // dd($induk);
        if ( $status== 1) {
            if($cek){
                return redirect('/asset-location')->withToastError('lokasi tersebut sudah terdaftar');
            }else{
                $create= new location_asset();
        $create->parent_id=$induk;
        $create->location_name=$sub;
        $create->save();
        return redirect('/asset-location')->withSuccess('tambah lokasi berhasil');
            }
        }else{

        if($cek1){ return redirect('/asset-location')->withToastError('lokasi tersebut sudah terdaftar'); }
        else{
        $create= new location_asset();
        $create->parent_id=$induk;
        $create->location_name=$sub;
        $create->save();
        return redirect('/asset-location')->withSuccess('tambah lokasi berhasil');
        }
    }
    }
    public function room($id)
    {   

        $asset=Asset::where('ass_la_id',$id)->get();
        $room=location_asset::where('la_id',$id)->first();
        $location=location_asset::where('la_id',$room->parent_id)->first();
        // dd($asset);
        return view('asset-location.list-asset-location',compact(['asset','room','location']));
    }
}
