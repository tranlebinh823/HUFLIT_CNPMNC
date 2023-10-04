<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ asset('administrator/assets/images/logo.png') }}" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('administrator/assets/images/logo-sm.png') }}" alt="small logo">
        </span>
    </a>



    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Main</li>

            <li class="side-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span class="badge bg-success float-end">9+</span>
                    <span> Dashboard </span>
                </a>
            </li>
            <li class="side-nav-title">Management</li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#1" aria-expanded="false" class="side-nav-link">
                    <i class="ri-share-line"></i>
                    <span> Roles & Permissons </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="1">
                    <ul class="side-nav-second-level">

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#2" aria-expanded="false" aria-controls="2">
                                <span>Role</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="2">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{ route('admin.roles.index') }}">List</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.roles.create') }}">Create</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#3" aria-expanded="false" aria-controls="3">
                                <span> Permission</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="3">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{ route('admin.permissions.index') }}">List</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.permissions.create') }}">Create</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.categories.index') }}" class="side-nav-link">
                    <i class="ri-list-check-2"></i>
                    <span> Danh mục </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.subcategories.index') }}" class="side-nav-link">
                    <i class="ri-list-check-2"></i>
                    <span> Danh mục con </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#11" aria-expanded="false" class="side-nav-link">
                    <i class="ri-share-line"></i>
                    <span> Products </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="11">
                    <ul class="side-nav-second-level">

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#22" aria-expanded="false" aria-controls="22">
                                <span>Product</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="22">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{ route('admin.products.index') }}">List</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.products.create') }}">Create</a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                    </ul>
                </div>
            </li>







        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
