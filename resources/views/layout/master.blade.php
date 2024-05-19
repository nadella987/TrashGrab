<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    @yield('css')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: blue">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/beranda-m">
                <div class="sidebar-brand-icon">
                    <img src="img/logo.png" alt="icon" style="height: 20px; width: 40px">
                </div>
                <div class="sidebar-brand-text mx-3">
                Trash Grab
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Beranda -->
            <li class="nav-item {{ Request::is('beranda*') ? 'active' : '' }}">
                <a class="nav-link" href="/beranda">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- User -->
            @if(auth()->user()->role == 'admin')
            <li class="nav-item {{ Request::is('user*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('user.index')}}">
                    <i class="fa-solid fa-users"></i>
                    <span>User</span>
                </a>

            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Driver  -->
            @if(auth()->user()->role == 'member' || auth()->user()->role == 'admin')
            <li class="nav-item {{ Request::is('driver*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('driver.index')}}">
                    <i class="fa-solid fa-users"></i>
                    <span>Driver</span></a>
            </li>
            @endif
    

             <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Katalog Sampah -->
            @if(auth()->user()->role == 'member' || auth()->user()->role == 'admin')
            <li class="nav-item {{ Request::is('katalogSampah*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('katalogSampah.index')}}">
                <i class="fa-solid fa-message"></i>
                    <span>Katalog Sampah</span></a>
            </li>
            @endif
      
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

            <!-- Area -->
            @if(auth()->user()->role == 'member' || auth()->user()->role == 'admin')
            <li class="nav-item {{ Request::is('area*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('area.index')}}">
                    <i class="fa-solid fa-map"></i>
                    <span>Area</span></a>
            </li>
            @endif


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Jadwal Penjemputan -->
            @if(auth()->user()->role == 'member' || auth()->user()->role == 'admin')
            <li class="nav-item {{ Request::is('jadwalPickUp*') ? 'active' : '' }}">
                <a class="nav-link"  href="{{route('jadwalPickUp.index')}}">
                    <i class="fa-solid fa-calendar"></i>
                    <span>Jadwal Penjemputan</span></a>
            </li>
            @endif
        

               <!-- Divider -->
               <hr class="sidebar-divider my-0">

            <!-- Permintaan Penjemputan -->
            @if(auth()->user()->role == 'member' || auth()->user()->role == 'admin')
            <li class="nav-item {{ Request::is('transaksi*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('transaksi.index') }}">
                    <i class="fa-solid fa-shopping-bag"></i>
                    <span>Permintaan Penjemputan</span>
                </a>
            </li>
            @endif
            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                                    
                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter" id="notificationCounter">4+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow  animated--grow-in"
                        aria-labelledby="alertsDropdown" >
                        <h6 class="dropdown-header">
                            Notifikasi
                        </h6>
                        <div id="notificationsDropdown" style="max-height: 200px; overflow-y: auto;">
                        </div>
                      
                            <!-- Notifikasi akan ditambahkan di sini melalui JavaScript -->
                        </div>
                    </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('user.showProfile', auth()->user()->id)}}" >
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item" type="submit">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </button>
                            </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white mt-5">
                <div class="container my-auto">
                    {{-- <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Frephy 2023</span>
                    </div> --}}
                </div>
            </footer>
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
                    <a class="btn btn-primary" href="/login">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script src="path/to/fullcalendar.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>


    @yield('scripts')

</body>

</html>
