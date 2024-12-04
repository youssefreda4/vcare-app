<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MajorResource;
use App\Models\User;

class MajorController extends Controller
{

    public function index()
    {
        $majors = Major::with('users')->get();
        return MajorResource::collection($majors);
        // return $this->apiResponse($majors);
    }

    public function show($id)
    {
        $major = Major::findOrFail($id);
        return new MajorResource($major);
        // return response()->json(['data' => $major]);
    }

    public function doctors($id)
    {
        $doctors = User::where('role', 'doctor')
            ->where('major_id', $id)
            ->get();
        return response()->json(['data' => $doctors]);
    }
}
