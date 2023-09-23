@extends('layouts.app')
@section('module', 'Child Category')
@section('action', 'List')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Manage ChildCategories</h2>
            </div>
            <div class="pull-right">
                @can('childcategory-create')
                    <a class="btn btn-success" href="{{ route('admin.childcategories.create') }}"> Create New ChildCategory</a>
                @endcan
            </div>
        </div>
    </div>

   

    <table class="table table-bordered">
        <tr>
            <th>Childcategory Name</th>
            <th>SubCateagory Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($item as $lozchild)
            <tr>
                <td>{{ $lozchild->childcategory_name }}</td>
                <td>{{ $lozchild->subcategory_name }}</td>
                <td>
                    <form action="{{ route('admin.childcategories.destroy', $lozchild->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('admin.childcategories.show', $lozchild->id) }}">Show</a>
                        @can('childcategory-edit')
                            <a class="btn btn-primary" href="{{ route('admin.childcategories.edit', $lozchild->id) }}">Edit</a>
                        @endcan

                        @csrf
                        @method('DELETE')
                        @can('childcategory-delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


@endsection
