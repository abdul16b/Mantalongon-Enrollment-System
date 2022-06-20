<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use PhpParser\Node\Stmt\TryCatch;
use RealRashid\SweetAlert\Facades\Alert;


class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('auth.passwords.forgotpassword');
    }

    public function resetpassword(Request $req)
    {


        $data = $req->all();
        $number = $data['contact'];
        if ($data['password'] != $data['cpassword']) {
            // dd($data);
            // The passwords matches
            Session::flash('errorMessage', 'Confirm password does not match with password. Please try again!');
            return view('auth.passwords.resetpassword',compact('number'))->with('status',"Confirm password does not matches with the password you inputted. Please try again!");
        }else{
            $id = User::where('contact' , $data['contact'])->first(['id'])->id;
                $user = User::findOrFail($id);
                // $user->password = $data['password'];
              $user->update(['password' => Hash::make($req->password)]);
                $user->save();
                Alert::toast('Password reset successfully!', 'success');
                return View::make('auth.login');

        }
    }



    public function resetPass(Request $req)
    {

        if(User::where('contact','=', $req->mobilenumber)->exists()){
            $number = $req->mobilenumber;
            return view('auth.passwords.resetpassword', compact('number'));
        }else{
            return back()->with('error', 'Number doesnt exist!');
        }

    }
}
