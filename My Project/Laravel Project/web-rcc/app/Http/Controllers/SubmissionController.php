<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Exception;

use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\address;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;

class SubmissionController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {
            return redirect('/unpad-icocome2021');
        } else {
            return view('layout.base_layout');
        }
    }
}
