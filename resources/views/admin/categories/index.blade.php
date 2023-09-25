@extends('layouts.app')
@section('module','Category')
@section('action','List')
@section('content')
<<<<<<< Updated upstream
<<<<<<< Updated upstream
=======
=======
>>>>>>> Stashed changes
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Manage Categories</h2>
        </div>
        <div class="pull-right">
            @can('category-create')
            <a class="btn btn-success" href="{{ route('admin.categories.create') }}"> Create New Category</a>
            @endcan
        </div>
    </div>
</div>
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">
                                @can('category-create')
                                <a class="btn btn-info" href="{{route('admin.categories.create')}}">Create New </a>
                                @endcan
                            </h4>
                          
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

<<<<<<< Updated upstream
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div> <!-- end row-->
@endsection
=======

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Category Name</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($categories as $category)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $category->category_name }}</td>
        <td>
            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('admin.categories.show', $category->id) }}">Show</a>
                @can('category-edit')
                <a class="btn btn-primary" href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
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
</table>

{!! $categories->links() !!}

@endsection
>>>>>>> Stashed changes
