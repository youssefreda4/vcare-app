@extends('front.app')
@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="{{'/'}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add-Major</li>
            </ol>
        </nav>
        <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">

            <form class="form" action="{{ url('majors') }}" method="POST" enctype="multipart/form-data">
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
                        <label class="form-label required-label" for="email">Image</label>
                        <input type="file" value="{{ old('image') }}" name="image" class="form-control"
                            id="image">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>

    </div>
@endsection
