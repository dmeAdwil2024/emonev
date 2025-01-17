@extends('layouts.main-new')

@section('content')
    <div class="px-3">
        <h3><a href="{{ route('ticketing.revisi-gwpp') }}" class="col-2"><i class="fas fa-arrow-left"></i></a>
            {{ $type }}</h3>
        <div class="row bg-tosca py-3 mb-4 text-center">
            <h4 class="fw-bold mb-0">
                <span>{{ $current }}</span>
            </h4>
            <h6 class="my-2">{{ $nama_satker }}</h6>
        </div>
        <div class="row bg-tosca py-3 mb-4 fw-normal text-black">
            <div class="container-fluid">
                <form>
                    <input type="hidden" id="kode_satker" name="kode_satker" value="{{ $kode_satker }}">
                    <input type="hidden" id="nama_satker" name="nama_satker" value="{{ $nama_satker }}">
                    <input type="hidden" id="satker" name="satker" value="{{ $kode_satker }}-{{ $nama_satker }}">
                    <input type="hidden" id="provinsi" name="provinsi" value="{{ $id_prov }}">
                    <input type="hidden" id="direktorat" name="direktorat" value="{{ $user->id_dir }}">
                    <input type="hidden" id="tahun_anggaran" name="tahun_anggaran" value="{{ $tahun }}">
                    <div class="mb-3 row">
                        <label for="nomor_surat" class="col-2 col-form-label">Nomer Surat</label>
                        <div class="col-3">
                            <input type="text" class="form-control" name="nomor_surat" id="nomor_surat"
                                placeholder="Nomer Surat" />
                        </div>

                        <label for="tanggal_surat" class="col-2 col-form-label">Tanggal Surat</label>
                        <div class="col-3">
                            <input type="date" class="form-control" name="tanggal_surat" id="tanggal_surat"
                                placeholder="Tanggal Surat" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_revisi" class="col-2 col-form-label">Jenis Revisi</label>
                        <div class="form-check-inline col-1 pt-1">
                            <input class="form-check-input" type="radio" name="jenis_revisi" id="jenisRevisiDipa"
                                value="dipa" />
                            <label class="form-check-label" for="jenisRevisiDipa">DIPA</label>
                        </div>
                        <div class="form-check-inline col-1 pt-1">
                            <input class="form-check-input" type="radio" name="jenis_revisi" id="jenisRevisiPok"
                                value="pok" />
                            <label class="form-check-label" for="jenisRevisiPok">POK</label>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="perihal" class="form-label col-2">Perihal</label>
                        <div class="col-10">
                            <textarea class="form-control" name="perihal" id="perihal" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="judul_kak" class="form-label col-2">Judul KAK</label>
                        <div class="col-10">
                            <input type="text" class="form-control" name="judul_kak" id="judul_kak" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="nota_dinas_ppk" class="form-label">Nota Dinas PPK Sudah Sign <em>(Maksimal
                                    10MB)</em></label>
                            <input type="file" class="form-control" name="nota_dinas_ppk" id="nota_dinas_ppk"
                                placeholder="" />
                        </div>
                        <div class="mb-3 col-6">
                            <label for="matrik_rab" class="form-label">Matrix RAB Semula Menjadi <em>(Maksimal
                                    10MB)</em></label>
                            <input type="file" class="form-control" name="matrik_rab" id="matrik_rab" placeholder="" />
                        </div>

                        <div class="mb-3 col-6">
                            <label for="dokumen_pendukung" class="form-label">Dokumen Pendukung Lainnya <em>(Maksimal
                                    10MB)</em></label>
                            <input type="file" class="form-control" name="dokumen_pendukung" id="dokumen_pendukung"
                                placeholder="" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-12">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-12 d-flex justify-content-between">
                            <button type="cancel" class="btn btn-secondary rounded-pill">
                                Cancel
                            </button>
                            <div class="overlay" id="loader-form" style="display: none">
                                <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                            </div>
                            <button type="button" onclick="submitNew()" class="btn btn-success rounded-pill">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script src="{{ asset('') }}landing-pages/js/jquery-3.3.1.min.js"></script>
    <script>
        function submitNew() {
            $('#loader-form').show()
            var satker = $('#satker').val()
            var kode_satker = $('#kode_satker').val()
            var nama_satker = $('#nama_satker').val()
            var perihal = $('#perihal').val()
            var judul_kak = $('#judul_kak').val()
            var provinsi = $('#provinsi').val()
            var keterangan = $('#keterangan').val()
            var direktorat = $('#direktorat').val()
            var nomor_surat = $('#nomor_surat').val()
            var tanggal_surat = $('#tanggal_surat').val()
            var tahun_anggaran = $('#tahun_anggaran').val()
            var jenis_revisi = $("input[name='jenis_revisi']:checked").val() || '';

            var type = "{{ $kegiatan }}"

            var matrik_rab = $('#matrik_rab').prop('files')[0] || '';
            var nota_dinas_ppk = $('#nota_dinas_ppk').prop('files')[0] || '';
            var dokumen_pendukung = $('#dokumen_pendukung').prop('files')[0] || '';

            var form_data = new FormData();

            form_data.append('satker', satker);
            form_data.append('kode_satker', kode_satker);
            form_data.append('nama_satker', nama_satker);
            form_data.append('perihal', perihal);
            form_data.append('judul_kak', judul_kak);
            form_data.append('provinsi', provinsi);
            form_data.append('keterangan', keterangan);
            form_data.append('direktorat', direktorat);
            form_data.append('nomor_surat', nomor_surat);
            form_data.append('jenis_revisi', jenis_revisi);
            form_data.append('tanggal_surat', tanggal_surat);
            form_data.append('tahun_anggaran', tahun_anggaran);

            form_data.append('type', type);
            form_data.append('matrik_rab', matrik_rab);
            form_data.append('nota_dinas_ppk', nota_dinas_ppk);
            form_data.append('dokumen_pendukung', dokumen_pendukung);

            form_data.append('_token', '{{ csrf_token() }}')

            $.ajax({
                url: "{{ route('ticketing.submit-ticket-baru') }}",
                type: "POST",
                data: form_data,
                cache: false,
                processData: false,
                contentType: false,
                success: function(e) {
                    $('#loader-form').hide();
                    var msg = typeof e.message == 'object' ? e.message.join("<br>\n") : e.message
                    Swal.fire({
                        title: e.title,
                        html: msg,
                        icon: e.status
                    }).then((result) => {
                        if (result.isConfirmed && e.status == 'success') {
                            window.location.href = "{{ route('ticketing.revisi-gwpp') }}"
                        }
                    });
                }
            });
        }
    </script>
@endsection
