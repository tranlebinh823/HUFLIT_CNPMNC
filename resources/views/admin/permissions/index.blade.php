@extends('layouts.app')
@section('module', 'Permission')
@section('action', 'List')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Quản lý permissions</h2>
        </div>
        <div class="pull-right">
            @can('permission-create')
                <a class="btn btn-success" href="{{ route('admin.permissions.create') }}"> Tạo Permission Mới</a>
            @endcan
        </div>
    </div>
</div>



<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($permissions as $key => $permission)
    <tr>

        <td>{{ $permission->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('admin.permissions.show', $permission->id) }}">Xem</a>
            @can('permission-edit')
                <a class="btn btn-primary" href="{{ route('admin.permissions.edit', $permission->id) }}">Sửa</a>
            @endcan
            @can('permission-delete')
                <a class="btn btn-danger" href="{{ route('admin.permissions.destroy', $permission->id) }}"
                   onclick="event.preventDefault(); if (confirm('Bạn có chắc muốn xóa permission này?')) document.getElementById('delete-form-{{ $permission->id }}').submit();"
                >
                    Xóa
                </a>
                <form id="delete-form-{{ $permission->id }}" action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            @endcan
        </td>
    </tr>
    @endforeach
</table>



@endsection
