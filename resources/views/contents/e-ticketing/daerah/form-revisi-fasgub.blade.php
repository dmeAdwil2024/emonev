@extends('layouts.main-new')

@section('content')
    <div class="px-3">
        <h3><a href="{{ route('ticketing.revisi-gwpp') }}" class="col-2"><i class="fas fa-arrow-left"></i></a>
            {{ $type }}</h3>
        <div class="row bg-tosca py-3 mb-4 text-center">
            <h4 class="fw-bold mb-0">
                <span>{{ $current }}</span>
            </h4>
            <h6 class="my-2">{{ $data->nama_satker }}</h6>
        </div>
        <div class="row bg-tosca py-3 mb-4 fw-normal text-black">
            <div class="container-fluid">
                <form>
                    <input type="hidden" id="id" name="id" value="{{ $data->id }}">
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="nomor_surat" class="col-4 col-form-label">Nomer Surat</label>
                                <div class="col-8">
                                    <span class="form-control" id="nomor_surat">{{ $data->nomor_surat }}</span>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggal_surat" class="col-4 col-form-label">Tanggal Pengajuan</label>
                                <div class="col-8">
                                    <span class="form-control" id="tanggal_surat">{{ $data->tanggal_surat }}</span>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jenis_revisi" class="col-4 col-form-label">Jenis Revisi</label>
                                <div class="col-8">
                                    <span class="form-control"
                                        id="jenis_revisi">{{ strtoupper($data->jenis_revisi) }}</span>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="perihal" class="form-label col-4">Perihal</label>
                                <div class="col-8">
                                    <div class="form-control" id="perihal">{{ nl2br($data->perihal) }}</div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nota_dinas_ppk" class="form-label">Nota Dinas PPK Sudah Sign <em>(Maksimal
                                        10MB)</em></label>
                                @if (!empty($data->nota_dinas_ppk))
                                    <a class="mb-3 d-inline-block"
                                        href="{{ route('download.dokumen', ['jenis_file' => 'nota_dinas_ppk', 'nama_file' => $data->nota_dinas_ppk]) }}">{{ $data->nota_dinas_ppk }}</a>
                                @endif
                                <input type="file" class="form-control" name="nota_dinas_ppk" id="nota_dinas_ppk"
                                    placeholder="" />
                            </div>
                            <div class="mb-3 row">
                                <label for="matrik_rab" class="form-label">Matrix RAB Semula Menjadi <em>(Maksimal
                                        10MB)</em></label>
                                @if (!empty($data->matrik_rab))
                                    <a class="mb-3 d-inline-block"
                                        href="{{ route('download.dokumen', ['jenis_file' => 'matrik_rab', 'nama_file' => $data->matrik_rab]) }}">{{ $data->matrik_rab }}</a>
                                @endif
                                <input type="file" class="form-control" name="matrik_rab" id="matrik_rab"
                                    placeholder="" />
                            </div>

                            <div class="mb-3 row">
                                <label for="dokumen_pendukung" class="form-label">Dokumen Pendukung Lainnya <em>(Maksimal
                                        10MB)</em></label>
                                @if (!empty($data->dokumen_pendukung))
                                    <a class="mb-3 d-inline-block"
                                        href="{{ route('download.dokumen', ['jenis_file' => 'dokumen_pendukung', 'nama_file' => $data->dokumen_pendukung]) }}">{{ $data->dokumen_pendukung }}</a>
                                @endif
                                <input type="file" class="form-control" name="dokumen_pendukung" id="dokumen_pendukung"
                                    placeholder="" />
                            </div>
                            <div class="mb-3 row">
                                <label for="perihal" class="form-label col-4">Keterangan</label>
                                <div class="col-8">
                                    <div class="form-control">{{ nl2br($data->keterangan) }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            @if (empty($data->status_fasgub) ||
                                    ($data->status_verifikasi == \App\TicketStatus::DICEK_BAGREN &&
                                        $data->status_fasgub != \App\TicketStatus::DISETUJUI_FASGUB))
                                <div class="mb-3">
                                    <label for="status_fasgub" class="form-label">Ubah status</label>
                                    <select class="form-select form-select-sm" name="status_fasgub" id="status_fasgub">
                                        <option value="{{ \App\TicketStatus::PERBAIKAN }}"
                                            {{ $data->status_fasgub == \App\TicketStatus::PERBAIKAN ? 'selected' : '' }}>
                                            Perbaikan</option>
                                        <option value="{{ \App\TicketStatus::DISETUJUI_FASGUB }}"
                                            {{ $data->status_fasgub == \App\TicketStatus::DISETUJUI_FASGUB ? 'selected' : '' }}>
                                            Disetujui</option>
                                        <option value="{{ \App\TicketStatus::DITOLAK_FASGUB }}"
                                            {{ $data->status_fasgub == \App\TicketStatus::DITOLAK_FASGUB ? 'selected' : '' }}>
                                            Ditolak</option>
                                    </select>
                                </div>

                                <div class="mb-3 perbaikan">
                                    <label for="catatan_fasgub" class="form-label">Catatan</label>
                                    <textarea class="form-control" name="catatan_fasgub" id="catatan_fasgub" rows="3">{{ is_array($data->catatan_fasgub) ? implode('<br>', $data->catatan_fasgub) : $data->catatan_fasgub }}</textarea>
                                </div>

                                <div class="d-flex mb-3 justify-content-between">
                                    <button type="button" class="btn btn-secondary">
                                        Cancel
                                    </button>
                                    <div class="overlay" id="loader-form" style="display: none">
                                        <i class="text-navy fas fa-2x fa-spinner fa-spin"></i> &nbsp;
                                    </div>
                                    <button type="button" class="btn btn-success" onclick="submitRevisiFasgub()">
                                        Submit
                                    </button>
                                </div>
                            @endif

                            <mb-3 class="pt-4">
                                <div class="card">
                                    <h4 class="card-header">Histori Dokumen</h4>
                                    <div class="card-body">
                                        @foreach ($filelog as $history)
                                            <div class="item-timeline pb-4">
                                                <h5 class="card-title d-flex justify-content-between">{{ $history->nama }}
                                                    <span class="small">{{ $history->log_time }}</span>
                                                </h5>
                                                <ul>
                                                    <li><span>Nota Dinas PPK Sudah Sign</span><br><a
                                                            href="{{ route('download.dokumen', ['jenis_file' => 'nota_dinas_ppk', 'nama_file' => $history->nota_dinas_ppk]) }}">{{ $history->nota_dinas_ppk }}</a>
                                                    </li>
                                                    <li><span>Matrix RAB Semula Menjadi</span><br><a
                                                            href="{{ route('download.dokumen', ['jenis_file' => 'matrik_rab', 'nama_file' => $history->matrik_rab]) }}">{{ $history->matrik_rab }}</a>
                                                    </li>
                                                    <li><span>Dokumen Pendukung Lainnya</span><br><a
                                                            href="{{ route('download.dokumen', ['jenis_file' => 'dokumen_pendukung', 'nama_file' => $history->dokumen_pendukung]) }}">{{ $history->dokumen_pendukung }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </mb-3>
                            <div class="mb-3 pt-4">
                                <div class="card">
                                    <h4 class="card-header">Histori Revisi</h4>
                                    <div class="card-body">
                                        @foreach ($log as $history)
                                            <div class="item-timeline pb-4">
                                                <h5 class="card-title d-flex justify-content-between">{{ $history->nama }}
                                                    <span class="small">{{ $history->created_at }}</span></h6>
                                                    <p class="card-text">{{ $history->activity }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('') }}landing-pages/js/jquery-3.3.1.min.js"></script>
    <script>
        $(function() {
            $("#status_fasgub").on('change', function() {
                if ($("#status_fasgub option:selected").val() == '{{ \App\TicketStatus::PERBAIKAN }}') {
                    $('.setuju').addClass('d-none');
                    $('.perbaikan').removeClass('d-none');
                } else {
                    $('.setuju').removeClass('d-none');
                    $('.perbaikan').addClass('d-none');
                }
            }).trigger('change');
        })

        function submitRevisiFasgub() {
            $('#loader-form').show()
            var status_fasgub = $('#status_fasgub option:selected').val();
            var id = $('#id').val();
            var catatan_fasgub = $('#catatan_fasgub').val() || '';
            var catatan_fasgub = $('#catatan_fasgub').val() || '';
            var catatan_fasgub = $('#catatan_fasgub').val() || '';
            var catatan_fasgub = $('#catatan_fasgub').val() || '';
            var catatan_fasgub = $('#catatan_fasgub').val() || '';
            var catatan_fasgub = $('#catatan_fasgub').val() || '';
            var catatan_fasgub = $('#catatan_fasgub').val() || '';
            var catatan_fasgub = $('#catatan_fasgub').val() || '';
            var catatan_fasgub = $('#catatan_fasgub').val() || '';

            var form_data = new FormData();

            form_data.append('id', id);
            form_data.append('status_fasgub', status_fasgub);
            form_data.append('nomor_surat', nomor_surat);
            form_data.append('tanggal_surat', tanggal_surat);
            form_data.append('jenis_revisi', jenis_revisi);
            form_data.append('perihal', perihal);
            form_data.append('judul_kak', judul_kak);
            form_data.append('nota_dinas_ppk', nota_dinas_ppk);
            form_data.append('matrik_rab', matrik_rab);
            form_data.append('dokumen_pendukung', dokumen_pendukung);

            form_data.append('_token', '{{ csrf_token() }}')

            $.ajax({
                url: "{{ route('ticketing.submit-revisi-fasgub') }}",
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