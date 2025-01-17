<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
   

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    public function login(Request $request): RedirectResponse
    {
        $input = $request->all();
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);
    if(auth()->attempt(array('email' => $input['email'], 'password' =>$input['password'])))
    {
       if(auth()->user()->role == 'admin'){
        return redirect()->route('admin.home');
       }else if(auth()->user()->role=='super admin'){
        return redirect()->route('super.home');
       }else {
        return redirect()->route('home');
       }
        }else{
            return redirect()->route('login')->with('error','Email-address & passsword Are Wrong!');
        }
}
}
