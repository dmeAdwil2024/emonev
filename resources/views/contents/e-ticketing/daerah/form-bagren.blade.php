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
                                    <span class="form-control">{{ $data->nomor_surat }}</span>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggal_surat" class="col-4 col-form-label">Tanggal Pengajuan</label>
                                <div class="col-8">
                                    <span class="form-control">{{ $data->tanggal_surat }}</span>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jenis_revisi" class="col-4 col-form-label">Jenis Revisi</label>
                                <div class="col-8">
                                    <span class="form-control">{{ strtoupper($data->jenis_revisi) }}</span>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="perihal" class="form-label col-4">Perihal</label>
                                <div class="col-8">
                                    <div class="form-control">{{ nl2br($data->perihal) }}</div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="perihal" class="form-label col-4">Nota Dinas PPK Sudah Sign</label>
                                <div class="col-8">
                                    <a class="btn btn-success d-flex align-items-center"
                                        href="{{ route('download.dokumen', ['jenis_file' => 'nota_dinas_ppk', 'nama_file' => $data->nota_dinas_ppk]) }}"
                                        title="Klik untuk unduh berkas">
                                        <i class="fas fa-file-arrow-down h2"></i>
                                        <span class="mx-3">{{ $data->nota_dinas_ppk }}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="perihal" class="form-label col-4">Matrix RAB Semula Menjadi</label>
                                <div class="col-8">
                                    <a class="btn btn-success d-flex align-items-center"
                                        href="{{ route('download.dokumen', ['jenis_file' => 'matrik_rab', 'nama_file' => $data->matrik_rab]) }}"
                                        title="Klik untuk unduh berkas">
                                        <i class="fas fa-file-arrow-down h2"></i>
                                        <span class="mx-3">{{ $data->matrik_rab }}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="perihal" class="form-label col-4">Dokumen Pendukung Lainnya</label>
                                <div class="col-8">
                                    <a class="btn btn-success d-flex align-items-center"
                                        href="{{ route('download.dokumen', ['jenis_file' => 'dokumen_pendukung', 'nama_file' => $data->dokumen_pendukung]) }}"
                                        title="Klik untuk unduh berkas">
                                        <i class="fas fa-file-arrow-down h2"></i>
                                        <span class="mx-3">{{ $data->dokumen_pendukung }}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="perihal" class="form-label col-4">Keterangan</label>
                                <div class="col-8">
                                    <div class="form-control">{{ nl2br($data->keterangan) }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="pt-4">
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
                            </div>
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
@endsection
