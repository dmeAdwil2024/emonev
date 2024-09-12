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
                    <div class="overlay" id="loader-content" style="display: none">
                        <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                    </div>

                    <div class="card-header">
                        <div class="row">
                            <div class="col-12 text-right">
                                <button class="btn btn-lg btn-success font-weight-bolder" onclick="synchSakti()">
                                    <i class="fas fa-sync"></i> &nbsp; Tarik Data Sakti
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data-pok" class="table text-xs table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:20%" class="align-middle text-center text-uppercase">Keterangan</th>
                                        <th style="width:20%" class="align-middle text-center text-uppercase">Status Bagren</th>
                                        <th style="width:20%" class="align-middle text-center text-uppercase">Status Keuangan</th>
                                        <th style="width:20%" class="align-middle text-center text-uppercase">Status KPA</th>
                                        <th style="width:20%" class="align-middle text-center text-uppercase">
                                            Status Keuangan <br>
                                            <small>[Distribusi POK]</small>
                                        </th>
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
            loadPok()
            $('#loader-datatable').show()

            $.post('{{ route('pok.jumlah-revisi') }}', {_token: '{{csrf_token()}}'}, function(e){

                $("#data").DataTable().destroy();

                $("#data").DataTable({
                    data: e,
                    paging: false,
                    lengthChange: false,
                    searching: false,
                    ordering: false,
                    info: false,
                    autoWidth: false,
                    responsive: false,
                    columns: [
                            { data: 'nama_dir', className:"align-middle"},
                            { data: 'jumlah_revisi', className:"text-center align-middle"}
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
            $('#loader-content').show()

            $.post('{{ route('sakti.synch-ref-sts') }}', {_token: '{{csrf_token()}}'}, function(e){

                $('#loader-content').hide()

            });
        }
        
    </script>
@endsection
