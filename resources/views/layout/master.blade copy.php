<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ENIGMA</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">
    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('logout')}}" type="button" class="btn btn-default"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text"><strong>EWS</strong></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{Auth::user()->username}}</a>
                    </div>
                </div>
                <!-- SidebarSearch Form -->
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        @if (auth()->user()->role == 0)
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>Master<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('unit')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p><small>Unit NMU</small></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('user')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p><small>User</small></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('codegrouper')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p><small>Master Code Grouper</small></p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if (auth()->user()->role == 3 || auth()->user()->role == 2)
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>Master<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('codegrouper')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p><small>Master Code Grouper</small></p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if (auth()->user()->role == 3)
                        <li class="nav-item">
                            <a href="{{route('listbilling')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Monitoring Billing
                                </p>
                            </a>
                        </li>
                        @endif
                        @if (auth()->user()->role == 2)
                        <li class="nav-item">
                            <a href="{{route('listbilling')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    List Billing
                                </p>
                            </a>
                        </li>
                        
                        @endif
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('konten')

        <footer class="main-footer text-center">
            <div class="float-right d-none d-sm-block ">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2021 <a href="">NMU DEV TEAM</a>.</strong> All rights reserved.
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
    @yield('js')
</body>

</html>