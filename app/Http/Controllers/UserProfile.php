<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfile extends Controller
{
    public function showProfile()
    {
        // Mengambil informasi pengguna yang sedang login
        $user = Auth::user();

        // Menampilkan view dengan data pengguna
        return view('userprofil', compact('user'));
    }
}
