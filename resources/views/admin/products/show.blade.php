@extends('layouts.app')
@section('module', 'Product')
@section('action', 'Show')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header  d-flex justify-content-between">
                <h4 class="header-title" >Details</h4>
                <h4 class="header-title">
                    <a class="btn btn-info" href="{{ route('admin.products.index') }}">Quay về</a>
                </h4>
            </div>
            <div class="card-body">

                @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <table class="table table-bordered">
                    <tr>
                        <th>ID:</th>
                        <td>{{ $product->id }}</td>
                    </tr>
                    <tr>
                        <th>Product Name:</th>
                        <td>{{ $product->product_name }}</td>
                    </tr>
                    <tr>
                        <th>Product Title:</th>
                        <td>{{ $product->product_title }}</td>
                    </tr>
                    <tr>
                        <th>Slug:</th>
                        <td>{{ $product->slug }}</td>
                    </tr>
                    <tr>
                        <th>Product Description:</th>
                        <td>{{ $product->pro_description }}</td>
                    </tr>
                    <tr>
                        <th>Images:</th>
                        <td>
                            <img src="{{ asset('upload/' . $product->images) }}" alt="Product Image" height="120px" width="120px">
                        </td>
                    </tr>
                    <tr>
                        <th>Images Gallery:</th>
                        <td>
                            @if (!empty($product->images_gallery))
                            @foreach (json_decode($product->images_gallery) as $galleryImage)
                            <img src="{{ asset('assets/' . $galleryImage) }}" alt="Gallery Image" height="120px" width="120px">
                            @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Short Description:</th>
                        <td>{{ $product->short_description }}</td>
                    </tr>
                    <tr>
                        <th>Stock:</th>
                        <td>{{ $product->stock }}</td>
                    </tr>
                    <tr>
                        <th>Price:</th>
                        <td>{{ $product->price }}</td>
                    </tr>
                    <tr>
                        <th>Offer Price:</th>
                        <td>{{ $product->offer_price }}</td>
                    </tr>
                    <tr>
                        <th>Product Tag:</th>
                        <td>{{ $product->product_tag }}</td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td>
                            @if ($product->status == 0)
                            <span class="badge bg-success">Approve</span>
                            @else
                            <span class="badge bg-danger">Cancel</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Visibility:</th>
                        <td>
                            @if ($product->visibility == 0)
                            Hidden
                            @else
                            Visible
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Publish Date:</th>
                        <td>{{ $product->publish }}</td>
                    </tr>
                    <tr>
                        <th>Category:</th>
                        <td>{{ $product->category_name }}</td>
                    </tr>
                    <tr>
                        <th>Subcategory:</th>
                        <td>{{ $product->subcategory_name }}</td>
                    </tr>
                </table>

                <div class="mt-3">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
