<?php

namespace App\Http\Controllers\front;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationAppointmentMail;

class AppointmentController extends Controller
{

    
    public function index()
    {
        $patients = Appointment::where('patient_id',auth()->user()->id)->get();
        return view('front.appointments.index',compact('patients'));
    }

    public function create(User $user)
    {
        //gate
        //use gate in riute {->can('make-appointment)}
        //use gate in blade {@can()}
        Gate::authorize('make-appointment');
        
        // $user->load('major');
        return view('front.appointments.create', compact('user'));
    }

    public function store(User $user, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|string|email',
            'phone' => 'required|numeric'
        ]);

        $data = Appointment::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'appointment_date' => date('Y-m-d H:i:s'),
            'patient_id' => auth()->user()->id,
            'doctor_id' => $user->id
        ]);
        

        //send email
        // Mail::to(auth()->user()->email)->send(new ConfirmationAppointmentMail([
        //    'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'appointment_date' => date('Y-m-d H:i:s')
        // ]));

        // Mail::to(auth()->user()->email)->send(new ConfirmationAppointmentMail($data));

        return redirect()->back()->with('success', 'Your appointment has been send successfully');
    }
}
