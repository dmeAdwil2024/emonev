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
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('newdashboard/css/styles.css') }}?v=3" />
        
    </head>
    <body>
        @php 
            $persen_realisasi = $realisasi/$anggaran*100;
            $persen_selisih = $selisih/$anggaran*100;
            $persen_pagu_pusat      = $pagu_pusat/$anggaran*100;
            $persen_realisasi_pusat = $realisasi_pusat/$pagu_pusat*100;
            $persen_sisa_pusat      = $sisa_pusat/$pagu_pusat*100;
            if($pagu_dekon === 0)
            {
                $persen_pagu_dekon      = 0;
                $persen_realisasi_dekon = 0;
                $persen_sisa_dekon      = 0;
            }
            else
            {
                $persen_pagu_dekon      = $pagu_dekon/$anggaran*100;
                $persen_realisasi_dekon = $realisasi_dekon/$pagu_dekon*100;
                $persen_sisa_dekon      = $sisa_dekon/$pagu_dekon*100;
            }

            if($pagu_tp <> 0)
            {
                $persen_pagu_tp      = $pagu_tp/$anggaran*100;
                $persen_realisasi_tp = $realisasi_tp/$pagu_tp*100;
                $persen_sisa_tp      = $sisa_tp/$pagu_tp*100;
            }
            else
            {
                $persen_pagu_tp      = 0;
                $persen_realisasi_tp = 0;
                $persen_sisa_tp      = 100;
            }

            $persen_rm_pusat        = $rm_pusat/$pagu_pusat*100;
            $persen_realisasi_rm    = $realisasi_pusat/$rm_pusat*100;
            $persen_sisa_rm         = $sisa_rm_pusat/$rm_pusat*100;

            $realisasi_rm_pusat     = $realisasi_pusat-$realisasi_phln;
            $sisa_rm_pusat          = $rm_pusat-$realisasi_rm_pusat;

            $persen_sisa_rm         = ($sisa_rm_pusat/$rm_pusat)*100;
            $persen_realisasi_rm    = 100-$persen_sisa_rm;

            $persen_pagu_phln       = $phln_pusat/$pagu_pusat*100;
            $persen_realisasi_phln  = $realisasi_phln/$phln_pusat*100;
            $persen_sisa_phln       = (($phln_pusat-$realisasi_phln)/$phln_pusat)*100;
        @endphp
        <!-- {{ $real_eselon1 }} -->
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-md-12 d-flex logo-admin align-items-center">
                    <img src="{{asset('newdashboard/images/logo-emonev.png')}}" alt="logo emonev" class="img-fluid margin-auto logo-smaller">
                    <div class="text-center">
                        <h1 class="title">E-MONEV</h1>
                        <h2 class="subtitle">DITJEN BINA ADMINISTRASI KEWILAYAHAN</h2>
                    </div>
                </div>
                <div class="position-relative">
                    <div class="usermenu">
                        <div class="avatar d-flex align-items-center">
                            <a href="#menuNav" data-bs-toggle="collapse"><img src="{{asset('newdashboard/images/user-avatar.png')}}" alt="" class="img-fluid avatar-img me-2"></a>
                            <div class="avatar-name small fw-bold">
                                Selamat Datang Admin,<br>
                                Bagian Perencanaan
                            </div>
                        </div>
                        <div class="mainmenu mt-2 collapse" id="menuNav">
                            <ul class="list-unstyled">
                                <li><a href="#" class="btn btn-dongker">Home</a></li>
                                <li>
                                    <a href="#menuTiketing" class="btn btn-dongker" data-bs-toggle="collapse">E Ticketing &#11206;</a>
                                    <ul class="list-unstyled collapse ps-3" id="menuTiketing">
                                        <li><a href="#" class="btn btn-sm btn-primary btn-pills my-1">Pengajuan Revisi Pusat</a></li>
                                        <li><a href="#" class="btn btn-sm btn-primary btn-pills mb-1">Usulan kegiatan</a></li>
                                        <li>
                                            <a href="#menuRevda" class="btn btn-sm btn-primary btn-pills mb-1" data-bs-toggle="collapse">Pengajuan Revisi Daerah &#11206;</a>
                                            <ul class="list-unstyled collapse ps-3" id="menuRevda">
                                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Revisi kegiatan GWPP</a></li>
                                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Revisi kegiatan Sarpras</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#" class="btn btn-sm btn-primary btn-pills mb-1">Quality Surveyor</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" class="btn btn-dongker">Penerbitan POK</a></li>
                                <li>
                                    <a href="#menuCapaiOut" class="btn btn-dongker" data-bs-toggle="collapse">Capaian Output &#11206;</a>
                                    <ul class="list-unstyled collapse ps-3" id="menuCapaiOut">
                                        <li>
                                            <a href="#menuCapaiPus" class="btn btn-sm btn-primary btn-pills my-1" data-bs-toggle="collapse">Capaian Pusat &#11206;</a>
                                            <ul class="list-unstyled collapse ps-3" id="menuCapaiPus">
                                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Komponen Input</a></li>
                                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Rincian Output</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#menuCapaiDa" class="btn btn-sm btn-primary btn-pills mb-1" data-bs-toggle="collapse">Capaian Daerah &#11206;</a>
                                            <ul class="list-unstyled collapse ps-3" id="menuCapaiDa">
                                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Komponen Input</a></li>
                                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Rincian Output</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#menuCapaiKin" class="btn btn-dongker" data-bs-toggle="collapse">Capaian Kinerja &#11206;</a>
                                    <ul class="list-unstyled collapse ps-3" id="menuCapaiKin">
                                        <li>
                                            <a href="#menuCapaiKiPus" class="btn btn-sm btn-primary btn-pills my-1" data-bs-toggle="collapse">Capaian Pusat &#11206;</a>
                                            <ul class="list-unstyled collapse ps-3" id="menuCapaiKiPus">
                                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">IKP</a></li>
                                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">IKK</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#menuCapaiKiDa" class="btn btn-sm btn-primary btn-pills mb-1" data-bs-toggle="collapse">Capaian Daerah &#11206;</a>
                                            <ul class="list-unstyled collapse ps-3" id="menuCapaiKiDa">
                                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">IKK</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="" class="btn btn-dongker">Master</a></li>
                                <li><a href="" class="btn btn-dongker">Riwayat Pagu</a></li>
                                <li><a href="" class="btn btn-dongker">SIP GWPP</a></li>
                                <li><a href="" class="btn btn-dongker">Integrasi SAKTI</a></li>
                                <li><a href="" class="btn btn-dongker">Profile</a></li>
                                <li><a href="" class="btn btn-dongker">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-5 mb-3">
                <div class="col-md-4">
                    <div class="card card-dongker text-center">
                        <div class="card-body position-relative">
                            <h5 class="card-title h6">Pagu Anggaran Ditjen Bina Adwil</h5>
                            <p class="h5">Rp {{number_format($data_pagu->pagu,2,',','.')}}<br>&nbsp;</p>
                            <div class="progress mb-2" role="progressbar" aria-label="Success example 4px high" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                                <div class="progress-bar bg-success" style="width: 100%"></div>
                            </div>
                            <p class="card-text small">{{$data_pagu->title}}. Tanggal: {{date("d/m/Y", strtotime($data_pagu->tanggal))}}</p>
                            <span class="position-absolute end-0 bottom-0"><button type="button" class="btn btn-sm btn-outline-light" data-bs-toggle="modal" data-bs-target="#modalPaguAnggaran">&#129106;</button></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-dongker text-center">
                        <div class="card-body">
                            <h5 class="card-title h6">Realisasi Anggaran Ditjen Bina Adwil</h5>
                            <p class="h5">Rp {{number_format($realisasi,2,',','.')}}<br>({{number_format($persen_realisasi,2,',','.')}}%)</p>
                            <div class="progress mb-2" role="progressbar" aria-label="Success example 4px high" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                                <div class="progress-bar bg-success" style="width:{{number_format($persen_realisasi,2)}}%"></div>
                            </div>
                            <p class="card-text small">Data Berdasarkan SP2D MonSAKTI: {{date("d/m/Y, H:i:s", strtotime($last_synch_real))}}</p>
                            <span class="position-absolute end-0 bottom-0"><button type="button" class="btn btn-sm btn-outline-light" data-bs-toggle="modal" data-bs-target="#modalPaguAnggaran">&#129106;</button></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-dongker text-center">
                        <div class="card-body">
                            <h5 class="card-title h6">Sisa Anggaran Ditjen Bina Adwil</h5>
                            <p class="h5">Rp {{number_format($selisih,2,',','.')}}<br>&nbsp;</p>
                            <div class="progress mb-2" role="progressbar" aria-label="Success example 4px high" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                                <div class="progress-bar bg-success" style="width: {{number_format((float)$persen_selisih, 2, '.', '')}}%"></div>
                            </div>
                            <p class="card-text small">({{number_format((float)$persen_selisih, 2, '.', '')}}%)</p>
                            <span class="position-absolute end-0 bottom-0"><button type="button" class="btn btn-sm btn-outline-light" data-bs-toggle="modal" data-bs-target="#modalPaguAnggaran">&#129106;</button></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 px-5">
                    <h3 class="mb-3 fw-bold h5 text-center">Realisasi Anggaran per Kewenangan (Pagu Anggaran)</h3>
                    <div class="row fw-semibold">
                        <div class="col-md-4 text-center">
                            <h4 class="h6">PUSAT (Total)</h4>
                            <p>Rp. {{number_format($realisasi_pusat,2,',','.')}}</p>
                            <div class="chart-box px-4">
                                <canvas id="chartPusat"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <h4 class="h6">DEKONSENTRASI</h4>
                            <p>Rp. {{number_format($realisasi_dekon,2,',','.')}}</p>
                            <div class="chart-box px-4">
                                <canvas id="chartDekon"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <h4 class="h6">TUGAS PEMBANTUAN</h4>
                            <p>Rp. {{number_format($realisasi_tp,2,',','.')}}</p>
                            <div class="chart-box px-4">
                                <canvas id="chartTugas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-5">
                    <h3 class="mb-3 fw-bold h5 text-center">Realisasi Anggaran per Eselon 1 Lingkup Kemendagri</h3>
                    <div class="chart-box" style="height: 300px; width:100%;">
                        <canvas id="chartRealisasi"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-b fw-bold h5">Sandingan Realisasi Anggaran, Capaian Output dan Capaian Kinerja</h3>
                    <div class="chart-box" style="height: 300px;">
                        <canvas id="chartSandingan"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="mb-3 fw-bold h5">Rekapitulasi Revisi dan Usulan Kegiatan</h3>
                    <div class="card fw-normal card-dongker">
                        <div class="card-body">
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name=""
                                    id=""
                                    value="{3:option1}"
                                />
                                <label class="form-check-label" for="">Pusat</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name=""
                                    id=""
                                    value="option2"
                                />
                                <label class="form-check-label" for="">Daerah</label>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <select
                                            class="form-select form-select-sm"
                                            name=""
                                            id=""
                                        >
                                            <option selected>Direktorat Dekon, TP dan Kerjasama</option>
                                            <option value="">option 1</option>
                                            <option value="">option 2</option>
                                            <option value="">option 3</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select
                                            class="form-select form-select-sm"
                                            name=""
                                            id=""
                                        >
                                            <option selected>Sub Direktorat</option>
                                            <option value="">option 1</option>
                                            <option value="">option 2</option>
                                            <option value="">option 3</option>
                                        </select>
                                    </div>
                                </div>
                               <div class="col-md-3">
                                    <div class="mb-3">
                                        <select
                                            class="form-select form-select-sm"
                                            name=""
                                            id=""
                                        >
                                            <option selected>Tahun</option>
                                            <option value="">2024</option>
                                            <option value="">2023</option>
                                            <option value="">2022</option>
                                        </select>
                                    </div>
                               </div>
                               <div class="col-md-3">
                                <div class="mb-3">
                                    <select
                                        class="form-select form-select-sm"
                                        name=""
                                        id=""
                                    >
                                        <option selected>Bulan</option>
                                        <option value="">January</option>
                                        <option value="">February</option>
                                        <option value="">Maret</option>
                                        <option value="">April</option>
                                        <option value="">Mei</option>
                                        <option value="">Juni</option>
                                        <option value="">Juli</option>
                                        <option value="">Agustus</option>
                                        <option value="">September</option>
                                        <option value="">Oktober</option>
                                        <option value="">November</option>
                                        <option value="">Desember</option>
                                    </select>
                                </div>
                               </div>
                            </div>
                        </div>
                    </div>
                    <div class="card fw-normal mt-4 card-dongker">
                        <div class="card-body">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Jumlah Revisi Pusat</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Usulan Kegiatan</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Usulan Tambahan Anggaran</td>
                                        <td>0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal -->
        <!-- Button trigger modal -->
        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Launch static backdrop modal
        </button> --}}
        
        <!-- Modal -->
        <div class="modal fade" id="modalPaguAnggaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalPaguAnggaranLabel">Pagu Anggaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="tabsPaguAnggaran" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link active"
                                id="sebaranPagu-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#sebaranPagu"
                                type="button"
                                role="tab"
                                aria-controls="sebaranPagu"
                                aria-selected="false"
                            >
                                Sebaran Pagu
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link"
                                id="riwayatPagu-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#riwayatPagu"
                                type="button"
                                role="tab"
                                aria-controls="riwayatPagu"
                                aria-selected="true"
                            >
                                Riwayat Pagu
                            </button>
                        </li>
                        
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div
                            class="tab-pane active"
                            id="sebaranPagu"
                            role="tabpanel"
                            aria-labelledby="sebaranPagu-tab"
                        >
                            <div class="row">
                                <div class="col-6">
                                    Pagu Anggaran per UKE II
                                </div>
                                <div class="col-6">
                                    <h6>Pagu per Kewenangan</h6>
                                    <div>
                                        
                                    </div>
                                    <h6>Pagu per Sumber Dana</h6>
                                    <div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="tab-pane"
                            id="riwayatPagu"
                            role="tabpanel"
                            aria-labelledby="riwayatPagu-tab"
                        >
                            Riwayat Pagu 
                        </div>
                        
                    </div>
                    
                </div>
                {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
                </div> --}}
            </div>
            </div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- Chartjs -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
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
            const chartSandingan = document.getElementById('chartSandingan');

            new Chart(chartPusat, {
                type: 'doughnut',
                data: {
                    labels: ['Realisasi', 'Sisa'],
                    datasets: [{
                        data: [{{number_format((float)$persen_realisasi_pusat, 2, '.', '')}}, {{number_format((float)$persen_sisa_pusat, 2, '.', '')}}],
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
                        data: [{{number_format((float)$persen_realisasi_dekon, 2, '.', '')}}, {{number_format((float)$persen_sisa_dekon, 2, '.', '')}}],
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
                        data: [{{number_format((float)$persen_realisasi_tp, 2, '.', '')}}, {{number_format((float)$persen_sisa_tp, 2, '.', '')}}],
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
                    responsive:true,
                    maintainAspectRatio: false,
                    labels: {!! $satker_eselon1 !!},
                    datasets: [{
                        data: {!! $real_eselon1 !!},
                        borderWidth: 1,
                        backgroundColor: '#2C83D2'
                    }]
                }
            });

            new Chart(chartSandingan, {
                type: 'line',
                data: {
                    datasets: [{
                        label: 'Dataset',
                        data: [72980037000, 10288880000, 9478727000, 9225201000, 8823924000, 6814001000],
                        fill: false,
                        borderColor: '#2C83D2',
                        tension: 0.1
                    }]
                }
            });

        </script>
    </body>
</html>
