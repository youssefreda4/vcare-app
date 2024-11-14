@extends('front.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-6 mx-auto mt-5 ">

                <form class="my-5 border p-3" action="{{ route('auth.login') }}" method="POST" enctype="multipart/form-data">
                    {{-- CSRF attack --}}
                    @csrf
                    <div class="mb-3">
                        <h1 class="text-center text-primary fw-bold">Login</h1>
                    </div>

                    <x-error></x-error>
                    <x-success></x-success>

                    {{-- @include('front._partials.message') --}}

                   
                    <div class="mb-3">
                        <label class="form-label required-label" for="email">Email</label>
                        <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                            id="email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label required-label" for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>


                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>

    </div>
@endsection

