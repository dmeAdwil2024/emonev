<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ env('APP_NAME') }} | {{ $current }}</title>
    <link rel="icon" type="image/png" href="{{ asset('') }}images/icon.png" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('') }}templates/plugins/fontawesome-free/css/all.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="{{ asset('') }}templates/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('') }}templates/dist/css/adminlte.css" />
    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="{{ asset('') }}templates/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Sweetalert Css -->
    <link href="{{ asset('') }}templates/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('') }}templates/plugins/toastr/toastr.min.css">
    <!-- EasyUI -->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}templates/jeasyui/themes/black/easyui.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}templates/jeasyui/themes/icon.css">

</head>

<body class="hold-transition dark-mode sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed text-sm">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('') }}images/logo-ditjen.png" width="150px"
                alt="Ditjen Adwil" />
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-navy">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="d-none nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>

                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-navy bg-navy-gradient elevation-4">
            <!-- Brand Logo -->
            <a href="{{ asset('') }}" class="brand-link bg-navy">
                <img src="{{ asset('') }}images/logo-ditjen.png" alt="{{ env('APP_NAME') }}"
                    class="brand-image elevation-3" style="opacity: 0.8;" />
                <span class="brand-text font-weight-bolder">EMONEV</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('') }}images/user.png" class="img-circle elevation-2"
                            alt="{{ Auth::user()->nama }}" />
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->nama }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                @include('components.menu')
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('components.change-password')
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer navbar-navy">
            <strong>Copyright &copy; {{ date('Y') }} <a href="https://ditjenbinaadwil.kemendagri.go.id/">Ditjen
                    Bina Adwil</a></strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- JEasyUI -->
    <script type="text/javascript" src="{{ asset('') }}templates/jeasyui/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('') }}templates/jeasyui/jquery.easyui.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('') }}templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('') }}templates/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('') }}templates/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('') }}templates/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{ asset('') }}templates/plugins/raphael/raphael.min.js"></script>
    <script src="{{ asset('') }}templates/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{ asset('') }}templates/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <script src="{{ asset('') }}templates/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('') }}templates/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="{{ asset('') }}templates/plugins/toastr/toastr.min.js"></script>
    <!-- SweetAlert Plugin Js -->
    <script src="{{ asset('') }}templates/plugins/sweetalert/sweetalert.min.js"></script>

    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    </script>

    @yield('js')
</body>

</html>
