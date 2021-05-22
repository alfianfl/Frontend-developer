<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\abstract_paper;
use App\Models\Admin;
use App\Models\audience_conference;
use App\Models\conference;
use App\Models\paper;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //Dashboard
    public function index()
    {
        $conference = conference::where('status', 'on')->first();
        $audience = audience_conference::where('conference_id', $conference->conference_id)->get();
        $abstract = abstract_paper::where('conference_id', $conference->conference_id)->get();
        $paper = paper::where('conference_id', $conference->conference_id)->get();
        $user = User::all();
        $count = count($audience);
        $countUser = count($user);
        $countAbstract = count($abstract);
        $countPaper = count($paper);
        return view('admin.index', compact('count', 'countUser', 'countAbstract', 'countPaper'));
    }

    public function page()
    {
        $admins = Admin::all();
        return view('.admin.adminPage.adminPage', compact('admins'));
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('.admin.adminPage.editAdmin', compact('admin'));
    }

    public function create()
    {
        return view('.admin.adminPage.createAdmin');
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect('/admin/adminPage/createAdmin')->with('error_message', 'Add new admin failed!')->withErrors($validator);
        }

        try {
            DB::beginTransaction();

            $admin = new Admin;
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = bcrypt($request->password);

            $admin->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $output = $e->getMessage();

            return redirect('/admin/adminPage/createAdmin')->with('error_message', $output);
        }

        return redirect('/admin/adminPage')->with('success_message', 'Add new admin success!');
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins,email,' . $admin->id],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect("/admin/adminPage/editAdmin/$id")->with('error_message', 'Update admin failed')->withErrors($validator);
        }

        try {
            DB::beginTransaction();

            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = bcrypt($request->password);

            $admin->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $output = $e->getMessage();

            return redirect("/admin/adminPage/editAdmin/$id")->with('error_message', $output);
        }

        return redirect('/admin/adminPage')->with('success_message', 'Update admin success!');
    }
    public  function delete($id)
    {
        Admin::find($id)->delete();
        return redirect('/admin/adminPage')->with('success_message', 'Delete admin success!');
    }
}
