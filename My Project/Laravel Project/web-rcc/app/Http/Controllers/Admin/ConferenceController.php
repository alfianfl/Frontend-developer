<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\conference;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ConferenceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $conference = conference::get();
        return view('.admin.conference.conference', compact('conference'));
    }
    public function ShowConferences()
    {

        return view('.admin.conference.create.inputConference');
    }
    public function Add(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'conference_title' => ['required'],
            'conference_theme' => ['required'],
            'conference_place' => ['required', 'string', 'max:255'],
            'conference_description' => ['required'],
            'conference_scope' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect('/admin/conference/inputConference')->with('failed_upload', 'Upload Failed')->withErrors($validator);
        }
        try {
            DB::beginTransaction();
            $conference = new conference;
            $conference->conference_title = $request->conference_title;
            $conference->conference_theme = $request->conference_theme;
            $conference->conference_place = $request->conference_place;
            $conference->conference_about = $request->conference_description;
            $conference->conference_scope = $request->conference_scope;
            $conference->status = "on";
            $conference->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect('/admin/conference')->with('failed_upload', 'Upload Failed')->withErrors($validator);
        }
        return redirect('/admin/conference')->with('succes_upload', 'Upload Success');
    }
    public function Edit($id)
    {
        $conference = conference::find($id);
        return view('.admin.conference.edit.editConference', compact('conference'));
    }
    public function Update(Request $request, $id)
    {

        try {
            $conference = conference::find($id);
            DB::beginTransaction();
            $conference->conference_title = $request->conference_title;
            $conference->conference_theme = $request->conference_theme;
            $conference->conference_place = $request->conference_place;
            $conference->conference_about = $request->conference_description;
            $conference->conference_scope = $request->conference_scope;
            $conference->status = $request->status;
            $conference->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect('/admin/conference/conference')->with('failed_upload', 'Update failed');
        }
        return redirect('/admin/conference')->with('succes_upload', 'Update Success');
    }
    public  function delete($id)
    {
        // dd($id);
        conference::find($id)->delete();
        return redirect('/admin/conference')->with('success_upload', 'Delete conference success!');
    }
}
