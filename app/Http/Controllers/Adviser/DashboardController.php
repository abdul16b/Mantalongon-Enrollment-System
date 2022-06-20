<?php

namespace App\Http\Controllers\Adviser;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\User;
use App\Models\SchoolYear;
use App\Models\Schedule;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Admits;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::check()) {
            $adviser = Auth::user()->id;
            $advisory = Section::where(['teacher_id' => $adviser])->get();
            $schoolyear = SchoolYear::all();
            // view('components.layouts.adviser-layout', compact('schoolyear', 'advisory'));
            return view('components.adviser.schoolyear', compact('schoolyear', 'advisory'));
        } else {
            return '/login';
        }
    }

    public function show($schoolyear)
    {
        $firstname = Auth::user()->firstname;
        $lastname = Auth::user()->lastname;

        $dashboards = User::where(['firstname' => $firstname, 'lastname' => $lastname, 'school_year' => $schoolyear])->get();
        $dashs = User::where(['firstname' => $firstname, 'lastname' => $lastname, 'school_year' => $schoolyear])->exists();
        if ($dashs) {
            foreach ($dashboards as $dash) {
                if ($dash->role == 'adviser') {
                    // $adviser = Auth::user()->id;
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
                    return view('components.none-advisory.non_advisory', compact('sections', 'schoolyear', 'schoolyears'), ['nav' => 'subjects']);
                }
            }
        }else {
            $adviser = Auth::user()->id;
            $advisory = Section::where(['teacher_id' => $adviser])->get();
            $schoolyear = SchoolYear::all();
            // view('components.layouts.adviser-layout', compact('schoolyear', 'advisory'));
            Alert::toast('The teacher is not registered in this schoolyear!', 'warning');
            return view('components.adviser.schoolyear', compact('schoolyear', 'advisory'));
        }
    }
}
