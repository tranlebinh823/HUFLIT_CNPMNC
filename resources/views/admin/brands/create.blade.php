@extends('layouts.app')
@section('module', 'Brand')
@section('action', 'Create')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Create Brand</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.brands.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mb-3">
                        <div class="custom-file">
                            <span class="input-group-text">Tải ảnh lên</span>
                            <div class="input-group-append btn btn-info">
                                <input type="file" class="custom-file-input" id="logoInput" name="logo" onchange="previewImage()">
                            </div>
                        </div>
                    </div>
                    <!-- Image Preview -->
                    <div class="mb-3">
                        <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 100%; max-height: 200px; display: none;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Is Featured</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_featured" value="1">
                            <label class="form-check-label" for="is_featured_yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_featured" value="0">
                            <label class="form-check-label" for="is_featured_no">No</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="1">
                            <label class="form-check-label" for="status_active">Active</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="0">
                            <label class="form-check-label" for="status_inactive">Inactive</label>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Create Brand</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function previewImage() {
    var input = document.getElementById('logoInput');
    var imagePreview = document.getElementById('imagePreview');
    
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            imagePreview.style.display = 'block';
            imagePreview.src = e.target.result;
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
