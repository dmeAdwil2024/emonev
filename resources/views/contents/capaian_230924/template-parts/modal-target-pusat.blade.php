<div class="modal fade" id="modal-input-target-pusat">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white">Input Target Capaian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kode_target_pusat">Kode</label>
                            <input type="text" class="form-control" id="kode_target_pusat" name="kode_target_pusat" disabled/>
                        </div>
                        <!-- <div class="form-group">
                            <label for="deadline_target_pusat">Batas Akhir</label>
                            <input type="date" class="form-control" id="deadline_target_pusat" name="deadline_target_pusat"/>
                        </div> -->
                        <div class="form-group row">
                            <div class="col-8">
                                <label for="bulan_target_pusat">Bulan</label>
                                <select class="form-control" id="bulan_target_pusat" name="bulan_target_pusat">
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="tahun_target_pusat">Tahun</label>
                                <select class="form-control" id="tahun_target_pusat" name="tahun_target_pusat" disabled>
                                    @php $tahun = date("Y", strtotime("-1 Years")) @endphp
                                    @for($i=0; $i<=5; $i++)
                                        <option value="{{$tahun}}" @php if($tahun == date("Y")){ echo "selected";} @endphp>{{$tahun}}</option>
                                        @php $tahun++; @endphp
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="target_target_pusat">Target</label>
                                    <input type="text" class="form-control text-uppercase" id="target_target_pusat" name="target_target_pusat"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="satuan_realisasi_target_pusat">Satuan</label>
                                    <input type="text" class="form-control text-uppercase" id="satuan_realisasi_target_pusat" name="satuan_realisasi_target_pusat"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> &nbsp; CANCEL</button>
                <button type="button" onclick="submitTargetPusat()" class="btn btn-success"><i class="fas fa-save"></i> &nbsp; SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    function submitTargetPusat()
    {
        var type                    = $('#type_target').val()
        var kode                    = $('#kode_target_pusat').val()
        var bulan                   = $('#bulan_target_pusat').val()
        var tahun                   = $('#tahun_target_pusat').val()
        var target                  = $('#target_target_pusat').val()
        // var deadline                = $('#deadline_target_pusat').val()
        var realisasi               = $('#realisasi_target').val()
        var satuan_realisasi_target = $('#satuan_realisasi_target_pusat').val()

        var kode_dir      = $('#direktorat').combobox('getValue')
        var kode_subdir   = $('#subdit').combobox('getValue')

        var form_data = new FormData();

        form_data.append('type', type);
        form_data.append('kode', kode);
        form_data.append('bulan', bulan);
        form_data.append('tahun', tahun);
        form_data.append('target', target);
        // form_data.append('deadline', deadline);
        form_data.append('satuan_realisasi_target_pusat', satuan_realisasi_target_pusat);
        form_data.append('kode_dir', kode_dir);
        form_data.append('kode_subdir', kode_subdir);

        form_data.append('_token', '{{csrf_token()}}')

        $('#data-capaian').treegrid('loading');

        $.ajax({
            url: "{{route('capaian.submit-target')}}",
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
                    clearFormTargetPusat()
                    $("#modal-input-target-pusat").modal("hide")
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

    function clearFormTargetPusat()
    {
        $('#kode_target_pusat').val("")
        $('#bulan_target_pusat').val("")
        $('#target_target_pusat').val("")
    }
</script>