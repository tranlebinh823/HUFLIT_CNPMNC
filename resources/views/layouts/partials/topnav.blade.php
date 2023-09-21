        <!-- ========== Horizontal Menu Start ========== -->
        <div class="topnav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg">
                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="index.html" id="topnav-dashboards"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-dashboard-3-line"></i>Dashboards
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-pages-line"></i>Management Authentication <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-auth" role="button" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Roles <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                            <a href="{{route("admin.roles.index")}}" class="dropdown-item">List</a>
                                            <a href="{{route("admin.roles.create")}}" class="dropdown-item">Create</a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-auth" role="button" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Permissions <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                            <a href="{{route("admin.permissions.index")}}" class="dropdown-item">List</a>
                                            <a href="{{route("admin.permissions.create")}}" class="dropdown-item">Create</a>
                                        </div>
                                    </div>
                                   


                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-pages-line"></i>Management Categories <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-auth" role="button" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Categories <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                            <a href="{{route("admin.categories.index")}}" class="dropdown-item">List</a>
                                            <a href="{{route("admin.categories.create")}}" class="dropdown-item">Create</a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-auth" role="button" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            SubCategories <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                            <a href="{{route("admin.subcategories.index")}}" class="dropdown-item">List</a>
                                            <a href="{{route("admin.subcategories.create")}}" class="dropdown-item">Create</a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-auth" role="button" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            ChildCategories <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                            <a href="{{route("admin.childcategories.index")}}" class="dropdown-item">List</a>
                                            <a href="{{route("admin.childcategories.create")}}" class="dropdown-item">Create</a>
                                        </div>
                                    </div>


                                </div>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ========== Horizontal Menu End ========== -->
