<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(){
        $doctors = User::with('major')
        ->where('role','doctor')
        ->paginate();
        return response()->json($doctors);
    }
}
