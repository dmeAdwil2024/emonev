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
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('newdashboard/css/styles.css') }}?v=3" />

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
            <a href="#menuNav" data-bs-toggle="collapse"><img src="{{ asset('newdashboard/images/user-avatar.png') }}"
                alt="" class="img-fluid avatar-img me-2"></a>
            <div class="avatar-name small fw-bold">
              Selamat Datang PPTK,<br>
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
              <li>
                <a href="#menuCapaiOut" class="btn btn-dongker" data-bs-toggle="collapse">Capaian Output
                  &#11206;</a>
                <ul class="list-unstyled collapse ps-3" id="menuCapaiOut">
                  <li>
                    <a href="#menuCapaiPus" class="btn btn-sm btn-primary btn-pills my-1"
                      data-bs-toggle="collapse">Capaian Pusat &#11206;</a>
                    <ul class="list-unstyled collapse ps-3" id="menuCapaiPus">
                      <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Komponen
                          Input</a></li>
                      <li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">Rincian
                          Output</a></li>
                    </ul>
                  </li>
                  <li>
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
            <h5 class="card-title h6">Pagu Anggaran UK III</h5>
            <p class="h5">Rp 000.000.000,00<br>&nbsp;</p>
            <div class="progress mb-2" role="progressbar" aria-label="Success example 4px high" aria-valuenow="25"
              aria-valuemin="0" aria-valuemax="100" style="height: 4px">
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
            <h5 class="card-title h6">Realisasi Anggaran UK III</h5>
            <p class="h5">Rp 000.000.000,00<br>(60%)
            </p>
            <div class="progress mb-2" role="progressbar" aria-label="Success example 4px high" aria-valuenow="25"
              aria-valuemin="0" aria-valuemax="100" style="height: 4px">
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
            <h5 class="card-title h6">Sisa Anggaran UK III</h5>
            <p class="h5">Rp 000.000.000,00<br>&nbsp;</p>
            <div class="progress mb-2" role="progressbar" aria-label="Success example 4px high" aria-valuenow="25"
              aria-valuemin="0" aria-valuemax="100" style="height: 4px">
              <div class="progress-bar bg-success"
                style="width: 80%"></div>
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
        <h3 class="fw-bold h5 mb-3 text-center">Realisasi Anggaran per UK III Lingkup Direktorat</h3>
        <div class="chart-box" style="height: 300px; width:100%;">
          <canvas id="chartRealisasiUk3Dir" aria-label="Realisasi Anggaran per UK II" role="img"></canvas>
        </div>
      </div>
      <div class="col-md-6 px-5">
        <h3 class="fw-bold h5 mb-3 text-center">Realisasi Anggaran per UK III Lingkup Adwil</h3>
        <div class="chart-box" style="height: 300px; width:100%;">
          <canvas id="chartRealisasiUk3Adw" aria-label="Realisasi Anggaran per UK III Lingkup Direktorat"
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
        <h3 class="fw-bold h5 mb-3">Rekapitulasi Revisi dan Usulan Kegiatan</h3>
        <div class="card fw-normal card-dongker">
          <div class="card-body">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="" id="" value="{3:option1}" />
              <label class="form-check-label" for="">Pusat</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="" id="" value="option2" />
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
        </div>
        <div class="card fw-normal card-dongker mt-4">
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
  <div class="modal fade" id="modalPaguAnggaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                data-bs-target="#sebaranPagu" type="button" role="tab" aria-controls="sebaranPagu"
                aria-selected="false">
                Sebaran Pagu
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="riwayatPagu-tab" data-bs-toggle="tab" data-bs-target="#riwayatPagu"
                type="button" role="tab" aria-controls="riwayatPagu" aria-selected="true">
                Riwayat Pagu
              </button>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active" id="sebaranPagu" role="tabpanel" aria-labelledby="sebaranPagu-tab">
              <div class="row">
                <div class="col-6 p-3">
                  <h3>Pagu Anggaran per UKE II</h3>

                  <div class="d-flex">
                    <div class="mb-3">
                      <select class="form-select form-select-lg" name="selectPaguUke2" id="selectPaguUke2">
                        <option selected>Semua</option>
                        <option value="">Sekretariat</option>
                        <option value="">Direktorat A</option>
                        <option value="">Direktorat B</option>
                      </select>
                    </div>
                  </div>
                  <div class="chart-box">
                    <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                      role="img"></canvas>
                  </div>
                </div>
                <div class="col-6">
                  <h4 class="mt-3">Pagu per Kewenangan</h4>
                  <select class="form-select form-select-lg mb-3" name="selectPaguUke2" id="selectPaguUke2">
                    <option selected>Semua</option>
                    <option value="">Pusat</option>
                    <option value="">Dekonsentrasi</option>
                    <option value="">Tugas Pembantu</option>
                  </select>
                  <div class="row">
                    <div class="col-6">
                      <div class="chart-box">
                        <canvas id="chartPaguKew" height="200" aria-label="Pagu per Kewenangan"
                          role="img"></canvas>
                      </div>
                    </div>
                    <div class="col-6">
                      <div><span>Pusat</span> Rp.000.000.000,00</div>
                      <div><span>Dekonsentrasi</span> Rp.000.000.000,00</div>
                      <div><span>Tugas Pembantu</span> Rp.000.000.000,00</div>
                    </div>
                  </div>

                  <div>

                  </div>
                  <h4 class="mt-3">Pagu per Sumber Dana</h4>
                  <select class="form-select form-select-lg mb-3" name="selectPaguUke2" id="selectPaguUke2">
                    <option selected>Semua</option>
                    <option value="">Rupiah Murni</option>
                    <option value="">PLN</option>
                    <option value="">HLN</option>
                  </select>
                  <div class="row">
                    <div class="col-6">
                      <div class="chart-box">
                        <canvas id="chartPaguSum" height="200" aria-label="Pagu per Sumber Dana"
                          role="img"></canvas></canvas>
                      </div>
                    </div>
                    <div class="col-6">
                      <div><span>Rupiah Murni</span> Rp.000.000.000,00</div>
                      <div><span>PLN</span> Rp.000.000.000,00</div>
                      <div><span>HLN</span> Rp.000.000.000,00</div>
                    </div>
                  </div>

                  <div>

                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="riwayatPagu" role="tabpanel" aria-labelledby="riwayatPagu-tab">
              <h3 class="mt-3">Riwayat Pagu</h3>
              <div class="d-flex p-3">
                <div class="mb-3 mr-3">
                  <label for="" class="form-label">Tanggal Revisi</label>
                  <input type="date" class="form-control" name="" id=""
                    aria-describedby="helpId" placeholder="" />
                </div>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="" class="form-label">Jenis Revisi</label>
                    <select class="form-select form-select-lg" name="" id="selectJenisRevisi">
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
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Realisasi Anggaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul class="nav nav-tabs" id="realisasiAnggaranTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="uke2-tab" data-toggle="tab" data-target="#tcUke2" type="button"
                role="tab" aria-controls="home" aria-selected="true">UKE
                II</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="kewenangan-tab" data-toggle="tab" data-target="#tcKewenangan"
                type="button" role="tab" aria-controls="profile" aria-selected="false">Kewenangan</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="sumber-dana-tab" data-toggle="tab" data-target="#tcSumberDana"
                type="button" role="tab" aria-controls="contact" aria-selected="false">Sumber Dana</button>
            </li>
          </ul>
          <div class="tab-content" id="realisasiAnggaranTabContent">
            <div class="tab-pane fade show active" id="tcUke2" role="tabpanel" aria-labelledby="uke2-tab">
              <div class="row">
                <div class="col-4">
                  <h4>Sekretariat</h4>
                  <div class="chart-box">
                    <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                      role="img"></canvas>
                  </div>
                  <p>Realisasi</p>
                  <p>Rp.000.000.000,00</p>
                </div>
                <div class="col-4">
                  <h4>Direktorat Dekonsentrasi, Tugas Pembantuan dan kerja sama</h4>
                  <div class="chart-box">
                    <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                      role="img"></canvas>
                  </div>
                  <p>Realisasi</p>
                  <p>Rp.000.000.000,00</p>
                </div>
                <div class="col-4">
                  <h4>Direktorat Kawasan, Perkotaan dan Batas Negara</h4>
                  <div class="chart-box">
                    <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                      role="img"></canvas>
                  </div>
                  <p>Realisasi</p>
                  <p>Rp.000.000.000,00</p>
                </div>
                <div class="col-4">
                  <h4>Direktorat Toponimi dan Batas Daerah</h4>
                  <div class="chart-box">
                    <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                      role="img"></canvas>
                  </div>
                  <p>Realisasi</p>
                  <p>Rp.000.000.000,00</p>
                </div>
                <div class="col-4">
                  <h4>Direktorat Polisi Pamong Praja dan Perlindungan Masyarakat</h4>
                  <div class="chart-box">
                    <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                      role="img"></canvas>
                  </div>
                  <p>Realisasi</p>
                  <p>Rp.000.000.000,00</p>
                </div>
                <div class="col-4">
                  <h4>Direktorat Manajemen Penanggulangan Bencana dan Kebakaran</h4>
                  <div class="chart-box">
                    <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                      role="img"></canvas>
                  </div>
                  <p>Realisasi</p>
                  <p>Rp.000.000.000,00</p>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="tcKewenangan" role="tabpanel" aria-labelledby="kewenangan-tab">
              <div class="row">
                <div class="col-4">
                  <h4>Pusat</h4>
                  <div class="chart-box">
                    <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                      role="img"></canvas>
                  </div>
                  <p>Realisasi</p>
                  <p>Rp.000.000.000,00</p>
                </div>
                <div class="col-4">
                  <h4>Dekonsentrasi</h4>
                  <div class="chart-box">
                    <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                      role="img"></canvas>
                  </div>
                  <p>Realisasi</p>
                  <p>Rp.000.000.000,00</p>
                </div>
                <div class="col-4">
                  <h4>Tugas Pembantuan</h4>
                  <div class="chart-box">
                    <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                      role="img"></canvas>
                  </div>
                  <p>Realisasi</p>
                  <p>Rp.000.000.000,00</p>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="tcSumberDana" role="tabpanel" aria-labelledby="sumber-dana-tab">
              <div class="row">
                <div class="col-6">
                  <h4>Rupiah Murni</h4>
                  <div class="chart-box">
                    <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                      role="img"></canvas>
                  </div>
                  <p>Realisasi</p>
                  <p>Rp.000.000.000,00</p>
                </div>
                <div class="col-6">
                  <h4>Pinjaman Luar Negeri</h4>
                  <div class="chart-box">
                    <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                      role="img"></canvas>
                  </div>
                  <p>Realisasi</p>
                  <p>Rp.000.000.000,00</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Button trigger modal -->
  {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
            Launch static backdrop modal
        </button> --}}

  <!-- Modal -->
  <div class="modal fade" id="modalSisaAnggaran" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Sisa Anggaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="sa-uke2-tab" data-toggle="tab" data-target="#saUke2"
                type="button" role="tab" aria-controls="home" aria-selected="true">UKE
                II</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="sa-kewenangan-tab" data-toggle="tab" data-target="#saKewenangan"
                type="button" role="tab" aria-controls="profile" aria-selected="false">Kewenangan</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="sa-sumber-dana-tab" data-toggle="tab" data-target="#saSumberDana"
                type="button" role="tab" aria-controls="contact" aria-selected="false">Sumber Dana</button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="saUke2" role="tabpanel" aria-labelledby="sa-uke2-tab">
              <div class="row">
                <div class="col-4">
                  <div class="col-4">
                    <h4>Sekretariat</h4>
                    <div class="chart-box">
                      <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                        role="img"></canvas>
                    </div>
                    <p>Sisa</p>
                    <p>Rp.000.000.000,00</p>
                  </div>
                  <div class="col-4">
                    <h4>Dit Dekon, TP dan Kerjasama</h4>
                    <div class="chart-box">
                      <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                        role="img"></canvas>
                    </div>
                    <p>Sisa</p>
                    <p>Rp.000.000.000,00</p>
                  </div>
                  <div class="col-4">
                    <h4>Dit. Waskoban</h4>
                    <div class="chart-box">
                      <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                        role="img"></canvas>
                    </div>
                    <p>Sisa</p>
                    <p>Rp.000.000.000,00</p>
                  </div>
                  <div class="col-4">
                    <h4>Dit. Topobad</h4>
                    <div class="chart-box">
                      <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                        role="img"></canvas>
                    </div>
                    <p>Sisa</p>
                    <p>Rp.000.000.000,00</p>
                  </div>
                  <div class="col-4">
                    <h4>Dit. Pol PP dan Linmas</h4>
                    <div class="chart-box">
                      <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                        role="img"></canvas>
                    </div>
                    <p>Sisa</p>
                    <p>Rp.000.000.000,00</p>
                  </div>
                  <div class="col-4">
                    <h4>Dit. MPBK</h4>
                    <div class="chart-box">
                      <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                        role="img"></canvas>
                    </div>
                    <p>Sisa</p>
                    <p>Rp.000.000.000,00</p>
                  </div>
                </div>
                <div class="col-4">

                </div>
                <div class="col-4">

                </div>
                <div class="col-4">

                </div>
                <div class="col-4">

                </div>
                <div class="col-4">

                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="saKewenangan" role="tabpanel" aria-labelledby="sa-kewenangan-tab">
              <div class="row">
                <div class="col-4">
                  <h4>Pusat</h4>
                  <div class="chart-box">
                    <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                      role="img"></canvas>
                  </div>
                  <p>Sisa</p>
                  <p>Rp.000.000.000,00</p>
                </div>
                <div class="col-4">
                  <h4>Dekonsentrasi</h4>
                  <div class="chart-box">
                    <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                      role="img"></canvas>
                  </div>
                  <p>Sisa</p>
                  <p>Rp.000.000.000,00</p>
                </div>
                <div class="col-4">
                  <h4>Tugas Pembantuan</h4>
                  <div class="chart-box">
                    <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                      role="img"></canvas>
                  </div>
                  <p>Sisa</p>
                  <p>Rp.000.000.000,00</p>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="saSumberDana" role="tabpanel" aria-labelledby="sa-sumber-dana-tab">
              <div class="row">
                <div class="col-6">
                  <h4>Rupiah Murni</h4>
                  <div class="chart-box">
                    <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                      role="img"></canvas>
                  </div>
                  <p>Sisa</p>
                  <p>Rp.000.000.000,00</p>
                </div>
                <div class="col-6">
                  <h4>Pinjaman Luar Negeri</h4>
                  <div class="chart-box">
                    <canvas id="chartPaguUke2" width="500" height="500" aria-label="Pagu per UKE II"
                      role="img"></canvas>
                  </div>
                  <p>Sisa</p>
                  <p>Rp.000.000.000,00</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- Chartjs -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
  <script>
    const chartRealisasiUk3Dir = document.getElementById('chartRealisasiUk3Dir');
    const chartRealisasiUk3Adw = document.getElementById('chartRealisasiUk3Adw');
    const chartSandingan = document.getElementById('chartSandingan');


    new Chart(chartRealisasiUk3Dir, {
      type: 'bar',
      data: {
        labels: ['Output A', 'Output B', 'Output C'],
        datasets: [{
          label: 'Realisasi Anggaran per UK II',
          data: [100, 90, 80],
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

    new Chart(chartRealisasiUk3Adw, {
      type: 'bar',
      data: {
        labels: ['Subdit A', 'Subdit B', 'Subdit C', 'Subdit D', 'Subdit E', 'Subdit F', 'Subdit G', 'Subdit H', 'Subdit I', 'Subdit J', 'Subdit K', 'Subdit L', 'Subdit M', 'Subdit N', 'Subdit O', 'Subdit P'],
        datasets: [{
          label: 'Realisasi Anggaran per UK III',
          data: [100, 90, 80, 100, 90, 80, 100, 90, 80, 100, 90, 80, 100, 90, 80, 100],
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
  </script>
</body>

</html>
