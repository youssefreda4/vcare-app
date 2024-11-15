<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\uploadImage;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{

    use uploadImage;

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

        // $image_name = request()->image->getClientOriginalName();
        // // $image_ext = request()->image->getClientOriginalExtension(); //or extension();
        // $image_name = time() . rand(1, 100000) . '_' . $image_name;
        // request()->image->move(public_path('uploads/majors/'), $image_name);

        $image_name = $this->upload('uploads/majors/');

        //Mass Assignment
        Major::create([
            'name' => request()->name,
            "image" => $image_name
        ]);

        return redirect('majors/add')->with("success", "Your major created successfully");
    }

    //use model binding
    public function edit(Major $major)
    {
        //2 direction
        //first
        // $major = Major::where('id',$id)->first();
        //second
        // $major = Major::find($id);
        // if($major){
        //     dd($major);
        //     return view('admin.majors.edit');
        // }else{
        //     dd('hmada');
        // }
        // $major = Major::findOrFail($id);

        //shortcut for this
        return view('admin.majors.edit', compact("major"));
    }

    public function update(Major $major)
    {

        // dd($major);
        //vaidation
        request()->validate(
            [
                //another direction use pipeline => |
                "name" => "required|string|min:3|max:30"
            ]
        );

        $old_image = $major->image;
        if (!isset(request()->image)) {
            $image_name = $old_image;
        } else {
            $this->delete('uploads/majors/', $old_image);
            $image_name = $this->upload('uploads/majors/');
        }

        $major->name = request()->name;
        $major->image = $image_name;
        $major->save();

        return back()->with('success', 'data updated successfully');
    }

    public function destory(Major $major)
    {
        $this->delete('uploads/majors/', $major->image);
        $major->delete();
        return back()->with('success', 'data deleted successfully');
    }
}
