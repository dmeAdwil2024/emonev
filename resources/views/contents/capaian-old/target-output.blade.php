@extends('layouts.caput')

@section('contents')
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
					Selamat Datang Admin,<br>
					Bagian Perencanaan
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5 p-2 font-tebala" style="background-color:#ebebeb;">
				Validasi
			</div>
			<div class="col-md-6 p-2 font-tebala" style="background-color:#ebebeb;text-align:right">
				Capaian Output > Capaian Pusat > Komponen Input > Validasi
			</div>
		</div>
		<div style="height:10px"></div>
		<div class="row">
			<div class="col-md-11 p-2" style="background-image: linear-gradient(to right, rgba(204,204,255,0.7) , rgba(102,255,204,0.7));">
				<div class="row">
					<div class="col-md-11 font-tebala font-tebal">
						Informasi Cascading Output
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 font-tebal">
						Direktorat
					</div>
					<div class="col-md-10 font-tebal">
						<font class="font-tebala">Dekonsentrasi, Tugas Pembantuan dan Kerjasama</font>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 font-tebal">
						Tahun
					</div>
					<div class="col-md-10 font-tebal">
						<font class="font-tebala">2024</font>
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
				<div class="row">
					<div class="col-md-2 font-tebal">
						Program
					</div>
					<div class="col-md-10 font-tebal">
						<font class="font-tebala">[CM]</font>-Program Pembinaan Kapasitas Pemerintahan dan Desa
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 font-tebal">
						Sasaran Program
					</div>
					<div class="col-md-10 font-tebal">
						<font class="font-tebala">[04]</font>-Meningkatnya tertib administrasi kewilayahan, penyelenggaraan pelayanan perizinan dan non perizinan yang terintegrasi dan terpadu, kinerja Gubernur sebagai Wakil Pemerintah Pusat, serta pengelolaan kawasan dan perbatasan negara
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 font-tebal">
						Indikator Kinerja Program
					</div>
					<div class="col-md-10 font-tebal">
						<font class="font-tebala">[04]</font>-Jumlah Provinsi dengan indeks kinerja Gubernur sebagai wakil pemerintahan pusat kategori Baik
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 font-tebal">
						Kegiatan
					</div>
					<div class="col-md-10 font-tebal">
						<font class="font-tebala">[1237]</font>-Pembinaan Pennyelenggaraan Hubungan Pusat dan Daerah serta Kerja Sama Daerah
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 font-tebal">
						Sasaran Kegiatan
					</div>
					<div class="col-md-10 font-tebal">
						<font class="font-tebala">[01]</font>-Meningkatnya kinerja GWPP, dekonsentrasi dan tugas pembantuan, penyelenggaraan pelayanan perizinan dan non perizinan yang terintegrasi dan terpadu
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 font-tebal">
						Indikator Kinerja Kegiatan
					</div>
					<div class="col-md-10 font-tebal">
						<font class="font-tebala">[1]</font>-Jumlah tugas dan wewenang yang dilaksanakan Gubernur sebagai wakil Pemerintah pusat dengan kinerja baik
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 font-tebal">
						KRO
					</div>
					<div class="col-md-10 font-tebal">
						<font class="font-tebala">[PGL]</font>-Pembinaan Penyelenggaraan Pusat dan Daerah serta Kerja Sama Daerah
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 font-tebal">
						Rincian Output
					</div>
					<div class="col-md-10 font-tebal">
						<font class="font-tebala">[001]</font>-Pelaksanaan Tugas dan Wewenang Gubernur sebagai wakil Pemerintahan Pusat dengan kinerja baik
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 font-tebal">
						Komponen
					</div>
					<div class="col-md-10 font-tebal">
						<font class="font-tebala">[061]</font>-Penguatan Sekertariat Bersama Pembinaan Gubernur sebagai wakil Pemerintahan pusat
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 font-tebal">
						Sub Komponen
					</div>
					<div class="col-md-10 font-tebal">
						<font class="font-tebala">[AB]</font>-Koordinasi Sekertariat Bersama Pembinaan GWPP (Kebijakan)
					</div>
				</div>
			</div>
		</div>
		<div style="height:10px"></div>
		<div class="row">
			<div class="col-md-11 p-2">
				<div class="row">
					<div class="col-md-8 p-2 font-tebala font-tebal">
						Capaian Output (subkomponen)
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
					<div class="col-md-2 font-tebal" style="text-align:center">
						setujui
					</div>
					<div class="col-md-2 font-tebal" style="text-align:center">
						perbaikan
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
@endsection

@section('js')
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
@endsection
