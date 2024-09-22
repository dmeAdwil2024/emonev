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
    <link rel="stylesheet" href="{{ asset('newdashboard/css/styles.css') }}?v=4" />

</head>

<body>
    <!--  -->
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-12 d-flex logo-admin align-items-center">
                <img src="{{ asset('newdashboard/images/logo-emonev.png') }}" alt="logo emonev"
                    class="img-fluid margin-auto logo-smaller">
                <div class="text-center">
                    <h1 class="title">E-MONEV</h1>
                    <h2 class="subtitle">DITJEN BINA ADMINISTRASI KEWILAYAHAN</h2>
                </div>
            </div>
            <div class="position-relative">
                <div class="usermenu">
                    <div class="avatar d-flex align-items-center">
                        <a href="#menuNav" data-bs-toggle="collapse"><img
                                src="{{ asset('newdashboard/images/user-avatar.png') }}" alt=""
                                class="img-fluid avatar-img me-2"></a>
                        <div class="avatar-name small fw-bold">
                            Selamat Datang KPA Daerah,<br>
                            Fulan bin Foolan<br>
                            NIP.00000000 000000 0 000
                        </div>
                    </div>
                    <div class="mainmenu collapse mt-2" id="menuNav">
                        <ul class="list-unstyled">
                            <li><a href="#" class="btn btn-dongker">Home</a></li>
                            <li>
                                <a href="#menuTiketing" class="btn btn-dongker" data-bs-toggle="collapse">E Tiketing
                                    &#11206;</a>
                                <ul class="list-unstyled collapse ps-3" id="menuTiketing">
                                    <li><a href="#" class="btn btn-sm btn-primary btn-pills my-1">Pengajuan Revisi
                                            Pusat</a></li>
                                    <li><a href="#" class="btn btn-sm btn-primary btn-pills mb-1">Usulan
                                            kegiatan</a></li>
                                    <li>
                                        <a href="#menuRevda" class="btn btn-sm btn-primary btn-pills mb-1"
                                            data-bs-toggle="collapse">Pengajuan Revisi Daerah &#11206;</a>
                                        <ul class="list-unstyled collapse ps-3" id="menuRevda">
                                            <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Revisi
                                                    kegiatan GWPP</a></li>
                                            <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Revisi
                                                    kegiatan Sarpras</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#" class="btn btn-sm btn-primary btn-pills mb-1">Quality
                                            Surveyor</a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="btn btn-dongker">Penerbitan POK</a></li>

                            <a href="#menuCapaiDa" class="btn btn-sm btn-primary btn-pills mb-1"
                                data-bs-toggle="collapse">Capaian Daerah &#11206;</a>
                            <ul class="list-unstyled collapse ps-3" id="menuCapaiDa">
                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Komponen
                                        Input</a></li>
                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Rincian
                                        Output</a></li>
                            </ul>
                            </li>
                        </ul>
                        </li>
                        <li>
                            <a href="#menuCapaiKin" class="btn btn-dongker" data-bs-toggle="collapse">Capaian
                                Kinerja &#11206;</a>
                            <ul class="list-unstyled collapse ps-3" id="menuCapaiKin">
                                <li>
                                    <a href="#menuCapaiKiPus" class="btn btn-sm btn-primary btn-pills my-1"
                                        data-bs-toggle="collapse">Capaian Pusat &#11206;</a>
                                    <ul class="list-unstyled collapse ps-3" id="menuCapaiKiPus">
                                        <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">IKP</a>
                                        </li>
                                        <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">IKK</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#menuCapaiKiDa" class="btn btn-sm btn-primary btn-pills mb-1"
                                        data-bs-toggle="collapse">Capaian Daerah &#11206;</a>
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
        <div class="row mb-3 mt-5">
            <div class="col-md-4">
                <div class="card card-dongker text-center">
                    <div class="card-body position-relative">
                        <h5 class="card-title h6">Pagu Anggaran Satker X</h5>
                        <div class="progress mb-2" role="progressbar" aria-label="Success example 4px high"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                            <div class="progress-bar bg-success" style="width: 100%"></div>
                        </div>
                        <p class="card-text small">. Tanggal:
                            12/12/23</p>
                        <span class="position-absolute bottom-0 end-0"><button type="button"
                                class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                                data-bs-target="#modalPaguAnggaran">&#129106;</button></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-dongker text-center">
                    <div class="card-body">
                        <h5 class="card-title h6">Realisasi Anggaran Satker X</h5>
                        <p class="h5">Rp 000.000.000,00<br>(60%)
                        </p>
                        <div class="progress mb-2" role="progressbar" aria-label="Success example 4px high"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                            <div class="progress-bar bg-success" style="width:60%"></div>
                        </div>
                        <p class="card-text small">Data Berdasarkan SP2D MonSAKTI:
                            12/12/23</p>
                        <span class="position-absolute bottom-0 end-0"><button type="button"
                                class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                                data-bs-target="#modalRealisasiAnggaran">&#129106;</button></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-dongker text-center">
                    <div class="card-body">
                        <h5 class="card-title h6">Sisa Anggaran Satker X</h5>
                        <p class="h5">Rp 000.000.000,00<br>&nbsp;</p>
                        <div class="progress mb-2" role="progressbar" aria-label="Success example 4px high"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                            <div class="progress-bar bg-success" style="width: 80%"></div>
                        </div>
                        <p class="card-text small">(80%)</p>
                        <span class="position-absolute bottom-0 end-0"><button type="button"
                                class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                                data-bs-target="#modalSisaAnggaran">&#129106;</button></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 px-5">
                <h3 class="fw-bold h5 mb-3 text-center">Realisasi Anggaran Satker Daerah per Provinsi</h3>
                <div class="chart-box" style="height: 300px; width:100%;">
                    <canvas id="chartRealisasiSatkerDa" aria-label="Realisasi Anggaran per UK II"
                        role="img"></canvas>
                </div>
            </div>
            <div class="col-md-6 px-5">
                <h3 class="fw-bold h5 mb-3 text-center">Realisasi Anggaran Satker Provinsi X</h3>
                <div class="chart-box" style="height: 300px; width:100%;">
                    <canvas id="chartRealisasiSatkerPr" aria-label="Realisasi Anggaran per UK III Lingkup Direktorat"
                        role="img"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mb-b fw-bold h5">Sandingan Realisasi Anggaran, Capaian Output dan Capaian Kinerja</h3>
                <div class="chart-box" style="height: 300px; width:100%;">
                    <canvas id="chartSandingan" aria-label="Sandingan Realisasi Anggaran" role="img"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="fw-bold h5 mb-3">Rekapitulasi Revisi Daerah</h3>
                <div class="card fw-normal card-dongker">
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <select class="form-select form-select-sm" name="" id="">
                                        <option selected>Provinsi</option>
                                        <option value="">Provinsi 1</option>
                                        <option value="">Provinsi 2</option>
                                        <option value="">Provinsi 3</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select form-select-sm" name="" id="">
                                        <option selected>Satker</option>
                                        <option value="">Satker 1</option>
                                        <option value="">Satker 2</option>
                                        <option value="">Satker 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <select class="form-select form-select-sm" name="" id="">
                                        <option selected>Tahun</option>
                                        <option value="">2024</option>
                                        <option value="">2023</option>
                                        <option value="">2022</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <select class="form-select form-select-sm" name="" id="">
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
                <div class="card fw-normal card-dongker mt-4">
                    <div class="card-body">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Jumlah Revisi Daerah </td>
                                    <td> : Rp.0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalPaguAnggaran" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <button class="nav-link active" id="sebaranPagu-tab" data-bs-toggle="tab"
                                data-bs-target="#sebaranPagu" type="button" role="tab"
                                aria-controls="sebaranPagu" aria-selected="false">
                                Sebaran Pagu
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="riwayatPagu-tab" data-bs-toggle="tab"
                                data-bs-target="#riwayatPagu" type="button" role="tab"
                                aria-controls="riwayatPagu" aria-selected="true">
                                Riwayat Pagu
                            </button>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="sebaranPagu" role="tabpanel"
                            aria-labelledby="sebaranPagu-tab">
                            <div class="row">
                                <div class="col-12 p-3">
                                    <h3>Pagu per Tugas Satker X</h3>
                                    <div class="chart-box" style="height: 400px; width: 100%">
                                        <canvas id="chartPagu" aria-label="Pagu per Tugas Satker X"
                                            role="img"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="riwayatPagu" role="tabpanel" aria-labelledby="riwayatPagu-tab">
                            <h3 class="mt-3">Riwayat Pagu</h3>
                            <div class="d-flex p-3 gap-3">
                                <div class="mb-3 mr-3">
                                    <label for="" class="form-label">Tanggal Revisi</label>
                                    <input type="date" class="form-control" name="" id=""
                                        aria-describedby="helpId" placeholder="" />
                                </div>
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Jenis Revisi</label>
                                        <select class="form-select form-select" name=""
                                            id="selectJenisRevisi">
                                            <option selected>Semua</option>
                                            <option value="">DIPA</option>
                                            <option value="">POK</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive p-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Jenis Revisi</th>
                                            <th scope="col">Revisi Ke</th>
                                            <th scope="col">Tanggal Revisi</th>
                                            <th scope="col">PAGU</th>
                                            <th scope="col">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="">
                                            <td scope="row">DIPA</td>
                                            <td>1</td>
                                            <td>29/11/2023</td>
                                            <td>Rp.000.000.000,00</td>
                                            <td>DIPA Awal. PAGU Pusat Rp.000.000.000,00. PAGU Dekonsentrasi:
                                                Rp.000.000.000,00</td>
                                        </tr>
                                        <tr class="">
                                            <td scope="row">POK</td>
                                            <td>1</td>
                                            <td>29/11/2023</td>
                                            <td>Rp.000.000.000,00</td>
                                            <td>DIPA Awal. PAGU Pusat Rp.000.000.000,00. PAGU Dekonsentrasi:
                                                Rp.000.000.000,00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalRealisasiAnggaran" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="modalRealisasiAnggaranpLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="modalRealisasiAnggaranLabel">Realisasi Anggaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4 text-center">
                            <h6>Tugas A</h6>
                            <div class="chart-box" style="width: 100px; height: 100px; margin: auto;">
                                <canvas id="chartRAT1" width="100" height="100" aria-label="Realisasi Tugas"
                                    role="img"></canvas>
                            </div>
                            <p>Realisasi</p>
                            <p class="fw-bold">Rp.000.000.000,00</p>
                        </div>
                        <div class="col-4 text-center">
                            <h6>Tugas B</h6>
                            <div class="chart-box" style="width: 100px; height: 100px; margin: auto;">
                                <canvas id="chartRAT2" width="100" height="100" aria-label="Realisasi Tugas"
                                    role="img"></canvas>
                            </div>
                            <p>Realisasi</p>
                            <p class="fw-bold">Rp.000.000.000,00</p>
                        </div>
                        <div class="col-4 text-center">
                            <h6>Tugas C</h6>
                            <div class="chart-box" style="width: 100px; height: 100px; margin: auto;">
                                <canvas id="chartRAT3" width="100" height="100" aria-label="Realisasi Tugas"
                                    role="img"></canvas>
                            </div>
                            <p>Realisasi</p>
                            <p class="fw-bold">Rp.000.000.000,00</p>
                        </div>
                        <div class="col-4 text-center">
                            <h6>Tugas D</h6>
                            <div class="chart-box" style="width: 100px; height: 100px; margin: auto;">
                                <canvas id="chartRAT4" width="100" height="100" aria-label="Realisasi Tugas"
                                    role="img"></canvas>
                            </div>
                            <p>Realisasi</p>
                            <p class="fw-bold">Rp.000.000.000,00</p>
                        </div>
                        <div class="col-4 text-center">
                            <h6>Tugas E</h6>
                            <div class="chart-box" style="width: 100px; height: 100px; margin: auto;">
                                <canvas id="chartRAT5" width="100" height="100" aria-label="Realisasi Tugas"
                                    role="img"></canvas>
                            </div>
                            <p>Realisasi</p>
                            <p class="fw-bold">Rp.000.000.000,00</p>
                        </div>
                        <div class="col-4 text-center">
                            <h6>Tugas F</h6>
                            <div class="chart-box" style="width: 100px; height: 100px; margin: auto;">
                                <canvas id="chartRAT6" width="100" height="100" aria-label="Realisasi Tugas"
                                    role="img"></canvas>
                            </div>
                            <p>Realisasi</p>
                            <p class="fw-bold">Rp.000.000.000,00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalSisaAnggaran" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="modalSisaAnggaranLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="modalSisaAnggaranLabel">Sisa Anggaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4 text-center">
                            <h6>Tugas A</h6>
                            <div class="chart-box" style="width: 100px; height: 100px; margin: auto;">
                                <canvas id="chartSAT1" width="100" height="100" aria-label="Sisa Tugas"
                                    role="img"></canvas>
                            </div>
                            <p>Sisa</p>
                            <p class="fw-bold">Rp.000.000.000,00</p>
                        </div>
                        <div class="col-4 text-center">
                            <h6>Tugas B</h6>
                            <div class="chart-box" style="width: 100px; height: 100px; margin: auto;">
                                <canvas id="chartSAT2" width="100" height="100" aria-label="Sisa Tugas"
                                    role="img"></canvas>
                            </div>
                            <p>Sisa</p>
                            <p class="fw-bold">Rp.000.000.000,00</p>
                        </div>
                        <div class="col-4 text-center">
                            <h6>Tugas C</h6>
                            <div class="chart-box" style="width: 100px; height: 100px; margin: auto;">
                                <canvas id="chartSAT3" width="100" height="100" aria-label="Sisa Tugas"
                                    role="img"></canvas>
                            </div>
                            <p>Sisa</p>
                            <p class="fw-bold">Rp.000.000.000,00</p>
                        </div>
                        <div class="col-4 text-center">
                            <h6>Tugas D</h6>
                            <div class="chart-box" style="width: 100px; height: 100px; margin: auto;">
                                <canvas id="chartSAT4" width="100" height="100" aria-label="Sisa Tugas"
                                    role="img"></canvas>
                            </div>
                            <p>Sisa</p>
                            <p class="fw-bold">Rp.000.000.000,00</p>
                        </div>
                        <div class="col-4 text-center">
                            <h6>Tugas E</h6>
                            <div class="chart-box" style="width: 100px; height: 100px; margin: auto;">
                                <canvas id="chartSAT5" width="100" height="100" aria-label="Sisa Tugas"
                                    role="img"></canvas>
                            </div>
                            <p>Sisa</p>
                            <p class="fw-bold">Rp.000.000.000,00</p>
                        </div>
                        <div class="col-4 text-center">
                            <h6>Tugas F</h6>
                            <div class="chart-box" style="width: 100px; height: 100px; margin: auto;">
                                <canvas id="chartSAT6" width="100" height="100" aria-label="Sisa Tugas"
                                    role="img"></canvas>
                            </div>
                            <p>Sisa</p>
                            <p class="fw-bold">Rp.000.000.000,00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- Chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
    <script>
        const chartRealisasiSatkerDa = document.getElementById('chartRealisasiSatkerDa');
        const chartRealisasiSatkerPr = document.getElementById('chartRealisasiSatkerPr');
        const chartSandingan = document.getElementById('chartSandingan');
        const chartPagu = document.getElementById('chartPagu');

        const chartRAT1 = document.getElementById('chartRAT1');
        const chartRAT2 = document.getElementById('chartRAT2');
        const chartRAT3 = document.getElementById('chartRAT3');
        const chartRAT4 = document.getElementById('chartRAT4');
        const chartRAT5 = document.getElementById('chartRAT5');
        const chartRAT6 = document.getElementById('chartRAT6');

        const chartSAT1 = document.getElementById('chartSAT1');
        const chartSAT2 = document.getElementById('chartSAT2');
        const chartSAT3 = document.getElementById('chartSAT3');
        const chartSAT4 = document.getElementById('chartSAT4');
        const chartSAT5 = document.getElementById('chartSAT5');
        const chartSAT6 = document.getElementById('chartSAT6');

        new Chart(chartRealisasiSatkerDa, {
            type: 'bar',
            data: {
                labels: ['Provinsi A', 'Provinsi B', 'Provinsi C', 'Provinsi D', 'Provinsi E', 'Provinsi F',
                    'Provinsi G', 'Provinsi H', 'Provinsi I'
                ],
                datasets: [{
                    label: 'Realisasi Anggaran per UK II',
                    data: [100, 90, 80, 70, 60, 50, 40, 30, 20],
                    borderWidth: 1,
                    backgroundColor: '#2C83D2'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(chartRealisasiSatkerPr, {
            type: 'bar',
            data: {
                labels: ['Satker A', 'Satker B', 'Satker C', 'Satker D'],
                datasets: [{
                    label: 'Realisasi Anggaran per UK III',
                    data: [100, 90, 80, 70],
                    borderWidth: 1,
                    backgroundColor: '#2C83D2'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(chartSandingan, {
            data: {
                labels: ['Subdit A', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ],
                datasets: [{
                    type: 'line',
                    label: 'Realisasi Anggaran',
                    data: [0, 20, 40, 60, 80, 100, 120, 140, 160, 180, 200, 220],
                    fill: false,
                    borderColor: 'red',
                    tension: 0.1
                }, {
                    type: 'line',
                    label: 'Capaian Output',
                    data: [0, 10, 15, 20, 25, 30, 35, 40, 50, 65, 90, 100],
                    fill: false,
                    borderColor: 'green',
                    tension: 0.1
                }, {
                    type: 'line',
                    label: 'Capaian Kinerja',
                    data: [0, 10, 15, 20, 25, 30, 25, 15, 60, 85, 95, 100],
                    fill: false,
                    borderColor: 'blue',
                    tension: 0.1
                }]
            }
        });

        new Chart(chartPagu, {
            type: 'bar',
            data: {
                labels: ['Tugas A', 'Tugas B', 'Tugas C', 'Tugas D', 'Tugas E', 'Tugas F'],
                datasets: [{
                    label: 'Realisasi per Tugas Satker X',
                    data: [100, 80, 90, 70, 80, 100],
                    borderWidth: 1,
                    backgroundColor: '#2C83D2'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(chartRAT1, {
            type: 'doughnut',
            data: {
                // labels: [
                //   'Realisasi',
                // ],
                datasets: [{
                    label: 'Realisasi Tugas',
                    data: [70, 30],
                    backgroundColor: [
                        '#129106',
                        '#999'
                    ],
                    hoverOffset: 4
                }]
            }
        });

        new Chart(chartRAT2, {
            type: 'doughnut',
            data: {
                // labels: [
                //   'Realisasi',
                // ],
                datasets: [{
                    label: 'Realisasi Tugas',
                    data: [70, 30],
                    backgroundColor: [
                        '#129106',
                        '#999'
                    ],
                    hoverOffset: 4
                }]
            }
        });

        new Chart(chartRAT3, {
            type: 'doughnut',
            data: {
                // labels: [
                //   'Realisasi',
                // ],
                datasets: [{
                    label: 'Realisasi Tugas',
                    data: [70, 30],
                    backgroundColor: [
                        '#129106',
                        '#999'
                    ],
                    hoverOffset: 4
                }]
            }
        });

        new Chart(chartRAT4, {
            type: 'doughnut',
            data: {
                // labels: [
                //   'Realisasi',
                // ],
                datasets: [{
                    label: 'Realisasi Tugas',
                    data: [70, 30],
                    backgroundColor: [
                        '#129106',
                        '#999'
                    ],
                    hoverOffset: 4
                }]
            }
        });

        new Chart(chartRAT5, {
            type: 'doughnut',
            data: {
                // labels: [
                //   'Realisasi',
                // ],
                datasets: [{
                    label: 'Realisasi Tugas',
                    data: [70, 30],
                    backgroundColor: [
                        '#129106',
                        '#999'
                    ],
                    hoverOffset: 4
                }]
            }
        });

        new Chart(chartRAT6, {
            type: 'doughnut',
            data: {
                // labels: [
                //   'Realisasi',
                // ],
                datasets: [{
                    label: 'Realisasi Tugas',
                    data: [70, 30],
                    backgroundColor: [
                        '#129106',
                        '#999'
                    ],
                    hoverOffset: 4
                }]
            }
        });

        new Chart(chartSAT1, {
            type: 'doughnut',
            data: {
                // labels: [
                //   'Realisasi',
                // ],
                datasets: [{
                    label: 'Sisa Tugas',
                    data: [70, 30],
                    backgroundColor: [
                        '#129106',
                        '#999'
                    ],
                    hoverOffset: 4
                }]
            }
        });

        new Chart(chartSAT2, {
            type: 'doughnut',
            data: {
                // labels: [
                //   'Realisasi',
                // ],
                datasets: [{
                    label: 'Sisa Tugas',
                    data: [70, 30],
                    backgroundColor: [
                        '#129106',
                        '#999'
                    ],
                    hoverOffset: 4
                }]
            }
        });

        new Chart(chartSAT3, {
            type: 'doughnut',
            data: {
                // labels: [
                //   'Realisasi',
                // ],
                datasets: [{
                    label: 'Sisa Tugas',
                    data: [70, 30],
                    backgroundColor: [
                        '#129106',
                        '#999'
                    ],
                    hoverOffset: 4
                }]
            }
        });

        new Chart(chartSAT4, {
            type: 'doughnut',
            data: {
                // labels: [
                //   'Realisasi',
                // ],
                datasets: [{
                    label: 'Sisa Tugas',
                    data: [70, 30],
                    backgroundColor: [
                        '#129106',
                        '#999'
                    ],
                    hoverOffset: 4
                }]
            }
        });

        new Chart(chartSAT5, {
            type: 'doughnut',
            data: {
                // labels: [
                //   'Realisasi',
                // ],
                datasets: [{
                    label: 'Sisa Tugas',
                    data: [70, 30],
                    backgroundColor: [
                        '#129106',
                        '#999'
                    ],
                    hoverOffset: 4
                }]
            }
        });

        new Chart(chartSAT6, {
            type: 'doughnut',
            data: {
                // labels: [
                //   'Realisasi',
                // ],
                datasets: [{
                    label: 'Sisa Tugas',
                    data: [70, 30],
                    backgroundColor: [
                        '#129106',
                        '#999'
                    ],
                    hoverOffset: 4
                }]
            }
        });
    </script>
</body>

</html>
