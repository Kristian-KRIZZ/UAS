<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function logout(Request $request)
   {
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();

       return redirect('/'); // atau redirect ke halaman yang kamu inginkan setelah logout
   }

    public function index()
    {
        if (Auth::check()) {
            return redirect('/Home');
        }
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/Home');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

}