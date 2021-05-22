<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\conference;
use App\Models\scientific_commite;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ScientificController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $scientific = scientific_commite::get();
        return view('.admin.committee.scientificCommittee', compact('scientific'));
    }
    public function ShowInput()
    {
        $conference = conference::where('status', 'on')->get();
        return view('.admin.committee.create.InputScientificCommittee', compact('conference'));
    }
    public function Add(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect('/admin/scientificCommittee/inputScientificCommittee')->with('failed_upload', 'Upload Failed')->withErrors($validator);
        }
        try {
            DB::beginTransaction();
            $scientific = new scientific_commite;
            $scientific->name = $request->name;
            $scientific->conference_id = $request->conference_id;
            $scientific->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect('/admin/scientificCommittee/inputScientificCommittee')->with('failed_upload', 'Upload Failed')->withErrors($validator);
        }
        return redirect('/admin/scientificCommittee')->with('succes_upload', 'Upload Success');
    }
    public function Edit($id)
    {
        $conference = conference::where('status', 'on')->get();
        $scientific = scientific_commite::find($id);
        return view('.admin.committee.edit.editScientificCommittee', compact('scientific', 'conference'));
    }
    public function Update(Request $request, $id)
    {
        $scientific = scientific_commite::find($id);
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
        ]);

        try {
            DB::beginTransaction();
            $scientific->name = $request->name;
            $scientific->conference_id = $request->conference_id;
            $scientific->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect('/admin/scientificCommittee/inputScientificCommittee')->with('failed_update', 'Update Failed')->withErrors($validator);
        }
        return redirect('/admin/scientificCommittee')->with('succes_update', 'Update Success');
    }
    public  function delete($id)
    {
        scientific_commite::find($id)->delete();
        return redirect('/admin/scientificCommittee')->with('success_message', 'Delete conference success!');
    }
}
