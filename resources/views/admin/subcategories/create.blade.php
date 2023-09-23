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
                <label for="exampleSelectRounded0">Category</label>
                <select class="custom-select" id="category_id" name="category_id">
                    <option value=""></option>
                    @foreach ($item as $loz)
                        <option  value="{{$loz->id}}">{{$loz->category_name}}</option>
                        
                    @endforeach
                </select>
              </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    <p class="text-center text-primary"><small>Tutorial by LaravelTuts.com</small></p>
@endsection
