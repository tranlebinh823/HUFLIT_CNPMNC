@extends('layouts.app')
@section('module', 'Vendor')
@section('action', 'List')


            @if (Auth::user()->name === 'vendor')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">
                    @can('brand-create')
                    <a class="btn btn-info" href="{{ route('admin.vendors.create') }}">Create New</a>
                    @endcan
                </h4>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr style="text-align:center">
                            <th>STT</th>
                            <th>ID</th>
                            <th>Banner</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th>FB_link</th>
                            <th>TW_link</th>
                            <th>INS_link</th>
                            <th>Created At</th>
                            <th style="text-align:center">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item as $i)
                        <tr style="text-align:center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $i->id }}</td>
                            <td>{{ $i->banner }}</td>
                            <td>{{ $i->phone }}</td>
                            <td>{{ $i->email  }}</td>
                            <td>{{ $i->address}}</td>
                            <td>{{ $i->description }}</td>
                            <td>{{ $i->fb_link }}</td>
                            <td>{{ $i->tw_link }}</td>
                            <td>{{ $i->category_name }}</td>
                            <td>{{ $i->name }}</td>
                            <td>{{ $i->insta_link }}</td>
                            <td>{{ $i->created_at }}</td>

                            <td style="text-align:center">
                                <form action="{{ route('admin.vendors.destroy', $i->id) }}" method="POST">
                                    @can('vendor-show')
                                    <a class="btn btn-info" href="{{ route('admin.vendors.show', $i->id) }}">Show</a>
                                    @endcan
                                    @can('vendor-edit')
                                    <a class="btn btn-primary" href="{{ route('admin.vendors.edit', $i->id) }}">Edit</a>
                                    @endcan
                                    @csrf
                                    @method('DELETE')
                                    @can('vendor-delete')
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
@endif