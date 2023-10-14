@extends('layouts.app')
@section('module', 'Product')
@section('action', 'List')
@section('content')

<div class="row">
    <div class="col-3">
    </div>
    <div class="col-9">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Product List</h4>
                <h4 class="header-title">@can('product-create')
                    <a class="btn btn-info" href="{{ route('admin.products.create') }}">Create New</a>
                    @endcan
                </h4>
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
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Ngày tạo</th>
                            <th>Tình trạng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td rowspan="2"><img src="{{ asset('upload/' . $product->images) }}" alt="avatar" height="120px" width="120px"></td>
                                        <td style="font-weight: bold; font-size: 16px;">
                                            {{ $product->product_title }}<br>
                                            {{ $product->product_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 14px;">
                                            {{ $product->category_name }}<br>
                                            {{ $product->subcategory_name }}
                                        </td>
                                    </tr>
                                </table>
                            </td>


                            <td>{{ $product->price }}</td>
                            <td>{{ $product->created_at }}</td>
                            <td>
                                @if ($product->status == 0)
                                <span class="badge bg-success">Approve</span>
                                @else
                                <span class="badge bg-danger">Cancel</span>
                                @endif
                            </td>
                            <<td>
                                @can('product-show')
                                <a href="{{ route('admin.products.show', ['id' => $product->id]) }}" class="btn btn-info btn-sm" title="Info"><i class="ri-eye-line"></i></a>
                                @endcan
                                @can('product-edit')
                                <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}" class="btn btn-primary btn-sm" title="Edit"><i class="ri-edit-box-line"></i></a>
                                @endcan
                                @can('product-delete')
                                <a href="{{ route('admin.products.destroy', ['id' => $product->id]) }}" data-confirm="Are you sure to delete this item?" class="btn btn-primary btn-sm delete-btn"><i class="ri-delete-bin-fill"></i></a>
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
