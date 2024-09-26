@extends('layouts.main-new')

@section('content')
<div class="px-3">
  <h3><a href="{{ route('ticketing.revisi-gwpp') }}" class="col-2"><i class="fas fa-arrow-left"></i></a> {{$type}}</h3>
  <div class="row bg-tosca py-3 mb-4 text-center">
    <h4 class="fw-bold mb-0">
      <span>{{$current}}</span>
    </h4>
    <h6 class="my-2">{{ $nama_satker }}</h6>
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
            @if ($current == \App\TicketStatus::PERBAIKAN)
            <th scope="col">Status Perbaikan</th>
            @endif
          </tr>
        </thead>
        <tbody>
          @foreach ($list as $i => $revisi)
          <tr class="">
            <td scope="row">{{ $i+1 }}</td>
            <td><a href="{{ getLinkByStatus($revisi->status, $level) }}/{{ $revisi->id }}" class="link-primary link-underline link-underline-opacity-0 fw-semibold">{{ $revisi->nomor_surat }}</a></td>
            <td>{{ $revisi->tanggal_surat }}</td>
            <td>{{ $revisi->namaprov }}</td>
            <td>{{ $revisi->satker }}</td>
            <td>{{ strtoupper($revisi->jenis_revisi) }}</td>
            @if ($current == \App\TicketStatus::PERBAIKAN)
            <th scope="col">{{ $revisi->status }}</th>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
  </div>
</div>
@endsection