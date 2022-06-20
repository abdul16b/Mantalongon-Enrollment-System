<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class FilesController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            "file" => "required|mimes:pdf|max:10000"

        ]);
    }

    //............................List of teacher's file..............................
    public function listFiles()
    {
        return view('components.admin.file', ['nav' => 'file']);
    }




    //................................................................For Admin....................
    public function index($schoolyear)
    {
        $files = File::all();

        return view('components.admin.files.myfiles', compact('schoolyear'), ['nav' => 'myfiles', 'files' => $files]);
    }

    public function viewFiles()
    {
        $files = File::where(['user_id' => Auth::user()->id])->get();
        return view('components.admin.files.myfiles', compact('files'), ['nav' => 'myfiles']);
    }

    public function store(Request $req)
    {
        //    dd($req->user_id);
        $filename = $req->file->getClientOriginalName();
        $uniqid = uniqid() . '.' . $filename;
        $req->file->move(public_path() . '/admin-document', $uniqid);

        File::create([
            'filename' => $uniqid,
            'user_id' => $req->user_id,
        ]);

        $files = File::all();
        Alert::toast('File uploaded SUCCESSFULLY!', 'success');
        return back();
    }


    public function show()
    {
        $files = File::all();

        return view('components.admin.files.myfiles', compact('files'), ['nav' => 'myfiles', 'files' => $files]);
    }

    public function view(File $file)
    {
        return view('components.admin.files.viewfile', compact('file'));
    }
    public function delete($id)
    {
        $files = File::all();
        $file = File::find($id);

        $file_name = $file->filename;
        $file_path = public_path('admin-document/' . $file_name);
        unlink($file_path);

        $file->delete();
        Alert::toast('File deleted SUCCESSFULLY!', 'success');
        return back();
    }

    public function viewAdminTeacherFile(File $file, $id){
        // dd($id);
        return view('components.admin.teachers.teacher-viewfile', compact('file'));
    }


    //................................................................For Adviser.......................................................
    public function adviserIndex($schoolyear)
    {
        $files = File::all();
        return view('components.adviser.teacher-files', compact('schoolyear'), ['nav' => 'teacher-files', 'files' => $files]);
    }

    public function storeAdviserFiles(Request $req, $schoolyear)
    {
        $filename = $req->file->getClientOriginalName();
        $uniqid = uniqid() . '.' . $filename;
        $req->file->move(public_path() . '/teacher-document', $uniqid);

        File::create([
            'filename' => $uniqid,
            'user_id' => $req->user_id,
        ]);
        $files = File::all();
        Alert::toast('File Uploaded Successfully!','success');

        return view('components.adviser.teacher-files', compact('schoolyear', 'files'), ['nav' => 'teacher-files']);

    }

    public function showFiles()
    {
        $files = File::all();

        return view('components.adviser.teacher-files', compact('files'), ['nav' => 'teacher-files', 'files' => $files]);
    }

    public function viewFile($id)
    {

        $file = File::where('id', '=', $id)->get();
        return view('components.adviser.view', compact('file'));
    }


    public function deleteFile($id, $schoolyear)
    {
        $file = File::find($id);

        $file_name = $file->filename;

        $file_path = public_path('teacher-document/' . $file_name);
        unlink($file_path);

        $file->delete();
        $files = File::all();
        Alert::toast('File Uploaded Successfully!','success');
        return view('components.adviser.teacher-files', compact('schoolyear', 'files'), ['nav' => 'teacher-files']);
    }


    //...............................................For SUBJECT TEACHER.......................................................
    public function subjectTeacherIndex($schoolyear)
    {
        $files = File::all();
        return view('components.none-advisory.files', compact('schoolyear'), ['nav' => 'files', 'files' => $files]);
    }

    public function storeSubTeacher(Request $req)
    {

        $filename = $req->file->getClientOriginalName();
        $uniqid = uniqid() . '.' . $filename;
        $req->file->move(public_path() . '/teacher-document', $uniqid);

        File::create([
            'filename' => $uniqid,
            'user_id' => $req->user_id,
        ]);

        $teacher_files = File::all();
        Alert::toast('File Uploaded Successfully!','success');
        return back();
    }

    public function showSubTeacherFiles()
    {
        $files = File::all();

        return view('components.none-advisory.files', compact('files'), ['nav' => 'files']);
    }

    public function viewDocument(File $id)
    {


        return view('components.none-advisory.view', compact('file'));
    }


    public function deleteDocument($id)
    {
        // dd($id);
        $file = File::find($id);

        $file_name = $file->filename;
        $file_path = public_path('teacher-document/' . $file_name);
        unlink($file_path);

        $file->delete();
        return back();
    }
}
