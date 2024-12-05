@extends('admin.layouts.master')

@section('admin-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Admin</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Admin</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <x-error></x-error>
                        <x-success></x-success>

                        <div class="card card-primary">

                            <!-- form start -->

                            <form action="{{ route('admin.update',$admin->id) }}" method="POST" enctype="multipart/form-data"
                                novalidate>
                                @method('PUT')
                                @csrf

                                <div class="card-body">
                                    <!-- Name Field -->
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $admin->name }}" id="name"
                                            placeholder="Admin Name" required>
                                    </div>

                                    <!-- Email Field -->
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" value="{{ $admin->email }}" name="email" id="email"
                                            placeholder="Admin Email" required>
                                    </div>

                                    
                                    <!-- Image Field -->
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image"
                                                    id="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                     <!-- Image Preview Section -->
                                     <div class="form-group mt-3">
                                        <label>Image Preview:</label>
                                        <div>
                                            <img src="{{ asset('uploads/admins/' . $admin->image) }}" alt="Selected Image"
                                                width="350px">
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>

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
