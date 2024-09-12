<!-- Main content -->
<section class="content" style="display:none" id="wrap-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <div class="overlay" id="loader-datatable" style="display: none">
                        <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                    </div>
                    @if(Auth::user()->level == "5")
                        <div class="card-header">
                            <button class="btn btn-success float-right btn-block" onclick="openModalUpload()"> <i class="fas fa-upload"></i> &nbsp; UPLOAD NOTA DINAS PENGANTAR</button>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="data" class="table text-xs table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:15%" class="align-middle text-center text-uppercase">#ID</th>
                                        <th style="width:30%" class="align-middle text-center text-uppercase">No. Surat</th>
                                        <th style="width:15%" class="align-middle text-center text-uppercase">Tahap 1 <br> (KABAGREN)</th>
                                        <th style="width:15%" class="align-middle text-center text-uppercase">Tahap 2 <br> (KABAGKEUANGAN)</th>
                                        <th style="width:15%" class="align-middle text-center text-uppercase">Tahap 3 <br> (KPA)</th>
                                        <th style="width:10%" class="align-middle text-center text-uppercase">Progress</th>
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

<div class="modal fade" id="modal-upload-nota-pengantar-bagren" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="overlay" id="loader-modal-bagren" style="display: none">
                <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
            </div>
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-0">
                <div class="form-group">
                    <label for="direktorat">Direktorat</label>
                    <select class="form-control" style="width: 100%;" id="direktorat_upload" name="direktorat_upload"></select>
                </div>
                <div class="form-group">
                    <label for="kak">File Nota Pengantar</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="nota_pengantar_kabagren">
                            <label class="custom-file-label" for="nota_pengantar_kabagren">Pilih File</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" style="margin: 2px" class="btn btn-danger shadow" class="close" data-dismiss="modal"> <i class="fas fa-times-circle"></i> &nbsp; Cancel</button>
                <button type="button" style="margin: 2px" class="btn btn-success shadow" onclick="uploadNotaDinasBagren()"> <i class="fas fa-upload"></i> &nbsp; Upload</button>
            </div>
        </div>
    </div>
</div>

<script>
    function reload()
    {
        var status = "all"

        $('#loader-datatable').show()

        $.post('{{ route('pok.data-revisi') }}', {status, _token: '{{csrf_token()}}'}, function(e){

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
                        { data: 'keterangan_revisi', className:"text-center align-middle"},
                        { data: 'tahap1', className:"text-center align-middle"},
                        { data: 'tahap2', className:"text-center align-middle"},
                        { data: 'tahap3', className:"text-center align-middle"},
                        { data: 'status', className: "text-center align-middle"}
                ],
                buttons: ["csv", "excel", "pdf", "print"],
            })
            .buttons()
            .container()
            .appendTo("#data_wrapper .col-md-6:eq(0)");

            $('#loader-datatable').hide()

        });
    }

    function openData()
    {
        $('#wrap-data').show(700)
        $('#wrap-form').hide(700)
        $('#wrap-form-proses').hide(700)

        var status = "all"

        $('#loader-datatable').show()

        $.post('{{ route('pok.data-revisi') }}', {status, _token: '{{csrf_token()}}'}, function(e){

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
                        { data: 'tahap1', className:"text-center align-middle"},
                        { data: 'tahap2', className:"text-center align-middle"},
                        { data: 'tahap3', className:"text-center align-middle"},
                        { data: 'status_style', className: "text-center align-middle"}
                ],
                buttons: ["csv", "excel", "pdf", "print"],
            })
            .buttons()
            .container()
            .appendTo("#data_wrapper .col-md-6:eq(0)");

            $('#loader-datatable').hide()

        });
    }

    function uploadNotaDinasBagren()
    {
        $('#loader-modal-bagren').show()

        var direktorat              = $('#direktorat_upload').val()
        var nota_pengantar_kabagren = $('#nota_pengantar_kabagren').prop('files')[0];

        var form_data = new FormData();

        form_data.append('direktorat', direktorat);
        form_data.append('_token', '{{csrf_token()}}')
        form_data.append('nota_pengantar_kabagren', nota_pengantar_kabagren);

        $.ajax({
            url: "{{route('tools.upload-master-dokumen')}}",
            type: "POST",
            data: form_data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (e)
            {
                location.reload()
            }
        });
    }

    function loadDirektoratUpload()
    {
        $('#loader-modal-bagren').show()
        $('#direktorat_upload').select2()
        $('#direktorat_upload').empty()
        $('#direktorat_upload').select2('destroy')

        $.post('{{ route('tools.direktorat') }}', { _token: '{{csrf_token()}}'}, function(e){

            $("#direktorat_upload").select2({
                data: e,
                theme: 'bootstrap4'
            })

            $('#loader-modal-bagren').hide()
        });
    }

    function openModalUpload()
    {
        $('#modal-upload-nota-pengantar-bagren').modal('show')
        loadDirektoratUpload()
    }
</script>
