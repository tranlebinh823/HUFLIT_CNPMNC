@extends('layouts.app')
@section('module', 'Child Category')
@section('action', 'Edit')



@section('content')
    <div class="card">
        <form action="{{ route('admin.childcategories.update', ['id' => $item->id]) }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Child Category</label>
                    <input type="text" class="form-control" name="childcategory_name" placeholder="implant"
                        value="{{ $item->childcategory_name }}">
                </div>

                <div class="form-group">
                    <label for="exampleSelectRounded0">Category</label>
                    <select class="custom-select" id="subcategory_id" name="subcategory_id">
                        @foreach ($item_cat as $loz)
                            <option value="{{ $loz->id }}">{{ $loz->subcategory_name }}</option>
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
