@extends('admin.layouts.master')

@section('admin-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Reports</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">All Reports</li>
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
                        <form action="{{ route('report.search') }}" method="POST" class="d-flex gap-2" novalidate>
                            @csrf
                            <input type="text" class="form-control" name="search" placeholder="Patient Id" required>
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
                                            <th>Doctot Name</th>
                                            <th>Patient Name</th>
                                            <th>Report</th>
                                            <th class="text-center">Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($reports as $report)
                                            <tr>
                                                <td>{{ $report->user->id }}</td>
                                                <td>{{ $report->doctor->name }}</td>
                                                <td>{{ $report->user->name }}</td>
                                                <td>{{ $report->report }}</td>
                                                
                                                <th class="text-center">
                                                    <form action="{{ route('report.delete', ['report' => $report->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </th>
                                            </tr>
                                            @empty
                                            <div class="text-center alert alert-info">
                                                There is no reports !
                                            </div>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="p-3">
                                {{ $reports->links() }}
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
