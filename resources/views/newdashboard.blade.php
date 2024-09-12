<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard E-Monev</title>
    <link rel="icon" type="image/png" href="{{ asset('') }}images/icon.png" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('') }}templates/plugins/fontawesome-free/css/all.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('newdashboard/css/styles.css') }}?v=3" />
</head>

<body>
    @php
        $persen_realisasi = ($realisasi / $anggaran) * 100;
        $persen_selisih = ($selisih / $anggaran) * 100;
        $persen_pagu_pusat = ($pagu_pusat / $anggaran) * 100;
        $persen_realisasi_pusat = ($realisasi_pusat / $pagu_pusat) * 100;
        $persen_sisa_pusat = ($sisa_pusat / $pagu_pusat) * 100;
        if ($pagu_dekon === 0) {
            $persen_pagu_dekon = 0;
            $persen_realisasi_dekon = 0;
            $persen_sisa_dekon = 0;
        } else {
            $persen_pagu_dekon = ($pagu_dekon / $anggaran) * 100;
            $persen_realisasi_dekon = ($realisasi_dekon / $pagu_dekon) * 100;
            $persen_sisa_dekon = ($sisa_dekon / $pagu_dekon) * 100;
        }

        if ($pagu_tp != 0) {
            $persen_pagu_tp = ($pagu_tp / $anggaran) * 100;
            $persen_realisasi_tp = ($realisasi_tp / $pagu_tp) * 100;
            $persen_sisa_tp = ($sisa_tp / $pagu_tp) * 100;
        } else {
            $persen_pagu_tp = 0;
            $persen_realisasi_tp = 0;
            $persen_sisa_tp = 100;
        }

        $persen_rm_pusat = ($rm_pusat / $pagu_pusat) * 100;
        $persen_realisasi_rm = ($realisasi_pusat / $rm_pusat) * 100;
        $persen_sisa_rm = ($sisa_rm_pusat / $rm_pusat) * 100;

        $realisasi_rm_pusat = $realisasi_pusat - $realisasi_phln;
        $sisa_rm_pusat = $rm_pusat - $realisasi_rm_pusat;

        $persen_sisa_rm = ($sisa_rm_pusat / $rm_pusat) * 100;
        $persen_realisasi_rm = 100 - $persen_sisa_rm;

        $persen_pagu_phln = ($phln_pusat / $pagu_pusat) * 100;
        $persen_realisasi_phln = ($realisasi_phln / $phln_pusat) * 100;
        $persen_sisa_phln = (($phln_pusat - $realisasi_phln) / $phln_pusat) * 100;
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center">
                <img src="{{ asset('newdashboard/images/logo-kemendagri.png') }}" alt="logo kemendagri"
                    class="img-fluid margin-auto logo">
            </div>
            <div class="col-md-6">
                <div class="dashboard-title">
                    <h1 class="">E-MONEV</h1>
                    <h2 class="">DITJEN BINA ADMINISTRASI KEWILAYAHAN</h2>
                    <h3>Selamat Datang pada Portal E-Monev Direktur Jenderal Bina Adminstrasi Kewilayahan</h3>
                    <p>Mempermudah proses pelaporan data realisasi hasil pemantauan pelaksanaan rencana kerja Ditjen
                        Bina Adwil Kementrian Dalam Negeri Republik Indonesia</p>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <img src="{{ asset('newdashboard/images/logo-emonev.png') }}" alt="logo emonev"
                    class="img-fluid margin-auto logo">
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-4">
                <div class="card card-dongker text-center">
                    <div class="card-body">
                        <h5 class="card-title h6">Pagu Anggaran Ditjen Bina Adwil</h5>
                        <p class="h5">Rp {{ number_format($data_pagu->pagu, 2, ',', '.') }}<br>&nbsp;</p>
                        <div class="progress mb-2" role="progressbar" aria-label="Success example 4px high"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                            <div class="progress-bar bg-success" style="width: 100%"></div>
                        </div>
                        <p class="card-text small">{{ $data_pagu->title }}. Tanggal:
                            {{ date('d/m/Y', strtotime($data_pagu->tanggal)) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-dongker text-center">
                    <div class="card-body">
                        <h5 class="card-title h6">Realisasi Anggaran Ditjen Bina Adwil</h5>

                        <p class="h5">Rp
                            {{ number_format($realisasi, 2, ',', '.') }}<br>({{ number_format($persen_realisasi, 2, ',', '.') }}%)
                        </p>
                        <div class="progress mb-2" role="progressbar" aria-label="Success example 4px high"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                            <div class="progress-bar bg-success"
                                style="width:{{ number_format($persen_realisasi, 2) }}%"></div>
                        </div>
                        <p class="card-text small">Data Berdasarkan SP2D MonSAKTI:
                            {{ date('d/m/Y, H:i:s', strtotime($last_synch_real)) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-dongker text-center">
                    <div class="card-body">
                        <h5 class="card-title h6">Sisa Anggaran Ditjen Bina Adwil</h5>

                        <p class="h5">Rp {{ number_format($selisih, 2, ',', '.') }}<br>&nbsp;</p>
                        <div class="progress mb-2" role="progressbar" aria-label="Success example 4px high"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                            <div class="progress-bar bg-success"
                                style="width: {{ number_format((float) $persen_selisih, 2, '.', '') }}%"></div>
                        </div>
                        <p class="card-text small">({{ number_format((float) $persen_selisih, 2, '.', '') }}%)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mb-3 fw-bold h6">Realisasi Anggaran per Kewenangan (Pagu Anggaran)</h3>
                <div class="row fw-semibold">
                    <div class="col-md-4 text-center">
                        <h4 class="h6">PUSAT (Total)</h4>
                        <p>Rp. {{ number_format($realisasi_pusat, 2, ',', '.') }}</p>
                        <div class="chart-box">
                            <canvas id="chartPusat"></canvas>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <h4 class="h6">DEKONSENTRASI</h4>
                        <p>Rp. {{ number_format($realisasi_dekon, 2, ',', '.') }}</p>
                        <div class="chart-box">
                            <canvas id="chartDekon"></canvas>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <h4 class="h6">TUGAS PEMBANTUAN</h4>
                        <p>Rp. {{ number_format($realisasi_tp, 2, ',', '.') }}</p>
                        <div class="chart-box">
                            <canvas id="chartTugas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="mb-3 fw-bold h6">Realisasi Anggaran per Eselon 1 Lingkup Kemendagri</h3>
                <div class="chart-box pe-5">
                    <canvas id="chartRealisasi"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div id="loginBlock" class="login-box">
        <a href="javascript:void();" class="btn-enter" onclick="myFunction();"><img
                src="{{ asset('newdashboard/images/arrow-right.png') }}" alt=""
                class="d-inline-block img-fluid me-2"> MASUK</a>
        <form class="mt-3">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="d-flex gap-3">
                <button type="button" class="btn btn-outline-light flex-fill">Cancel</button>
                <button type="submit" class="btn btn-success flex-fill">Submit</button>
            </div>
        </form>
    </div>
    {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                @php

                @endphp
                <div class="title m-b-md">
                    NEW DASHBOARD
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div> --}}
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js?v=1"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- Chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js?v=1"></script>
    <script>
        function myFunction() {
            var element = document.getElementById("loginBlock");
            element.classList.toggle("open");
        }
        // myFunction();
        const chartPusat = document.getElementById('chartPusat');
        const chartDekon = document.getElementById('chartDekon');
        const chartTugas = document.getElementById('chartTugas');
        const chartRealisasi = document.getElementById('chartRealisasi');

        new Chart(chartPusat, {
            type: 'doughnut',
            data: {
                labels: ['Realisasi', 'Sisa'],
                datasets: [{
                    data: [{{ number_format((float) $persen_realisasi_pusat, 2, '.', '') }},
                        {{ number_format((float) $persen_sisa_pusat, 2, '.', '') }}
                    ],
                    backgroundColor: [
                        'rgb(32, 125, 49)',
                        'rgb(248, 191, 23)'
                    ],
                    hoverOffset: 4
                }]
            }
        });

        new Chart(chartDekon, {
            type: 'doughnut',
            data: {
                labels: ['Realisasi', 'Sisa'],
                datasets: [{
                    data: [{{ number_format((float) $persen_realisasi_dekon, 2, '.', '') }},
                        {{ number_format((float) $persen_sisa_dekon, 2, '.', '') }}
                    ],
                    backgroundColor: [
                        'rgb(32, 125, 49)',
                        'rgb(248, 191, 23)'
                    ],
                    hoverOffset: 4
                }]
            }
        });

        new Chart(chartTugas, {
            type: 'doughnut',
            data: {
                labels: ['Realisasi', 'Sisa'],
                datasets: [{
                    data: [{{ number_format((float) $persen_realisasi_tp, 2, '.', '') }},
                        {{ number_format((float) $persen_sisa_tp, 2, '.', '') }}
                    ],
                    backgroundColor: [
                        'rgb(32, 125, 49)',
                        'rgb(248, 191, 23)',
                    ],
                    hoverOffset: 4
                }]
            }
        });

        new Chart(chartRealisasi, {
            type: 'bar',
            data: {
                labels: {!! $satker_eselon1 !!},
                datasets: [{
                    data: {!! $real_eselon1 !!},
                    borderWidth: 1,
                    backgroundColor: '#2C83D2'
                }]
            }
        });
    </script>
</body>

</html>
