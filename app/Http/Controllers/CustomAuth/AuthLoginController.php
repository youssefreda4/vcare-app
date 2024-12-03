<?php

namespace App\Http\Controllers\CustomAuth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthLoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {

        $data = $request->validated();

        if (Auth::guard('admin')->attempt($data)) {
            $user = Auth::guard('admin')->user();
            Auth::login($user);
            return redirect()->route('dashboard.home');
        }
        if (Auth::guard('web')->attempt($data)) {
            $user = Auth::guard('web')->user();
            Auth::login($user);
            return redirect()->route('home');
        }

        return back()->withErrors(['error' => 'Incorrect email or password']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Auth::guard('web')->logout();
        return redirect()->route('home');
    }
}
