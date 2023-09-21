@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Manage SubCategories</h2>
            </div>
            <div class="pull-right">
                @can('subcategory-create')
                    <a class="btn btn-success" href="{{ route('admin.subcategories.create') }}"> Create New SubCategory</a>
                @endcan
            </div>
        </div>
    </div>

  

    <table class="table table-bordered">
        <tr>
            <th>SubCategory Name</th>
            <th>Cateagory Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($item as $lozsub)
            <tr>
                <td>{{ $lozsub->subcategory_name }}</td>
                <td>{{ $lozsub->category_name }}</td>
                <td>
                    <form action="{{ route('admin.subcategories.destroy', $lozsub->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('admin.subcategories.show', $lozsub->id) }}">Show</a>
                        @can('subcategory-edit')
                            <a class="btn btn-primary" href="{{ route('admin.subcategories.edit', $lozsub->id) }}">Edit</a>
                        @endcan

                        @csrf
                        @method('DELETE')
                        @can('subcategory-delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


@endsection
