<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Subject;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Admits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SubjectController extends Controller
{


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'subjectname' => 'required',
            'level' => 'required',

        ]);
    }

    public function show()
    {
        $subject = Subject::all();
        //   return $subject;
        return view('components.admin.subjects', compact('subject'), ['nav' => 'subjects']);
    }

    public function store(Request $request)
    {
        if (Subject::where(['subjectname' => $request->subject, 'gradelevel' => $request->level])->exists()) {
            Alert::toast('Subject already EXISTS!', 'warning');
            return back();
        } else {
            $subject = new Subject;
            $subject->subjectname = $request->subject;
            $subject->gradelevel = $request->level;

            $subject->save();
            Alert::toast('Subject added successfully!', 'success');
            return back();
        }
    }

    public function delete($id)
    {
        $subject = Subject::find($id);

        $subject->delete();
        Alert::toast('Subject deleted successfully!', 'success');
        return back();
    }


    // ABDUL
    public function displaySubject($teacher)
    {
        $teacherdata = Auth::user()->lastname . ", " . Auth::user()->firstname . " " . Auth::user()->middlename . ".";
        $subjects = Schedule::where('teacher', $teacherdata)->get();

        if (Auth::user()->role == 'adviser') {

            return view('components.adviser.teacher-subjects', compact('subjects'), ['nav' => 'teacher-subjects']);
        } elseif (Auth::user()->role == 'none-adviser') {
            return view('components.none-advisory.non_advisory', compact('subjects'), ['nav' => 'teacher-subjects']);
        }
    }
}
