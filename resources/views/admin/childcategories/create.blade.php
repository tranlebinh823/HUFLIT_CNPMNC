@extends('layouts.app')
@section('module', 'Child Category')
@section('action', 'Create')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.subcategories.index') }}"> Back</a>
            </div>
        </div>
    </div>

 

    <form action="{{ route('admin.childcategories.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ChildCategory Name:</strong>
                    <input type="text" name="childcategory_name" class="form-control" placeholder="ChildCategory Name">
                </div>
            </div>
        
            
            <div class="mb-3">
                <label for="example-select" class="form-label">Category</label>
                <select class="form-select" id="example-select" id="subcategory_id" name="subcategory_id">
                    <option value=""></option>
                    @foreach ($item as $loz)
                        <option  value="{{$loz->id}}">{{$loz->subcategory_name}}</option>
                        
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
