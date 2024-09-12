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
                    <div class="overlay" id="loader-proses" style="display: none">
                        <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                    </div>
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bolder">Dokumen Pengajuan Revisi (PPTK)</h1>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="width: 100%">
                                <tr>
                                    <td class="align-middle" style="width: 45%">ID Pengajuan Revisi</td>
                                    <td class="align-middle" style="width: 50%"> <input type="text" id="id_revisi_proses" class="form-control" disabled> </td>
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
                                <tr>
                                    <td class="align-middle">Jenis Revisi</td>
                                    <td class="align-middle"> <span class="text-uppercase" id="jenis_revisi_proses"></span> </td>
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
                                    <td class="align-middle">Nota Dinas PPTK Sudah Sign</td>
                                    <td class="align-middle text-center">
                                        <div class="row">
                                            <div class="col-md-4 pt-3" style="height: 100%">
                                                <span id="nota_dinas_pptk_proses"></span>
                                            </div>
                                            <div class="col-md-8 pl-3" style="border-left: 1px dashed;">
                                                <span id="wrap-upload-nota-dinas-pptk">
                                                    <div class="form-group">
                                                        <label for="nota_dinas_pptk_revisi">Revisi Nota Dinas PPTK <small>(PDF, Maksimal 2MB)</small></label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="nota_dinas_pptk_revisi">
                                                                <label class="custom-file-label" for="nota_dinas_pptk_revisi">Pilih File</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>  
                                    </td>
                                </tr>
                                @if(Auth::user()->level == 5 || Auth::user()->level == 1 || Auth::user()->level == 0)
                                <tr>
                                    <td class="align-middle">Nota Dinas PPK</td>
                                    <td class="align-middle text-center">
                                        <div class="row">
                                            <div class="col-md-4 pt-3" style="height: 100%">
                                                <span id="nota_dinas_ppk_proses"></span>
                                            </div>
                                        </div>  
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td class="align-middle">Matrik RAB Semula Menjadi</td>
                                    <td class="align-middle text-center">
                                        <div class="row">
                                            <div class="col-md-4 pt-3" style="height: 100%">
                                                <span id="matrik_rab_proses"></span>
                                            </div>
                                            <div class="col-md-8 pl-3" style="border-left: 1px dashed;">
                                                <span id="wrap-upload-matrik-rab">
                                                    <div class="form-group">
                                                        <label for="matrik_rab_revisi">Revisi Matrik RAB <small>(PDF, Maksimal 2MB)</small></label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="matrik_rab_revisi">
                                                                <label class="custom-file-label" for="matrik_rab_revisi">Pilih File</label>
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
                                                        <label for="kak_revisi">Revisi KAK <small>(PDF, Maksimal 2MB)</small></label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="kak_revisi">
                                                                <label class="custom-file-label" for="kak_revisi">Pilih File</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>  
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">Dokumen Pendukung</td>
                                    <td class="align-middle text-center">
                                        <div class="row">
                                            <div class="col-md-4 pt-3" style="height: 100%">
                                                <span id="dokumen_pendukung_proses"></span>
                                            </div>
                                            <div class="col-md-8 pl-3" style="border-left: 1px dashed;">
                                                <span id="wrap-upload-dokumen-pendukung">
                                                    <div class="form-group">
                                                        <label for="dokumen_pendukung_revisi">Revisi Dokumen Pendukung <small>(PDF, Maksimal 2MB)</small></label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="dokumen_pendukung_revisi">
                                                                <label class="custom-file-label" for="dokumen_pendukung_revisi">Pilih File</label>
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
                        <button type="button" onclick="submitProsesRevisi()" class="btn btn-success float-right"> <i class="fas fa-save"></i> &nbsp;SUBMIT</button>
                    </div>
                </div>

                <div class="card card-primary" id="form-bagren">
                    <div class="overlay" id="loader-bagren" style="display: none">
                        <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                    </div>
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bolder">Form Verifikasi Pengajuan (Bagren)</h1>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="status_proses_bagren">Ubah Status</label>
                            <select class="form-control" style="width: 100%;" id="status_proses_bagren" name="status_proses_bagren" onchange="checkStatusBagren()">
                                <option value="perbaikan">Perbaikan</option>
                                <option value="disetujui">Disetujui</option>
                            </select>
                        </div>
                        <div class="form-group">
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
                        <button type="button" onclick="submitVerifikasiRevisi()" class="btn btn-success float-right"> <i class="fas fa-save"></i> &nbsp;SUBMIT</button>
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
                            <table id="dokumen-pptk" class="table table-bordered" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th class="bg-success align-middle" colspan="3">Nota Dinas PPTK Sudah Sign</th>
                                    </tr>
                                    <tr>
                                        <th style="width: 5%" class="text-center align-middle">No.</th>
                                        <th style="width: 95%" class="text-center align-middle">Dokumen</th>
                                    </tr>
                                </thead>
                                <tbody id="content-nota-pptk"></tbody>
                            </table>
                        </div>
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
                            <table id="dokumen-pendukung" class="table table-bordered" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th class="bg-success align-middle" colspan="3">Dokumen Pendukung</th>
                                    </tr>
                                    <tr>
                                        <th style="width: 5%" class="text-center align-middle">No.</th>
                                        <th style="width: 95%" class="text-center align-middle">Dokumen</th>
                                    </tr>
                                </thead>
                                <tbody id="content-dokumen-pendukung"></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h1 class="card-title" style="font-weight: bolder">History Pengajuan Revisi</h1>
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

        var id                  = $('#id_revisi_proses').val()
        var kak                 = $('#kak_revisi').prop('files')[0];
        var matrik_rab          = $('#matrik_rab_revisi').prop('files')[0];
        var nota_dinas_pptk     = $('#nota_dinas_pptk_revisi').prop('files')[0];
        var dokumen_pendukung   = $('#dokumen_pendukung_revisi').prop('files')[0];

        var form_data = new FormData();

        form_data.append('id', id);
        form_data.append('kak', kak);
        form_data.append('matrik_rab', matrik_rab);
        form_data.append('nota_dinas_pptk', nota_dinas_pptk);
        form_data.append('dokumen_pendukung', dokumen_pendukung);

        form_data.append('_token', '{{csrf_token()}}')

        $.ajax({
        url: "{{route('ticketing.update-revisi')}}",
        type: "POST",
        data: form_data,
        cache: false,
        processData: false,
        contentType: false,
        success: function (e)
        {
            $('#loader-proses').hide();
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
            $('#form-ppk').hide()
            $('#form-bagren').show()
        }
    }

    function loadHistory(id_ticketing)
    {
        $('.wrap-history').empty().load('{{route('ticketing.view-log')}}?id_ticketing='+id_ticketing)   
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
        $('#note_dinas_ppk_wrap').hide()
        var status = $('#status_proses_ppk').val()

        if(status == 'disetujui')
        {
            $('#catatan_proses_bagren').hide()
        }
        else if(status == "perbaikan")
        {
            $('#catatan_proses_bagren').show()
            $('#note_dinas_ppk_wrap').hide()
        }
    }

    function clearFormProses()
    {
        $('#id_revisi_proses').val("")
        $('#status_proses_ppk').val("")

        $("textarea[name=catatan_proses_ppk]").each(function () {
            $(this).val("")
        });
    }

    function loadDetailProses(id)
    {
        $.post('{{ route('ticketing.detail-revisi') }}', {id, _token: '{{csrf_token()}}'}, function(e){

            $('#id_revisi_proses').val(id)
            $('#kak_proses').empty().append(e.download_kak)
            $('#satker_proses').empty().append(e.satker)
            $('#jabatan_proses').empty().append(e.jabatan)
            $('#perihal_proses').empty().append(e.perihal)
            $('#created_by_proses').empty().append(e.creator)
            $('#provinsi_proses').empty().append(e.nama_provinsi)
            $('#keterangan_proses').empty().append(e.keterangan)
            $('#matrik_rab_proses').empty().append(e.download_matrik_rab)
            $('#nomor_surat_proses').empty().append(e.nomor_surat)
            $('#jenis_revisi_proses').empty().append(e.jenis_revisi)
            $('#nama_pejabat_proses').empty().append(e.nama_lkp_pjb)
            $('#direktorat_proses').empty().append(e.nama_direktorat)
            $('#created_at_proses').empty().append(e.created_at_masked)
            $('#tahun_anggaran_proses').empty().append(e.tahun_anggaran)
            $('#nota_dinas_ppk_proses').empty().append(e.download_nota_dinas_ppk)
            $('#nota_dinas_pptk_proses').empty().append(e.download_nota_dinas_pptk)
            $('#tanggal_surat_proses').empty().append(e.tanggal_surat_masked)
            $('#dokumen_pendukung_proses').empty().append(e.download_dokumen_pendukung)

            $('#content-kak').empty()
            $('#content-nota-pptk').empty()
            $('#content-matrik-rab').empty()
            $('#content-dokumen-pendukung').empty()

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

            // PPTK
            if (Array.isArray(e.nota_dinas_pptk_old) && e.nota_dinas_pptk_old.length)
            {
                var no = 1;
                e.nota_dinas_pptk_old.forEach(nota_dinas_pptk_old => 
                {
                    var data = '<tr><td class="text-center">'+no+'.</td><td>'+nota_dinas_pptk_old+'</td></tr>'
                    $('#dokumen-pptk > tbody:last-child').append(data);
                    no++
                });
            }
            else
            {
                var content_nota_dinas_pptk = '<tr><td class="text-center" colspan="2"><em>Tidak Ada Dokumen Lama</em></td></tr>';
                $('#dokumen-pptk > tbody:last-child').append(content_nota_dinas_pptk);
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

            // Dokumen Pendukung
            if (Array.isArray(e.dokumen_pendukung_old) && e.dokumen_pendukung_old.length)
            {
                var no = 1;
                e.dokumen_pendukung_old.forEach(dokumen_pendukung_old => 
                {
                    var data = '<tr><td class="text-center">'+no+'.</td><td>'+dokumen_pendukung_old+'</td></tr>'
                    $('#dokumen-pendukung > tbody:last-child').append(data);
                    no++
                });
            }
            else
            {
                var data = '<tr><td class="text-center" colspan="2"><em>Tidak Ada Dokumen Lama</em></td></tr>';
                $('#dokumen-pendukung > tbody:last-child').append(data);
            }

            if(e.status == "BUTUH PERBAIKAN")
            {
                $('#btn-update').show()
                $('#wrap-upload-kak').show()
                $('#wrap-upload-matrik-rab').show()
                $('#wrap-upload-nota-dinas-pptk').show()
                $('#wrap-upload-dokumen-pendukung').show()

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
                $('#wrap-upload-nota-dinas-pptk').hide()
                $('#wrap-upload-dokumen-pendukung').hide()
            }

            if(e.status_approval == "disetujui")
            {
                $('#form-ppk').hide()
            }

            if(e.status_verifikasi == "disetujui")
            {
                $('#form-bagren').hide()
            }

            $('#loader-proses').hide()

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

    function submitVerifikasiRevisi()
    {
        $('#loader-bagren').show()
        catatan = ""

        $("textarea[name=catatan_proses_bagren]").each(function () {
            catatan += $(this).val() + "|";
        });

        var id     = $('#id_revisi_proses').val()
        var status = $('#status_proses_bagren').val()

        var form_data = new FormData();

        form_data.append('id', id);
        form_data.append('status', status);
        form_data.append('catatan', catatan);
        form_data.append('_token', '{{csrf_token()}}')

        $.ajax({
        url: "{{route('ticketing.verifikasi-revisi')}}",
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

    function submitProsesRevisi()
    {
        $('#loader-ppk').show()

        catatan = ""

        $("textarea[name=catatan_proses_ppk]").each(function () {
            catatan += $(this).val() + "|";
        });

        var id     = $('#id_revisi_proses').val()
        var status = $('#status_proses_ppk').val()
        var nota_dinas_ppk   = $('#nota_dinas_ppk').prop('files')[0];

        var form_data = new FormData();

        form_data.append('id', id);
        form_data.append('status', status);
        form_data.append('catatan', catatan);
        form_data.append('nota_dinas_ppk', nota_dinas_ppk);

        form_data.append('_token', '{{csrf_token()}}')

        $.ajax({
        url: "{{route('ticketing.approval-revisi')}}",
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
