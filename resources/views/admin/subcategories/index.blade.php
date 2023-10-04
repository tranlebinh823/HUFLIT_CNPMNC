@extends('layouts.app')
@section('module', 'Danh Mục Con')
@section('action', 'Danh Sách')

@section('content')
    <div class="container-fluid">
        <!-- Page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Danh sách danh mục con</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">Tạo Danh Mục Con</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.subcategories.store') }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="subcategory_name" class="col-3 col-form-label">Tên Danh Mục Con : </label>
                                <div class="col-9">
                                    <input type="text" class="form-control" id="subcategory_name" name="subcategory_name"
                                        placeholder="">
                                    @error('subcategory_name')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="slug" class="col-3 col-form-label">Slug : </label>
                                <div class="col-9">
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="category_id">Danh Mục : </label>
                                <select id="category_id" name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="justify-content-end row mt-5">
                                <div class="col-9">
                                    <button type="submit" class="btn btn-info">Confirm</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="p-3">
                            <div class="card-widgets">
                                <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                <a data-bs-toggle="collapse" href="#category-list-collapse" role="button"
                                    aria-expanded="false" aria-controls="category-list-collapse"><i
                                        class="ri-subtract-line"></i></a>
                                <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                            </div>
                            <h5 class="header-title mb-0">Danh sách danh mục</h5>
                        </div>

                        <div id="category-list-collapse" class="collapse show">
                            <div class="table-responsive">
                                <table class="table table-nowrap table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Danh mục</th>
                                            <th>Danh mục con</th>
                                            <th>Slug</th>
                                            <th>Ngày Tạo</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->category_name }}</td>
                                                <td>{{ $item->subcategory_name }}</td>
                                                <td>{{ $item->slug }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    @can('subcategory-show')
                                                        <a href="{{ route('admin.subcategories.show', ['id' => $item->id]) }}"
                                                            class="btn btn-info btn-sm" title="Info"><i
                                                                class="ri-eye-line"></i></a>
                                                    @endcan
                                                    @can('subcategory-edit')
                                                        <a href="{{ route('admin.subcategories.edit', ['id' => $item->id]) }}"
                                                            class="btn btn-primary btn-sm" title="Edit"><i
                                                                class="ri-edit-box-line"></i></a>
                                                    @endcan
                                                    @can('subcategory-delete')
                                                        <a href="{{ route('admin.subcategories.destroy', ['id' => $item->id]) }}"
                                                            data-confirm="Are you sure to delete this item?"
                                                            class="btn btn-primary btn-sm delete-btn"><i
                                                                class="ri-delete-bin-fill"></i></a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-->
            </div>
        </div>
    </div>
    <script>
        // Lắng nghe sự kiện khi nhập "product_name"
        document.getElementById('subcategory_name').addEventListener('input', function() {
            // Lấy giá trị "product_name" và tạo "slug"
            var categoryName = this.value;
            var slug = categoryName.toLowerCase().replace(/ /g, '-');

            // Cập nhật giá trị "slug" lên giao diện người dùng
            document.getElementById('slug').value = slug;
        });
    </script>
    <script>
        // Lắng nghe sự kiện nhấp vào nút xóa
        document.querySelectorAll('.delete-btn').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                var confirmMessage = button.getAttribute('data-confirm');
                if (confirm(confirmMessage)) {
                    // Nếu người dùng xác nhận xóa, chuyển hướng đến route xóa
                    window.location.href = button.getAttribute('href');
                }
            });
        });
    </script>
@endsection
