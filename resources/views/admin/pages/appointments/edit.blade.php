@extends('admin.layouts.master')

@section('admin-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Appointment</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Update Appointment</li>
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
                        <div>
                            <x-error></x-error>
                            <x-success></x-success>
                        </div>
                        <div class="card card-primary">

                            <!-- form start -->

                            <form action="{{ route('appointment.update', ['appointment' => $appointment->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card-body">
                                    <div class="form-group">
                                        <div>
                                            <h2 >{{ $appointment->name }}</h2>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="appointment_datetime">Appointment Date & Time</label>
                                        <input type="datetime-local" class="form-control" 
                                            value="{{ $appointment->appointment_date }}" 
                                            name="appointment_date" id="appointment_datetime" 
                                            placeholder="Select Appointment Date & Time">
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
