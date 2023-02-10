<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function registration()
    {
        return view("auth.registration");
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();

        if($res) {
            $request->session()->put('loginId', $user->id);
            return redirect()->route('quiz')->with('success', 'You have registered successfully.');
        } else {
            return back()->with('fail', 'Something went wrong.');
        }
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect()->route('quiz');
            } else {
                return back()->with('fail', 'Password not matching.');
            } 
        } else {
            return back()->with('fail', 'This email is not registered.');
        }
    }

    public function logout() 
    {
        if(session()->has('loginId')) {
            session()->pull('loginId');
        }
        return redirect()->route('login');
    }
}
