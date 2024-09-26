<div class="modal fade" id="modal-input-target">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white">Input Capaian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="type_target">Tipe</label>
                            <input type="text" class="form-control text-uppercase" id="type_target" name="type_target" disabled/>
                        </div>
                        <div class="form-group">
                            <label for="kode_target">Kode</label>
                            <input type="text" class="form-control" id="kode_target" name="kode_target" disabled/>
                        </div>
                        <div class="form-group row">
                            <div class="col-8">
                                <label for="bulan_target">Bulan</label>
                                <select class="form-control" id="bulan_target" name="bulan_target">
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
                                <label for="tahun_target">Tahun</label>
                                <select class="form-control" id="tahun_target" name="tahun_target">
                                    @php $tahun = date("Y", strtotime("-1 Years")) @endphp
                                    @for($i=0; $i<=5; $i++)
                                        <option value="{{$tahun}}" @php if($tahun == date("Y")){ echo "selected";} @endphp>{{$tahun}}</option>
                                        @php $tahun++; @endphp
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="target_target">Target</label>
                            <div class="input-group mb-3">
                                <input id="target_target" name="target_target" type="text" disabled class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">Rekomendasi</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="realisasi_target">Realisasi</label>
                                    <input type="text" class="form-control text-uppercase" id="realisasi_target" name="realisasi_target"/>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="satuan_realisasi_target">Satuan Realisasi Target</label>
                                    <input type="text" class="form-control text-uppercase" id="satuan_realisasi_target" name="satuan_realisasi_target"/>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="persen_kinerja">Persen Kinerja</label>
                                    <div class="input-group mb-3">
                                        <input id="persen_kinerja" name="persen_kinerja" type="text" disabled class="form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="realisasi_target">Realisasi Target</label>
                            <div class="input-group mb-3">
                                <input id="realisasi_target" name="realisasi_target" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">Rekomendasi</span>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-group d-none">
                            <label for="pemanfaatan_target">Pemanfaatan</label>
                            <select class="form-control" id="pemanfaatan_target" name="pemanfaatan_target">
                                <option value="Perencanaan (0% - 10%)">Perencanaan (0% - 10%)</option>
                                <option value="Persiapan (11% - 25%)">Persiapan (11% - 25%)</option>
                                <option value="Pelaksanaan (26% - 99%)">Pelaksanaan (26% - 99%)</option>
                                <option value="Selesai (100%)">Selesai (100%)</option>
                            </select>
                        </div>
                        <div class="form-group d-none">
                            <label for="status_pemanfaatan_target">Status Pemanfaatan</label>
                            <select class="form-control" id="status_pemanfaatan_target" name="status_pemanfaatan_target">
                                <option value="1">Sudah Dimanfaatkan</option>
                                <option value="0">Belum Dimanfaatkan</option>
                            </select>
                        </div>
                        <div class="row" style="margin: 35px 0px; border: 1px solid #9b9b9b; border-radius: 4px; padding: 8px">
                            <div class="d-none form-group col-md-6 col-sm-12">
                                <label for="pertanyaan_target">Pertanyaan</label>
                                <textarea class="form-control" id="pertanyaan_target" name="pertanyaan_target"></textarea>
                            </div>
                            <div class="d-none form-group col-md-6 col-sm-12">
                                <label for="jawaban_target">Jawaban</label>
                                <textarea class="form-control" id="jawaban_target" name="jawaban_target"></textarea>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="jawaban_target">Evidence <small>(Maksimal 2MB)</small></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="evidence_target" onchange="getFileData(this);">
                                        <label class="custom-file-label" for="evidence_target">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-10">
                                <div id="evidence-info" class="d-none">
                                    File terpilih untuk diunggah: <span class="text-danger" id="evidence-willbe"></span>.  Klik <span class="text-success">icon save</span> untuk mulai mengunggah.
                                    <p class="text-info">Nama file akan direname setelah diunggah.</p>
                                </div>
                            </div>
                            <div class="form-group col-sm-2 text-right">
                                <button class="btn btn-success" onclick="addFormTarget()"> <i class="font-weight-bolder fas fa-save"></i> </button>
                            </div>
                        </div>
                        <div class="form-group row" style="display:none" id="wrap-table-form-target">
                            <div class="col-12">
                                <table class="table table-bordered w-100" id="table-form-target">
                                    <thead>
                                        <tr>
                                            <!-- <th style="30%" class="d-none text-center">Pertanyaan</th>
                                            <th style="30%" class="d-none text-center">Jawaban</th> -->
                                            <th style="90%" class="text-center">Evidence <small>(Total Maksimal 2MB)</small></th>
                                            <th style="10%" class="text-center"></th>
                                        </tr>
                                    <!-- </thead>
                                    <tbody id="form_target">
                                        <tr>
                                            <td style="30%">
                                                <textarea class="form-control" id="pertanyaan_target" name="pertanyaan_target"></textarea>
                                            </td>
                                            <td style="30%">
                                                <textarea class="form-control" id="jawaban_target" name="jawaban_target"></textarea>
                                            </td>
                                            <td style="25%">
                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="evidence_target">
                                                </div>
                                            </td>
                                            <td style="15%">
                                                <button class="btn btn-success" onclick="addFormTarget()"> <i class="font-weight-bolder fas fa-plus-circle"></i> </button>
                                            </td>
                                        </tr>
                                    </tbody> -->
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan_target">Keterangan Tambahan</label>
                            <textarea name="keterangan_target" id="keterangan_target" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="kendala_target">Kendala</label>
                            <textarea name="kendala_target" id="kendala_target" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tinjut_target">Tindak Lanjut</label>
                            <textarea name="tinjut_target" id="tinjut_target" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> &nbsp; CANCEL</button>
                <button type="button" onclick="submitTarget()" class="btn btn-success"><i class="fas fa-save"></i> &nbsp; SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    function getFileData(myFile){
        var file = myFile.files[0];  
        var filename = file.name;
        $("#evidence-willbe").html('').html(filename);
        $('#evidence-info').removeClass('d-none');
    }
    function submitTarget()
    {
        var type                = $('#type_target').val()
        var kode                = $('#kode_target').val()
        var bulan               = $('#bulan_target').val()
        var tahun               = $('#tahun_target').val()
        var target              = $('#target_target').val()
        var satuan_realisasi_target       = $('#satuan_realisasi_target').val()
        var realisasi           = $('#realisasi_target').val()
        var pemanfaatan         = $('#pemanfaatan_target').val()
        var keterangan          = $('#keterangan_target').val()
        var kendala             = $('#kendala_target').val()
        var tinjut              = $('#tinjut_target').val()
        var status_pemanfaatan  = $('#status_pemanfaatan_target').val()
        var persen_kinerja      = $('#persen_kinerja').val()

        var kode_dir      = $('#direktorat').combobox('getValue')
        var kode_subdir   = $('#subdit').combobox('getValue')

        var evidence     = $('#evidence_target')[0].files;

        pertanyaan_target = ""
        $("input[name=pertanyaan_target]").each(function () {
            pertanyaan_target += $(this).val() + "|";
        });

        jawaban_target = ""
        $("input[name=jawaban_target]").each(function () {
            jawaban_target += $(this).val() + "|";
        });
        
        var form_data = new FormData();

        form_data.append('type', type);
        form_data.append('kode', kode);
        form_data.append('bulan', bulan);
        form_data.append('tahun', tahun);
        form_data.append('target', target);
        form_data.append('satuan_realisasi_target', satuan_realisasi_target);
        form_data.append('realisasi', realisasi);
        form_data.append('pemanfaatan', pemanfaatan);
        form_data.append('keterangan', keterangan);
        form_data.append('kendala', kendala);
        form_data.append('tinjut', tinjut);
        form_data.append('status_pemanfaatan', status_pemanfaatan);
        form_data.append('kode_dir', kode_dir);
        form_data.append('kode_subdir', kode_subdir);
        form_data.append('pertanyaan_target', pertanyaan_target);
        form_data.append('jawaban_target', jawaban_target);
        form_data.append('persen_kinerja', persen_kinerja);

        form_data.append('_token', '{{csrf_token()}}')

        for(var i=0;i<evidence.length;i++)
        {
            form_data.append("evidence[]", evidence[i], evidence[i]['name']);
        }

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
                    clearFormTarget()
                    $("#modal-input-target").modal("hide")
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

    function submitTargetOld()
    {
        var type                = $('#type_target').val()
        var kode                = $('#kode_target').val()
        var bulan               = $('#bulan_target').val()
        var tahun               = $('#tahun_target').val()
        var target              = $('#target_target').val()
        var satuan_realisasi_target       = $('#satuan_realisasi_target').val()
        var realisasi           = $('#realisasi_target').val()
        var pemanfaatan         = $('#pemanfaatan_target').val()
        var keterangan          = $('#keterangan_target').val()
        var kendala             = $('#kendala_target').val()
        var tinjut              = $('#tinjut_target').val()
        var status_pemanfaatan  = $('#status_pemanfaatan_target').val()

        var kode_dir      = $('#direktorat').combobox('getValue')
        var kode_subdir   = $('#subdit').combobox('getValue')

        $('#data-capaian').treegrid('loading');

        $.post('{{ route('capaian.submit-target') }}', {type, kode, kode_dir, kode_subdir, bulan, tahun, target, satuan_realisasi_target, realisasi, pemanfaatan, status_pemanfaatan, keterangan, kendala, tinjut, _token: '{{csrf_token()}}'}, function(e){

            if(e.status == "success")
            {
                Toast.fire({
                    icon: 'success',
                    title: e.title
                })

                loadData()
                clearFormTarget()
                $("#modal-input-target").modal("hide")
            }
            else
            {
                Toast.fire({
                    icon: 'error',
                    title: e
                })
            }

        });
    }

    function clearFormTarget()
    {
        $('#type_target').val("")
        $('#kode_target').val("")
        $('#bulan_target').val("")
        $('#target_target').val("")
        $('#realisasi_target').val("")
        $('#pemanfaatan_target').val("")
        $('#status_pemanfaatan_target').val("")
        $('#keterangan_target').val("")
        $('#kendala_target').val("")
        $('#tinjut_target').val("")

        $("#evidence-willbe").html('')
        $('#evidence-info').addClass('d-none')
    }

    function addFormTarget()
    {
        var kode        = $('#kode_target').val()
        var jawaban     = $('#jawaban_target').val()
        var evidence    = $('#evidence_target').prop('files')[0]
        var pertanyaan  = $('#pertanyaan_target').val()

        var form_data = new FormData();
        
        form_data.append('kode', kode);
        form_data.append('jawaban', jawaban);
        form_data.append('evidence', evidence);
        form_data.append('pertanyaan', pertanyaan);

        form_data.append('_token', '{{csrf_token()}}')

        $('#data-capaian').treegrid('loading');

        $.ajax({
            url: "{{route('capaian.upload-evidence')}}",
            type: "POST",
            data: form_data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (e)
            {
                $('#jawaban_target').val("")
                $('#evidence_target').val("")
                $('#pertanyaan_target').val("")
                loadTableCapaian(e.data)
        }});
    }

    function loadTableCapaian(data)
    {
        $('#wrap-table-form-target').show()
        $("#table-form-target").find("tr:gt(0)").remove();

        var table = document.getElementById("table-form-target");
        var row = table.insertRow();
        
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);

        var i;
        
        for (i = 0; i < data.length; ++i) {
            cell1.innerHTML = data[i]['evidence'];
            cell2.innerHTML = '<button class="btn btn-danger" onclick="removeFormTarget(this,' + data[i]['id'] +')"> <i class="font-weight-bolder fas fa-times-circle"></i> </button>';   
            // <button class="btn btn-success" onclick="addFormTarget()"> <i class="font-weight-bolder fas fa-plus-circle"></i> </button> 
        }
    }

    function addFormTargetOld()
    {
        var table = document.getElementById("table-form-target");
        var row = table.insertRow();
        
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        // var cell3 = row.insertCell(2);
        // var cell4 = row.insertCell(3);

        // cell1.innerHTML = '<textarea class="form-control" id="pertanyaan_target" name="pertanyaan_target"></textarea>';
        // cell2.innerHTML = '<textarea class="form-control" id="jawaban_target" name="jawaban_target"></textarea>';
        cell1.innerHTML = '<div class="input-group"><input type="file" class="form-control" id="evidence_target"></div>';
        cell2.innerHTML = '<button class="btn btn-success" onclick="addFormTarget()"> <i class="font-weight-bolder fas fa-plus-circle"></i> </button> <button class="btn btn-danger" onclick="removeFormTarget(this)"> <i class="font-weight-bolder fas fa-times-circle"></i> </button>';

    }

    function removeFormTarget(r,id)
    {
        $.post("{{route('capaian.delete-upload-evidence')}}", {
                id: id
            }, function (e)
            {
                var i = r.parentNode.parentNode.rowIndex;
                document.getElementById("table-form-target").deleteRow(i);
            }
        );
    }
</script>