<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\abstract_paper;
use App\Models\audience_conference;
use App\Models\Certificate;
use App\Models\conference;
use App\Models\member;
use App\Models\paper;
use App\Models\pesanan;
use App\Models\template;
use App\Models\User;
use Faker\Provider\ar_SA\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class downloads extends Controller
{

    public function showPage()
    {
        $templates = template::all();
        $conference = conference::where('status', 'on')->first();
        $certificate = Certificate::first();
        $payment = pesanan::where([
            ['id', Auth::id()],
            ['conference_id', $conference->conference_id],

        ])->first();;
        if (Auth::check()) {
            $audience = audience_conference::where([
                ['id', Auth::id()],
                ['conference_id', $conference->conference_id],

            ])->first();

            // $audience = audience_conference::where('id', Auth::id())->first();

            $user = User::where('id', Auth::user()->id)->first();

            return view('.pages.downloadPage', compact('user', 'templates', 'audience', 'conference', 'certificate', 'payment'));
        } else {
            return view('.pages.downloadPage', compact('templates'));
        }
    }

    //sss
    public function payments($id)

    {


        $pesanan = pesanan::find($id);
        $file = '/payments/' . $pesanan->bukti_pembayaran;
        $path = str_replace('\\', '/', public_path());

        if (file_exists($path . $file)) {
            return response()->download($path . $file);
        } else {
            return redirect()->back();
        }
    }
    public function abstract($id)

    {

        $abstract = abstract_paper::find($id);
        // dd($abstract->abstract);
        $abstract_file = '/abstract/' . $abstract->abstract;
        $path = str_replace('\\', '/', public_path());

        if (file_exists($path . $abstract_file)) {
            return response()->download($path . $abstract_file);
        } else {
            return redirect()->back();
        }
    }
    public function members($id)

    {


        $member = member::find($id);
        $image = '/members/' . $member->file_members;
        $path = str_replace('\\', '/', public_path());

        if (file_exists($path . $image)) {
            return response()->download($path . $image);
        } else {
            return redirect()->back();
        }
    }
    public function papers($id)

    {

        $paper = paper::find($id);
        $fullPapers = '/papers/' . $paper->full_paper;
        $path = str_replace('\\', '/', public_path());
        if (file_exists($path . $fullPapers)) {
            return response()->download($path . $fullPapers);
        } else {
            return redirect()->back();
        }
    }

    public function downloadTemplate($file_name)
    {
        $file = public_path('templates/' . $file_name);
        // $headers = array(
        //     'Content-Type: application'
        // );
        // return Response::download($file, $file_name, $headers);
        return Response::download($file, $file_name);
    }
}
