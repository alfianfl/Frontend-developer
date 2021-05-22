<?php

namespace App\Http\Controllers\submission;

use App\Http\Controllers\Controller;
use App\Models\abstract_paper;
use App\Models\audience_conference;
use App\Models\conference;
use App\Models\member;
use App\Models\paper;
use App\Models\pesanan;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class AbstractController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {

            $audience = audience_conference::with('conference')->where('id', Auth::user()->id)->get();
            $pesanan = pesanan::with('conference')->where('id', Auth::user()->id)->get();
            $abstract = abstract_paper::with('conference')->where('id', Auth::user()->id)->get();
            $paper =  paper::with('conference')->where('id', Auth::user()->id)->get();
            $member = member::where('id', Auth::user()->id)->get();
            $arrayStatusPesanan[0] = "Pending";
            $arrayStatusPesanan[1] = "Accepted";
            $arrayStatusPesanan[2] = "Rejected ";

            if (Auth::user()->role == 'presenter') {

                return view('.pages.submissionsParticipant', compact('audience', 'pesanan', 'arrayStatusPesanan', 'abstract', 'paper', 'member'));
            } else {
                return view('.pages.submissionsNonParticipant', compact('audience', 'pesanan', 'arrayStatusPesanan', 'member'));
            }
        } else {
            return redirect('/unpad-icocome2021')->with('must_login', 'You Must login');
        }
    }
    public function UploadDatabase(Request $request)
    {



        $validator = Validator::make($request->all(), [
            'fileAbstract' => ['required', 'file', 'mimes:pdf'],
            'abstractTitle' =>  ['required'],
            'author' => ['required']
        ]);
        if ($request->hasFile('fileAbstract')) {
            if ($validator->fails()) {
                return back()->with('Failed_abstract', 'Upload Failed')->withErrors($validator);
            }


            try {
                $file = $request->file('fileAbstract');
                $namafile =  time() . "_" . $file->getClientOriginalName();
                $file->move('abstract', $namafile);
                DB::beginTransaction();

                $userid = Auth::id();
                $abstract = new abstract_paper;
                $abstract->abstract = $namafile;
                $abstract->status = 0;
                $abstract->Author = $request->author;
                $abstract->title = $request->abstractTitle;
                $abstract->id = $userid;
                $abstract->conference_id = $request->conference_id;
                $abstract->save();


                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                $abstract_file = '/abstract/' . $namafile;
                $path = str_replace('\\', '/', public_path());

                if (file_exists($path . $abstract_file)) {
                    unlink($path . $abstract_file);
                    return back()->with('Failed_abstract', 'Upload Failed')->withErrors($validator);
                } else {

                    return back()->with('Failed_abstract', 'Upload Failed')->withErrors($validator);
                }
            }
            return redirect()->back()->with('succes_abstract', 'Upload success');
        } else {

            return back()->with('Failed_abstract', 'Upload Failed')->withErrors($validator);
        }
    }

    public function Edit(Request $request, $id)
    {
        $abstract = abstract_paper::find($id);




        if ($request->hasFile('fileAbstract')) {
            $validator = Validator::make($request->all(), [
                'fileAbstract' => ['required', 'file', 'mimes:pdf'],
                'author' => ['required'],
                'abstractTitle' => ['required']
            ]);
            $abstract_file = '/abstract/' . $abstract->abstract;
            $path = str_replace('\\', '/', public_path());

            if ($validator->fails()) {
                return back()->with('Failed_abstract', 'Upload Failed')->withErrors($validator);
            }
            // get file and move to directory
            $file = $request->file('fileAbstract');
            $extension = $file->extension();
            $namafile =  time() . "_" . $file->getClientOriginalName();
            $file->move('abstract', $namafile);
            // end file
            try {
                DB::beginTransaction();
                $abstract->status = 0;
                $abstract->abstract = $namafile;
                $abstract->title = $request->abstractTitle;
                $abstract->Author = $request->author;
                $abstract->conference_id = $request->conference_id;
                $abstract->update();
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                return back()->with('Failed_abstract', 'Upload Failed')->withErrors($validator);
            }
            if (file_exists($path . $abstract_file)) {
                unlink($path . $abstract_file);
                return redirect()->back()->with('succes_abstract', 'Update success');
            } else {

                return redirect()->back()->with('succes_abstract', 'Update success');
            }
        } else {
            $validator = Validator::make($request->all(), [
                'author' => ['required'],
                'abstractTitle' => ['required']
            ]);
            try {
                DB::beginTransaction();
                $abstract->title = $request->abstractTitle;
                $abstract->status = 0;
                $abstract->Author = $request->author;
                $abstract->conference_id = $request->conference_id;
                $abstract->update();
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                return back()->with('Failed_abstract', 'Update Failed')->withErrors($validator);
            }
            return redirect()->back()->with('succes_abstract', 'Update success');
        }
    }

    public  function delete($id)
    {
        $abstract = abstract_paper::find($id);
        $abstract_file = '/abstract/' . $abstract->abstract;
        $path = str_replace('\\', '/', public_path());

        if (file_exists($path . $abstract_file)) {
            unlink($path . $abstract_file);
            $abstract->delete();
            return redirect()->back()->with('succes_abstract', 'Delete Success');
        } else {
            $abstract->delete();
            return redirect()->back()->with('succes_abstract', 'Delete Success');
        }
    }
}
