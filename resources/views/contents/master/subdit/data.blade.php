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
                                    <button class="btn btn-lg btn-success font-weight-bolder" onclick="openFormSubdit()">
                                        <i class="fas fa-plus-circle"></i> &nbsp; Tambah Data Subdit
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data" class="table text-xs table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width:10%" class="align-middle text-center text-uppercase">#</th>
                                            <th style="width:20%" class="align-middle text-center text-uppercase">Kode</th>
                                            <th style="width:30%" class="align-middle text-center text-uppercase">Direktorat</th>
                                            <th style="width:40%" class="align-middle text-center text-uppercase">Subdirektorat</th>
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

    <div class="modal fade" id="modal-form-subdit">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background-color: #001A3A; border-radius: 14px; padding: 10px">
                <div class="overlay" id="loader-pendaftaran" style="display: none">
                    <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                </div>
                <div class="modal-header">
                    <h4 class="modal-title text-white">Form Subdit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="direktorat" class="col-sm-4 col-form-label text-white">Direktorat</label>
                                <div class="col-sm-8">
                                    <select name="direktorat" id="direktorat" class="form-control select2">
                                        <option value="none" disabled selected>-- PILIH DIREKTORAT --</option>
                                        @foreach($data_dir as $dir)
                                            <option value="{{strtoupper($dir->id_dir)}}">{{strtoupper($dir->nama_dir)}}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="id" value="none" id="id" class="form-control" style="display:none"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="id_subdir" class="col-sm-4 col-form-label text-white">Kode Subdirektorat</label>
                                <div class="col-sm-8">
                                    <input type="text" name="id_subdir" id="id_subdir" class="bg-white form-control"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nama_subdir" class="col-sm-4 col-form-label text-white">Nama Subdirektorat</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_subdir" id="nama_subdir" class="bg-white form-control">
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

            $.post('{{ route('master.data-subdit') }}', {_token: '{{csrf_token()}}'}, function(e){

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
                            { data: 'id_subdir', className:"align-middle text-center"},
                            { data: 'direktorat', className:"align-middle"},
                            { data: 'nama_subdir', className:"align-middle"}
                    ],
                    buttons: ["csv", "excel", "pdf", "print"],
                })
                .buttons()
                .container()
                .appendTo("#data_wrapper .col-md-6:eq(0)");

                $('#loader-datatable').hide()

            });
        }

        function openFormSubdit()
        {
            clearForm()
            $('#modal-form-subdit').modal('show')
            $("#direktorat").val('none').trigger('change');
        }

        function clearForm()
        {
            $('#id').val('none')
            $('#id_subdir').val('')
            $('#nama_subdir').val('')
            $("#direktorat").val('none').trigger('change');
        }

        function submitForm()
        {
            $('#loader-datatable').show()

            var id          = $('#id').val()
            var id_subdir   = $('#id_subdir').val()
            var direktorat  = $('#direktorat').val()
            var nama_subdir = $('#nama_subdir').val()

            if(id_subdir == "none" || nama_subdir === null)
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
                $.post('{{ route('master.submit-subdit') }}', {id, id_subdir, direktorat, nama_subdir, _token: '{{csrf_token()}}'}, function(e){

                    $('#loader-datatable').hide()

                    if(e.status == "success")
                    {
                        Toast.fire({
                            icon: 'success',
                            title: e.title
                        })

                        openData()
                        clearForm()
                        $('#modal-form-subdit').modal('hide')
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
                title: "Hapus Subdit Ini?",
                text: "Data yang Sudah Dihapus Tidak Dapat Dipulihkan. Lanjutkan?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#2b982b",
                confirmButtonText: "Ya, Lanjutkan!",
                closeOnConfirm: true
            }, function () {

                $('#loader-datatable').show()

                $.post('{{ route('master.destroy-subdit') }}', {id, _token: '{{csrf_token()}}'}, function(e){

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

        function updateForm(id, id_subdir, nama_subdir, id_dir)
        {

            $('#id').val(id)
            $('#id_subdir').val(id_subdir)
            $('#nama_subdir').val(nama_subdir)
            $("#direktorat").val(id_dir).trigger('change');

            $('#modal-form-subdit').modal('show')
        }
        
    </script>
@endsection
