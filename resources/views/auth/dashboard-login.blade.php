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
    <!-- Sweetalert Css -->
    <link href="{{ asset('') }}templates/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('newdashboard/css/styles.css') }}?v=3" />
</head>

<body>
    @php
        $persen_realisasi = ($realisasi / $anggaran) * 100;
        $persen_selisih = ($selisih / $anggaran) * 100;
        $persen_pagu_pusat = ($pagu_pusat / $anggaran) * 100;
        $persen_realisasi_pusat = $pagu_pusat != 0 ? ($realisasi_pusat / $pagu_pusat) * 100 : 0;
        $persen_sisa_pusat = $pagu_pusat != 0 ? ($sisa_pusat / $pagu_pusat) * 100 : 0;
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

        $persen_rm_pusat = $pagu_pusat != 0 ? ($rm_pusat / $pagu_pusat) * 100 : 0;
        $persen_realisasi_rm = $rm_pusat != 0 ? ($realisasi_pusat / $rm_pusat) * 100 : 0;
        $persen_sisa_rm = $rm_pusat != 0 ? ($sisa_rm_pusat / $rm_pusat) * 100 : 0;

        $realisasi_rm_pusat = $realisasi_pusat - $realisasi_phln;
        $sisa_rm_pusat = $rm_pusat - $realisasi_rm_pusat;

        $persen_sisa_rm = $rm_pusat != 0 ? ($sisa_rm_pusat / $rm_pusat) * 100 : 0;
        $persen_realisasi_rm = 100 - $persen_sisa_rm;

        $persen_pagu_phln = $pagu_pusat != 0 ? ($phln_pusat / $pagu_pusat) * 100 : 0;
        $persen_realisasi_phln = $phln_pusat != 0 ? ($realisasi_phln / $phln_pusat) * 100 : 0;
        $persen_sisa_phln = $phln_pusat != 0 ? (($phln_pusat - $realisasi_phln) / $phln_pusat) * 100 : 0;
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
        <a href="#" class="btn-enter" onclick="myFunction()"><img
                src="{{ asset('newdashboard/images/arrow-right.png') }}" alt=""
                class="d-inline-block img-fluid me-2"> MASUK</a>
        <form class="mt-3" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username"
                    aria-describedby="usernameHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="d-flex gap-3">
                <div class="col-6">
                    <a href="{{ route('register') }}" class="btn btn-danger flex-fill py-3 col-12">DAFTAR</a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-danger flex-fill py-3 col-12">LOG IN</button>
                    <a href="javascript:void(0)" onclick="openModalResetPassword()" style="margin: 5px;"
                        class="text-white d-block py-2">Lupa Password?</a>
                </div>

            </div>
        </form>
    </div>

    <div class="modal fade" id="modal-reset-password">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #001A3A; border-radius: 14px; padding: 10px">
                <div class="modal-header">
                    <h4 class="modal-title text-white">Reset Password</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="username_forgot"
                                    class="col-sm-4 col-form-label text-white">Username</label>
                                <div class="col-sm-8">
                                    <input type="text" name="username_forgot" id="username_forgot"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                            class="fas fa-times-circle"></i> Cancel</button>
                    <button type="submit" id="btn-reset-password" class="btn btn-success"
                        onclick="submitResetPassword()">
                        <span id="btn-reset-password-title">Kirim Password Baru</span>
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script src="{{ asset('') }}landing-pages/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('') }}landing-pages/js/popper.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js?v=1"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- SweetAlert Plugin Js -->
    <script src="{{ asset('') }}templates/plugins/sweetalert/sweetalert.min.js"></script>
    <!-- Chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js?v=1"></script>
    <script>
        function myFunction() {
            var element = document.getElementById("loginBlock");
            element.classList.toggle("open");
        }

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
                        'rgb(10,185,95)',
                        'rgb(252,224,88)',
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
                        'rgb(10,185,95)',
                        'rgb(252,224,88)',
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
                        'rgb(10,185,95)',
                        'rgb(252,224,88)',
                    ],
                    hoverOffset: 4
                }]
            }
        });

        new Chart(chartRealisasi, {
            data: {
                labels: {!! $satker_eselon1 !!},
                datasets: [{
                    type: 'line',
                    data: {!! $rata2_eselon1 !!},
                    borderWidth: 3,
                    borderDash: [5, 5],
                    borderColor: "#8a63b1",
                    backgroundColor: "#8a63b1",
                    pointBorderWidth: 0,
                    pointStyle: 'dash',
                }, {
                    type: 'line',
                    data: {!! $rata2_eselon2 !!},
                    borderWidth: 3,
                    borderDash: [5, 5],
                    borderColor: "#cc732d",
                    backgroundColor: "#cc732d",
                    pointBorderWidth: 0,
                    pointStyle: 'dash',
                }, {
                    type: 'bar',
                    data: {!! $real_eselon1 !!},
                    borderWidth: 1,
                    backgroundColor: {!! $color !!}
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            }
        });

        function openModalResetPassword() {
            $('#modal-reset-password').modal('show')
            document.getElementById("username_forgot").focus();
        }

        function submitResetPassword() {
            $('#btn-reset-password').prop('disabled', true);
            $('#btn-reset-password-title').empty().append('Mengirim Password Baru...');

            var username = $('#username_forgot').val()

            var form_data = new FormData();

            form_data.append('username', username);
            form_data.append('_token', '{{ csrf_token() }}')

            $.ajax({
                url: "{{ route('tools.reset-password') }}",
                type: "POST",
                data: form_data,
                cache: false,
                processData: false,
                contentType: false,
                success: function(e) {
                    $('#modal-reset-password').modal('hide')
                    swal(e.title, e.message, e.status)
                    $('#username_forgot').val("")
                    $('#btn-reset-password').prop('disabled', false);
                    $('#btn-reset-password-title').empty().append('Kirim Password Baru');
                }
            });
        }
    </script>
</body>

</html>
