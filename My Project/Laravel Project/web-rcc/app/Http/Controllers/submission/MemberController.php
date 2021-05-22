<?php

namespace App\Http\Controllers\submission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\abstract_paper;
use App\Models\conference;
use App\Models\member;
use App\Models\paper;
use App\Models\pesanan;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class MemberController extends Controller
{

    public function UploadDatabase(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'member' => ['required', 'file', 'mimes:jpeg,png'],
        ]);
        if ($validator->fails()) {
            return back()->with('Failed_member', 'Upload Failed')->withErrors($validator);
        }

        if ($request->hasFile('member')) {

            try {
                $file = $request->file('member');
                $namafile =  time() . "_" . $file->getClientOriginalName();
                $file->move('members', $namafile);
                DB::beginTransaction();
                $userid = Auth::id();
                $member = new member;
                $member->file_members = $namafile;
                $member->file_name = $file->getClientOriginalName();
                $member->role = $request->role;
                $member->status = 0;
                $member->id = $userid;
                $member->save();


                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                $image = '/members/' . $namafile;
                $path = str_replace('\\', '/', public_path());
                if (file_exists($path . $image)) {
                    unlink($path . $image);
                    return back()->with('Failed_member', 'Upload Failed')->withErrors($validator);
                } else {
                    return back()->with('Failed_member', 'Upload Failed')->withErrors($validator);
                }
            }
            return redirect()->back()->with('succes_member', 'Upload success');
        } else {

            return back()->with('Failed_member', 'Upload Failed')->withErrors($validator);
        }
    }
    public function Edit(Request $request, $id)
    {
        $member = member::find($id);


        if ($request->hasFile('member')) {
            $image = '/members/' . $member->file_members;
            $path = str_replace('\\', '/', public_path());

            $validator = Validator::make($request->all(), [
                'member' => ['required', 'file', 'mimes:jpeg,png'],
            ]);
            if ($validator->fails()) {
                return back()->with('Failed_member', 'Upload Failed')->withErrors($validator);
            }
            // get file and move to directory
            $file = $request->file('member');
            $namafile =  time() . "_" . $file->getClientOriginalName();
            $file->move('members', $namafile);
            // end file
            try {
                DB::beginTransaction();
                $member->status = 0;
                $member->file_members = $namafile;
                $member->role = $request->role;
                $member->file_name = $file->getClientOriginalName();
                $member->save();
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                return back()->with('Failed_member', 'Upload Failed')->withErrors($validator);
            }
            if (file_exists($path . $image)) {
                unlink($path . $image);
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } else {
            $member->status = 0;
            $member->role = $request->role;
            $member->save();
            return redirect()->back()->with('succes_member', 'Update success');
        }
    }
    public  function delete($id)
    {
        $member = member::find($id);
        $image = '/members/' . $member->file_members;
        $path = str_replace('\\', '/', public_path());

        if (file_exists($path . $image)) {
            unlink($path . $image);
            $member->delete();
            return redirect()->back()->with('succes_member', 'Delete success');
        } else {
            $member->delete();
            return redirect()->back()->with('succes_member', 'Delete success');
        }
    }
}
