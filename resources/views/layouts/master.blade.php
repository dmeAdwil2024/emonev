<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard E-Monev</title>
    <link rel="icon" type="image/png" href="{{ env('APP_URL') }}/images/icon.png" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}/templates/plugins/fontawesome-free/css/all.min.css" />

    <link rel="stylesheet"
        href="{{ env('APP_URL') }}/templates/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet"
        href="{{ env('APP_URL') }}/templates/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet"
        href="{{ env('APP_URL') }}/templates/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('newdashboard/css/newstyles.css') }}?v={{ time() }}" />
    {{-- <link rel="stylesheet" href="{{env('APP_URL')}}/templates/dist/css/adminlte.css" /> --}}
    <style>
        .outer {
            align-content: center;
            text-align: center;
            height: 100%;
            width: 100%;
            border: 1px solid grey;
            border-radius: 20px;
        }

        .modal.fade {
            background: rgba(0, 0, 0, 0.5);
        }

        .modal-backdrop.fade {
            opacity: 0;
        }
    </style>
</head>

@section('body')
    @include('layouts.body')
@show
<!-- Begin page -->
<div id="layout-wrapper">
    @include('layouts.topbar')
    @include('layouts._navigasi')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->
</body>

</html>
