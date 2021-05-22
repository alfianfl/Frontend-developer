<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/admin/index';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.login_admin');
    }

    protected function guard(){
        return Auth::guard('admin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($this->guard()->attempt($credentials)) {
            return redirect('/admin/index');
        } else {
            return redirect('/admin/login')->with('error', 'Login Failed !');
        }
    }

    //logout
    public function logout()
    {
        $this->guard()->logout();
        return redirect('/admin/login');
    }
}