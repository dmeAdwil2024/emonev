<!-- Main content -->
<section class="content" style="display:none" id="wrap-form">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="overlay" id="loader-form" style="display: none">
                <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="tahun_anggaran">Tahun Anggaran</label>
                    <input type="text" class="form-control" id="tahun_anggaran" name="tahun_anggaran" value="{{date('Y')}}" disabled/>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-xs-12">
                        <label for="nomor_surat">Nomor Surat</label>
                        <input type="text" class="form-control" id="nomor_surat" name="nomor_surat"/>
                    </div>
                    <div class="form-group col-md-6 col-xs-12">
                        <label for="tanggal_surat">Tanggal Surat</label>
                        <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat"/>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-5 col-xs-12">
                        <label for="satker">Satuan Kerja</label>
                        <input type="text" class="form-control" id="satker" name="satker" value="027486 - DIREKTORAT JENDERAL BINA ADMINISTRASI KEWILAYAHAN" disabled/>
                    </div>
                    <div class="form-group col-md-4 col-xs-12">
                        <label for="direktorat">Unit Kerja</label>
                        <select class="form-control" style="width: 100%;" id="direktorat" name="direktorat" disabled></select>
                    </div>
                    <div class="form-group col-md-2 col-xs-12">
                        <div class="form-group">
                            <label for="jenis_revisi">Jenis Revisi</label>
                            <div class="form-group clearfix">
                                <div class="icheck-info d-inline">
                                    <input type="radio" id="pok" value="pok" name="jenis_revisi" checked />
                                    <label for="pok"> POK </label>
                                </div>
                                <div class="icheck-info d-inline ml-3">
                                    <input type="radio" id="dipa" value="dipa" name="jenis_revisi" checked />
                                    <label for="dipa"> DIPA </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-xs-12">
                        <label for="nama_pejabat">Nama Pejabat</label>
                        <select type="text" class="form-control" id="nama_pejabat" name="nama_pejabat" style="width:100%" onchange="fillJabatan()"></select>
                    </div>
                    <div class="form-group col-md-6 col-xs-12">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="perihal">Perihal</label>
                    <input type="text" class="form-control" id="perihal" name="perihal"/>
                </div>
                <div class="form-group">
                    <label for="nota_dinas_pptk">Nota Dinas PPTK Sudah Sign <small>(Maksimal 10MB)</small></label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="nota_dinas_pptk">
                            <label class="custom-file-label" for="nota_dinas_pptk">Pilih File</label>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nota_dinas_pptk">Nota Dinas PPTK Sudah Sign <small>(Maksimal 10MB)</small></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="nota_dinas_pptk">
                                <label class="custom-file-label" for="nota_dinas_pptk">Pilih File</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nota_dinas_ppk">Nota Dinas Untuk PPK (Kosong) <small>(Maksimal 10MB)</small></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="nota_dinas_ppk">
                                <label class="custom-file-label" for="nota_dinas_ppk">Pilih File</label>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="matrik_rab">Matrik RAB Semula Menjadi <small>(Maksimal 10MB)</small></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="matrik_rab">
                                <label class="custom-file-label" for="matrik_rab">Pilih File</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="kak">KAK <small>(Maksimal 10MB)</small></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="kak">
                                <label class="custom-file-label" for="kak">Pilih File</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dokumen_pendukung">Dokumen Pendukung Lainnya (Optional) <small>(PDF/JPG/DOCX, Maksimal 10MB)</small></label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="dokumen_pendukung">
                            <label class="custom-file-label" for="dokumen_pendukung">Pilih File</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan Revisi</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="button" class="btn btn-danger" onclick="openData()"> <i class="fas fa-times-circle"></i> &nbsp;CANCEL</button>
                <button type="button" onclick="submitRevisi()" class="btn btn-success float-right"> <i class="fas fa-save"></i> &nbsp;SUBMIT</button>
            </div>
        </div>
    </div>
</section>

<script>
    function openForm()
        {
            loadPptk()
            loadProvinsi()
            loadDirektorat()
            $('#wrap-data').hide(700)
            $('#wrap-form').show(700)
            $('#wrap-form-proses').hide(700)
        }

        function loadProvinsi()
        {
            $('#provinsi').select2()
            $('#provinsi').empty()
            $('#provinsi').select2('destroy')

            $.post('{{ route('tools.provinsi') }}', { _token: '{{csrf_token()}}'}, function(e){

                $("#provinsi").select2({
                    data: e,
                    theme: 'bootstrap4'
                })
            });
        }

        function loadPptk()
        {
            $('#nama_pejabat').select2()
            $('#nama_pejabat').empty()
            $('#nama_pejabat').select2('destroy')

            $.post('{{ route('tools.pejabat-pptk') }}', { _token: '{{csrf_token()}}'}, function(e){

                $("#nama_pejabat").select2({
                    data: e,
                    theme: 'bootstrap4'
                })

                fillJabatan()
            });
        }
        
        function fillJabatan()
        {
            var id_pejabat = $('#nama_pejabat').val()
            
            $.post('{{ route('tools.detail-pejabat') }}', {id_pejabat, _token: '{{csrf_token()}}'}, function(e){

                $('#jabatan').val(e.jabatan)

            });
        }

        function loadDirektorat()
        {
            $('#direktorat').select2()
            $('#direktorat').empty()
            $('#direktorat').select2('destroy')

            $.post('{{ route('tools.direktorat') }}', { _token: '{{csrf_token()}}'}, function(e){

                $("#direktorat").select2({
                    data: e,
                    theme: 'bootstrap4'
                }).val("{{Auth::user()->id_dir}}").trigger('change')
            });
        }

        function submitRevisi()
        {
            $('#loader-form').show()

            var satker              = $('#satker').val()
            var jabatan             = $('#jabatan').val()
            var perihal             = $('#perihal').val()
            var provinsi            = $('#provinsi').val()
            var keterangan          = $('#keterangan').val()
            var direktorat          = $('#direktorat').val()
            var nomor_surat         = $('#nomor_surat').val()
            var tanggal_surat       = $('#tanggal_surat').val()
            var tahun_anggaran      = $('#tahun_anggaran').val()
            var nama_pejabat        = $('#nama_pejabat').val()
            var jenis_revisi        = $("input[name='jenis_revisi']:checked").val();

            var kak                 = $('#kak').prop('files')[0];
            var matrik_rab          = $('#matrik_rab').prop('files')[0];
            // var nota_dinas_ppk   = $('#nota_dinas_ppk').prop('files')[0];
            var nota_dinas_pptk     = $('#nota_dinas_pptk').prop('files')[0];
            var dokumen_pendukung   = $('#dokumen_pendukung').prop('files')[0];

            var form_data = new FormData();

            form_data.append('satker', satker);
            form_data.append('jabatan', jabatan);
            form_data.append('perihal', perihal);
            form_data.append('provinsi', provinsi);
            form_data.append('keterangan', keterangan);
            form_data.append('direktorat', direktorat);
            form_data.append('nomor_surat', nomor_surat);
            form_data.append('nama_pejabat', nama_pejabat);
            form_data.append('jenis_revisi', jenis_revisi);
            form_data.append('tanggal_surat', tanggal_surat);
            form_data.append('tahun_anggaran', tahun_anggaran);

            form_data.append('kak', kak);
            form_data.append('matrik_rab', matrik_rab);
            // form_data.append('nota_dinas_ppk', nota_dinas_ppk);
            form_data.append('nota_dinas_pptk', nota_dinas_pptk);
            form_data.append('dokumen_pendukung', dokumen_pendukung);

            form_data.append('_token', '{{csrf_token()}}')

            $.ajax({
            url: "{{route('ticketing.submit-revisi')}}",
            type: "POST",
            data: form_data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (e)
            {
                $('#loader-form').hide();
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
