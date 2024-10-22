<!DOCTYPE html>
<html lang="en">

<head>
    <title>Emonev Bina Adwil Kemendagri</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('') }}landing-pages/fonts/icomoon/style.css" />
    <link rel="stylesheet" href="{{ asset('') }}landing-pages/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('') }}landing-pages/css/animate.css" />
    <link rel="stylesheet" href="{{ asset('') }}landing-pages/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ asset('') }}landing-pages/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="{{ asset('') }}landing-pages/css/bootstrap-datepicker.css" />

    <link rel="stylesheet" href="{{ asset('') }}landing-pages/fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="{{ asset('') }}landing-pages/css/aos.css" />
    <link rel="stylesheet" href="{{ asset('') }}landing-pages/css/jquery.fancybox.min.css" />

    <link rel="stylesheet" href="{{ asset('') }}landing-pages/css/style.css" />

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('') }}templates/plugins/select2/css/select2.min.css">
    <link rel="stylesheet"
        href="{{ asset('') }}templates/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Sweetalert Css -->
    <link href="{{ asset('') }}templates/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto);

        .whatsapp {
            font-family: Roboto, Arial, Sans-serif;
            font-size: 14px;
            font-weight: 400;
            right: 5%;
            position: fixed;
            bottom: 0;
            z-index: 999;
        }

        a {
            color: #fff;
            text-decoration: none;
            transition: ease-in-out .2s
        }

        a:hover {
            box-shadow: 0 1px 4px rgba(0, 0, 0, .12), 0 1px 3px rgba(0, 0, 0, .24);
            color: #fff
        }

        .icons {
            background: #25d366;
            border-radius: 10px 10px 0 0;
            display: block;
            height: 42px;
            width: 220px
        }

        .icons:hover {
            background: #128c7e
        }

        .icons span {
            display: block;
            left: 5px;
            top: 5px;
            transform: translate(0, 10px)
        }

        svg {
            border-radius: 10px;
            display: block;
            fill: #fff;
            float: left;
            height: 42px;
            margin-right: 5px;
            -webkit-transition: ease-in-out .175s;
            transition: ease-in-out .175s;
            width: 42px
        }
    </style>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <!-- <div class="whatsapp">
            <a class="icons" target="_blank" href="https://api.whatsapp.com/send?phone=6287887635898&text=Izin bertanya terkait E-Monev"><svg viewBox="0 0 800 800"><path d="M519 454c4 2 7 10-1 31-6 16-33 29-49 29-96 0-189-113-189-167 0-26 9-39 18-48 8-9 14-10 18-10h12c4 0 9 0 13 10l19 44c5 11-9 25-15 31-3 3-6 7-2 13 25 39 41 51 81 71 6 3 10 1 13-2l19-24c5-6 9-4 13-2zM401 200c-110 0-199 90-199 199 0 68 35 113 35 113l-20 74 76-20s42 32 108 32c110 0 199-89 199-199 0-111-89-199-199-199zm0-40c133 0 239 108 239 239 0 132-108 239-239 239-67 0-114-29-114-29l-127 33 34-124s-32-49-32-119c0-131 108-239 239-239z"/></svg><span>Help Desk</span></a>
        </div> -->
    <div class="loader"></div>
    <div class="site-wrap">
        <div class="site-blocks-cover" id="home-section">
            <div class="img-wrap">
                <div class="owl-carousel slide-one-item hero-slider">
                    <div class="slide">
                        <img src="{{ asset('') }}images/header-logo.png" alt="Image" width="25px" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto align-self-center">
                        <div class="intro">
                            <div class="text">
                                <p class="sub-text mb-5">
                                <h3>Emonev Bina Administrasi Kewilayahan</h3>
                                <small class="text-black">
                                    Mempermudah proses pelaporan data realisasi hasil pemantauan pelaksanaan rencana
                                    kerja Ditjen Bina Adwil Kementerian Dalam Negeri Republik Indonesia
                                </small>
                                </p>
                                <p class="text-center mt-3">
                                    <a href="javascript:void(0)" onclick="openModalLogin()" style="margin: 5px;"
                                        class="btn btn-success btn-md ">
                                        Masuk
                                    </a>
                                    <a href="javascript:void(0)" onclick="openModalResetPassword()" style="margin: 5px;"
                                        class="btn btn-warning btn-md ">
                                        Lupa Password?
                                    </a>
                                    <a href="{{ route('register') }}" style="margin: 5px;"
                                        class="btn btn-danger btn-md"> Daftar</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END .site-blocks-cover -->

        <div class="site-section d-none" id="what-we-do-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-6 section-title">
                        <h2 class="title text-navy">Fitur Utama yang Tersedia</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 ml-auto">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                                <div class="service h-100">
                                    <h3>Pengajuan Revisi Pusat</h3>
                                    <p>Pengajuan revisi anggaran di Ditjen Bina Adwil Kemendagri Pusat</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                                <div class="service h-100">
                                    <h3>Penerbitan POK</h3>
                                    <p>Penerbitan POK untuk Sub-Direktorat dibawah Ditjen Bina Adwil</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                                <div class="service h-100">
                                    <h3>Revisi Kegiatan GWPP</h3>
                                    <p>Pengajuan revisi anggaran di Daerah untuk Kegiatan GWPP</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                                <div class="service h-100">
                                    <h3>Revisi Kegiatan Sarpras</h3>
                                    <p>Pengajuan revisi anggaran di Daerah untuk Kegiatan Sarana & Prasarana</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                                <div class="service h-100">
                                    <h3>Pengajuan Usulan Kegiatan</h3>
                                    <p>Pengajuan Usulan Kegiatan di Ditjen Bina Adwil Kemendagri</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END .site-section -->

        <div class="site-section" id="portfolio-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-7 section-title text-center mx-auto">
                        <span class="sub-title mb-2 d-block">Panduan</span>
                        <h2 class="title text-navy mb-3">Panduan Penggunaan Emonev Sesuai dengan Kapasitas Anda</h2>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <img src="{{ asset('') }}images/1.png" alt="Image" class="img-fluid" />
                    </div>
                    <div class="col-lg-5 h-100 jm-sticky-top ml-auto">
                        <h3>Pejabat Pelaksana Teknis Kegiatan (PPTK)</h3>
                        <p class="mb-4">
                            Pejabat Pelaksana Teknis Kegiatan (PPTK) mengajukan revisi anggaran kemudian akan ditindak
                            lanjut oleh pejabat berwenang sesuai alur. Setiap tahap proses, PPTK akan mendapatkan
                            notifikasi sudah sejauh mana
                            pengajuan revisi sudah ditindak lanjuti
                        </p>
                        <p class="mb-4"><a href="javascript:void(0)" class="readmore" onclick="openModalLogin()"
                                style="color: #00457C">Masuk</a></p>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-lg-6 order-1 order-lg-2 mb-4 mb-lg-0">
                        <img src="images/2.png" alt="Image" class="img-fluid" />
                    </div>
                    <div class="col-lg-5 h-100 jm-sticky-top mr-auto order-2 order-lg-1">
                        <h3>Pejabat Pembuat Komitmen (PPK)</h3>
                        <p class="mb-4">Pejabat Pembuat Komitmen (PPK) memproses pengajuan revisi yang sudah diajukan
                            oleh Pejabat Pelaksana Teknis Kegiatan (PPTK) dengan memvalidasi dokumen yang diupload oleh
                            PPTK</p>
                        <p class="mb-4"><a href="javascript:void(0)" class="readmore" onclick="openModalLogin()"
                                style="color: #00457C">Masuk</a></p>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <img src="images/3.png" alt="Image" class="img-fluid" />
                    </div>
                    <div class="col-lg-5 h-100 jm-sticky-top ml-auto">
                        <h3>Bagian Perencanaan (Bagren)</h3>
                        <p class="mb-4">Bagian Perencanaan (Bagren) memverifikasi pengajuan revisi dari PPTK yang
                            sudah diproses sebelumnya oleh Pejabat Pembuat Keputusan (PPK)</p>
                        <p class="mb-4"><a href="javascript:void(0)" class="readmore" onclick="openModalLogin()"
                                style="color: #00457C">Masuk</a></p>
                    </div>
                </div>
            </div>
        </div>

        <footer class="site-footer"
            style="padding-bottom: 1rem !important; padding-top: 2rem !important; margin-top: 2rem !important;">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                        </div>
                        <p>
                            Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            Bina Adwil Kemendagri
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <div class="modal fade" id="modal-login">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #001A3A; border-radius: 14px; padding: 10px">
                <div class="modal-header">
                    <h4 class="modal-title text-white">Masuk Emonev</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    <div class="modal-body">
                        <div class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="username" class="col-sm-4 col-form-label text-white">Username</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="username" id="username" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-4 col-form-label text-white">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" name="password" id="password"
                                            class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                class="fas fa-times-circle"></i> Cancel</button>
                        <button type="submit" class="btn btn-success">Masuk</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="modal-reset-password">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #001A3A; border-radius: 14px; padding: 10px">
                <div class="modal-header">
                    <h4 class="modal-title text-white">Reset Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
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
    <!-- /.modal -->

    <div class="modal fade" id="modal-register">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background-color: #001A3A; border-radius: 14px; padding: 10px">
                <div class="modal-header">
                    <h4 class="modal-title text-white">Daftar Emonev</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-4 col-form-label text-white">Nama & Gelar</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama" id="nama" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nip" class="col-sm-4 col-form-label text-white">NIP</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nip" id="nip" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pangkat" class="col-sm-4 col-form-label text-white">Pangkat &
                                    Golongan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="pangkat" id="pangkat" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_hp" class="col-sm-4 col-form-label text-white">Nomor
                                    Whatsapp</label>
                                <div class="col-sm-8">
                                    <input type="text" name="no_hp" id="no_hp" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-white">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" id="email" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jabatan" class="col-sm-4 col-form-label text-white">Jabatan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="jabatan" id="jabatan" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jabatan_dalam_satker" class="col-sm-4 col-form-label text-white">Jabatan
                                    dalam Satker</label>
                                <div class="col-sm-8">
                                    <select onchange="checkJabatan()" name="jabatan_dalam_satker"
                                        id="jabatan_dalam_satker" class="form-control select2">
                                        <option value="" selected disabled>Pilih Salah Satu</option>
                                        <option value="1">Kuasa Pengguna Anggaran</option>
                                        <option value="2">Pejabat Pembuat Komitmen</option>
                                        <option value="11">Pejabat Penandatanganan SPM</option>
                                        <option value="10">Bendahara Pengeluaran</option>
                                        <option value="4">Staff Pengelola</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="satker" class="col-sm-4 col-form-label text-white">Satuan Kerja</label>
                                <div class="col-sm-8">
                                    <select onchange="checkJabatan()" name="satker" id="satker"
                                        class="form-control select2">
                                        <option value="" selected disabled>Pilih Salah Satu</option>
                                        <option value="sekda">Sekretariat Daerah</option>
                                        <option value="bappeda">Badan Perencanaan dan Pembangunan Daerah</option>
                                        <option value="inspektorat">INSPEKTORAT</option>
                                        <option value="dpmptsp">Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" id="wrap-bidang">
                                <label for="bidang" class="col-sm-4 col-form-label text-white">Bidang</label>
                                <div class="col-sm-8">
                                    <input type="text" name="bidang" id="bidang" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sk_penunjukkan" class="col-sm-4 col-form-label text-white">SK
                                    Penunjukkan</label>
                                <div class="col-sm-8 input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="sk_penunjukkan">
                                        <label class="custom-file-label" for="sk_penunjukkan">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="provinsi" class="col-sm-4 col-form-label text-white">Provinsi</label>
                                <div class="col-sm-8">
                                    @php $provinsi = provinsi(); @endphp
                                    <select name="provinsi" id="provinsi" class="form-control select2">
                                        <option value="" selected disabled>Pilih Salah Satu</option>
                                        @foreach ($provinsi as $prov)
                                            <option value="{{ $prov->id_prov }}"> {{ $prov->namaprov }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                            class="fas fa-times-circle"></i> Cancel</button>
                    <button type="submit" id="btn-daftar" class="btn btn-success" onclick="submitRegistrasi()">
                        <span id="btn-daftar-title">Daftar</span>
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <script src="{{ asset('') }}landing-pages/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('') }}landing-pages/js/popper.min.js"></script>
    <script src="{{ asset('') }}landing-pages/js/bootstrap.min.js"></script>
    <script src="{{ asset('') }}landing-pages/js/owl.carousel.min.js"></script>
    <script src="{{ asset('') }}landing-pages/js/aos.js"></script>
    <script src="{{ asset('') }}landing-pages/js/jquery.sticky.js"></script>
    <script src="{{ asset('') }}landing-pages/js/stickyfill.min.js"></script>
    <script src="{{ asset('') }}landing-pages/js/jquery.easing.1.3.js"></script>
    <script src="{{ asset('') }}landing-pages/js/isotope.pkgd.min.js"></script>

    <script src="{{ asset('') }}landing-pages/js/jquery.fancybox.min.js"></script>
    <script src="{{ asset('') }}landing-pages/js/main.js"></script>
    <!-- Select2 -->
    <script src="{{ asset('') }}templates/plugins/select2/js/select2.full.min.js"></script>
    <!-- SweetAlert Plugin Js -->
    <script src="{{ asset('') }}templates/plugins/sweetalert/sweetalert.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('') }}templates/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <script>
        bsCustomFileInput.init();

        $(function() {
            $(".select2").select2({
                theme: 'bootstrap4'
            })
        })

        function openModalLogin() {
            $('#modal-login').modal('show')
            document.getElementById("username").focus();
        }

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

        function openModalRegistrasi() {
            clearForm()
            $('#modal-register').modal('show')
            document.getElementById("nip").focus();
        }

        function checkJabatan() {
            $('#wrap-bidang').hide()

            var satker = $('#satker').val()
            var jds = $('#jabatan_dalam_satker').val()

            if (satker == "sekda" && jds == "2") {
                $('#wrap-bidang').show()
            }
        }

        function submitRegistrasi() {
            $('#btn-daftar').prop('disabled', true);
            $('#btn-daftar-title').empty().append('Memproses...');

            var nip = $('#nip').val()
            var nama = $('#nama').val()
            var no_hp = $('#no_hp').val()
            var email = $('#email').val()
            var bidang = $('#bidang').val()
            var satker = $('#satker').val()
            var jabatan = $('#jabatan').val()
            var pangkat = $('#pangkat').val()
            var provinsi = $('#provinsi').val()
            var jabatan_dalam_satker = $('#jabatan_dalam_satker').val()
            var sk = $('#sk_penunjukkan').prop('files')[0];

            var form_data = new FormData();

            form_data.append('sk', sk);
            form_data.append('nip', nip);
            form_data.append('nama', nama);
            form_data.append('no_hp', no_hp);
            form_data.append('email', email);
            form_data.append('satker', satker);
            form_data.append('bidang', bidang);
            form_data.append('jabatan', jabatan);
            form_data.append('pangkat', pangkat);
            form_data.append('provinsi', provinsi);
            form_data.append('jabatan_dalam_satker', jabatan_dalam_satker);

            form_data.append('_token', '{{ csrf_token() }}')

            $.ajax({
                url: "{{ route('tools.register') }}",
                type: "POST",
                data: form_data,
                cache: false,
                processData: false,
                contentType: false,
                success: function(e) {
                    swal(e.title, e.message, e.status)
                    clearForm()
                    $('#btn-daftar').prop('disabled', false);
                    $('#btn-daftar-title').empty().append('Daftar');
                }
            });
        }

        function clearForm() {
            $('#nip').val("")
            $('#nama').val("")
            $('#pangkat').val("")
            $('#no_hp').val("")
            $('#email').val("")
            $('#jabatan').val("")
            $('#satker').val("")
            $('#provinsi').val("")

            $('#modal-login').modal('hide')
        }
    </script>
</body>

</html>
