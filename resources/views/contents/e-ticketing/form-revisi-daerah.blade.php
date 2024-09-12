@extends('layouts.main-new')

@section('content')
<div class="px-3">
  <h3>{{$type}}</h3>
  <div class="row bg-tosca py-3 mb-4 text-center">
    <h4 class="fw-bold mb-0"><a href="./revisi-ggwp-new" class="btn btn-dongker float-start"><i class="fas fa-arrow-left"></i> Back</a><span>{{$current}}</span></h4>
  </div>
  <div class="row bg-tosca py-3 mb-4 fw-normal text-black">
    <div class="container-fluid">
      <form>
        <div class="mb-3 row">
          <label for="inputNoSurat" class="col-2 col-form-label">Nomer Surat</label>
          <div class="col-3">
            <input
              type="text"
              class="form-control"
              name="inputNoSurat"
              id="inputNoSurat"
              placeholder="Nomer Surat"
            />
          </div>
          
          <label for="inputTglSurat" class="col-2 col-form-label">Tanggal Surat</label>
          <div class="col-3">
            <input
              type="date"
              class="form-control"
              name="inputTglSurat"
              id="inputTglSurat"
              placeholder="Tanggal Surat"
            />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="jenisRevisi" class="col-2 col-form-label">Jenis Revisi</label>
          <div class="form-check-inline col-1 pt-1">
            <input
              class="form-check-input"
              type="radio"
              name="jenisRevisi"
              id="jenisRevisiDipa"
              value=""
            />
            <label class="form-check-label" for="jenisRevisiDipa">DIPA</label>
          </div>
          <div class="form-check-inline col-1 pt-1">
            <input
              class="form-check-input"
              type="radio"
              name="jenisRevisi"
              id="jenisRevisiPok"
              value=""
            />
            <label class="form-check-label" for="jenisRevisiPok">POK</label>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="textareaPerihal" class="form-label col-2">Perihal</label>
          <div class="col-10">
            <textarea class="form-control" name="textareaPerihal" id="textareaPerihal" rows="3"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="mb-3 col-6">
            <label for="fileNodin" class="form-label">Nota Dinas PPTK Sudah Sign <em>(Maksimal 10MB)</em></label>
            <input
              type="file"
              class="form-control"
              name="fileNodin"
              id="fileNodin"
              placeholder=""
            />
          </div>
          <div class="mb-3 col-6">
            <label for="fileRAB" class="form-label">Matrix RAB Semula Menjadi <em>(Maksimal 10MB)</em></label>
            <input
              type="file"
              class="form-control"
              name="fileRAB"
              id="fileRAB"
              placeholder=""
            />
          </div>

          <div class="mb-3 col-6">
            <label for="fileKak" class="form-label">KAK <em>(Maksimal 10MB)</em></label>
            <input
              type="file"
              class="form-control"
              name="fileKak"
              id="fileKak"
              placeholder=""
            />
          </div>
          <div class="mb-3 col-6">
            <label for="fileDocLain" class="form-label">Dokumen Pendukung Lainnya <em>(Maksimal 10MB)</em></label>
            <input
              type="file"
              class="form-control"
              name="fileDocLain"
              id="fileDocLain"
              placeholder=""
            />
          </div>
        </div>
        <div class="mb-3 row">
          <div class="col-12">
            <label for="textareaKet" class="form-label">Keterangan</label>
            <textarea class="form-control" name="textareaKet" id="textareaKet" rows="3"></textarea>
          </div>
        </div>
        <div class="mb-3 row">
          <div class="col-12 d-flex">
            <button type="cancel" class="btn btn-secondary rounded-pill">
              Cancel
            </button>
            <button type="submit" class="btn btn-success rounded-pill ms-auto">
              Submit
            </button>
          </div>
        </div>
      </form>
    </div>
    
  </div>
</div>
@endsection