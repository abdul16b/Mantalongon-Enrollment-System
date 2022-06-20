<?php

namespace App\Http\Controllers\NonAdvisory;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\User;
use App\Models\SchoolYear;
use App\Models\Schedule;

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
            return view('components.none-advisory.schoolyear', compact('schoolyear', 'advisory'));
        } else {
            return '/login';
        }
    }
}
