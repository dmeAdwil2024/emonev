@extends('layouts.main-new')

@section('content')
<div class="px-3">
  <h3><a href="{{ route('ticketing.revisi-gwpp') }}" class="col-2"><i class="fas fa-arrow-left"></i></a> {{$type}}</h3>
  <div class="row bg-tosca py-3 mb-4 text-center">
    <h4 class="fw-bold mb-0">
      <span>{{$current}}</span>
    </h4>
    <h6 class="my-2">{{ 'nama_satker' }}</h6>
  </div>
  <div class="row bg-tosca py-3 mb-4 fw-normal text-black">
    <div class="container-fluid">
      <form action="">
        <div class="mb-3 row">
          <div class="col-md-6">
            <div class="mb-3 row">
              <label for="nomor_surat" class="col-4 col-form-label">Nomer Surat</label>
              <div class="col-8">
                <span class="form-control">XXX</span>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="tanggal_surat" class="col-4 col-form-label">Tanggal Pengajuan</label>
              <div class="col-8">
                <span class="form-control">XXX</span>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="jenis_revisi" class="col-4 col-form-label">Jenis Revisi</label>
              <div class="col-8">
                <span class="form-control">XXX</span>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="perihal" class="form-label col-4">Perihal</label>
              <div class="col-8">
                <div class="form-control">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis omnis sint commodi qui molestias, adipisci atque quas eos eaque deserunt reiciendis quae harum enim repellendus facilis autem dolorem amet sed.</div>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="perihal" class="form-label col-4">Nota Dinas PPK Sudah Sign</label>
              <div class="col-8">
                <a class="btn btn-success d-flex align-items-center" href="#" title="Klik untuk unduh berkas">
                  <i class="fas fa-file-arrow-down h2"></i>
                  <span>REV-0-000-000-DIPA-NODIN-31122024-0942.pdf</span>
                </a>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="perihal" class="form-label col-4">Matrix RAB Semula Menjadi</label>
              <div class="col-8">
                <a class="btn btn-success d-flex align-items-center" href="#" title="Klik untuk unduh berkas">
                  <i class="fas fa-file-arrow-down h2"></i>
                  <span>REV-0-000-000-DIPA-MATRIX-31122024-0942.pdf</span>
                </a>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="perihal" class="form-label col-4">Dokumen Pendukung Lainnya</label>
              <div class="col-8">
                <a class="btn btn-success d-flex align-items-center" href="#" title="Klik untuk unduh berkas">
                  <i class="fas fa-file-arrow-down h2"></i>
                  <span>REV-0-000-000-DIPA-PENDUKUNG-31122024-0942.pdf</span>
                </a>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="perihal" class="form-label col-4">Keterangan</label>
              <div class="col-8">
                <div class="form-control">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis omnis sint commodi qui molestias, adipisci atque quas eos eaque deserunt reiciendis quae harum enim repellendus facilis autem dolorem amet sed.</div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="mb-3">
              <label for="statusRevisi" class="form-label">Pilih status revisi</label>
              <select
                class="form-select form-select-sm"
                name="statusRevisi"
                id="statusRevisi"
              >
                <option value="0">Perbaikan</option>
                <option value="1" selected>Disetujui</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="inputTanggalBagren" class="form-label">Tanggal Pengesahan</label>
              <input
                type="date"
                class="form-control"
                name="inputTanggalBagren"
                id="inputTanggalBagren"
                aria-describedby=""
                placeholder="tanggal"
              />
            </div>

            <div class="mb-3">
              <label for="notaSuratSah" class="form-label">Nomer Surat Pengesahan</label>
              <input
                type="text"
                class="form-control"
                name="notaSuratSah"
                id="notaSuratSah"
                aria-describedby=""
                placeholder=""
              />
            </div>
            <div class="mb-3">
              <label for="nodinKpa" class="form-label">Tembusan</label>
              <textarea class="form-control" name="catatan" id="catatan" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <label for="nodinKpa" class="form-label">Tembusan</label>
              <input
                type="file"
                class="form-control"
                name="nodinKpa"
                id="nodinKpa"
                placeholder=""
              />
            </div>
            {{-- muncul ketika pilih perbaikan --}}
            <div class="mb-3">
              <label for="catatanKpa" class="form-label">Catatan</label>
              <textarea class="form-control" name="catatanKpa" id="catatanKpa" rows="3"></textarea>
            </div>
            {{-- eo muncul ketika pilih perbaikan --}}
            <div class="d-flex mb-3 justify-content-between">
              <button
                type="button"
                class="btn btn-secondary"
              >
                Cancel
              </button>
              <button
                type="button"
                class="btn btn-success"
              >
                Submit
              </button>
              
            </div>
            <mb-3 class="pt-4">
              <div class="card">
                <h4 class="card-header">Histori Dokumen</h4>
                <div class="card-body">
                  <div class="item-timeline pb-4">
                    <h5 class="card-title d-flex justify-content-between">PPK Daerah <span class="small">12/12/2024 12:12</span></h5>
                    <ul>
                      <li><span>Nota Dinas PPK Sudah Sign</span><br><a href="#">REV-0-000-000-DIPA-NODIN-31122024-0942.pdf</a></li>
                      <li><span>Matrix RAB Semula Menjadi</span><br><a href="#">REV-0-000-000-DIPA-MATRIX-31122024-0942.pdf</a></li>
                      <li><span>Dokumen Pendukung Lainnya</span><br><a href="#">REV-0-000-000-DIPA-PENDUKUNG-31122024-0942.pdf</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </mb-3>
            <div class="mb-3 pt-4">
              <div class="card">
                <h4 class="card-header">Histori Revisi</h4>
                <div class="card-body">
                  <div class="item-timeline pb-4">
                    <h5 class="card-title d-flex justify-content-between">KPA Daerah <span class="small">13/12/2024 13:12</span></h6>
                    <p class="card-text">Menyetujui Revisi E-Ticketing</p>
                  </div>
                  <div class="item-timeline pb-4">
                    <h5 class="card-title d-flex justify-content-between">PPK Daerah <span class="small">12/12/2024 12:12</span></h6>
                    <p class="card-text">Mengajukan Revisi E-Ticketing</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>        
      </form>
    </div>
  </div>
</div>
@endsection