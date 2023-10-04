@extends('layouts.app')

@section('module', 'Product')
@section('action', 'Detail')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="header-title">{{ $product->product_title }}</h4>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <strong>Product Name:</strong> {{ $product->product_name }}
        </div>
        <div class="mb-3">
            <strong>Product Slug:</strong> {{ $product->slug }}
        </div>
        <div class="mb-3">
            <strong>Category:</strong> {{ $product->category_name }}
        </div>
        <div class="mb-3">
            <strong>Subcategory:</strong> {{ $product->subcategory_name }}
        </div>
        <div class="mb-3">
            <strong>Price:</strong> {{ $product->price }}
        </div>
        <div class="mb-3">
            <strong>Status:</strong> {{ $product->status == 0 ? 'Approve' : 'Cancel' }}
        </div>
        <div class="mb-3">
            <strong>Created At:</strong> {{ $product->created_at }}
        </div>

        <div class="mb-3">
            <strong>Description:</strong>
            <p>{!! $product->pro_description !!}</p>
        </div>

        <div class="mb-3">
            <strong>Product Images:</strong>
            <div class="row">
                @if ($product->images)
                    <div class="col-md-6">
                        <img src="{{ asset('upload/' . $product->images) }}" alt="Product Image" class="img-fluid">
                    </div>
                @endif
                @if ($product->images_gallery)
                    @foreach (json_decode($product->images_gallery) as $image)
                        <div class="col-md-6">
                            <img src="{{ asset('assets/' . $image) }}" alt="Gallery Image" class="img-fluid">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
