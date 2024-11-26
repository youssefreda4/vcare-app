@extends('front.app')
@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item">
                    <a class="text-decoration-none" href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a class="text-decoration-none" href="{{ route('doctors.view') }}">doctors</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $user->name }}
                </li>
            </ol>
        </nav>
        <div class="d-flex flex-column gap-3 details-card doctor-details">
            <div class="details d-flex gap-2 align-items-center">
                <img src="{{ asset('uploads/doctors/' . $user->image) }}" alt="doctor" class="img-fluid rounded-circle" height="150"
                    width="150" />
                <div class="details-info d-flex flex-column gap-3">
                    <h4 class="card-title fw-bold">{{ $user->name }}</h4>
                    <h6 class="card-title fw-bold">
                        doctor major : {{ $user->major->name }}
                    </h6>
                </div>
            </div>
            <hr />
            <x-error></x-error>
            <x-success></x-success>
            <form class="form" action="{{ route('appointments.store',$user->id) }}" method="POST" novalidate>
                
                @csrf

                <div class="form-items">
                    <div class="mb-3">
                        <label class="form-label required-label" for="name">Name</label>
                        <input type="text" value="{{ auth()->user()->name }}"  name="name" class="form-control" id="name" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="phone">Phone</label>
                        <input type="tel"  class="form-control" name="phone" id="phone" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="email">Email</label>
                        <input type="email"  value="{{ auth()->user()->email }}" name="email" class="form-control" id="email" required />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    Confirm Booking
                </button>
            </form>
        </div>
    </div>
@endsection
