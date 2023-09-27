<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="{{route('admin.dashboard')}}" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{asset('administrator/assets/images/logo.png')}}" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{asset('administrator/assets/images/logo-sm.png')}}" alt="small logo">
        </span>
    </a>



    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Main</li>

            <li class="side-nav-item">
                <a href="{{route('admin.dashboard')}}" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span class="badge bg-success float-end">9+</span>
                    <span> Dashboard </span>
                </a>
            </li>




            <li class="side-nav-title">Management</li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false" class="side-nav-link">
                    <i class="ri-share-line"></i>
                    <span> Roles & Permissons </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMultiLevel">
                    <ul class="side-nav-second-level">

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarSecondLevel" aria-expanded="false" aria-controls="sidebarSecondLevel">
                                <span>Role</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarSecondLevel">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('admin.roles.index')}}">List</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.roles.create')}}">Create</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false" aria-controls="sidebarThirdLevel">
                                <span> Permission</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarThirdLevel">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('admin.permissions.index')}}">List</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.permissions.create')}}">Create</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMultiLevel1" aria-expanded="false" class="side-nav-link">
                    <i class="ri-share-line"></i>
                    <span>Manage Shop Categories</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMultiLevel1">
                    <ul class="side-nav-second-level">

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarSecondLevel1" aria-expanded="false" aria-controls="sidebarSecondLevel1">
                                <span>Category</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarSecondLevel1">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('admin.categories.index')}}">List</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.categories.create')}}">Create</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </li>


            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMultiLevel2" aria-expanded="false" class="side-nav-link">
                    <i class="ri-share-line"></i>
                    <span>Products</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMultiLevel2">
                    <ul class="side-nav-second-level">

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarSecondLevel2.1" aria-expanded="false" aria-controls="sidebarSecondLevel2.1">
                                <span>Product</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarSecondLevel2.1">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('admin.products.index')}}">List</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.products.create')}}">Create</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarThirdLevel1" aria-expanded="false" aria-controls="sidebarThirdLevel1">
                                <span> Sub Categories</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarThirdLevel1">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('admin.subcategories.index')}}">List</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.subcategories.create')}}">Create</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarThirdLevel3" aria-expanded="false" aria-controls="sidebarThirdLevel3">
                                <span> Child Categories</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarThirdLevel3">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('admin.childcategories.index')}}">List</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.childcategories.create')}}">Create</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarSecondLevel2.2" aria-expanded="false" aria-controls="sidebarSecondLevel2.2">
                                <span>Image</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarSecondLevel2.2">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('admin.brands.index')}}">List</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.brands.create')}}">Create</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarSecondLevel2.3" aria-expanded="false" aria-controls="sidebarSecondLevel2.3">
                                <span>Brand</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarSecondLevel2.3">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('admin.brands.index')}}">List</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.brands.create')}}">Create</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMultiLevel3" aria-expanded="false" class="side-nav-link">
                    <i class="ri-share-line"></i>
                    <span> Vendors </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMultiLevel3">
                    <ul class="side-nav-second-level">

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarSecondLevel3" aria-expanded="false" aria-controls="sidebarSecondLevel3">
                                <span>Vendor</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarSecondLevel3">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('admin.vendors.index')}}">List</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.vendors.create')}}">Create</a>
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
