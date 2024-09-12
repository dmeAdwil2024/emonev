<!-- Main content -->
<section class="content" id="wrap-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="card card-outline card-primary">
                    <div class="overlay" id="loader-datatable" style="display: none">
                        <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                    </div>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-5">
                                <input type="month" class="form-control" id="bulan" value="{{date('Y-m')}}" onchange="loadSumPok()">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data" class="table text-xs table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:70%" class="align-middle text-center text-uppercase">Unit Kerja</th>
                                        <th style="width:30%" class="align-middle text-center text-uppercase">Jumlah Pengajuan Revisi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th style="width:70%" class="align-middle text-center text-uppercase">Total</th>
                                        <th style="width:30%" class="align-middle text-right text-uppercase">0</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card card-outline card-primary">
                    <div class="overlay" id="loader-pok" style="display: none">
                        <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data-pok" class="table text-xs table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:20%" class="align-middle text-center text-uppercase">Keterangan POK</th>
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

            <div class="col-md-4 col-xs-12">
                <input type="text" id="id_pok" style="display: none">
                @include('contents.pok.form-pejabat')

                <div class="card card-outline card-primary" id="history-penerbitan-pok" style="display: none">
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bolder">History Penerbitan POK</h1>
                    </div>
                    <div class="card-body">
                        <div class="wrap-history"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function openData()
    {
        loadPok()
        $('#loader-datatable').show()
        $("#data").DataTable().destroy();

        var table   = '#data';
        var bulan   = $('#bulan').val()

        $.post('{{ route('pok.jumlah-revisi') }}', {bulan, _token: '{{csrf_token()}}'}, function(e){

            $("#data")
                .DataTable({
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
                    footerCallback: function ( row, data, start, end, display ) {
                        var api = this.api(), data;

                        // Remove the formatting to get integer data for summation
                        var intVal = function ( i ) {
                            return typeof i === 'string' ?
                                i.replace(/[\$,]/g, '')*1 :
                                typeof i === 'number' ?
                                    i : 0;
                        };

                        var count_rows = $(table).DataTable().data().count()

                        total = api
                            .column( 1, { page: 'current'} )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                        // Update footer
                        $( api.column(1).footer() ).html(
                            total
                        );
                    }
                }).buttons().container().appendTo("#data_wrapper .col-md-6:eq(0)");

                $('#loader-datatable').hide()

            });

            // $("#data").DataTable({
            //     data: e,
            //     paging: false,
            //     lengthChange: false,
            //     searching: false,
            //     ordering: false,
            //     info: false,
            //     autoWidth: false,
            //     responsive: false,
            //     columns: [
            //             { data: 'nama_dir', className:"align-middle"},
            //             { data: 'jumlah_revisi', className:"text-center align-middle"}
            //     ],
            //     buttons: ["csv", "excel", "pdf", "print"],
            // })
            // .buttons()
            // .container()
            // .appendTo("#data_wrapper .col-md-6:eq(0)");

            // $('#loader-datatable').hide()
    }

    function loadSumPok()
    {
        var table   = '#data';
        var bulan   = $('#bulan').val()

        $('#loader-datatable').show()

        $.post('{{ route('pok.jumlah-revisi') }}', {bulan, _token: '{{csrf_token()}}'}, function(e){

            $("#data").DataTable().destroy();

            $("#data")
                .DataTable({
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
                    footerCallback: function ( row, data, start, end, display ) {
                        var api = this.api(), data;

                        // Remove the formatting to get integer data for summation
                        var intVal = function ( i ) {
                            return typeof i === 'string' ?
                                i.replace(/[\$,]/g, '')*1 :
                                typeof i === 'number' ?
                                    i : 0;
                        };

                        var count_rows = $(table).DataTable().data().count()

                        total = api
                            .column( 1, { page: 'current'} )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                        // Update footer
                        $( api.column(1).footer() ).html(
                            total
                        );
                    }
                }).buttons().container().appendTo("#data_wrapper .col-md-6:eq(0)");

                $('#loader-datatable').hide()

        });    
    }

    function loadPok()
    {
        $('#loader-pok').show()

        $.post('{{ route('pok.data-pok') }}', {_token: '{{csrf_token()}}'}, function(e){

            $("#data-pok").DataTable().destroy();

            $("#data-pok").DataTable({
                data: e,
                paging: true,
                lengthChange: false,
                searching: true,
                ordering: false,
                info: true,
                autoWidth: false,
                responsive: false,
                columns: [
                        { data: 'file_bagren', className:"align-middle"},
                        { data: 'status_bagren', className:"text-center align-middle"},
                        { data: 'status_keuangan', className:"text-center align-middle"},
                        { data: 'status_kpa', className:"text-center align-middle"},
                        { data: 'status_distribusi', className:"text-center align-middle"}
                ],
                buttons: ["csv", "excel", "pdf", "print"],
            })
            .buttons()
            .container()
            .appendTo("#data-pok_wrapper .col-md-6:eq(0)");

            $('#loader-pok').hide()

        });
    }

    function loadHistory(id)
    {
        $('#history-penerbitan-pok').show()
        $('.wrap-history').empty().load('{{route('pok.view-log')}}?id='+id)   
    }

    
</script>
