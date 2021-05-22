<?php

namespace App\Http\Controllers\submission;

use App\Http\Controllers\Controller;
use App\Models\abstract_paper;

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

class paperSubmission extends Controller
{
    //

    public function UploadDatabase(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Fullpapers' => ['required', 'file', 'mimes:pdf'],
            'titlePaper' =>  ['required'],
            'author' =>  ['required']
        ]);
        if ($validator->fails()) {
            return back()->with('Failed_paper', 'Upload Failed')->withErrors($validator);
        }

        if ($request->hasFile('Fullpapers')) {
            // get file and move to directory
            // end file

            try {
                $file = $request->file('Fullpapers');
                $namafile =  time() . "_" . $file->getClientOriginalName();
                $file->move('papers', $namafile);
                DB::beginTransaction();

                $userid = Auth::id();
                $paper = new paper;
                $paper->full_paper = $namafile;
                $paper->status = 0;
                $paper->Author = $request->author;
                $paper->tittle = $request->titlePaper;
                $paper->id = $userid;
                $paper->conference_id = $request->conference_id;
                // $this->validatorSubmission($request->all())->validate();
                $paper->save();


                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                $fullPapers = '/papers/' . $namafile;
                $path = str_replace('\\', '/', public_path());

                if (file_exists($path . $fullPapers)) {
                    unlink($path . $fullPapers);

                    return back()->with('Failed_paper', 'Upload Failed')->withErrors($validator);
                } else {
                    return back()->with('Failed_paper', 'Upload Failed')->withErrors($validator);
                }
            }
            return redirect()->back()->with('succes_paper', 'Upload Success');
        } else {

            return back()->with('Failed_paper', 'Upload Failed')->withErrors($validator);
        }
    }
    public function Edit(Request $request, $id)
    {


        $paper = paper::find($id);
        if ($request->hasFile('Fullpapers')) {
            $validator = Validator::make($request->all(), [
                'Fullpapers' => ['required', 'file', 'mimes:pdf'],
                'titlePaper' =>  ['required'],
                'author' =>  ['required']
            ]);
            $fullPapers = '/papers/' . $paper->full_paper;
            $path = str_replace('\\', '/', public_path());

            if ($validator->fails()) {
                return back()->with('Failed_paper', 'Upload Failed')->withErrors($validator);
            }
            // get file and move to directory
            $file = $request->file('Fullpapers');
            $namafile =  time() . "_" . $file->getClientOriginalName();
            $file->move('papers', $namafile);
            // end file
            try {
                DB::beginTransaction();

                $paper->full_paper = $namafile;
                $paper->tittle = $request->titlePaper;
                $paper->status = 0;
                $paper->Author = $request->author;
                $paper->save();
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                return back()->with('Failed_paper', 'Upload Failed')->withErrors($validator);
            }
            if (file_exists($path . $fullPapers)) {
                unlink($path . $fullPapers);
                return redirect()->back()->with('succes_paper', 'Update Success');
            } else {
                return redirect()->back()->with('succes_paper', 'Update Success');
            }
        } else {
            $validator = Validator::make($request->all(), [

                'titlePaper' =>  ['required'],
                'author' =>  ['required']
            ]);
            try {
                DB::beginTransaction();

                $paper->tittle = $request->titlePaper;
                $paper->status = 0;
                $paper->Author = $request->author;
                $paper->update();
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                return back()->with('Failed_paper', 'Upload Failed')->withErrors($validator);
            }
            return redirect()->back()->with('succes_paper', 'Update Success');
        }
    }
    public  function delete($id)
    {
        $paper = paper::find($id);
        $fullPapers = '/papers/' . $paper->full_paper;
        $path = str_replace('\\', '/', public_path());

        if (file_exists($path . $fullPapers)) {
            unlink($path . $fullPapers);
            $paper->delete();
            return redirect()->back()->with('succes_paper', 'Delete success');
        } else {
            $$paper->delete();
            return redirect()->back()->with('succes_paper', 'Delete success');
        }
    }
}
