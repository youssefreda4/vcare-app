<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\uploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;

class UserController extends Controller
{
    use uploadImage;

    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(12);
        return view('admin.pages.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.pages.users.create');
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $image_name = $this->upload('uploads/users/');
        $data['image'] = $image_name;
        User::create($data);

        return redirect()->route('user.create')->with("success", "Your User created successfully");
    }

    public function search(Request $request)
    {
        $users = User::where('name', 'like', "%$request->search%")
            ->paginate(5);
        return view('admin.pages.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.pages.users.edit', compact('user'));
    }

    public function update(User $user)
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
                'unique:user',
            ]
        );

        $old_image = $user->image;
        if (!isset(request()->image)) {
            $image_name = $old_image;
        } else {
            $this->delete('uploads/users/', $old_image);
            $image_name = $this->upload('uploads/users/');
        }

        $user->update([
            'name' => request()->name,
            'email' => request()->email,
            "image" => $image_name,
        ]);

        return redirect()->route('user.edit', ['user' => $user->id])->with('success', 'data updated successfully');
    }


    public function destroy(User $user)
    {
        $this->delete('uploads/users/', $user->image);
        $user->delete();
        return back()->with('success', 'data deleted successfully');
    }
}
