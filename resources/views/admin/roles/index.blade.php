@extends('layouts.app')

@section('module','Role')
@section('action','Index')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Quản lý Vai trò</h2>
        </div>
        <div class="pull-right">
            @can('role-create')
                <a class="btn btn-success" href="{{ route('admin.roles.create') }}"> Tạo Vai trò Mới</a>
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
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('admin.roles.show',$role->id) }}">Xem</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('admin.roles.edit',$role->id) }}">Sửa</a>
            @endcan
            @can('role-delete')
                <a class="btn btn-danger" href="{{ route('admin.roles.destroy', $role->id) }}"
                   onclick="event.preventDefault(); if (confirm('Bạn có chắc muốn xóa vai trò này?')) document.getElementById('delete-form-{{ $role->id }}').submit();"
                >
                    Xóa
                </a>
                <form id="delete-form-{{ $role->id }}" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            @endcan
        </td>
    </tr>
    @endforeach
</table>

{!! $roles->render() !!}

@endsection
