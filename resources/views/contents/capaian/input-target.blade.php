<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Dashboard E-Monev</title>
        <link rel="icon" type="image/png" href="{{env('APP_URL')}}/images/icon.png"/>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/fontawesome-free/css/all.min.css" />

        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />
		<link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">		
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/select2/css/select2.min.css">
		<link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/sweetalert/sweetalert.css" />
		<link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/toastr/toastr.min.css" />
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('newdashboard/css/newstyles.css') }}?v={{ time() }}" />
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/bs-stepper/css/bs-stepper.min.css">
		
		<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
		<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="{{env('APP_URL')}}/landing-pages/js/jquery-3.3.1.min.js"></script>
        <script src="{{env('APP_URL')}}/landing-pages/js/popper.min.js"></script>
        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- DataTables  & Plugins -->
        <script src="{{env('APP_URL')}}/templates/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/jszip/jszip.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/sweetalert2/sweetalert2.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/toastr/toastr.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/sweetalert/sweetalert.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/bs-stepper/js/bs-stepper.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/select2/js/select2.full.min.js"></script>
		<style>
		#overlay{	
		  display: none;
		  position: fixed;
		  top: 0;
		  left: 0;
		  right: 0;
		  bottom: 0;
		  width: 100%;
		  display: none;
		  z-index: 10000;
		  background: rgba(0,0,0,0.4);
		}
		.cv-spinner {
		  height: 100%;
		  display: flex;
		  justify-content: center;
		  align-items: center;  
		}
		.spinner {
		  width: 40px;
		  height: 40px;
		  border: 4px #ddd solid;
		  border-top: 4px #2e93e6 solid;
		  border-radius: 50%;
		  animation: sp-anime 0.8s infinite linear;
		}
		@keyframes sp-anime {
		  100% { 
		    transform: rotate(360deg); 
		  }
		}
		.is-hide{
		  display:none;
		}
		</style>
    </head>
    <body>
		<div class="container-fluid">
			<div class="navigasi">
				<!-- <div class="mainmenu mt-2 collapse" id="menuNav"> -->
				<ul class="list-unstyled">
					<li><a href="/" class="btn btn-dongker">Home</a></li>
					<li>
						<a href="#menuTiketing" class="btn btn-dongker" data-bs-toggle="collapse">E Tiketing &#11206;</a>
						<ul class="list-unstyled collapse ps-3" id="menuTiketing">
                            @if(empty(Auth::user()->prov) || Auth::user()->level == "0" || Auth::user()->prov == "pusat" || Auth::user()->username == "198505062004121001")
							<li><a href="{{route('ticketing.view-revisi-pusat')}}" class="btn btn-sm btn-primary btn-pills my-1">Pengajuan Revisi Pusat</a></li>
							<li><a href="{{route('usulan.kegiatan')}}" class="btn btn-sm btn-primary btn-pills mb-1">Usulan kegiatan</a></li>
                            @endif

                            @if(!empty(Auth::user()->prov) || Auth::user()->level == "0"  || Auth::user()->username == "198505062004121001")
							<li>
								<a href="#menuRevda" class="btn btn-sm btn-primary btn-pills mb-1" data-bs-toggle="collapse">Pengajuan Revisi Daerah &#11206;</a>
								<ul class="list-unstyled collapse ps-3" id="menuRevda">
									<li><a href="{{route('ticketing.revisi-gwpp')}}" class="btn btn-sm btn-warning btn-pills mb-1">Revisi kegiatan GWPP</a></li>
									<li><a href="{{route('ticketing.view-sarpras-daerah')}}" class="btn btn-sm btn-warning btn-pills mb-1">Revisi kegiatan Sarpras</a></li>
								</ul>
							</li>
							<li><a href="#" class="btn btn-sm btn-primary btn-pills mb-1">Quality Surveyor</a></li>
		                    @endif
						</ul>
					</li>

                    @if(empty(Auth::user()->prov)  || Auth::user()->username == "198505062004121001")
                    @if(Auth::user()->level == 0 || Auth::user()->level == 1 || Auth::user()->level == 5 || Auth::user()->level == 6  || Auth::user()->username == "198505062004121001")
					<li><a href="{{route('pok.terbit-pok')}}" class="btn btn-dongker">Penerbitan POK</a></li>
                    @endif
                    @endif

                    @if(Auth::user()->level == 0 || Auth::user()->level == 5 || Auth::user()->level == 2 || Auth::user()->level == 3 || Auth::user()->level == 27 || Auth::user()->username == "198505062004121001")
					<li>
						<a href="#menuCapaiOut" class="btn btn-dongker" data-bs-toggle="collapse">Capaian Output &#11206;</a>
						<ul class="list-unstyled collapse ps-3" id="menuCapaiOut">
                            @if(empty(Auth::user()->prov))
							<li>
								<a href="#menuCapaiPus" class="btn btn-sm btn-primary btn-pills my-1" data-bs-toggle="collapse">Capaian Pusat &#11206;</a>
								<ul class="list-unstyled collapse ps-3" id="menuCapaiPus">
									<li><a href="{{route('capaian.capaian-output')}}/ki" class="btn btn-sm btn-warning btn-pills mb-1">Komponen Input</a></li>
                                    <li><a href="{{route('capaian.capaian-output')}}/ro" class="btn btn-sm btn-warning btn-pills mb-1">Rincian Output</a></li>
								</ul>
							</li>
                            @endif
                            <li>
								<a href="#menuCapaiDa" class="btn btn-sm btn-primary btn-pills mb-1" data-bs-toggle="collapse">Capaian Daerah &#11206;</a>
								<ul class="list-unstyled collapse ps-3" id="menuCapaiDa">
									<li><a href="{{route('capaian.capaian-output-daerah')}}" class="btn btn-sm btn-warning btn-pills mb-1">Komponen Input</a></li>
									<li><a href="{{route('capaian.capaian-output-daerah')}}" class="btn btn-sm btn-warning btn-pills mb-1">Rincian Output</a></li>
								</ul>
							</li>
						</ul>
					</li>
                    @endif
                    
                    <li>
						<a href="#menuCapaiKin" class="btn btn-dongker" data-bs-toggle="collapse">Capaian Kinerja &#11206;</a>
						<ul class="list-unstyled collapse ps-3" id="menuCapaiKin">
							<li>
								<a href="#menuCapaiKiPus" class="btn btn-sm btn-primary btn-pills my-1" data-bs-toggle="collapse">Capaian Pusat &#11206;</a>
								<ul class="list-unstyled collapse ps-3" id="menuCapaiKiPus">
									<li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">IKP</a></li>
									<li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">IKK</a></li>
								</ul>
							</li>
							<li>
								<a href="#menuCapaiKiDa" class="btn btn-sm btn-primary btn-pills mb-1" data-bs-toggle="collapse">Capaian Daerah &#11206;</a>
								<ul class="list-unstyled collapse ps-3" id="menuCapaiKiDa">
									<li><a href="#" class="btn btn-sm btn-warning btn-pills mb-1">IKK</a></li>
								</ul>
							</li>
						</ul>
					</li>

                    @if(Auth::user()->level == 0  || Auth::user()->username == "198505062004121001")
					<li><a href="#menuMaster" class="btn btn-dongker" data-bs-toggle="collapse">Master &#11206</a>
						<ul class="list-unstyled collapse ps-3" id="menuMaster">
						   <li><a href="{{route('capaian.capaian-output')}}/tc" class="btn btn-sm btn-warning btn-pills mb-1">Target Capaian</a></li>
                           <li><a href="{{route('capaian.capaian-setting')}}" class="btn btn-sm btn-warning btn-pills mb-1">Setting Capaian</a></li>
                           <li>
						   		<a href="#menuImport" class="btn btn-sm btn-primary btn-pills mb-1" data-bs-toggle="collapse">Import Sakti&#11206;</a>
								<ul class="list-unstyled collapse ps-3" id="menuImport">
									<li><a href="{{route('capaian.import-sakti')}}/ag" class="btn btn-sm btn-warning btn-pills mb-1">Anggaran</a></li>
									<li><a href="{{route('capaian.import-sakti')}}/as" class="btn btn-sm btn-warning btn-pills mb-1">Anggaran Eselon 1</a></li>
									<li><a href="{{route('capaian.import-sakti')}}/rg" class="btn btn-sm btn-warning btn-pills mb-1">Realisasi</a></li>
									<li><a href="{{route('capaian.import-sakti')}}/rs" class="btn btn-sm btn-warning btn-pills mb-1">Realisasi Eselon 1</a></li>
								</ul>
						   </li>
						</ul>
					</li>
					<li><a href="{{route('master.history-pagu')}}" class="btn btn-dongker" class="btn btn-dongker">Riwayat Pagu</a></li>
                    @endif

                    @if(Auth::user()->level == 0  || Auth::user()->username == "198505062004121001")
					<li><a href="" class="btn btn-dongker">Angket</a></li>
					@endif

                    @if(Auth::user()->level == "0"  || Auth::user()->username == "198505062004121001")
					<li>
                        <a href="{{ route('tes.index') }}" class="btn btn-dongker mb-1">Realisasi Anggaran</a>
    					<a href="{{route('importes1.index')}}" class="btn btn-dongker" class="btn btn-dongker">Import Eselon 1</a>
    					<a href="{{route('importes1.index')}}" class="btn btn-dongker" class="btn btn-dongker">Import Eselon 1</a>

                        {{-- <ul class="list-unstyled collapse ps-3" id="menuRealisasi">
							<li>
								<a href="" class="btn btn-sm btn-primary btn-pills my-1">Realisasi Pusat</a>
							</li>
							<li>
								<a href="" class="btn btn-sm btn-primary btn-pills mb-1">Realisasi Dekon </a>
							</li>
                            <li>
								<a href="" class="btn btn-sm btn-primary btn-pills mb-1">Realisasi TP</a>
							</li>
						</ul> --}}
                    </li>
					@endif

                    @if(Auth::user()->level == "0"  || Auth::user()->username == "198505062004121001")
                    <li>
                        <a href="#menuAplikasi" class="btn btn-dongker" data-bs-toggle="collapse">ERD &#11206;</a>
                        <ul class="list-unstyled collapse ps-3" id="menuAplikasi">
                            <li>
                                <a href="" class="btn btn-sm btn-primary btn-pills mb-1">Integrasi SAKTI</a>
                            </li>
                            <li>
                                <a href="https://sipgwpp.kemendagri.go.id/" class="btn btn-sm btn-primary btn-pills mb-1">SIP GWPP</a>
                            </li>
                            <li>
                                <a href="https://simlinmas.kemendagri.go.id/management/login" class="btn btn-sm btn-primary btn-pills mb-1">Simlinmas</a>
                            </li>
                            <li>
                                <a href="https://siapkk.kemendagri.go.id/" class="btn btn-sm btn-primary btn-pills mb-1">SIAPKK</a>
                            </li>
                            <li>
                                <a href="https://sidamkar.kemendagri.go.id/" class="btn btn-sm btn-primary btn-pills mb-1">SiDamkar</a>
                            </li>
                            <li>
                                <a href="https://sarina.kemendagri.go.id/" class="btn btn-sm btn-primary btn-pills mb-1">Sarina</a>
                            </li>
                            <li>
                                <a href="https://payroll-adwil.kemendagri.go.id/login" class="btn btn-sm btn-primary btn-pills mb-1">Payroll</a>
                            </li>
                            <li>
                                <a href="https://ikm-adwil.kemendagri.go.id/login" class="btn btn-sm btn-primary btn-pills mb-1">IKM</a>
                            </li>
                            <li>
                                <a href="https://jf-polpp.kemendagri.go.id/" class="btn btn-sm btn-primary btn-pills mb-1">JFPolPP</a>
                            </li>
                            <li>
                                <a href="https://kodewilayah.kemendagri.go.id/" class="btn btn-sm btn-primary btn-pills mb-1">Kode Wilayah</a>
                            </li>
                            <li>
                                <a href="https://profilpulau.kemendagri.go.id/" class="btn btn-sm btn-primary btn-pills mb-1">Pulau</a>
                            </li>
                            <li>
                                <a href="https://spm.bangda.kemendagri.go.id/2021/home" class="btn btn-sm btn-primary btn-pills mb-1">Trantibumlinmas</a>
                            </li>
                            <li>
                                <a href="https://emonev-dpmptsp.kemendagri.go.id/" class="btn btn-sm btn-primary btn-pills mb-1">DPMPTSP</a>
                            </li>
                            <li>
                                <a href="https://puu-adwil.kemendagri.go.id/" class="btn btn-sm btn-primary btn-pills mb-1">PUU</a>
                            </li>
                            <li>
                                <a href="https://siratu.kemendagri.go.id/" class="btn btn-sm btn-primary btn-pills mb-1">Siratu</a>
                            </li>
                            <li>
                                <a href="https://pagarspmbencana.kemendagri.go.id/" class="btn btn-sm btn-primary btn-pills mb-1">Pagar SPM Bencana</a>
                            </li>
                            <li>
                                <a href="https://satpolpp.kemendagri.go.id/" class="btn btn-sm btn-primary btn-pills mb-1">SimpolPP</a>
                            </li>
                            <li>
                                <a href="https://ditjenbinaadwil.kemendagri.go.id/" class="btn btn-sm btn-primary btn-pills mb-1">Ditjen Bina Adwil</a>
                            </li>
                            <li>
                                <a href="https://cloud-adwil.kemendagri.go.id/" class="btn btn-sm btn-primary btn-pills mb-1">Cloud keuangan</a>
                            </li>
                            <li>
                                <a href="https://index-suburusanbencana.kemendagri.go.id/" class="btn btn-sm btn-primary btn-pills mb-1">Index Bencana</a>
                            </li>    
                            <li>
                                <a href="https://simpeg-adwil.kemendagri.go.id/" class="btn btn-sm btn-primary btn-pills mb-1">Simpeg Adwil</a>
                            </li>         
                            <li>
                                <a href="https://registrasi-sidamkar.kemendagri.go.id/" class="btn btn-sm btn-primary btn-pills mb-1">Registrasi Sidamkar</a>
                            </li>
                            <li>
                                <a href="https://pertanahan.kemendagri.go.id/" class="btn btn-sm btn-primary btn-pills mb-1">Pertanahan</a>
                            </li>              
                        </ul>
                    </li>
                    @endif
                    
					<li><a href="{{route('profile')}}" class="btn btn-dongker">Profile</a></li>
					<li>
						<a class="btn btn-dongker" href="{{ route('logout') }}"
							onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
							Logout
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</li>
				</ul>
				<!-- </div> -->
			</div>
			
			<div class="main">
				<div class="topbar">
						
						<div class="toggle col-md-1"  id="menuNav">
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
								Selamat Datang {{Auth::user()->nama}},<br>
                                @php
									$str="select nama from tbm_level where id=".Auth::user()->level;
									$data_level=DB::select($str);
									foreach($data_level as $item){
										echo $item->nama;
									}
								@endphp
							</div>
						</div>
					
				</div>
				<div class="row mb-3">
		            <div class="col-md-12">
					<a href="javascript:history.back()" class="btn btn-danger"><i class="fas fa-backspace"></i> &nbsp;Back</a>
		            </div>
		        </div>
				<div class="row">
					<div class="col-md-5 p-2 font-tebala" style="background-color:#ebebeb;">
						Target Capaian
					</div>
					<div class="col-md-6 p-2 font-tebala" style="background-color:#ebebeb;text-align:right">
						Master > Target Capaian
					</div>
				</div>
				<div class="row">
					<div class="col-md-11 p-2" style="background-image: linear-gradient(to right, rgba(204,204,255,0.7) , rgba(175, 235, 231, 0.7));">
						<div class="row">
							<div class="col-md-11 font-tebala font-tebal">
								Informasi Cascading Output
							</div>
						</div>
						<div class="row">
							<div class="col-md-2 font-tebal">
								Tahun
							</div>
							<div class="col-md-10 font-tebal">
								<font class="font-tebala">{{$tahun}}</font>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2 font-tebal">
								K/L
							</div>
							<div class="col-md-10 font-tebal">
								<font class="font-tebala">[00]</font>-Kementerian Dalam Negeri
							</div>
						</div>
						<div class="row">
							<div class="col-md-2 font-tebal">
								UK Eselon I
							</div>
							<div class="col-md-10 font-tebal">
								<font class="font-tebala">[04]</font>-Ditjen Bina Administrasi Kewilayahan
							</div>
						</div>
						@if(!empty($data_sp))
						<div class="row">
							<div class="col-md-2 font-tebal">
								Program
							</div>
							<div class="col-md-10 font-tebal">
								<font class="font-tebala">[CM]</font>-Program pembinaan kapasitas pemerintahan dan desa
							</div>
						</div>
						<div class="row">
							<div class="col-md-2 font-tebal">
								Sasaran Program
							</div>
							<div class="col-md-10 font-tebal">
								@foreach($data_sp as $item)
									<table cellpadding=5>
										<tr>
											<td valign=top><nobr><font class="font-tebala">[{{$item->kode}}]</font>-</td>
											<td valign=top>{{$item->nama}}</td>
										</tr>
									</table>
								@endforeach
							</div>
						</div>
						@endif
						@if(!empty($data_ikp))
						<div class="row">
							<div class="col-md-2 font-tebal">
								Indikator Kinerja Program
							</div>
							<div class="col-md-10 font-tebal">
								@foreach($data_ikp as $item)
									<table cellpadding=5>
										<tr>
											<td valign=top><nobr><font class="font-tebala">[{{$item->kode}}]</font>-</td>
											<td valign=top>{{$item->nama}}</td>
										</tr>
									</table>
								@endforeach
							</div>
						</div>
						@endif
						@if(!empty($data_keg))
						<div class="row">
							<div class="col-md-2 font-tebal">
								Kegiatan
							</div>
							<div class="col-md-10 font-tebal">
								@foreach($data_keg as $item)
									<table cellpadding=5>
										<tr>
											<td valign=top><nobr><font class="font-tebala">[{{$item->kode}}]</font>-</td>
											<td valign=top>{{$item->nama}}</td>
										</tr>
									</table>
								@endforeach
							</div>
						</div>
						@endif
						@if(!empty($data_ikk))
						<div class="row">
							<div class="col-md-2 font-tebal">
								Indikator Kinerja Kegiatan
							</div>
							<div class="col-md-10 font-tebal">
								@foreach($data_ikk as $item)
									<table cellpadding=5>
										<tr>
											<td valign=top><nobr><font class="font-tebala">[{{$item->kode}}]</font>-</td>
											<td valign=top>{{$item->nama}}</td>
										</tr>
									</table>
								@endforeach
							</div>
						</div>
						@endif
						@if(!empty($data_kro))
						<div class="row">
							<div class="col-md-2 font-tebal">
								Klasifikasi RO
							</div>
							<div class="col-md-10 font-tebal">
								@foreach($data_kro as $item)
									<table cellpadding=5>
										<tr>
											<td valign=top><nobr><font class="font-tebala">[{{$item->kode}}]</font>-</td>
											<td valign=top>{{$item->nama}}</td>
										</tr>
									</table>
								@endforeach
							</div>
						</div>
						@endif
						@if(!empty($data_ro))
						<div class="row">
							<div class="col-md-2 font-tebal">
								Rincian Output
							</div>
							<div class="col-md-10 font-tebal">
								@foreach($data_ro as $item)
									<table cellpadding=5>
										<tr>
											<td valign=top><nobr><font class="font-tebala">[{{$item->kode}}]</font>-</td>
											<td valign=top>{{$item->nama}}</td>
										</tr>
									</table>
								@endforeach
							</div>
						</div>
						@endif
						@if(!empty($data_komponen))
						<div class="row">
							<div class="col-md-2 font-tebal">
								Komponen
							</div>
							<div class="col-md-10 font-tebal">
								@foreach($data_komponen as $item)
									<table cellpadding=5>
										<tr>
											<td valign=top><nobr><font class="font-tebala">[{{$item->kode}}]</font>-</td>
											<td valign=top>{{$item->nama}}</td>
										</tr>
									</table>
								@endforeach
							</div>
						</div>
						@endif
						@if($kode_subkomponen!='')
						<div class="row">
							<div class="col-md-2 font-tebal">
								Sub Komponen
							</div>
							<div class="col-md-10 font-tebal"><font class="font-tebala">[{{$kode_subkomponen}}]</font></div>
						</div>
						@endif
					</div>
				</div>
				<div style="height:10px"></div>
				<div class="row">
					<div class="col-sm-7 table-responsive">
						<div class="row">
							<div class="" style="background-color:rgba(255,255,255,0.6)">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group row required">
											<div class="col-sm-3 p-2 font-tebala" style="background-color:#ebebeb">
												Input Target Capaian
											</div>
											<div class="col-sm-9" style="border-bottom:2px #ebebeb solid"></div>
										</div>
									</div>
								</div>
								@php
									$id_matriks='';
									$co_volume='';
									$co_satuan='';
									$to_volume='';
									$to_satuan='';
									$proses_kinerja='';
									$pemanfaatan='';
									$pemanfaatan_ket='';
									$kendala_sts=0;
									$kendala='';
									$tinjut='';
									foreach($data as $item){
										$id_matriks=$item->id;
										$co_volume=$item->co_volume;
										$co_satuan=$item->co_satuan;
										$to_volume=$item->to_volume;
										$to_satuan=$item->to_satuan;
										$proses_kinerja=$item->persen_kinerja;
										$pemanfaatan=$item->pemanfaatan;
										$pemanfaatan_ket=$item->pemanfaatan_ket;
										$kendala=$item->kendala;
										$tinjut=$item->tinjut;
									}
								@endphp
								
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group row">
											<div class="col-6 p-2">
												<label class="control-label normal">Level</label>
												<input name="tipe" id="tipe" value="{{$pg}}"  class="form-control normal text-uppercase" readonly/>
												<input type=hidden name=id_matriks id=id_matriks value="{{$id_matriks}}">
												<input type=hidden name=kode_dir id=kode_dir value="{{$kd_dir}}">
												<input type=hidden name=kode_subdir id=kode_subdir value="{{$kd_subdir}}">
												<input type=hidden name=kode_kegiatan id=kode_kegiatan value="{{$kode_kegiatan}}">
												<input type=hidden name=kode_output id=kode_output value="{{$kode_output}}">
												<input type=hidden name=kode_suboutput id=kode_suboutput value="{{$kode_suboutput}}">
												<input type=hidden name=kode_komponen id=kode_komponen value="{{$kode_komponen}}">
												<input type=hidden name=direktorat id=direktorat value="{{$direktorat}}">
				                            </div>
				                            <div class="col-6 p-2">
												<label class="control-label normal">Kode</label>
												<input name="kode" id="kode" value="{{$kode}}"  class="form-control normal text-uppercase" readonly/>
				                            </div>
										</div>
										<div class="form-group row">
				                            <div class="col-4 p-2">
				                                <label class="control-label normal">&nbsp;Tahun</label>
												<input name="tahun" id="tahun" value="{{$tahun}}"  class="form-control normal text-uppercase" readonly/>
				                            </div>
										</div>
										<div class="form-group row required">
											<div class="col-6 p-2">
												<label class="control-label normal">Target</label>
												<input name="co_volume" id="co_volume" value="{{$co_volume}}"  class="form-control normal" onkeypress="return /[0-9]/i.test(event.key)"/>
											</div>
				                            <div class="col-6 p-2">
												<label class="control-label normal">Satuan</label>
												<input name="co_satuan" id="co_satuan"  value="{{$co_satuan}}"  class="form-control normal" />
				                            </div>
										</div>
										<div>
											<br>
												<a href="javascript:f_simpan()" class="btn btn-success btn-sm p-2" style="border-radius:50px;"><font style="font-size:12pt;font-weight:550;color:#fff">&nbsp;&nbsp;Simpan&nbsp;&nbsp;</font></a>&nbsp;
												<a href="javascript:history.back()" class="btn btn-warning btn-sm p-2" style="border-radius:50px;"><font style="font-size:12pt;font-weight:550;color:#fff">&nbsp;&nbsp;Batal&nbsp;&nbsp;</font></a>
											<br><br>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="overlay">
		  <div class="cv-spinner">
		    <span class="spinner"></span>
		  </div>
		</div>
		<form name=frmto id=frmto></form>
		<script>
			g_submit=0
			function gosubmit(){
				if(g_submit==0){
					g_submit=1;
					return true
				}
				else{
					alert('Submit data is on progress...')
					return false
				}
			}
			function f_simpan(){
				if(gosubmit()){
					$("#overlay").fadeIn(300);
					f_simpanx();
				}
			}
			function f_simpanx(){
				var tipe=$("#tipe").val()
				var id_matriks=$("#id_matriks").val()
				var kode=$("#kode").val()
				var kode_dir=$("#kode_dir").val()
				var kode_subdir=$("#kode_subdir").val()
				var kode_kegiatan=$("#kode_kegiatan").val()
				var kode_output=$("#kode_output").val()
				var kode_suboutput=$("#kode_suboutput").val()
				var kode_komponen=$("#kode_komponen").val()
				var bulan=$("#bulan").val()
				var tahun=$("#tahun").val()
				var co_volume=$("#co_volume").val()
				var co_satuan=$("#co_satuan").val()
				
				var form_data = new FormData();
				form_data.append('id_matriks', id_matriks);
				form_data.append('tipe', tipe);
				form_data.append('kode', kode);
				form_data.append('kode_dir', kode_dir);
				form_data.append('kode_subdir', kode_subdir);
				form_data.append('kode_kegiatan', kode_kegiatan);
				form_data.append('kode_output', kode_output);
				form_data.append('kode_suboutput', kode_suboutput);
				form_data.append('kode_komponen', kode_komponen);
				form_data.append('bulan', bulan);
				form_data.append('tahun', tahun);
				form_data.append('co_volume', co_volume);
				form_data.append('co_satuan', co_satuan);
				
        		form_data.append('_token', '{{csrf_token()}}')
				$.ajax({
		        url: "{{route('capaian.submit-input-target')}}",
		        type: "POST",
		        data: form_data,
		        cache: false,
		        processData: false,
		        contentType: false,
		        success: function (e)
		        {
					if(e.status == "success")
		            {
						swal({
		                    title: e.title,
		                    text:  e.message,
		                    type:  e.status
		                })
						document.location.href="{{route('capaian.capaian-output')}}/{{$mdl}}";
		            }
		            else
		            {
						g_submit=0;
						$("#overlay").hide();
		                msg=($.isArray(e.message)?e.message[0]+'':e.message)
						swal({
			                    title: e.title+'',
			                    text:  msg,
			                    type:  'error'
			                })
		            }
		        }});
			}
			function f_pengajuantu(){
				$("#status").val(1);
				f_simpan();
			}
			
			$(".select2").select2({
                theme: 'bootstrap4'
            })
			
			// menu togle
			let toggle = document.querySelector('.toggle');
			let navigation = document.querySelector('.navigation');
			let main = document.querySelector('.main');

			toggle.onclick = function(){
				navigation.classList.toggle('active');
				main.classList.toggle('active');
			}
			// add hovered class in selected list items 
			let list = document.querySelectorAll('.navigation li');
			function activelink(){
				list.forEach((item) =>
				item.classList.remove('hovered'));
				this.classList.add('hovered');
			}
			list.forEach((item) =>
			item.addEventListener('mouseover', activelink));
			
		</script>
        
    </body>
</html>
