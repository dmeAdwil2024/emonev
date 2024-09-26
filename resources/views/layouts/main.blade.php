<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{env('APP_NAME')}} | {{$current}}</title>
        <link rel="icon" type="image/png" href="{{env('APP_URL')}}/images/icon.png"/>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/fontawesome-free/css/all.min.css" />
        <script src="https://kit.fontawesome.com/16a5cde238.js" crossorigin="anonymous"></script>
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
        <!-- Theme style -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/dist/css/adminlte.css" />
        <!-- DataTables -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />
        <!-- daterange picker -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/daterangepicker/daterangepicker.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <!-- Bootstrap4 Duallistbox -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
        <!-- BS Stepper -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/bs-stepper/css/bs-stepper.min.css">
        <!-- dropzonejs -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/dropzone/min/dropzone.min.css">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <!-- Sweetalert Css -->
        <link href="{{ env('APP_URL') }}/templates/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <!-- Toastr -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/toastr/toastr.min.css">

    </head>
    <body class="hold-transition dark-mode sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed text-sm">
        <div class="wrapper">
            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__wobble" src="{{env('APP_URL')}}/images/logo-ditjen.png" width="150px" alt="Ditjen Adwil"/>
            </div>

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-dark navbar-navy">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a>
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
                <a href="{{env('APP_URL')}}/" class="brand-link bg-navy">
                    <img src="{{env('APP_URL')}}/images/logo-ditjen.png" alt="{{env('APP_NAME')}}" class="brand-image elevation-3" style="opacity: 0.8;" />
                    <span class="brand-text font-weight-bolder">EMONEV</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{env('APP_URL')}}/images/user.png" class="img-circle elevation-2" alt="{{Auth::user()->nama}}" />
                        </div>
                        <div class="info">
                            <a href="{{route('profile')}}" class="d-block">{{Auth::user()->nama}}</a>
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
                <strong>Copyright &copy; {{date("Y")}} <a href="https://ditjenbinaadwil.kemendagri.go.id/">Ditjen Bina Adwil</a></strong>
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{env('APP_URL')}}/templates/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="{{env('APP_URL')}}/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="{{env('APP_URL')}}/templates/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{env('APP_URL')}}/templates/dist/js/adminlte.js"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="{{env('APP_URL')}}/templates/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/raphael/raphael.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/jquery-mapael/jquery.mapael.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/jquery-mapael/maps/usa_states.min.js"></script>
        <!-- DataTables  & Plugins -->
        <script src="{{env('APP_URL')}}/templates/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/jszip/jszip.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <!-- Select2 -->
        <script src="{{env('APP_URL')}}/templates/plugins/select2/js/select2.full.min.js"></script>
        <!-- Bootstrap4 Duallistbox -->
        <script src="{{env('APP_URL')}}/templates/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
        <!-- InputMask -->
        <script src="{{env('APP_URL')}}/templates/plugins/moment/moment.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/inputmask/jquery.inputmask.min.js"></script>
        <!-- date-range-picker -->
        <script src="{{env('APP_URL')}}/templates/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap color picker -->
        <script src="{{env('APP_URL')}}/templates/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{env('APP_URL')}}/templates/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- BS-Stepper -->
        <script src="{{env('APP_URL')}}/templates/plugins/bs-stepper/js/bs-stepper.min.js"></script>
        <!-- dropzonejs -->
        <script src="{{env('APP_URL')}}/templates/plugins/dropzone/min/dropzone.min.js"></script>
        <!-- SweetAlert2 -->
        <script src="{{env('APP_URL')}}/templates/plugins/sweetalert2/sweetalert2.min.js"></script>
        <!-- Toastr -->
        <script src="{{env('APP_URL')}}/templates/plugins/toastr/toastr.min.js"></script>
        <!-- SweetAlert Plugin Js -->
        <script src="{{ env('APP_URL') }}/templates/plugins/sweetalert/sweetalert.min.js"></script>
        <!-- bs-custom-file-input -->
        <script src="{{ env('APP_URL') }}/templates/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
        <!-- ChartJS -->
        <script src="{{env('APP_URL')}}/templates/plugins/chart.js/Chart.min.js"></script>

        <script>
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            bsCustomFileInput.init();

            $(".select2").select2({
                theme: 'bootstrap4'
            })
        </script>

        @yield('js')
    </body>
</html>
