@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">PROFILE</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('') }}images/user.png"
                                    alt="{{ Auth::user()->nama }}" />
                            </div>

                            <h3 class="profile-username text-capitalize text-center">{{ Auth::user()->nama }}</h3>

                            <p class="text-muted text-center">
                                {{ Auth::user()->username }}
                            </p>

                            <ul class="list-group list-group-unbordered mt-3 mb-3">
                                <li class="list-group-item text-center text-uppercase"> <b>
                                        {{ getLevel(Auth::user()->level) }} <br>
                                        {{ getSatker(Auth::user()->kdsatker, 'nama_satker') }}
                                    </b></li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Profile</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-mobile mr-1"></i> Nomor HP</strong>

                            <p class="text-muted">
                                {{ Auth::user()->no_hp }}
                            </p>

                            <hr />

                            <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                            <p class="text-muted">{{ Auth::user()->email }}</p>

                            <hr />

                            <strong><i class="fas fa-briefcase mr-1"></i> Jabatan Dalam Satker</strong>

                            <p class="text-muted text-capitalize">
                                {{ getLevel(Auth::user()->level) }}
                            </p>

                            <hr />

                            <strong><i class="fas fa-home mr-1"></i> Satuan Kerja</strong>

                            <p class="text-muted text-capitalize">
                                {{ strtolower(getSatker(Auth::user()->kdsatker, 'nama_satker')) }}</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="overlay" id="loader-profile" style="display: none">
                            <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                        </div>
                        <div class="card-header">
                            <h1 class="font-weight-bolder card-title">Ubah Profile</h1>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control bg-white" id="nama"
                                            value="{{ Auth::user()->nama }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control bg-white" id="email"
                                            value="{{ Auth::user()->email }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control bg-white" id="no_hp"
                                            value="{{ Auth::user()->no_hp }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="satker" class="col-sm-2 col-form-label">Kode Satker</label>
                                    <div class="col-sm-10">
                                        <select name="kdsatker" id="kdsatker" class="form-control select2">
                                            <option value="" selected disabled>
                                                --PILIH SATUAN KERJA--
                                            </option>
                                            @foreach ($data_satker as $satker)
                                                <option value="{{ $satker->kode }}"
                                                    @if (Auth::user()->kdsatker == $satker->kode) selected @endif>
                                                    {{ $satker->nama_satker }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="button" onclick="changeProfile()"
                                            class="btn btn-success font-weight-bolder">
                                            <i class="fas fa-save"></i> &nbsp; Simpan Data
                                        </button>

                                        <button type="button" onclick="changePassword('{{ Auth::user()->username }}')"
                                            class="btn btn-danger ml-3 font-weight-bolder">
                                            <i class="fas fa-cogs"></i> &nbsp; Ubah Password
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@section('js')
    <script>
        function changeProfile() {
            $('#loader-profile').modal('show')

            var nama = $('$data_satkernama').val()
            var email = $('$satkermail').val()
            var no_hp = $('#no_hp').val()
            var kdsatker = $('#kdsatker').val()

            $.post('{{ route('users.update') }}', {
                nama,
                email,
                no_hp,
                kdsatker,
                _token: '{{ csrf_token() }}'
            }, function(e) {

                location.reload();

            });
        }
    </script>
@endsection
