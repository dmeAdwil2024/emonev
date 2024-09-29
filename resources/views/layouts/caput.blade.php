<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $modul }} - {{ $current }}</title>
        <link rel="icon" type="image/png" href="{{env('APP_URL')}}/images/icon.png"/>
		
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/fontawesome-free/css/all.min.css" />
		<link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />

		<!-- EasyUI -->
        <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}/templates/jeasyui/themes/black/easyui.css">
	    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}/templates/jeasyui/themes/icon.css">

		<!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
        <!-- DataTables -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />
        <!-- daterange picker -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/daterangepicker/daterangepicker.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <!-- Bootstrap4 Duallistbox -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
        <!-- BS Stepper -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/bs-stepper/css/bs-stepper.min.css">
        <!-- dropzonejs -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/dropzone/min/dropzone.min.css">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <!-- Sweetalert Css -->
        <link href="{{ env('APP_URL') }}/templates/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <!-- Toastr -->
        <link rel="stylesheet" href="{{env('APP_URL')}}/templates/plugins/toastr/toastr.min.css">

        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('newdashboard/css/newstyles.css') }}?v={{ time() }}" />
        {{-- <link rel="stylesheet" href="{{env('APP_URL')}}/templates/dist/css/adminlte.css" /> --}}
		
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
									<li><a href="{{route('ticketing.revisi-gwpp')}}" class="btn btn-sm btn-warning btn-pills mb-1">Revisi kegiatan Dekonsentrasi</a></li>
									<li><a href="{{route('ticketing.view-sarpras-daerah')}}" class="btn btn-sm btn-warning btn-pills mb-1">Revisi kegiatan Tugas Pembantuan</a></li>
								</ul>
							</li>
							<li><a href="#" class="btn btn-sm btn-primary btn-pills mb-1">Quality Surveyor</a></li>
						</ul>
					</li>
                    @endif

                    @if(empty(Auth::user()->prov)  || Auth::user()->username == "198505062004121001")
                    @if(Auth::user()->level == 0 || Auth::user()->level == 1 || Auth::user()->level == 5 || Auth::user()->level == 6  || Auth::user()->username == "198505062004121001")
					<li><a href="{{route('pok.terbit-pok')}}" class="btn btn-dongker">Penerbitan POK</a></li>
                    @endif
                    @endif

                    @if(Auth::user()->level == 0 || Auth::user()->level == 5 || Auth::user()->level == 2 || Auth::user()->level == 3  || Auth::user()->username == "198505062004121001")
					<li>
						<a href="#menuCapaiOut" class="btn btn-dongker" data-bs-toggle="collapse">Capaian Output &#11206;</a>
						<ul class="list-unstyled collapse ps-3" id="menuCapaiOut">
                            @if(empty(Auth::user()->prov))
							<li>
								<a href="#menuCapaiPus" class="btn btn-sm btn-primary btn-pills my-1" data-bs-toggle="collapse">Capaian Pusat &#11206;</a>
								<ul class="list-unstyled collapse ps-3" id="menuCapaiPus">
									<li><a href="{{route('capaian.capaian-output')}}" class="btn btn-sm btn-warning btn-pills mb-1">Komponen Input</a></li>
									<li><a href="{{route('capaian.validasi-capaian-output')}}" class="btn btn-sm btn-warning btn-pills mb-1">Rincian Output</a></li>
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
					<li><a href="" class="btn btn-dongker">Master</a></li>
					<li><a href="{{route('master.history-pagu')}}" class="btn btn-dongker" class="btn btn-dongker">Riwayat Pagu</a></li>
                    @endif

                    @if(Auth::user()->level == 0  || Auth::user()->username == "198505062004121001")
					<li><a href="" class="btn btn-dongker">Angket</a></li>
					@endif

                    @if(Auth::user()->level == "0"  || Auth::user()->username == "198505062004121001")
					<li>
                        <a href="{{ route('tes.index') }}" class="btn btn-dongker mb-1">Realisasi Anggaran</a>
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
			@include('components.change-password')
            @yield('contents')
        </div>

		<!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/16a5cde238.js" crossorigin="anonymous"></script>

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
        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{env('APP_URL')}}/templates/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="{{env('APP_URL')}}/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="{{env('APP_URL')}}/templates/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{env('APP_URL')}}/templates/dist/js/adminlte.js"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="{{env('APP_URL')}}/templates/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/raphael/raphael.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/jquery-mapael/jquery.mapael.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/jquery-mapael/maps/usa_states.min.js"></script>
        <!-- Select2 -->
        <script src="{{env('APP_URL')}}/templates/plugins/select2/js/select2.full.min.js"></script>
        <!-- Bootstrap4 Duallistbox -->
        <script src="{{env('APP_URL')}}/templates/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
        <!-- InputMask -->
        <script src="{{env('APP_URL')}}/templates/plugins/moment/moment.min.js"></script>
        <script src="{{env('APP_URL')}}/templates/plugins/inputmask/jquery.inputmask.min.js"></script>
        <!-- date-range-picker -->
        <script src="{{env('APP_URL')}}/templates/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap color picker -->
        <script src="{{env('APP_URL')}}/templates/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{env('APP_URL')}}/templates/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- BS-Stepper -->
        <script src="{{env('APP_URL')}}/templates/plugins/bs-stepper/js/bs-stepper.min.js"></script>
        <!-- dropzonejs -->
        <script src="{{env('APP_URL')}}/templates/plugins/dropzone/min/dropzone.min.js"></script>
        <!-- SweetAlert2 -->
        <script src="{{env('APP_URL')}}/templates/plugins/sweetalert2/sweetalert2.min.js"></script>
        <!-- Toastr -->
        <script src="{{env('APP_URL')}}/templates/plugins/toastr/toastr.min.js"></script>
        <!-- SweetAlert Plugin Js -->
        <script src="{{ env('APP_URL') }}/templates/plugins/sweetalert/sweetalert.min.js"></script>
        <!-- bs-custom-file-input -->
        <script src="{{ env('APP_URL') }}/templates/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
        <!-- ChartJS -->
        <script src="{{env('APP_URL')}}/templates/plugins/chart.js/Chart.min.js"></script>

		{{-- <script>
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            bsCustomFileInput.init();

            $(".select2").select2({
                theme: 'bootstrap4'
            });
			
        </script> --}}
		<script>
			// menu togle
			let toggle = document.querySelector('.toggle');
			let navigasi = document.querySelector('.navigasi');
			let main = document.querySelector('.main');
		
			toggle.onclick = function(){
				navigasi.classList.toggle('active');
				main.classList.toggle('active');
			}
			// add hovered class in selected list items 
			let list = document.querySelectorAll('.navigasi li');
			function activelink(){
				list.forEach((item) =>
				item.classList.remove('hovered'));
				this.classList.add('hovered');
			}
			list.forEach((item) =>
			item.addEventListener('mouseover', activelink));
		</script>
        
		@yield('js')
    </body>
</html>
