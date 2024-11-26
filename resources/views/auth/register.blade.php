@extends('front.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-6 mx-auto mt-5 ">

                <form class="my-5 border p-3" action="{{ route('auth.store') }}" method="POST" enctype="multipart/form-data">
                    {{-- CSRF attack --}}
                    @csrf
                    <div class="mb-3">
                        <h1 class="text-center text-primary fw-bold">New Account</h1>
                    </div>

                    <x-error></x-error>
                    <x-success></x-success>

                    {{-- @include('front._partials.message') --}}

                    <div class="mb-3">
                        <label class="form-label required-label" for="name">Name</label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                            id="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="email">Email</label>
                        <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                            id="email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label required-label" for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>

                    <div class="mb-3">
                        <label class="form-label required-label" for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                    </div>

                    {{-- <div class="mb-3">
                        <label class="form-label required-label" for="email">Image</label>
                        <input type="file" value="{{ old('image') }}" name="image" class="form-control"
                            id="image">
                       
                    </div> --}}

                    <button type="submit" class="btn btn-primary">SignUp</button>
                </form>
            </div>
        </div>

    </div>
@endsection
