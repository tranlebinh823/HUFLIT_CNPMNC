@extends('layouts.app')

@section('module', 'Product')
@section('action', 'List')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="header-title">Product List</h4>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>SubCategory</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_title }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->category_name }}</td>
                        <td>{{ $product->subcategory_name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            @if ($product->status == 0)
                                <span class="badge bg-success">Approve</span>
                            @else
                                <span class="badge bg-danger">Cancel</span>
                            @endif
                        </td>
                        <<td>
                            @can('product-show')
                                <a href="{{ route('admin.products.show', ['id' => $product->id]) }}"
                                    class="btn btn-info btn-sm" title="Info"><i
                                        class="ri-eye-line"></i></a>
                            @endcan
                            @can('product-edit')
                                <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}"
                                    class="btn btn-primary btn-sm" title="Edit"><i
                                        class="ri-edit-box-line"></i></a>
                            @endcan
                            @can('product-delete')
                                <a href="{{ route('admin.products.destroy', ['id' => $product->id]) }}"
                                    data-confirm="Are you sure to delete this item?"
                                    class="btn btn-primary btn-sm delete-btn"><i
                                        class="ri-delete-bin-fill"></i></a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{ $products->links() }}
        </div>
    </div>
</div>
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
