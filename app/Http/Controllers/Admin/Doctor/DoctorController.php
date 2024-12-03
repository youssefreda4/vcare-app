<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Models\Major;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Traits\uploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DoctorRequest;

class DoctorController extends Controller
{
    use uploadImage;

    public function index()
    {
        $doctors = Doctor::orderBy("id", "DESC")->with('major')->paginate(12);
        return view('admin.pages.doctors.index', compact('doctors'));
    }
    public function create()
    {
        $majors = Major::all();
        return view('admin.pages.doctors.create', compact('majors'));
    }
    public function store(DoctorRequest $request)
    {
        $data = $request->validated();
        $image_name = $this->upload('uploads/doctors/');
        $data['image'] = $image_name;
        Doctor::create($data);

        return redirect()->route('doctor.create')->with("success", "Your Doctor created successfully");
    }

    public function edit(Doctor $doctor) {
        $majors = Major::all();
        return view('admin.pages.doctors.edit',compact('doctor','majors'));
    }


    public function search(Request $request){
        $doctors = Doctor::where('name','like',"%$request->search%")
        ->with('major')
        ->paginate(5);
        return view('admin.pages.doctors.index', compact('doctors'));

    }


    public function update(Doctor $doctor) {
          //vaidation
          request()->validate(
            [
                "name" => 'required', 'string', 'max:30', 'min:5',
                'email' => 'required', 'string', 'email', 'unique:doctors',
                'major_id' => 'required',
            ]
        );

        $old_image = $doctor->image;
        if (!isset(request()->image)) {
            $image_name = $old_image;
        } else {
            $this->delete('uploads/doctors/', $old_image);
            $image_name = $this->upload('uploads/doctors/');
        }

        $doctor->update([
            'name' => request()->name,
            'email'=>request()->email,
            'major_id'=>request()->major_id,
            "image" => $image_name,
        ]);
        // $major->name = request()->name;
        // $major->image = $image_name;
        // $major->save();

        return redirect()->route('doctor.edit', ['doctor' => $doctor->id])->with('success', 'data updated successfully');
    }
    public function destroy(Doctor $doctor) {
        $this->delete('uploads/doctors/', $doctor->image);
        $doctor->delete();
        return back()->with('success', 'data deleted successfully');
    }
}
