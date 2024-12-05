@extends('admin.layouts.master')

@section('admin-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Messages</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">All Messages</li>
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
                     {{-- <div class="mb-4">
                        <form action="{{ route('report.search') }}" method="POST" class="d-flex gap-2" novalidate>
                            @csrf
                            <input type="text" class="form-control" name="search" placeholder="Patient Id" required>
                            <button type="submit" class="btn btn-primary ml-3">Search</button>
                        </form>
                    </div> --}}
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
                                            <th>Subject</th>
                                            <th>Email</th>
                                            <th>Content</th>
                                            <th>Created_at</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($messages as $message)
                                            <tr>
                                                <td>{{ $message->id }}</td>
                                                <td>{{ $message->name }}</td>
                                                <td>{{ $message->subject }}</td>
                                                <td>{{ $message->email }}</td>
                                                <td>{{ $message->content }}</td>
                                                <td>{{ \Carbon\Carbon::parse($message->created_at)->format('d M Y, h:i A') }}</td>
                                            </tr>
                                            @empty
                                            <div class="text-center alert alert-info">
                                                There is no messages !
                                            </div>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="p-3">
                                {{ $messages->links() }}
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

