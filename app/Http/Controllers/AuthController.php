<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 1. Menampilkan halaman form login
    public function showLoginForm()
    {
        // Pastikan Anda sudah punya file resources/views/admin/auth/login.blade.php
        return view('admin.auth.login'); 
    }

    // 2. Memproses data dari form login
    public function login(Request $request)
    {
        // Validasi input form
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cek kecocokan email dan password ke database
        if (Auth::attempt($credentials)) {
            // Jika berhasil, buat ulang session untuk keamanan (mencegah session fixation)
            $request->session()->regenerate();

            // Arahkan ke halaman admin (dashboard)
            return redirect()->intended('/admin/dashboard');
        }

        // Jika gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Maaf, email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // 3. Memproses proses keluar (Logout)
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Arahkan kembali ke halaman login setelah logout
        return redirect('/admin/login');
    }
}