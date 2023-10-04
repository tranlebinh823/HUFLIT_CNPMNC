@extends('layouts.app')
@section('module', 'Product')
@section('action', 'Create')

@section('content')

    <!-- Quill css -->
    <link href="{{ asset('administrator/assets/vendor/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('administrator/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('administrator/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />


    <form method="POST" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Product Title</label>
                            <input type="hidden" class="form-control" id="product_title" name="product_title">
                            <input type="text" class="form-control d-none" id="product-id-input">
                            <input type="text" class="form-control" id="product_title" name="product_title"
                                placeholder="Enter product title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name">

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="slug">Product Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug">
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="header-title">Product Description</h4>
                                    </div>
                                    <div class="form-group">

                                        <textarea id="pro_description" name="pro_description" class="form-control"></textarea>

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Product Short Description</h5>
                                    </div>
                                    <div class="form-group">

                                        <textarea id="short_description" name="short_description" class="form-control"></textarea>

                                    </div>
                                    <!-- end card body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Gallery</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="fs-14 mb-1">Product Image</h5>
                            <p class="text-muted">Add Product main Image.</p>
                            <div class="text-center">
                                <div class="position-relative d-inline-block">
                                    <div class="position-absolute top-100 start-100 translate-middle">
                                        <label for="product-image-input" class="mb-0" data-bs-toggle="tooltip"
                                            data-bs-placement="right" title="Select Image">

                                        </label>
                                        <input type="file" name="images">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div>
                            <h5 class="fs-14 mb-1">Product Gallery</h5>
                            <p class="text-muted">Add Product Gallery Images.</p>

                            <div class="dropzone">
                                <div class="fallback">
                                    <input type="file" name="images_gallery[]" multiple>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
                <!-- end card -->

            </div>
            <!-- end col -->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Publish</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div>
                                <label for="choices-publish-visibility-select" class="form-label">Status</label>
                                <select id="choices-publish-visibility-select" name="status" class="form-control">
                                    <option value="0" selected>Approve</option>
                                    <option value="1">Cancel</option>
                                </select>
                            </div>

                        </div>

                        <div class="mb-3">
                            <label for="choices-publish-visibility-select" class="form-label">Visibility</label>
                            <select id="choices-publish-visibility-select" name="visibility" class="form-control">
                                <option value="0" selected>Public</option>
                                <option value="1">Hidden</option>
                            </select>
                        </div>

                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Publish Schedule</h5>
                    </div>
                    <!-- end card body -->
                    <div class="card-body">
                        <div>
                            <label for="datepicker-publish-input" class="form-label">Publish Date & Time</label>
                            <input type="datetime-local" id="datepicker-publish-input" name="publish"
                                class="form-control" placeholder="Enter publish date" data-provider="flatpickr"
                                data-date-format="d.m.y" data-enable-time>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Categories</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-2"> <a href="#" class="float-end text-decoration-underline">Add
                                New</a>Select product category</p>
                        <select id="category_id" name="category_id" class="form-select">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        <p class="text-muted mb-2"> <a href="#" class="float-end text-decoration-underline">Add
                                New</a>Select product sub category</p>
                        <select id="sub_category_id" name="sub_category_id" class="form-select">
                            @foreach ($subCategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Tags</h5>
                    </div>
                    <div class="card-body">
                        <div class="hstack gap-3 align-items-start">
                            <div class="flex-grow-1">
                                <input class="form-control" data-choices data-choices-multiple-remove="true"
                                    placeholder="Enter tags" name="product_tag" type="text" />
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Manage Product</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="hstack gap-3 align-items-start">
                                    <div class="flex-grow-1">
                                        <label for="offer_price">Stock : </label>

                                        <input class="form-control" data-choices data-choices-multiple-remove="true"
                                            name="stock" type="number" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="hstack gap-3 align-items-start">
                                    <div class="flex-grow-1">
                                        <label for="offer_price">Offer Price : </label>

                                        <input class="form-control" data-choices data-choices-multiple-remove="true"
                                            name="offer_price" type="number" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="hstack gap-3 align-items-start">
                                    <div class="flex-grow-1">
                                        <label for="price">Price:</label>
                                        <input class="form-control" data-choices data-choices-multiple-remove="true"
                                            name="price" type="number" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>




                <!-- end card -->

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        <!-- end card -->
        <div class="text-end mb-3">
            <button type="submit" class="btn btn-primary w-sm">Submit</button>
        </div>
    </form>
    <!-- Quill Editor js -->
    <script src="{{ asset('administrator/assets/vendor/quill/quill.min.js') }}"></script>

    <!-- Quill Demo js -->
    <script src="{{ asset('administrator/assets/js/pages/quilljs.init.js') }}"></script>
    <script>
        // Lắng nghe sự kiện khi nhập "product_name"
        document.getElementById('product_name').addEventListener('input', function() {
            // Lấy giá trị "product_name" và tạo "slug"
            var productName = this.value;
            var slug = productName.toLowerCase().replace(/ /g, '-');

            // Cập nhật giá trị "slug" lên giao diện người dùng
            document.getElementById('slug').value = slug;
        });
    </script>

@endsection
