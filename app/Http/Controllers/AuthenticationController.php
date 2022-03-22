<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        // $this->middleware('auth')->only('logout');
    }

    public function authentication() {
        return view('login');
    }

    public function registeration() {
        return view('register');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'password'  => 'required',
        ]);

        if (auth()->attempt($request->only('name', 'password'), $request->remember_me)) {
            return redirect('dashboard');
        }
        return back()->withErrors(['unauthorized' => ['Your Credentials are invalid']]);
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
