<?php

namespace App\Http\Controllers;

use App\Models\conference;
use App\Models\KeynoteSpeaker;
use App\Models\partner_organization;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $conference =   conference::where('status', 'on')->first();
        $p_os = partner_organization::all();
        $keynote = KeynoteSpeaker::all();
        return View('pages.home', compact('p_os', 'keynote'))->with('conference', $conference);
    }
}
