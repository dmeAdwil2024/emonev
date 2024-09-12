<!-- Main content -->
<section class="content" style="display:none" id="wrap-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <div class="overlay" id="loader-datatable" style="display: none">
                        <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                    </div>
                    <div class="card-header">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <select name="filter" id="filter" class="form-control" onchange="reload()">
                                    <option value="all">Semua Pengajuan</option>
                                    <option value="new">Pengajuan Baru</option>
                                    <option value="butuh perbaikan">Butuh Perbaikan</option>
                                    <option value="Perbaikan Disubmit">Perbaikan Disubmit</option>
                                    <option value="Selesai Diproses KPA">Selesai Diproses KPA</option>
                                    @if($kegiatan == "gwpp")
                                        <option value="Selesai Diproses Fasgub">Selesai Diproses Fasgub</option>
                                    @else
                                        <option value="Selesai Diproses SUBDIT BAN">Selesai Diproses SUBDIT BAN</option>
                                    @endif
                                    <option value="Disetujui Bagren">Disetujui Bagren</option>
                                    <option value="disetujui">Selesai Diproses</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="tahun" id="tahun" class="form-control" onchange="reload()">
                                    @php $tahun  = 2023; @endphp
                                    
                                    @for($i=0; $i<=5; $i++)
                                        <option value="{{$tahun}}" {{($tahun==date("Y")?"selected":"")}}>{{$tahun}}</option>

                                        @php $tahun++; @endphp
                                    @endfor
                                </select>
                            </div>
                            @if(Auth::user()->level == "2" || Auth::user()->level == "0")
                            <div class="col-md-3">
                                <button onclick="openForm()" class="btn btn-success btn-block font-weight-bolder" data-enable-remember="TRUE" data-no-transition-after-reload="TRUE"><i class="fas fa-plus-circle"></i>&nbsp; Buat Pengajuan Revisi</button>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:5%" class="align-middle text-center text-uppercase">#ID</th>
                                        <th style="width:5%" class="align-middle text-center text-uppercase">No. Surat</th>
                                        <th style="width:10%" class="align-middle text-center text-uppercase">Provinsi</th>
                                        <th style="width:10%" class="align-middle text-center text-uppercase">Satker</th>
                                        <th style="width:10%" class="align-middle text-center text-uppercase">Tahap 1 <br> (Pengajuan)</th>
                                        <th style="width:10%" class="align-middle text-center text-uppercase">Tahap 2 <br> (Verifikasi KPA)</th>
                                        <th style="width:10%" class="align-middle text-center text-uppercase">Tahap 3 <br> (Approval Bagren)</th>
                                        @if($kegiatan == "gwpp")
                                            <th style="width:10%" class="align-middle text-center text-uppercase">Tahap 4 <br> (Approval Fasgub)</th>
                                        @elseif($kegiatan == "sarpras")
                                            <th style="width:10%" class="align-middle text-center text-uppercase">Tahap 4 <br> (Approval SUBDIT BAN)</th>
                                        @endif
                                        <th style="width:15%" class="align-middle text-center text-uppercase">Progress</th>
                                        <th style="width:10%" class="align-middle text-center text-uppercase">Pengesahan Revisi</th>
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

<script>
    function reload()
    {
        var tahun   = $('#tahun').val()
        var status  = $('#filter').val()
        var type    = "{{$kegiatan}}"

        $('#loader-datatable').show()

        $.post('{{ route('ticketing.data-revisi') }}', {status, type, tahun, _token: '{{csrf_token()}}'}, function(e){

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
                        { data: 'id', className:"text-center align-middle"},
                        { data: 'keterangan_revisi', className:"align-middle"},
                        { data: 'nama_provinsi', className:"align-middle"},
                        { data: 'satker', className:"align-middle"},
                        { data: 'tahap1', className:"text-center align-middle"},
                        { data: 'tahap2_daerah', className:"text-center align-middle"},
                        { data: 'tahap4_daerah', className:"text-center align-middle"},
                        { data: 'tahap3_daerah', className:"text-center align-middle"},
                        { data: 'status_style', className:"text-center align-middle"},
                        { data: 'status_pengesahan', className:"text-center align-middle"}
                ],
                buttons: ["csv", "excel", "pdf", "print"],
            })
            .buttons()
            .container()
            .appendTo("#data_wrapper .col-md-6:eq(0)");

            $('#loader-datatable').hide()

        });
    }

    function openData(loading = true)
    {
        $('#wrap-data').show(700)
        $('#wrap-form').hide(700)
        $('#wrap-form-proses').hide(700)

        var tahun   = $('#tahun').val()
        var status = $('#filter').val()
        var type    = "{{$kegiatan}}"

        if(loading)
        {
            $('#loader-datatable').show()

            $.post('{{ route('ticketing.data-revisi') }}', {tahun, status, type, _token: '{{csrf_token()}}'}, function(e){

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
                            { data: 'id', className:"text-center align-middle"},
                            { data: 'keterangan_revisi', className:"align-middle"},
                            { data: 'nama_provinsi', className:"align-middle"},
                            { data: 'satker', className:"align-middle"},
                            { data: 'tahap1', className:"text-center align-middle"},
                            { data: 'tahap2_daerah', className:"text-center align-middle"},
                            { data: 'tahap4_daerah', className:"text-center align-middle"},
                            { data: 'tahap3_daerah', className:"text-center align-middle"},
                            { data: 'status_style', className:"text-center align-middle"},
                            { data: 'status_pengesahan', className:"text-center align-middle"}
                    ],
                    buttons: ["csv", "excel", "pdf", "print"],
                })
                .buttons()
                .container()
                .appendTo("#data_wrapper .col-md-6:eq(0)");

                $('#loader-datatable').hide()

            });
        }
    }

    function remove(id)
    {
        swal({
            title: "Hapus Data Ini?",
            text: "Data yang Dihapus Tidak Dapat Dipulihkan. Lanjutkan?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2b982b",
            confirmButtonText: "Ya, Lanjutkan!",
            closeOnConfirm: true
        }, function () {

            $.post('{{ route('ticketing.remove-revisi') }}', {id, _token: '{{csrf_token()}}'}, function(e){

                if(e.status == "success")
                {
                    Toast.fire({
                        icon: 'success',
                        title: e.title
                    })

                    reload()
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
