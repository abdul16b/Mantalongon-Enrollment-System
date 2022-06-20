<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'LRN'    ,
        'student_id',
        'subjects'    ,
        'firstGrading'     ,
        'secondGrading'     ,
        'thirdGrading'     ,
        'fourthGrading'     ,
        'finalGrade'     ,
        'school_year'
    ];
}
