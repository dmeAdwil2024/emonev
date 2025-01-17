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
                                    <option value="ditolak">Pengajuan Ditolak</option>
                                    <option value="butuh perbaikan">Butuh Perbaikan</option>
                                    <option value="Perbaikan Disubmit">Perbaikan Disubmit</option>
                                    <option value="Selesai Diproses PPK">Selesai Diproses PPK</option>
                                    <option value="Selesai Diproses Bagren">Selesai Diproses Bagren</option>
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
                            @if(Auth::user()->level == "3" || Auth::user()->level == "0")
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
                                        <th style="width:20%" class="align-middle text-center text-uppercase">No. Surat</th>
                                        <th style="width:15%" class="align-middle text-center text-uppercase">Satker</th>
                                        <th style="width:15%" class="align-middle text-center text-uppercase">Tahap 1 <br> (Pengajuan)</th>
                                        <th style="width:15%" class="align-middle text-center text-uppercase">Tahap 2 <br> (Approval PPK)</th>
                                        <th style="width:15%" class="align-middle text-center text-uppercase">Tahap 3 <br> (Verifikasi Bagren)</th>
                                        <th style="width:15%" class="align-middle text-center text-uppercase">Progress</th>
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

        $('#loader-datatable').show()

        $.post('{{ route('ticketing.data-revisi') }}', {status, tahun, _token: '{{csrf_token()}}'}, function(e){

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
                        { data: 'nama_direktorat', className:"align-middle"},
                        { data: 'tahap1', className:"text-center align-middle"},
                        { data: 'tahap2', className:"text-center align-middle"},
                        { data: 'tahap3', className:"text-center align-middle"},
                        { data: 'status_style', className:"text-center align-middle"}
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
        var status  = $('#filter').val()

        if(loading)
        {
            $('#loader-datatable').show()

            $.post('{{ route('ticketing.data-revisi') }}', {status, tahun, _token: '{{csrf_token()}}'}, function(e){

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
                            { data: 'nama_direktorat', className:"align-middle"},
                            { data: 'tahap1', className:"text-center align-middle"},
                            { data: 'tahap2', className:"text-center align-middle"},
                            { data: 'tahap3', className:"text-center align-middle"},
                            { data: 'status_style', className:"text-center align-middle"}
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
