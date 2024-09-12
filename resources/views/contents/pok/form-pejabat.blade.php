@if(Auth::user()->level == 5)
<div class="card card-outline card-primary" id="form-kabagren">
    <div class="overlay" id="loader-kabagren" style="display: none">
        <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
    </div>
    <div class="card-header">
        <h1 class="card-title" style="font-weight: bolder">Form Pengajuan POK (KaBagren)</h1>
    </div>
    <div class="card-body">
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
    <div class="card-footer">
        <button type="button" onclick="submitBagren()" class="btn btn-block btn-rounded btn-success"> <i class="fas fa-save"></i> &nbsp;SUBMIT</button>
    </div>
</div>

<div class="card card-outline card-primary" id="form-kabagren-update" style="display: none">
    <div class="overlay" id="loader-kabagren-update" style="display: none">
        <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
    </div>
    <div class="card-header">
        <h1 class="card-title" style="font-weight: bolder">Form Update POK (KaBagren)</h1>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="kak">File Nota Pengantar (Dokumen Revisi)</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="nota_pengantar_kabagren_update">
                    <label class="custom-file-label" for="nota_pengantar_kabagren_update">Pilih File</label>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="button" onclick="updateBagren()" class="btn btn-block btn-rounded btn-success"> <i class="fas fa-save"></i> &nbsp;UPDATE</button>
    </div>
</div>

@elseif(Auth::user()->level == 6)
    <!-- FORM KEUANGAN -->
    <div class="card card-outline card-primary" id="form-kabagkeu" style="display: none">
        <div class="overlay" id="loader-keuangan" style="display: none">
            <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
        </div>
        <div class="card-header">
            <h1 style="font-weight: bolder" class="card-title">Form Approval Pengajuan (KABAGKEU)</h1>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="status_proses_kabagkeu">Ubah Status</label>
                <select class="form-control" style="width: 100%;" id="status_proses_kabagkeu" name="status_proses_kabagkeu" onchange="checkStatusKabagkeu()">
                    <option value="perbaikan">Perbaikan</option>
                    <option value="disetujui">Disetujui</option>
                </select>
            </div>
            <div class="form-group" id="nota_pengantar_kabagkeu_wrap" style="display: none">
                <label for="nota_pengantar_kabagkeu">Nota Pengesahan POK</small></label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="nota_pengantar_kabagkeu">
                        <label class="custom-file-label" for="nota_pengantar_kabagkeu">Pilih File</label>
                    </div>
                </div>
            </div>
            <div class="form-group" id="catatan_kabagkeu_wrap" style="display:none">
                <label for="catatan_proses_kabagkeu">Catatan</label>
                <div id="wrap-catatan-kabagkeu">
                    <div class="row">
                        <div class="col-md-8">
                            <textarea class="form-control" id="catatan_proses_kabagkeu" name="catatan_proses_kabagkeu"></textarea>
                        </div>
                        <div class="col-md-2 text-center">
                            <button class="btn btn-success" onclick="addCatatanKabagKeu()"> <i class="font-weight-bolder fas fa-plus-circle"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" onclick="submitKabagKeu()" class="btn btn-block btn-rounded btn-success"> <i class="fas fa-save"></i> &nbsp;SUBMIT</button>
        </div>
    </div>

    <!-- FORM DISTRIBUSI POK -->
    <div class="card card-primary card-outline" id="form-distribusi-pok" style="display: none">
        <div class="overlay" id="loader-distribusi" style="display: none">
            <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
        </div>
        <div class="card-header">
            <h1 style="font-weight: bolder" class="card-title">Form Distribusi POK</h1>
        </div>
        <div class="card-body">
            @php $data_direktorat = dataDirektorat(); @endphp
            @foreach($data_direktorat as $direktorat)
                <div class="form-group">
                    <label for="distribusi_pok_dokumen_{{$direktorat->id_dir}}">Dokumen POK {{$direktorat->nama_dir}}</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="distribusi_pok_dokumen_{{$direktorat->id_dir}}">
                            <label class="custom-file-label" for="distribusi_pok_dokumen_{{$direktorat->id_dir}}">Pilih File</label>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card-footer">
            <button type="button" onclick="submitDistribusi()" class="btn btn-block btn-rounded btn-success"> <i class="fas fa-save"></i> &nbsp;SUBMIT</button>
        </div>
    </div>
@elseif(Auth::user()->level == 1)
    <!-- FORM KPA -->
    <div class="card card-outline card-primary" id="form-kpa" style="display: none">
        <div class="overlay" id="loader-kpa" style="display: none">
            <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
        </div>
        <div class="card-header">
            <h1 style="font-weight: bolder" class="card-title">Form Approval Pengajuan (KPA)</h1>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="status_proses_kpa">Ubah Status</label>
                <select class="form-control" style="width: 100%;" id="status_proses_kpa" name="status_proses_kpa" onchange="checkStatusKpa()">
                    <option value="perbaikan">Perbaikan</option>
                    <option value="disetujui">Disetujui</option>
                </select>
            </div>
            <div class="form-group" id="nota_pengantar_kpa_wrap" style="display: none">
                <label for="nota_pengantar_kpa">Nota Pengesahan POK</small></label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="nota_pengantar_kpa">
                        <label class="custom-file-label" for="nota_pengantar_kpa">Pilih File</label>
                    </div>
                </div>
            </div>
            <div class="form-group" id="catatan_kpa_wrap" style="display:none">
                <label for="catatan_proses_kpa">Catatan</label>
                <div id="wrap-catatan-kpa">
                    <div class="row">
                        <div class="col-md-8">
                            <textarea class="form-control" id="catatan_proses_kpa" name="catatan_proses_kpa"></textarea>
                        </div>
                        <div class="col-md-2 text-center">
                            <button class="btn btn-success" onclick="addCatatanKpa()"> <i class="font-weight-bolder fas fa-plus-circle"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" onclick="submitKpa()" class="btn btn-block btn-rounded btn-success"> <i class="fas fa-save"></i> &nbsp;SUBMIT</button>
        </div>
    </div>
@endif

<script>
    let currentCount = 0

    function submitBagren()
    {
        $('#loader-kabagren').show()
        var nota_kabagren = $('#nota_pengantar_kabagren').val()
        
        if(nota_kabagren == "none")
        {
            $('#loader-kabagren').hide()
            swal('Nota Dinas Pengantar Belum Dipilih', 'Mohon Upload Nota Dinas Terlebih Dulu', 'error')
        }
        else
        {
            var form_data = new FormData();
            var nota_kabagren = $('#nota_pengantar_kabagren').prop('files')[0];

            form_data.append('_token', '{{csrf_token()}}')
            form_data.append('nota_kabagren', nota_kabagren);

            $.ajax({
            url: "{{route('pok.submit-bagren')}}",
            type: "POST",
            data: form_data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (e)
            {
                $('#loader-kabagren').hide()

                if(e.status == "success")
                {
                    Toast.fire({
                        icon: 'success',
                        title: e.title
                    })

                    $('.custom-file-label').empty()
                    $('#nota_pengantar_kabagren').val()
                    openData()
                }
                else
                {
                    Toast.fire({
                        icon: 'error',
                        title: e.message
                    })
                }
            }});
        }
    }

    function updateBagren()
    {
        $('#loader-kabagren-update').show()
        var nota_kabagren = $('#nota_pengantar_kabagren').val()
        
        if(nota_kabagren == "none")
        {
            $('#loader-kabagren-update').hide()
            swal('Nota Dinas Pengantar Belum Dipilih', 'Mohon Upload Nota Dinas Terlebih Dulu', 'error')
        }
        else
        {
            var id          = $("#id_pok").val();
            var form_data = new FormData();
            var nota_kabagren = $('#nota_pengantar_kabagren_update').prop('files')[0];

            form_data.append('id', id);
            form_data.append('_token', '{{csrf_token()}}')
            form_data.append('nota_kabagren', nota_kabagren);

            $.ajax({
            url: "{{route('pok.update-bagren')}}",
            type: "POST",
            data: form_data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (e)
            {
                $('#loader-kabagren-update').hide()

                if(e.status == "success")
                {
                    Toast.fire({
                        icon: 'success',
                        title: e.title
                    })

                    $('#form-kabagren-update').hide(700)
                    $('.custom-file-label').empty()
                    $('#nota_pengantar_kabagren').val()
                    openData()
                }
                else
                {
                    Toast.fire({
                        icon: 'error',
                        title: e.message
                    })
                }
            }});
        }
    }

    function formUpdatePokBagren(id)
    {
        $('#id_pok').val(id)
        $('#form-kabagren-update').show(700)
    }

    function showFormBagkeu(id)
    {
        loadHistory(id)
        $('#id_pok').val(id)
        $('#form-kabagkeu').show(700)
    }

    function showFormKpa(id)
    {
        loadHistory(id)
        $('#id_pok').val(id)
        $('#form-kpa').show(700)
    }

    function showFormDistribusiPok(id)
    {
        loadHistory(id)
        $('#id_pok').val(id)
        $('#form-distribusi-pok').show(700)
    }

    function submitKabagKeu()
    {
        $('#loader-keuangan').show()
        catatan = ""

        $("textarea[name=catatan_proses_kabagkeu]").each(function () {
            catatan += $(this).val() + "|";
        });

        var id          = $("#id_pok").val();
        var status      = $('#status_proses_kabagkeu').val()

        var form_data   = new FormData();
        var nota_kabagkeu = $('#nota_pengantar_kabagkeu').prop('files')[0];

        form_data.append('id', id);
        form_data.append('status', status);
        form_data.append('catatan', catatan);
        form_data.append('nota_kabagkeu', nota_kabagkeu);

        form_data.append('_token', '{{csrf_token()}}')
        
        $.ajax({
        url: "{{route('pok.submit-bagkeu')}}",
        type: "POST",
        data: form_data,
        cache: false,
        processData: false,
        contentType: false,
        success: function (e)
        {
            $('#loader-keuangan').hide()

            if(e.status == "success")
            {
                Toast.fire({
                    icon: 'success',
                    title: e.title
                })

                $('.custom-file-label').empty()
                $('#nota_pengantar_kabagkeu').val()
                $('#status_proses_kabagkeu').val()
                $("textarea[name=catatan_proses_kabagkeu]").each(function () {
                    $(this).val("")
                });
                openData()
            }
            else
            {
                Toast.fire({
                    icon: 'error',
                    title: e.message
                })
            }
        }});
    }

    function checkStatusKabagkeu()
    {
        $('#nota_pengantar_kabagkeu_wrap').hide()
        var status = $('#status_proses_kabagkeu').val()

        if(status == 'disetujui')
        {
            $('#catatan_kabagkeu_wrap').hide()
            $('#nota_pengantar_kabagkeu_wrap').show()
        }
        else if(status == "perbaikan")
        {
            $('#catatan_kabagkeu_wrap').show()
            $('#nota_pengantar_kabagkeu_wrap').hide()
        }
    }

    function addCatatanKabagKeu()
    {
        var element = '<div class="row mt-3"><div class="col-md-8"><textarea class="form-control" id="catatan_proses_kabagkeu" name="catatan_proses_kabagkeu"></textarea></div><div class="col-md-2 text-center"><button class="btn btn-success" onclick="addCatatanKabagKeu()"> <i class="font-weight-bolder fas fa-plus-circle"></i> </button></div><div class="col-md-2 text-center"><button class="btn btn-danger" onclick="removeCatatanKabagKeu()"> <i class="font-weight-bolder fas fa-times-circle"></i> </button></div></div>';

        if(currentCount < 2)
        {
            currentCount += 1;
            $('#wrap-catatan-kabagkeu').append(element)
        }
    }

    function removeCatatanKabagKeu()
    {
        currentCount -= 1;
        $("#wrap-catatan-kabagkeu").children().last().remove();
    }

    // KPA
    function submitKpa()
    {
        $('#loader-kpa').show()
        catatan = ""

        $("textarea[name=catatan_proses_kpa]").each(function () {
            catatan += $(this).val() + "|";
        });

        var id          = $("#id_pok").val();
        var status      = $('#status_proses_kpa').val()

        var form_data   = new FormData();
        var nota_kpa = $('#nota_pengantar_kpa').prop('files')[0];

        form_data.append('id', id);
        form_data.append('status', status);
        form_data.append('catatan', catatan);
        form_data.append('nota_kpa', nota_kpa);

        form_data.append('_token', '{{csrf_token()}}')
        
        $.ajax({
        url: "{{route('pok.submit-kpa')}}",
        type: "POST",
        data: form_data,
        cache: false,
        processData: false,
        contentType: false,
        success: function (e)
        {
            $('#loader-kpa').hide()

            if(e.status == "success")
            {
                Toast.fire({
                    icon: 'success',
                    title: e.title
                })

                $('.custom-file-label').empty()
                $('#nota_pengantar_kpa').val()
                $('#status_proses_kpa').val()
                $("textarea[name=catatan_proses_kpa]").each(function () {
                    $(this).val("")
                });
                openData()
            }
            else
            {
                Toast.fire({
                    icon: 'error',
                    title: e.message
                })
            }
        }});
    }

    function checkStatusKpa()
    {
        $('#nota_pengantar_kpa_wrap').hide()
        var status = $('#status_proses_kpa').val()

        if(status == 'disetujui')
        {
            $('#catatan_kpa_wrap').hide()
            $('#nota_pengantar_kpa_wrap').show()
        }
        else if(status == "perbaikan")
        {
            $('#catatan_kpa_wrap').show()
            $('#nota_pengantar_kpa_wrap').hide()
        }
    }

    function addCatatanKpa()
    {
        var element = '<div class="row mt-3"><div class="col-md-8"><textarea class="form-control" id="catatan_proses_kpa" name="catatan_proses_kpa"></textarea></div><div class="col-md-2 text-center"><button class="btn btn-success" onclick="addCatatanKpa()"> <i class="font-weight-bolder fas fa-plus-circle"></i> </button></div><div class="col-md-2 text-center"><button class="btn btn-danger" onclick="removeCatatanKpa()"> <i class="font-weight-bolder fas fa-times-circle"></i> </button></div></div>';

        if(currentCount < 2)
        {
            currentCount += 1;
            $('#wrap-catatan-kpa').append(element)
        }
    }

    function removeCatatanKpa()
    {
        currentCount -= 1;
        $("#wrap-catatan-kpa").children().last().remove();
    }

    function submitDistribusi()
    {
        $('#loader-distribusi').show()
        var id      = $('#id_pok').val()
        const files   = [];
        var i = 0;
        
        var form_data   = new FormData();

        @foreach(dataDirektorat() as $direktorat)
            file    = $('#distribusi_pok_dokumen_{{$direktorat->id_dir}}').prop('files')[0];
            form_data.append("dokumen_{{$direktorat->id_dir}}", file);
        @endforeach
        
        form_data.append('id', id);
        form_data.append('_token', '{{csrf_token()}}')

        $.ajax({
        url: "{{route('pok.distribusi-pok')}}",
        type: "POST",
        data: form_data,
        cache: false,
        processData: false,
        contentType: false,
        success: function (e)
        {
            $('#loader-distribusi').hide()

            if(e.status == "success")
            {
                Toast.fire({
                    icon: 'success',
                    title: e.title
                })

                $('.custom-file-label').empty()
                $('#nota_pengantar_kpa').val()
                $('#status_proses_kpa').val()
                $("textarea[name=catatan_proses_kpa]").each(function () {
                    $(this).val("")
                });
                openData()
            }
            else
            {
                Toast.fire({
                    icon: 'error',
                    title: e.message
                })
            }
        }});
    }
</script>