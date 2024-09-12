@extends('layouts.main-new')

@section('content')
<div class="px-3">
  <h3>{{$type}}</h3>
  <div class="row bg-tosca py-3 mb-4 text-center">
    <h4 class="fw-bold mb-0"><a href="./revisi-ggwp-new" class="btn btn-dongker float-start"><i class="fas fa-arrow-left"></i> Back</a><span>{{$current}}</span></h4>
  </div>
  <div class="row bg-tosca py-3 mb-4 text-center">
    <div
      class="table-responsive"
    >
      <table
        class="table table-light"
      >
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">No. Surat</th>
            <th scope="col">Tanggal Surat</th>
            <th scope="col">Provinsi</th>
            <th scope="col">Satker</th>
            <th scope="col">Jenis Revisi</th>
            <th scope="col">Status Perbaikan</th>
          </tr>
        </thead>
        <tbody>
          <tr class="">
            <td scope="row">1</td>
            <td>xxxx</td>
            <td>xxxx</td>
            <td>xxxx</td>
            <td>xxxx</td>
            <td>xxxx</td>
            <td>xxxx</td>
          </tr>
          <tr class="">
            <td scope="row">2</td>
            <td>xxxx</td>
            <td>xxxx</td>
            <td>xxxx</td>
            <td>xxxx</td>
            <td>xxxx</td>
            <td>xxxx</td>
          </tr>
        </tbody>
      </table>
    </div>
    
  </div>
</div>
@endsection