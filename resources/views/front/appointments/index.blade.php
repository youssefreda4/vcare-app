@extends('front.app')
@section('content')
    <div class="container">
        <h2 class="mt-4">Your Appointments</h2>
        <div class="card p-4 mt-3">

            @forelse ($patients as $patient)
                <div class="card p-4 mt-3">
                    {{-- <div class="d-flex gap-3 align-items-center">
                        <div>
                            <h4 class="fw-bold"></h4>
                            <p><strong>Major: </strong> </p>
                        </div>
                    </div> --}}

                    <div class="mt-3 alert alert-info">
                        <h5 class="text-center">Your appointment is : {{ $patient->appointment_date }} </h5>
                    </div>

                    <div class="mt-3">
                        <h5>Contact Information: {{ $patient->email }}</h5>
                        <p><strong>Name:</strong> {{ $patient->name }} </p>
                        <p><strong>Phone:</strong> {{ $patient->phone }} </p>
                    </div>
                </div>

            @empty
                <div class="alert alert-info text-center" role="alert">
                    No appointments found
                </div>
            @endforelse

        </div>

    </div>
@endsection
