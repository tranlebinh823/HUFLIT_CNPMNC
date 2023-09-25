@extends('layouts.app')
@section('module', 'Child Category')
@section('action', 'List')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">
                        @can('category-create')
                            <a class="btn btn-info" href="{{ route('admin.childcategories.create') }}">Create New</a>
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
                                <th>Sub Category Name</th>
                                <th>Child Category Name</th>
                                <th style="text-align:center" width="280px">Action</th>
                            </tr>
                        </thead>
                        @foreach ($item as $lozchild)
                            <tbody>
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $lozchild->id }}</td>
                                    <td>{{ $lozchild->category_name }}</td>
                                    <td>{{ $lozchild->subcategory_name }}</td>
                                    <td>{{ $lozchild->childcategory_name }}</td>

                                    <td style="text-align:center">
                                        <form action="{{ route('admin.childcategories.destroy', $lozchild->id) }}"
                                            method="POST">
                                            @can('childcategory-show')
                                                <a class="btn btn-info"
                                                    href="{{ route('admin.childcategories.show', $lozchild->id) }}">Show</a>
                                            @endcan
                                            @can('childcategory-edit')
                                                <a class="btn btn-primary"
                                                    href="{{ route('admin.childcategories.edit', $lozchild->id) }}">Edit</a>
                                            @endcan

                                            @csrf
                                            @method('DELETE')
                                            @can('childcategory-delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->
@endsection
