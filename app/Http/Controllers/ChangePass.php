<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ChangePass extends Controller
{
    public function PasswordChange(){
        return view('admin.body.change_password');
    }

    // public function UpdatePassword(Request $request){
    //     $validateData = $request->validate([
    //         'oldpassword' => 'required',
    //         'password' => 'required|confirmed'
    //     ]);

    //     $hashedPassword = Auth::user()->password;
    //     if(Hash::check($request->oldpassword,$hashedPassword)){
    //         $user = User::find(Auth::id());
    //         $user->password = Hash::make($request-password);
    //         $user->save();
    //         Auth::logout();
    //         return redirect()->route('login')->with('success','Password changed successfully');
    //     }else{
    //         return redirect()->back()->with('error','Current password is invalid');
    //     }
    // }


    public function UpdatePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success','Password Is Change Successfuly');

        }else{
            return redirect()->back()->with('error','Current Password IS Invalid');
        }

    }
}
