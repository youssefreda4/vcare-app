<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = User::with('major')->where('role','doctor')->paginate(12);
        return view('front.doctors.index',compact('doctors'));
    }
}
