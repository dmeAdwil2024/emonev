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
        {{-- <div class="row"> --}}
        <h3>PUSAT</h3>
        <div class="row">
            <div class="col-lg-12">
                <div id="customerList">
                    <div class="col-sm-auto mb-3">
                        <input class="form-control flatpickr-input" id="q"
                            value="{{ App\TicketRevisi::STATUS_NEW }}" hidden>
                        <button id="all_filter" type="button"
                            class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                            Semua
                        </button>
                        <button id="baru_filter" type="button"
                            class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                            Baru
                        </button>
                        <button id="perbaikan_filter" type="button"
                            class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                            Perbaikan
                        </button>
                        <button id="fix_filter" type="button"
                            class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                            Fix
                        </button>
                        <button id="ppk_filter" type="button"
                            class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                            Disetujui PPK
                        </button>
                        <button id="bagren_filter" type="button"
                            class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                            Disetujui BAGREN
                        </button>
                        <button id="ditolak_filter" type="button"
                            class="btn px-4 mx-1 bg-animation waves-effect waves-light rounded-5">
                            Tolak
                        </button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table id="dataTable" class="table table-striped table-bordered table-sm no-wrap"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Surat</th>
                                        <th>Tahap 1 (Pengajuan)</th>
                                        <th>Tahap 2 (Approval PPK)</th>
                                        <th>Tahap 3 (Verifikasi Bagren)</th>
                                        <th>Progress</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal fade fadeInUp" id="exampleModalgrid" tabindex="-1"
                    aria-labelledby="exampleModalgridLabel" data-bs-backdrop="static" aria-modal="true" role="dialog"
                    style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content" id="modal_content">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade fadeInUp" id="exampleModalgrid-dialog" tabindex="-1"
                aria-labelledby="exampleModalgridLabel" aria-modal="true" role="dialog" style="display: none;">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content" id="modal_content-dialog">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(function() {
            var table = $('#dataTable').DataTable({
                dom: 'lrtip',
                processing: true,
                stateSave: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('ticketing.datatable_etiketing_pusat') }}",
                    data: function(d) {
                        d.q = $('#q').val(),
                            d.cari_nama = $('#cari_nama').val(),
                            d.cari_jasa = $('#cari_jasa').val(),
                            d.cari_kategori = $('#cari_kategori').val(),
                            d.cari_subkategori = $('#cari_subkategori').val(),
                            d.cari_subclasskategori = $('#cari_subclasskategori').val()
                    }
                },
                columns: [{
                    data: "id",
                    sortable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                }, {
                    data: 'nomor_surat',
                    name: 'Nomor Surat',
                    render: function(data, type, row, meta) {
                        return `<button type="button" class="btn btn-link" onclick="openDetail(${row.id})">${row.nomor_surat} <small> ${row.perihal} </small></button>`;
                    }
                }, {
                    data: 'tahap1',
                    name: 'Tanggal Surat'
                }, {
                    data: 'tahap2',
                    name: 'Provinsi'
                }, {
                    data: 'tahap3',
                    name: 'Satker'
                }, {
                    data: 'status',
                    name: 'Jenis Revisi'
                }],
                drawCallback: function(settings) {
                    $.ajax({
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('ticketing.model_header_etiketing_pusat') }}",
                        data: {
                            tanggal: $('#tanggal').val(),
                            cari_nama: $('#cari_nama').val(),
                            cari_jasa: $('#cari_jasa').val(),
                            cari_kategori: $('#cari_kategori').val(),
                            cari_subkategori: $('#cari_subkategori').val(),
                            cari_subclasskategori: $('#cari_subclasskategori').val(),
                            q_all: '{{ App\TicketRevisi::STATUS_SEMUA }}',
                            q_new: '{{ App\TicketRevisi::STATUS_NEW }}',
                            q_revisi: '{{ App\TicketRevisi::STATUS_BUTUH_PERBAIKAN }}',
                            q_revisi_selesai: '{{ App\TicketRevisi::STATUS_PERBAIKAN_DISUBMIT }}',
                            q_ppk: '{{ App\TicketRevisi::STATUS_SELESAI_DIPROSES_PPK }}',
                            q_bagren: '{{ App\TicketRevisi::STATUS_SELESAI_DIPROSES_BAGREN }}',
                            q_tolak: '{{ App\TicketRevisi::STATUS_TOLAK }}',
                        },
                        success: function(response) {
                            $('#all_filter').text(`Semua (${response.data.all})`);
                            $('#baru_filter').text(`Baru (${response.data.new})`);
                            $('#perbaikan_filter').text(
                                `Perbaikan (${response.data.perbaikan})`);
                            $('#fix_filter').text(`Fix (${response.data.sudah_perbaikan})`);
                            $('#ppk_filter').text(
                                `Disetujui PPK (${response.data.ppk})`);
                            $('#bagren_filter').text(
                                `Disetujui BAGREN (${response.data.bagren})`);
                            $('#ditolak_filter').text(`Tolak (${response.data.ditolak})`);
                        }
                    });
                }
            });

            $('#all_filter').click(function() {
                $('#q').val('{{ App\TicketRevisi::STATUS_SEMUA }}')
                resetWarna()
                $('#all_filter').css({
                    'color': '#f7f6fb',
                    'border-color': '#4E36E2',
                    'background-color': '#4E36E2'
                })
                table.draw();
            });

            $('#baru_filter').click(function() {
                $('#q').val('{{ App\TicketRevisi::STATUS_NEW }}')
                resetWarna()
                $('#baru_filter').css({
                    'color': '#f7f6fb',
                    'border-color': '#4E36E2',
                    'background-color': '#4E36E2'
                })
                table.draw();
            });

            $('#perbaikan_filter').click(function() {
                $('#q').val('{{ App\TicketRevisi::STATUS_BUTUH_PERBAIKAN }}')
                resetWarna()
                $('#perbaikan_filter').css({
                    'color': '#f7f6fb',
                    'border-color': '#4E36E2',
                    'background-color': '#4E36E2'
                })
                table.draw();
            });

            $('#fix_filter').click(function() {
                $('#q').val('{{ App\TicketRevisi::STATUS_PERBAIKAN_DISUBMIT }}')
                resetWarna()
                $('#fix_filter').css({
                    'color': '#f7f6fb',
                    'border-color': '#4E36E2',
                    'background-color': '#4E36E2'
                })
                table.draw();
            });

            $('#ppk_filter').click(function() {
                $('#q').val('{{ App\TicketRevisi::STATUS_SELESAI_DIPROSES_PPK }}')
                resetWarna()
                $('#ppk_filter').css({
                    'color': '#f7f6fb',
                    'border-color': '#4E36E2',
                    'background-color': '#4E36E2'
                })
                table.draw();
            });

            $('#bagren_filter').click(function() {
                $('#q').val('{{ App\TicketRevisi::STATUS_SELESAI_DIPROSES_BAGREN }}')
                resetWarna()
                $('#bagren_filter').css({
                    'color': '#f7f6fb',
                    'border-color': '#4E36E2',
                    'background-color': '#4E36E2'
                })
                table.draw();
            });

            $('#ditolak_filter').click(function() {
                $('#q').val('{{ App\TicketRevisi::STATUS_TOLAK }}')
                resetWarna()
                $('#ditolak_filter').css({
                    'color': '#f7f6fb',
                    'border-color': '#4E36E2',
                    'background-color': '#4E36E2'
                })
                table.draw();
            });

            $('#cari_nama').keyup(function() {
                table.draw();
            });

            $('#cari_jasa').keyup(function() {
                table.draw();
            });
            $('#cari_kategori').change(function() {
                table.draw();
            });

            $('#cari_subkategori').change(function() {
                table.draw();
            });

            $('#cari_subclasskategori').change(function() {
                table.draw();
            });

            $('#cari_assign').change(function() {
                table.draw();
            });

            function resetWarna() {
                $('#all_filter').css({
                    'color': '#828282',
                    'background-color': '#ffffff',
                    'border-color': '#E0E0E0'
                })
                $('#baru_filter').css({
                    'color': '#828282',
                    'background-color': '#ffffff',
                    'border-color': '#E0E0E0'
                })
                $('#perbaikan_filter').css({
                    'color': '#828282',
                    'background-color': '#ffffff',
                    'border-color': '#E0E0E0'
                })
                $('#fix_filter').css({
                    'color': '#828282',
                    'background-color': '#ffffff',
                    'border-color': '#E0E0E0'
                })
                $('#ppk_filter').css({
                    'color': '#828282',
                    'background-color': '#ffffff',
                    'border-color': '#E0E0E0'
                })
                $('#bagren_filter').css({
                    'color': '#828282',
                    'background-color': '#ffffff',
                    'border-color': '#E0E0E0'
                })
                $('#ditolak_filter').css({
                    'color': '#828282',
                    'background-color': '#ffffff',
                    'border-color': '#E0E0E0'
                })
            }

            resetWarna()
            $('#baru_filter').css({
                'color': '#f7f6fb',
                'border-color': '#4E36E2',
                'background-color': '#4E36E2'
            })


        });
    </script>
@endsection
