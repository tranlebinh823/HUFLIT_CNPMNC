@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.roles.index') }}"> Back</a>
            </div>
        </div>
    </div>

   

    <form action="{{ route('admin.roles.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" placeholder="Name" class="form-control">
                </div>
            </div>
            <style>
                .permissions-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                    /* Cài đặt số cột và chiều rộng tối thiểu */
                    grid-gap: 10px;
                    /* Khoảng cách giữa các quyền */
                }

                .permission-item {
                    display: flex;
                    align-items: center;
                }

                .permission-item input[type="checkbox"] {
                    margin-right: 5px;
                    /* Khoảng cách giữa checkbox và label */
                }
            </style>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quyền:</strong>
                    <div class="permissions-grid">
                        @foreach ($permission as $value)
                            <label class="permission-item">
                                <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="name">
                                {{ $value->name }}
                           
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@endsection
