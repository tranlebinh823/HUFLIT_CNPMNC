@extends('layouts.app')


@section('content')
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
