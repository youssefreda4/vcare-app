<?php

namespace App\Http\Controllers\Admin\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('doctor')
            ->orderBy('id', 'DESC')
            ->with('user')
            ->paginate(12);
        return view('admin.pages.appointments.index', compact('appointments'));
    }

    public function search(Request $request)
    {
        $appointments = Appointment::where('name', 'like', "%$request->search%")
            ->with('doctor')
            ->with('user')
            ->paginate(5);
        return view('admin.pages.appointments.index', compact('appointments'));
    }

    public function edit(Appointment $appointment)
    {
        return view('admin.pages.appointments.edit', compact('appointment'));
    }

    public function update(Appointment $appointment)
    {
        request()->validate([
            'appointment_date' => 'required|string'
        ]);
        $appointment->update([
            'appointment_date' => request()->appointment_date
        ]);

        return redirect()->route('appointment.edit', ['appointment' => $appointment->id])->with('success', 'data updated successfully');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return back()->with('success', 'data deleted successfully');
    }
}
