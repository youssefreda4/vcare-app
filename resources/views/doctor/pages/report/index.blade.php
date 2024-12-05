@extends('doctor.layouts.master')
@section('doctor.content')
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1>Generate Report</h1>
            <h1>Patient Name : {{ $patient->name }}</h1>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div>
                    <x-error></x-error>
                    <x-success></x-success>
                </div>
                <form action="{{ route('doctor.report.store', $patient->id) }}" method="POST" novalidate>
                    @csrf <!-- Laravel CSRF protection -->

                    <div class="mb-3">
                        <label for="report" class="form-label">Repot</label>
                        <textarea class="form-control" id="report" name="report" rows="12"
                            placeholder="Enter  specific details o for the report"></textarea>
                    </div>


                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Generate Report</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
