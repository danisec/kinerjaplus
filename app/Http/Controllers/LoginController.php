<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.login.index', [
            'title' => 'Login',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required|min:4|max:255',
            'password' => 'required|min:8|max:255',
        ]);

        $remember = $request->has('remember') ? true : false;

        // Cek apakah input adalah email atau username
        $field = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$field => $request->input('login'), 'password' => $request->input('password')], $remember)) {
            $request->session()->regenerate();
            $notif = notify()->success( 'Selamat datang, ' . Auth::user()->fullname, '');
            return redirect()->intended('/dashboard')->with('notif', $notif);
        }

        $notif = notify()->error( 'Username atau password salah', '');

        return back()->withInput()->with('notif', $notif);
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
