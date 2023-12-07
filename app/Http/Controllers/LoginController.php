<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        $title = "Login Page";
        return view('auth.login', compact('title'));
    }
    public function doLogin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            // 'g-recaptcha-response' => 'required|captcha'

        ], [
            'email.email' => 'Masukkan Email yang Valid!',
            'email.required' => 'Harap Masukkan Email!',
            'password.required' => 'Harap Masukkan Password!',
            // 'g-recaptcha-response.required' => 'Pastikan Anda Bukan Robot'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {




                $request->session()->regenerate();

                return redirect()->intended('/home');

                // return back()->with('error', 'Akun anda sedang login di tempat lain');

        }
        return back()->with('error', 'Email atau Kata sandi salah');
    }

    public function logout(Request $request)
    {


        $request->session()->invalidate();

        $request->session()->regenerateToken();


        Alert::success('Berhasil', 'Anda berhasil logout');

        return redirect('/')->with('success', 'Anda Berhasil Logout');
    }
}
