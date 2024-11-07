<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function create()
    {
        return view('admin.majors.create');
    }

    public function store()
    {
        //vaidation
        request()->validate(
            [
                //another direction use pipeline => |
                "name" => "required|string|min:3|max:30",
                "image" => "required|image"
            ]
        );

        $image_name = request()->image->getClientOriginalName();
        // $image_ext = request()->image->getClientOriginalExtension(); //or extension();
        $image_name = time() . rand(1, 100000) . '_' . $image_name;
        request()->image->move(public_path('uploads/majors/'), $image_name);

        //Mass Assignment
        Major::create([
            'name'=>request()->name,
            "image"=>$image_name
        ]);

        return redirect('majors/add')->with("success", "Your major created successfully");
    }
}
