<section class="content" style="display:none" id="wrap-form-proses">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-12">
            <button class="btn btn-danger" onclick="openData(false)"><i class="fas fa-backspace"></i> &nbsp;Back</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="overlay" id="loader-file" style="display: none">
                        <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                    </div>
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bolder">Download Dokumen</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive">
                            <tr>
                                <td style="width: 25%">
                                    <div class="card card-primary">
                                        <div class="card-header text-center">
                                            <h1 class="card-title text-center" style="font-weight: bolder">Dokumen <br> RAB</h1>
                                        </div>
                                        <div class="card-body text-center" id="wrap-btn-rab">
                                            
                                        </div>
                                    </div>
                                </td>
                                <td style="width: 25%">
                                    <div class="card card-primary">
                                        <div class="card-header text-center">
                                            <h1 class="card-title text-center" style="font-weight: bolder">Dokumen <br> KAK</h1>
                                        </div>
                                        <div class="card-body text-center" id="wrap-btn-kak">
                                            
                                        </div>
                                    </div>
                                </td>
                                <td style="width: 25%">
                                    <div class="card card-primary">
                                        <div class="card-header text-center">
                                            <h1 class="card-title text-center" style="font-weight: bolder">Dokumen <br> Nota Dinas PPTK</h1>
                                        </div>
                                        <div class="card-body text-center" id="wrap-btn-nd-pptk">
                                            
                                        </div>
                                    </div>
                                </td>
                                <td style="width: 25%">
                                    <div class="card card-primary">
                                        <div class="card-header text-center">
                                            <h1 class="card-title text-center" style="font-weight: bolder">Dokumen <br> Nota Dinas PPK</h1>
                                        </div>
                                        <div class="card-body text-center" id="wrap-btn-nd">
                                            
                                        </div>
                                    </div>                                    
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="overlay" id="loader-proses" style="display: none">
                        <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                    </div>
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bolder">Dokumen Usulan Kegiatan (PPTK)</h1>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="width: 100%">
                                <tr>
                                    <td class="align-middle" style="width: 45%">ID Usulan Kegiatan</td>
                                    <td class="align-middle" style="width: 50%"> <input type="text" id="id_usulan_proses" class="form-control" disabled> </td>
                                </tr>
                                <tr>
                                    <td class="align-middle" style="width: 45%">Tahun Anggaran</td>
                                    <td class="align-middle" style="width: 50%"> <span id="tahun_anggaran_proses"></span> </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Nomor Surat</td>
                                    <td class="align-middle"> <span id="nomor_surat_proses"></span> </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Tanggal Surat</td>
                                    <td class="align-middle"> <span id="tanggal_surat_proses"></span> </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Satuan Kerja</td>
                                    <td class="align-middle"> <span id="satker_proses"></span> </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Provinsi</td>
                                    <td class="align-middle"> <span id="provinsi_proses"></span> </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Unit Kerja</td>
                                    <td class="align-middle"> <span id="direktorat_proses"></span> </td>
                                </tr>
                                <tr class="d-none">
                                    <td class="align-middle">Jenis Usulan</td>
                                    <td class="align-middle"> <span class="text-uppercase" id="jenis_usulan_proses"></span> </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Nama Pejabat</td>
                                    <td class="align-middle"> <span id="nama_pejabat_proses"></span> </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Jabatan</td>
                                    <td class="align-middle"> <span id="jabatan_proses"></span> </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Perihal</td>
                                    <td class="align-middle"> <span id="perihal_proses"></span> </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">RAB</td>
                                    <td class="align-middle text-center">
                                        <div class="row">
                                            <div class="col-md-4 pt-3" style="height: 100%">
                                                <span id="matrik_rab_proses"></span>
                                            </div>
                                            <div class="col-md-8 pl-3" style="border-left: 1px dashed;">
                                                <span id="wrap-upload-matrik-rab">
                                                    <div class="form-group">
                                                        <label for="matrik_rab_usulan"> RAB <small>(PDF, Maksimal 2MB)</small></label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="matrik_rab_usulan">
                                                                <label class="custom-file-label" for="matrik_rab_usulan">Pilih File</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>  
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">KAK</td>
                                    <td class="align-middle text-center">
                                        <div class="row">
                                            <div class="col-md-4 pt-3" style="height: 100%">
                                                <span id="kak_proses"></span>
                                            </div>
                                            <div class="col-md-8 pl-3" style="border-left: 1px dashed;">
                                                <span id="wrap-upload-kak">
                                                    <div class="form-group">
                                                        <label for="kak_usulan">Revisi KAK <small>(PDF, Maksimal 2MB)</small></label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="kak_usulan">
                                                                <label class="custom-file-label" for="kak_usulan">Pilih File</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>  
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Nota Dinas PPTK</td>
                                    <td class="align-middle text-center">
                                        <div class="row">
                                            <div class="col-md-4 pt-3" style="height: 100%">
                                                <span id="nota_dinas_pptk_proses"></span>
                                            </div>
                                            <div class="col-md-8 pl-3" style="border-left: 1px dashed;">
                                                <span id="wrap-upload-nota_dinas_pptk">
                                                    <div class="form-group">
                                                        <label for="nota_dinas_pptk_usulan">Revisi Nota Dinas PPTK <small>(PDF, Maksimal 2MB)</small></label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="nota_dinas_pptk_usulan">
                                                                <label class="custom-file-label" for="nota_dinas_pptk_usulan">Pilih File</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>  
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Keterangan</td>
                                    <td class="align-middle"> <span id="keterangan_proses"></span> </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Diajukan Oleh</td>
                                    <td class="align-middle"> <span id="created_by_proses"></span> </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Waktu Pengajuan</td>
                                    <td class="align-middle"> <span id="created_at_proses"></span> </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer" id="btn-update">
                        <button class="btn btn-block btn-warning" onclick="updateData()" style="font-weight: bolder"> <i class="fas fa-edit"></i> &nbsp; UPDATE DATA</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-primary" id="form-ppk">
                    <div class="overlay" id="loader-ppk" style="display: none">
                        <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                    </div>
                    <div class="card-header">
                        <h1 style="font-weight: bolder" class="card-title">Form Approval Pengajuan (PPK)</h1>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="status_proses_ppk">Ubah Status</label>
                            <select class="form-control" style="width: 100%;" id="status_proses_ppk" name="status_proses_ppk" onchange="checkStatusPpk()">
                                <option value="perbaikan">Perbaikan</option>
                                <option value="disetujui">Disetujui</option>
                            </select>
                        </div>
                        <div class="form-group" id="note_dinas_ppk_wrap" style="display: none">
                            <label for="nota_dinas_ppk">Nota Dinas PPK <small>(PDF, Maksimal 2MB)</small></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="nota_dinas_ppk">
                                    <label class="custom-file-label" for="nota_dinas_ppk">Pilih File</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="catatan_ppk_wrap" style="display:none">
                            <label for="catatan_proses_ppk">Catatan</label>
                            <div id="wrap-catatan">
                                <div class="row">
                                    <div class="col-md-8">
                                        <textarea class="form-control" id="catatan_proses_ppk" name="catatan_proses_ppk"></textarea>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <button class="btn btn-success" onclick="addCatatan()"> <i class="font-weight-bolder fas fa-plus-circle"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-danger" onclick="openData()"> <i class="fas fa-times-circle"></i> &nbsp;CANCEL</button>
                        <button type="button" onclick="submitPpk()" class="btn btn-success float-right"> <i class="fas fa-save"></i> &nbsp;SUBMIT</button>
                    </div>
                </div>

                <div class="card card-primary" id="form-bagren">
                    <div class="overlay" id="loader-bagren" style="display: none">
                        <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                    </div>
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bolder">Form Verifikasi Pengajuan (Bagren - {{Auth::user()->nama}})</h1>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="status_proses_bagren">Ubah Status</label>
                            <select class="form-control" style="width: 100%;" id="status_proses_bagren" name="status_proses_bagren" onchange="checkStatusBagren()">
                                <option value="perbaikan">Perbaikan</option>
                                <option value="disetujui">Disetujui</option>
                            </select>
                        </div>
                        <div class="form-group" id="catatan_bagren_wrap" style="display:none">
                            <label for="catatan_proses_bagren">Catatan</label>
                            <div id="wrap-catatan-bagren">
                                <div class="row">
                                    <div class="col-md-8">
                                        <textarea class="form-control" id="catatan_proses_bagren" name="catatan_proses_bagren"></textarea>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <button class="btn btn-success" onclick="addCatatanBagren()"> <i class="font-weight-bolder fas fa-plus-circle"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-danger" onclick="openData()"> <i class="fas fa-times-circle"></i> &nbsp;CANCEL</button>
                        <button type="button" onclick="submitBagren()" class="btn btn-success float-right"> <i class="fas fa-save"></i> &nbsp;SUBMIT</button>
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="overlay" id="loader-proses" style="display: none">
                        <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                    </div>
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bolder">History Upload Dokumen</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table id="dokumen-rab" class="table table-bordered" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th class="bg-success align-middle" colspan="3">Matrik RAB Semula Menjadi</th>
                                    </tr>
                                    <tr>
                                        <th style="width: 5%" class="text-center align-middle">No.</th>
                                        <th style="width: 95%" class="text-center align-middle">Dokumen</th>
                                    </tr>
                                </thead>
                                <tbody id="content-matrik-rab"></tbody>
                            </table>
                        </div>
                        <div class="row">
                            <table id="dokumen-kak" class="table table-bordered" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th class="bg-success align-middle" colspan="3">KAK</th>
                                    </tr>
                                    <tr>
                                        <th style="width: 5%" class="text-center align-middle">No.</th>
                                        <th style="width: 95%" class="text-center align-middle">Dokumen</th>
                                    </tr>
                                </thead>
                                <tbody id="content-kak"></tbody>
                            </table>
                        </div>
                        <div class="row">
                            <table id="dokumen-nota-pptk" class="table table-bordered" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th class="bg-success align-middle" colspan="3">Nota Dinas PPTK</th>
                                    </tr>
                                    <tr>
                                        <th style="width: 5%" class="text-center align-middle">No.</th>
                                        <th style="width: 95%" class="text-center align-middle">Dokumen</th>
                                    </tr>
                                </thead>
                                <tbody id="content-nota-pptk"></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bolder">History Usulan Kegiatan</h1>
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
    let currentCount = 0;

    function updateData()
    {
        $('#loader-proses').show()
        $('#loader-file').show()

        var id                  = $('#id_usulan_proses').val()
        var kak                 = $('#kak_usulan').prop('files')[0];
        var matrik_rab          = $('#matrik_rab_usulan').prop('files')[0];
        var nota_dinas_pptk     = $('#nota_dinas_pptk_usulan').prop('files')[0];

        var form_data = new FormData();

        form_data.append('id', id);
        form_data.append('kak', kak);
        form_data.append('matrik_rab', matrik_rab);
        form_data.append('nota_dinas_pptk', nota_dinas_pptk);

        form_data.append('_token', '{{csrf_token()}}')

        $.ajax({
        url: "{{route('usulan.update-usulan')}}",
        type: "POST",
        data: form_data,
        cache: false,
        processData: false,
        contentType: false,
        success: function (e)
        {
            $('#loader-proses').hide();
            $('#loader-file').hide()
            if(e.status == "success")
            {
                Toast.fire({
                    icon: 'success',
                    title: e.title
                })

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

    function openDetail(id)
    {
        loadHistory(id)
        clearFormProses()
        $('#loader-proses').show()
        $('#loader-file').show()
        loadDetailProses(id)
        $('#wrap-data').hide(700)
        $('#wrap-form').hide(700)
        $('#wrap-form-proses').show(700)

        $('#form-ppk').hide()
        $('#form-bagren').hide()
    }

    function openFormProses(id, form)
    {
        loadHistory(id)
        clearFormProses()
        $('#loader-proses').show()
        $('#loader-file').show()
        loadDetailProses(id)
        $('#wrap-data').hide(700)
        $('#wrap-form').hide(700)
        $('#wrap-form-proses').show(700)

        if(form == "ppk")
        {
            checkStatusPpk()
            $('#form-ppk').show()
            $('#form-bagren').hide()
        }
        else
        {
            checkStatusBagren()
            $('#form-ppk').hide()
            $('#form-bagren').show()
        }
    }

    function loadHistory(id_usulan)
    {
        $('.wrap-history').empty().load('{{route('usulan.view-log')}}?id_usulan='+id_usulan)   
    }

    function checkStatusPpk()
    {
        $('#note_dinas_ppk_wrap').hide()
        var status = $('#status_proses_ppk').val()

        if(status == 'disetujui')
        {
            $('#catatan_ppk_wrap').hide()
            $('#note_dinas_ppk_wrap').show()
        }
        else if(status == "perbaikan")
        {
            $('#catatan_ppk_wrap').show()
            $('#note_dinas_ppk_wrap').hide()
        }
    }

    function checkStatusBagren()
    {
        $('#note_dinas_bagren_wrap').hide()
        var status = $('#status_proses_bagren').val()

        if(status == 'disetujui')
        {
            $('#catatan_bagren_wrap').hide()
        }
        else if(status == "perbaikan")
        {
            $('#catatan_bagren_wrap').show()
        }
    }

    function clearFormProses()
    {
        $('#id_usulan_proses').val("")
        $('#status_proses_ppk').val("")

        $("textarea[name=catatan_proses_ppk]").each(function () {
            $(this).val("")
        });
    }

    function loadDetailProses(id)
    {
        $.post('{{ route('usulan.detail') }}', {id, _token: '{{csrf_token()}}'}, function(e){

            $('#id_usulan_proses').val(id)
            $('#kak_proses').empty().append(e.download_kak)
            $('#satker_proses').empty().append(e.satker)
            $('#jabatan_proses').empty().append(e.jabatan)
            $('#perihal_proses').empty().append(e.perihal)
            $('#created_by_proses').empty().append(e.creator)
            $('#provinsi_proses').empty().append(e.nama_provinsi)
            $('#keterangan_proses').empty().append(e.keterangan)
            $('#matrik_rab_proses').empty().append(e.download_matrik_rab)
            $('#nomor_surat_proses').empty().append(e.nomor_surat)
            $('#jenis_usulan_proses').empty().append(e.jenis_usulan)
            $('#nama_pejabat_proses').empty().append(e.nama_lkp_pjb)
            $('#direktorat_proses').empty().append(e.nama_direktorat)
            $('#created_at_proses').empty().append(e.created_at_masked)
            $('#tahun_anggaran_proses').empty().append(e.tahun_anggaran)
            $('#nota_dinas_pptk_proses').empty().append(e.download_nota_dinas_pptk)
            $('#tanggal_surat_proses').empty().append(e.tanggal_surat_masked)
            $('#dokumen_pendukung_proses').empty().append(e.download_dokumen_pendukung)

            $('#content-kak').empty()
            $('#content-nota-pptk').empty()
            $('#content-matrik-rab').empty()
            $('#content-dokumen-pendukung').empty()

            var btn_rab = '<a class="btn btn-app btn-success"> <i class="fas fa-download"></i> Download RAB </a>'

            $('#wrap-btn-kak').empty().append(e.download_kak)
            $('#wrap-btn-rab').empty().append(e.download_matrik_rab)
            $('#wrap-btn-nd').empty().append(e.download_nota_dinas_ppk)
            $('#wrap-btn-nd-pptk').empty().append(e.download_nota_dinas_pptk)

            // KAK
            if (Array.isArray(e.kak_old) && e.kak_old.length)
            {
                var no = 1;
                e.kak_old.forEach(kak_old => 
                {
                    var data = '<tr><td class="text-center">'+no+'.</td><td>'+kak_old+'</td></tr>'
                    $('#dokumen-kak > tbody:last-child').append(data);
                    no++
                });
            }
            else
            {
                var content_kak = '<tr><td class="text-center" colspan="2"><em>Tidak Ada Dokumen Lama</em></td></tr>';
                $('#dokumen-kak > tbody:last-child').append(content_kak);
            }

            // Matrik RAB
            if (Array.isArray(e.matrik_rab_old) && e.matrik_rab_old.length)
            {
                var no = 1;
                e.matrik_rab_old.forEach(matrik_rab_old => 
                {
                    var data = '<tr><td class="text-center">'+no+'.</td><td>'+matrik_rab_old+'</td></tr>'
                    $('#dokumen-rab > tbody:last-child').append(data);
                    no++
                });
            }
            else
            {
                var data = '<tr><td class="text-center" colspan="2"><em>Tidak Ada Dokumen Lama</em></td></tr>';
                $('#dokumen-rab > tbody:last-child').append(data);
            }

            // Matrik ND PPTK
            if (Array.isArray(e.nota_dinas_pptk_old) && e.nota_dinas_pptk_old.length)
            {
                var no = 1;
                e.nota_dinas_pptk_old.forEach(nota_dinas_pptk_old => 
                {
                    var data = '<tr><td class="text-center">'+no+'.</td><td>'+nota_dinas_pptk_old+'</td></tr>'
                    $('#dokumen-nota-pptk > tbody:last-child').append(data);
                    no++
                });
            }
            else
            {
                var data = '<tr><td class="text-center" colspan="2"><em>Tidak Ada Dokumen Lama</em></td></tr>';
                $('#dokumen-nota-pptk > tbody:last-child').append(data);
            }

            if(e.status == "BUTUH PERBAIKAN")
            {
                $('#btn-update').show()
                $('#wrap-upload-kak').show()
                $('#wrap-upload-matrik-rab').show()
                $('#wrap-upload-nota_dinas_pptk').show()
                if(e.tolak == 3)
                {
                    $('#btn-update').hide()
                }
            }
            else
            {
                $('#btn-update').hide()
                $('#wrap-upload-kak').hide()
                $('#wrap-upload-matrik-rab').hide()
                $('#wrap-upload-nota_dinas_pptk').hide()
            }

            $('#loader-proses').hide()
            $('#loader-file').hide()

        });
    }

    function addCatatan()
    {
        var element = '<div class="row mt-3"><div class="col-md-8"><textarea class="form-control" id="catatan_proses_ppk" name="catatan_proses_ppk"></textarea></div><div class="col-md-2 text-center"><button class="btn btn-success" onclick="addCatatan()"> <i class="font-weight-bolder fas fa-plus-circle"></i> </button></div><div class="col-md-2 text-center"><button class="btn btn-danger" onclick="removeCatatan()"> <i class="font-weight-bolder fas fa-times-circle"></i> </button></div></div>';

        if(currentCount < 2)
        {
            currentCount += 1;
            $('#wrap-catatan').append(element)
        }
    }

    function addCatatanBagren()
    {
        var element = '<div class="row mt-3"><div class="col-md-8"><textarea class="form-control" id="catatan_proses_bagren" name="catatan_proses_bagren"></textarea></div><div class="col-md-2 text-center"><button class="btn btn-success" onclick="addCatatanBagren()"> <i class="font-weight-bolder fas fa-plus-circle"></i> </button></div><div class="col-md-2 text-center"><button class="btn btn-danger" onclick="removeCatatanBagren()"> <i class="font-weight-bolder fas fa-times-circle"></i> </button></div></div>';

        if(currentCount < 2)
        {
            currentCount += 1;
            $('#wrap-catatan-bagren').append(element)
        }
    }

    function removeCatatan()
    {
        currentCount -= 1;
        $("#wrap-catatan").children().last().remove();
    }

    function removeCatatanBagren()
    {
        currentCount -= 1;
        $("#wrap-catatan-bagren").children().last().remove();
    }

    function submitBagren()
    {
        $('#loader-bagren').show()
        catatan = ""

        $("textarea[name=catatan_proses_bagren]").each(function () {
            catatan += $(this).val() + "|";
        });

        var id     = $('#id_usulan_proses').val()
        var status = $('#status_proses_bagren').val()

        var form_data = new FormData();

        form_data.append('id', id);
        form_data.append('status', status);
        form_data.append('catatan', catatan);
        form_data.append('_token', '{{csrf_token()}}')

        $.ajax({
        url: "{{route('usulan.submit-bagren')}}",
        type: "POST",
        data: form_data,
        cache: false,
        processData: false,
        contentType: false,
        success: function (e)
        {
            $('#loader-bagren').hide()
            if(e.status == "success")
            {
                Toast.fire({
                    icon: 'success',
                    title: e.title
                })

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

    function submitPpk()
    {
        $('#loader-ppk').show()

        catatan = ""

        $("textarea[name=catatan_proses_ppk]").each(function () {
            catatan += $(this).val() + "|";
        });

        var id     = $('#id_usulan_proses').val()
        var status = $('#status_proses_ppk').val()
        var nota_dinas_ppk   = $('#nota_dinas_ppk').prop('files')[0];

        var form_data = new FormData();

        form_data.append('id', id);
        form_data.append('status', status);
        form_data.append('catatan', catatan);
        form_data.append('nota_dinas_ppk', nota_dinas_ppk);

        form_data.append('_token', '{{csrf_token()}}')

        $.ajax({
        url: "{{route('usulan.submit-ppk')}}",
        type: "POST",
        data: form_data,
        cache: false,
        processData: false,
        contentType: false,
        success: function (e)
        {
            $('#loader-ppk').hide()
            if(e.status == "success")
            {
                Toast.fire({
                    icon: 'success',
                    title: e.title
                })

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
