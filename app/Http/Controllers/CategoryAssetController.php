<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\asset_categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use RealRashid\SweetAlert\Facades\Alert;

class CategoryAssetController extends Controller
{
    public function index()
    {
        $category = asset_categories::whereNotNull('asc_parent_asset_categories_id')->get();

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

    public function StoreCatPrimary(Request $request){
        $this->validate($request,[
            'asc_name'           => 'required',
            'asc_original_code'  => 'required|min:1'
        ]);

        $cat = asset_categories::whereAscCode(strtoupper ($request->input('asc_original_code')))->first();
        if ($cat){
            Alert::error('Gagal' , 'Kode Kategori "'. $request->input('asc_original_code'). '"  Sudah Ada');
            return back();
        } else {
            $create_cat_assets = new asset_categories();
            $create_cat_assets->asc_code = (strtoupper($request->input('asc_original_code')));
            $create_cat_assets->asc_original_code = '';
            $create_cat_assets->asc_name = $request->input('asc_name');
            $create_cat_assets->asc_created_by = Auth::user()->usr_id;
            $create_cat_assets->save();
            return back()->withSuccess($request->input('asc_name'). '  berhasil disimpan');

        }

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
            'type_categories'    => 'required',
            'asc_name'           => 'required'
        ]);

        $cat = asset_categories::whereAscName($request->input('asc_name'))->first();
        $cat_type = asset_categories::whereAscId($request->input('type_categories'))->first();
        $code_orign =  Str::of($cat_type->asc_code)->substr(0, 1);
        if ($cat){
            Alert::error('Gagal', $request->input('asc_name') .  ' sudah Tersedia');
            return back();
        } else {
            $check = asset_categories::whereAscParentAssetCategoriesId($request->input('type_categories'))
                ->OrderBy('asc_original_code','DESC')
                ->first();
                //dd($check);
                if($check){
                    $max_code   = $check->asc_original_code + 1;
                } else {
                    $max_code   = 1;
                }
            $create = new asset_categories();
            $create->asc_code = $code_orign . str_pad($max_code, 2, '0', STR_PAD_LEFT);
            $create->asc_original_code = $max_code;
            $create->asc_name = $request->input('asc_name');
            $create->asc_parent_asset_categories_id = $request->input('type_categories');
            $create->asc_created_by = Auth::user()->usr_id;
            $create->save();
            return redirect('categoryAsset')->withSuccess($request->input('asc_name'). '  berhasil disimpan');

        }
//        $data = asset_categories::whereAscCode($code)->first();

         //dd($data);
//        if ($data)
//        {
//            return back()->withToastError('Kode Kategori Sudah ada');
//
//        }else{
//                if ($request->categories)
//                 {
//                    $category = new asset_categories;
//                    $category->asc_parent_asset_categories_id = $request->categories;
//                    $category->asc_name = $request->asc_name;
//                    $category->asc_original_code = $request->asc_original_code;
//                    $category->asc_code = $request->asc_code;
//                    $category->save();
//                    return redirect('categoryAsset');
//                }elseif($request->type_categories)
//                {
//                    $category = new asset_categories;
//                    $category->asc_parent_asset_categories_id = $request->type_categories;
//                    $category->asc_name = $request->asc_name;
//                    $category->asc_original_code = $request->asc_original_code;
//                    $category->asc_code = $request->asc_code;
//                    $category->save();
//                    return redirect('categoryAsset');
//                }elseif($request->asc_name){
//                    $category = new asset_categories;
//                    $category->asc_parent_asset_categories_id = null;
//                    $category->asc_name = $request->asc_name;
//                    $category->asc_original_code = $request->asc_original_code;
//                    $category->asc_code = $request->asc_code;
//                    $category->save();
//                    return redirect('categoryAsset');
//                }else{
//                    return back()->withInfo('Isi data terlebih dahulu');
//                }
//
//        }




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

    public function JsonCategories($id){
        $data['categories'] = asset_categories::whereAscParentAssetCategoriesId($id)->get();
        return response()->json($data);
    }

}
