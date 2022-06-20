<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminUserController extends Controller
{
    public function adminUser(){
        $admins = User::where('role' , 'admin')->get();
        return view('components.admin.admin-user',compact('admins'), ['nav' => 'admin-user']);
    }


    public function addAdmin(){
        $admin1 = $this->validateRequest();
        // if(!$admin1['contact']){
        //     dd('pass');
        // }else{
        //     dd('fail');
        // }
        $password = Hash::make($admin1['password']);
        $user = User::create($admin1)->id;
        User::where('id', $user)->update(['password' => $password]);
        $admins = User::where('role' , 'admin')->get();
        Alert::toast('Admin added successfully!', 'success');
        return view('components.admin.admin-user', compact('admins'), ['nav' => 'admin-user']);
    }

    public function view(User $admin){

        return view('components.admin.admin-information', compact('admin'), ['nav' => 'admin-user']);
    }

    public function resetPassword(User $admin){
        $data = $this->updateRequest();
        $password = Hash::make($data['username']);
        // $admin->update($data);

        User::where('id', $admin->id)->update(['password' => $password]);
        // dd('test');
        $admins = User::where('role' , 'admin')->get();
        Alert::toast('Information updated and password reset successfully into DEFAULT PASSWORD (lastname + 2 letters of firstname)!', 'success');
        return view('components.admin.admin-user', compact('admins'), ['nav' => 'admin-user']);
        // return redirect()->back()->with('message', ' Updated Successfully!', compact('admins'), ['nav' => 'admin-user']);
    }

    private function updateRequest()
    {

        return request()->validate([
            'lastname'      => 'required|min:2|alpha',
            'firstname'     => 'required|min:2',
            'middlename'    => 'required|alpha',
            'address'       => '',
            'contact'       => 'required|digits:11|numeric',
            'dateofbirth'   => '',
            'sex'           => '',
            'civilstatus'   => '',
            'status'        => 'required',
            'username'      => 'required',
            'password'      => 'required',
            'section_id'    => '',
            'school_year'    => '',
            'role'          => 'required'
        ]);
    }

    private function validateRequest()
    {

        return request()->validate([
            'lastname'      => 'required|min:2|alpha',
            'firstname'     => 'required|min:2',
            'middlename'    => 'required|alpha',
            'address'       => '',
            'contact'       => 'required|digits:11|numeric|unique:users,contact',
            'dateofbirth'   => '',
            'sex'           => '',
            'civilstatus'   => '',
            'status'        => 'required',
            'username'      => 'required',
            'password'      => 'required',
            'section_id'    => '',
            'school_year'    => '',
            'role'          => 'required'
        ]);
    }
}
