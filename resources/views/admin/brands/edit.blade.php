@extends('layouts.app')
@section('module', 'Brand')
@section('action', 'Edit')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Brand</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.brands.index') }}"> Back</a>
        </div>
    </div>
</div>

<form action="{{route('admin.brands.update',['id'=>$item->id])}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Logo:</strong>
                <input type="file" name="logo" class="form-control" id="logoInput">
                <img id="imagePreview" src="{{ asset('upload/' . $item->logo) }}" alt="avatar" width="120">

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $item->name }}" class="form-control" placeholder="Brand Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Slug:</strong>
                <input type="text" name="slug" value="{{ $item->slug }}" class="form-control" placeholder="Slug">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Is Featured:</strong>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_featured" value="1" {{ $item->is_featured ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_featured_yes">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_featured" value="0" {{ !$item->is_featured ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_featured_no">No</label>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="1" {{ $item->status ? 'checked' : '' }}>
                    <label class="form-check-label" for="status_active">Active</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="0" {{ !$item->status ? 'checked' : '' }}>
                    <label class="form-check-label" for="status_inactive">Inactive</label>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update Brand</button>
        </div>
    </div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const logoInput = document.getElementById('logoInput');
        const imagePreview = document.getElementById('imagePreview');

        logoInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                }

                reader.readAsDataURL(this.files[0]);
            }
        });
    });

</script>
@endsection
