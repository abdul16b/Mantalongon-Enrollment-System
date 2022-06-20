<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Teacher;
use App\Models\Section;
use App\Models\User;
use App\Models\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\SchoolYear;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TeachersController extends Controller
{
    //Data validation in private function
    private function validateRequest()
    {

        return request()->validate([
            'lastname'      => 'required|min:2',
            'firstname'     => 'required|min:2',
            'middlename'    => 'required',
            'address'       => 'required',
            'contact'       => 'required|unique:users,contact|numeric|digits:11',
            'dateofbirth'   => 'required',
            'sex'           => 'required',
            'civilstatus'   => 'required',
            'status'        => 'required',
            'username'      => 'required',
            'password'      => 'required',
            'section_id'    => '',
            'school_year'   => 'required',
            'role'          => 'required'
        ]);
    }

    private function updateValidate()
    {

        return request()->validate([
            'lastname'      => 'required|min:2',
            'firstname'     => 'required|min:2',
            'middlename'    => 'required',
            'address'       => 'required',
            'contact'       => 'required|digits:11',
            'dateofbirth'   => 'required',
            'sex'           => 'required',
            'civilstatus'   => 'required',
            'status'        => 'required',
            'username'      => 'required',
            'password'      => 'required',
            'section_id'    => '',
            'school_year'   => 'required',
            'role'          => 'required'
        ]);
    }

    //Display all of the data from database in none-advisory-teacher
    public function index()
    {
        $schoolyears = SchoolYear::all();
        return view('components.admin.teachers.schoolyear', compact('schoolyears'), ['nav' => 'teachers']);
    }

    //Fetching data using Ajax
    public function getSection(Request $request)
    {
        $sections = DB::table("sections")->where("gradelevel", $request->section)
            ->pluck("name", "id");
        return response()->json($sections);
    }


    public function store($schoolyear)
    {

        $user1 = $this->validateRequest();

        $now = Carbon::now();
        $userDob = Carbon::parse($user1['dateofbirth']);
        if (User::where(['firstname' => $user1['firstname'], 'lastname' => $user1['lastname'], 'school_year' => $user1['school_year']])->exists()) {
            // dd([$user1['firstname']]);
            return redirect()->back()->with('message', 'Teacher is already admitted in the specified School Year!')->with('schoolyear', $schoolyear);
        } else {
            // echo 'data is new!'
            $password = Hash::make($user1['password']);
            $user = User::create($user1)->id;
            User::where('id', $user)->update(['password' => $password]);
            $teachers = User::where(['school_year' => $schoolyear])->get();
            Alert::toast('Teacher added successfully!', 'success');
            return view('components.admin.teachers', compact('teachers', 'schoolyear'), ['nav' => 'teachers']);
        }
    }


    public function show(User $teacher)
    {
        $sections = Section::all();
        return view('components.admin.teachers.teacher-information', compact('teacher', 'sections'), ['nav' => 'teachers']);
    }


    public function resetPassword(User $teacher)
    {

        // $data = $this->infoRequest();

        $password = Hash::make($teacher->username);
        // dd($password);
        // $teacher->update($data);
        User::where('id', $teacher->id)->update(['password' => $password]);
        // $sections = Section::all();
        Alert::toast('Password reset successfully into default password (lastname + first 2 letters of firstname)', 'success');
        return view('components.admin.teachers.teacher-information', compact('teacher'), ['nav' => 'teachers']);
        // return redirect()->action([TeachersController::class, 'index'])->with( 'success', 'Updated Successfully!');

    }

    public function update(User $teacher)
    {

        $data = $this->updateValidate();
        $teacher->update($data);
        Alert::toast('Teacher Information updated succcessfully!', 'success');
        return view('components.admin.teachers.teacher-information', compact('teacher'), ['nav' => 'teachers']);
    }

    //For Displaying teachers files into admin side
    public function displayFiles($id, $schoolyear)
    {
        $files = File::where('user_id', $id)->get();
        return view('components.admin.teachers.teacher-files', compact('files', 'schoolyear', 'id'), ['nav' => 'teachers']);
    }

    //View the files of the teachers................
    public function viewteacherFile($id)
    {

        $file = File::where('id', '=', $id)->get();
        return view('components.admin.teachers.viewfile', compact('file'));
    }

    public function showTeachers()
    {
        $teachers = User::all();
        return view('components.admin.schedule', compact('teachers'), ['nav' => 'schedule']);
    }

    public function showTeacherLists($schoolyear)
    {
        $teachers = User::where(['school_year' => $schoolyear])->get();
        return view('components.admin.teachers', compact('teachers', 'schoolyear'), ['nav' => 'teachers']);
    }

}
