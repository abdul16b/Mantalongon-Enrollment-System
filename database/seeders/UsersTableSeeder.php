<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{


    public function run() {
        DB::table('users')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('users')->insert(
         [
          'lastname' => 'Administrator',
          'firstname' => 'Admin',
          'middlename' => 'Admin',
          'address' => 'Dalaguete, Cebu',
          'contact' => '09385839685',
          'sex' => '1',
          'dateofbirth' => '2007-02-18',
          'civilstatus' => '1',
          'status' => '1',
          'section_id' => '0',
          'school_year' => '2020-2021',
          'username' => 'administrator',
          'password' => Hash::make('password'),
          'role' => 'admin',
        ]);

      }
}
