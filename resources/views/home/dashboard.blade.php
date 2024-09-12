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

    <link rel="stylesheet"
        href="{{ asset('') }}templates/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet"
        href="{{ asset('') }}templates/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet"
        href="{{ asset('') }}templates/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('newdashboard/css/newstyles.css') }}?v={{ time() }}" />
    <link rel="stylesheet" href="{{ asset('') }}templates/dist/css/adminlte.css" />

</head>

<body>
    @php
        $persen_realisasi = ($realisasi / $anggaran) * 100;
        $persen_selisih = ($selisih / $anggaran) * 100;
        $persen_pagu_pusat = ($pagu_pusat / $anggaran) * 100;
        $persen_realisasi_pusat = $pagu_pusat != 0 ? ($realisasi / $pagu_pusat) * 100 : 0;
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
        $persen_realisasi_rm = $rm_pusat != 0 ? ($realisasi / $rm_pusat) * 100 : 0;
        $persen_sisa_rm = $rm_pusat != 0 ? ($sisa_rm_pusat / $rm_pusat) * 100 : 0;

        $realisasi_rm_pusat = $realisasi - $realisasi_phln;
        $sisa_rm_pusat = $rm_pusat - $realisasi_rm_pusat;

        $persen_sisa_rm = $rm_pusat != 0 ? ($sisa_rm_pusat / $rm_pusat) * 100 : 0;
        $persen_realisasi_rm = 100 - $persen_sisa_rm;

        $persen_pagu_phln = $pagu_pusat != 0 ? ($phln_pusat / $pagu_pusat) * 100 : 0;
        $persen_realisasi_phln = $phln_pusat != 0 ? ($realisasi_phln / $phln_pusat) * 100 : 0;
        $persen_sisa_phln = $phln_pusat != 0 ? (($phln_pusat - $realisasi_phln) / $phln_pusat) * 100 : 0;
    @endphp
    <div class="container-fluid">
        <!-- {{ $real_eselon1 }} -->
        <div class="navigasi">
            <!-- <div class="mainmenu mt-2 collapse" id="menuNav"> -->
            <ul class="list-unstyled">
                <li><a href="/" class="btn btn-dongker">Home</a></li>
                <li>
                    <a href="#menuTiketing" class="btn btn-dongker" data-bs-toggle="collapse">E Tiketing &#11206;</a>
                    <ul class="list-unstyled collapse ps-3" id="menuTiketing">
                        @if (empty(Auth::user()->prov) ||
                                Auth::user()->level == '0' ||
                                Auth::user()->prov == 'pusat' ||
                                Auth::user()->username == '198505062004121001')
                            <li><a href="{{ route('ticketing.view-revisi-pusat') }}"
                                    class="btn btn-sm btn-primary btn-pills my-1">Pengajuan Revisi Pusat</a></li>
                            <li><a href="{{ route('usulan.kegiatan') }}"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Usulan kegiatan</a></li>
                        @endif

                        @if (!empty(Auth::user()->prov) || Auth::user()->level == '0' || Auth::user()->username == '198505062004121001')
                            <li>
                                <a href="#menuRevda" class="btn btn-sm btn-primary btn-pills mb-1"
                                    data-bs-toggle="collapse">Pengajuan Revisi Daerah &#11206;</a>
                                <ul class="list-unstyled collapse ps-3" id="menuRevda">
                                    <li><a href="{{ route('ticketing.revisi-gwpp') }}"
                                            class="btn btn-sm btn-warning btn-pills mb-1">Revisi kegiatan GWPP</a></li>
                                    <li><a href="{{ route('ticketing.view-sarpras-daerah') }}"
                                            class="btn btn-sm btn-warning btn-pills mb-1">Revisi kegiatan Sarpras</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#" class="btn btn-sm btn-primary btn-pills mb-1">Quality Surveyor</a>
                            </li>
                    </ul>
                </li>
                @endif

                @if (empty(Auth::user()->prov) || Auth::user()->username == '198505062004121001')
                    @if (Auth::user()->level == 0 ||
                            Auth::user()->level == 1 ||
                            Auth::user()->level == 5 ||
                            Auth::user()->level == 6 ||
                            Auth::user()->username == '198505062004121001')
                        <li><a href="{{ route('pok.terbit-pok') }}" class="btn btn-dongker">Penerbitan POK</a></li>
                    @endif
                @endif

                @if (Auth::user()->level == 0 ||
                        Auth::user()->level == 5 ||
                        Auth::user()->level == 2 ||
                        Auth::user()->level == 3 ||
                        Auth::user()->username == '198505062004121001')
                    <li>
                        <a href="#menuCapaiOut" class="btn btn-dongker" data-bs-toggle="collapse">Capaian Output
                            &#11206;</a>
                        <ul class="list-unstyled collapse ps-3" id="menuCapaiOut">
                            @if (empty(Auth::user()->prov))
                                <li>
                                    <a href="#menuCapaiPus" class="btn btn-sm btn-primary btn-pills my-1"
                                        data-bs-toggle="collapse">Capaian Pusat &#11206;</a>
                                    <ul class="list-unstyled collapse ps-3" id="menuCapaiPus">
                                        <li><a href="{{ route('capaian.capaian-output') }}"
                                                class="btn btn-sm btn-warning btn-pills mb-1">Komponen Input</a></li>
                                        <li><a href="{{ route('capaian.validasi-capaian-output') }}"
                                                class="btn btn-sm btn-warning btn-pills mb-1">Rincian Output</a></li>
                                    </ul>
                                </li>
                            @endif
                            <li>
                                <a href="#menuCapaiDa" class="btn btn-sm btn-primary btn-pills mb-1"
                                    data-bs-toggle="collapse">Capaian Daerah &#11206;</a>
                                <ul class="list-unstyled collapse ps-3" id="menuCapaiDa">
                                    <li><a href="{{ route('capaian.capaian-output-daerah') }}"
                                            class="btn btn-sm btn-warning btn-pills mb-1">Komponen Input</a></li>
                                    <li><a href="{{ route('capaian.capaian-output-daerah') }}"
                                            class="btn btn-sm btn-warning btn-pills mb-1">Rincian Output</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endif

                <li>
                    <a href="#menuCapaiKin" class="btn btn-dongker" data-bs-toggle="collapse">Capaian Kinerja
                        &#11206;</a>
                    <ul class="list-unstyled collapse ps-3" id="menuCapaiKin">
                        <li>
                            <a href="#menuCapaiKiPus" class="btn btn-sm btn-primary btn-pills my-1"
                                data-bs-toggle="collapse">Capaian Pusat &#11206;</a>
                            <ul class="list-unstyled collapse ps-3" id="menuCapaiKiPus">
                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">IKP</a></li>
                                <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">IKK</a></li>
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

                @if (Auth::user()->level == 0 || Auth::user()->username == '198505062004121001')
                    <li><a href="" class="btn btn-dongker">Master</a></li>
                    <li><a href="{{ route('master.history-pagu') }}" class="btn btn-dongker"
                            class="btn btn-dongker">Riwayat Pagu</a></li>
                @endif

                @if (Auth::user()->level == 0 || Auth::user()->username == '198505062004121001')
                    <li><a href="" class="btn btn-dongker">Angket</a></li>
                @endif

                @if (Auth::user()->level == '0' || Auth::user()->username == '198505062004121001')
                    <li>
                        <a href="{{ route('tes.index') }}" class="btn btn-dongker">Realisasi Anggaran</a>
                        {{-- <ul class="list-unstyled collapse ps-3" id="menuRealisasi">
							<li>
								<a href="" class="btn btn-sm btn-primary btn-pills my-1">Realisasi Pusat</a>
							</li>
							<li>
								<a href="" class="btn btn-sm btn-primary btn-pills mb-1">Realisasi Dekon </a>
							</li>
                            <li>
								<a href="" class="btn btn-sm btn-primary btn-pills mb-1">Realisasi TP</a>
							</li>
						</ul> --}}
                    </li>
                @endif

                @if (Auth::user()->level == '0' || Auth::user()->username == '198505062004121001')
                    <li>
                        <a href="#menuAplikasi" class="btn btn-dongker" data-bs-toggle="collapse">ERD &#11206;</a>
                        <ul class="list-unstyled collapse ps-3" id="menuAplikasi">
                            <li>
                                <a href="" class="btn btn-sm btn-primary btn-pills mb-1">Integrasi SAKTI</a>
                            </li>
                            <li>
                                <a href="https://sipgwpp.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">SIP GWPP</a>
                            </li>
                            <li>
                                <a href="https://simlinmas.kemendagri.go.id/management/login"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Simlinmas</a>
                            </li>
                            <li>
                                <a href="https://siapkk.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">SIAPKK</a>
                            </li>
                            <li>
                                <a href="https://sidamkar.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">SiDamkar</a>
                            </li>
                            <li>
                                <a href="https://sarina.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Sarina</a>
                            </li>
                            <li>
                                <a href="https://payroll-adwil.kemendagri.go.id/login"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Payroll</a>
                            </li>
                            <li>
                                <a href="https://ikm-adwil.kemendagri.go.id/login"
                                    class="btn btn-sm btn-primary btn-pills mb-1">IKM</a>
                            </li>
                            <li>
                                <a href="https://jf-polpp.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">JFPolPP</a>
                            </li>
                            <li>
                                <a href="https://kodewilayah.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Kode Wilayah</a>
                            </li>
                            <li>
                                <a href="https://profilpulau.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Pulau</a>
                            </li>
                            <li>
                                <a href="https://spm.bangda.kemendagri.go.id/2021/home"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Trantibumlinmas</a>
                            </li>
                            <li>
                                <a href="https://emonev-dpmptsp.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">DPMPTSP</a>
                            </li>
                            <li>
                                <a href="https://puu-adwil.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">PUU</a>
                            </li>
                            <li>
                                <a href="https://siratu.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Siratu</a>
                            </li>
                            <li>
                                <a href="https://pagarspmbencana.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Pagar SPM Bencana</a>
                            </li>
                            <li>
                                <a href="https://satpolpp.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">SimpolPP</a>
                            </li>
                            <li>
                                <a href="https://ditjenbinaadwil.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Ditjen Bina Adwil</a>
                            </li>
                            <li>
                                <a href="https://cloud-adwil.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Cloud keuangan</a>
                            </li>
                            <li>
                                <a href="https://index-suburusanbencana.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Index Bencana</a>
                            </li>
                            <li>
                                <a href="https://simpeg-adwil.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Simpeg Adwil</a>
                            </li>
                            <li>
                                <a href="https://registrasi-sidamkar.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Registrasi Sidamkar</a>
                            </li>
                            <li>
                                <a href="https://pertanahan.kemendagri.go.id/"
                                    class="btn btn-sm btn-primary btn-pills mb-1">Pertanahan</a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li><a href="{{ route('profile') }}" class="btn btn-dongker">Profile</a></li>
                <li>
                    <a class="btn btn-dongker" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
            <!-- </div> -->
        </div>
        <div class="main">
            <div class="row">
                <div class="toggle col-md-1" id="menuNav">
                    <a href="#menuNav">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
                <div class="col-md-8 d-flex logo-admin">
                    <img src="{{ asset('newdashboard/images/logo-emonev.png') }}" alt="logo emonev"
                        class="img-fluid margin-auto logo-smaller">
                    <div class="text-center">
                        <h1 class="title">E-MONEV</h1>
                        <h2 class="subtitle">DITJEN BINA ADMINISTRASI KEWILAYAHAN</h2>
                    </div>
                </div>
                <div class="avatar col-md-3 p-2 d-flex">
                    <img src="{{ asset('newdashboard/images/user-avatar.png') }}" alt=""
                        class="img-fluid avatar-img me-2">
                    <div class="avatar-name small fw-bold">
                        Selamat Datang Admin,<br>
                        Bagian Perencanaan
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-dongker text-center">
                        <div class="card-body position-relative">
                            <h5 class="card-title h6">Pagu Anggaran Ditjen Bina Adwil</h5>
                            <p class="h5">Rp {{ number_format($data_pagu->pagu, 2, ',', '.') }}<br>&nbsp;</p>
                            <div class="progress mb-2" role="progressbar" aria-label="Success example 4px high"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                                <div class="progress-bar bg-success" style="width: 100%"></div>
                            </div>
                            <p class="card-text small">{{ $data_pagu->title }}. Tanggal:
                                {{ date('d/m/Y', strtotime($data_pagu->tanggal)) }}</p>
                            <span class="position-absolute end-0 bottom-0">
                                <a class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                                    data-bs-target="#modal-detail-pagu">&#129106;</a>
                            </span>
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
                            <span class="position-absolute end-0 bottom-0"><button type="button"
                                    class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                                    data-bs-target="#modalPaguAnggaran">&#129106;</button></span>
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
                            <span class="position-absolute end-0 bottom-0"><button type="button"
                                    class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                                    data-bs-target="#modalPaguAnggaran">&#129106;</button></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 px-5">
                    <h3 class="mb-3 fw-bold h5 text-center">Realisasi Anggaran per Kewenangan (Pagu Anggaran)</h3>
                    <div class="row fw-semibold">
                        <div class="col-md-4 text-center">
                            <h4 class="h6">PUSAT (Total)</h4>
                            <p>Rp. {{ number_format($realisasi, 2, ',', '.') }}</p>
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
                <div class="col-md-6 px-5">
                    <h3 class="mb-3 fw-bold h5 text-center">Realisasi Anggaran per Eselon 1 Lingkup Kemendagri</h3>
                    <div class="chart-box" style="height: 300px; width:100%;">
                        <canvas id="chartRealisasi"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-b fw-bold h5">Sandingan Realisasi Anggaran, Capaian Output dan Capaian Kinerja</h3>
                    <div class="" style="height: 100%; width: 100%">
                        <canvas id="chartSandingan"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="mb-3 fw-bold h5">Rekapitulasi Revisi dan Usulan Kegiatan</h3>
                    <div class="card fw-normal card-dongker">
                        <div class="card-body">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="" id=""
                                    value="{3:option1}" />
                                <label class="form-check-label" for="">Pusat</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="" id=""
                                    value="option2" />
                                <label class="form-check-label" for="">Daerah</label>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <select class="form-select form-select-sm" name="" id="">
                                            <option selected>Direktorat Dekon, TP dan Kerjasama</option>
                                            <option value="">option 1</option>
                                            <option value="">option 2</option>
                                            <option value="">option 3</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-select form-select-sm" name="" id="">
                                            <option selected>Sub Direktorat</option>
                                            <option value="">option 1</option>
                                            <option value="">option 2</option>
                                            <option value="">option 3</option>
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
                        {{-- modal pagu anggaran --}}
                        <div class="modal fade" id="modal-detail-pagu" data-bs-backdrop="static">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title fs-5">Pagu Anggaran Ditjen Bina Adwil</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body bg-light-grey">
                                        <div class="row mt-3">
                                            <div class="col-2">
                                                <select class="form-select form-select-sm" name="urutan_revisi"
                                                    id="urutan_revisi">
                                                    <option value="desc" selected>Revisi Terbaru</option>
                                                    <option value="asc">Revisi Terlama</option>
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <select class="form-select form-select-sm" name="jenis_revisi"
                                                    id="jenis_revisi">
                                                    <option value="" selected>Semua Jenis Revisi</option>
                                                    <option value="DIPA">DIPA</option>
                                                    <option value="POK">POK</option>
                                                </select>
                                            </div>
                                            <div class="col-8">
                                                <p class="h3 text-end fw-bold">Rp
                                                    {{ number_format($data_pagu->pagu, 2, ',', '.') }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6" id="riwayat_pagu">
                                                {{-- <div class="table-responsive">
                                        <table class="table table-light">
                                        <thead>
                                            <tr>
                                            <th scope="col" class="text-nowrap">Jenis Revisi</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Pagu</th>
                                            <th scope="col">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($history_pagu as $pagu)
                                            <tr class="" data-jenis="{{ $pagu->jenis }}" data-sort="d{{ $pagu->date_sort }}">
                                            <td scope="row">{{ $pagu->jenis }}</td>
                                            <td>{{ $pagu->tgl }}</td>
                                            <td>{{ $pagu->nominal }}</td>
                                            <td>{{ $pagu->keterangan }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                    </div> --}}
                                                @foreach ($history_pagu as $pagu)
                                                    <div class="card my-3" data-jenis="{{ $pagu->jenis }}"
                                                        data-sort="d{{ $pagu->date_sort }}">
                                                        <div class="card-body row">
                                                            <div class="col-3">
                                                                <h5 class="card-title">Jenis Revisi</h5>
                                                                <h6 class="card-subtitle mb-2 text-body-secondary">
                                                                    {{ $pagu->jenis }}</h6>
                                                            </div>
                                                            <div class="col-3">
                                                                <h5 class="card-title">Tanggal</h5>
                                                                <h6 class="card-subtitle mb-2 text-body-secondary">
                                                                    {{ $pagu->tgl }}</h6>
                                                            </div>
                                                            <div class="col-3">
                                                                <h5 class="card-title">Pagu</h5>
                                                                <h6 class="card-subtitle mb-2 text-body-secondary">
                                                                    {{ $pagu->nominal }}</h6>
                                                            </div>
                                                            <div class="col-12">
                                                                <h5 class="card-title">Keterangan</h5>
                                                                <h6 class="card-subtitle mb-2 text-body-secondary">
                                                                    {{ $pagu->keterangan }}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="col-6 py-3 card mt-3">
                                                <h3 class="mb-3 fw-bold h6">Pagu per Unit Kerja Eselon II</h3>
                                                <div class="chart-box">
                                                    <canvas id="chartPagu"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                        <!-- modal -->
                        <!-- Button trigger modal -->
                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Launch static backdrop modal
                </button> --}}

                        <!-- Modal -->
                        <div class="modal fade" id="modalPaguAnggaran" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalPaguAnggaranLabel">Pagu Anggaran</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" id="tabsPaguAnggaran" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="sebaranPagu-tab"
                                                    data-bs-toggle="tab" data-bs-target="#sebaranPagu" type="button"
                                                    role="tab" aria-controls="sebaranPagu" aria-selected="false">
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
                                            <div class="tab-pane" id="riwayatPagu" role="tabpanel"
                                                aria-labelledby="riwayatPagu-tab">
                                                Riwayat Pagu
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="{{ asset('') }}landing-pages/js/jquery-3.3.1.min.js"></script>
                <script src="{{ asset('') }}landing-pages/js/popper.min.js"></script>

                <!-- Bootstrap -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
                </script>
                <!-- Chartjs -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>

                <!-- DataTables  & Plugins -->
                <script src="{{ asset('') }}templates/plugins/datatables/jquery.dataTables.min.js"></script>
                <script src="{{ asset('') }}templates/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
                <script src="{{ asset('') }}templates/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
                <script src="{{ asset('') }}templates/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
                <script src="{{ asset('') }}templates/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
                <script src="{{ asset('') }}templates/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
                <script src="{{ asset('') }}templates/plugins/jszip/jszip.min.js"></script>
                <script src="{{ asset('') }}templates/plugins/pdfmake/pdfmake.min.js"></script>
                <script src="{{ asset('') }}templates/plugins/pdfmake/vfs_fonts.js"></script>
                <script src="{{ asset('') }}templates/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
                <script src="{{ asset('') }}templates/plugins/datatables-buttons/js/buttons.print.min.js"></script>
                <script src="{{ asset('') }}templates/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

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
                            responsive: true,
                            maintainAspectRatio: false,
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

                    var chartEselon2;

                    const modalPagu = document.getElementById('modal-detail-pagu')

                    modalPagu.addEventListener('shown.bs.modal', () => {
                        const chartPagu = document.getElementById('chartPagu');

                        chartEselon2 = new Chart(chartPagu, {
                            type: 'bar',
                            data: {
                                labels: {!! $satker_eselon2 !!},
                                datasets: [{
                                    data: {!! $pagu_eselon2 !!},
                                    backgroundColor: '#6eb5f3'
                                }]
                            },
                            options: {
                                plugins: {
                                    legend: {
                                        display: false,
                                    }
                                },
                                onClick: getEselon3
                            }
                        })
                    });

                    function getEselon3(evt) {
                        const xAxis = chartEselon2.scales.x;
                        const xPos = Math.floor(
                            xAxis.getValueForPixel(evt.x) + 1e-10
                        );
                        //console.log(evt, chartEselon2.getDatasetMeta(0)['data'][xPos]);
                    }

                    var ascending = false;
                    var $paguWrapper = $('#riwayat_pagu');
                    var $paguList = $paguWrapper.children('div.card');
                    var sortList = Array.prototype.sort.bind($paguList);

                    $(function() {
                        $("#jenis_revisi").on('change', function() {
                            var jenis = $("#jenis_revisi").find(":selected").val() || "";
                            console.log('change jenis', jenis);
                            if (jenis.length > 0) {
                                $("#riwayat_pagu").find("div.card[data-jenis!='" + jenis + "']").addClass('d-none');
                                $("#riwayat_pagu").find("div.card[data-jenis='" + jenis + "']").removeClass('d-none');
                            } else {
                                $("#riwayat_pagu").find("div.card").removeClass('d-none');
                            }
                        });

                        $('#urutan_revisi').on('change', function() {
                            ascending = $("#urutan_revisi").find(":selected").val() == 'asc';
                            sortList(function(a, b) {
                                var aValue = $(a).data('sort');
                                var bValue = $(b).data('sort');
                                return ascending ? aValue.localeCompare(bValue) : bValue.localeCompare(aValue);
                            });
                            $paguWrapper.append($paguList);
                        });
                    });

                    // menu togle
                    let toggle = document.querySelector('.toggle');
                    let navigasi = document.querySelector('.navigasi');
                    let main = document.querySelector('.main');

                    toggle.onclick = function() {
                        navigasi.classList.toggle('active');
                        main.classList.toggle('active');
                    }
                    // add hovered class in selected list items
                    let list = document.querySelectorAll('.navigasi li');

                    function activelink() {
                        list.forEach((item) =>
                            item.classList.remove('hovered'));
                        this.classList.add('hovered');
                    }
                    list.forEach((item) =>
                        item.addEventListener('mouseover', activelink));
                </script>
</body>

</html>
