<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;

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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('admin.login');
    }
    public function login(Request $req)
    {

        $this->validate($req, [
            'email' => 'required',
            'password' => 'required'
        ]);

       if (\Auth::attempt(['email' => $req->email, 'password' => $req->password, 'status' => 'ACTIVE'])) {
            return redirect()->to('/admin/author');
        } else {
            return redirect()->back()->with(['msg' => 'invalid email and password']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
    public function redirect($driver)
    {
         return Socialite::driver($driver)->redirect();
    }

    public function callback($driver)
    {
        $user = Socialite::driver($driver)->user();


        $check = User::where('email', $user->getEmail())->first();

        $name = $user->getNickname() != null ? $user->getNickname() : $user->getName();

        if (!$check) {
            $users  = User::create([
                'email' => $user->getEmail(),
                'name' => $name,

                
            ]);

            Auth::login($users);

            return redirect()->to('/admin/author');
        }else{
            
            Auth::login($check);
            return redirect()->to('/admin/author');


        }


    }    
}
