<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\Admits;
use App\Models\Schedule;
use App\Models\Section;
use App\Models\SchoolYear;
use App\Models\User;
use App\Models\Grade;
use Error;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        //fetch all students
        $students = Admission::all();
        return view('components.admin.student-list', compact('students'), ['nav' => 'student-list']);
    }

    public function show()
    {
        $schoolyear = SchoolYear::all();
        return view('components.admin.students.schoolyear', compact('schoolyear'), ['nav' => 'student-list']);
    }

    public function showStudents($schoolyear)
    {
        $advisory = Section::where(['teacher_id' => Auth::user()->id])->get();
        $students = Admission::where(['school_year' => $schoolyear, 'section' => Auth::user()->section_id])->get();
        $teachers = User::where(['id' => Auth::user()->id])->get();


        return view('components.adviser.studentlist', compact('students', 'schoolyear', 'advisory', 'teachers'), ['nav' => 'students']);
    }

    public function showStudentsLists($schoolyear)
    {
        $students = Admission::where(['school_year' => $schoolyear])->get();
        return view('components.admin.student-list', compact('students', 'schoolyear'), ['nav' => 'student-list']);
    }


    public function showStudentsDetails($id, $LRN, $schoolyear)
    {

        // dd($LRN.''.$schoolyear);
        $students = Admission::where(['id' => $id, 'LRN' => $LRN, 'school_year' => $schoolyear])->get();
        $admits = Admits::where(['LRN' => $LRN])->get();
        foreach ($students as $student) {
            $sectionid = $student->section;
        }
        foreach (Section::where(['id' => $sectionid])->get() as $section) {
            $section_name = $section->section_name;
        }
        return view('components.adviser.student-details', compact('students', 'schoolyear', 'admits', 'section_name'), ['nav' => 'subjects']);
    }

    public function showSubjects($schoolyear)
    {
        // dd($schoolyear);
        $users = User::where(['id' => Auth::user()->id])->get();
        foreach ($users as $user) {
            $name = $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname;
        }
        $sections = Schedule::where(['teacher' => $name, 'school_year' => $schoolyear])->get();
        return view('components.adviser.subjects.sections', compact('sections', 'schoolyear'), ['nav' => 'teacher-subjects']);
    }

    public function showStudentList($gradelevel, $section, $subject, $schoolyear)
    {
        $secIDs = Section::where(['section_name' => $section, 'school_year' => $schoolyear])->get();
        foreach ($secIDs as $sec) {
            $secid = $sec->id;
        }

        $students = Admission::where(['gradeLevel' => $gradelevel, 'section' => $secid])->get();
        foreach ($students as $student) {
            $names = Admission::where(['LRN' => $student->LRN])->get();
        }

        $users = User::where(['id' => Auth::user()->id])->get();
        foreach ($users as $user) {
            $name = $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname;
        }
        // dd($schoolyear);, 'subject'=>$subject, 'school_year'=>$schoolyear 'section'=>$secid, 'gradeLevel'=>$gradelevel
        $schedules = Schedule::where(['teacher' => $name, 'subject' => $subject, 'school_year' => $schoolyear, 'section' => $section, 'gradeLevel' => $gradelevel])->get();
        return view('components.adviser.subjects.students-list', compact('students', 'schoolyear', 'gradelevel', 'section', 'subject', 'schedules'), ['nav' => 'teacher-subjects']);
    }

    public function addGrade($studId, $LRN, $section, $gradelevel, $subject, $schoolyear)
    {

        // dd($schoolyear);
        // dd($LRN.' '. $section.' '. $gradelevel.' '.$subject.' '.$schoolyear);
        $grades = Grade::where(['student_id' => $studId, 'subjects' => $subject, 'school_year' => $schoolyear])->get();
        $catch = Grade::where(['student_id' => $studId, 'subjects' => $subject, 'school_year' => $schoolyear])->exists();
        // dd($grades);

        if($catch){
            foreach ($grades as $grade) {
                $id = $grade->id;
            }
            return view('components.adviser.subjects.add-grade', compact('schoolyear', 'gradelevel', 'section', 'subject', 'LRN', 'id', 'grades', 'studId'), ['nav' => 'teacher-subjects']);
        }else{
            Alert::toast('This student is irregular and is not taking the subject!', 'warning');
            return back();
        }


    }

    //update the grade of the student
    private function gradeValidate()
    {
        return request()->validate([
            'LRN' => 'required',
            'subjects' => 'required',
            'firstGrading' => '',
            'secondGrading' => '',
            'thirdGrading' => '',
            'fourthGrading' => '',
            'finalGrade' => '',
            'school_year' => ''
        ]);
    }
    public function saveGrade($studId, $LRN, $section, $gradelevel, $subject, $schoolyear, $id)
    {
        // dd($LRN);

        $grade = $this->gradeValidate();

        if ($grade['firstGrading'] != null && $grade['secondGrading'] != null && $grade['thirdGrading'] != null && $grade['fourthGrading'] != null) {
            Grade::where(['student_id' => $studId, 'LRN' => $LRN, 'subjects' => $subject, 'school_year' => $schoolyear])->update($grade);

            $finalGrade = ($grade['firstGrading'] + $grade['secondGrading'] + $grade['thirdGrading'] + $grade['fourthGrading']) / 4;
            Grade::where(['student_id' => $studId, 'LRN' => $LRN, 'subjects' => $subject, 'school_year' => $schoolyear])->update(['finalGrade' => $finalGrade]);
            $grades = Grade::where(['student_id' => $studId, 'LRN' => $LRN, 'subjects' => $subject, 'school_year' => $schoolyear])->get();
            // Alert::toast('Grade Added successfully!', 'success');
            // return redirect()->view('components.adviser.subjects.add-grade', compact('schoolyear', 'gradelevel', 'section', 'subject', 'LRN', 'id', 'grades', 'finalGrade'), ['nav' => 'teacher-subjects'])->with('message', 'Successfully added!');
            return redirect()->back()->with('message', 'Successfully added!', compact('schoolyear', 'gradelevel', 'section', 'subject', 'LRN', 'id', 'grades', 'finalGrade'), ['nav' => 'teacher-subjects']);
        } else {
            Grade::where(['student_id' => $studId, 'LRN' => $LRN, 'subjects' => $subject, 'school_year' => $schoolyear])->update($grade);
            Grade::where(['student_id' => $studId, 'LRN' => $LRN, 'subjects' => $subject, 'school_year' => $schoolyear])->update(['finalGrade' => NULL]);
            $grades = Grade::where(['student_id' => $studId, 'LRN' => $LRN, 'subjects' => $subject, 'school_year' => $schoolyear])->get();
            // Alert::toast('Grade Added successfully!', 'success');
            // return view('components.adviser.subjects.add-grade', compact('schoolyear', 'gradelevel', 'section', 'subject', 'LRN', 'id', 'grades'), ['nav' => 'teacher-subjects'])->with('message', 'Successfully added!');
            return redirect()->back()->with('message', 'Successfully added!', compact('schoolyear', 'gradelevel', 'section', 'subject', 'LRN', 'id', 'grades'), ['nav' => 'teacher-subjects']);
        }
    }


    public function adviserSched($schoolyear)
    {
        // dd($schoolyear);
        $users = User::where(['id' => Auth::user()->id])->get();
        foreach ($users as $user) {
            $name = $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname;
        }
        $schedules = Schedule::where(['teacher' => $name, 'school_year' => $schoolyear])->get();
        return view('components.adviser.teacher-schedule', compact('schedules', 'schoolyear'), ['nav' => 'teacher-schedule']);
    }

    public function showNonadvisorySub($schoolyear)
    {
        $firstname = Auth::user()->firstname;
        $lastname = Auth::user()->lastname;

        $dashboards = User::where(['firstname' => $firstname, 'lastname' => $lastname, 'school_year' => $schoolyear])->get();
        $dashes = User::where(['firstname' => $firstname, 'lastname' => $lastname, 'school_year' => $schoolyear])->exists();
        if ($dashes) {
            foreach ($dashboards as $dash) {
                if ($dash->role == 'adviser') {
                    $advisory = Section::where(['teacher_id' => $dash->id, 'school_year' => $schoolyear])->get();
                    foreach ($advisory as $ad) {
                        $secid = $ad->id;
                    }
                    $male = Admission::where(['gender' => 'Male', 'section' => $secid, 'school_year' => $schoolyear])->count();
                    $female = Admission::where(['gender' => 'Female', 'section' => $secid, 'school_year' => $schoolyear])->count();
                    $regular = Admission::where(['type' => NULL, 'section' => $secid, 'school_year' => $schoolyear])->count();
                    $irregular = Admission::where(['type' => 'irregular', 'section' => $secid, 'school_year' => $schoolyear])->count();

                    return view('components.adviser.adviser_dashboard', compact('advisory', 'schoolyear', 'male', 'female', 'regular', 'irregular'), ['nav' => 'adviser_dashboard']);
                } elseif ($dash->role == 'none-adviser') {
                    $users = User::where(['id' => $dash->id, 'school_year' => $schoolyear])->get();
                    foreach ($users as $user) {
                        $name = $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname;
                    }
                    $sections = Schedule::where(['teacher' => $name, 'school_year' => $schoolyear])->get();
                    $schoolyears = SchoolYear::all();
                    return view('components.none-advisory.non_advisory', compact('sections', 'schoolyear', 'schoolyears'), ['nav' => 'non_advisory']);
                }
            }
        } else {
            $adviser = Auth::user()->id;
            $advisory = Section::where(['teacher_id' => $adviser])->get();
            $schoolyear = SchoolYear::all();
            // view('components.layouts.adviser-layout', compact('schoolyear', 'advisory'));
            Alert::toast('The teacher is not registered in this schoolyear!', 'warning');
            return view('components.none-advisory.schoolyear', compact('schoolyear', 'advisory'));
        }
    }

    public function noneadviserStudentList($gradelevel, $section, $subject, $schoolyear)
    {
        $secIDs = Section::where(['section_name' => $section, 'school_year' => $schoolyear])->get();
        foreach ($secIDs as $sec) {
            $secid = $sec->id;
        }

        $students = Admission::where(['gradeLevel' => $gradelevel, 'section' => $secid, 'school_year' => $schoolyear])->get();

        $users = User::where(['id' => Auth::user()->id])->get();
        foreach ($users as $user) {
            $name = $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname;
        }
        // dd($schoolyear);, 'subject'=>$subject, 'school_year'=>$schoolyear 'section'=>$secid, 'gradeLevel'=>$gradelevel
        $schedules = Schedule::where(['teacher' => $name, 'subject' => $subject, 'school_year' => $schoolyear, 'section' => $section, 'gradeLevel' => $gradelevel])->get();
        return view('components.none-advisory.students', compact('students', 'schoolyear', 'gradelevel', 'section', 'subject', 'schedules'), ['nav' => 'non_advisory']);
    }

    public function nonadviseraddGrade($studentid, $LRN, $section, $gradelevel, $subject, $schoolyear)
    {
        // dd($LRN.' '. $section.' '. $gradelevel.' '.$subject.' '.$schoolyear);
        $grades = Grade::where(['student_id' => $studentid, 'subjects' => $subject, 'school_year' => $schoolyear])->get();
        $catch = Grade::where(['student_id' => $studentid, 'subjects' => $subject, 'school_year' => $schoolyear])->exists();

        if($catch){
            foreach ($grades as $grade) {
                $id = $grade->id;
            }
            return view('components.none-advisory.addgrade', compact('schoolyear', 'gradelevel', 'section', 'subject', 'LRN', 'id', 'grades', 'studentid'), ['nav' => 'non_advisory']);
        }else{
            Alert::toast('This student is irregular and is not taking the subject!', 'warning');
            return back();
        }

    }

    public function nonadvisersaveGrade(Request $request, $nonstudentid, $LRN, $section, $gradelevel, $subject, $schoolyear, $id)
    {
        $grade = $this->gradeValidate();
        if ($grade['firstGrading'] != null && $grade['secondGrading'] != null && $grade['thirdGrading'] != null && $grade['fourthGrading'] != null) {
            Grade::where(['student_id' => $nonstudentid, 'LRN' => $LRN, 'subjects' => $subject, 'school_year' => $schoolyear])->update($grade);

            $finalGrade = ($grade['firstGrading'] + $grade['secondGrading'] + $grade['thirdGrading'] + $grade['fourthGrading']) / 4;
            Grade::where(['student_id' => $nonstudentid, 'LRN' => $LRN, 'subjects' => $subject, 'school_year' => $schoolyear])->update(['finalGrade' => $finalGrade]);
            $grades = Grade::where(['LRN' => $LRN, 'subjects' => $subject, 'school_year' => $schoolyear])->get();
            return redirect()->back()->with('message', 'Successfully added!', compact('schoolyear', 'gradelevel', 'section', 'subject', 'LRN', 'id', 'grades', 'finalGrade'), ['nav' => 'teacher-subjects']);
            // return view('components.none-advisory.addgrade', compact('schoolyear', 'gradelevel', 'section', 'subject', 'LRN', 'id', 'grades', 'finalGrade'), ['nav' => 'subjects']);
        } else {
            Grade::where(['student_id' => $nonstudentid, 'LRN' => $LRN, 'subjects' => $subject, 'school_year' => $schoolyear])->update($grade);
            Grade::where(['student_id' => $nonstudentid, 'LRN' => $LRN, 'subjects' => $subject, 'school_year' => $schoolyear])->update(['finalGrade' => NULL]);
            $grades = Grade::where(['LRN' => $LRN, 'subjects' => $subject, 'school_year' => $schoolyear])->get();
            return redirect()->back()->with('message', 'Successfully added!', compact('schoolyear', 'gradelevel', 'section', 'subject', 'LRN', 'id', 'grades'), ['nav' => 'teacher-subjects']);
            // return view('components.none-advisory.addgrade', compact('schoolyear', 'gradelevel', 'section', 'subject', 'LRN', 'id', 'grades'), ['nav' => 'subjects']);
        }

        // return view('components.none-advisory.addgrade', compact('schoolyear', 'gradelevel', 'section', 'subject', 'LRN', 'id', 'grades'), ['nav' => 'non_advisory']);
    }

    public function nonadviserSched($schoolyear)
    {
        $users = User::where(['id' => Auth::user()->id])->get();
        foreach ($users as $user) {
            $name = $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname;
        }
        $schedules = Schedule::where(['teacher' => $name, 'school_year' => $schoolyear])->get();
        return view('components.none-advisory.subject_teacher_schedule', compact('schedules', 'schoolyear'), ['nav' => 'subject_teacher_schedule']);
    }

    private function studentDetails()
    {
        return request()->validate([
            'PSA_num'         => 'required|admissions,PSA_num|digits:12',
            'LRN'             => 'required|admissions,LRN|digits:12',
            'average'         => 'required|digits:2|numeric',
            'lastname'        => 'required|min:2|alpha',
            'firstname'       => 'required|alpha',
            'middlename'      => 'required|alpha|min:2',
            'date_of_birth'   => 'required',
            'age'             => 'required|numeric',
            'gender'          => 'required',
            'IPC'             => 'required',
            'motherTongue'    => 'required',
            'contact_number'  => 'required|digits:11|numeric',
            'address'         => 'required',
            'zipcode'         => 'required|numeric|digits:4',
            'father_name'     => 'required|alpha',
            'mother_name'     => 'required|alpha',
            'guardian'        => 'required|alpha',
            'guardian_contact_number' => 'required|digits:11|numeric',
            'status' => '',
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

    public function updateStudent(Request $request, $LRN, $schoolyear)
    {
        $data = $this->studentDetails();

        dd($data['LRN']);
        exit();
        $students = Admission::where(['LRN' => $LRN, 'school_year' => $schoolyear])->get();
        foreach ($students as $stud) {
            $section = $stud->section;
        }
        $sectionNames = Section::where(['id' => $section])->get();
        foreach ($sectionNames as $sec) {
            $section = $sec->section_name;
        }
        Admission::where(['LRN' => $LRN, 'school_year' => $schoolyear])->update($data);
        $students = Admission::where(['LRN' => $LRN, 'school_year' => $schoolyear])->get();
        Alert::toast('Student Details Updated  Successfully!', 'success');
        return view('components.admin.section.student-details', compact('students', 'schoolyear', 'LRN', 'section'), ['nav' => 'students']);
    }
}
