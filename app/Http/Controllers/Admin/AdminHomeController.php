<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use App\Models\Major;
use App\Models\Doctor;
use App\Models\Report;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewNotification;

class AdminHomeController extends Controller
{

    public function index()
    {
        $users = User::count();
        $admins = Admin::count();
        $doctors = Doctor::count();
        $majors = Major::count();
        $appiontments = Appointment::count();
        $reports = Report::count();
        $messagesCount = Message::count();
        $messages = Message::orderBy('id','DESC')->take(5)->get();
        return view('admin.pages.home.index', compact('users', 'doctors', 'majors', 'appiontments', 'reports', 'admins', 'messagesCount','messages'));
    }
}
