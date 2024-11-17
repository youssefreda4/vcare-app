<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return view('admin.pages.home.index',compact('user'));
    }
}
