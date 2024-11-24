<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            Auth::guard('admin');
            return to_route('dashboard.home');
        }
        if (Auth::guard('web')->attempt($data)) {
            return to_route('home');
        }

        return back()->withErrors(['error' => 'Incorrect email or password']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
