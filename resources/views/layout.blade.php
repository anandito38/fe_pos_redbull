<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KANG BAKERY</title>

    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/support-index.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa-solid fa-bread-slice"></i>
                </div>
                <div class="sidebar-brand-text mx-3">KANG BAKERY</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>DASHBOARD</span></a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                    aria-expanded="true" aria-controls="collapseUser">
                    <i class="fas fa-fw fa-people-group"></i>
                    <span>USER MODULE</span>
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/admin">
                            <i class="fa-solid fa-user-gear" style="margin-right: 5px;"></i>ADMIN SHEET
                        </a>
                        <a class="collapse-item" href="/customer">
                            <i class="fa-solid fa-user-group" style="margin-right: 5px;"></i>CUSTOMER SHEET
                        </a>

                    </div>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStock"
                    aria-expanded="true" aria-controls="collapseStock">
                    <i class="fas fa-fw fa-boxes-stacked"></i>
                    <span>STOCK MODULE</span>
                </a>
                <div id="collapseStock" class="collapse" aria-labelledby="headingStock" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/category">
                            <i class="fa-solid fa-clipboard-list" style="margin-right: 5px;"></i>CATEGORY SHEET
                        </a>
                        <a class="collapse-item" href="/vendors">
                            <i class="fa-solid fa-box" style="margin-right: 5px;"></i>VENDOR SHEET
                        </a>
                        <a class="collapse-item" href="/product">
                            <i class="fa-solid fa-cookie-bite" style="margin-right: 5px;"></i>PRODUCT SHEET
                        </a>
                    </div>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSales"
                    aria-expanded="true" aria-controls="collapseSales">
                    <i class="fas fa-fw fa-cash-register"></i>
                    <span>SALES MODULE</span>
                </a>
                <div id="collapseSales" class="collapse" aria-labelledby="headingSales" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/book">
                            <i class="fa-solid fa-book-bookmark" style="margin-right: 5px;"></i>BOOKING SHEET
                        </a>
                        <a class="collapse-item" href="/invoice">
                            <i class="fa-solid fa-receipt" style="margin-right: 5px;"></i>INVOICE SHEET
                        </a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="/monitoring">
                    <i class="fas fa-fw fa-chart-simple"></i>
                    <span>MONITORING</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <div class="float-left black-text">
                        @if (url('/dashboard') == url()->current())
                        <h5>DASHBOARD</h5>
                        @elseif (url('/monitoring') == url()->current())
                        <h5>MONITORING</h5>
                        @elseif (url('/admin') == url()->current())
                        <h5>ADMIN SHEET INFORMATION</h5>
                        @elseif (url('/customer') == url()->current())
                        <h5>CUSTOMER SHEET INFORMATION</h5>
                        @elseif (url('/vendors') == url()->current())
                        <h5>VENDOR SHEET INFORMATION</h5>
                        @elseif (url('/product') == url()->current())
                        <h5>PRODUCT SHEET INFORMATION</h5>
                        @elseif (Str::contains(url()->current(), '/product/detail'))
                        <h5>PRODUCT DETAIL INFORMATION</h5>
                        @elseif (url('/category') == url()->current())
                        <h5>CATEGORY SHEET INFORMATION</h5>
                        @elseif (url('/book') == url()->current())
                        <h5>BOOKING SHEET INFORMATION</h5>
                        @elseif (Str::contains(url()->current(), '/book/detail'))
                        <h5>BOOKING DETAIL INFORMATION</h5>
                        @endif
                    </div>
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">
                        @if(Session::has('userInfo'))
                            @php
                                $data1 = Session::get('userInfo');
                            @endphp
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    <span class="mr-2 d-none d-lg-inline black-text small">
                                        {{ $data1->getNickname() }}
                                    </span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
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
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Log out
                                    </a>
                                </div>
                            </li>
                        @endif
                    </ul>

                </nav>

                @yield('content')

                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Kang Bakery 2023</span>
                        </div>
                    </div>
                </footer>

            </div>

        </div>

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
                    <div class="modal-body">Select "Log out" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="/logout">Log out</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

</body>

</html>
