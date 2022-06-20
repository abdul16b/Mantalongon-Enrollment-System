<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admits extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'LRN',
        'gradeLevel',
        'section',
        'type',
        'school_year',
        'specialization',
        'last_schoolname_attended',
        'last_school_address',
        'subjects'
    ];

    protected $casts = [
        'subjects' => 'array'
    ];
// public function adviser(){
    //     return $this->hasMany(Teacher::class);
    // }

    // public function section(){
    //     return $this->hasOne(Section::class);
    // }

    // public function subject(){
    //     return $this->hasMany(Subject::class);
    // }

    public function section(){
        return $this->belongsTo(Section::class,  'section');
    }
}
