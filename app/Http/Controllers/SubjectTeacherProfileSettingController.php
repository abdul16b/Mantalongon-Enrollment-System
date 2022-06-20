<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SubjectTeacherProfileSettingController extends Controller
{

    public function subjectTeacherProfile($teacher)
    {

        $profiles = User::where('id', Auth::user()->id)->get();
        foreach ($profiles as $val) {
            $username = $val->username;
            $contactnum = $val->contact;
            $firstName = $val->firstname;
            $lastName = $val->lastname;
            $middleName = $val->middlename;
            $schoolyear = $val->school_year;
        }
        return view('components.adviser.profile', compact('firstName', 'middleName', 'lastName', 'username', 'contactnum', 'schoolyear'));
    }

    public function changepass(Request $request)
    {
        if ((Hash::check($request->get('current'), Auth::user()->password))) {
            // The passwords matches
            if ($request->new == $request->confirm) {
                User::whereId(Auth::user()->id)->update(['password' => Hash::make($request->new)]);
                Alert::success("Password changed successfully!");
                return back();
            }
            Alert::error("error", "Your new password does not matches with the confirm password.");
            return redirect()->back();
        }
        Alert::error("error", "Current password doesn't match with registered password.");
        return redirect()->back();
    }


}
