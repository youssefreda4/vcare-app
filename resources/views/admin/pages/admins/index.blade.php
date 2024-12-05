@extends('admin.layouts.master')

@section('admin-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Admins</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">All Admins</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>



        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Form Section -->
                    <div class="mb-4">
                        <form action="{{ route('admin.search') }}" method="POST" class="d-flex gap-2" novalidate>
                            @csrf
                            <input type="text" class="form-control" name="search" placeholder="Admin Name" required>
                            <button type="submit" class="btn btn-primary ml-3">Search</button>
                        </form>
                    </div>
                    <!-- left column -->
                    <div class="col-md-12">
                        <div>
                            <x-error></x-error>
                            <x-success></x-success>
                        </div>
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Image Name</th>
                                            <th>Image</th>
                                            <th class="text-center">Edit</th>
                                            <th class="text-center">Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($admins as $admin)
                                            <tr>
                                                <td>{{ $admin->id }}</td>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->image }}</td>
                                                <td>
                                                    <img src="{{ asset('uploads/admins/' . $admin->image) }}"
                                                        width="150px">
                                                </td>
                                                <th class="text-center">
                                                    <a href="{{ route('admin.edit', ['admin' => $admin->id]) }}"
                                                        class="btn btn-warning">Edit</a>
                                                </th>
                                                <th class="text-center">
                                                    <form action="{{ route('admin.delete', ['admin' => $admin->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </th>
                                            </tr>
                                        @empty
                                            <div class="text-center alert alert-info">
                                                There is no admins !
                                            </div>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="p-3">
                                {{ $admins->links() }}
                            </div>
                        </div>
                        <!-- /.card -->

                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
