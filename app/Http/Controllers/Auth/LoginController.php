<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // public function showLoginForm()
    // {
    //     return view('admin.login');
    // }
    // public function login(Request $req)
    // {

    //     $this->validate($req, [
    //         'email' => 'required',
    //         'password' => 'required'
    //     ]);

    //    if (\Auth::attempt(['email' => $req->email, 'password' => $req->password, 'status' => 'ACTIVE'])) {
    //         return redirect()->to('/admin/author');
    //     } else {
    //         return redirect()->back()->with(['msg' => 'invalid email and password']);
    //     }
    // }    
}
