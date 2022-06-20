<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'PSA_num',
        'LRN',
        'average',
        'lastname',
        'firstname',
        'middlename',
        'date_of_birth',
        'age',
        'gender',
        'IPC',
        'motherTongue',
        'contact_number',
        'address',
        'zipcode',
        'father_name',
        'mother_name',
        'guardian',
        'guardian_contact_number',
        'status',
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

    public function admission(){
        return $this->belongsTo(Section::class);
    }
}
