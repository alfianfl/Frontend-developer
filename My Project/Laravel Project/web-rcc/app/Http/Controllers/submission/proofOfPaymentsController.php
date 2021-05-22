<?php

namespace App\Http\Controllers\submission;

use App\Http\Controllers\Controller;
use App\Models\abstract_paper;
use App\Models\audience_conference;
use App\Models\conference;
use App\Models\member;
use App\Models\paper;
use App\Models\pesanan;
use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;



class proofOfPaymentsController extends Controller
{

    protected function validatorSubmission(array $data)
    {
        return Validator::make($data, [
            'avatar' => ['required|file|mimes:jpeg,png'],


        ]);
    }

    public function UploadDatabase(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => ['required', 'file', 'mimes:jpeg,png'],
        ]);
        if ($validator->fails()) {
            return back()->with('Failed', 'Upload Failed')->withErrors($validator);
        }
        if ($request->hasFile('file')) {
            // get file and move to directory
            // end file

            try {
                $file = $request->file('file');
                $namafile =  time() . "_" . $file->getClientOriginalName();
                $file->move('payments', $namafile);
                DB::beginTransaction();

                $phone = Auth::user()->phone;
                $userid = Auth::id();
                $pesanan = new pesanan;
                $pesanan->phone = $phone;
                $pesanan->tanggal_pemesanan = Carbon::now();
                $pesanan->bukti_pembayaran = $namafile;
                $pesanan->file_name = $file->getClientOriginalName();
                $pesanan->role = $request->role_payments;
                $pesanan->status = 0;
                $pesanan->id = $userid;
                $pesanan->conference_id = $request->conference_id;
                $pesanan->save();


                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                $image = '/payments/' . $namafile;
                $path = str_replace('\\', '/', public_path());
                if (file_exists($path . $image)) {
                    unlink($path . $image);
                    return back()->with('Failed', ' Upload file failed')->withErrors($validator);
                } else {

                    return back()->with('Failed', ' Upload file failed')->withErrors($validator);
                }
            }
            return back()->with('status', 'Upload success');
        } else {

            return back()->with('Failed', 'Upload Failed')->withErrors($validator);
        }
    }
    public function Edit(Request $request, $id)
    {

        // // return "True request!";
        // $audience = audience_conference::with('conference')->where('id', Auth::user()->id)->get();
        // $abc = pesanan::find($id);
        // // return response()->json($abc->file_name);
        // // return view('assessments.edit')->with('editassessments', $editassessments);
        // // return view('pages.components.submissions.modalSubmissions.modalProofOfPayment', ['pesanan' => $pesanans['pesanan']]);

        // return view('.pages.components.submissions.modalSubmissions.modalProofOfPayment', compact('abc', 'audience'));

        $pesanan = pesanan::find($id);
        // define path upload
        $image = '/payments/' . $pesanan->bukti_pembayaran;
        $path = str_replace('\\', '/', public_path());
        // end 

        //end
        $validator = Validator::make($request->all(), [
            'file' => ['required', 'file', 'mimes:jpeg,png'],
        ]);
        if ($request->hasFile('file')) {
            // validator file
            $file = $request->file('file');
            if ($validator->fails()) {
                return back()->with('Failed', 'Upload Failed')->withErrors($validator);
            }

            // get file and move to directory
            $file = $request->file('file');
            $namafile =  time() . "_" . $file->getClientOriginalName();
            $file->move('payments', $namafile);
            // end file
            try {
                DB::beginTransaction();
                $pesanan->file_name = $file->getClientOriginalName();
                $pesanan->status = 0;
                $pesanan->role = $request->role_payments;
                $pesanan->bukti_pembayaran = $namafile;
                $pesanan->conference_id = $request->conference_id;
                $pesanan->update();
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('Failed', 'Update failed')->withErrors($validator);
            }
            if (file_exists($path . $image)) {
                unlink($path . $image);
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } else {

            try {
                DB::beginTransaction();

                $pesanan->role = $request->role_payments;
                $pesanan->conference_id = $request->conference_id;
                $pesanan->status = 0;
                $pesanan->update();
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('Failed', 'Update failed');
            }
            return back()->with('status', 'Update success');
        }
    }

    public  function delete($id)
    {
        $pesanan = pesanan::find($id);
        // dd($id);
        $image = '/payments/' . $pesanan->bukti_pembayaran;
        $path = str_replace('\\', '/', public_path());
        // dd($path . $image);

        if (file_exists($path . $image)) {
            unlink($path . $image);
            $pesanan->delete();
            return redirect()->back()->with('status', 'Delete success');
        } else {
            $pesanan->delete();
            return redirect()->back()->with('status', 'Delete success');
        }
    }
}
