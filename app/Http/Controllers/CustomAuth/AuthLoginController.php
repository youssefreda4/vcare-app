<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthLoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8']
        ]);


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('dashboard.home');
            } else {

                return redirect()->route('home');
            }
        }

        return back()->withErrors(['error' => 'Incorrect email or password']);
    }
}
