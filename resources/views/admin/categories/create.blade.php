@extends('layouts.app')
@section('module', 'Category')
@section('action', 'Create')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">Custom styles</h4>
                    <p class="text-muted mb-0">Custom feedback styles apply custom colors, borders,
                        focus styles, and background
                        icons to better communicate feedback. Background icons for
                        <code>&lt;select&gt;</code>s are only available with
                        <code>.form-select</code>, and not <code>.form-control</code>.
                    </p>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Category Name</label>
                            <input type="text" class="form-control" id="validationCustom01" 
                                name="category_name">
                        </div>
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    @endsection
