@extends('doctor.layouts.master')
@section('doctor.content')
    <!-- Main Content -->
    <div class="container content-wrapper flex-grow-1">
        <!-- Main content -->
        <section class="content py-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <x-error></x-error>
                            <x-success></x-success>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Appointment Date</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($appointments as $appointment)
                                            <tr>
                                                <td>{{ $appointment->user->id }}</td>
                                                <td>{{ $appointment->name }}</td>
                                                <td>{{ $appointment->phone }}</td>
                                                <td>{{ $appointment->email }}</td>
                                                <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y, h:i A') }}
                                                </td>
                                                <td class="text-center">
                                                    <!-- Add Report Button -->
                                                    <a href="{{ route('doctor.report.create', $appointment->user->id) }}"
                                                        class="btn btn-success btn-sm">Generate Report</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center alert alert-info">No appointments
                                                    found!</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-3">
                                {{ $appointments->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
