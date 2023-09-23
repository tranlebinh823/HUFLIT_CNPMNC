@extends('layouts.app')
@section('module', 'Roles')
@section('action', 'List')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">
                        @can('role-create')
                            <a class="btn btn-info" href="{{ route('admin.roles.create') }}">Create New Roles</a>
                        @endcan
               
                    </h4>
                 
                </div>
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Guard</th>
                                <th>Created_At</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $i)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $i->id }}</td>
                                    <td>{{ $i->name }}</td>
                                    <td>{{ $i->guard_name }}</td>
                                    <td>{{ $i->created_at }}</td>
                                    <td style="text-align:center">
                                        <form action="{{ route('admin.roles.destroy', $i->id) }}" method="POST">
                                            @can('role-show')
                                                <a class="btn btn-info"
                                                    href="{{ route('admin.roles.show', $i->id) }}">Show</a>
                                            @endcan
                                            @can('role-edit')
                                                <a class="btn btn-primary"
                                                    href="{{ route('admin.roles.edit', $i->id) }}">Edit</a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('role-delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->

    
    
@endsection
