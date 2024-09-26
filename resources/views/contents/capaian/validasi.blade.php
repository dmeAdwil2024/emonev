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

        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('newdashboard/css/newstyles.css') }}?v={{ time() }}" />
		
		<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
		<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="{{env('APP_URL')}}/landing-pages/js/jquery-3.3.1.min.js"></script>
        <script src="{{env('APP_URL')}}/landing-pages/js/popper.min.js"></script>
        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- Chartjs -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
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
        <script src="{{env('APP_URL')}}/templates/plugins/datatables-buttons/js/buttons.colVis.min.js"></script><!-- Chartjs -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
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
								Bagian Perencanaan
							</div>
						</div>
					
				</div>
				<div class="row">
					<div class="col-md-5 p-2 font-tebala" style="background-color:#ebebeb;">
						Komponen Input
					</div>
					<div class="col-md-6 p-2 font-tebala" style="background-color:#ebebeb;text-align:right">
						Capaian Output > Capaian Pusat > Komponen Input
					</div>
				</div>
				<div style="height:10px"></div>
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
					</div>
				</div>
				<div style="height:10px"></div>
				<form id="caput_form" name="caput_form" action="{{ route('capaian.capaian-output') }}" method="POST">
	                 @csrf
	            </form>
				
				<div style="height:10px"></div>
				<div class="row">
					<div class="col-md-11 p-2" style="background-color:rgba(255,255,255,0.6)">
						<div class="row">
							<div class="col-md-11 p-2">
								<div class="row">
									<div class="col-md-8 p-2 font-tebala font-tebal">
										Capaian Output ({{$pg}})
									</div>
									<div class="col-md-4 p-2 font-tebala" style="background-color:#ebebeb;text-align:center">
								Presentase progress capaiaon RO sesuai dengan KI yang dibidangnya
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 font-tebal" style="background-color:#ebebeb;text-align:center">
										Progress Capaian Terhadap Target
									</div>
								</div>
								<div class="row">
									<div class="col-md-2 font-tebal" style="background-color:rgba(102,255,204,0.7);text-align:center">
										1
									</div>
									<div class="col-md-2 font-tebal" style="background-color:rgba(204,204,255,0.7);text-align:center">
										<font class="font-tebala">Kebijakan</font>
									</div>
								</div>
								<div style="height:10px"></div>
								<div class="row">
									<div class="col-md-4 font-tebal" style="background-color:#ebebeb;text-align:center">
										Realisasi Anggaran
									</div>
								</div>
								<div class="row">
									<div class="col-md-2 font-tebal" style="background-color:rgba(102,255,204,0.7);text-align:center">
										Rp. 123.456.789.123
									</div>
									<div class="col-md-2 font-tebal" style="background-color:rgba(204,204,255,0.7);text-align:center">
										<font class="font-tebala">Anggaran</font>
									</div>
								</div>
								<div style="height:10px"></div>
								<div class="row">
									<div class="col-md-4 font-tebal" style="background-color:#ebebeb;text-align:center">
										Progress Pelaksanaan
									</div>
									<div class="col-md-4 font-tebal" style="text-align:Left">
										Keterangan
									</div>
									<div class="col-md-4 font-tebal" style="text-align:center">
										<a href="javascript:history.back()" class="btn btn-success btn-sm p-2" style="border-radius:50px;"><font style="font-size:12pt;font-weight:550;color:#fff">&nbsp;&nbsp;Setuju&nbsp;&nbsp;</font></a>&nbsp;
										<a href="javascript:history.back()" class="btn btn-warning btn-sm p-2" style="border-radius:50px;"><font style="font-size:12pt;font-weight:550;color:#fff">&nbsp;&nbsp;Perbaikan&nbsp;&nbsp;</font></a>
									</div>
								</div>
								<div style="height:10px"></div>
								<div class="row">
									<div class="col-md-2 font-tebal" style="background-color:rgba(102,255,204,0.7);text-align:center">
										Perencanaan
									</div>
									<div class="col-md-2 font-tebal" style="background-color:rgba(204,204,255,0.7);text-align:center">
										<font class="font-tebala">%</font>
									</div>
									<div class="col-md-4 font-tebal" style="background-color:rgba(102,255,204,0.7);">
										:
									</div>
									<div class="col-md-4 font-tebal" style="text-align:center">
										catatan perbaikan
									</div>
								</div>
								<div style="height:10px"></div>
								<div class="row">
									<div class="col-md-4 font-tebal" style="background-color:#ebebeb;text-align:center">
										Permasalahan
									</div>
									<div class="col-md-4 font-tebal" style="text-align:Left">
										Keterangan
									</div>
									<div class="col-md-4 font-tebal" style="text-align:center">
										*Muncul ketika dikilk perbaikan
									</div>
								</div>
								<div style="height:10px"></div>
								<div class="row">
									<div class="col-md-4 font-tebal" >
										Tidak Ada Permasalahan
									</div>
									
									<div class="col-md-4 font-tebal" style="background-color:rgba(102,255,204,0.7);">
										:
									</div>
								</div>
								<div style="height:10px"></div>
								<div class="row">
									<div class="col-md-4 font-tebal" style="background-color:#ebebeb;text-align:center">
										Upload Evidence/Data Dukung
									</div>
								</div>
								<div style="height:10px"></div>
								<div class="row">
									<div class="col-md-4 font-tebal" >
										Klik untuk melihat dokumen
									</div>
									
									<div class="col-md-4 font-tebal" >
										Klik untuk membuka tautan
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
			</div>
		</div>

		<script>
			
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
