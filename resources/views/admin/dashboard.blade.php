@extends('layouts.app')
@section('module', 'Dashboard')
@section('action', 'List')

@section('content')
  
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <!-- Widgets -->
                <div class="col-xxl-3 col-sm-6">
                    <div class="card widget-flat text-bg-pink">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="ri-eye-line widget-icon"></i>
                            </div>
                            <h6 class="text-uppercase mt-0" title="Category">Total Categories</h6>
                            <h2 class="my-2">{{ $categoryCount }}</h2>
                            <span class="text-nowrap">({{ $startDate->format('F Y') }} to
                                {{ $endDate->format('F Y') }})</span>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-sm-6">
                    <div class="card widget-flat text-bg-purple">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="ri-eye-line widget-icon"></i>
                            </div>
                            <h6 class="text-uppercase mt-0" title="Category">Total SubCategories</h6>
                            <h2 class="my-2">{{ $subcategoryCount }}</h2>
                            <span class="text-nowrap">({{ $startDate->format('F Y') }} to
                                {{ $endDate->format('F Y') }})</span>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-sm-6">
                    <div class="card widget-flat text-bg-primary">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="ri-eye-line widget-icon"></i>
                            </div>
                            <h6 class="text-uppercase mt-0" title="Category">Total ChildCategories</h6>
                            <h2 class="my-2">{{ $childcategoryCount }}</h2>
                            <span class="text-nowrap">({{ $startDate->format('F Y') }} to
                                {{ $endDate->format('F Y') }})</span>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-sm-6">
                    <div class="card widget-flat text-bg-info">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="ri-eye-line widget-icon"></i>
                            </div>
                            <h6 class="text-uppercase mt-0" title="Category">Total Permissions</h6>
                            <h2 class="my-2">{{ $permissionCount }}</h2>
                            <span class="text-nowrap">({{ $startDate->format('F Y') }} to
                                {{ $endDate->format('F Y') }})</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
<!-- Vendor js -->