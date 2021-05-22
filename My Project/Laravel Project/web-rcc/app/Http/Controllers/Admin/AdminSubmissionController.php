<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\abstract_paper;
use App\Models\member;
use App\Models\paper;
use App\Models\pesanan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminSubmissionController extends Controller
{
    //
    public function Showpayment()
    {
        $arrayStatusPesanan[0] = "Pending";
        $arrayStatusPesanan[1] = "Accepted";
        $arrayStatusPesanan[2] = "Rejected ";
        $pesanan = pesanan::get();
        return view('.admin.submissions.proofofPayment', compact('pesanan', 'arrayStatusPesanan'));
    }
    public function EditPayment($id)
    {
        $arrayStatusPesanan[0] = "Pending";
        $arrayStatusPesanan[1] = "Accepted";
        $arrayStatusPesanan[2] = "Rejected ";
        $pesanan = pesanan::find($id);
        return view('.admin.submissions.edit.editProofOfPayment', compact('pesanan', 'arrayStatusPesanan'));
    }
    public function UpdatePayment(Request $request, $id)
    {

        $pesanan = pesanan::find($id);
        try {

            DB::beginTransaction();
            $pesanan->status = $request->role;
            $pesanan->update();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('failed_update', 'Update Failed');
        }
        return redirect('/admin/proofOfPayment')->with('succes_update', 'Update Succes');
    }
    //-------------------------------------------------------Proof of member-------------------------------------------------------------------
    public function ShowMember()
    {
        $arrayStatusPesanan[0] = "Pending";
        $arrayStatusPesanan[1] = "Accepted";
        $arrayStatusPesanan[2] = "Rejected ";
        $member = member::get();
        return view('.admin.submissions.proofofMember', compact('member', 'arrayStatusPesanan'));
    }
    public function editMember($id)
    {
        $arrayStatusPesanan[0] = "Pending";
        $arrayStatusPesanan[1] = "Accepted";
        $arrayStatusPesanan[2] = "Rejected ";
        $member = member::find($id);
        return view('.admin.submissions.edit.editProofOfMember', compact('member', 'arrayStatusPesanan'));
    }
    public function updateMember(Request $request, $id)
    {

        $member = member::find($id);
        try {

            DB::beginTransaction();
            $member->status = $request->role;
            $member->update();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('failed_update', 'Update Failed');
        }
        return redirect('/admin/proofOfMember')->with('succes_update', 'Update Succes');
    }
    public function ShowAbstract()
    {
        $arrayStatusPesanan[0] = "Pending";
        $arrayStatusPesanan[1] = "Accepted";
        $arrayStatusPesanan[2] = "Rejected ";
        $abstract = abstract_paper::get();
        return view('.admin.submissions.abstract', compact('abstract', 'arrayStatusPesanan'));
    }
    public function editAbstract($id)
    {
        $arrayStatusPesanan[0] = "Pending";
        $arrayStatusPesanan[1] = "Accepted";
        $arrayStatusPesanan[2] = "Rejected ";
        $abstract = abstract_paper::find($id);
        return view('.admin.submissions.edit.editAbstract', compact('abstract', 'arrayStatusPesanan'));
    }
    public function updateAbstract(Request $request, $id)
    {

        $abstract = abstract_paper::find($id);
        try {

            DB::beginTransaction();
            $abstract->status = $request->role;
            $abstract->update();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('failed_update', 'Update Failed');
        }
        return redirect('/admin/abstract')->with('succes_update', 'Update Succes');
    }
    public function ShowPaper()
    {
        $arrayStatusPesanan[0] = "Pending";
        $arrayStatusPesanan[1] = "Accepted";
        $arrayStatusPesanan[2] = "Rejected ";
        $paper = paper::get();
        return view('.admin.submissions.fullPaper', compact('paper', 'arrayStatusPesanan'));
    }
    public function editPaper($id)
    {
        $arrayStatusPesanan[0] = "Pending";
        $arrayStatusPesanan[1] = "Accepted";
        $arrayStatusPesanan[2] = "Rejected ";
        $paper = paper::find($id);
        return view('.admin.submissions.edit.editFullPaper', compact('paper', 'arrayStatusPesanan'));
    }
    public function updatePaper(Request $request, $id)
    {

        $paper = paper::find($id);
        try {

            DB::beginTransaction();
            $paper->status = $request->role;
            $paper->update();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('failed_update', 'Update Failed');
        }
        return redirect('/admin/fullPaper')->with('succes_update', 'Update Succes');
    }
}
