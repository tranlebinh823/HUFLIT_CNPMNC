@extends('layouts.app')

@section('module', 'Product')
@section('action', 'Edit')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between" >
                <h4 class="header-title">Edit</h4>
                <h4 class="header-title">
                    <a class="btn btn-info" href="{{ route('admin.products.index') }}">Quay về</a>
                </h4>
            </div>
            <div class="card-body">
                @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <form action="{{ route('admin.products.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name:</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}">
                    </div>

                    <div class="mb-3">
                        <label for="product_title" class="form-label">Product Title:</label>
                        <input type="text" class="form-control" id="product_title" name="product_title" value="{{ $product->product_title }}">
                    </div>

                    <div class="mb-3">
                        <label for="pro_description" class="form-label">Product Description:</label>
                        <textarea class="form-control" id="pro_description" name="pro_description">{{ $product->pro_description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="images" class="form-label">Product Image:</label>
                        <input type="file" class="form-control" id="images" name="images">
                        <img src="{{ asset('upload/' . $product->images) }}" alt="Product Image" height="120px" width="120px">
                    </div>

                    <div class="mb-3">
                        <label for="images_gallery" class="form-label">Product Images Gallery:</label>
                        <input type="file" class="form-control" id="images_gallery" name="images_gallery[]" multiple>
                        @if (!empty($product->images_gallery))
                        @foreach (json_decode($product->images_gallery) as $galleryImage)
                        <img src="{{ asset('assets/' . $galleryImage) }}" alt="Gallery Image" height="120px" width="120px">
                        @endforeach
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="short_description" class="form-label">Short Description:</label>
                        <textarea class="form-control" id="short_description" name="short_description">{{ $product->short_description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock:</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $product->price }}">
                    </div>

                    <div class="mb-3">
                        <label for="offer_price" class="form-label">Offer Price:</label>
                        <input type="number" step="0.01" class="form-control" id="offer_price" name="offer_price" value="{{ $product->offer_price }}">
                    </div>

                    <div class="mb-3">
                        <label for="product_tag" class="form-label">Product Tag:</label>
                        <input type="text" class="form-control" id="product_tag" name="product_tag" value="{{ $product->product_tag }}">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <select class="form-select" id="status" name="status">
                            <option value="0" @if($product->status == 0) selected @endif>Approve</option>
                            <option value="1" @if($product->status == 1) selected @endif>Cancel</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="visibility" class="form-label">Visibility:</label>
                        <select class="form-select" id="visibility" name="visibility">
                            <option value="0" @if($product->visibility == 0) selected @endif>Hidden</option>
                            <option value="1" @if($product->visibility == 1) selected @endif>Visible</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="publish" class="form-label">Publish Date:</label>
                        <input type="datetime-local" class="form-control" id="publish" name="publish" value="{{ date('Y-m-d\TH:i', strtotime($product->publish)) }}">
                    </div>

                    <div class="mb-3">
                        <label for="sub_category_id" class="form-label">Subcategory:</label>
                        <select class="form-select" id="sub_category_id" name="sub_category_id">
                            @foreach ($subCategories as $subcategory)
                            <option value="{{ $subcategory->id }}" @if($subcategory->id == $product->sub_category_id) selected @endif>{{ $subcategory->subcategory_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category:</label>
                        <select class="form-select" id="category_id" name="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
