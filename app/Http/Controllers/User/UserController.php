<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function create(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8|max:30',
            'cpassword'=>'required|min:8|max:30|same:password'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $save = $user->save();

        if($save){
            return redirect()->back()->with('success', 'you are registered');
        }else{
            return redirect()->back()->with('fail', 'something went wrong');
        }
    }

    function check(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required'
        ],[
            'email.exists'=>'this email is not exists'
        ]);

        $creds = $request->only('email','password');
        if(Auth::guard('web')->attempt($creds)){
            return redirect()->route('user.home');
        }
        else{
            return redirect()->route('user.login')->with('fail','incorrect data');
        }
    }
    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
