   <!-- BEGIN: Main Menu-->
    <!-- BEGIN: Body-->
    <style>
        .navbar-item .active{
            color: white;
        }
        </style>
<div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index-2.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{url('')}}/public/assets/admin/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{url('')}}/public/assets/admin/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index-2.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{url('')}}/public/assets/admin/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{url('')}}/public/assets/admin/images/logo-light.png" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}" href="{{ url('admin/dashboard/') }}"  role="button" aria-expanded="false" aria-controls="sidebarDashboards"> {{-- data-bs-toggle="collapse" --}}
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                            </a>
                            {{-- <div class="collapse menu-dropdown" id="sidebarDashboards">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics"> Analytics </a>
                                    </li>
                                    
                                </ul>
                            </div> --}}
                        </li> <!-- end Dashboard Menu -->
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::segment(3) == 'activity_history' ? 'active' : '' }}" href="{{ url('admin/dashboard/activity_history/') }}" data-bs-toggle="" role="button">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Activity History</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::segment(2) == 'category' ? 'active' : '' }}" href="{{ url('admin/category/index') }}" data-bs-toggle="" role="button">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Category</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::segment(2) == 'subcategory' ? 'active' : '' }}" href="{{ url('admin/subcategory/index') }}" data-bs-toggle="" role="button">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Sub Category</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::segment(2) == 'color' ? 'active' : '' }}" href="{{ url('admin/color') }}" data-bs-toggle="" role="button">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Color</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::segment(2) == 'size' ? 'active' : '' }}" href="{{ url('admin/size') }}" data-bs-toggle="" role="button">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Size</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::segment(2) == 'product_brand' ? 'active' : '' }}" href="{{ url('admin/product_brand') }}" data-bs-toggle="" role="button">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Product Brands</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::segment(2) == 'product_dimension' ? 'active' : '' }}" href="{{ url('admin/product_dimension') }}" data-bs-toggle="" role="button">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Product Dimension</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::segment(2) == 'product_weight' ? 'active' : '' }}" href="{{ url('admin/product_weight') }}" data-bs-toggle="" role="button">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Product Weight</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::segment(2) == 'product_material' ? 'active' : '' }}" href="{{ url('admin/product_material') }}" data-bs-toggle="" role="button">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Product Material</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::segment(2) == 'product_special_feature' ? 'active' : '' }}" href="{{ url('admin/product_special_feature') }}" data-bs-toggle="" role="button">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Product Special Feature</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::segment(2) == 'product' ? 'active' : '' }}" href="{{ url('admin/product') }}" data-bs-toggle="" role="button">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Product</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::segment(2) == 'product2' ? 'active' : '' }}" href="{{ url('admin/product/add2') }}" data-bs-toggle="" role="button">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Product 2</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::segment(2) == 'product_image' ? 'active' : '' }}" href="{{ url('admin/product_image') }}" data-bs-toggle="" role="button">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Product Images</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
