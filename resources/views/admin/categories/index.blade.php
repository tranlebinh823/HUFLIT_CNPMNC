@extends('layouts.app')
@section('module','Category')
@section('action','List')
@section('content')
   
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">
                                @can('category-create')
                                <a class="btn btn-info" href="{{route('admin.categories.create')}}">Create New Category</a>
                                @endcan
                            </h4>
                            <p class="text-muted mb-0">
                             
                            </p>
                        </div>
                        <div class="card-body">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Created_At</th>
                                        <th style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item as $i)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $i->id }}</td>
                                            <td>{{ $i->category_name }}</td>
                                            <td>{{ $i->created_at }}</td>
                                            <td style="text-align:center">
                                                <form action="{{ route('admin.categories.destroy', $i->id) }}" method="POST">
                                                    @can('category-show')
                                                    <a class="btn btn-info" href="{{ route('admin.categories.show', $i->id) }}">Show</a>
                                                    @endcan
                                                    @can('category-edit')
                                                        <a class="btn btn-primary" href="{{ route('admin.categories.edit', $i->id) }}">Edit</a>
                                                    @endcan
                            
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('category-delete')
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






        </div> <!-- container -->

    </div> <!-- content -->
@endsection