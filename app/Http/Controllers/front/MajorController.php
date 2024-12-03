<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Major;
use App\Models\User;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        //paginate
        //simplePaginate
        //cursorPaginate
        $majors = Major::orderBy("id", "DESC")->paginate(12);
        return view('front.majors.index', ["majors" => $majors]);
    }

    public function doctors(Major $major)
    {
        $doctors = Doctor::with('major')
            ->where('major_id', $major->id)
            ->paginate(12);
        return view('front.doctors.index', compact('doctors'));
    }
}
