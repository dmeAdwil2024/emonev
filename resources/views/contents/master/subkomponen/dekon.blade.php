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
                                            <th style="width:15%" class="align-middle text-center text-uppercase">Satker</th>
                                            <th style="width:15%" class="align-middle text-center text-uppercase">Jenis Satker</th>
                                            <th style="width:20%" class="align-middle text-center text-uppercase">Deskripsi</th>
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
                    <h4 class="modal-title text-white">Form Subkomponen Dekon</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="kdsatker" class="col-sm-4 col-form-label text-white">Satker</label>
                                <div class="col-sm-8">
                                    <select name="kdsatker" id="kdsatker" class="form-control select2">
                                        <option value="none" disabled selected>-- PILIH SATKER --</option>
                                        <option value="ALL">ALL SATKER</option>
                                        @foreach($data as $satker)
                                            <option value="{{strtoupper($satker->kode)}}">{{strtoupper($satker->nama_satker)}}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="id" value="none" id="id" class="form-control" style="display:none"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jenis_satker" class="col-sm-4 col-form-label text-white">Jenis Satker</label>
                                <div class="col-sm-8">
                                    <select name="jenis_satker" id="jenis_satker" class="form-control select2">
                                        <option value="none" disabled selected>-- PILIH JENIS SATKER --</option>
                                        <option value="sekretariat daerah">Sekretariat Daerah</option>
                                        <option value="badan perencanaan dan pembangunan daerah">Badan Perencanaan dan Pembangunan Daerah</option>
                                        <option value="inspektorat">INSEPKTORAT</option>
                                        <option value="dinas penanaman modal dan pelayanan terpadu satu pintu">Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</option>
                                        <option value="dinas pekerjaan umum, penataan ruang, perumahan dan kawasan permukiman">Dinas Pekerjaan Umum, Penataan Ruang, Perumahan dan Kawasan Permukiman</option>
                                    </select>
                                    <input type="text" name="id" value="none" id="id" class="form-control" style="display:none"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kode_subkomponen" class="col-sm-4 col-form-label text-white">Kode Subkomponen</label>
                                <div class="col-sm-8">
                                    <input type="text" name="kode_subkomponen" id="kode_subkomponen" class="bg-white form-control"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kode_subkomponen_pagu" class="col-sm-4 col-form-label text-white">Kode Subkomponen Pagu</label>
                                <div class="col-sm-8">
                                    <input type="text" name="kode_subkomponen_pagu" id="kode_subkomponen_pagu" class="bg-white form-control"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kode_subkomponen_realisasi" class="col-sm-4 col-form-label text-white">Kode Subkomponen Realisasi</label>
                                <div class="col-sm-8">
                                    <input type="text" name="kode_subkomponen_realisasi" id="kode_subkomponen_realisasi" class="bg-white form-control"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="deskripsi" class="col-sm-4 col-form-label text-white">Deskripsi</label>
                                <div class="col-sm-8">
                                    <input type="text" name="deskripsi" id="deskripsi" class="bg-white form-control">
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

            $.post('{{ route('master.data-subkomponen-dekon') }}', {_token: '{{csrf_token()}}'}, function(e){

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
                            { data: 'kode_subkomponen', className:"align-middle text-center"},
                            { data: 'kode_subkomponen_pagu', className:"align-middle text-center"},
                            { data: 'kode_subkomponen_realisasi', className:"align-middle text-center"},
                            { data: 'nama_satker', className:"align-middle"},
                            { data: 'jenis_satker', className:"text-capitalize align-middle"},
                            { data: 'deskripsi', className:"align-middle"}
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
            $('#id_subdir').val('')
            $('#nama_subdir').val('')
            $("#direktorat").val('none').trigger('change');
        }

        function submitForm()
        {
            $('#loader-datatable').show()

            var id                          = $('#id').val()
            var kdsatker                    = $('#kdsatker').val()
            var deskripsi                   = $('#deskripsi').val()
            var jenis_satker                = $('#jenis_satker').val()
            var kode_subkomponen            = $('#kode_subkomponen').val()
            var kode_subkomponen_pagu       = $('#kode_subkomponen_pagu').val()
            var kode_subkomponen_realisasi  = $('#kode_subkomponen_realisasi').val()

            if(kdsatker == "none" || jenis_satker == "none" || deskripsi === "" || kode_subkomponen === "" || kode_subkomponen_pagu === "" || kode_subkomponen_realisasi === "")
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
                $.post('{{ route('master.submit-subkomponen-dekon') }}', {id, jenis_satker, kdsatker, deskripsi, kode_subkomponen, kode_subkomponen_pagu, kode_subkomponen_realisasi, _token: '{{csrf_token()}}'}, function(e){

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

                $.post('{{ route('master.destroy-subkomponen-dekon') }}', {id, _token: '{{csrf_token()}}'}, function(e){

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

        function updateForm(id, kdsatker, jenis_satker, kode_subkomponen, kode_subkomponen_pagu, kode_subkomponen_realisasi, deskripsi)
        {
            $('#id').val(id)
            $('#deskripsi').val(deskripsi)
            $('#kode_subkomponen').val(kode_subkomponen)
            $('#kode_subkomponen_pagu').val(kode_subkomponen_pagu)
            $('#kode_subkomponen_realisasi').val(kode_subkomponen_realisasi)
            
            $("#kdsatker").val(kdsatker).trigger('change');
            $("#jenis_satker").val(jenis_satker).trigger('change');

            $('#modal-form').modal('show')
        }
        
    </script>
@endsection
