<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GradeLevel;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sections(){
        return $this->belongsToMany(Section::class, 'section_subject','')->withTimestamps();
    }

}
