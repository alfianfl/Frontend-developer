<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\conference;
use App\Models\partner_organization;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $conference =   conference::where('status', 'on')->first();
        $p_os = partner_organization::all();
        return view('pages.aboutUs', ['p_os'=>$p_os])->with('conference', $conference);
    }
}
