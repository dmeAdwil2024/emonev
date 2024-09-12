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
    <link href="{{ env('APP_URL') }}/templates/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
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
    <div class="whatsapp d-none">
        <a class="icons" target="_blank"
            href="https://api.whatsapp.com/send?phone=6287887635898&text=Izin bertanya terkait E-Monev"><svg
                viewBox="0 0 800 800">
                <path
                    d="M519 454c4 2 7 10-1 31-6 16-33 29-49 29-96 0-189-113-189-167 0-26 9-39 18-48 8-9 14-10 18-10h12c4 0 9 0 13 10l19 44c5 11-9 25-15 31-3 3-6 7-2 13 25 39 41 51 81 71 6 3 10 1 13-2l19-24c5-6 9-4 13-2zM401 200c-110 0-199 90-199 199 0 68 35 113 35 113l-20 74 76-20s42 32 108 32c110 0 199-89 199-199 0-111-89-199-199-199zm0-40c133 0 239 108 239 239 0 132-108 239-239 239-67 0-114-29-114-29l-127 33 34-124s-32-49-32-119c0-131 108-239 239-239z" />
            </svg><span>Help Desk</span></a>
    </div>
    <div class="loader"></div>
    <div class="site-wrap">
        <div class="site-section" id="portfolio-section">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <img src="{{ asset('') }}images/logo-emonev.png" width="150px">
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-white" style="background: #00457B">Register E-Monev</div>

                            <div class="card-body">
                                <div class="form-horizontal">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-4 col-form-label">Nama & Gelar</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="nama" id="nama"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nip" class="col-sm-4 col-form-label">NIP</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="nip" id="nip"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pangkat" class="col-sm-4 col-form-label">Pangkat &
                                                Golongan</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="pangkat" id="pangkat"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_hp" class="col-sm-4 col-form-label">Nomor Whatsapp</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="no_hp" id="no_hp"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="email" name="email" id="email"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="jabatan" id="jabatan"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jabatan_dalam_satker" class="col-sm-4 col-form-label">Jabatan
                                                dalam Satker</label>
                                            <div class="col-sm-8">
                                                <select onchange="checkJabatan()" name="jabatan_dalam_satker"
                                                    id="jabatan_dalam_satker" class="form-control select2">
                                                    <option value="none" selected disabled>Pilih Salah Satu</option>
                                                    <option value="1">Kuasa Pengguna Anggaran</option>
                                                    <option value="2">Pejabat Pembuat Komitmen</option>
                                                    <option value="11">Pejabat Penandatanganan SPM</option>
                                                    <option value="10">Bendahara Pengeluaran</option>
                                                    <option value="4">Staff Pengelola</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="satker" class="col-sm-4 col-form-label">Satuan Kerja</label>
                                            <div class="col-sm-8">
                                                <select onchange="checkJabatan()" name="satker" id="satker"
                                                    class="form-control select2">
                                                    <option value="none" selected disabled>Pilih Salah Satu</option>
                                                    <option value="sekda">Sekretariat Daerah</option>
                                                    <option value="bappeda">Badan Perencanaan dan Pembangunan Daerah
                                                    </option>
                                                    <option value="inspektorat">INSPEKTORAT</option>
                                                    <option value="dpmptsp">Dinas Penanaman Modal dan Pelayanan Terpadu
                                                        Satu Pintu</option>
                                                    <option value="dpuprpkp">Dinas Pekerjaan Umum, Penataan Ruang,
                                                        Perumahan dan Kawasan Permukiman</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row" id="wrap-bidang" style="display:none">
                                            <label for="bidang" class="col-sm-4 col-form-label">Bidang</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="bidang" id="bidang"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sk_penunjukkan" class="col-sm-4 col-form-label">SK
                                                Penunjukkan</label>
                                            <div class="col-sm-8 input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"
                                                        id="sk_penunjukkan" />
                                                    <label class="custom-file-label" for="sk_penunjukkan">Pilih
                                                        File</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="provinsi" class="col-sm-4 col-form-label">Wilayah</label>
                                            <div class="col-sm-8">
                                                @php $provinsi = provinsi(); @endphp
                                                <select name="provinsi" id="provinsi" onchange="loadSatker()"
                                                    class="form-control select2">
                                                    <option value="none" selected disabled>Pilih Salah Satu</option>
                                                    @foreach ($provinsi as $prov)
                                                        <option value="{{ $prov->id_prov }}"> {{ $prov->namaprov }}
                                                        </option>
                                                    @endforeach
                                                    <option value="kab_malinau">Kab. Malinau</option>
                                                    <option value="kab_pulau_morotai">Kab. Pulau Morotai</option>
                                                    <option value="kab_tanimbar">Kab. Tanimbar</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kode_satker" class="col-sm-4 col-form-label">Kode Satuan
                                                Kerja</label>
                                            <div class="col-sm-8">
                                                <select name="kode_satker" id="kode_satker"
                                                    class="form-control select2">
                                                    <option value="none" selected disabled>Pilih Salah Satu</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer justify-content-between">
                                <a href="/" class="btn btn-danger"><i class="fas fa-times-circle"></i>
                                    Cancel</a>
                                <button type="submit" id="btn-daftar" class="btn btn-success float-right"
                                    onclick="submitRegistrasi()">
                                    <span id="btn-daftar-title">Daftar</span>
                                </button>
                            </div>
                        </div>
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
    <script src="{{ env('APP_URL') }}/templates/plugins/sweetalert/sweetalert.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ env('APP_URL') }}/templates/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <script>
        bsCustomFileInput.init();

        $(function() {
            $(".select2").select2({
                theme: 'bootstrap4'
            })
        })

        function loadSatker() {
            var provinsi = $('#provinsi').val()

            $('#kode_satker').select2()
            $('#kode_satker').empty()
            $('#kode_satker').select2('destroy')

            $.post('{{ route('satker') }}', {
                provinsi,
                _token: '{{ csrf_token() }}'
            }, function(e) {

                $("#kode_satker").select2({
                    data: e,
                    theme: 'bootstrap4'
                })


            });
        }

        function openModalLogin() {
            $('#modal-login').modal('show')
            document.getElementById("username").focus();
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
            var kode_satker = $('#kode_satker').val()
            var jabatan_dalam_satker = $('#jabatan_dalam_satker').val()
            var sk = $('#sk_penunjukkan').prop('files')[0];

            console.log("satker:" + satker, "provinsi:" + provinsi, "jabsatker:" + jabatan_dalam_satker)

            if (nip == "" || nama == "" || no_hp == "" || email == "" || satker == "" || kode_satker == "" || jabatan ==
                "" || pangkat == "" || jabatan_dalam_satker === null || satker === null || sk == "" || provinsi === null ||
                document.getElementById("sk_penunjukkan").files.length == 0) {
                $('#btn-daftar').prop('disabled', false);
                $('#btn-daftar-title').empty().append('Daftar');
                // swal("Form Tidak Lengkap", "Mohon Lengkapi Data Pendaftaran Anda", "error")

                if (document.getElementById("sk_penunjukkan").files.length == 0) {
                    $('#sk_penunjukkan').addClass("is-invalid");
                    $('#sk_penunjukkan').removeClass("is-valid");
                    document.getElementById("sk_penunjukkan").focus();
                } else {
                    $('#sk_penunjukkan').addClass("is-valid");
                    $('#sk_penunjukkan').removeClass("is-invalid");
                }

                checkInput("provinsi")
                checkInput("bidang")
                checkInput("satker")
                checkInput("jabatan_dalam_satker")
                checkInput("jabatan")
                checkInput("email")
                checkInput("no_hp")
                checkInput("pangkat")
                checkInput("nip")
                checkInput("nama")
                checkInput("kode_satker")

            } else {

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
                form_data.append('kode_satker', kode_satker);
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

                        if (e.status == "success") {
                            swal({
                                title: e.title,
                                text: e.message,
                                type: e.status
                            }, function() {
                                window.location = "/";
                            });
                        } else {
                            swal(e.title, e.message, e.status)
                            $('#btn-daftar').prop('disabled', false);
                            $('#btn-daftar-title').empty().append('Daftar');
                        }

                    }
                });
            }
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

        function checkInput(id) {
            var nama = $("#" + id).val()

            if (nama == "" || nama == "none" || nama === null) {
                $('#' + id).addClass("is-invalid");
                $('#' + id).removeClass("is-valid");
                document.getElementById("" + id).focus();
            } else {
                $('#' + id).addClass("is-valid");
                $('#' + id).removeClass("is-invalid");
            }
        }
    </script>
</body>

</html>
