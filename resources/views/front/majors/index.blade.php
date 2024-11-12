@extends('front.app')
@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ '/' }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">majors</li>
            </ol>
        </nav>

        <div class="row">
            @auth
                <div class="col-12 my-5 text-center">
                    <a type="button" class="btn btn-success " href="{{ url('majors/add') }}">Add Majors</a>
                </div>
            @endauth

        </div>
        <x-error></x-error>
        <x-success></x-success>

        <div class="majors-grid">
            @forelse ($majors as $major)
                <div class="card p-2" style="width: 18rem;">
                    <img src="{{ asset('uploads/majors/' . $major->image) }}"
                        class="card-img-top rounded-circle card-image-circle" alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center">{{ $major->name }}</h4>
                        <a href="{{ url('majors/' . $major->id . '/doctors') }}"
                            class="btn btn-outline-primary card-button">Browse Doctors</a>
                        @auth
                            <a href="{{ url('majors/' . $major->id . '/edit') }}"
                                class="btn btn-outline-info mt-2 card-button">Edit
                                Major</a>
                            {{-- for delete must be form --}}
                            <form action="{{ url('majors/' . $major->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger mt-2 card-button">Delete Major</button>
                            </form>
                        @endauth
                    </div>
                </div>
            @empty
                <div class="text-center alert alert-info">
                    There is no major yet !
                </div>
            @endforelse

        </div>

        <div class="p-3">
            {{ $majors->links() }}
        </div>

    </div>
@endsection
