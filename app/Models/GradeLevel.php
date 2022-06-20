<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade_level',
    ];

    public function subject(){
        return $this->hasMany(Subject::class);
    }

    public function section(){
        return $this->hasMany(Section::class);
    }

    public function adviser(){
        return $this->hasOne(Teacher::class);
    }
}
