<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
    	return view('admin/home/login');
    }
    public function logout()
    {
    	 \Auth::logout();
         return redirect('/admin/login');
    }

    public function profile()
    {
        return view('admin/home/profile');
    }

    public function profile_update(Request $request)
    {
       
        $data = $request->all();

      $user =  Auth::user()->update($data);
       return response()->json(['status' => 'true' , 'data' => $user]);
    }

    public function change_password()
    {
    	return "Change Password";
    }

    public function forgot_password()
    {
    	return view('admin/home/forgot_password');
    }
}
