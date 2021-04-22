<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Student;
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

use PDF;

class ReportController extends Controller
{
	public function asset()
	{
		$assets = Asset::join('asset_categories','ass_asset_category_id','=','asc_id')
                       ->join('asset_types','ass_asset_type_id','=','ast_id')
                       ->join('origins','ass_origin_id','=','ori_id')
                       ->get();
        return view('report.asset',compact('assets'));
	}

	public function allconditionPDF()
	{
		$data ['assets'] = Asset::all();

		$pdf = PDF::loadview('report.asset-all', $data)->setPaper('A4', 'landscape');
        return $pdf->stream();
	}

	public function goodconditionPDF()
	{
		$data ['assets'] = Asset::where('ass_status', 1)->get();

		$pdf = PDF::loadview('report.asset-good', $data)->setPaper('A4', 'landscape');
        return $pdf->stream();
	}

	public function brokenconditionPDF()
	{
		$data ['assets'] = Asset::where('ass_status', 4)->get();

		$pdf = PDF::loadview('report.asset-broken', $data)->setPaper('A4', 'landscape');
        return $pdf->stream();
	}

	public function lostconditionPDF()
	{
		$data ['assets'] = Asset::where('ass_status', 5)->get();

		$pdf = PDF::loadview('report.asset-lost', $data)->setPaper('A4', 'landscape');
        return $pdf->stream();

	}

    public function borrowPDF()
    {
        $data ['history'] = borrow_asset::join('borrows' , 'borrow_assets.bas_brw_id' , '=' , 'borrows.brw_id')
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

        $pdf = PDF::loadview('report.borrow-pdf', $data)->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function location()
    {
        return view('asset-location.list-location');
    }
    public function create()
    {
        return view('asset-location.create-location');
    }
}
