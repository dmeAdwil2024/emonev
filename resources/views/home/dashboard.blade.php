@extends('layouts.master')

@section('content')
    @php
        $persen_realisasi = ($realisasi / $pagu_new) * 100;
        $persen_selisih = ($selisih / $pagu_new) * 100;
        // $persen_pagu_pusat      = ($pagu_pusat/$anggaran)*100;
        $persen_pagu_pusat = ($pagu_pusat / $pagu_new) * 100;
        $persen_realisasi_pusat = ($realisasi / $pagu_pusat) * 100;
        $persen_sisa_pusat = ($sisa_pusat / $pagu_pusat) * 100;
        if ($pagu_dekon === 0) {
            $persen_pagu_dekon = 0;
            $persen_realisasi_dekon = 0;
            $persen_sisa_dekon = 0;
        } else {
            // $persen_pagu_dekon      = ($pagu_dekon/$anggaran)*100;
            $persen_pagu_dekon = ($pagu_dekon / $pagu_new) * 100;
            $persen_realisasi_dekon = ($realisasi_dekon / $pagu_dekon) * 100;
            $persen_sisa_dekon = ($sisa_dekon / $pagu_dekon) * 100;
        }

        if ($pagu_tp != 0) {
            // $persen_pagu_tp      = $pagu_tp/$anggaran*100;
            $persen_pagu_tp = ($pagu_tp / $pagu_new) * 100;
            $persen_realisasi_tp = ($realisasi_tp / $pagu_tp) * 100;
            $persen_sisa_tp = ($sisa_tp / $pagu_tp) * 100;
        } else {
            $persen_pagu_tp = 0;
            $persen_realisasi_tp = 0;
            $persen_sisa_tp = 100;
        }

        $persen_rm_pusat = ($rm_pusat / $pagu_pusat) * 100;
        $persen_realisasi_rm = ($realisasi / $rm_pusat) * 100;
        $persen_sisa_rm = ($sisa_rm_pusat / $rm_pusat) * 100;

        $realisasi_rm_pusat = $realisasi - $realisasi_phln;
        $sisa_rm_pusat = $rm_pusat - $realisasi_rm_pusat;

        //$persen_sisa_rm       = ($sisa_rm_pusat/$rm_pusat)*100;
        $persen_realisasi_rm = 100 - $persen_sisa_rm;

        $persen_pagu_phln = ($phln_pusat / $pagu_pusat) * 100;
        if ($phln_pusat != 0) {
            $persen_realisasi_phln = ($realisasi_phln / $phln_pusat) * 100;
        } else {
            $persen_realisasi_phln = 0;
        }
        if ($phln_pusat != 0) {
            $persen_sisa_phln = (($phln_pusat - $realisasi_phln) / $phln_pusat) * 100;
        } else {
            $persen_sisa_phln = 0; // Atur nilai default jika $phln_pusat adalah 0
        }

        //$pln_pusat=$pagu_pusat-$rm_pusat-$phln_pusat;
        //$persen_pln_pusat=($pln_pusat/$pagu_pusat)*100;

        $bgcolor_merah = 'rgb(204,0,0)';
        $bgcolor_kuning = 'rgb(237,245,29)';
        $bgcolor_hijau = 'rgb(41,204,0)';
        $bgcolor_abu = 'rgb(206,206,206)';

        $bgcolor_realpusat = '';
        if ($persen_realisasi_pusat <= 30) {
            $bgcolor_realpusat = $bgcolor_merah;
        } elseif ($persen_realisasi_pusat > 30 && $persen_realisasi_pusat <= 60) {
            $bgcolor_realpusat = $bgcolor_kuning;
        } elseif ($persen_realisasi_pusat > 60) {
            $bgcolor_realpusat = $bgcolor_hijau;
        }
        $persen_realisasi_pusat_sisa = 100 - $persen_realisasi_pusat;

        $bgcolor_realdekon = '';
        if ($persen_realisasi_dekon <= 30) {
            $bgcolor_realdekon = $bgcolor_merah;
        } elseif ($persen_realisasi_dekon > 30 && $persen_realisasi_dekon <= 60) {
            $bgcolor_realdekon = $bgcolor_kuning;
        } elseif ($persen_realisasi_dekon > 60) {
            $bgcolor_realdekon = $bgcolor_hijau;
        }
        $persen_realisasi_dekon_sisa = 100 - $persen_realisasi_dekon;

        $bgcolor_realtp = '';
        if ($persen_realisasi_tp <= 30) {
            $bgcolor_realtp = $bgcolor_merah;
        } elseif ($persen_realisasi_tp > 30 && $persen_realisasi_tp <= 60) {
            $bgcolor_realtp = $bgcolor_kuning;
        } elseif ($persen_realisasi_tp > 60) {
            $bgcolor_realtp = $bgcolor_hijau;
        }
        $persen_realisasi_tp_sisa = 100 - $persen_realisasi_tp;

        $bgcolor_rm_pusat = '';
        if ($persen_rm_pusat <= 30) {
            $bgcolor_rm_pusat = $bgcolor_merah;
        } elseif ($persen_rm_pusat > 30 && $persen_rm_pusat <= 60) {
            $bgcolor_rm_pusat = $bgcolor_kuning;
        } elseif ($persen_rm_pusat > 60) {
            $bgcolor_rm_pusat = $bgcolor_hijau;
        }
        $persen_rm_pusat_sisa = 100 - $persen_rm_pusat;

        $bgcolor_realisasi_phln = '';
        if ($persen_realisasi_phln <= 30) {
            $bgcolor_realisasi_phln = $bgcolor_merah;
        } elseif ($persen_realisasi_phln > 30 && $persen_realisasi_phln <= 60) {
            $bgcolor_realisasi_phln = $bgcolor_kuning;
        } elseif ($persen_realisasi_phln > 60) {
            $bgcolor_realisasi_phln = $bgcolor_hijau;
        }
        $persen_realisasi_phln_sisa = 100 - $persen_realisasi_phln;

        $bgcolor_sisapusat = '';
        if ($persen_sisa_pusat <= 30) {
            $bgcolor_sisapusat = $bgcolor_hijau;
        } elseif ($persen_sisa_pusat > 30 && $persen_sisa_pusat <= 60) {
            $bgcolor_sisapusat = $bgcolor_kuning;
        } elseif ($persen_sisa_pusat > 60) {
            $bgcolor_sisapusat = $bgcolor_merah;
        }
        $persen_sisa_pusat_sisa = 100 - $persen_sisa_pusat;

        $bgcolor_sisadekon = '';
        if ($persen_sisa_dekon <= 30) {
            $bgcolor_sisadekon = $bgcolor_hijau;
        } elseif ($persen_sisa_dekon > 30 && $persen_sisa_dekon <= 60) {
            $bgcolor_sisadekon = $bgcolor_kuning;
        } elseif ($persen_sisa_dekon > 60) {
            $bgcolor_sisadekon = $bgcolor_merah;
        }
        $persen_sisa_dekon_sisa = 100 - $persen_sisa_dekon;

        $bgcolor_sisatp = '';
        if ($persen_sisa_tp <= 30) {
            $bgcolor_sisatp = $bgcolor_hijau;
        } elseif ($persen_sisa_tp > 30 && $persen_sisa_tp <= 60) {
            $bgcolor_sisatp = $bgcolor_kuning;
        } elseif ($persen_sisa_tp > 60) {
            $bgcolor_sisatp = $bgcolor_merah;
        }
        $persen_sisa_tp_sisa = 100 - $persen_sisa_tp;

        $bgcolor_sisa_rm_pusat = '';
        if ($persen_sisa_rm <= 30) {
            $bgcolor_sisa_rm_pusat = $bgcolor_hijau;
        } elseif ($persen_sisa_rm > 30 && $persen_sisa_rm <= 60) {
            $bgcolor_sisa_rm_pusat = $bgcolor_kuning;
        } elseif ($persen_sisa_rm > 60) {
            $bgcolor_sisa_rm_pusat = $bgcolor_merah;
        }
        $persen_sisa_rm_sisa = 100 - $persen_sisa_rm;

        $bgcolor_sisa_phln = '';
        if ($persen_sisa_phln <= 30) {
            $bgcolor_sisa_phln = $bgcolor_hijau;
        } elseif ($persen_sisa_phln > 30 && $persen_sisa_phln <= 60) {
            $bgcolor_sisa_phln = $bgcolor_kuning;
        } elseif ($persen_sisa_phln > 60) {
            $bgcolor_sisa_phln = $bgcolor_merah;
        }
        $persen_sisa_phln_sisa = 100 - $persen_sisa_phln;
    @endphp
    <div class="main">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-dongker text-center">
                    <div class="card-body position-relative">
                        <h5 class="card-title h6">Pagu Anggaran Ditjen Bina Adwil</h5>
                        <p class="h5">Rp {{ number_format($pagu_new, 0, ',', '.') }}<br>&nbsp;</p>
                        <div class="progress mb-2" role="progressbar" aria-label="Success example 4px high" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100" style="height: 4px">
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
                            {{ number_format($realisasi, 0, ',', '.') }}<br>({{ number_format($persen_realisasi, 0, ',', '.') }}%)
                        </p>
                        <div class="progress mb-2" role="progressbar" aria-label="Success example 4px high"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                            <div class="progress-bar bg-success" style="width:{{ number_format($persen_realisasi, 2) }}%">
                            </div>
                        </div>
                        <p class="card-text small">Data Berdasarkan SP2D MonSAKTI:
                            {{ date('d/m/Y, H:i:s', strtotime($last_synch_real)) }}</p>
                        <span class="position-absolute end-0 bottom-0"><button type="button"
                                class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                                data-bs-target="#modalRealisasiAnggaran">&#129106;</button></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-dongker text-center">
                    <div class="card-body">
                        <h5 class="card-title h6">Sisa Anggaran Ditjen Bina Adwil</h5>
                        <p class="h5">Rp {{ number_format($pagu_new - $realisasi, 0, ',', '.') }}<br>&nbsp;</p>
                        <div class="progress mb-2" role="progressbar" aria-label="Success example 4px high"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                            <div class="progress-bar bg-success"
                                style="width: {{ number_format((float) $persen_selisih, 0, '.', '') }}%"></div>
                        </div>
                        <p class="card-text small">({{ number_format((float) $persen_selisih, 2, '.', '') }}%)</p>
                        <span class="position-absolute end-0 bottom-0">
                            <a class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                                data-bs-target="#modalSisaAnggaran">&#129106;</a>
                        </span>
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
                        <p>Rp. {{ number_format($realisasi_pusat, 0, ',', '.') }}</p>
                        <div class="chart-box">
                            <canvas id="chartPusat"></canvas>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <h4 class="h6">DEKONSENTRASI</h4>
                        <p>Rp. {{ number_format($realisasi_dekon, 0, ',', '.') }}</p>
                        <div class="chart-box">
                            <canvas id="chartDekon"></canvas>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <h4 class="h6">TUGAS PEMBANTUAN</h4>
                        <p>Rp. {{ number_format($realisasi_tp, 0, ',', '.') }}</p>
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
                    <div id="chartRealisasi_kemendagri">
                        <font color="#8a63b1"><strong>---</strong></font>
                        <font color=#000>: Rata-rata kemendagri ({{ $rata2_realisasi_eselon1 }}%)</font>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" id=grafiksanding></div>
            <div class="col-md-6">
                <h3 class="mb-3 fw-bold h5">Rekapitulasi Revisi dan Usulan Kegiatan</h3>
                <div class="card fw-normal card-dongker">
                    <div class="card-body">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input tiperekaprevisi" type="radio" name="tiperekaprevisi"
                                id="tiperekaprevisi_pusat" value="pusat" checked />
                            <label class="form-check-label" for="">Pusat</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input tiperekaprevisi" type="radio" name="tiperekaprevisi"
                                id="tiperekaprevisi_daerah" value="daerah" />
                            <label class="form-check-label" for="">Daerah</label>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <select class="form-select form-select-sm" name="selrevdir" id="selrevdir">
                                        <option value="">-Direktorat-</option>
                                        @php
                                            foreach ($dir_data as $item) {
                                                echo '<option value="' .
                                                    $item->id_dir .
                                                    '">' .
                                                    $item->nama_dir .
                                                    '</option>';
                                            }
                                        @endphp
                                    </select>
                                    <select class="form-select form-select-sm" name="selrevprov" id="selrevprov">
                                        <option value="">-Provinsi-</option>
                                        @php
                                            foreach ($prov_data as $item) {
                                                echo '<option value="' .
                                                    $item->namaprov .
                                                    '">' .
                                                    $item->namaprov .
                                                    '</option>';
                                            }
                                        @endphp
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select form-select-sm" name="selrevsubdir" id="selrevsubdir">
                                        <option value="">-Sub Direktorat-</option>
                                    </select>
                                    <select class="form-select form-select-sm" name="selrevsatker" id="selrevsatker">
                                        <option value="">-Satker-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <select class="form-select form-select-sm" name="selrevtahun" id="selrevtahun">
                                        <option value="" selected>-Tahun-</option>
                                        <option value="2024">2024</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <a href="javascript:getrev()" class="btn btn-info btn-sm"><i
                                            class='fa fa-repeat'></i> Cari</a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <select class="form-select form-select-sm" name="selrevbulan" id="selrevbulan">
                                        <option value="" selected>-Bulan-</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card fw-normal card-dongker">
                        <div class="card-body">
                            <table cellpadding=5 cellspacing=5>
                                <tbody>
                                    <tr>
                                        <td id=djmlrevisi_title>Jumlah Revisi Pusat&nbsp;&nbsp;</td>
                                        <td id=djmlrevisi>0</td>
                                    </tr>
                                    <tr id=trjml_usulan_kegiatan>
                                        <td>Jumlah Usulan Kegiatan&nbsp;&nbsp;</td>
                                        <td id=djml_usulan_kegiatan>0</td>
                                    </tr>
                                    <tr id=trjml_usulan_anggaran>
                                        <td>Jumlah Usulan Tambahan Anggaran&nbsp;&nbsp;</td>
                                        <td id=djml_usulan_anggaran>0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- modal uke2 graphic bar --}}
                    <div class="modal fade" id="modalgraphbarrealuke2" data-bs-backdrop="static">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fs-5">Realisasi Lingkup Ditjen Bina Adwil</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body bg-light-grey">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="text-center">
                                                <canvas id="divchartbarrealuke2"></canvas>
                                                <div>
                                                    <font color="#8a63b1"><strong>---</strong></font>
                                                    <font color=#000> : Rata-rata kemendagri
                                                        ({{ $rata2_realisasi_eselon1 }}%)</font><br>
                                                    <font color="#ff3300"><strong>---</strong></font>
                                                    <font color=#000> : Rata-rata UKE II Ditjen Bina Adwil
                                                        ({{ $rata2_realisasi_eselon2 }}%)</font><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-center classWithPad">
                                                <div class="hide" id=chartRealEs3_title></div>
                                                <div class="hide chart-box" style="width:100%;height:0px"
                                                    id=chartRealEs3_hd>
                                                    <canvas id="chartRealEs3"></canvas>
                                                </div>
                                                <div id="chartRealEs3_legend"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- modal uke2 graphic bar --}}
                    <div class="modal fade" id="modalsanding" data-bs-backdrop="static">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fs-5">Data Sanding Realisasi, Capaian Output dan
                                        Kinenrja</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body bg-light-grey">
                                    <div class="row" id=div_chartsandinguke2>
                                        <font color=#000>Loading data sandingan UKE II...</font><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modalrealuke3" data-bs-backdrop="static" tabindex="-1"
                        style="z-index:1825">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fs-5">Data Realisasi UKE III</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body bg-light-grey">
                                    <div class="row" id=div_realuke3>Loading data realisasi UKE III...</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modalsisauke3" data-bs-backdrop="static" tabindex="-1"
                        style="z-index:1825">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fs-5">Data Sisa UKE III</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body bg-light-grey">
                                    <div class="row" id=div_sisauke3>
                                        <font color=#000>Loading data sisa UKE III...</font><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modalsandinguke3" data-bs-backdrop="static" tabindex="-1"
                        style="z-index:1825">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fs-5">Data Sanding UKE III</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body bg-light-grey">
                                    <div class="row" id=div_chartsandinguke3>
                                        <font color=#000>Loading data sanding UKE III...</font><br>
                                    </div>
                                </div>
                            </div>
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
                                                id="jenis_revisi" onclick="f_jenisrevisi()">
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
                                                        <div class="col-4">
                                                            <h5 class="card-title">Pagu</h5>
                                                            <h6 class="card-subtitle mb-3 text-body-secondary">
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
                                            <div class="chart-box" style="width:100%;height:280px">
                                                <canvas id="chartPagu"></canvas>
                                            </div>
                                            <div class="hide" id=chartPaguEs3_title></div>
                                            <div class="hide chart-box" style="width:100%;height:0px" id=chartPaguEs3_hd>
                                                <canvas id="chartPaguEs3"></canvas>
                                            </div>
                                            <h3 class="fw-bold h6">Pagu Per Kewenangan</h3>
                                            <canvas id="chartPaguKewenangan" width="50%" height="50%"></canvas>
                                            <div style="height:10px"></div>
                                            <h3 class="fw-bold h6">Sumber Dana Pagu (RM/PLN)</h3>
                                            <canvas id="chartPaguSumberDana" width="50%" height="50%"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                    <!-- Modal -->
                    <div class="modal hide fade" id="modalRealisasiAnggaran" data-bs-keyboard="false" tabindex="-1"
                        aria-hidden="true" style="z-index:1824">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalRealisasiAnggaranLabel">Realisasi
                                        Anggaran</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" id="tabsRealisasiAnggaran" role="tablist">
                                        {{-- <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link"
                                        id="realisasiUke2-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#realisasiUke2"
                                        type="button"
                                        role="tab"
                                        aria-controls="realisasiUke2"
                                        aria-selected="false">
                                        Realisasi Anggaran Per UKE II
                                    </button>
                                </li> --}}
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="realisasiKewenangan-tab"
                                                data-bs-toggle="tab" data-bs-target="#realisasiKewenangan" type="button"
                                                role="tab" aria-controls="realisasiKewenangan" aria-selected="true">
                                                Realisasi Per Kewenangan
                                            </button>
                                        </li>
                                        {{-- <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link"
                                        id="realisasiSumberDana-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#realisasiSumberDana"
                                        type="button"
                                        role="tab"
                                        aria-controls="realisasiSumberDana"
                                        aria-selected="true">
                                        Realisasi Sumber Dana
                                    </button>
                                </li> --}}
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane" id="realisasiUke2" role="tabpanel"
                                            aria-labelledby="realisasiUke2-tab">
                                            <div class="row">
                                                {!! $data_realuke2 !!}
                                            </div>
                                        </div>
                                        <div class="tab-pane active" id="realisasiKewenangan" role="tabpanel"
                                            aria-labelledby="realisasiKewenangan-tab">
                                            <div class="row">
                                                <div class="text-center col-md-3">
                                                    <div class="text-center classWithPad kotakdonut">Pusat<br>
                                                        <div class="canvas-container">
                                                            <canvas id="chartRealKewenangan_pusat" class="canvas"
                                                                align=center></canvas>
                                                        </div><br>
                                                        Realisasi<br>
                                                        Rp. {{ number_format($realisasi) }}<br>
                                                    </div>
                                                </div>
                                                <div class="text-center col-md-3">
                                                    <div class="text-center classWithPad kotakdonut">Dekon<br>
                                                        <div class="canvas-container">
                                                            <canvas id="chartRealKewenangan_dekon" class="canvas"
                                                                align=center></canvas>
                                                        </div><br>
                                                        Realisasi<br>
                                                        Rp. {{ number_format($realisasi_dekon) }}<br>
                                                    </div>
                                                </div>
                                                <div class="text-center col-md-3">
                                                    <div class="text-center classWithPad kotakdonut">Tugas
                                                        Perbantuan<br>
                                                        <div class="canvas-container">
                                                            <canvas id="chartRealKewenangan_tp" class="canvas"
                                                                align=center></canvas>
                                                        </div><br>
                                                        Realisasi<br>
                                                        Rp. {{ number_format($realisasi_tp) }}<br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="realisasiSumberDana" role="tabpanel"
                                            aria-labelledby="realisasiSumberDana-tab">
                                            <div class="row">
                                                <div class="text-center col-md-3">
                                                    <div class="text-center classWithPad kotakdonut">Rupiah
                                                        Murni<br>
                                                        <div class="canvas-container">
                                                            <canvas id="chartRealSumberDana_rm" class="canvas"
                                                                align=center></canvas>
                                                        </div><br>
                                                        Realisasi<br>
                                                        Rp. {{ number_format($rm_pusat) }}<br>
                                                    </div>
                                                </div>
                                                <div class="text-center col-md-3">
                                                    <div class="text-center classWithPad kotakdonut">PLN<br>
                                                        <div class="canvas-container">
                                                            <canvas id="chartRealSumberDana_pln" class="canvas"
                                                                align=center></canvas>
                                                        </div><br>
                                                        Realisasi<br>
                                                        Rp. {{ number_format($realisasi_phln) }}<br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalSisaAnggaran" data-bs-backdrop="static" data-bs-keyboard="false"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalSisaAnggaranLabel">Sisa Anggaran</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" id="tabsSisaAnggaran" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="sisaUke2-tab" data-bs-toggle="tab"
                                                data-bs-target="#sisaUke2" type="button" role="tab"
                                                aria-controls="sisaUke2" aria-selected="false">
                                                Sisa Anggaran Per UKE II
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="sisaKewenangan-tab" data-bs-toggle="tab"
                                                data-bs-target="#sisaKewenangan" type="button" role="tab"
                                                aria-controls="sisaKewenangan" aria-selected="true">
                                                Sisa Anggaran Per Kewenangan
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="sisaSumberDana-tab" data-bs-toggle="tab"
                                                data-bs-target="#sisaSumberDana" type="button" role="tab"
                                                aria-controls="sisaSumberDana" aria-selected="true">
                                                Sisa Anggaran Per Sumber Dana
                                            </button>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="sisaUke2" role="tabpanel"
                                            aria-labelledby="sisaUke2-tab">
                                            <div class="row">
                                                {!! $data_sisauke2 !!}
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="sisaKewenangan" role="tabpanel"
                                            aria-labelledby="sisaKewenangan-tab">
                                            <div class="row">
                                                <div class="text-center col-md-3">
                                                    <div class="text-center classWithPad kotakdonut">Pusat<br>
                                                        <div class="canvas-container">
                                                            <canvas id="chartSisaKewenangan_pusat" class="canvas"
                                                                align=center></canvas>
                                                        </div><br>
                                                        sisa<br>
                                                        Rp. {{ number_format($sisa_pusat) }}<br>
                                                    </div>
                                                </div>
                                                <div class="text-center col-md-3">
                                                    <div class="text-center classWithPad kotakdonut">Dekon<br>
                                                        <div class="canvas-container">
                                                            <canvas id="chartSisaKewenangan_dekon" class="canvas"
                                                                align=center></canvas>
                                                        </div><br>
                                                        sisa<br>
                                                        Rp. {{ number_format($sisa_dekon) }}<br>
                                                    </div>
                                                </div>
                                                <div class="text-center col-md-3">
                                                    <div class="text-center classWithPad kotakdonut">Tugas
                                                        Perbantuan<br>
                                                        <div class="canvas-container">
                                                            <canvas id="chartSisaKewenangan_tp" class="canvas"
                                                                align=center></canvas>
                                                        </div><br>
                                                        sisa<br>
                                                        Rp. {{ number_format($sisa_tp) }}<br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="sisaSumberDana" role="tabpanel"
                                            aria-labelledby="sisaSumberDana-tab">
                                            <div class="row">
                                                <div class="text-center col-md-3">
                                                    <div class="text-center classWithPad kotakdonut">Rupiah
                                                        Murni<br>
                                                        <div class="canvas-container">
                                                            <canvas id="chartSisaSumberDana_rm" class="canvas"
                                                                align=center></canvas>
                                                        </div><br>
                                                        sisa<br>
                                                        Rp. {{ number_format($sisa_rm_pusat) }}<br>
                                                    </div>
                                                </div>
                                                <div class="text-center col-md-3">
                                                    <div class="text-center classWithPad kotakdonut">PLN<br>
                                                        <div class="canvas-container">
                                                            <canvas id="chartSisaSumberDana_pln" class="canvas"
                                                                align=center></canvas>
                                                        </div><br>
                                                        sisa<br>
                                                        Rp. {{ number_format($phln_pusat - $realisasi_phln) }}<br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ env('APP_URL') }}/landing-pages/js/jquery-3.3.1.min.js"></script>
    <script src="{{ env('APP_URL') }}/landing-pages/js/popper.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- Chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ env('APP_URL') }}/templates/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ env('APP_URL') }}/templates/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ env('APP_URL') }}/templates/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ env('APP_URL') }}/templates/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ env('APP_URL') }}/templates/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ env('APP_URL') }}/templates/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ env('APP_URL') }}/templates/plugins/jszip/jszip.min.js"></script>
    <script src="{{ env('APP_URL') }}/templates/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ env('APP_URL') }}/templates/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ env('APP_URL') }}/templates/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ env('APP_URL') }}/templates/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ env('APP_URL') }}/templates/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
        $('#selrevprov').hide();
        $('#selrevsatker').hide();
        $(".tiperekaprevisi").change(function() {
            pusat = $('#tiperekaprevisi_pusat').is(':checked')
            daerah = $('#tiperekaprevisi_daerah').is(':checked')
            if (pusat) {
                $('#selrevdir').show();
                $('#selrevsubdir').show();
                $('#selrevprov').hide();
                $('#selrevsatker').hide();
                $('#djmlrevisi_title').html('Jumlah Revisi Pusat&nbsp;&nbsp;');
                $('#trjml_usulan_kegiatan').show();
                $('#trjml_usulan_anggaran').show();

                $('#djmlrevisi').html('0')
                $('#djml_usulan_kegiatan').html('0')
                $('#djml_usulan_anggaran').html('0')
            } else {
                $('#selrevdir').hide();
                $('#selrevsubdir').hide();
                $('#selrevprov').show();
                $('#selrevsatker').show();
                $('#djmlrevisi_title').html('Jumlah Revisi Daerah&nbsp;&nbsp;');
                $('#trjml_usulan_kegiatan').hide();
                $('#trjml_usulan_anggaran').hide();

                $('#djmlrevisi').html('0')
                $('#djml_usulan_kegiatan').html('0')
                $('#djml_usulan_anggaran').html('0')
            }
        });
        $("#selrevdir").click(function() {
            var id_dir = $("#selrevdir").val()
            var form_data = new FormData();
            form_data.append('id_dir', id_dir)
            form_data.append('_token', '{{ csrf_token() }}')
            $.ajax({
                url: "{{ route('getsubdir') }}",
                type: "POST",
                dataType: 'json',
                data: form_data,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    var select = $('#selrevsubdir');
                    select.empty();
                    select.append('<option value="">-Sub Direktorat-</option>'); // Add default option
                    if (data != '') {
                        $.each(data, function(key, value) {
                            select.append('<option value="' + value.id + '">' + value
                                .nama_subdir + '</option>');
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error loading data: ' + error);
                }
            });
        });
        $("#selrevprov").click(function() {
            var provinsi = $("#selrevprov").val()
            var form_data = new FormData();
            form_data.append('provinsi', provinsi)
            form_data.append('_token', '{{ csrf_token() }}')
            $.ajax({
                url: "{{ route('getsatker') }}",
                type: "POST",
                dataType: 'json',
                data: form_data,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    var select = $('#selrevsatker');
                    select.empty();
                    select.append('<option value="">-Satker-</option>'); // Add default option
                    if (data != '') {
                        $.each(data, function(key, value) {
                            select.append('<option value="' + value.jenis_satker + '">' + value
                                .jenis_satker + '</option>');
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error loading data: ' + error);
                }
            });
        });

        function getrev() {
            pusat = $('#tiperekaprevisi_pusat').is(':checked')
            daerah = $('#tiperekaprevisi_daerah').is(':checked')
            id_dir = '';
            id_subdir = '';
            prov = '';
            satker = '';
            lanjut = true;
            if (pusat) {
                id_dir = $('#selrevdir').val();
                id_subdir = $('#selrevsubdir').val();
                tipe = 'pusat';
                if (id_dir == '') {
                    lanjut = false
                    alert('Direktorat harus dipilih terlebih dahulu')
                }
            } else {
                prov = $('#selrevprov').val();
                satker = $('#selrevsatker').val();
                tipe = 'daerah';
                if (prov == '') {
                    lanjut = false
                    alert('Provinsi harus dipilih terlebih dahulu')
                }
            }
            tahun = $('#selrevtahun').val();
            bulan = $('#selrevbulan').val();

            if (lanjut) {
                if (tahun == '') {
                    lanjut = false
                    alert('Tahun harus dipilih terlebih dahulu')
                }
            }
            if (lanjut) {
                if (bulan == '') {
                    lanjut = false
                    alert('Bulan harus dipilih terlebih dahulu')
                }
            }
            if (lanjut) {
                var form_data = new FormData();
                form_data.append('tipe', tipe)
                form_data.append('id_dir', id_dir)
                form_data.append('id_subdir', id_subdir)
                form_data.append('prov', prov)
                form_data.append('satker', satker)
                form_data.append('tahun', tahun)
                form_data.append('bulan', bulan)
                form_data.append('_token', '{{ csrf_token() }}')
                $.ajax({
                    url: "{{ route('getrev') }}",
                    type: "POST",
                    dataType: 'json',
                    data: form_data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $('#djmlrevisi').html(data.jml_revisi)
                        $('#djml_usulan_kegiatan').html(data.jml_usulan_kegiatan)
                        $('#djml_usulan_anggaran').html(data.jml_usulan_anggaran)
                    },
                    error: function(xhr, status, error) {
                        console.log('Error loading data: ' + error);
                    }
                });
            }
        }

        function myFunction() {
            var element = document.getElementById("loginBlock");
            element.classList.toggle("open");
        }
        // myFunction();
        bgcolor_abu = '{{ $bgcolor_abu }}';

        {!! $data_realuke2_js !!}

        {!! $data_sisauke2_js !!}

        const chartRealSumberDana_rm = document.getElementById('chartRealSumberDana_rm');
        new Chart(chartRealSumberDana_rm, {
            type: 'doughnut',
            data: {
                labels: ["{{ number_format((float) $persen_rm_pusat, 2, '.', '') }}",
                    "{{ number_format((float) $persen_rm_pusat_sisa, 2, '.', '') }}"
                ],
                datasets: [{
                    data: [{{ number_format((float) $persen_rm_pusat, 2, '.', '') }},
                        {{ number_format((float) $persen_rm_pusat_sisa, 2, '.', '') }}
                    ],
                    backgroundColor: [
                        '{{ $bgcolor_rm_pusat }}',
                        bgcolor_abu,
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            },
        });

        const chartRealSumberDana_pln = document.getElementById('chartRealSumberDana_pln');
        new Chart(chartRealSumberDana_pln, {
            type: 'doughnut',
            data: {
                labels: ["{{ number_format((float) $persen_realisasi_phln, 2, '.', '') }}",
                    "{{ number_format((float) $persen_realisasi_phln_sisa, 2, '.', '') }}"
                ],
                datasets: [{
                    data: [{{ number_format((float) $persen_realisasi_phln, 2, '.', '') }},
                        {{ number_format((float) $persen_realisasi_phln_sisa, 2, '.', '') }}
                    ],
                    backgroundColor: [
                        '{{ $bgcolor_realisasi_phln }}',
                        bgcolor_abu,
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            },
        });

        const chartRealKewenangan_pusat = document.getElementById('chartRealKewenangan_pusat');
        new Chart(chartRealKewenangan_pusat, {
            type: 'doughnut',
            data: {
                labels: ["{{ number_format((float) $persen_realisasi_pusat, 2, '.', '') }}",
                    "{{ number_format((float) $persen_realisasi_pusat_sisa, 2, '.', '') }}"
                ],
                datasets: [{
                    data: [{{ number_format((float) $persen_realisasi_pusat, 2, '.', '') }},
                        {{ number_format((float) $persen_realisasi_pusat_sisa, 2, '.', '') }}
                    ],
                    backgroundColor: [
                        '{{ $bgcolor_realpusat }}',
                        bgcolor_abu,
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            },
        });

        const chartRealKewenangan_dekon = document.getElementById('chartRealKewenangan_dekon');
        new Chart(chartRealKewenangan_dekon, {
            type: 'doughnut',
            data: {
                labels: ["{{ number_format((float) $persen_realisasi_dekon, 2, '.', '') }}",
                    "{{ number_format((float) $persen_realisasi_dekon_sisa, 2, '.', '') }}"
                ],
                datasets: [{
                    data: [{{ number_format((float) $persen_realisasi_dekon, 2, '.', '') }},
                        {{ number_format((float) $persen_realisasi_dekon_sisa, 2, '.', '') }}
                    ],
                    backgroundColor: [
                        '{{ $bgcolor_realdekon }}',
                        bgcolor_abu,
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            },
        });

        const chartRealKewenangan_tp = document.getElementById('chartRealKewenangan_tp');
        new Chart(chartRealKewenangan_tp, {
            type: 'doughnut',
            data: {
                labels: ["{{ number_format((float) $persen_realisasi_tp, 2, '.', '') }}",
                    "{{ number_format((float) $persen_realisasi_tp_sisa, 2, '.', '') }}"
                ],
                datasets: [{
                    data: [{{ number_format((float) $persen_realisasi_tp, 2, '.', '') }},
                        {{ number_format((float) $persen_realisasi_tp_sisa, 2, '.', '') }}
                    ],
                    backgroundColor: [
                        '{{ $bgcolor_realtp }}',
                        bgcolor_abu,
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            },
        });

        const chartSisaSumberDana_rm = document.getElementById('chartSisaSumberDana_rm');
        new Chart(chartSisaSumberDana_rm, {
            type: 'doughnut',
            data: {
                labels: ["{{ number_format((float) $persen_sisa_rm, 2, '.', '') }}",
                    "{{ number_format((float) $persen_sisa_rm_sisa, 2, '.', '') }}"
                ],
                datasets: [{
                    data: [{{ number_format((float) $persen_sisa_rm, 2, '.', '') }},
                        {{ number_format((float) $persen_sisa_rm_sisa, 2, '.', '') }}
                    ],
                    backgroundColor: [
                        '{{ $bgcolor_sisa_rm_pusat }}',
                        bgcolor_abu,
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            },
        });

        const chartSisaSumberDana_pln = document.getElementById('chartSisaSumberDana_pln');
        new Chart(chartSisaSumberDana_pln, {
            type: 'doughnut',
            data: {
                labels: ["{{ number_format((float) $persen_sisa_phln, 2, '.', '') }}",
                    "{{ number_format((float) $persen_sisa_phln_sisa, 2, '.', '') }}"
                ],
                datasets: [{
                    data: [{{ number_format((float) $persen_sisa_phln, 2, '.', '') }},
                        {{ number_format((float) $persen_sisa_phln_sisa, 2, '.', '') }}
                    ],
                    backgroundColor: [
                        '{{ $bgcolor_sisa_phln }}',
                        bgcolor_abu,
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            },
        });

        const chartSisaKewenangan_pusat = document.getElementById('chartSisaKewenangan_pusat');
        new Chart(chartSisaKewenangan_pusat, {
            type: 'doughnut',
            data: {
                labels: ["{{ number_format((float) $persen_sisa_pusat, 2, '.', '') }}",
                    "{{ number_format((float) $persen_sisa_pusat_sisa, 2, '.', '') }}"
                ],
                datasets: [{
                    data: [{{ number_format((float) $persen_sisa_pusat, 2, '.', '') }},
                        {{ number_format((float) $persen_sisa_pusat_sisa, 2, '.', '') }}
                    ],
                    backgroundColor: [
                        '{{ $bgcolor_sisapusat }}',
                        bgcolor_abu,
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            },
        });

        const chartSisaKewenangan_dekon = document.getElementById('chartSisaKewenangan_dekon');
        new Chart(chartSisaKewenangan_dekon, {
            type: 'doughnut',
            data: {
                labels: ["{{ number_format((float) $persen_sisa_dekon, 2, '.', '') }}",
                    "{{ number_format((float) $persen_sisa_dekon_sisa, 2, '.', '') }}"
                ],
                datasets: [{
                    data: [{{ number_format((float) $persen_sisa_dekon, 2, '.', '') }},
                        {{ number_format((float) $persen_sisa_dekon_sisa, 2, '.', '') }}
                    ],
                    backgroundColor: [
                        '{{ $bgcolor_sisadekon }}',
                        bgcolor_abu,
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            },
        });

        const chartSisaKewenangan_tp = document.getElementById('chartSisaKewenangan_tp');
        new Chart(chartSisaKewenangan_tp, {
            type: 'doughnut',
            data: {
                labels: ["{{ number_format((float) $persen_sisa_tp, 2, '.', '') }}",
                    "{{ number_format((float) $persen_sisa_tp_sisa, 2, '.', '') }}"
                ],
                datasets: [{
                    data: [{{ number_format((float) $persen_sisa_tp, 2, '.', '') }},
                        {{ number_format((float) $persen_sisa_tp_sisa, 2, '.', '') }}
                    ],
                    backgroundColor: [
                        '{{ $bgcolor_sisatp }}',
                        bgcolor_abu,
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            },
        });

        const chartPusat = document.getElementById('chartPusat');
        const chartDekon = document.getElementById('chartDekon');
        const chartTugas = document.getElementById('chartTugas');
        const chartRealisasi = document.getElementById('chartRealisasi');
        const chartPaguKewenangan = document.getElementById('chartPaguKewenangan');
        const chartPaguSumberDana = document.getElementById('chartPaguSumberDana');

        new Chart(chartPaguKewenangan, {
            type: 'doughnut',
            data: {
                labels: [
                    'Pusat Rp. {{ number_format((float) $pagu_pusat) }} ({{ number_format((float) $persen_pagu_pusat) }})',
                    'Dekon Rp. {{ number_format((float) $pagu_dekon) }} ({{ number_format((float) $persen_pagu_dekon) }})',
                    'Tugas Perbantuan Rp. {{ number_format((float) $pagu_tp) }} ({{ number_format((float) $persen_pagu_tp) }})'
                ],
                datasets: [{
                    data: [{{ number_format((float) $persen_pagu_pusat) }},
                        {{ number_format((float) $persen_pagu_dekon) }},
                        {{ number_format((float) $persen_pagu_tp) }}
                    ],
                    backgroundColor: [
                        'rgb(10,185,95)',
                        'rgb(0,118,236)',
                        'rgb(252,224,88)',
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                aspectRatio: 2.5,
                plugins: {
                    legend: {
                        display: 'true',
                        position: 'right',
                        align: 'center',
                    }
                }
            }
        });
        new Chart(chartPaguSumberDana, {
            type: 'doughnut',
            data: {
                labels: [
                    'RM Rp. {{ number_format((float) $rm_pusat) }} ({{ number_format((float) $persen_rm_pusat) }})',
                    'PLN Rp. {{ number_format((float) $phln_pusat) }} ({{ number_format((float) $persen_pagu_phln) }})'
                ],
                datasets: [{
                    data: [{{ number_format((float) $persen_rm_pusat) }},
                        {{ number_format((float) $persen_pagu_phln) }}
                    ],
                    backgroundColor: [
                        'rgb(233,127,46)',
                        'rgb(204,0,102)',
                        'rgb(29,245,202)',
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                aspectRatio: 2.5,
                plugins: {
                    legend: {
                        display: 'true',
                        position: 'right',
                        align: 'center',
                    }
                }
            }
        });

        new Chart(chartPusat, {
            type: 'doughnut',
            data: {
                labels: [{{ number_format((float) $persen_realisasi_pusat, 2, '.', '') }},
                    {{ number_format((float) $persen_sisa_pusat, 2, '.', '') }}
                ],
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
                labels: [{{ number_format((float) $persen_realisasi_dekon, 2, '.', '') }},
                    {{ number_format((float) $persen_sisa_dekon, 2, '.', '') }}
                ],
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
                labels: [{{ number_format((float) $persen_realisasi_tp, 2, '.', '') }},
                    {{ number_format((float) $persen_sisa_tp, 2, '.', '') }}
                ],
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

        chartReal = new Chart(chartRealisasi, {
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
        chartRealisasi.onclick = (evt) => {
            $('#modalgraphbarrealuke2').modal('show');
        };

        const divchartbarrealuke2 = document.getElementById('divchartbarrealuke2');
        chartbarrealuke2 = new Chart(divchartbarrealuke2, {
            type: 'bar',
            data: {
                labels: {!! $dir_uke2 !!},
                datasets: [{
                    type: 'line',
                    data: {!! $dir_uke2_ratakemendagri !!},
                    borderWidth: 3,
                    borderDash: [5, 5],
                    borderColor: "#8a63b1",
                    backgroundColor: "#8a63b1",
                    pointBorderWidth: 0,
                    pointStyle: 'dash',
                }, {
                    type: 'line',
                    data: {!! $dir_uke2_rataeselon !!},
                    borderWidth: 3,
                    borderDash: [5, 5],
                    borderColor: "#ff3300",
                    backgroundColor: "#8a63b1",
                    pointBorderWidth: 0,
                    pointStyle: 'dash',
                }, {
                    data: {!! $real_uke2 !!},
                    backgroundColor: '#6eb5f3'
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            }
        })
        divchartbarrealuke2.onclick = (evt) => {
            const res = chartbarrealuke2.getElementsAtEventForMode(
                evt,
                'nearest', {
                    intersect: true
                },
                true
            );
            if (res.length === 0) {
                return;
            }
            label_uke2_data = chartbarrealuke2.data.labels[res[0].index]
            label_uke2 = label_uke2_data.trim()
            var form_data = new FormData();
            form_data.append('alias_dir', label_uke2);
            form_data.append('realisasi', {{ $pagu_new }});
            form_data.append('rata2_realisasi_eselon2', {{ $rata2_realisasi_eselon2 }});
            form_data.append('_token', '{{ csrf_token() }}')
            $.ajax({
                url: "{{ route('barRealUke3') }}",
                type: "POST",
                data: form_data,
                cache: false,
                processData: false,
                contentType: false,
                success: function(e) {
                    getRealEselon3(label_uke2, e.subdir_uke3, e.real_uke3, e.real_uke3_rata2, e
                        .real_uke2_rata2, e.real_uke3_rata2_legend, e.real_uke2_rata2_legend)
                }
            });
        };

        function getRealEselon3(label_uke2, subdir_uke3, real_uke3, real_uke3_rata2, real_uke2_rata2,
            real_uke3_rata2_legend, real_uke2_rata2_legend) {
            $('#chartRealEs3_hd').show();
            $('#chartRealEs3_hd').height(280);

            strlegend =
                '<font color="#ff3300"><strong>---</strong></font><font color=#000> : Rata-rata UKE II Ditjen Bina Adwil (' +
                real_uke2_rata2_legend + '%)</font><br>';
            strlegend += '<font color="#009966"><strong>---</strong></font><font color=#000> : Rata-rata UKE III ' +
                label_uke2 + ' (' + real_uke3_rata2_legend + '%)</font><br>';
            document.getElementById("chartRealEs3_hd").innerHTML = '<canvas id="chartRealEs3"></canvas>';
            document.getElementById("chartRealEs3_title").innerHTML = '<h3 class="mb-3 fw-bold h6 ">' + label_uke2 +
                '</h3>';
            document.getElementById("chartRealEs3_legend").innerHTML = strlegend;

            const chartReal3 = document.getElementById('chartRealEs3');

            chartRealEselon3 = new Chart(chartReal3, {
                type: 'bar',
                data: {
                    labels: eval(subdir_uke3),
                    datasets: [{
                        type: 'line',
                        data: eval(real_uke2_rata2),
                        borderWidth: 3,
                        borderDash: [5, 5],
                        borderColor: "#ff3300",
                        backgroundColor: "#8a63b1",
                        pointBorderWidth: 0,
                        pointStyle: 'dash',
                    }, {
                        type: 'line',
                        data: eval(real_uke3_rata2),
                        borderWidth: 3,
                        borderDash: [5, 5],
                        borderColor: "#009966",
                        backgroundColor: "#8a63b1",
                        pointBorderWidth: 0,
                        pointStyle: 'dash',
                    }, {
                        data: eval(real_uke3),
                        backgroundColor: '#6eb5f3'
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false,
                        }
                    }
                }
            })
        }
        $("#grafiksanding").html(
            '<div class="outer"><div id="inner"><img src="{{ asset('images/spinner.gif') }}" width=80><br>Loading data sandingan...</div></div>'
        );
        $.post("{{ route('grafiksanding') }}", {
            '_token': '{{ csrf_token() }}'
        }, function(data, status) {
            $('#grafiksanding').html(data)
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
                    }
                }
            })
        });
        chartPagu.onclick = (evt) => {
            const res = chartEselon2.getElementsAtEventForMode(
                evt,
                'nearest', {
                    intersect: true
                },
                true
            );
            if (res.length === 0) {
                return;
            }
            label_eselon2_data = chartEselon2.data.labels[res[0].index]
            label_eselon2_arr = label_eselon2_data.split(':')
            label_eselon2 = label_eselon2_arr[0].trim()
            var form_data = new FormData();
            form_data.append('id_dir', label_eselon2);
            form_data.append('_token', '{{ csrf_token() }}')
            $.ajax({
                url: "{{ route('rekapEselon3') }}",
                type: "POST",
                data: form_data,
                cache: false,
                processData: false,
                contentType: false,
                success: function(e) {
                    getEselon3(label_eselon2, e.subdir_eselon3, e.pagu_eselon3)
                }
            });
        };

        function getEselon3(label_eselon2, subdir_eselon3, pagu_eselon3) {
            $('#chartPaguEs3_hd').show();
            $('#chartPaguEs3_title').show();
            $('#chartPaguEs3_hd').height(280);

            document.getElementById("chartPaguEs3_hd").innerHTML = '<canvas id="chartPaguEs3"></canvas>';
            document.getElementById("chartPaguEs3_title").innerHTML = '<h3 class="mb-3 fw-bold h6 ">' + label_eselon2 +
                '</h3>';

            const chartPagu3 = document.getElementById('chartPaguEs3');

            chartEselon3 = new Chart(chartPagu3, {
                type: 'bar',
                data: {
                    labels: eval(subdir_eselon3),
                    datasets: [{
                        data: eval(pagu_eselon3),
                        backgroundColor: '#6eb5f3'
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false,
                        }
                    }
                }
            })
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

        const centerDoughnutPlugin = {
            id: 'annotateDoughnutCenter',
            beforeDraw: (chart) => {
                let width = chart.width;
                let height = chart.height;
                let ctx = chart.ctx;

                let chartnm = chart.canvas.id;
                if (chartnm.substring(0, 14) == 'chartRealUke2_' || chartnm.substring(0, 14) == 'chartRealUke3_' ||
                    chartnm.substring(0, 14) == 'chartsisaUke2_' || chartnm.substring(0, 14) == 'chartsisaUke3_' ||
                    chartnm == 'chartRealKewenangan_pusat' || chartnm == 'chartRealKewenangan_dekon' || chartnm ==
                    'chartRealKewenangan_tp' || chartnm == 'chartRealSumberDana_rm' || chartnm ==
                    'chartRealSumberDana_pln' || chartnm == 'chartSisaKewenangan_pusat' || chartnm ==
                    'chartSisaKewenangan_dekon' || chartnm == 'chartSisaKewenangan_tp' || chartnm ==
                    'chartSisaSumberDana_rm' || chartnm == 'chartSisaSumberDana_pln') {
                    ctx.restore();
                    let fontSize = (height / 114).toFixed(2);
                    ctx.font = 1 + 'em sans-serif';
                    ctx.textBaseline = 'middle';

                    let text = chart.data.labels[0] + '%';
                    let textX = Math.round((width - ctx.measureText(text).width) / 2);
                    let textY = height / 1.87;

                    ctx.fillText(text, textX, textY);
                    ctx.save();
                }
            },
        };
        Chart.register(centerDoughnutPlugin);

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
@endsection
