<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\scientific_commite;
use Illuminate\Http\Request;

class ScientificPageController extends Controller
{
    public function index()
    {
        $commite = scientific_commite::all();
        return view('pages.committee', compact('commite'));
    }
}
