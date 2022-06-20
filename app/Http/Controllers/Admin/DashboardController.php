<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\SchoolYear;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::check()) {


            // $schoolyear = SchoolYear::select(DB::raw("SUM(male)"));

            // $schoolyears = SchoolYear::all();
            // $schoolyears = Admission::select('school_year')->groupBy('school_year')->get();
            // $count = Admission::select(DB::raw('count(id) as count'))->orderBy("school_year")->groupBy('school_year')->get()->toArray();
            // $count = array_column($count, 'count');
            // dd(json_encode($count));
            // exit();


            $schoolyears = SchoolYear::select(DB::raw('schoolyear'))->get();
            $schoolyear = array();
            foreach ($schoolyears as $year) {
                $schoolyear[] = $year;
            }

            $count = Admission::select(DB::raw('count(id) as count'))->orderBy("school_year")->groupBy('school_year')->get()->toArray();
            $count = array_column($count, 'count');
            $males = Admission::where(['gender' => 'Male'])->count();
            $females = Admission::where(['gender' => 'Female'])->count();
            $regular = Admission::where(['type' => NULL])->count();
            $irregular = Admission::where(['type' => 'irregular'])->count();
            $adviser = User::where(['role'=>'adviser'])->count();
            $nonadviser = User::where(['role'=>'none-adviser'])->count();

            return view('components.admin.admin-dashboard', compact('males', 'females', 'adviser','nonadviser', 'regular', 'irregular'), ['nav' => 'admin-dashboard'])->with('schoolyear', json_encode($schoolyear))->with('count', json_encode($count));
        } else {
            return '/login';
        }
    }
}
