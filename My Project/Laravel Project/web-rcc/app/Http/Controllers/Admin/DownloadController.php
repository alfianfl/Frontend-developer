<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\audience_conference;
use App\Models\Certificate;
use App\Models\template;
use App\Models\conference;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class DownloadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $certificate = Certificate::first();

        $templates = template::all();
        return view('.admin.download.download', compact('templates', 'certificate'));
    }

    public function certificate(Request $request, $id)
    {
        $certificate = Certificate::find($id);
        $certificate->status = $request->status;
        $certificate->update();
        return redirect('/admin/download')->with('success_message', 'update status success!');
    }

    public function edit($id)
    {

        $template = template::find($id);
        $conferences = conference::all();
        return view('.admin.download.edit.editDownload', compact('template', 'conferences'));
    }

    public function create()
    {
        $conferences = conference::all();
        return view('.admin.download.create.createDownload', compact('conferences'));
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'file' => ['required', 'file'],
            'conference_id' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return redirect('/admin/download/createDownload')->with('error_message', 'Add new template failed!')->withErrors($validator);
        }

        try {
            $file = $request->file('file');
            $file_name =  $file->getClientOriginalName();
            $file->move('templates', $file_name);

            DB::beginTransaction();

            $template = new template();
            $template->title = $request->title;
            $template->file_name = $file_name;
            $template->conference_id = $request->conference_id;

            $template->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $output = $e->getMessage();

            return redirect('/admin/download/createDownload')->with('error_message', $output);
        }

        return redirect('/admin/download')->with('success_message', 'Add new template success!');
    }

    public function update(Request $request, $id)
    {
        $template = template::find($id);

        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'file' => ['file'],
            'conference_id' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return redirect("/admin/download/editDownload/$id")->with('error_message', 'Update template failed!')->withErrors($validator);
        }

        try {
            if ($request->hasFile('file')) {
                $old_file = $template->file_name;

                $file = $request->file('file');
                $file_name =  $file->getClientOriginalName();
                $file->move('templates', $file_name);
            }

            DB::beginTransaction();

            $template->title = $request->title;
            if ($request->hasFile('file')) {
                $template->file_name = $file_name;
            }
            $template->conference_id = $request->conference_id;

            $template->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $output = $e->getMessage();

            return redirect("/admin/download/editDownload/$id")->with('error_message', $output);
        }
        if ($request->hasFile('file')) {
            File::delete(public_path("templates/$old_file"));
        }
        return redirect('/admin/download')->with('success_message', 'Update template success!');
    }

    public  function delete($id)
    {
        $template = template::find($id);
        File::delete(public_path("templates/$template->file_name"));
        $template->delete();
        return redirect('/admin/download')->with('success_message', 'Delete template success!');
    }
}
