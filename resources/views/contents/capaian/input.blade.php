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
                        <a href="{{ route('tes.index') }}" class="btn btn-dongker">Realisasi Anggaran</a>
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
						@if($mdl=='ro')
							Rincian Output
						@elseif($mdl=='tc')
							Target Capaian
						@else
							Komponen Input
						@endif
					</div>
					<div class="col-md-6 p-2 font-tebala" style="background-color:#ebebeb;text-align:right">
						@if($mdl=='ro')
							Capaian Output > Capaian Pusat > Rincian Output
						@elseif($mdl=='tc')
							Master > Target Capaian
						@else
							Capaian Output > Capaian Pusat > Komponen Input
						@endif
					</div>
				</div>
				@if($errtanggalisi!='')
					<br><font color=red style="font-weight:450">{{$errtanggalisi}}</font>
				@else
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
												<td valign=top><a href="javascript:goto('kro','{{$kd_dir}}','{{$kd_subdir}}','{{$kodeb_kegiatan}}','{{$kodea_kegiatan}}')" style="text-decoration:none">{{$item->nama}}</a></td>
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
												<td valign=top><a href="javascript:goto('ro','{{$kd_dir}}','{{$kd_subdir}}','{{$kodeb_kro}}','{{$kodea_kro}}')" style="text-decoration:none">{{$item->nama}}</a></td>
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
												<td valign=top><a href="javascript:goto('komponen','{{$kd_dir}}','{{$kd_subdir}}','{{$kodeb_ro}}','{{$kodea_ro}}')" style="text-decoration:none">{{$item->nama}}</a></td>
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
							@if($act=='view'||$act=='validasi')
							<div class="row">
								<div class="col-md-4 font-tebal">
									<br>
									<a href="#" class="btn btn-secondary btn-sm p-2" style="border-radius:50px;"><font style="font-size:12pt;font-weight:550;color:#fff">&nbsp;&nbsp;Download Data Pembanding&nbsp;&nbsp;</font></a>&nbsp;
									<br>
								</div>
							</div>
							@endif
						</div>
					</div>
					<div style="height:10px"></div>
					<form id="caput_form" name="caput_form" action="{{ route('capaian.capaian-output') }}" method="POST">
		                 @csrf
						 <input type=hidden name=kd_dir id=kd_dir value="{{$kd_dir}}">
						 <input type=hidden name=kd_subdir id=kd_subdir value="{{$kd_subdir}}">
						 <input type=hidden name=kd id=kd>
						 <input type=hidden name=kode class="kode">
						 <input type=hidden name=pg id=pg>
						 <input type=hidden name=mdl id=mdl value="{{$mdl}}">
						 <input type=hidden name=kodea_kegiatan id=kodea_kegiatan value="{{$kodea_kegiatan}}">
						 <input type=hidden name=kodea_kro id=kodea_kro value="{{$kodea_kro}}">
						 <input type=hidden name=kodea_ro id=kodea_ro value="{{$kodea_ro}}">
						 <input type=hidden name=kodea_komponen id=kodea_komponen value="{{$kodea_komponen}}">
						 <input type=hidden name=kodeb_kegiatan id=kodeb_kegiatan value="{{$kodeb_kegiatan}}">
						 <input type=hidden name=kodeb_kro id=kodeb_kro value="{{$kodeb_kro}}">
						 <input type=hidden name=kodeb_ro id=kodeb_ro value="{{$kodeb_ro}}">
						 <input type=hidden name=kodeb_komponen id=kodeb_komponen value="{{$kodeb_komponen}}">
					</form>
					<div class="row">
						<div class="col-sm-7 table-responsive">
							<div class="row">
								<div class="" style="background-color:rgba(255,255,255,0.6)">
									<div class="row">
										<div class="col-md-12" style="border-right:1px #808080 solid">
											<div class="form-group row required">
												<div class="col-sm-3 p-2 font-tebala" style="background-color:#ebebeb">
													Input Capaian Output
												</div>
												<div class="col-sm-3" style="border-bottom:2px #ebebeb solid"></div>
											</div>
										</div>
									</div>
									@php
										$id_matriks='';
										$co_volume='';
										$co_satuan='';
										$to_volume='';
										$to_satuan='';
										$to_pct='';
										$proses_kinerja='';
										$pemanfaatan='';
										$pemanfaatan_ket='';
										$kendala_sts=0;
										$kendala='';
										$tinjut='';
										$evidence='';
										$evidence_file='';
										if($data){
											$id_matriks=$data->id;
											$co_volume=$data->co_volume;
											$co_satuan=$data->co_satuan;
											$to_volume=$data->to_volume;
											$to_satuan=$data->to_satuan;
											$to_pct=$data->to_pct;
											$proses_kinerja=$data->persen_kinerja;
											$pemanfaatan=$data->pemanfaatan;
											$pemanfaatan_ket=$data->pemanfaatan_ket;
											$kendala=$data->kendala;
											$tinjut=$data->tinjut;
											$evidence=$data->evidence;
										}
										else{
											$co_volume=$target_volume;
											$co_satuan=$target_satuan;
										}
										if($evidence!=''){
											$evidence_file=route('download.dokumen-capaian',['id_dir'=>$kd_dir,'jenis_file'=>'evidence','nama_file'=>$evidence]);
										}
									@endphp
									
									@if($act=='input')
										<div class="row">
											<div class="col-md-12" style="border-right:1px #808080 solid">
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
														<input type=hidden name=evidence_old id=evidence_old value="{{$evidence}}">
														<input type=hidden name=status_old id=status_old value="{{$status}}">
														<input type=hidden name=kd_kro id=kd_kro value="{{$kd_kro}}">
														<input type=hidden name=cpg id=cpg value="{{$pg}}">
														<input type=hidden name=target_totala id=target_totala value="{{$target_totala}}">
						                            </div>
						                            <div class="col-6 p-2">
														<label class="control-label normal">Kode</label>
														<input id="kode" value="{{$kode}}"  class="form-control normal text-uppercase" readonly/>
						                            </div>
												</div>
												<div class="form-group row">
													<div class="col-8 p-2">
						                                <label class="control-label normal">&nbsp;Bulan</label>
														<input value="{{$bulan_nm}}"  class="form-control normal text-uppercase" readonly/>
														<input type=hidden name="bulan" id="bulan" value="{{$bulan}}">
						                            </div>
						                            <div class="col-4 p-2">
						                                <label class="control-label normal">&nbsp;Tahun</label>
														<input name="tahun" id="tahun" value="{{$tahun}}"  class="form-control normal text-uppercase" readonly/>
						                            </div>
												</div>
												<div class="form-group row required">
													<div class="col-6 p-2">
														<label class="control-label normal">Target 1 Tahun</label>
														<input name="co_volume" id="co_volume" value="{{$co_volume}}"  class="form-control normal" readonly />
													</div>
						                            <div class="col-6 p-2">
														<label class="control-label normal">Satuan</label>
														<input name="co_satuan" id="co_satuan"  value="{{$co_satuan}}"  class="form-control normal" readonly />
						                            </div>
												</div>
												<div class="form-group row">
													<div class="col-6 p-2">
														<label class="control-label normal">Progres Capaian Target</label>
														<input name="to_volume" id="to_volume" value="{{$to_volume}}" class="form-control normal" onchange="f_progcapaian()"  onkeypress="return /[0-9]/i.test(event.key)"/>
													</div>
						                            <div class="col-6 p-2">
														<label class="control-label normal">Persentase Capaian</label>
														<input name="to_pct" id="to_pct" value="{{$to_pct}}"  class="form-control normal" readonly/>
						                            </div>
												</div>
												<div class="form-group row required p-2  required">
													<div class="col-6 p-2">
														<label class="control-label normal">Upload Evidence <small>(Maksimal 2MB)</small></label>
														<input type=file name="evidence" id="evidence" class="form-control normal"/>
														@if($evidence_file!='')
															<a href="{{$evidence_file}}" target="_blank" style="text-decoration:none"><font style="color:red;font-weight:450;"><i class="far fa-file"></i> {{$evidence}}</font></a>
														@endif
													</div>
						                            <div class="col-6 p-2">
						                                <label class="control-label normal">Realisasi</label>
														<label class="form-control normal">{{$realisasi}}</label>
						                            </div>
												</div>
												<div class="form-group row">
													<div class="col-6 p-2">
						                                <label class="control-label normal">&nbsp;Kategori Proses Pelaksanaan</label>
						                                <select class="form-control normal" id="pemanfaatan" name="pemanfaatan">
															<option value="">-Pilih-</option>
						                                    <option value="Perencanaan (1-10%)" {{($pemanfaatan=="Perencanaan (1-10%)"?"selected":"")}}>Perencanaan (1-10%)</option>
						                                    <option value="Persiapan (11-15%)" {{($pemanfaatan=="Persiapan (11-15%)"?"selected":"")}}>Persiapan (11-15%)</option>
						                                    <option value="Pelaksanaan (26-99%)" {{($pemanfaatan=="Pelaksanaan (26-99%)"?"selected":"")}}>Pelaksanaan (26-99%)</option>
						                                    <option value="Selesai (100%)" {{($pemanfaatan=="Selesai (100%)"?"selected":"")}}>Selesai (100%)</option>
						                                </select>
						                            </div>
						                            <div class="col-6 p-2">
						                                <label class="control-label normal">&nbsp;Keterangan</label>
														<textarea class="form-control normal" name="pemanfaatan_ket" id="pemanfaatan_ket">{{$pemanfaatan_ket}}</textarea>
						                            </div>
												</div>
												<div class="form-group row">
						                            <div class="col-6 p-2">
														<label class="control-label normal">Persentase Proses Pelaksanaan</label>
														<input name="proses_kinerja" id="proses_kinerja" value="{{$proses_kinerja}}"  class="form-control normal" onchange="f_chgkinerja()" onkeypress="return /[0-9]/i.test(event.key)"/>
						                            </div>
												</div>
												<div class="form-group row p-2">
					                                <label class="control-label normal">&nbsp;Kendala</label>
													<textarea class="form-control normal" name="kendala" id="kendala" id="kendala">{{$kendala}}</textarea>
												</div>
												<div class="form-group row p-2">
													<label class="control-label normal">Tindak Lanjut</label>
													<textarea class="form-control normal" name="tinjut" id="tinjut" id="tinjut">{{$tinjut}}</textarea>
												</div>
												<div class="form-group row">
													<div class="col-6 p-2" required>
						                                <label class="control-label normal">&nbsp;Status</label>
						                                <select class="form-control normal" id="status" name="status" onchange="f_chgStatus(this)">
															<option value="">-Pilih-</option>
															@if(Auth::user()->level==27){
																@if($count_approval<=1)
							                                    	<option value="0" {{($status==0?"selected":"")}}>Draft</option>
																@endif
							                                    <option value="1" {{($status==1?"selected":"")}}>Pengajuan persetujuan</option>
															@elseif(Auth::user()->level==0){
																@if($status==4)
								                                    <option value="7" {{($status==7?"selected":"")}}>Setuju</option>
								                                    <option value="8" {{($status==8?"selected":"")}}>Perbaikan</option>
																@else
								                                    <option value="6" {{($status==6?"selected":"")}}>Draft</option>
								                                    <option value="7" {{($status==7?"selected":"")}}>Setuju</option>
																@endif
															@endif
						                                </select>
														<input type=hidden name=count_approval id=count_approval value="{{$count_approval}}">
						                            </div>
												</div>
												<div class="form-group row perbaikan d-none">
					                            	<div class="col-12 p-2">
														<label class="control-label normal">Catatan Perbaikan</label>
														<textarea class="form-control normal" name="note_perbaikan" id="note_perbaikan" id="note_perbaikan"></textarea>
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
									@endif
									
									@if($act=='view'||$act=='validasi')
										<div class="row">
											<div class="col-md-12" style="border-right:1px #808080 solid">
												<div class="form-group row">
													<div class="col-6 p-2">
														<label class="control-label normal">Level</label>
														<label class="form-control normal text-uppercase">{{$pg}}</label>">
														<input type=hidden name=kode_dir id=kode_dir value="{{$kd_dir}}">
														<input type=hidden name=kode_subdir id=kode_subdir value="{{$kd_subdir}}">
														<input type=hidden name=cpg id=cpg value="{{$pg}}">
						                            </div>
						                            <div class="col-6 p-2">
														<label class="control-label normal">Kode</label>
														<label class="form-control normal text-uppercase">{{$kode}}</label>
						                            </div>
												</div>
												<div class="form-group row">
													<div class="col-6 p-2">
						                                <label class="control-label normal">Bulan</label>
														<label class="form-control normal text-uppercase">{{$bulan_nm}}</label>
						                            </div>
						                            <div class="col-6 p-2">
						                                <label class="control-label normal">Tahun</label>
														<label class="form-control normal text-uppercase">{{$tahun}}</label>
						                            </div>
												</div>
												<div class="form-group row required">
													<div class="col-6 p-2">
														<label class="control-label normal">Target</label>
														<label class="form-control normal text-uppercase">{{$co_volume}}</label>
													</div>
						                            <div class="col-6 p-2">
														<label class="control-label normal">Satuan</label>
														<label class="form-control normal">{{$co_satuan}}</label>
						                            </div>
												</div>
												<div class="form-group row">
													<div class="col-6 p-2">
														<label class="control-label normal">Progres Capaian Target</label>
														<label class="form-control normal text-uppercase">{{$to_volume}}</label>
													</div>
						                            <div class="col-6 p-2">
														<label class="control-label normal">Persentase Capaian</label>
														<label class="form-control normal">{{$to_pct}}</label>
						                            </div>
												</div>
												<div class="form-group row required ">
													<div class="col-6 p-2">
														<label class="control-label normal">File Evidence</label>
														<label class="form-control normal">
															@if($evidence_file!='')
																<a href="{{$evidence_file}}" target="_blank" style="text-decoration:none"><font style="color:red;font-weight:450;"><i class="far fa-file"></i> {{$evidence}}</font></a>
															@endif
														</label>
													</div>
						                            <div class="col-6 p-2">
						                                <label class="control-label normal">Realisasi</label>
														<label class="form-control normal">{{$realisasi}}</label>
						                            </div>
												</div>
												<div class="form-group row">
													<div class="col-6 p-2">
						                                <label class="control-label normal">Proses Pelaksanaan</label>
														<label class="form-control normal text-uppercase">{{$pemanfaatan}}</label>
						                            </div>
						                            <div class="col-6 p-2">
						                                <label class="control-label normal">Keterangan</label>
														<label class="form-control normal">{{$pemanfaatan_ket}}</label>
						                            </div>
												</div>
												<div class="form-group row">
						                            <div class="col-12 p-2">
														<label class="control-label normal">Proses Kinerja</label>
														<label class="form-control normal">{{$proses_kinerja}}</label>
						                            </div>
												</div>
												<div class="form-group row">
						                            <div class="col-12 p-2">
						                                <label class="control-label normal">Kendala</label>
														<label class="form-control normal">{{$kendala}}</label>
						                            </div>
												</div>
												<div class="form-group row">
						                            <div class="col-12 p-2">
														<label class="control-label normal">Tindak Lanjut</label>
														<label class="form-control normal">{{$tinjut}}</label>
						                            </div>
												</div>
												@if($act=='validasi')
													<div class="form-group row">
														<div class="col-6 p-2" required>
							                                <label class="control-label normal">&nbsp;Status</label>
							                                <select class="form-control normal" id="status" name="status" onchange="f_chgStatus(this)">
																<option value="">-Pilih-</option>
																@if(Auth::user()->level==3){
								                                    <option value="2" {{($status==2?"selected":"")}}>Setuju</option>
								                                    <option value="3" {{($status==3?"selected":"")}}>Perbaikan</option>
																@elseif(Auth::user()->level==2){
								                                    <option value="4" {{($status==4?"selected":"")}}>Setuju</option>
								                                    <option value="5" {{($status==5?"selected":"")}}>Perbaikan</option>
																@endif
							                                </select>
															<input type=hidden name=id_matriks id=id_matriks value="{{$id_matriks}}">
							                            </div>
													</div>
													<div class="form-group row perbaikan d-none">
						                            	<div class="col-12 p-2">
															<label class="control-label normal">Catatan Perbaikan</label>
															<textarea class="form-control normal" name="note_perbaikan" id="note_perbaikan"></textarea>
														</div>
													</div>
													<div>
						                            	<div class="col-12 p-2">
															<br>
																<a href="javascript:f_validasi()" class="btn btn-success btn-sm p-2" style="border-radius:50px;"><font style="font-size:12pt;font-weight:550;color:#fff">&nbsp;&nbsp;Simpan&nbsp;&nbsp;</font></a>&nbsp;
																<a href="javascript:history.back()" class="btn btn-warning btn-sm p-2" style="border-radius:50px;"><font style="font-size:12pt;font-weight:550;color:#fff">&nbsp;&nbsp;Batal&nbsp;&nbsp;</font></a>
															<br><br>
														</div>
													</div>
												@endif
											</div>
										</div>
									@endif
								</div>
							</div>
						</div>
						<div class="col-sm-4 px-4">
							<div class="row">
								<div class="" style="background-color:rgba(255,255,255,0.6)">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row required">
												<div class="col-sm-6 p-2 font-tebala" style="background-color:#ebebeb">
													History file Evidence
												</div>
												<div class="col-sm-4" style="border-bottom:2px #ebebeb solid"></div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 logfile"></div>
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="" style="background-color:rgba(255,255,255,0.6)">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row required">
												<div class="col-sm-6 p-2 font-tebala" style="background-color:#ebebeb">
													History of Approval
												</div>
												<div class="col-sm-4" style="border-bottom:2px #ebebeb solid"></div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 logapproval"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
		<div id="overlay">
		  <div class="cv-spinner">
		    <span class="spinner"></span>
		  </div>
		</div>
		<form name=frmto id=frmto></form>
		<script>
		@if($errtanggalisi=='')
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
			function f_chgStatus(o){
				var s=$('#status :selected').text()
				if(s=='Perbaikan'){
					$('.perbaikan').removeClass("d-none");
				}
				else if(s=='Setuju'){
					$('.perbaikan').addClass("d-none");
				}
			}
			@if($act=='input')
				function f_progcapaian(){
					var pct=0;
					var target=$("#co_volume").val()
					var progcapaian=$("#to_volume").val()
					var target_totala=$("#target_totala").val()
					target=(target!=""?parseInt(target):0)
					progcapaian=(progcapaian!=""?parseInt(progcapaian):0)
					target_totala=(target_totala!=""?parseInt(target_totala):0)
					if(target>0){
						if(progcapaian>0){
							pct=((progcapaian+target_totala)/target)*100
							pct=pct.toFixed(2)
						}
						else{
							pct=(target_totala/target)*100
							pct=pct.toFixed(2)
						}
					}
					$("#to_pct").val(pct)
				}
				f_progcapaian()
				function f_chgkinerja(){
					var proseskinerja=$("#proses_kinerja").val()
					if(proseskinerja!=""){
						var pemanfaatan=$("#pemanfaatan").val()
						proseskinerja=(proseskinerja!=""?parseInt(proseskinerja):0)
						maks=0;
						switch(pemanfaatan){
							case "Perencanaan (1-10%)":maks=10;break;
							case "Persiapan (11-15%)":maks=15;break;
							case "Pelaksanaan (26-99%)":maks=99;break;
							case "Selesai (100%)":maks=100;break;
						}
						if(proseskinerja>maks){
							alert("Persen Kinerja harus sesuai dengan pelaksanaan")
							$("#proses_kinerja").val('');
						}
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
					var to_volume=$("#to_volume").val()
					var to_pct=$("#to_pct").val()
					var proses_kinerja=$("#proses_kinerja").val()
					var evidence_old=$("#evidence_old").val()
					var evidence=$('#evidence').prop('files')[0];
					var pemanfaatan=$("#pemanfaatan").val()
					var pemanfaatan_ket=$("#pemanfaatan_ket").val()
					var kendala=$("#kendala").val()
					var tinjut=$("#tinjut").val()
					var status=$('#status').val()
					var status_old=$('#status_old').val()
					var count_approval=$('#count_approval').val()
					var kd_kro=$('#kd_kro').val()
					var cpg=$('#cpg').val()
					var note_perbaikan=$("#note_perbaikan").val()
					
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
					form_data.append('to_volume', to_volume);
					form_data.append('to_pct', to_pct);
					form_data.append('proses_kinerja', proses_kinerja);
					form_data.append('evidence_old', evidence_old);
					form_data.append('evidence', evidence);
					form_data.append('pemanfaatan', pemanfaatan);
					form_data.append('pemanfaatan_ket', pemanfaatan_ket);
					form_data.append('kendala', kendala);
					form_data.append('tinjut', tinjut);
					form_data.append('status', status);
					form_data.append('status_old', status_old);
					form_data.append('count_approval', count_approval);
					form_data.append('kd_kro', kd_kro);
					form_data.append('cpg', cpg);
					form_data.append('note_perbaikan', note_perbaikan);
	        		form_data.append('_token', '{{csrf_token()}}')
					$.ajax({
			        url: "{{route('capaian.submit-input-capaian')}}",
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
			@endif
			
			@if($act=='validasi')
				
				function f_validasi(){
					if(gosubmit()){
						$("#overlay").fadeIn(300);
						f_validasix();
					}
				}
				function f_validasix(){
					var id_matriks=$("#id_matriks").val()
					var note_perbaikan=$("#note_perbaikan").val()
					var status=$("#status").val()
					var kode_dir=$("#kode_dir").val()
					var kode_subdir=$("#kode_subdir").val()
					var cpg=$('#cpg').val()
					
					var form_data = new FormData();
					form_data.append('id_matriks', id_matriks);
					form_data.append('kode_dir', kode_dir);
					form_data.append('kode_subdir', kode_subdir);
					form_data.append('note_perbaikan', note_perbaikan);
					form_data.append('status', status);
					form_data.append('cpg', cpg);
	        		form_data.append('_token', '{{csrf_token()}}')
					
					$.ajax({
			        url: "{{route('capaian.submit-validasi-capaian')}}",
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
			@endif
			
		    function loadlogfile()
		    {
		        $('.logfile').empty().load('{{route('capaian.log-file')}}?kd_dir={{$kd_dir}}&id_matriks={{$id_matriks}}')   
		    }
		    function loadlogapproval()
		    {
		        $('.logapproval').empty().load('{{route('capaian.log-approval')}}?id_matriks={{$id_matriks}}')   
		    }
			loadlogfile()
			loadlogapproval()
			
			function goto(pg,kd_dir,kd_subdir,kd,kode){
				$("#kd_dir").val(kd_dir);
				$("#kd_subdir").val(kd_subdir);
				$("#pg").val(pg);
				$("#kd").val(kd);
				$(".kode").val(kode);
				document.caput_form.submit();
			}
			
			$(".select2").select2({
                theme: 'bootstrap4'
            })
			
			@endif
			
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
