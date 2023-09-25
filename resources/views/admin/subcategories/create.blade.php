@extends('layouts.app')
@section('module', 'Sub Category')
@section('action', 'Create')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Sub Category</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.categories.index') }}"> Back</a>
        </div>
    </div>
</div>



<form action="{{ route('admin.subcategories.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sub Category Name:</strong>
                <input type="text" name="subcategory_name" class="form-control" placeholder="Category Name">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="exampleSelectRounded0">Category</label>
                <select name="category_id" class="form-control">
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

<p class="text-center text-primary"><small>Tutorial by LaravelTuts.com</small></p>
@endsection
