<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use App\Models\Subject;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GradeLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $gradeLevel = GradeLevel::all();
        $subject = Subject::all();
        return view('components.admin.subjects',['nav' => 'subjects'])->with('grade_levels', $gradeLevel)->with('subjects', $subject);
    }

    public function store(Request $request)
    {

        $subject_name = $request->input('subject');
        $level_id = $request->input('level');

        $subject = new Subject;
        $subject->subjectname = $subject_name;
        $subject->grade_id = $level_id;

        $subject->save();
return back();

    }

    public function levels(){
        //fetch all grade levels
        $levelData['data'] = GradeLevel::orderby('name')
            ->select('id','grade_level') -> get();
    }

    public function getSection($gradeLevelid = 0){
        //fetch the sections per year level
        $empData['data'] = Section::orderby('section_name')
            ->select('id','section_name')->where('grade_level',$gradeLevelid)->get();
        
        return response()->json($empData);
    }


}
