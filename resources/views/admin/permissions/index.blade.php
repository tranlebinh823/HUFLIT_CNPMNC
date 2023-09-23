@extends('layouts.app')
@section('module', 'Permission')
@section('action', 'List')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">
                        @can('permission-create')
                            <a class="btn btn-info" href="{{ route('admin.permissions.create') }}">Create New Permission</a>
                        @endcan
               
                    </h4>
                    <div class="mt-3">
                        <form id="filterForm">
                            <div class="form-group">
                                <label for="filterName">Lọc theo tên Permission:</label>
                                <select class="form-control" id="filterName" name="filterName">
                                    <option value="">Chọn tên Permission</option>
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary" id="applyFilter">Áp dụng Lọc</button>
                            <button type="button" class="btn btn-secondary" id="resetFilter">Đặt lại</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Guard</th>
                                <th>Created_At</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $i)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $i->id }}</td>
                                    <td>{{ $i->name }}</td>
                                    <td>{{ $i->guard_name }}</td>
                                    
                                    <td>{{ $i->created_at }}</td>
                                    <td style="text-align:center">
                                        <form action="{{ route('admin.permissions.destroy', $i->id) }}" method="POST">
                                            @can('permission-show')
                                                <a class="btn btn-info"
                                                    href="{{ route('admin.permissions.show', $i->id) }}">Show</a>
                                            @endcan
                                            @can('permission-edit')
                                                <a class="btn btn-primary"
                                                    href="{{ route('admin.permissions.edit', $i->id) }}">Edit</a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('permission-delete')
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

    <script>
        document.getElementById('applyFilter').addEventListener('click', function () {
            var filterName = document.getElementById('filterName').value.toLowerCase();
            var table = document.getElementById('datatable-buttons');
            var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
            
            for (var i = 0; i < rows.length; i++) {
                var nameCell = rows[i].getElementsByTagName('td')[2]; // Assuming the name is in the 3rd column
                var nameText = nameCell.textContent.toLowerCase();
                
                if (filterName === '' || nameText.startsWith(filterName)) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        });
    
        document.getElementById('resetFilter').addEventListener('click', function () {
            document.getElementById('filterName').value = '';
            var table = document.getElementById('datatable-buttons');
            var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
            
            for (var i = 0; i < rows.length; i++) {
                rows[i].style.display = '';
            }
        });
    </script>
    
@endsection
