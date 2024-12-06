<?php

namespace App\Http\Controllers\Api\V1\Front\Major;

use App\Models\Major;
use App\Models\Doctor;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\MajorResource;
use App\Http\Resources\Front\DoctorResource;

class MajorController extends Controller
{
    public function index()
    {
        $majors = Major::paginate(12);
        return response()->json($majors);
    }

    public function doctors($id)
    {
        $doctors = Doctor::with('major')
            ->where('major_id', $id)
            ->paginate(12);
        if ($doctors->isEmpty()) {
            return response()->json([
                'message' => 'There is no doctors yet !'
            ]);
        }
        return response()->json([
            'doctors' => DoctorResource::collection($doctors)
        ]);
    }
}
