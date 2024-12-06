<?php

namespace App\Http\Controllers\Api\V1\Front\Home;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Front\DoctorResource;
use App\Http\Resources\Front\MajorResource;
use App\Models\Doctor;

class HomeController extends Controller
{
    public function index()
    {
        $majors = Major::limit(5)->get();
        $doctors = Doctor::with('major')->limit(5)->get();
        return [
            'majors' => MajorResource::collection($majors),
            'doctors' => DoctorResource::collection($doctors)
        ];
    }
}
