<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware(['auth']);
         
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function resetPassword()
    {
    	return view('admin.reset-password');
    }
    
    public function typeAssets()
    {
    	return view('admin.type-assets');
    }

    public function createTypeAssets()
    {
    	return view('admin.create-type-assets');
    }

   	public function manageAssets()
   	{
   		return view('admin.manage-assets');
   	}

   	public function manageUsers()
   	{
   		return view('admin.manage-users');
   	}

}
