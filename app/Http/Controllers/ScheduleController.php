<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Section;
use Dompdf\Dompdf;
use PDF;

class ScheduleController extends Controller
{
    //create schedule
    public function index()
    {
        return view('components.admin.schedule', ['nav' => 'schedule']);
    }

    //view schedule per teacher
    public function viewSched($id, $name, $schoolyear)
    {
        $schedule = DB::table('schedules')->where('teacher', '=', $name)->get();
        return view('components.admin.schedule.teacher-schedule', ['schedules' => $schedule], ['nav' => 'teacher-schedule'])->with('id', $id)->with('name', $name)->with('schoolyear',$schoolyear);
    }




    //add schedule
    public function store($name, $id)
    {
        $data = request()->validate([
            'teacher' => 'required',
            'gradeLevel' => 'required',
            'section' => 'required',
            'subject' => 'required',
            'startTime' => 'required',
            'endTime' => 'required',
            'days' => 'required'
        ]);

        $x = Schedule::create($data);
        // $teachers = User::all();
        // $schedule = DB::table('schedules')->where('teacher_id','=',$id)->get();
        // return view('components.admin.section.schedule-section', compact('section', 'subjects', 'teachers') ,['nav' =>'junior']);
    }

    //delete schedule

    public function destroy($id, $name, $teacherID)
    {

        Schedule::findOrFail($id)->delete();
        $schedule = DB::table('schedules')->where('teacherID', '=', $teacherID)->get();
        return view('components.admin.schedule.teacher-schedule', ['schedules' => $schedule], ['nav' => 'teacher-schedule'])->with('name', $name)->with('id', $teacherID);
    }

    //edit schedule
    public function edit($id, $gradeLevel, $subject, $schoolyear)
    {
        $schedules = DB::table('schedules')->where('id', '=', $id)->get();
        $teachers = User::where(['school_year'=>$schoolyear, 'status'=>'1'])->get();
        return view('components.admin.schedule.editSchedule', compact('schedules', 'teachers'), ['nav' => 'editSchedule'])
            ->with('schedule_id', $id)
            ->with('subject', $subject)
            ->with('gradeLevel', $gradeLevel)
            ->with('schoolyear', $schoolyear);
    }


    //update schedule
    public function update(Request $request, Section $section, $schedID, $id)
    {
        $data = $request->validate([
            'teacher' => '',
            'gradeLevel' => 'required',
            'section' => 'required',
            'subject' => 'required',
            'startTime' => '',
            'endTime' => '',
            'days' => '',
            'school_year' => '',
        ]);

        $start = $data['startTime'];
        $end = $data['endTime'];
        $startTime = date('h:i A', strtotime($start));
        $endTime = date('h:i A' , strtotime($end));
        // dd( $startTime . " " . $endTime);

        $schedule = Schedule::find($schedID);
        $schedule->teacher = $request->get('teacher');
        $schedule->gradeLevel = $request->get('gradeLevel');
        $schedule->section = $request->get('section');
        $schedule->subject = $request->get('subject');
        $schedule->startTime =  $startTime;
        $schedule->endTime = $endTime;
        $schedule->days = $request->get('days');
        $schedule->school_year = $request->get('school_year');
        $schedule->save();
        echo '<script type="text/javascript">', 'history.go(-2);', '</script>';
    }




}
