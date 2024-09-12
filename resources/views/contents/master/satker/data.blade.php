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
                                    <button class="btn btn-lg btn-success font-weight-bolder" onclick="openFormSatker()">
                                        <i class="fas fa-plus-circle"></i> &nbsp; Tambah Data Satker
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
                                            <th style="width:20%" class="align-middle text-center text-uppercase">Provinsi</th>
                                            <th style="width:10%" class="align-middle text-center text-uppercase">Kode</th>
                                            <th style="width:20%" class="align-middle text-center text-uppercase">Jenis Satker</th>
                                            <th style="width:15%" class="align-middle text-center text-uppercase">Kode Tarik Sakti</th>
                                            <th style="width:25%" class="align-middle text-center text-uppercase">Satker</th>
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

    <div class="modal fade" id="modal-form-satker">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background-color: #001A3A; border-radius: 14px; padding: 10px">
                <div class="overlay" id="loader-pendaftaran" style="display: none">
                    <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                </div>
                <div class="modal-header">
                    <h4 class="modal-title text-white">Form Satker</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nip" class="col-sm-4 col-form-label text-white">Provinsi</label>
                                <div class="col-sm-8">
                                    <select name="provinsi" id="provinsi" class="form-control select2">
                                        <option value="none" disabled selected>-- PILIH PROVINSI --</option>
                                        <option value="PUSAT">PUSAT</option>
                                        @foreach($data_prov as $prov)
                                            <option value="{{strtoupper($prov->namaprov)}}">{{strtoupper($prov->namaprov)}}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="id_satker" value="none" id="id_satker" class="form-control" style="display:none"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kode_satker" class="col-sm-4 col-form-label text-white">Kode Satker</label>
                                <div class="col-sm-8">
                                    <input type="text" name="kode_satker" id="kode_satker" class="bg-white form-control"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jenis_satker" class="col-sm-4 col-form-label text-white">Jenis Satker</label>
                                <div class="col-sm-8">
                                    <select name="jenis_satker" id="jenis_satker" class="form-control select2">
                                        <option value="none" disabled selected>-- PILIH JENIS SATKER --</option>
                                        <option value="pusat">Pusat</option>
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
                                <label for="kode_sakti_pagu" class="col-sm-4 col-form-label text-white">Kode Tarik Sakti</label>
                                <div class="col-sm-8">
                                    <input type="text" name="kode_sakti_pagu" id="kode_sakti_pagu" class="bg-white form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nama_satker" class="col-sm-4 col-form-label text-white">Nama Satker</label>
                                <div class="col-sm-8">
                                    <textarea name="nama_satker" id="nama_satker" class="bg-white form-control" rows="3"></textarea>
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

            $.post('{{ route('master.data-satuan-kerja') }}', {_token: '{{csrf_token()}}'}, function(e){

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
                            { data: 'provinsi', className:"align-middle"},
                            { data: 'kode', className:"align-middle text-center"},
                            { data: 'jenis_satker', className:"align-middle text-capitalize"},
                            { data: 'kode_sakti_pagu', className:"align-middle text-center"},
                            { data: 'nama_satker', className:"align-middle"}
                    ],
                    buttons: ["csv", "excel", "pdf", "print"],
                })
                .buttons()
                .container()
                .appendTo("#data_wrapper .col-md-6:eq(0)");

                $('#loader-datatable').hide()

            });
        }

        function openFormSatker()
        {
            clearForm()
            $('#modal-form-satker').modal('show')
            $("#provinsi").val('none').trigger('change');
            $("#jenis_satker").val('none').trigger('change');
        }

        function clearForm()
        {
            $('#id_satker').val('none')
            $('#kode_satker').val('')
            $('#nama_satker').val('')
            $('#kode_sakti_pagu').val('')
            $("#provinsi").val('none').trigger('change');
            $("#jenis_satker").val('none').trigger('change');
        }

        function submitForm()
        {
            $('#loader-datatable').show()

            var id_satker       = $('#id_satker').val()
            var provinsi        = $('#provinsi').val()
            var kode_satker     = $('#kode_satker').val()
            var nama_satker     = $('#nama_satker').val()
            var jenis_satker    = $('#jenis_satker').val()
            var kode_sakti_pagu = $('#kode_sakti_pagu').val()

            if(provinsi == "none" || provinsi === null || jenis_satker == "none" || kode_sakti_pagu === "")
            {
                $('#loader-datatable').hide()

                swal({
                    title: "Form Belum Lengkap!",
                    text: "Semua Field Harus Diisi",
                    type: "warning"
                });
            }
            else
            {
                $.post('{{ route('master.submit-satuan-kerja') }}', {id_satker, provinsi, kode_satker, jenis_satker, nama_satker, kode_sakti_pagu, _token: '{{csrf_token()}}'}, function(e){

                    $('#loader-datatable').hide()

                    if(e.status == "success")
                    {
                        Toast.fire({
                            icon: 'success',
                            title: e.title
                        })

                        openData()
                        clearForm()
                        $('#modal-form-satker').modal('hide')
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
                title: "Hapus Satker Ini?",
                text: "Data yang Sudah Dihapus Tidak Dapat Dipulihkan. Lanjutkan?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#2b982b",
                confirmButtonText: "Ya, Lanjutkan!",
                closeOnConfirm: true
            }, function () {

                $('#loader-datatable').show()

                $.post('{{ route('master.destroy-satuan-kerja') }}', {id, _token: '{{csrf_token()}}'}, function(e){

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

        function updateForm(id, kode, jenis_satker, provinsi, nama_satker, kode_sakti_pagu)
        {
            $('#id_satker').val(id)
            $('#kode_satker').val(kode)
            $('#nama_satker').val(nama_satker)
            $('#kode_sakti_pagu').val(kode_sakti_pagu)
            $("#provinsi").val(provinsi).trigger('change');
            $("#jenis_satker").val(jenis_satker).trigger('change');

            $('#modal-form-satker').modal('show')
        }
        
    </script>
@endsection
