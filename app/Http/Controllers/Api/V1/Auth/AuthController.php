<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\V1\Front\Auth\LoginRequest;
use App\Http\Requests\Api\V1\Front\Auth\RegisterRequest;
use App\Models\Admin;
use App\Models\Doctor;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        $token = $user->createToken('auth.register')->plainTextToken;

        return response()->json([
            'user' => $data,
            'token' => $token
        ]);
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        if (Auth::attempt($data)) {
            $user = User::where('email', $data['email'])->first();
            $token = $user->createToken('auth.login')->plainTextToken;
            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        }

        return response()->json([
            'error' => 'Your email or password not valid!'
        ], 422);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logged out'
        ]);
    }
}
