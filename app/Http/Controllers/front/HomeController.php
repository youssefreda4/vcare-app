<?php

namespace App\Http\Controllers\front;

use App\Models\User;
use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        //->take(4)->get()
        $majors = Major::limit(4)->get();
        $doctors = User::limit(4)->get();
        return view('front.home', compact('majors', 'doctors'));
    }
}
