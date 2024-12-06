<?php

namespace App\Http\Controllers\Api\V1\Front\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(){
        $doctors = Doctor::with('major')
        ->paginate(12);
        return response()->json($doctors);
    }
}
