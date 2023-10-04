@extends('layouts.app')
@section('module', 'Danh Mục')
@section('action', 'Chỉnh Sửa')

@section('content')
    <div class="container-fluid">
        <!-- Page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Chỉnh sửa danh mục</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.categories.update', ['id' => $item->id]) }}" method="post">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="category_name" class="col-3 col-form-label">Tên danh mục</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" id="category_name" name="category_name"
                                        value="{{ $item->category_name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="slug" class="col-3 col-form-label">Slug</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        value="{{ $item->slug }}">
                                </div>
                            </div>
                            <div class="justify-content-end row">
                                <div class="col-9">
                                    <button type="submit" class="btn btn-info">Cập nhật</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div>
        </div>
    </div>
    <script>
        // Lắng nghe sự kiện khi nhập "product_name"
        document.getElementById('category_name').addEventListener('input', function() {
            // Lấy giá trị "product_name" và tạo "slug"
            var categoryName = this.value;
            var slug = categoryName.toLowerCase().replace(/ /g, '-');

            // Cập nhật giá trị "slug" lên giao diện người dùng
            document.getElementById('slug').value = slug;
        });
    </script>
@endsection
