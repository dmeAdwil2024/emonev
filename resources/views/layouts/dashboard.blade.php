<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Dashboard E-Monev</title>
        <link rel="icon" type="image/png" href="{{env('APP_URL')}}/images/icon.png"/>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/fontawesome-free/css/all.min.css" />
        <!-- Sweetalert Css -->
        <link href="{{ env('APP_URL') }}/templates/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('newdashboard/css/styles.css') }}?v=3" />
    </head>
    <body>
        @yield('contents')
        <script src="{{env('APP_URL')}}/landing-pages/js/jquery-3.3.1.min.js"></script>
        <script src="{{env('APP_URL')}}/landing-pages/js/popper.min.js"></script>

        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js?v=1" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- SweetAlert Plugin Js -->
        <script src="{{ env('APP_URL') }}/templates/plugins/sweetalert/sweetalert.min.js"></script>
        <!-- Chartjs -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js?v=1"></script>
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
        @yield('js') 
    </body>
</html> 