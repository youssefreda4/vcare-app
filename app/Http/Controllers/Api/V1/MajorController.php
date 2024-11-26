<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MajorController extends Controller
{
 
    public function index(){
        $majors = Major::all();
        return response()->json($majors);
    }
}
