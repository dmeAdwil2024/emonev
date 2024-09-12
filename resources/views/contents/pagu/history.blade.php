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
                                <button class="btn btn-lg btn-success font-weight-bolder" onclick="openFormHistoryPagu()">
                                    <i class="fas fa-upload"></i> &nbsp; Input Riwayat Pagu
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data" class="table text-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:25%" class="align-middle text-center text-uppercase">History</th>
                                        <th style="width:15%" class="align-middle text-center text-uppercase">Tanggal</th>
                                        <th style="width:20%" class="align-middle text-center text-uppercase">Pagu</th>
                                        <th style="width:40%" class="align-middle text-center text-uppercase">Keterangan</th>
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

<div class="modal fade" id="modal-form-history">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="background-color: #001A3A; border-radius: 14px; padding: 10px">
            <div class="modal-header">
                <h4 class="modal-title text-white">Form Input History Pagu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="history" class="col-sm-4 col-form-label text-white">History</label>
                            <div class="col-sm-8">
                                <input type="text" name="history" id="history" class="form-control"/>
                                <input type="text" name="id" id="id" style="display:none" class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-4 col-form-label text-white">Tanggal</label>
                            <div class="col-sm-8">
                                <input type="date" name="tanggal" id="tanggal" class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pagu" class="col-sm-4 col-form-label text-white">Pagu</label>
                            <div class="col-sm-8">
                                <input type="text" name="pagu" id="pagu" class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-4 col-form-label text-white">Keterangan</label>
                            <div class="col-sm-8">
                                <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                
                    <button type="button" class="btn-submit btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> CANCEL</button>
                    <button type="button" onclick="submitForm()" class="btn-submit btn btn-success">SIMPAN</button>
                
                    <button type="button" class="btn btn-danger btn-update" onclick="removeData()"><i class="fas fa-trash"></i> &nbsp; HAPUS</button>
                    <button type="button" onclick="updateForm()" class="btn-update btn btn-success">SIMPAN PERUBAHAN</button>
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

        function openFormHistoryPagu()
        {
            $('#modal-form-history').modal('show')

            $('.btn-update').hide()
            $('.btn-submit').show()

            $('#id').val("")
            $('#pagu').val("")
            $('#history').val("")
            $('#tanggal').val("")
            $('#keterangan').val("")
        }

        function openModalAction(id, pagu, history, tanggal, keterangan)
        {
            $('#modal-form-history').modal('show')

            $('.btn-update').show()
            $('.btn-submit').hide()

            $('#id').val(id)
            $('#pagu').val(pagu)
            $('#history').val(history)
            $('#tanggal').val(tanggal)
            $('#keterangan').val(keterangan)
        }

        function removeData()
        {
            var id      = $('#id').val()
            var history = $('#history').val()
            
            swal({
                title: "Hapus "+history+"?",
                text: "Data yang Sudah Dihapus Tidak Dapat Dirollback. Lanjutkan?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#2b982b",
                confirmButtonText: "Ya, Lanjutkan!",
                closeOnConfirm: true
            }, function () {

                $.post('{{ route('master.remove-history-pagu') }}', {id, _token: '{{csrf_token()}}'}, function(e){

                    $('#loader-datatable').show()
                    
                    if(e.status == "success")
                    {
                        Toast.fire({
                            icon: 'success',
                            title: e.title
                        })

                        openData()

                        $('#modal-form-history').modal('hide')
                        $('#pagu').val("")
                        $('#history').val("")
                        $('#tanggal').val("")
                        $('#keterangan').val("")
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
        
        function submitForm()
        {
            var pagu        = $('#pagu').val()    
            var history     = $('#history').val()
            var tanggal     = $('#tanggal').val()
            var keterangan  = $('#keterangan').val()

            $('#loader-datatable').show()

            $.post('{{ route('master.submit-history-pagu') }}', {pagu, history, tanggal, keterangan, _token: '{{csrf_token()}}'}, function(e){

                if(e.status == "success")
                {
                    Toast.fire({
                        icon: 'success',
                        title: e.title
                    })

                    openData()

                    $('#modal-form-history').modal('hide')
                    $('#pagu').val("")
                    $('#history').val("")
                    $('#tanggal').val("")
                    $('#keterangan').val("")
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

        function updateForm()
        {
            var id          = $('#id').val()
            var pagu        = $('#pagu').val()    
            var history     = $('#history').val()
            var tanggal     = $('#tanggal').val()
            var keterangan  = $('#keterangan').val()

            $('#loader-datatable').show()

            $.post('{{ route('master.update-history-pagu') }}', {id, pagu, history, tanggal, keterangan, _token: '{{csrf_token()}}'}, function(e){

                if(e.status == "success")
                {
                    Toast.fire({
                        icon: 'success',
                        title: e.title
                    })

                    openData()

                    $('#modal-form-history').modal('hide')
                    $('#pagu').val("")
                    $('#history').val("")
                    $('#tanggal').val("")
                    $('#keterangan').val("")
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

        function openData()
        {
            $('#loader-datatable').show()

            $.post('{{ route('master.history-pagu') }}', {_token: '{{csrf_token()}}'}, function(e){

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
                            { data: 'judul', className:"align-middle"},
                            { data: 'tgl', className:"align-middle text-center"},
                            { data: 'nominal', className:"align-middle text-right"},
                            { data: 'keterangan', className:"align-middle"}
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
            $.post('{{ route('master.import-satuan-kerja') }}', {_token: '{{csrf_token()}}'}, function(e){

                console.log(e)

            });
        }
        
    </script>
@endsection
