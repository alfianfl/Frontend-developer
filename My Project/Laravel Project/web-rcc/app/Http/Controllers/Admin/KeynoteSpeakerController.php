<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\conference;
use App\Models\KeynoteSpeaker;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KeynoteSpeakerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $conference = conference::where('status', 'on')->get();
        $keynote = KeynoteSpeaker::get();
        return view('.admin.keynote.keynote', compact('keynote', 'conference'));
    }
    public function ShowInput()
    {
        $conference = conference::where('status', 'on')->get();
        return view('.admin.keynote.create.InputKeynoteSpeaker', compact('conference'));
    }
    public function Add(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'image' => ['required', 'file', 'mimes:jpeg,png'],
            'institution' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect('/admin/keynote/inputKeynoteSpeaker')->with('failed_upload', 'Upload Failed')->withErrors($validator);
        }
        if ($request->hasFile('image')) {
            try {
                $file = $request->file('image');
                $namafile = $file->getClientOriginalName();
                $file->move('keynote', $namafile);
                DB::beginTransaction();
                $keynote = new KeynoteSpeaker;
                $keynote->image = $namafile;
                $keynote->institution = $request->institution;
                $keynote->name = $request->name;
                $keynote->conference_id = $request->conference_id;
                $keynote->save();

                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                $image = '/keynote/' . $namafile;
                $path = str_replace('\\', '/', public_path());

                if (file_exists($path . $image)) {
                    unlink($path . $image);
                    return back()->with('failed_upload', ' Upload file failed')->withErrors($validator);
                } else {

                    return back()->with('failed_upload', ' Upload file failed')->withErrors($validator);
                }
            }
            return redirect('/admin/keynote')->with('succes_upload', 'Upload Succes');
        } else {
            return redirect('/admin/keynote/inputKeynoteSpeaker')->with('failed_upload', 'Upload Failed')->withErrors($validator);
        }
    }
    public function Edit($id)
    {
        $conference = conference::where('status', 'on')->get();
        $keynote = KeynoteSpeaker::find($id);
        return view('.admin.keynote.edit.editKeynoteSpeaker', compact('keynote', 'conference'));
    }
    public function Update(Request $request, $id)
    {
        $keynote = KeynoteSpeaker::find($id);
        $image = '/keynote/' . $keynote->image;
        $path = str_replace('\\', '/', public_path());

        try {
            $validator = Validator::make($request->all(), [
                'image' => ['required', 'file', 'mimes:jpeg,png'],
                'institution' => ['required', 'string', 'max:255'],
                'name' => ['required', 'string', 'max:255'],
            ]);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $namafile = $file->getClientOriginalName();
                $file->move('keynote', $namafile);
                DB::beginTransaction();
                $keynote->image = $namafile;
                $keynote->institution = $request->institution;
                $keynote->name = $request->name;
                $keynote->conference_id = $request->conference_id;
                $keynote->update();
                if (file_exists($path . $image)) {
                    unlink($path . $image);
                }
                DB::commit();
            } else {
                DB::beginTransaction();
                $keynote->institution = $request->institution;
                $keynote->name = $request->name;
                $keynote->conference_id = $request->conference_id;
                $keynote->update();

                DB::commit();
            }
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('failed_upload', 'Update Failed')->withErrors($validator);
        }

        return redirect('/admin/keynote')->with('succes_upload', 'Update success');
    }
    public function delete($id)
    {
        $keynote = KeynoteSpeaker::find($id);
        // dd($id);
        $image = '/payments/' . $keynote->image;
        $path = str_replace('\\', '/', public_path());
        // dd($path . $image);

        if (file_exists($path . $image)) {
            unlink($path . $image);
            $keynote->delete();
            return redirect()->back()->with('succes_upload', 'Delete success');
        } else {
            $keynote->delete();
            return redirect()->back()->with('succes_upload', 'Delete success');
        }
    }
}
