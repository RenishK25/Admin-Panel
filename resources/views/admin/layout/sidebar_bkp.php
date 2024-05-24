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
                <a href="{{ url('/admin') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ url('public/frontend') }}/img/core-img/logo_2.ico" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ url('public/frontend') }}/img/core-img/logo.png" alt="" height="100">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="{{ url('/admin') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ url('public/frontend') }}/img/core-img/logo_2.ico" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ url('public/frontend') }}/img/core-img/logo.png" alt="" height="100">
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
                        <li class="nav-item">
                                {{-- <a href="{{ url('admin/') }}" class="nav-link" data-key="dashboard"><i class="feather icon-home"></i>    Dashboards </a> --}}

                                <a class="nav-link menu-link {{ Request::segment(2) == '' ? 'active' : '' }}" href="{{ url('admin/') }}" >
                                    <i class="ri-home-5-line"></i> <span data-key="t-dashboards">Dashboards</span>
                                </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{ url('admin/admin-user') }}" class="nav-link" data-key="sub-admin"><i class="feather icon-users"></i>     Sub Admin </a> --}}

                            <a class="nav-link menu-link {{ Request::segment(2) == 'admin-user' ? 'active' : '' }}{{ Request::segment(2) == 'Category/*' ? 'active' : '' }}" href="{{ url('admin/category/index') }}" >
                                <i class="ri-user-fill"></i> <span data-key="t-dashboards"> Category </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{ url('admin/send-report') }}" class="nav-link" data-key="send-mail"><i class="feather icon-mail"></i> Send Mail </a> --}}

                            <a class="nav-link menu-link {{ Request::segment(2) == 'send-report' ? 'active' : '' }}{{ Request::segment(2) == 'sub_category/*' ? 'active' : '' }}" href="{{ url('admin/sub_category/index') }}" >
                                <i class="ri-mail-add-line"></i> <span data-key=""> Sub Category </span>
                            </a>
                        </li>
                        

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
    <!-- END: Main Menu-->

    <!-- END: Main Menu-->
