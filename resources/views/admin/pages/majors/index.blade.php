@extends('admin.layouts.master')

@section('admin-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Major</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add Major</li>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Bordered Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th>Image Name</th>
                                            <th>Image</th>
                                            <th class="text-center">Edit</th>
                                            <th class="text-center">Delete</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        @foreach ($majors as $major )
                                        <tr>
                                            <td>{{ $major->id }}</td>
                                            <td>{{ $major->name }}</td>
                                            <td>{{ $major->image }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/majors/'.$major->image) }}" width="150px">
                                            </td>
                                            <th class="text-center">
                                                <a href="" class="btn btn-info">Edit</a>
                                            </th>
                                            <th class="text-center">
                                                <a href="" class="btn btn-danger">Delete</a>
                                            </th>
                                        </tr>
                                        @endforeach
 
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="p-3">
                                {{ $majors->links() }}
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
