@extends('layouts.caput')

@section('contents')
<div class="main">
    <div class="topbar">
        <div class="toggle col-md-1" id="menuNav">
            <a href="#menuNav">
                <i class="fas fa-bars"></i>
            </a>
        </div>
        <div class="col-md-8 d-flex logo-admin">
            <img src="{{asset('newdashboard/images/logo-emonev.png')}}" alt="logo emonev" class="img-fluid margin-auto logo-smaller">
            <div class="text-center">
                <h1 class="title">E-MONEV</h1>
                <h2 class="subtitle">DITJEN BINA ADMINISTRASI KEWILAYAHAN</h2>
            </div>
        </div>
        <div class="avatar col-md-3 p-2 d-flex">
            <img src="{{asset('newdashboard/images/user-avatar.png')}}" alt="" class="img-fluid avatar-img me-2">
            <div class="avatar-name small fw-bold">
                Selamat Datang Admin,<br>
                Bagian Perencanaan
            </div>
        </div>
    </div>
    <div class="row">
        <div class="font-tebala col-sm-6" style="background-color:#ebebeb;">
            Data Excel
        </div>
        <div class="col-md-6 font-tebala" style="background-color:#ebebeb; text-align: right">
            <a href="{{ route('tes.index') }}">Realisasi</a> &gt;
            Data Excel
        </div>
    </div>
    <div style="height:10px"></div> 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Excel dari Bukti Revisi</h3>
                </div>
                <div class="card-body">
                    @if(isset($filePath) && file_exists($filePath))
                        <iframe src="{{ asset('storage/bukti_ref/' . basename($filePath)) }}" width="100%" height="600px"></iframe>
                    @else
                        <p>File Excel tidak ditemukan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
