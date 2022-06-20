<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
    ];
}
