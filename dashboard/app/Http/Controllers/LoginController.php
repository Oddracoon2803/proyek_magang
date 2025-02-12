<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Login user otomatis
        session(['role' => 'user']);
        return redirect()->route('user.dashboard');
    }

    public function adminPage()
    {
        return view('adminLogin');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Verifikasi username dan password
        if ($request->username == 'admin' && $request->password == 'admin') {
            session(['role' => 'admin']);
            return redirect()->route('admin.dashboard');
        } else {
            return back()->withErrors(['username' => 'Username atau Password salah']);
        }
    }
}
