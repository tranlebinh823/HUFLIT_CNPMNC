@extends('layouts.app')
@section('module', 'Sub Category')
@section('action', 'Edit')



@section('content')
    <div class="card">
        <form action="{{ route('admin.subcategories.update', ['id' => $item->id]) }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Sub Category</label>
                    <input type="text" class="form-control" name="subcategory_name" placeholder="implant"
                        value="{{ $item->subcategory_name }}">
                </div>

                <div class="form-group">
                    <label for="exampleSelectRounded0">Category</label>
                    <select class="custom-select" id="category_id" name="category_id">
                        @foreach ($item_cat as $loz)
                            <option value="{{ $loz->id }}">{{ $loz->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <!-- /.card-footer-->
        </form>
    </div>
    <!-- /.card -->
@endsection
