<div class="modal fade" id="modal-input-upload">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white">Upload Evidence</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="type_upload">Tipe</label>
                            <input type="text" class="form-control text-uppercase" id="type_upload" name="type_upload" disabled/>
                        </div>
                        <div class="form-group">
                            <label for="kode_upload">Kode</label>
                            <input type="text" class="form-control" id="kode_upload" name="kode_upload" disabled/>
                        </div>
                        <div class="form-group row">
                            <div class="col-8">
                                <label for="bulan_upload">Bulan Ke</label>
                                <input type="text" class="form-control" id="bulan_upload" name="bulan_upload" disabled>
                            </div>
                            <div class="col-4">
                                <label for="tahun_upload">Tahun</label>
                                <input type="tahun" class="form-control" id="tahun_upload" name="tahun_upload" value="{{date('Y')}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="evidence">Upload Evidence <small>(Maksimal 2MB)</small></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="evidence">
                                    <label class="custom-file-label" for="evidence">Pilih File</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> &nbsp; CANCEL</button>
                <button type="button" onclick="uploadEvidence()" class="btn btn-success"><i class="fas fa-save"></i> &nbsp; SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    function uploadEvidence()
    {
        var kode        = $("#kode_upload").val()
        var bulan       = $("#bulan_upload").val()
        var tahun       = $("#tahun_upload").val()
        var evidence    = $('#evidence').prop('files')[0];

        var triwulan      = $('#triwulan').combobox('getValue')
        var kode_dir      = $('#direktorat').combobox('getValue')
        var kode_subdir   = $('#subdit').combobox('getValue')

        var form_data = new FormData();

        form_data.append('kode', kode);
        form_data.append('bulan', bulan);
        form_data.append('tahun', tahun);
        form_data.append('triwulan', triwulan);
        form_data.append('kode_dir', kode_dir);
        form_data.append('kode_subdir', kode_subdir);

        form_data.append('evidence', evidence);
        form_data.append('_token', '{{csrf_token()}}')

        $.ajax({
        url: "{{route('capaian.upload-evidence')}}",
        type: "POST",
        data: form_data,
        cache: false,
        processData: false,
        contentType: false,
        success: function (e)
        {
            if(e.status == "success")
            {
                Toast.fire({
                    icon: 'success',
                    title: e.title
                })

                loadData()
                $('#modal-input-upload').modal('hide')
            }
            else
            {
                Toast.fire({
                    icon: 'error',
                    title: e
                })
            }
        }});
    }
</script>