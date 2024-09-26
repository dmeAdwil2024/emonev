@extends('layouts.caput')

@section('contents')
    <div class="main">
        <div class="topbar">
            <div class="toggle col-md-1" id="menuNav">
                <a href="#menuNav">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
            <div class="col-md-8 d-flex logo-admin">
                <img src="{{ asset('newdashboard/images/logo-emonev.png') }}" alt="logo emonev"
                    class="img-fluid margin-auto logo-smaller">
                <div class="text-center">
                    <h1 class="title">E-MONEV</h1>
                    <h2 class="subtitle">DITJEN BINA ADMINISTRASI KEWILAYAHAN</h2>
                </div>
            </div>
            <div class="avatar col-md-3 p-2 d-flex">
                <img src="{{ asset('newdashboard/images/user-avatar.png') }}" alt=""
                    class="img-fluid avatar-img me-2">
                <div class="avatar-name small fw-bold">
                    Selamat Datang Admin,<br>
                    Bagian Perencanaan
                </div>
            </div>
        </div>
        <div class="row">
            <div class="font-tebala col-sm-6" style="background-color:#ebebeb;">
                {{ $current }}
            </div>
            <div class="col-md-6 font-tebala" style="background-color:#ebebeb; text-align: right">
                <a href="#">{{ $modul }}</a>
                {{ $current }}
            </div>
        </div>
        <div style="height:10px"></div>
        @include('contents.pok.data')
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            openData()
            checkStatusKabagkeu()
        });
    </script>
    <script>
        function openData() {
            loadPok()
            $('#loader-datatable').show()
            $("#data").DataTable().destroy();

            var table = '#data';
            var bulan = $('#bulan').val()

            $.post('{{ route('pok.jumlah-revisi') }}', {
                bulan,
                _token: '{{ csrf_token() }}'
            }, function(e) {

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
                        columns: [{
                                data: 'nama_dir',
                                className: "align-middle"
                            },
                            {
                                data: 'jumlah_revisi',
                                className: "text-center align-middle"
                            }
                        ],
                        buttons: ["csv", "excel", "pdf", "print"],
                        footerCallback: function(row, data, start, end, display) {
                            var api = this.api(),
                                data;

                            // Remove the formatting to get integer data for summation
                            var intVal = function(i) {
                                return typeof i === 'string' ?
                                    i.replace(/[\$,]/g, '') * 1 :
                                    typeof i === 'number' ?
                                    i : 0;
                            };

                            var count_rows = $(table).DataTable().data().count()

                            total = api
                                .column(1, {
                                    page: 'current'
                                })
                                .data()
                                .reduce(function(a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0);

                            // Update footer
                            $(api.column(1).footer()).html(
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

        function loadSumPok() {
            var table = '#data';
            var bulan = $('#bulan').val()

            $('#loader-datatable').show()

            $.post('{{ route('pok.jumlah-revisi') }}', {
                bulan,
                _token: '{{ csrf_token() }}'
            }, function(e) {

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
                        columns: [{
                                data: 'nama_dir',
                                className: "align-middle"
                            },
                            {
                                data: 'jumlah_revisi',
                                className: "text-center align-middle"
                            }
                        ],
                        buttons: ["csv", "excel", "pdf", "print"],
                        footerCallback: function(row, data, start, end, display) {
                            var api = this.api(),
                                data;

                            // Remove the formatting to get integer data for summation
                            var intVal = function(i) {
                                return typeof i === 'string' ?
                                    i.replace(/[\$,]/g, '') * 1 :
                                    typeof i === 'number' ?
                                    i : 0;
                            };

                            var count_rows = $(table).DataTable().data().count()

                            total = api
                                .column(1, {
                                    page: 'current'
                                })
                                .data()
                                .reduce(function(a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0);

                            // Update footer
                            $(api.column(1).footer()).html(
                                total
                            );
                        }
                    }).buttons().container().appendTo("#data_wrapper .col-md-6:eq(0)");

                $('#loader-datatable').hide()

            });
        }

        function loadPok() {
            $('#loader-pok').show()

            $.post('{{ route('pok.data-pok') }}', {
                _token: '{{ csrf_token() }}'
            }, function(e) {

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
                        columns: [{
                                data: 'file_bagren',
                                className: "align-middle"
                            },
                            {
                                data: 'status_bagren',
                                className: "text-center align-middle"
                            },
                            {
                                data: 'status_keuangan',
                                className: "text-center align-middle"
                            },
                            {
                                data: 'status_kpa',
                                className: "text-center align-middle"
                            },
                            {
                                data: 'status_distribusi',
                                className: "text-center align-middle"
                            }
                        ],
                        buttons: ["csv", "excel", "pdf", "print"],
                    })
                    .buttons()
                    .container()
                    .appendTo("#data-pok_wrapper .col-md-6:eq(0)");

                $('#loader-pok').hide()

            });
        }

        function loadHistory(id) {
            $('#history-penerbitan-pok').show()
            $('.wrap-history').empty().load('{{ route('pok.view-log') }}?id=' + id)
        }
    </script>
@endsection
