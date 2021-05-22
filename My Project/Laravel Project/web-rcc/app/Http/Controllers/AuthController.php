<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\address;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;




class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            return redirect('/unpad-icocome2021');
        } else {
            return view('layout.base_layout');
        }
    }

    //register
    public function register()
    {
        return view('layout.includes.register');
    }

    public function registerAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required'],
            'pilihan' => ['required'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'postalcode' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);



        // $this->validatorRegister($request->all())->validate();
        if ($validator->fails()) {
            return redirect('/unpad-icocome2021')->with('error_register', 'register failed')->withErrors($validator);
        }
        // $this->validatorUser($request->all())->validate();

        try {
            DB::beginTransaction();

            $address = new address;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->country = $request->country;
            $address->postal_code = $request->postalcode;
            $address->address = $request->address;

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = $request->pilihan;
            $user->phone = $request->phone;
            $user->organization = $request->organization;
            $address->save();
            $address_id = DB::getPdo()->lastInsertId();
            $user->address_id = $address_id;

            // $user->page_name = $request->page_name;
            // $user->page_slug = $request->page_slug;


            $user->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $output = $e->getMessage();
            // $validator = $this->validatorUser($request->all())->validate();

            return redirect('/unpad-icocome2021')->with('error_register', 'register failed');
        }
        // $credentials = $request->only('email', 'password');
        // Auth::attempt($credentials);
        return redirect('/unpad-icocome2021');
    }

    //login
    public function login()
    {
        return view('layout.includes.login');
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/unpad-icocome2021');
        } else {
            return redirect('/unpad-icocome2021')->with('error', 'Login Failed !');
        }
    }

    //logout
    public function logout()
    {
        Auth::logout();
        return redirect('/unpad-icocome2021');
    }
}
