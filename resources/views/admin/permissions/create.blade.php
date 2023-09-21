@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Permission</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.permissions.index') }}"> Back</a>
            </div>
        </div>
    </div>

   

    <form action="{{ route('admin.permissions.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" placeholder="Name" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    <p class="text-center text-primary"><small>Tutorial by LaravelTuts.com</small></p>
@endsection
