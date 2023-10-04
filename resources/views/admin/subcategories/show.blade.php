@extends('layouts.app')
@section('module', 'Sub Category')
@section('action', 'Show')

@section('content')
    <div class="container-fluid">
        <!-- Page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Thông tin danh mục con</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Chi tiết danh mục</h5>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">ID</th>
                                    <td>{{ $item->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tên danh mục cha</th>
                                    <td>{{ $item->parent_category_name }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Tên danh mục con</th>
                                    <td>{{ $item->subcategory_name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Slug</th>
                                    <td>{{ $item->slug }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Ngày tạo</th>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('admin.subcategories.index') }}" class="btn btn-primary">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
