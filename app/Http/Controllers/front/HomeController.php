<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //->take(4)->get()
        $majors = Major::limit(4)->get();
        $doctors = User::with('major')->where('role', 'doctor')->limit(4)->get();
        return view('front.home', compact('majors', 'doctors'));
    }
}
