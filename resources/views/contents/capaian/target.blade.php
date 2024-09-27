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
					</div>
				</div>
				<div style="height:10px"></div>
				<form id="caput_form" name="caput_form" action="{{ route('capaian.target-capaian-output') }}" method="POST">
	                 @csrf
					 <input type=hidden name=kd_dir id=kd_dir value="{{$kd_dir}}">
					 <input type=hidden name=kd_subdir id=kd_subdir value="{{$kd_subdir}}">
					 <input type=hidden name=kd id=kd>
					 <input type=hidden name=kode id=kode>
					 <input type=hidden name=pg id=pg>
					 <input type=hidden name=cpg id=cpg value="{{$pg}}">
					 <input type=hidden name=komponen id=komponen value="{{$komponen}}">
					 <input type=hidden name=subkomponen id=subkomponen>
					 <input type=hidden name=bulan id=bulan>
					 <input type=hidden name=tahun id=tahun value="{{$tahun}}">
					 <input type=hidden name=kd_kro id=kd_kro value="{{$kd_kro}}">
	            </form>
				<script>
					g_pg="{{$pg}}";
					const findLabel = (labels, evt) => {
					    let found = false;
					    let res = null;
					    labels.forEach(label => {
					        if (evt.x > label.x && evt.x < label.x2 && evt.y > label.y && evt.y < label.y2) {
					            res = {
					                label: label.label,
					                index: label.index
					            };
					            found = true;
					        }
					    });
					    return [found, res];
					};
					const getLabelHitBoxes = (x) => {
					    return x._labelItems.map((e, i) => ({
					        x: e.options.translation[0] - x._labelSizes.widths[i],
					        x2: e.options.translation[0] + x._labelSizes.widths[i] / 2,
					        y: e.options.translation[1] - x._labelSizes.heights[i] / 2,
					        y2: e.options.translation[1] + x._labelSizes.heights[i] / 2,
					        label: e.label,
					        index: i
					    }));
					};
					const plugin = {
					    id: 'chartClickXLabel',
					    afterEvent: (chart, event, opts) => {
					        const evt = event.event;
					        if (evt.type !== 'click') {
					            return;
					        }
							kode='';
							if(g_pg=="komponen"){
								komponen=chart.canvas.id.replace('graph','');
								kode=$("#kode_"+komponen).val()
								komponen=komponen.replace(/_/g,'.');
								kd=komponen;
								//$("#komponen").val(komponen);
							}
							else if(g_pg=="subkomponen"){
								subkomponen=chart.canvas.id.replace('graph','');
								kode=$("#kode_"+subkomponen).val()
								kd=subkomponen
								//$("#subkomponen").val(subkomponen);
							}
					        const [found, labelInfo] = findLabel(getLabelHitBoxes(chart.scales.x), evt);
					        if (found) {
								$("#kd").val(kd);
								$("#kode").val(kode);
								$("#kd_dir").val({{$kd_dir}});
								$("#bulan").val(labelInfo.index);
								//alert('kd:'+kd+', kode:'+kode+',kd_dir:'+$("#kd_dir").val())
								document.caput_form.action="{{route('capaian.input-target')}}"
								document.caput_form.submit();
								//parent.document.location.href="https://google.co.id"
					            //alert(labelInfo.index);
					            //opts.listeners.click();
								//alert(labelInfo)
					        }
					    }
					};
				</script>
				<form namr=frm1>
				<div class="row">
					<div class="col-md-11" style="background-image: linear-gradient(to right, rgba(204,204,255,0.7) , rgba(175, 235, 231, 0.7));"><br>
						<table cellpadding=3 class="tbl_caput" width=100%>
							<tr>
								<td rowspan=2 width=7% align=center><div class="hd_caputa">+</div></td>
								<td rowspan=2 class="hd_caput" width=20% align=center>Kode dan Nomenklatur<br>{{$judul}}</td>
								<td rowspan=2 class="hd_caput" width=10% align=center>Capaian Output<br>(% kumulatif)</td>
								<td class="hd_caput" width=24% colspan=3 align=center>Anggaran</td>
								<td rowspan=2 class="hd_caput" width="absolute" align=center>Capaian Output</td>
							</tr>
							<tr>
								<td align=center class="hd_caput" width=8% align=center>Alokasi</td>
								<td align=center class="hd_caput" width=8% align=center>Realisasi</td>
								<td align=center class="hd_caput" width=8% align=center>%</td>
							</tr>
							@foreach($caput_data as $caput_value)
						<tr>
							<td align=center><div class="isi_caputa">{!! $caput_value->plus !!}</div></td>
							<td><div class="isi_caput">{!! $caput_value->nomenklatur !!}</div></td>
							<td><div class="isi_caput">{{$caput_value->akum_pct}}</div></td>
							<td><div class="isi_caput">{{$caput_value->pagu}}</div></td>
							<td><div class="isi_caput">{{$caput_value->realisasi}}</div></td>
							<td><div class="isi_caput">{{$caput_value->pct_ang}}</div></td>
							<td>
								<div class="chart-box" style="height:90px; width:100%;">
			                        <canvas id="graph{{$caput_value->kdgraph}}"></canvas>
			                    </div>
							</td>
						</tr>
						<input type=hidden id="kode_{{$caput_value->kdgraph}}" name="kode_{{$caput_value->kdgraph}}" value="{{$caput_value->kode}}">
						<script>
							const graph{{$caput_value->kdgraph}} = document.getElementById('graph{{$caput_value->kdgraph}}');
							
							new Chart(graph{{$caput_value->kdgraph}}, {
								type: 'bar',
				                data: {
				                    responsive:false,
				                    maintainAspectRatio: false,
				                    labels: ["JAN","FEB","MAR","APR","MEI","JUN","JUL","AGU","SEP","OKT","NOV","DES"],
				                    datasets: [{
				                        data: ["{{$caput_value->bulan_jan}}","{{$caput_value->bulan_feb}}","{{$caput_value->bulan_mar}}","{{$caput_value->bulan_apr}}","{{$caput_value->bulan_mei}}","{{$caput_value->bulan_jun}}","{{$caput_value->bulan_jul}}","{{$caput_value->bulan_agu}}","{{$caput_value->bulan_sep}}","{{$caput_value->bulan_okt}}","{{$caput_value->bulan_nov}}","{{$caput_value->bulan_des}}"],
				                        backgroundColor: ["#005ebb"],
				                    },
									{
				                        data: ["{{$caput_value->bulan_jan_sisa}}","{{$caput_value->bulan_feb_sisa}}","{{$caput_value->bulan_mar_sisa}}","{{$caput_value->bulan_apr_sisa}}","{{$caput_value->bulan_mei_sisa}}","{{$caput_value->bulan_jun_sisa}}","{{$caput_value->bulan_jul_sisa}}","{{$caput_value->bulan_agu_sisa}}","{{$caput_value->bulan_sep_sisa}}","{{$caput_value->bulan_okt_sisa}}","{{$caput_value->bulan_nov_sisa}}","{{$caput_value->bulan_des_sisa}}"],
				                        backgroundColor: ["#48C3FE"],
										pointRadius: 0,
									    pointHitRadius: 0
				                    }],
				                },
				                options: {
									maintainAspectRatio: false,
				                    plugins: {
				                        legend: {
				                            display: false,
				                        }
				                    },
									scales: {
								        x: {
								        	stacked: true,
								        },
								        y: {
											stacked: true,
											beginAtZero: true,
								            min: 0,
								            max: 100,
											ticks: {
									          stepSize: 20
									        },
											grid: {
									        	display: false
									      	}
								        }
								    },
				                }
				            });
							@if($pg=="komponen"||$pg=="subkomponen")
								Chart.register(plugin);
							@endif
						</script>
						@endforeach
						</table><br>
					</div>
				</div>
				</form>
			</div>
		</div>

		<script>
			function goto(pg,kd_dir,kd_subdir,kd){
				$("#kd_dir").val(kd_dir);
				$("#kd_subdir").val(kd_subdir);
				$("#pg").val(pg);
				$("#kd").val(kd);
				document.caput_form.submit();
			}
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
