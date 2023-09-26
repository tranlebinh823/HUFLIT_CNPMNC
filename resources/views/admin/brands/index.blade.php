@extends('layouts.app')
@section('module', 'Brand')
@section('action', 'List')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">
                    @can('brand-create')
                    <a class="btn btn-info" href="{{ route('admin.brands.create') }}">Create New</a>
                    @endcan
                </h4>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr  style="text-align:center">
                            <th>STT 123123</th>
                            <th>ID</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Is Featured</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($item as $i)
                        <tr  style="text-align:center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $i->id }}</td>
                            <td><img src="{{ asset('upload/' . $i->logo) }}" alt="avatar" height="120" width="120"></td>
                            <td>{{ $i->name }}</td>
                            <td>{{ $i->slug }}</td>
                            <td>{{ $i->is_featured ? 'Yes' : 'No' }}</td>
                            <td>{{ $i->status ? 'Active' : 'Inactive' }}</td>
                            <td>{{ $i->created_at }}</td>
                            <td style="text-align:center">
                                <form action="{{ route('admin.brands.destroy', $i->id) }}" method="POST">
                                    @can('brand-show')
                                    <a class="btn btn-info" href="{{ route('admin.brands.show', $i->id) }}">Show</a>
                                    @endcan
                                    @can('brand-edit')
                                    <a class="btn btn-primary" href="{{ route('admin.brands.edit', $i->id) }}">Edit</a>
                                    @endcan
                                    @csrf
                                    @method('DELETE')
                                    @can('brand-delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
