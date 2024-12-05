<?php

namespace App\Http\Controllers\Doctor;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Http\Controllers\Controller;
use App\Models\Report;

class DoctorController extends Controller
{
   public function index()
   {
      $doctor = auth()->guard('doctor')->user();
      $appointments = Appointment::where('doctor_id', $doctor->id)->paginate(12);
      $appointmentsCount = Appointment::where('doctor_id', $doctor->id)->count();

      return view('doctor.pages.home.index', compact('appointments', 'appointmentsCount'));
   }

   public function create(User $patient)
   {
      return view('doctor.pages.report.index', compact('patient'));
   }

   public function store(User $patient)
   {
      request()->validate([
         'report' => 'required|string',
      ]);

      Report::create([
         'report' => request()->report,
         'patient_id' => request()->patient->id,
         'doctor_id' => auth()->guard('doctor')->user()->id
      ]);
      return redirect()->route('doctor.appointment.view')->with('success', 'Report created successfully');
   }
}
