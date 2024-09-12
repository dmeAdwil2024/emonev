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
                                        <i class="fas fa-plus-circle"></i> &nbsp; Tambah Data Satker Eselon 1
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data" class="table text-xs table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%" class="text-center align-middle" rowspan="2">#</th>
                                            <th style="width: 30%" class="text-center align-middle" rowspan="2">NAMA SATKER DI EMONEV</th>
                                            <th style="width: 60%" class="text-center align-middle" colspan="3">SATKER KOMPONEN LINGKUP KEMENDAGRI</th>
                                        </tr>
                                        <tr>
                                            <th style="width: 20%" class="text-center">KODE SATKER</th>
                                            <th style="width: 20%" class="text-center">KODE TARIK SAKTI</th>
                                            <th style="width: 60%" class="text-center">NAMA SATKER</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_satker as $satker)
                                            <tr>
                                                <td class="align-middle text-center" rowspan="{{count($satker->subsatker)+1}}" class="text-center">
                                                    <button class="btn btn-warning" onclick="openFormUpdateSatker('{{$satker->id}}', '{{$satker->nama_satker}}')">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-danger" onclick="removeSatker('{{$satker->id}}', '{{$satker->nama_satker}}')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                                <td class="align-middle" rowspan="{{count($satker->subsatker)+1}}">{{$satker->nama_satker}}</td>
                                                @if(count($satker->subsatker) == 0)
                                                    <td class="text-center" colspan="3"><em>Belum Ada Data</em></td>
                                                @endif
                                            </tr>
                                            @if(count($satker->subsatker) > 0)
                                                @foreach($satker->subsatker as $subsatker)
                                                    <tr>
                                                        <td class="text-center">{{$subsatker->kode}}</td>
                                                        <td class="text-center">{{$subsatker->kode_sakti_pagu}}</td>
                                                        <td>{{$subsatker->nama_satker}}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modal-form-satker">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content" style="background-color: #001A3A; border-radius: 14px; padding: 10px">
                <div class="overlay" id="loader-form" style="display: none">
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
                            <div class="form-group row pb-5" style="border-bottom: 1px dashed;">
                                <label for="nama_satker_emonev" class="col-sm-4 col-form-label text-white">Nama Satker di Emonev</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_satker_emonev" id="nama_satker_emonev" class="bg-white form-control"/>
                                    <input type="text" name="id_satker_emonev" id="id_satker_emonev" style="display:none" value="none"/>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="form-group col-md-3">
                                    <label for="kode_satker" class="col-form-label text-white">Kode Satker</label>
                                    <input type="text" name="kode_satker" id="kode_satker" class="bg-white form-control">
                                    <input type="text" name="id_satker" id="id_satker" style="display:none">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="kode_sakti_pagu" class="col-form-label text-white">Kode Tarik Sakti</label>
                                    <input type="text" name="kode_sakti_pagu" id="kode_sakti_pagu" class="bg-white form-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="nama_satker" class="col-form-label text-white">Nama Satker</label>
                                    <div class="row">
                                        <div class="col-11">
                                            <input type="text" name="nama_satker" id="nama_satker" class="bg-white form-control">
                                        </div>
                                        <div class="col-1">
                                            <button class="btn btn-success" onclick="submitSatker()"> <i class="fas fa-save"></i> </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-12">
                                    <table style="width: 100%" id="data-subeselon1" class="table-responsive table text-xs table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 10%">#</th>
                                                <th class="text-center" style="width: 15%">Kode Satker</th>
                                                <th class="text-center" style="width: 15%">Kode Tarik Sakti</th>
                                                <th class="text-center" style="width: 60%">Nama Satker</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times-circle"></i> &nbsp; CLOSE
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
            // openData()
        });

        function submitForm()
        {
            $('#loader-form').show()

            var id_satker_emonev    = $('#id_satker_emonev').val()
            var nama_satker_emonev  = $('#nama_satker_emonev').val()

            if(nama_satker_emonev === "")
            {
                $('#loader-form').hide()

                swal({
                    title: "Nama Satker di Emonev Harus Terisi!",
                    text: "Form Belum Lengkap",
                    type: "warning"
                });
            }
            else
            {
                $.post('{{ route('master.submit-satker-emonev') }}', {nama_satker_emonev, id_satker_emonev, _token: '{{csrf_token()}}'}, function(e){

                    if(e.status == "success")
                    {
                        Toast.fire({
                            icon: 'success',
                            title: e.title
                        })

                        setTimeout(function() {
                            location.reload();
                        }, 3000);
                    }
                    else
                    {
                        $('#loader-form').hide()

                        Toast.fire({
                            icon: 'error',
                            title: e.message
                        })
                    }

                });
            }
        }

        function submitSatker()
        {
            $('#loader-form').show()

            var id_satker           = $('#id_satker').val()
            var kode_satker         = $('#kode_satker').val()
            var nama_satker         = $('#nama_satker').val()
            var kode_sakti_pagu     = $('#kode_sakti_pagu').val()
            var id_satker_emonev    = $('#id_satker_emonev').val()
            var nama_satker_emonev  = $('#nama_satker_emonev').val()
            
            if(nama_satker_emonev === "")
            {
                $('#loader-form').hide()

                swal({
                    title: "Nama Satker di Emonev Harus Terisi!",
                    text: "Form Belum Lengkap",
                    type: "warning"
                });
            }
            else
            {
                $.post('{{ route('master.submit-satker-eselon1') }}', {id_satker, kode_satker, nama_satker, kode_sakti_pagu, nama_satker_emonev, id_satker_emonev, _token: '{{csrf_token()}}'}, function(e){

                    if(e.status == "success")
                    {
                        Toast.fire({
                            icon: 'success',
                            title: e.title
                        })

                        loadEselon1(e.id_satker_emonev)
                        clearFormSubSatker()
                        $('#id_satker_emonev').val(e.id_satker_emonev)
                    }
                    else
                    {
                        $('#loader-form').hide()

                        Toast.fire({
                            icon: 'error',
                            title: e.message
                        })
                    }

                });
            }
        }
        
        function loadEselon1(id)
        {
            $.post('{{ route('master.satker-eselon1') }}', {id, _token: '{{csrf_token()}}'}, function(e){

                $("#data-subeselon1").DataTable().destroy();

                $("#data-subeselon1").DataTable({
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
                            { data: 'kode_sakti_pagu', className:"align-middle text-center"},
                            { data: 'nama_satker', className:"align-middle text-capitalize"}
                    ],
                    buttons: ["csv", "excel", "pdf", "print"],
                })
                .buttons()
                .container()
                .appendTo("#data-subeselon1_wrapper .col-md-6:eq(0)");

                $('#loader-form').hide()

            });
        }

        function removeSubSatker(id, id_satker_emonev)
        {
            swal({
                title: "Hapus Satker Ini?",
                text: "Data yang Sudah Diubah Tidak Dapat Dipulihkan. Lanjutkan?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#2b982b",
                confirmButtonText: "Ya, Lanjutkan!",
                closeOnConfirm: true
            }, function () {

                $('#loader-form').show()

                $.post('{{ route('master.destroy-satker-eselon1') }}', {id, _token: '{{csrf_token()}}'}, function(e){

                    if(e.status == "success")
                    {
                        Toast.fire({
                            icon: 'success',
                            title: e.title
                        })

                        loadEselon1(id_satker_emonev)
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

        function fillSubSatker(id, kode, kode_sakti_pagu, nama_satker)
        {
            $('#id_satker').val(id)
            $('#kode_satker').val(kode)
            $('#nama_satker').val(nama_satker)
            $('#kode_sakti_pagu').val(kode_sakti_pagu)
        }

        function openFormSatker()
        {
            clearFormSubSatker()
            $('#id_satker_emonev').val("none")
            $('#modal-form-satker').modal('show')
        }

        function clearFormSubSatker()
        {
            $('#id_satker').val("none")
            $('#kode_satker').val("")
            $('#nama_satker').val("")
            $('#kode_sakti_pagu').val("")
        }

        function openFormUpdateSatker(id, nama_satker)
        {
            $('#loader-form').show()

            loadEselon1(id)
            $('#id_satker_emonev').val(id)
            $('#modal-form-satker').modal('show')
            $('#nama_satker_emonev').val(nama_satker)
        }

        function removeSatker(id)
        {
            swal({
                title: "Hapus Satker Ini?",
                text: "Data yang Sudah Diubah Tidak Dapat Dipulihkan. Lanjutkan?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#2b982b",
                confirmButtonText: "Ya, Lanjutkan!",
                closeOnConfirm: true
            }, function () {

                $('#loader-form').show()

                $.post('{{ route('master.destroy-satker-emonev') }}', {id, _token: '{{csrf_token()}}'}, function(e){

                    if(e.status == "success")
                    {
                        Toast.fire({
                            icon: 'success',
                            title: e.title
                        })

                        setTimeout(function() {
                            location.reload();
                        }, 3000);
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
        
    </script>
@endsection
