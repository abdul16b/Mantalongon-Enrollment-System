<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'grade_level',
        'teacher_id',
        'grade_level',
        'capacity',
        'section_name',
        'school_year'
    ];


    public function teachers(){

        return $this->hasMany(Teacher::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class, 'section_subject')->withTimestamps();
    }


    public function admissions(){
        return $this->hasMany(Admission::class);
    }
    
    public function admits(){
        return $this->hasMany(Admits::class);
    }
}
