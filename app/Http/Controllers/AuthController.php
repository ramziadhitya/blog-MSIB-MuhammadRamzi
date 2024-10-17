<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function tampilRegistrasi(){
        return view('registrasi');
    }

    function submitRegistrasi(request $request){
        $user = new user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        //dd($user);
        return redirect()->route('login');
    }

    function tampilLogin(){
        return view('login');
    }

    function submitLogin(Request $request){
        $data = $request->only('email','password');

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('categories.index');
        }else{
            return redirect()->back()->with('gagal', 'Email atau password anda salah');
        }
    }

    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
