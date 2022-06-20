<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GradeLevel;
use App\Models\Subject;
use App\Models\Section;
use Mockery\Matcher\Subset;
use App\Models\Admission;
use App\Models\Admits;
use App\Models\SchoolYear;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPSTORM_META\type;

class AdmissionController extends Controller
{
    //
    public function show()
    {
        $schoolyears = SchoolYear::all();
        $subjects = Subject::where('gradelevel', '7')->get();
        return view('components.admin.admission', compact('schoolyears', 'subjects'), ['nav' => 'admission'])->with('schoolyears', $schoolyears);
    }

    public function showTeacherAdmission($schoolyear)
    {
        $schoolyear = $schoolyear;
        // dd($schoolyear);
        $schoolyears = SchoolYear::all();
        $subjects = Subject::where('gradelevel', '7')->get();
        return view('components.adviser.admission', compact('schoolyears', 'subjects', 'schoolyear'), ['nav' => 'teacher-admission'])->with('schoolyears', $schoolyears);
    }
    //for dependent dropdowns
    public function index()
    {
        //fetch all grade levels
        $levelData['data'] = GradeLevel::orderby('grade_level')
            ->select('id', 'grade_level')->get();
        return view('components.admin.admission', ['nav' => 'admission'])->with('levelData', $levelData);
    }

    //Fetching data using Ajax
    public function getSection(Request $request)
    {
        $sections = DB::table("sections")->where("grade_level", $request->section)->where("school_year", $request->schoolyear)
            ->pluck("section_name", "id");
        return response()->json($sections);
    }


    public function getadviserSection(Request $request)
    {
        $sections = DB::table("sections")->where("grade_level", $request->section)->where("school_year", $request->schoolyear)
            ->pluck("section_name", "id");
        return response()->json($sections);
    }

    //for auto population
    public function getStudents()
    {
        $students = Admission::all();
        return response()->json($students);
    }


    public function addStudent()
    {
        $newStudent = $this->infoRequest();
        $catcher = Admission::where(['LRN' => $newStudent['LRN'], 'school_year' => $newStudent['school_year']])->exists();
        if ($catcher) {
            Alert::toast('Student is already admitted in the same school year!', 'warning');
            return back();
        } else {
            $users = $this->extendRequest();
            $id = Admission::create($this->infoRequest())->id;
            // dd($id);
            $user = Admits::create($users)->id;
            $schoolyears = SchoolYear::all();
            $subjects = Subject::where(['gradelevel' => '7'])->get();
            $LRN = $users['LRN'];
            $schoolyear = $users['school_year'];

            if ($users['type'] != 'irregular' || $users['type'] == null) {
                // dd('regular');
                $gradeLevel = $users['gradeLevel'];
                $subs = Subject::where('gradelevel', $gradeLevel)->get();
                foreach ($subs as $sub) {
                    DB::table('grades')->insert(['LRN' => $LRN, 'student_id' => $id, 'subjects' => $sub->subjectname, 'school_year' => $schoolyear]);
                }
                Alert::toast('Student admitted  successfully!', 'success');
                return view('components.admin.admission', compact('schoolyears', 'subjects'), ['nav' => 'admission']);
            } else {
                $subs = $users['subjects'];
                $count = count($subs);
                for ($i = 0; $i < $count; $i++) {
                    DB::table('irregular_scheds')->insert(['student_id' => $LRN, 'subject' => $subs[$i]]);
                    DB::table('grades')->insert(['LRN' => $LRN, 'student_id' => $id, 'subjects' => $subs[$i], 'school_year' => $schoolyear]);
                }
                // return view('components.admin.admission', compact('schoolyears', 'subjects'), ['nav' => 'admission'])->with;
                Alert::toast('Student admitted  successfully!', 'success');
                return view('components.admin.admission', compact('schoolyears', 'subjects'), ['nav' => 'admission']);
            }
        }
    }



    // public function addteacherStudent($year)
    // {
    //     $users = $this->extendRequest();
    //     $id = Admission::create($this->infoRequest())->id;
    //     $user = Admits::create($users)->id;
    //     $schoolyears = SchoolYear::all();
    //     $subjects = Subject::all();
    //     $LRN = $users['LRN'];
    //     $schoolyear = $users['school_year'];

    //     if ($users['type'] != 'irregular' || $users['type'] == '') {
    //         // dd('regular');
    //         $gradeLevel = $users['gradeLevel'];
    //         $subs = Subject::where('gradelevel', $gradeLevel)->get();
    //         foreach ($subs as $sub) {
    //             DB::table('grades')->insert(['LRN' => $LRN,'student_id' => $id, 'subjects' => $sub->subjectname, 'school_year' => $schoolyear]);
    //         }

    //         return view('components.adviser.admission', compact('schoolyears', 'subjects'), ['nav' => 'admission']);
    //     } else {
    //         // dd('irregular');
    //         $subs = $users['subjects'];
    //         $count = count($subs);
    //         for ($i = 0; $i < $count; $i++) {
    //             DB::table('irregular_scheds')->insert(['student_id' => $LRN, 'subject' => $subs[$i]]);
    //             DB::table('grades')->insert(['LRN' => $LRN, 'subjects' => $subs[$i], 'school_year' => $schoolyear]);
    //         }
    //         // return view('components.admin.admission', compact('schoolyears', 'subjects'), ['nav' => 'admission'])->with;
    //         Session::flash('message', 'Student Admit Successfully!');
    //         return View::make('components.adviser.admission', compact('schoolyears', 'subjects'), ['nav' => 'admission']);
    //     }
    // }

    public function addteacherStudent($year)
    {
        $newStud = $this->infoRequest();
        $catcher = Admission::where(['LRN' => $newStud['LRN'], 'school_year' => $newStud['school_year']])->exists();
        if ($catcher) {
            Alert::toast('Student is already admitted in the same school year!', 'warning');
            return back();
        } else {

            $schoolyear = $year;
            $users = $this->extendRequest();
            $id = Admission::create($this->infoRequest())->id;
            // dd($id);
            $user = Admits::create($users)->id;
            $schoolyears = SchoolYear::all();
            $subjects = Subject::where(['gradelevel' => '7'])->get();
            $LRN = $users['LRN'];
            $schoolyear = $users['school_year'];

            if ($users['type'] != 'irregular' || $users['type'] == null) {
                // dd('regular');
                $gradeLevel = $users['gradeLevel'];
                $subs = Subject::where('gradelevel', $gradeLevel)->get();
                foreach ($subs as $sub) {
                    DB::table('grades')->insert(['LRN' => $LRN, 'student_id' => $id, 'subjects' => $sub->subjectname, 'school_year' => $schoolyear]);
                }
                Alert::toast('Student admitted  successfully!', 'success');
                return view('components.adviser.admission', compact('schoolyears', 'subjects', 'schoolyear'), ['nav' => 'admission']);
            } else {
                $subs = $users['subjects'];
                $count = count($subs);
                for ($i = 0; $i < $count; $i++) {
                    DB::table('irregular_scheds')->insert(['student_id' => $LRN, 'subject' => $subs[$i]]);
                    DB::table('grades')->insert(['LRN' => $LRN, 'student_id' => $id, 'subjects' => $subs[$i], 'school_year' => $schoolyear]);
                }
                // return view('components.admin.admission', compact('schoolyears', 'subjects'), ['nav' => 'admission'])->with;
                Alert::toast('Student admitted  successfully!', 'success');
                return view('components.adviser.admission', compact('schoolyears', 'subjects', 'schoolyear'), ['nav' => 'admission']);
            }
        }
    }



    //Data validation in private function
    private function infoRequest()
    {
        return request()->validate([
            'PSA_num'                   => '',
            'LRN'                       => 'required|min:8',
            'average'                   => '',
            'lastname'                  => 'required',
            'firstname'                 => 'required',
            'middlename'                => 'required|min:2',
            'date_of_birth'             => 'required',
            'age'                       => 'required|numeric',
            'gender'                    => 'required',
            'IPC'                       => 'required',
            'motherTongue'              => 'required',
            'contact_number'            => 'required|digits:11|numeric',
            'address'                   => 'required',
            'zipcode'                   => 'required|numeric|digits:4',
            'father_name'               => 'required',
            'mother_name'               => 'required',
            'guardian'                  => 'required',
            'guardian_contact_number'   => 'required|digits:11|numeric',
            'status'                    => '',
            'gradeLevel'                => 'required',
            'section'                   => 'required',
            'subjects'                  => '',
            'type'                      => '',
            'specialization'            => '',
            'school_year'               => 'required',
            'last_schoolname_attended'  => '',
            'last_school_address'       => ''
        ]);
    }

    private function extendRequest()
    {

        return request()->validate([
            'LRN'                       => '',
            'gradeLevel'                => '',
            'section'                   => '',
            'subjects'                  => '',
            'type'                      => '',
            'specialization'            => '',
            'school_year'               => '',
            'last_schoolname_attended'  => '',
            'last_school_address'       => ''
        ]);
    }

    public function edit($LRN, $schoolyear)
    {
        $students = Admission::where(['LRN' => $LRN, 'school_year' => $schoolyear])->get();
        foreach ($students as $student) {
            $secid = $student->section;
        }

        $sections = Section::where(['id' => $secid])->get();
        foreach ($sections as $section) {
            $section_name = $section->section_name;
        }
        return view('components.adviser.subjects.edit-student-details', compact('LRN', 'schoolyear', 'students', 'section_name'), ['nav' => 'students']);
    }

    public function update(Request $request, $id, $schoolyear)
    {

        // $data = $this->infoRequest();
        // dd($id .''.$schoolyear);
        $data = $request->validate([
            'PSA_num'                   => '',
            'LRN'                       => '',
            'average'                   => '',
            'lastname'                  => 'required',
            'firstname'                 => '',
            'middlename'                => '',
            'date_of_birth'             => '',
            'age'                       => '',
            'gender'                    => '',
            'IPC'                       => '',
            'motherTongue'              => '',
            'contact_number'            => 'required|numeric|digits:11',
            'address'                   => '',
            'zipcode'                   => '',
            'father_name'               => 'required',
            'mother_name'               => '',
            'guardian'                  => 'required',
            'guardian_contact_number'   => 'required|numeric|digits:11',
            'status'                    => 'required|alpha',
            'gradeLevel'                => '',
            'section'                   => '',
            'subjects'                  => '',
            'type'                      => '',
            'specialization'            => '',
            'school_year'               => '',
            'last_schoolname_attended'  => '',
            'last_school_address'       => ''
        ]);

        $student = Admission::find($id);
        $student->update($data);


        $students = Admission::where(['LRN' => $data['LRN'], 'school_year' => $schoolyear])->get();
        foreach ($students as $student) {
            $secid = $student->section;
            $LRN = $student->LRN;
        }

        $sections = Section::where(['id' => $secid])->get();
        foreach ($sections as $section) {
            $section_name = $section->section_name;
        }
        Alert::toast('Student details updated successfully!', 'success');
        // return view('components.admin.students.admin-student-details', compact('LRN', 'schoolyear', 'students', 'section_name'), ['nav' => 'students']);
        return back();
    }

    public function editAdminStudent($id, $LRN, $schoolyear)
    {
        // dd('working');
        $students = Admission::where(['id' => $id])->get();
        foreach ($students as $student) {
            // echo $student->subjects;
            // exit();
            $secid = $student->section;
        }

        $sections = Section::where(['id' => $secid])->get();
        foreach ($sections as $section) {
            $secname = $section->section_name;
        }
        return view('components.admin.students.admin-student-details', compact('LRN', 'schoolyear', 'students', 'secname'), ['nav' => 'student-list']);
    }
}
