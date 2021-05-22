<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\audience_conference;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;


class AudienceConferenceController extends Controller
{
    public function audience(Request $request, $id)
    {
        // dd($id);



        if (Auth::user()) {
            $list = audience_conference::where('id', '=', Auth::user()->id)
                ->where('conference_id', '=', $id)
                ->first();
            if (!empty($list)) {
                return  redirect('/unpad-icocome2021/submissionsParticipant')->with('had_registered', 'You had registered to this conference ');
            }
            try {

                DB::beginTransaction();
                $audience = new audience_conference;
                $userid = Auth::id();
                $audience->name = Auth::user()->name;
                $audience->id = $userid;
                $audience->conference_id = $id;
                $audience->save();


                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                return back()->with('Failed_Register', 'Register Failed');
            }

            return redirect('/unpad-icocome2021/submissionsParticipant')->with('succes_Register', 'Register conference success');
        } else {
            return back()->with('must_login', 'You Must login');
        }
    }
}
