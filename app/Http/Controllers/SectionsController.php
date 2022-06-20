<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Section;
use App\Models\Admission;
use App\Models\Admits;
use App\Models\Subject;
use App\Models\Grade;
use App\Models\SchoolYear;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use RealRashid\SweetAlert\Facades\Alert;


class SectionsController extends Controller
{
    private function validateRequest()
    {

        return request()->validate([
            // 'section_id'        => 'required',
            'teacher_id'        => 'required',
            'grade_level'       => 'required',
            'capacity'          => '',
            'section_name'      => 'required',
            'school_year'       => 'required'
        ]);
    }

    private function validateSchoolyear()
    {
        return request()->validate([
            'schoolyear'        => 'required'
        ]);
    }

    public function index(Section $section, $id, $year)
    {
        $students = Admission::where(['section' => $id, 'type' => NULL, 'school_year' => $year])->get();
        $irregulars = Admits::where(['type' => 'irregular', 'school_year' => $year]);
        $names = Admission::all();
        $count = $students->count();

        $ircount = $irregulars->count();
        $schoolyear = SchoolYear::all();
        $sections = Section::where(['id' => $id])->get();
        $teachers = User::where(['section_id' => $id])->get();
        return view('components.admin.section.junior-section', compact('sections', 'students', 'names', 'count', 'irregulars', 'schoolyear', 'teachers', 'year'), ['nav' => 'junior']);
    }

    public function show(Section $section, $schoolyear)
    {
        // dd($schoolyear);
        // $grade = Section::where('grade_level' , '9')->get();
        $teachers = User::where(['role' => 'none-adviser', 'school_year' => $schoolyear, 'status' => '1'])->get();
        $advisers = User::where('role', 'adviser')->get();
        $sections = Section::where(['school_year' => $schoolyear])->get();
        $students = Admits::where(['section' => $section->id, 'type' => NULL, 'school_year' => $schoolyear])->get();
        $irregulars = Admission::where(['type' => 'irregular', 'school_year' => $schoolyear])->get();
        $names = Admission::all();
        $count = $students->count();
        return view('components.admin.junior', compact('advisers', 'teachers', 'sections', 'section', 'students', 'names', 'count', 'irregulars', 'schoolyear'), ['nav' => 'junior'])->with('schoolyear', $schoolyear);
    }

    public function create($schoolyear)
    {

        $data = $this->validateRequest();
        $schoolyear = $data['school_year'];
        $gradelevel = $data['grade_level'];
        $section = $data['section_name'];
        $section_id = Section::create($data)->id;

        $subjects = Subject::where('gradelevel', $gradelevel)->get();
        foreach ($subjects as $subject) {
            DB::table('section_subject')->insert(['section_id' => $section_id, 'subject_id' => $subject->id, 'subjectname' => $subject->subjectname]);
            DB::table('schedules')->insert(['gradeLevel' => $gradelevel, 'subject' => $subject->subjectname, 'section' => $section, 'section_id' => $section_id, 'school_year' => $schoolyear]);
        }


        User::where('id', $data['teacher_id'])->update(['section_id' => $section_id, 'role' => 'adviser']);
        $teachers = User::where('role', 'none-adviser')->get();
        $sections = Section::where(['schoolyear' => $schoolyear]);
        $irregulars = Admits::where(['type' => 'irregular']);

        Alert::toast('Section created successfully!', 'success');
        return back();
    }

    public function update(Request $request, $id)
    {
        $adviser = "adviser";
        $none_adviser = "none-adviser";
        User::where('id', '=', $request->old_teacher)->update(['role' => $none_adviser, 'section_id' => null]);
        Section::where('id', $id)->update(['teacher_id' => $request->teacher, 'capacity' => $request->capacity, 'section_name' => $request->section_name]);

        User::where('id', $request->teacher)->update(['role' => $adviser, 'section_id' => $request->section_id]);
        return back();
    }

    public function schedule(Section $section, $schoolyear)
    {
        $subjects = DB::table('section_subject')->where('section_id', $section->id)->get();
        $subjectSched = DB::table('schedules')->where('section_id', $section->id)->where('school_year', $schoolyear)->get();


        $teachers = User::where(['school_year' => $schoolyear, 'status' => '1']);
        return view('components.admin.section.schedule-section', compact('section', 'subjectSched', 'teachers', 'schoolyear'), ['nav' => 'junior']);
    }


    public function students($section)
    {
        $students = Admits::where('section_id', $section)->get();

        if (Auth::user()->role == 'adviser') {

            return view('components.adviser.subjects.students-list', compact('students'), ['nav' => 'teacher-subjects']);
        } elseif (Auth::user()->role == 'none-adviser') {
            return view('components.adviser.subjects.students-list', compact('students'), ['nav' => 'teacher-subjects']);
        }
    }

    public function studentDetails($id, $LRN, $schoolyear)
    {
        $students = Admission::where('id', $id)->get();
        foreach ($students as $stud) {
            $section = $stud->section;
        }
        $sectionNames = Section::where('id', $section)->get();
        foreach ($sectionNames as $sec) {
            $section = $sec->section_name;

            return view('components.admin.section.student-details', compact('students', 'section', 'schoolyear'), ['nav' => 'student-list']);
        }
    }

    public function irregularstudentDetails($id, $LRN, $schoolyear)
    {
        $students = Admission::where('id', $id)->get();
        foreach ($students as $stud) {
            $section = $stud->section;
        }
        $sectionNames = Section::where(['id' => $section])->get();
        foreach ($sectionNames as $sec) {
            $section = $sec->section_name;
        }
        return view('components.admin.irregular.student-details', compact('students', 'section', 'schoolyear'), ['nav' => 'junior']);
    }

    // public function studentsectiondetails($id, $LRN, $schoolyear)
    // {
    //     $students = Admission::where(['id' => $id])->get();
    //     $sections = Section::where(['id' => $students['section']])->get();
    //     foreach ($students as $stud) {
    //         $section = $stud->section;
    //     }
    //     $sectionNames = Section::where(['id' => $section])->get();
    //     foreach ($sectionNames as $sec) {
    //         $section = $sec->section_name;
    //     }
    //     return view('components.admin.students.section-student-details', compact('students', 'schoolyear', 'LRN', 'section'), ['nav' => 'junior']);
    // }

    //FOR SCHOOL YEAR FUNCTIONS...............................
    public function schoolYear()
    {
        $schoolyear = SchoolYear::all();
        return view('components.admin.schoolyear', compact('schoolyear'), ['nav' => 'junior']);
    }

    // This function is to add school Add
    public function add()
    {
        $data = $this->validateSchoolyear();
        if (SchoolYear::where('schoolyear', '=', $data['schoolyear'])->exists()) {
            // schoolyear found
            Alert::toast('School Year already exists!', 'warning');
            return back();
        } else {
            SchoolYear::create($data);
            Alert::toast('School Year Added Successfully!', 'success');
            return back();
        }
    }

    public function reportcard($id, $LRN, $teacher)
    {
        $admissions = Admission::where('id', $id)->get();
        foreach ($admissions as $admit) {
            $sectionid = $admit->section;
            $specialization = $admit->specialization;
        }

        $section = Section::where(['id' => $sectionid])->get();
        foreach ($section as $sec) {
            $section_name = $sec->section_name;
        }

        $admits = Admits::where('LRN', $LRN)->get();
        $grades = Grade::where('student_id', $id)->get();

        $gradecount = Grade::where('student_id', $id)->where('finalGrade', '!=', NULL)->count();
        $sum = 0;
        foreach ($grades as $grade) {
            $sum += $grade->finalGrade;
        }
        if ($gradecount != 0) {
             $general= $sum / $gradecount;
             $genave = round($general, 2);
            return view('components.admin.section.jr-report-card', compact('admissions', 'grades', 'teacher', 'admits', 'section_name', 'genave', 'specialization'));
        } else {
            $genave = 0;
            return view('components.admin.section.jr-report-card', compact('admissions', 'grades', 'teacher', 'admits', 'section_name', 'genave', 'specialization'));
        }
    }

    public function adminreportcard($LRN,  $schoolyear, $id)
    {
        // dd($id);
        // $admissions = Admission::where(['id'=>$id, 'LRN'=> $LRN, 'school_year'=>$schoolyear])->get();
        $admissions = Admission::where(['id' => $id])->get();
        foreach ($admissions as $admit) {
            $sectionid = $admit->section;
            $specialization = $admit->specialization;
        }
        $section = Section::where(['id' => $sectionid])->get();
        foreach ($section as $sec) {
            $teacherid = $sec->teacher_id;
            $section_name = $sec->section_name;
        }

        $teachers = User::where(['id' => $teacherid])->get();
        foreach ($teachers as $teach) {
            $teacher = $teach->firstname . ' ' . $teach->lastname;
        }

        $grades = Grade::where(['student_id' => $id])->get();
        $admits = Admits::where('LRN', $LRN)->get();
        $gradecount = Grade::where('student_id', $id)->where('finalGrade', '!=', NULL)->count();
        $sum = 0;
        foreach ($grades as $grade) {
            $sum += $grade->finalGrade;
        }
        if ($gradecount != 0) {
            $general= $sum / $gradecount;
             $genave = round($general, 2);
            return view('components.admin.section.jr-report-card', compact('admissions', 'grades', 'teacher', 'admits', 'section_name', 'genave', 'specialization'));
        } else {
            $genave = 0;
            return view('components.admin.section.jr-report-card', compact('admissions', 'grades', 'teacher', 'admits', 'section_name', 'genave', 'specialization'));
        }
    }

    public function irreportcard($id, $LRN, $sectionid, $schoolyear)
    {
        // dd($LRN.' '.$sectionid);
        $admissions = Admission::where('id', $id)->get();
        foreach ($admissions as $admit) {
            $sectionid = $admit->section;
            $specialization = $admit->specialization;
        }

        $section = Section::where(['id' => $sectionid])->get();
        foreach ($section as $sec) {
            $teacherid = $sec->teacher_id;
            $section_name = $sec->section_name;
        }


        $teachers = User::where(['id' => $teacherid])->get();
        foreach ($teachers as $teach) {
            $teacher = $teach->firstname . ' ' . $teach->lastname;
        }

        $admits = Admits::where('LRN', $LRN)->get();
        $grades = Grade::where(['student_id' => $id])->get();

        $gradecount = Grade::where('student_id', $id)->where('finalGrade', '!=', NULL)->count();
        $sum = 0;
        foreach ($grades as $grade) {
            $sum += $grade->finalGrade;
        }
        if ($gradecount != 0) {
            $general= $sum / $gradecount;
             $genave = round($general, 2);
            return view('components.admin.section.jr-report-card', compact('admissions', 'grades', 'teacher', 'admits', 'section_name', 'genave', 'specialization'));
        } else {
            $genave = 0;
            return view('components.admin.section.jr-report-card', compact('admissions', 'grades', 'teacher', 'admits', 'section_name', 'genave'));
        }
    }
}
