<?php

namespace App\Http\Controllers\Api\V1\Front\Appointment;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Front\DoctorResource;
use App\Notifications\AppointmentNotification;
use App\Http\Resources\Front\AppointmentResource;
use App\Http\Requests\Api\V1\Front\Appointment\AppointmentRequest;

class AppointmentController extends Controller
{
    public function index()
    {
        $patient = Appointment::where('patient_id', auth()->id())
            ->with('doctor')
            ->get();
        return response()->json([
            'message' => 'your appiontments',
            'data' => AppointmentResource::collection($patient)
        ]);
    }

    public function create(Doctor $doctor)
    {
        return response()->json([
            'message' => 'your doctor info',
            'doctor' => DoctorResource::make($doctor, $doctor->major)
        ]);
    }

    public function store(Doctor $doctor, AppointmentRequest $request)
    {
        $data = Appointment::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'appointment_date' => date('Y-m-d H:i:s'),
            'patient_id' => auth()->id(),
            'doctor_id' => $doctor->id
        ]);

        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new AppointmentNotification($data));
        }

        return response()->json([
            'message' => 'Your appointment has been send successfully',
            'data' => AppointmentResource::make($data)
        ]);
    }
}
