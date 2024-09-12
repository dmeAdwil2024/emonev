@extends('layouts.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$current}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{$modul}}</a></li>
                        <li class="breadcrumb-item active">{{$current}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content" id="wrap-data">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="card card-outline card-primary">
                        <div class="overlay" id="loader-datatable" style="display: none">
                            <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                        </div>

                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <button class="btn btn-lg btn-success font-weight-bolder" onclick="openForm()">
                                        <i class="fas fa-plus-circle"></i> &nbsp; Tambah Data Subkomponen
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data" class="table text-xs table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width:5%" class="align-middle text-center text-uppercase">#</th>
                                            <th style="width:15%" class="align-middle text-center text-uppercase">Kode <br> Subkomponen</th>
                                            <th style="width:15%" class="align-middle text-center text-uppercase">Kode <br> Subkomponen Pagu</th>
                                            <th style="width:15%" class="align-middle text-center text-uppercase">Kode <br> Subkomponen Realisasi</th>
                                            <th style="width:25%" class="align-middle text-center text-uppercase">UKE II</th>
                                            <th style="width:25%" class="align-middle text-center text-uppercase">UKE III</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modal-form">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background-color: #001A3A; border-radius: 14px; padding: 10px">
                <div class="overlay" id="loader-pendaftaran" style="display: none">
                    <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                </div>
                <div class="modal-header">
                    <h4 class="modal-title text-white">Form Subkomponen</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="direktorat" class="col-sm-4 col-form-label text-white">UKE II</label>
                                <div class="col-sm-8">
                                    <select name="direktorat" onchange="loadSubdir()" id="direktorat" class="form-control select2">
                                        <option value="none" disabled selected>-- PILIH UKE II --</option>
                                        @foreach($data as $direktorat)
                                            <option value="{{strtoupper($direktorat->id_dir)}}">{{strtoupper($direktorat->nama_dir)}}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="id" value="none" id="id" class="form-control" style="display:none"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subdirektorat" class="col-sm-4 col-form-label text-white">UKE III</label>
                                <div class="col-sm-8">
                                    <select name="subdirektorat" id="subdirektorat" class="text-uppercase form-control select2">
                                        <option value="none" disabled selected>-- PILIH UKE III --</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kode" class="col-sm-4 col-form-label text-white">Kode Subkomponen</label>
                                <div class="col-sm-8">
                                    <input type="text" name="kode" id="kode" class="bg-white form-control"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kode_pagu" class="col-sm-4 col-form-label text-white">Kode Subkomponen Pagu</label>
                                <div class="col-sm-8">
                                    <input type="text" name="kode_pagu" id="kode_pagu" class="bg-white form-control"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kode_realisasi" class="col-sm-4 col-form-label text-white">Kode Subkomponen Realisasi</label>
                                <div class="col-sm-8">
                                    <input type="text" name="kode_realisasi" id="kode_realisasi" class="bg-white form-control"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times-circle"></i> &nbsp; CANCEL
                    </button>
                    <button type="button" onclick="submitForm()" class="btn btn-success">
                        <i class="fas fa-save"></i> &nbsp; SIMPAN
                    </button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection

@section('js')
    <script>
        $(function () {
            openData()
        });
        
        function openData()
        {
            $('#loader-datatable').show()

            $.post('{{ route('master.data-subkomponen-pusat') }}', {_token: '{{csrf_token()}}'}, function(e){

                $("#data").DataTable().destroy();

                $("#data").DataTable({
                    data: e,
                    paging: true,
                    lengthChange: false,
                    searching: true,
                    ordering: false,
                    info: true,
                    autoWidth: false,
                    responsive: false,
                    columns: [
                            { data: 'button', className:"align-middle text-center"},
                            { data: 'kode', className:"align-middle text-center"},
                            { data: 'kode_pagu', className:"align-middle text-center"},
                            { data: 'kode_realisasi', className:"align-middle text-center"},
                            { data: 'direktorat', className:"text-uppercase align-middle"},
                            { data: 'subdirektorat', className:"text-uppercase align-middle"}
                    ],
                    buttons: ["csv", "excel", "pdf", "print"],
                })
                .buttons()
                .container()
                .appendTo("#data_wrapper .col-md-6:eq(0)");

                $('#loader-datatable').hide()

            });
        }

        function openForm()
        {
            clearForm()
            $('#modal-form').modal('show')
            $("#direktorat").val('none').trigger('change');
        }

        function clearForm()
        {
            $('#id').val('none')
            $('#kode').val('')
            $('#kode_pagu').val('')
            $('#kode_realisasi').val('')
            $("#direktorat").val('none').trigger('change');
            $("#subdirektorat").val('none').trigger('change');
        }

        function submitForm()
        {
            $('#loader-datatable').show()

            var id                  = $('#id').val()
            var kode                = $('#kode').val()
            var kode_pagu           = $('#kode_pagu').val()
            var kode_realisasi      = $('#kode_realisasi').val()
            var kode_direktorat     = $('#direktorat').val()
            var kode_subdirektorat  = $('#subdirektorat').val()

            if(kode === "" || kode_pagu === "" || kode_realisasi === "" || kode_direktorat == "none" || kode_subdirektorat == "none")
            {
                $('#loader-datatable').hide()

                swal({
                    title: "Form Belum Lengkap!",
                    text: "Semua Field Harus Dilengkapi",
                    type: "warning"
                });
            }
            else
            {
                $.post('{{ route('master.submit-subkomponen-pusat') }}', {id, kode, kode_pagu, kode_realisasi, kode_direktorat, kode_subdirektorat, _token: '{{csrf_token()}}'}, function(e){

                    $('#loader-datatable').hide()

                    if(e.status == "success")
                    {
                        Toast.fire({
                            icon: 'success',
                            title: e.title
                        })

                        openData()
                        clearForm()
                        $('#modal-form').modal('hide')
                    }
                    else
                    {
                        Toast.fire({
                            icon: 'error',
                            title: e.message
                        })
                    }

                });
            }
        }

        function remove(id)
        {
            swal({
                title: "Hapus Subkomponen Ini?",
                text: "Data yang Sudah Dihapus Tidak Dapat Dipulihkan. Lanjutkan?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#2b982b",
                confirmButtonText: "Ya, Lanjutkan!",
                closeOnConfirm: true
            }, function () {

                $('#loader-datatable').show()

                $.post('{{ route('master.destroy-subkomponen-pusat') }}', {id, _token: '{{csrf_token()}}'}, function(e){

                    $('#loader-datatable').hide()

                    if(e.status == "success")
                    {
                        Toast.fire({
                            icon: 'success',
                            title: e.title
                        })

                        openData()
                    }
                    else
                    {
                        Toast.fire({
                            icon: 'error',
                            title: e.message
                        })
                    }

                });

            });
        }

        function updateForm(id, kode, kode_pagu, kode_realisasi, kode_direktorat, kode_subdirektorat)
        {
            console.log(kode_subdirektorat)
            $('#id').val(id)
            $('#kode').val(kode)
            $('#kode_pagu').val(kode_pagu)
            $('#kode_realisasi').val(kode_realisasi)
            
            $("#direktorat").val(kode_direktorat).trigger('change');
            loadSubdir()
            
            window.setTimeout( function() {
                $("#subdirektorat").val(kode_subdirektorat).trigger('change');
            }, 500);

            $('#modal-form').modal('show')
        }

        function loadSubdir()
        {
            var id_dir  = $('#direktorat').val()
            
            $('#subdirektorat').select2()
            $('#subdirektorat').empty()
            $('#subdirektorat').select2('destroy')

            $.get('{{ route('tools.subdirektorat') }}', {id_dir, _token: '{{csrf_token()}}'}, function(e){

                $("#subdirektorat").select2({
                    data: e,
                    theme: 'bootstrap4'
                })

            });    
        }
        
    </script>
@endsection
