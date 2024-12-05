<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Traits\uploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;

class AdminController extends Controller
{
    use uploadImage;

    public function index()
    {
        $admins = Admin::orderBy('id', 'DESC')->paginate(12);
        return view('admin.pages.admins.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.pages.admins.create');
    }

    public function store(AdminRequest $request)
    {
        $data = $request->validated();
        $image_name = $this->upload('uploads/admins/');
        $data['image'] = $image_name;
        admin::create($data);

        return redirect()->route('admin.create')->with("success", "Your Admin created successfully");
    }

    public function search(Request $request)
    {
        $admins = Admin::where('name', 'like', "%$request->search%")
            ->paginate(5);
        return view('admin.pages.admins.index', compact('admins'));
    }

    public function edit(Admin $admin)
    {
        return view('admin.pages.admins.edit', compact('admin'));
    }

    public function update(Admin $admin)
    {
        request()->validate(
            [
                "name" => 'required',
                'string',
                'max:30',
                'min:5',
                'email' => 'required',
                'string',
                'email',
                'unique:admin',
            ]
        );

        $old_image = $admin->image;
        if (!isset(request()->image)) {
            $image_name = $old_image;
        } else {
            $this->delete('uploads/admins/', $old_image);
            $image_name = $this->upload('uploads/admins/');
        }

        $admin->update([
            'name' => request()->name,
            'email' => request()->email,
            "image" => $image_name,
        ]);

        return redirect()->route('admin.edit', ['admin' => $admin->id])->with('success', 'data updated successfully');
    }


    public function destroy(Admin $admin)
    {
        $this->delete('uploads/admins/', $admin->image);
        $admin->delete();
        return back()->with('success', 'data deleted successfully');
    }
}
