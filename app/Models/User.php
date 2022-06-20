<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $guarded = [];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relation
    public function section(){

        return $this->belongsTo(Section::class);
    }

    public function getStatusAttribute($attribute){

        return $this->statusOptions()[$attribute];
    }

    public function getSexAttribute($attribute){

        return $this->sexOptions()[$attribute];
    }

    public function getCivilstatusAttribute($attribute){

        return $this->civilstatusOptions()[$attribute];
    }

    public function getGradelevelAttribute($attribute){

        return $this->gradelevelOptions()[$attribute];
    }

    // public function getRoleAttribute($attribute){

    //     return $this->roleOptions()[$attribute];
    // }

    // public function roleOptions(){
    //     return [
    //         1 => 'None-Adviser',
    //         2 => 'Adviser',
    //         3 => 'Admin',
    //     ];
    // }

    public function statusOptions(){

        return [
            1 => 'Active',
            0 => 'Inactive'
        ];
    }

    public function sexOptions(){

        return [
            1 => 'Male',
            0 => 'Female'
        ];
    }

    public function civilstatusOptions(){

        return [
            0 => 'Married',
            1 => 'Widowed',
            2 => 'Separated',
            3 => 'Divorce',
            4 => 'Single'
        ];
    }

    public function gradelevelOptions(){

        return [
            7 => '7',
            8 => '8',
            9 => '9',
            10 => '10',
            11 => '11',
            12 => '12'
        ];
    }

}
