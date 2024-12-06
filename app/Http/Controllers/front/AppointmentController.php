<?php

namespace App\Http\Controllers\front;


use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\AppointmentNotification;

class AppointmentController extends Controller
{
    public function index()
    {
        $patients = Appointment::where('patient_id', auth()->user()->id)->get();
        return view('front.appointments.index', compact('patients'));
    }

    public function create(Doctor $doctor)
    {
        //gate
        //use gate in riute {->can('make-appointment)}
        //use gate in blade {@can()}
        // Gate::authorize('make-appointment');

        // $user->load('major');
        return view('front.appointments.create', compact('doctor'));
    }

    public function store(Doctor $doctor, Request $request)
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
            'doctor_id' => $doctor->id
        ]);

        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new AppointmentNotification($data));
        }

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
