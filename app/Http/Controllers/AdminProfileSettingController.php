<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminProfileSettingController extends Controller
{
    public function adminProfile()
    {
        $admin = User::where('id', Auth::user()->id)->get();
        foreach ($admin as $val) {
            $username = $val->username;
            $contactnum = $val->contact;
            $firstName = $val->firstname;
            $lastName = $val->lastname;
            $middleName = $val->middlename;
        }

        return view('components.admin.profile', compact('firstName', 'middleName', 'lastName', 'username', 'contactnum'));
    }

    public function changepass(Request $request)
    {

        // $request->validate([
        //     'current' => ['required'],
        //     'new' => 'required|min:8',
        //     'confirm' => ['required', 'same:new'],
        // ]);

        if ((Hash::check($request->get('current'), Auth::user()->password))) {
            // The passwords matches
            if ($request->new == $request->confirm) {
                User::whereId(Auth::user()->id)->update(['password' => Hash::make($request->new)]);
                Alert::success("Password changed successfully!");
                // return back();
                return redirect()->back();
            }
            Alert::error("error", "Your new password does not matches with the confirm password.");
            return redirect()->back();
        }
        Alert::error("error", "Current password doesn't match with registered password.");
        return redirect()->back();
    }
}
