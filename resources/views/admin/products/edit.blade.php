@extends('layouts.app')
@section('module', 'Product')
@section('action', 'Edit')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="header-title">Edit Product</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.products.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label" for="product-title-input">Product Title</label>
                <input type="text" class="form-control" id="product-title-input" name="product_title" value="{{ $product->product_title }}">
            </div>

            <div class="mb-3">
                <label class="form-label" for="product-name-input">Product Name</label>
                <input type="text" class="form-control" id="product-name-input" name="product_name" value="{{ $product->product_name }}">
            </div>

            <div class="mb-3">
                <label class="form-label" for="slug-input">Product Slug</label>
                <input type="text" class="form-control" id="slug-input" name="slug" value="{{ $product->slug }}">
            </div>

            <div class="mb-3">
                <label class="form-label" for="pro-description-input">Product Description</label>
                <textarea id="pro-description-input" name="pro_description" class="form-control">{{ $product->pro_description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label" for="product-image-input">Product Main Image</label>
                <input type="file" class="form-control" id="product-image-input" name="images">
            </div>

            <div class="mb-3">
                <label class="form-label" for="product-gallery-input">Product Gallery Images</label>
                <input type="file" class="form-control" id="product-gallery-input" name="images_gallery[]" multiple>
            </div>

            <div class="mb-3">
                <label class="form-label" for="status-select">Status</label>
                <select class="form-control" id="status-select" name="status">
                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Approve</option>
                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Cancel</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="visibility-select">Visibility</label>
                <select class="form-control" id="visibility-select" name="visibility">
                    <option value="0" {{ $product->visibility == 0 ? 'selected' : '' }}>Public</option>
                    <option value="1" {{ $product->visibility == 1 ? 'selected' : '' }}>Hidden</option>
                </select>
            </div>

            <div class="text-end mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
