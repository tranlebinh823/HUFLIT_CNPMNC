@extends('layouts.app')
@section('module', 'Permission')
@section('action', 'Edit')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Permission</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.permissions.index') }}"> Back</a>
            </div>
        </div>
    </div>

  

    <form action="{{ route('admin.permissions.update',['id'=>$item->id]) }}" method="POST">
        @csrf
   
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $item->name }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>

@endsection
