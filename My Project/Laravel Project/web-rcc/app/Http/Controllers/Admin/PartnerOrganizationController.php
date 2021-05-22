<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\partner_organization;
use App\Models\conference;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File; 

class PartnerOrganizationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $p_os = partner_organization::all();
        $conference_title = [];
        foreach ($p_os as $p_o) {
            $conference = conference::find($p_o->conference_id);
            array_push($conference_title, $conference->conference_title);
        }
        return view('.admin.partnerOrganization.partnerOrganization', compact('p_os', 'conference_title'));
    }

    public function edit($id)
    {
        $p_o = partner_organization::where('partner_id', $id)->first();
        $conferences = conference::all();
        return view('.admin.partnerOrganization.edit.editPartnerOrganization', compact('p_o', 'conferences'));
    }

    public function create()
    {
        $conferences = conference::all();
        return view('.admin.partnerOrganization.create.createPartnerOrganization', compact('conferences'));
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'partner_name' => ['required', 'string', 'max:255'],
            'partner_picture' => ['required', 'file', 'mimes:jpeg,png,jpg', 'max:2048'],
            'address_organization' => ['required', 'string'],
            'conference_id' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return redirect('/admin/partnerOrganization/createPartnerOrganization')->with('error_message', 'Add new partner organization failed!')->withErrors($validator);
        }

        try {
            $file = $request->file('partner_picture');
            $file_name =  $file->getClientOriginalName();
            $file->move('assets/img/logouniv', $file_name);

            DB::beginTransaction();

            $p_o = new partner_organization();
            $p_o->partner_name = $request->partner_name;
            $p_o->partner_picture = $file_name;
            $p_o->address_organization = $request->address_organization;
            $p_o->conference_id = $request->conference_id;

            $p_o->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $output = $e->getMessage();

            return redirect('/admin/partnerOrganization/createPartnerOrganization')->with('error_message', $output);
        }

        return redirect('/admin/partnerOrganization')->with('success_message', 'Add new partner organization success!');
    }

    public function update(Request $request, $id)
    {
        $p_o = partner_organization::where('partner_id', $id)->first();

        $validator = Validator::make($request->all(), [
            'partner_name' => ['required', 'string', 'max:255'],
            'partner_picture' => ['file', 'mimes:jpeg,png,jpg', 'max:2048'],
            'address_organization' => ['required', 'string'],
            'conference_id' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return redirect("/admin/partnerOrganization/editPartnerOrganization/$id")->with('error_message', 'Update partner organization failed!')->withErrors($validator);
        }

        try {
            if($request->hasFile('partner_picture'))
            {
            $old_file = $p_o->partner_picture;
            
            $file = $request->file('partner_picture');
            $file_name =  $file->getClientOriginalName();
            $file->move('assets/img/logouniv', $file_name);
            }

            DB::beginTransaction();

            $p_o->partner_name = $request->partner_name;
            if($request->hasFile('partner_picture'))
            {
            $p_o->partner_picture = $file_name;
            }
            $p_o->address_organization = $request->address_organization;
            $p_o->conference_id = $request->conference_id;

            $p_o->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $output = $e->getMessage();

            return redirect("/admin/partnerOrganization/editPartnerOrganization/$id")->with('error_message', $output);
        }
        if($request->hasFile('partner_picture'))
        {
        File::delete(public_path("assets/img/logouniv/$old_file"));
        }
        return redirect('/admin/partnerOrganization')->with('success_message', 'Update partner organization success!');
    }

    public  function delete($id)
    {
        $p_o = partner_organization::find($id);
        File::delete(public_path("assets/img/logouniv/$p_o->partner_picture"));
        $p_o->delete();
        return redirect('/admin/partnerOrganization')->with('success_message', 'Delete partner organization success!');
    }
}
