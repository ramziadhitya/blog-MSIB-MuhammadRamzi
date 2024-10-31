<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\PasswordReset;
use Illuminate\Support\Str;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;




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

    public function forgot_password(){
        return view('forgot-password');
    }

    public function forgot_password_act(Request $request)
{
    
    $costumMessage = [
        'email.required' => 'Email tidak boleh kosong',
        'email.email'    => 'Email tidak valid',
        'email.exists'   => 'Email tidak terdaftar'
    ];

    $request->validate([
        'email' => 'required|email|exists:users,email'
    ], $costumMessage);

    // Membuat token
    $token = Str::random(60);

    
    PasswordReset::updateOrCreate(
        [
            'email' => $request->email, 
        ],
        [
            'token' => $token,           
            'created_at' => now(),
        ]
    );

    // Kirim email reset password
    Mail::to($request->email)->send(new ResetPasswordMail($token));

    // Redirect dengan pesan sukses
    return redirect()->route('forgot-password')->with('success', 'Kami telah mengirimkan link reset password ke email');
}

public function validasi_forgot_password_act(Request $request) {
    $customMessage = [
        'password.required' => 'Password tidak boleh kosong',
        'password.min' => 'Password Minimal 6 Karakter',
    ];

    $request->validate([
        'password' => 'required|min:6'
    ], $customMessage);

    // Cari token di database
    $token = PasswordReset::where('token', $request->token)->first();
    if (!$token) {
        return redirect()->route('login')->with('failed', 'Token Tidak Valid');
    }

    // Cari user berdasarkan email yang terkait dengan token
    $user = User::where('email', $token->email)->first();

    if (!$user) {
        return redirect()->route('login')->with('failed', 'Email tidak terdaftar di database');
    }

    // Update password user dan hapus token reset password
    $user->update([
        'password' => Hash::make($request->password)
    ]);

    $token->delete();

    // Redirect ke halaman login dengan pesan sukses
    return redirect()->route('login')->with('success', 'Password Berhasil Direset');
}


public function validasi_forgot_password(Request $request, $token)
{
    $getToken= PasswordReset::where('token', $token)->first();
    if(!$getToken){
        return redirect()->route('login')->with('failed', 'Token Tidak Valid');
    
    }
    return view ('validasi-token', compact('token'));
}

    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
