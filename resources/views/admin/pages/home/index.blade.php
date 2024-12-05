@extends('admin.layouts.master')
@section('admin-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- Total Users -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $users }}</h3>
                                <p>Total Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Admin -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>{{ $admins }}</h3>
                                <p>Admins</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-stalker"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Major Categories -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $majors }}</h3>
                                <p>Major Categories</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-grid"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Appointments -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $appiontments }}</h3>
                                <p>Appointments</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-calendar"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Reports -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $reports }}</h3>
                                <p>Reports</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-document-text"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Doctors -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{ $doctors }}</h3>
                                <p>Doctors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-medkit"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Unread Messages -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box  bg-dark">
                            <div class="inner">
                                <h3>{{ $messagesCount }}</h3>
                                <p>Messages</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-chatbubble"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <hr>
                    <div class="text-center py-3">
                        <h1 class="display-4 font-weight-bold text-primary">Latest Messages</h1>
                        <p class="lead text-muted">Stay updated with the latest messages from your network.</p>
                    </div>

                    @forelse ($messages as $message)
                        <!-- Default box -->
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title">{{ $message->email }}</h3>
                            </div>
                            <div class="card-body">
                                {{ $message->content }}
                            </div>
                        </div>
                        <!-- /.card -->
                    @empty
                        <div class="text-center alert alert-info">
                            There is no messages !
                        </div>
                        <hr>
                    @endforelse


                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <!-- /.content -->
@endsection
