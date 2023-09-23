@extends('layouts.app')
@section('module', 'Child Category')
@section('action', 'Show')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Child Category Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.childcategories.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Child Category Name:</strong>
                {{ $item->category_name }}
            </div>
        </div>
    </div>
@endsection

