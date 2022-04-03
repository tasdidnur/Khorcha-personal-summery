<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"  content=""/>
    <meta name="author" content="Coderthemes"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin</title>
    <link rel="shortcut icon" href="{{asset('contents/admin')}}/assets/images/favicon.ico">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/vendor/jquery-jvectormap-1.2.2.css"/>
    <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/icons.min.css"/>
    <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/vendor/dataTables.bootstrap5.css"/>
    <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/app.min.css" id="light-style"/>
    <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/datepicker.css"/>
    <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/style.css"/>
</head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">

                <!-- LOGO -->
                <a href="{{url('dashboard')}}" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{asset('contents/admin')}}/assets/images/logo.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="{{asset('contents/admin')}}/assets/images/logo_sm.png" alt="" height="16">
                    </span>
                </a>

                <!-- LOGO -->
                <!-- <a href="index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="{{asset('contents/admin')}}/assets/images/logo-dark.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="{{asset('contents/admin')}}/assets/images/logo_sm_dark.png" alt="" height="16">
                    </span>
                </a> -->

                <div class="h-100" id="leftside-menu-container" data-simplebar>

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title side-nav-item">Navigation</li>

                        <li class="side-nav-item">
                            <a href="{{url('dashboard')}}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> Dashboards </span>
                            </a>
                        </li>
                       @if(Auth::user()->role=='1' || Auth::user()->role=='2')
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false" aria-controls="sidebarTables" class="side-nav-link">
                                <i class="uil-table"></i>
                                <span> Users </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTables">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{url('dashboard/user')}}">All Users</a>
                                    </li>
                                    <li>
                                        <a href="{{url('dashboard/user/add')}}">Add Users</a>
                                    </li>
                                    <li>
                                        <a href="#">All Role</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                       @endif
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#incomeCategory" aria-expanded="false" aria-controls="incomeCategory" class="side-nav-link">
                                <i class="uil-wallet"></i>
                                <span> Income </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="incomeCategory">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{url('dashboard/income')}}">All Income</a>
                                    </li>
                                    <li>
                                        <a href="{{url('dashboard/income/add')}}">Add Income</a>
                                    </li>
                                    <li>
                                        <a href="{{url('dashboard/income/category')}}">Income Category</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                      <li class="side-nav-item">
                          <a data-bs-toggle="collapse" href="#expenseCategory" aria-expanded="false" aria-controls="expenseCategory" class="side-nav-link">
                              <i class="uil-coins"></i>
                              <span> Expense </span>
                              <span class="menu-arrow"></span>
                          </a>
                          <div class="collapse" id="expenseCategory">
                              <ul class="side-nav-second-level">
                                  <li>
                                      <a href="{{url('dashboard/expense')}}">All Expense</a>
                                  </li>
                                  <li>
                                      <a href="{{url('dashboard/expense/add')}}">Add Expense</a>
                                  </li>
                                  <li>
                                      <a href="{{url('dashboard/expense/category')}}">Expense Category</a>
                                  </li>
                              </ul>
                          </div>
                      </li>

                      <li class="side-nav-item">
                          <a data-bs-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="reports" class="side-nav-link">
                              <i class="uil-chart-pie"></i>
                              <span> Reports </span>
                              <span class="menu-arrow"></span>
                          </a>
                          <div class="collapse" id="reports">
                              <ul class="side-nav-second-level">
                                  <li>
                                      <a href="{{url('dashboard/report')}}">Reports</a>
                                  </li>
                                  <li>
                                      <a href="{{url('dashboard/report/current')}}">GenerelReport</a>
                                  </li>
                                  <li>
                                      <a href="{{url('')}}">Current Month Report</a>
                                  </li>
                              </ul>
                          </div>
                      </li>


                        <li class="side-nav-item">
                            <a href="{{url('dashboard/recycle')}}" class="side-nav-link">
                                <i class="uil-trash-alt"></i>
                                <span> Recycle Bin </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="side-nav-link">
                                <i class="mdi mdi-logout"></i>
                                <span>Log Out</span>
                            </a>
                        </li>
                    </ul>
                    <!-- End Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="dropdown notification-list d-lg-none">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-search noti-icon"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                    <form class="p-3">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    </form>
                                </div>
                            </li>
                            <li class="dropdown notification-list topbar-dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="{{asset('contents/admin')}}/assets/images/flags/us.jpg" alt="user-image" class="me-0 me-sm-1" height="12">
                                    <span class="align-middle d-none d-sm-inline-block">English</span> <i class="mdi mdi-chevron-down d-none d-sm-inline-block align-middle"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <img src="{{asset('contents/admin')}}/assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                                    </a>
                                </div>
                            </li>
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-bell noti-icon"></i>
                                    <span class="noti-icon-badge"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5 class="m-0">
                                            <span class="float-end">
                                                <a href="javascript: void(0);" class="text-dark">
                                                    <small>Clear All</small>
                                                </a>
                                            </span>Notification
                                        </h5>
                                    </div>
                                    <div style="max-height: 230px;" data-simplebar>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info">
                                                <i class="mdi mdi-account-plus"></i>
                                            </div>
                                            <p class="notify-details">New user registered.
                                                <small class="text-muted">5 hours ago</small>
                                            </p>
                                        </a>
                                    </div>
                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                        View All
                                    </a>
                                </div>
                            </li>
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src="{{asset('contents/admin')}}/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name">{{Auth::user()->name}}</span>
                                        <span class="account-position">{{Auth::user()->roleInfo->role_name}}</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle me-1"></i>
                                        <span>My Account</span>
                                    </a>
                                    <!-- item-->
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>
                        <div class="app-search dropdown d-none d-lg-block">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control dropdown-toggle"  placeholder="Search..." id="top-search">
                                    <span class="mdi mdi-magnify search-icon"></span>
                                    <button class="input-group-text btn-primary" type="submit">Search</button>
                                </div>
                            </form>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h5 class="text-overflow mb-2">Found <span class="text-danger">1</span> results</h5>
                                </div>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="uil-notes font-16 me-1"></i>
                                    <span>Analytics Report</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end Topbar -->
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <form class="d-flex">
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                                <span class="input-group-text bg-primary border-primary text-white">
                                                    <i class="mdi mdi-calendar-range font-13"></i>
                                                </span>
                                            </div>
                                            <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                                <i class="mdi mdi-autorenew"></i>
                                            </a>
                                            <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                                <i class="mdi mdi-filter-variant"></i>
                                            </a>
                                        </form>
                                    </div>
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                      @yield('content')
                    </div>
                    <!-- container -->
                </div>
                <!-- content -->
                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <script>document.write(new Date().getFullYear())</script> © Tasdid - Tasdidthemes.com
                            </div>
                        </div>
                    </div>
                </footer> <!-- end Footer -->
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="post" style="display:none;">
              @csrf
            </form>
        </div>
        <script src="{{asset('contents/admin')}}/assets/js/vendor.min.js"></script>
        <script src="{{asset('contents/admin')}}/assets/js/app.min.js"></script>
        <script src="{{asset('contents/admin')}}/assets/js/vendor/apexcharts.min.js"></script>
        <script src="{{asset('contents/admin')}}/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="{{asset('contents/admin')}}/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
        <script src="{{asset('contents/admin')}}/assets/js/pages/demo.dashboard.js"></script>
        <script src="{{asset('contents/admin')}}/assets/js/vendor/jquery.dataTables.min.js"></script>
        <script src="{{asset('contents/admin')}}/assets/js/vendor/dataTables.bootstrap5.js"></script>
        <script src="{{asset('contents/admin')}}/assets/js/vendor/dataTables.responsive.min.js"></script>
        <script src="{{asset('contents/admin')}}/assets/js/vendor/responsive.bootstrap5.min.js"></script>
        <script src="{{asset('contents/admin')}}/assets/js/bootstrap-datepicker.js"></script>
        <script src="{{asset('contents/admin')}}/assets/js/custom.js"></script>
    </body>
</html>
