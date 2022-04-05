<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="../bghmc.png">

    <title>BGHMC Linen - @yield('title')</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.4/css/select.dataTables.min.css">
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/family.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    
    
  
    
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion bgimg" id="accordionSidebar" >

            <!-- Sidebar - Brand -->
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/home">
                    <i class="fas fa-fw fa-tachometer-alt" style="color:black;"></i>
                    <span style="color:black;"><b>Dashboard</b></span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading" style="color:black">
                MATERIALS
            </div>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities" >
                    <i class="fas fa-fw fa-wrench" style="color:black;"></i>
                    <span style="color:black"><b>Inventory Management</b></span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar" >
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h5 class="collapse-header">Inventory Utilities:</h5>
                        <a class="collapse-item" href="/createRequest">Create Request</a>

                    </div>
                    <!-- <div class="bg-white py-2 collapse-inner rounded">
                        <h5 class="collapse-header">Issued Linens</h5>
                        <a class="collapse-item" href="/release/ward">Wards</a>
                        <a class="collapse-item" href="/releaseo/office">Offices</a>
                    </div> -->
                    <!-- <div class="bg-white py-2 collapse-inner rounded">
                        <h5 class="collapse-header">Condemned Linens</h5>
                        <a class="collapse-item" href="/release_con/ward">Wards</a>
                        {{-- <a class="collapse-item" href="/release_cono/9999999999999999">Offices</a> --}}
                    </div> -->
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
                    aria-expanded="true" aria-controls="collapseUtilities2">
                    <i class="fas fa-fw fa-folder" style="color:black;"></i>
                    <span style="color:black"><b>View Inventory</b></span>
                </a>
                <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <!-- <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Inventory</h6>
                        <a class="collapse-item" href="/view/finish">View All Finished Products</a>
                        <a class="collapse-item" href="/view/raw">View All Raw Materials</a>
                        <a class="collapse-item" href="/stockroom/list">Stock Room List</a>
                        <a class="collapse-item" href="/storage/list">Storage List</a>
                        <a class="collapse-item" href="/ward/list">Ward List</a>
                    </div> -->
                </div>
            </li>


            <!-- @if ($mydata->role_id != '3') -->
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->

            <!-- <div class="sidebar-heading">Addons</div> -->
            <!-- <li class="nav-item"> -->
                <!-- @if($mydata->role_id != '3') -->
                <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoaddon"
                    aria-expanded="true" aria-controls="collapseTwoaddon">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Maintenance</span>
                </a> -->
                <!-- @endif -->
                <!-- <div id="collapseTwoaddon" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/maintenance/database">Database Maintenance</a>
                        <a class="collapse-item" href="/maintenance/staff">Staff Maintenance</a>
                    </div>
                </div> -->
            <!-- </li> -->
            <!-- @endif -->
            <!-- @if ($mydata->role_id != '3') -->
            <!-- Divider -->
            <!-- Heading -->
            <!-- <li class="nav-item">
                @if($mydata->role_id != '3')
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoaddon1"
                    aria-expanded="true" aria-controls="collapseTwoaddon1">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Report Generation</span>
                </a>
                @endif
                <div id="collapseTwoaddon1" class="collapse" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/report/generate">Reports</a>
                    </div>
                </div>
            </li> -->
            <!-- @endif -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                @if($mydata->role_id == '1')
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Admin Maintenance</span>
                </a>
                @endif
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/adduser">Add User</a>
                        <a class="collapse-item" href="/userlist">User List</a>
                        <a class="collapse-item" href="/actlog">Activity Log</a>
                        <a class="collapse-item" href="/admin/monitoring">Admin Monitoring</a>
                    </div>
                </div>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle" style="background-color: black;"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column ">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-info topbar mb-4 static-top shadow bgimg" >
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                        {{-- <div class="sidebar-brand-text mx-3">Linen IS</div> --}}
                    </a>
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline small" style="color:black"><b>{{ $hpersonal->lastname }},
                                    {{ $hpersonal->firstname }} {{ $hpersonal->middlename }}</b></span>
                                <img class="img-profile rounded-circle" src="{{ asset('user.jpg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                {{-- <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> --}}
                                <div class="dropdown-divider" style="color:black"></div>
                                <a class="dropdown-item btn" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" ></i>
                                    
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                <!-- Page Heading -->
                {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div> --}}

                <!-- Content Row -->
                <div>
                    @yield('content')
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                {{-- <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>MIS &copy; BGHMC</span>
                        </div>
                    </div>
                </footer> --}}
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="/logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
        <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
        <style type="text/css">
        .bgimg {
            background-image: url('../linen_green.avif');
            background-attachment:fixed;
            background-size: 100%;
        }
        
        </style>

        
        @yield('script')
</body>

</html>
