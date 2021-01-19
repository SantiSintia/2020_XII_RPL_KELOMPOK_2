<?php

namespace App\Http\Controllers;

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
        return view('index');
    }

    public function profile()
    {
        return view('profiles.profile');
    }

    public function resetPassword()
    {
    	return view('profiles.reset-password');
    }
    
    public function createTypeAssets()
    {
    	return view('assets.create-type-assets');
    }

   	public function manageAssets()
   	{
   		return view('assets.manage-assets');
   	}

   	public function manageUsers()
   	{
   		return view('users.manage-users');
   	}

    public function detail()
    {
      return view('users.manage-detail-users');
    }

    

}
