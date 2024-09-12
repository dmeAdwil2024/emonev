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
                                <button class="btn btn-lg btn-success font-weight-bolder" onclick="synchSakti()">
                                    <i class="fas fa-sync"></i> &nbsp; Sinkronisasi Data Realisasi Sakti
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data" class="table text-xs table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:10%" class="align-middle text-center text-uppercase">Kode Akun</th>
                                        <th style="width:10%" class="align-middle text-center text-uppercase">Kode Item</th>
                                        <th style="width:10%" class="align-middle text-center text-uppercase">Tanggal SP2D</th>
                                        <th style="width:15%" class="align-middle text-center text-uppercase">Kode COA</th>
                                        <th style="width:45%" class="align-middle text-center text-uppercase">Uraian</th>
                                        <th style="width:10%" class="align-middle text-center text-uppercase">Nilai</th>
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

@endsection

@section('js')
    <script>
        $(function () {
            openData()
        });
        
        function openData()
        {
            $('#loader-datatable').show()

            $.post('{{ route('sakti.data-realisasi') }}', {_token: '{{csrf_token()}}'}, function(e){

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
                            { data: 'kode_akun', className:"align-middle text-center"},
                            { data: 'kode_item', className:"align-middle text-center"},
                            { data: 'tgl_sp2d', className:"align-middle text-center"},
                            { data: 'kode_coa', className:"align-middle"},
                            { data: 'uraian', className:"align-middle"},
                            { data: 'nilai_rupiah_format', className:"align-middle text-right"}
                    ],
                    buttons: ["csv", "excel", "pdf", "print"],
                })
                .buttons()
                .container()
                .appendTo("#data_wrapper .col-md-6:eq(0)");

                $('#loader-datatable').hide()

            });
        }

        function synchSakti()
        {
            $('#loader-datatable').show()

            $.post('{{ route('sakti.synch-realisasi') }}', {_token: '{{csrf_token()}}'}, function(e){

                openData()
                $('#loader-datatable').hide()

            });
        }
        
    </script>
@endsection
