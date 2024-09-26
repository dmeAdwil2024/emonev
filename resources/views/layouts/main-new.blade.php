<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>{{env('APP_NAME')}} | {{$current}}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{env('APP_URL')}}/images/icon.png"/>
    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/fontawesome-free/css/all.min.css" />
    <script src="https://kit.fontawesome.com/16a5cde238.js" crossorigin="anonymous"></script>
    
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('newdashboard/css/styles.css') }}?v={{ time() }}" />
  </head>

  <body class="justify-content-start">
    <header class="w-100">
      <!-- place navbar here -->
      <div class="container-fluid mt-3">
        <div class="row d-flex">
            <div class="d-flex logo-admin align-items-center w-auto">
                <img src="{{asset('newdashboard/images/logo-emonev.png')}}" alt="logo emonev" class="img-fluid margin-auto logo-smaller">
                <div class="text-center">
                    <h1 class="title">E-MONEV</h1>
                    <h2 class="subtitle">DITJEN BINA ADMINISTRASI KEWILAYAHAN</h2>
                </div>
            </div>
            <div class="d-flex w-auto ms-auto align-items-center">
              <div class="avatar-name small fw-bold">
                Selamat Datang {{ $user->nama }},<br>
                {{ $user->direktorat->nama_dir }}<br>
                NIP
              </div>
              <div class="ms-2 position-relative">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
                <a href="#userNav" data-bs-toggle="collapse" class="">
                  <img src="{{asset('newdashboard/images/user-avatar.png')}}" alt="" class="img-fluid me-2">
                </a>
                <ul class="list-unstyled collapse position-absolute end-0" id="userNav">
                  <li>
                    <a class="btn btn-dongker text-nowrap" href="javascript:void(0)" onclick="changePassword('{{Auth::user()->username}}')">Ubah Password</a>
                  </li>
          
                  <li>
                      <a href="{{route('profile')}}" class="btn btn-dongker">Profile</a>
                  </li>
          
                  <li>
                      <a class="btn btn-dongker" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <main class="py-3 w-100 d-flex">
      <aside class="px-2" style="width: 245px">
        <!-- Sidebar Menu -->
        @include('components.menu-sidebar')
        <!-- /.sidebar-menu -->
      </aside>
      <div class="" style="width: calc(100% - 245px);">
        @yield('content')
      </div>
    </main>
    <footer>
      <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>

    <!-- SweetAlert2 -->
    <script src="{{env('APP_URL')}}/templates/plugins/sweetalert2/sweetalert2.min.js"></script>
  </body>
</html>
