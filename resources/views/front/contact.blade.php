@extends('front.app')
@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="{{'/'}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">contact</li>
            </ol>
        </nav>
        <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">

            <form class="form" action="{{ url('/send-message') }}" method="POST">
                {{-- CSRF attack --}}
                @csrf

                <x-error></x-error>
                <x-success></x-success>

                {{-- @include('front._partials.message') --}}

                <div class="form-items">
                    <div class="mb-3">
                        <label class="form-label required-label" for="name">Name</label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                            id="name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label required-label" for="email">Email</label>
                        <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                            id="email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label required-label" for="subject">subject</label>
                        <input type="text" value="{{ old('subject') }}" name="subject" class="form-control"
                            id="subject">
                        @error('subject')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="message">message</label>
                        <textarea class="form-control" name="content" minlength="10" id="message">{{ old('content') }}</textarea>
                        @error('content')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>

    </div>
@endsection
