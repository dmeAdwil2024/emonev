<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Validator;
use App\Provinsi;
use App\Direktorat;
use App\Subdirektorat;
use App\SaktiOutput;
use App\SubKomponen;
use App\SaktiAnggaran;
use App\SaktiKomponen;
use App\SaktiKegiatan;
use App\SaktiSubOutput;
use App\SaktiRealisasi;
use App\EvidenceCapaian;
use App\MatriksPengendalian;
use App\MatriksTarget;
use App\MatriksFile;
use App\MatriksApproval;
use App\MatriksSetting;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\ToolsController;
use App\PaguSaktiEselon1;
use App\Imports\SaktiAnggaranImport;
use App\Imports\SaktiAnggaranEselon1Import;
use App\Imports\SaktiRealisasiImport;
use App\Imports\SaktiRealisasiEselon1Import;
use Maatwebsite\Excel\Facades\Excel;

class CapaianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function test()
    {
		/*
		$tools  = new ToolsController;
		$message='test ajajjjj';
		$tools->sendingWa('089516543062', $message);
		$d="16/02/2024";
		$df="10/02/2024";
		$dt="15/02/2024";
		echo date('d/m/Y');
		//echo $this->betweenDates($d,$df,$dt);
		*/
		$str="SELECT COLUMN_NAME
			FROM INFORMATION_SCHEMA.COLUMNS
			WHERE TABLE_SCHEMA = 'emonev_dev' AND TABLE_NAME = 'tb_sakti_realisasi_eselon1' and COLUMN_NAME<>'id';";
		$data=DB::select($str);
		$i=0;
		foreach($data as $item){
			echo "'".$item->COLUMN_NAME."'".' => $row['.$i.'],<br>';
			//echo "'".$item->COLUMN_NAME."',";
			$i++;
		}
    }
	public function betweenDates($cmpDate,$startDate,$endDate){ 
	   return (date($cmpDate) >= date($startDate)) && (date($cmpDate) <= date($endDate));
	}
	public function IndonesiaTgl($tanggal){
		$awal="";
		if($tanggal!=""){
			$tgl=substr($tanggal,8,2);
			$bln=substr($tanggal,5,2);
			$thn=substr($tanggal,0,4);
			$awal="$tgl-$bln-$thn";
		}
		return $awal;
	}
    public function viewOutput_old()
    {
        $dir        = new Direktorat;

        $modul      = 'Capaian';
        $current    = "Capaian Pusat";

        $data_direktorat    = $dir->where('id_dir', '<>', 0)->get();

        return view('contents.capaian.output', compact('current', 'modul', 'data_direktorat'));
    }
    public function viewOutput(Request $request)
    {
        $dir        = new Direktorat;
		
        $modul      = 'Capaian';
        $current    = "Capaian Pusat";
		
		$komponen='';
		$pg=$request->pg;
		$pg_to="";
		$kd_dir="";
		$kd_subdir="";
		$kd="";
		$judul="";
		$mdl=$request->mdl;
		$kodea_kegiatan='';
		$kodea_kro='';
		$kodea_ro='';
		$kodea_komponen='';
		$kodeb_kegiatan='';
		$kodeb_kro='';
		$kodeb_ro='';
		$kodeb_komponen='';
		if(!empty($pg)){
			$kd_dir=$request->kd_dir;
			$kd_subdir=$request->kd_subdir;
			$kd=$request->kd;
			if($pg=="kegiatan"){
				$pg_to="kro";
				$judul="Kegiatan";
			}
			elseif($pg=="kro"){
				$kodea_kegiatan=$request->kode;
				$kodeb_kegiatan=$request->kd;
				$pg_to="ro";
				$judul="Klasifikasi RO";
			}
			elseif($pg=="ro"){
				$kodea_kegiatan=$request->kodea_kegiatan;
				$kodea_kro=$request->kode;
				$kodeb_kegiatan=$request->kodeb_kegiatan;
				$kodeb_kro=$request->kd;
				$pg_to="komponen";
				$judul="Rincian Output";
			}
			elseif($pg=="komponen"){
				$kodea_kegiatan=$request->kodea_kegiatan;
				$kodea_kro=$request->kodea_kro;
				$kodea_ro=$request->kode;
				$kodeb_kegiatan=$request->kodeb_kegiatan;
				$kodeb_kro=$request->kodeb_kro;
				$kodeb_ro=$request->kd;
				$komponen=$kd;
				$pg_to="subkomponen";
				$judul="Komponen";
			}
			elseif($pg=="subkomponen"){
				$kodea_kegiatan=$request->kodea_kegiatan;
				$kodea_kro=$request->kodea_kro;
				$kodea_ro=$request->kodea_ro;
				$kodea_komponen=$request->kode;
				$kodeb_kegiatan=$request->kodeb_kegiatan;
				$kodeb_kro=$request->kodeb_kro;
				$kodeb_ro=$request->kodeb_ro;
				$kodeb_komponen=$request->kd;
				$komponen=$request->komponen;;
				$pg_to="subkomponen";
				$judul="Sub Komponen";
			}
		}
		else{
			if(Auth::user()->level==27||Auth::user()->level==2||Auth::user()->level==3){
				$pg_to="kro";
				$pg="kegiatan";
				$judul="Kegiatan";
				$kd_dir=Auth::user()->id_dir;
				$kd_subdir=Auth::user()->id_subdir;
			}
			else{
				$pg_to="kegiatan";
				$pg="direktorat";
				$judul="Direktorat";
			}
		}
		$tahun=2024;
		$data_sp=[];
		$data_ikp=[];
		$data_ikk=[];
		$data_keg=[];
		$data_kro=[];
		$data_ro=[];
		$data_komponen=[];
		$str_sp='';
		$str_ikp='';
		$str_ikk='';
		$str_keg='';
		$str_kro='';
		$str_ro='';
		$str_komponen='';
		$kd_kro=$request->kd_kro;
		if($pg=="direktorat"){
	        $str=" select d.id_dir, '' id_subdir, d.kode, d.id_dir kd, d.nama_dir nama, (select sum(a.total) from tb_sakti_anggaran a where urutan_header1=0 and urutan_header2=0
				and a.kode_subkomponen in (select s.kode_pagu from tbm_subkomponen s where s.`kode_direktorat` = d.id_dir)) as pagu, 
				(select sum(a.nilai_rupiah) from tb_sakti_realisasi a where no_sp2d is not null
				and a.kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = d.id_dir)) as realisasi,
				(select count(a.id) from tb_matriks_pengendalian a
				inner join tbm_subdir b on a.kode_subdir=b.id where b.id_dir=d.id_dir and a.tahun=".$tahun." and a.status=7 and length(a.kode)=2) akum_cnt, 
				fn_totalNomenByDir(d.id_dir) jml_subkomponen
				";
			for($i=1;$i<=12;$i++){
				$str.=",
					(select count(a.id) from tb_matriks_pengendalian a
					inner join tbm_subdir b on a.kode_subdir=b.id where b.id_dir=d.id_dir and bulan=".$i." and a.tahun=".$tahun." 
					and a.status=7) bulan".$i."_cnt ";
			}
			$str.=" FROM tbm_dir d WHERE d.id_eselon <> '0' order by kode";
		}
		elseif($pg=="kegiatan"){
	        $str=" select ".$kd_dir." id_dir, 
				(select kode_subdirektorat from tbm_subkomponen where kode=d.kode_subkomponen limit 1) id_subdir,
				e.kode, e.kode kd, e.deskripsi nama,
				(select sum(a.total) total from tb_sakti_anggaran a where urutan_header1=0 and  urutan_header2=0
				and a.kode_kegiatan=d.kode_kegiatan 
				and a.kode_subkomponen in (select s.kode_pagu from tbm_subkomponen s where s.kode_direktorat=".$kd_dir.")) pagu,
				(select sum(a.nilai_rupiah) FROM tb_sakti_realisasi a where no_sp2d is not null
				and a.kode_kegiatan=d.kode_kegiatan and a.kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = ".$kd_dir."))  realisasi,
				(select count(persen_kinerja) from tb_matriks_pengendalian a
				inner join tbm_subdir b on a.kode_subdir=b.id 
				where b.id_dir=".$kd_dir." and a.tahun=".$tahun." and a.status=7 and a.kode_kegiatan=d.kode_kegiatan and length(a.kode)=2) akum_cnt,
				fn_totalNomenByKeg(".$kd_dir.",d.kode_kegiatan) jml_subkomponen
				";
			for($i=1;$i<=12;$i++){
				$str.=", 
					(select count(persen_kinerja) from tb_matriks_pengendalian a
					inner join tbm_subdir b on a.kode_subdir=b.id 
					where b.id_dir=".$kd_dir." and bulan=".$i." and a.tahun=".$tahun." and a.status=7 
					and a.kode_kegiatan=d.kode_kegiatan) bulan".$i."_cnt ";
			}
			$str.=" from tb_sakti_realisasi d
					inner join tb_sakti_kegiatan e on e.kode=d.kode_kegiatan
					where kode_subkomponen in 
					(select kode from tbm_subkomponen where kode_direktorat=".$kd_dir." ";
			if(Auth::user()->level==3){
				$str.=" and kode_subdirektorat=".$kd_subdir;
			}
			$str.=") group by kode_kegiatan";
		}
		elseif($pg=="kro"){
	        $str=" select ".$kd_dir." id_dir, ".$kd_subdir." id_subdir, e.kode, e.kode kd, e.deskripsi nama,
				(select sum(a.total) total from tb_sakti_anggaran a where urutan_header1=0 and  urutan_header2=0
				and concat(a.kode_kegiatan,'.',a.kode_output)=e.kode
				and a.kode_subkomponen in (select s.kode_pagu from tbm_subkomponen s where s.kode_direktorat=".$kd_dir.")) pagu,
				(select sum(a.nilai_rupiah) FROM tb_sakti_realisasi a where no_sp2d is not null
				and concat(a.kode_kegiatan,'.',a.kode_output)=e.kode and a.kode_subkomponen 
				in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = ".$kd_dir."))  realisasi,
				coalesce((
				select sum(persen_kinerja) from tb_matriks_pengendalian a
				inner join tbm_subdir b on a.kode_subdir=b.id 
				where b.id_dir=".$kd_dir." and a.tahun=".$tahun." and a.status=7 and concat(a.kode_kegiatan,'.',a.kode_output)=e.kode
				),0) akum_pct,
				(select count(persen_kinerja) from tb_matriks_pengendalian a
				inner join tbm_subdir b on a.kode_subdir=b.id 
				where b.id_dir=".$kd_dir." and a.tahun=".$tahun." and a.status=7 and concat(a.kode_kegiatan,'.',a.kode_output)=e.kode) akum_cnt ";
			for($i=1;$i<=12;$i++){
				$str.=", coalesce((select sum(persen_kinerja) from tb_matriks_pengendalian a
					inner join tbm_subdir b on a.kode_subdir=b.id 
					where b.id_dir=".$kd_dir." and bulan=".$i." and a.tahun=".$tahun." and a.status=7 and concat(a.kode_kegiatan,'.',a.kode_output)=e.kode),0) bulan".$i."_pct,
					(select count(persen_kinerja) from tb_matriks_pengendalian a
					inner join tbm_subdir b on a.kode_subdir=b.id 
					where b.id_dir=".$kd_dir." and bulan=".$i." and a.tahun=".$tahun." and a.status=7 and concat(a.kode_kegiatan,'.',a.kode_output)=e.kode) bulan".$i."_cnt ";
			}
			$str.=" from tb_sakti_output e
					where status=1 and kode like '%".$kd."%'";
			
			$str_ikk=" select b.kode,b.nama 
					from tb_indikator_kegiatan a 
					inner join tbm_indikator_kegiatan b on a.id_ikk=b.id
					where a.id_dir=".$kd_dir." and a.kd_kegiatan='".substr($kd,0,4)."' order by a.id_sp,a.id_ikk";
					
			$str_keg=" select kode, deskripsi nama from tb_sakti_kegiatan where kode='".substr($kd,0,4)."'";
		}
		elseif($pg=="ro"){
	        $str=" select ".$kd_dir." id_dir, ".$kd_subdir." id_subdir, e.kode, e.kode kd, e.deskripsi nama,0 pagu,
				(select sum(a.nilai_rupiah) FROM tb_sakti_realisasi a where no_sp2d is not null
				and concat(a.kode_kegiatan,'.',a.kode_output,'.',a.kode_suboutput)=e.kode and a.kode_subkomponen 
				in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = ".$kd_dir."))  realisasi,
				coalesce((
				select sum(persen_kinerja) from tb_matriks_pengendalian a
				inner join tbm_subdir b on a.kode_subdir=b.id 
				where b.id_dir=".$kd_dir." and a.tahun=".$tahun." and a.status=7 and concat(a.kode_kegiatan,'.',a.kode_output,'.',a.kode_suboutput)=e.kode
				),0) akum_pct,
				(select count(persen_kinerja) from tb_matriks_pengendalian a
				inner join tbm_subdir b on a.kode_subdir=b.id 
				where b.id_dir=".$kd_dir." and a.tahun=".$tahun." and a.status=7 and concat(a.kode_kegiatan,'.',a.kode_output,'.',a.kode_suboutput)=e.kode) akum_cnt ";
			for($i=1;$i<=12;$i++){
				$str.=", 
					coalesce((select 1 from tb_matriks_pengendalian a
					inner join tbm_subdir b on a.kode_subdir=b.id 
					where b.id_dir=".$kd_dir." and bulan=".$i." and a.tahun=".$tahun." and a.status<>7 and a.kode=e.kode),0) bulan".$i."_tnc,
					coalesce((select sum(persen_kinerja) from tb_matriks_pengendalian a
					inner join tbm_subdir b on a.kode_subdir=b.id 
					where b.id_dir=".$kd_dir." and bulan=".$i." and a.tahun=".$tahun." and a.status=7 and concat(a.kode_kegiatan,'.',a.kode_output,'.',a.kode_suboutput)=e.kode),0) bulan".$i."_pct,
					(select count(persen_kinerja) from tb_matriks_pengendalian a
					inner join tbm_subdir b on a.kode_subdir=b.id 
					where b.id_dir=".$kd_dir." and bulan=".$i." and a.tahun=".$tahun." and a.status=7 and concat(a.kode_kegiatan,'.',a.kode_output,'.',a.kode_suboutput)=e.kode) bulan".$i."_cnt ";
			}
			$str.=" from tb_sakti_suboutput e
					where status=1 and kode like '%".$kd."%'";
			
			$str_ikk=" select b.kode,b.nama 
					from tb_indikator_kegiatan a 
					inner join tbm_indikator_kegiatan b on a.id_ikk=b.id
					where a.id_dir=".$kd_dir." and a.kd_kegiatan='".substr($kd,0,4)."' order by a.id_sp,a.id_ikk";
					
			$str_keg=" select kode,deskripsi nama from tb_sakti_kegiatan where kode='".substr($kd,0,4)."'";
			
			$str_kro=" select substring(kode,6,3) kode,deskripsi nama from tb_sakti_output where kode='".substr($kd,0,8)."'";
			$kd_kro=$kd;
		}
		elseif($pg=="komponen"){
	        $str=" select ".$kd_dir." id_dir, ".$kd_subdir." id_subdir, e.kode, concat(substring_index(e.kode,'.',2),'.',substring_index(e.kode,'.',-1)) kd, e.deskripsi nama,
				(select sum(a.total) total from tb_sakti_anggaran a where urutan_header1=0 and  urutan_header2=0
				and concat(a.kode_kegiatan,'.',a.kode_output,'.',a.kode_komponen)=concat(substring_index(e.kode,'.',2),'.',substring_index(e.kode,'.',-1))
				and a.kode_subkomponen in (select s.kode_pagu from tbm_subkomponen s where s.kode_direktorat=".$kd_dir.")) pagu,
				(select sum(a.nilai_rupiah) FROM tb_sakti_realisasi a where no_sp2d is not null
				and concat(a.kode_kegiatan,'.',a.kode_output,'.',a.kode_suboutput,'.',a.kode_komponen)=e.kode and a.kode_subkomponen 
				in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = ".$kd_dir."))  realisasi,
				coalesce((
				select sum(persen_kinerja) from tb_matriks_pengendalian a
				inner join tbm_subdir b on a.kode_subdir=b.id 
				where b.id_dir=".$kd_dir." and a.tahun=".$tahun." and a.status=7 and concat(a.kode_kegiatan,'.',a.kode_output,'.',a.kode_suboutput,'.',a.kode_komponen)=e.kode
				),0) akum_pct,
				(select count(persen_kinerja) from tb_matriks_pengendalian a
				inner join tbm_subdir b on a.kode_subdir=b.id 
				where b.id_dir=".$kd_dir." and a.tahun=".$tahun." and a.status=7 and concat(a.kode_kegiatan,'.',a.kode_output,'.',a.kode_suboutput,'.',a.kode_komponen)=e.kode) akum_cnt ";
			for($i=1;$i<=12;$i++){
				$str.=", 
					coalesce((select 1 from tb_matriks_pengendalian a
					inner join tbm_subdir b on a.kode_subdir=b.id 
					where b.id_dir=".$kd_dir." and bulan=".$i." and a.tahun=".$tahun." and a.status<>7 and a.kode=e.kode),0) bulan".$i."_tnc,
					coalesce((select sum(persen_kinerja) from tb_matriks_pengendalian a
					inner join tbm_subdir b on a.kode_subdir=b.id 
					where b.id_dir=".$kd_dir." and bulan=".$i." and a.tahun=".$tahun." and a.status=7 and concat(a.kode_kegiatan,'.',a.kode_output,'.',a.kode_suboutput,'.',a.kode_komponen)=e.kode),0) bulan".$i."_pct,
					(select count(persen_kinerja) from tb_matriks_pengendalian a
					inner join tbm_subdir b on a.kode_subdir=b.id 
					where b.id_dir=".$kd_dir." and bulan=".$i." and a.tahun=".$tahun." and a.status=7 and concat(a.kode_kegiatan,'.',a.kode_output,'.',a.kode_suboutput,'.',a.kode_komponen)=e.kode) bulan".$i."_cnt ";
			}
			$str.=" from tb_sakti_komponen e
					where status=1 and kode like '%".$kd."%'";
			
			$str_ikk=" select b.kode,b.nama 
					from tb_indikator_kegiatan a 
					inner join tbm_indikator_kegiatan b on a.id_ikk=b.id
					where a.id_dir=".$kd_dir." and a.kd_kegiatan='".substr($kd,0,4)."' order by a.id_sp,a.id_ikk";
					
			$str_keg=" select kode,deskripsi nama from tb_sakti_kegiatan where kode='".substr($kd,0,4)."'";
			
			$str_kro=" select substring(kode,6,3) kode,deskripsi nama from tb_sakti_output where kode='".substr($kd,0,8)."'";
			
			$str_ro=" select substring(kode,10,3) kode,deskripsi nama from tb_sakti_suboutput where kode='".$kd."'";
			$kd_kro=$kd;
		}
		elseif($pg=="subkomponen"){
	        $str=" select ".$kd_dir." id_dir, ".$kd_subdir." id_subdir, concat(e.kode_kegiatan,'.',e.kode_output,'.',e.kode_komponen,'.',e.kode_subkomponen) kode, e.kode_subkomponen kd, e.uraian_subkomponen nama,
				(select sum(a.total) total from tb_sakti_anggaran a where urutan_header1=0 and  urutan_header2=0
				and concat(a.kode_kegiatan,'.',a.kode_output,'.',a.kode_komponen,'.',a.kode_subkomponen)=concat(e.kode_kegiatan,'.',e.kode_output,'.',e.kode_komponen,'.',e.kode_subkomponen)
				and a.kode_subkomponen in (select s.kode_pagu from tbm_subkomponen s where s.kode_direktorat=".$kd_dir.")) pagu,
				(select sum(a.nilai_rupiah) FROM tb_sakti_realisasi a where no_sp2d is not null
				and concat(a.kode_kegiatan,'.',a.kode_output,'.',a.kode_suboutput,'.',a.kode_komponen,'.',a.kode_subkomponen)=concat('".$kodea_komponen."','.',e.kode_subkomponen) and a.kode_subkomponen 
				in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = ".$kd_dir."))  realisasi,
				coalesce((
				select sum(persen_kinerja) from tb_matriks_pengendalian a
				inner join tbm_subdir b on a.kode_subdir=b.id 
				where b.id_dir=".$kd_dir." and a.tahun=".$tahun." and a.status=7 and concat(a.kode_kegiatan,'.',a.kode_output,'.',a.kode_komponen)=concat(e.kode_kegiatan,'.',e.kode_output,'.',e.kode_komponen) and a.kode=e.kode_subkomponen
				),0) akum_pct,
				(select count(persen_kinerja) from tb_matriks_pengendalian a
				inner join tbm_subdir b on a.kode_subdir=b.id 
				where b.id_dir=".$kd_dir." and a.tahun=".$tahun." and a.status=7 and concat(a.kode_kegiatan,'.',a.kode_output,'.',a.kode_komponen)=concat(e.kode_kegiatan,'.',e.kode_output,'.',e.kode_komponen) and a.kode=e.kode_subkomponen) akum_cnt ";
			for($i=1;$i<=12;$i++){
				$str.=", 
					coalesce((select 1 from tb_matriks_pengendalian a
					inner join tbm_subdir b on a.kode_subdir=b.id 
					where b.id_dir=".$kd_dir." and bulan=".$i." and a.tahun=".$tahun." and a.status<>7 and concat(a.kode_kegiatan,'.',a.kode_output,'.',a.kode_komponen)=concat(e.kode_kegiatan,'.',e.kode_output,'.',e.kode_komponen) and a.kode=e.kode_subkomponen),0) bulan".$i."_tnc,
					coalesce((select sum(persen_kinerja) from tb_matriks_pengendalian a
					inner join tbm_subdir b on a.kode_subdir=b.id 
					where b.id_dir=".$kd_dir." and bulan=".$i." and a.tahun=".$tahun." and a.status=7 and concat(a.kode_kegiatan,'.',a.kode_output,'.',a.kode_komponen)=concat(e.kode_kegiatan,'.',e.kode_output,'.',e.kode_komponen) and a.kode=e.kode_subkomponen),0) bulan".$i."_pct,
					(select count(persen_kinerja) from tb_matriks_pengendalian a
					inner join tbm_subdir b on a.kode_subdir=b.id 
					where b.id_dir=".$kd_dir." and bulan=".$i." and a.tahun=".$tahun." and a.status=7 and concat(a.kode_kegiatan,'.',a.kode_output,'.',a.kode_komponen)=concat(e.kode_kegiatan,'.',e.kode_output,'.',e.kode_komponen) and a.kode=e.kode_subkomponen) bulan".$i."_cnt ";
			}
			$str.=" from tb_sakti_anggaran e
					where concat(e.kode_kegiatan,'.',e.kode_output,'.',e.kode_suboutput,'.',e.kode_komponen)='".$kodea_komponen."'
					and kode_subkomponen in 
					(select kode from tbm_subkomponen where kode_direktorat=".$kd_dir.")
					group by kode_subkomponen";
			//echo $str;
			//die();
			$str_ikk=" select b.kode,b.nama 
					from tb_indikator_kegiatan a 
					inner join tbm_indikator_kegiatan b on a.id_ikk=b.id
					where a.id_dir=".$kd_dir." and a.kd_kegiatan='".substr($kd,0,4)."' order by a.id_sp,a.id_ikk";
					
			$str_keg=" select kode,deskripsi nama from tb_sakti_kegiatan where kode='".substr($kd,0,4)."'";
			
			$str_kro=" select substring(kode,6,3) kode,deskripsi nama from tb_sakti_output where kode='".substr($kd_kro,0,8)."'";
			
			$str_ro=" select substring(kode,10,3) kode,deskripsi nama from tb_sakti_suboutput where kode='".$kd_kro."'";
			
			$str_komponen=" select substring(kode,14,3) kode,deskripsi nama from tb_sakti_komponen where kode='".$kd_kro.substr($kd,-4)."'";
			
		}
		$data=DB::select($str);
		
		if($kd_dir!=""){
			$str_sp=" select b.kode,b.nama 
					from tb_sasaran_program a 
					inner join tbm_sasaran_program b on a.id_sp=b.id
					where a.id_dir=".$kd_dir;
			
			$str_ikp=" select b.kode,b.nama 
					from tb_indikator_program a 
					inner join tbm_indikator_program b on a.id_ikp=b.id
					where a.id_dir=".$kd_dir." order by a.id_sp,a.id_ikp";
					
			$data_sp=DB::select($str_sp);
			$data_ikp=DB::select($str_ikp);
			if($str_ikk!=''){
				$data_ikk=DB::select($str_ikk);
			}
			if($str_keg!=''){
				$data_keg=DB::select($str_keg);
			}
			if($str_kro!=''){
				$data_kro=DB::select($str_kro);
			}
			if($str_ro!=''){
				$data_ro=DB::select($str_ro);
			}
			if($str_komponen!=''){
				$data_komponen=DB::select($str_komponen);
			}
		}
		
		$i= 0;
		$caput_data=[];
		foreach ($data as $value)
        {
            $caput_data[$i] = new \stdClass();
            $caput_data[$i]->kd=$value->kode;
            $caput_data[$i]->kda=$value->kd;
            $caput_data[$i]->id_dir=$value->id_dir;
            $caput_data[$i]->id_subdir=$value->id_subdir;
            $caput_data[$i]->kode=$value->kode;
            $caput_data[$i]->kdgraph=str_replace('.','_',$value->kd);
			if($mdl=="ro"){
				if($pg=="ro"){
					$caput_data[$i]->plus='+';
		            $caput_data[$i]->nomenklatur= $value->kd.'<br>'.$value->nama;
					$caput_data[$i]->nomenclick='';
				}
				else{
					$caput_data[$i]->plus= '<a href="javascript:goto(\''.$pg_to.'\',\''.$value->id_dir.'\',\''.$value->id_subdir.'\',\''.$value->kd.'\',\''.$value->kode.'\')" class="linkcaputa">+</a>';
		            $caput_data[$i]->nomenklatur= '<a href="javascript:goto(\''.$pg_to.'\',\''.$value->id_dir.'\',\''.$value->id_subdir.'\',\''.$value->kd.'\',\''.$value->kode.'\')" class="linkcaput">'.$value->kode.'<br>'.$value->nama.'</a>';
					$caput_data[$i]->nomenclick='onclick="goto(\''.$pg_to.'\',\''.$value->id_dir.'\',\''.$value->id_subdir.'\',\''.$value->kd.'\',\''.$value->kode.'\')"';
				}
			}
			else{
				if($pg!="subkomponen"){
		            $caput_data[$i]->plus= '<a href="javascript:goto(\''.$pg_to.'\',\''.$value->id_dir.'\',\''.$value->id_subdir.'\',\''.$value->kd.'\',\''.$value->kode.'\')" class="linkcaputa">+</a>';
		            $caput_data[$i]->nomenklatur= '<a href="javascript:goto(\''.$pg_to.'\',\''.$value->id_dir.'\',\''.$value->id_subdir.'\',\''.$value->kd.'\',\''.$value->kode.'\')" class="linkcaput">'.$value->kode.'<br>'.$value->nama.'</a>';
	            	$caput_data[$i]->nomenclick='onclick="goto(\''.$pg_to.'\',\''.$value->id_dir.'\',\''.$value->id_subdir.'\',\''.$value->kd.'\',\''.$value->kode.'\')"';
				}
				else{
		            $caput_data[$i]->plus='+';
		            $caput_data[$i]->nomenklatur= $value->kd.'<br>'.$value->nama;
					$caput_data[$i]->nomenclick='';
				}
			}
			$caput_data[$i]->pagu= number_format($value->pagu);
            $caput_data[$i]->realisasi= number_format($value->realisasi);
            $caput_data[$i]->pct_ang=number_format((float) (($value->pagu >0?$value->realisasi/$value->pagu:0))*100,2);
			if($pg=="direktorat"||$pg=="kegiatan"){
				$caput_data[$i]->akum_pct=$this->getPctIsian($value->jml_subkomponen,$value->akum_cnt);
				$caput_data[$i]->bulan_jan=$this->getPctIsian($value->jml_subkomponen,$value->bulan1_cnt);
				$caput_data[$i]->bulan_feb=$this->getPctIsian($value->jml_subkomponen,$value->bulan2_cnt);
				$caput_data[$i]->bulan_mar=$this->getPctIsian($value->jml_subkomponen,$value->bulan3_cnt);
				$caput_data[$i]->bulan_apr=$this->getPctIsian($value->jml_subkomponen,$value->bulan4_cnt);
				$caput_data[$i]->bulan_mei=$this->getPctIsian($value->jml_subkomponen,$value->bulan5_cnt);
				$caput_data[$i]->bulan_jun=$this->getPctIsian($value->jml_subkomponen,$value->bulan6_cnt);
				$caput_data[$i]->bulan_jul=$this->getPctIsian($value->jml_subkomponen,$value->bulan7_cnt);
				$caput_data[$i]->bulan_agu=$this->getPctIsian($value->jml_subkomponen,$value->bulan8_cnt);
				$caput_data[$i]->bulan_sep=$this->getPctIsian($value->jml_subkomponen,$value->bulan9_cnt);
				$caput_data[$i]->bulan_okt=$this->getPctIsian($value->jml_subkomponen,$value->bulan10_cnt);
				$caput_data[$i]->bulan_nov=$this->getPctIsian($value->jml_subkomponen,$value->bulan11_cnt);
				$caput_data[$i]->bulan_des=$this->getPctIsian($value->jml_subkomponen,$value->bulan12_cnt);
			}
			else{
				$caput_data[$i]->akum_pct=$this->getPctCaput($value->akum_pct,$value->akum_cnt);
				$caput_data[$i]->bulan_jan=$this->getPctCaput($value->bulan1_pct,$value->bulan1_cnt);
				$caput_data[$i]->bulan_feb=$this->getPctCaput($value->bulan2_pct,$value->bulan2_cnt);
				$caput_data[$i]->bulan_mar=$this->getPctCaput($value->bulan3_pct,$value->bulan3_cnt);
				$caput_data[$i]->bulan_apr=$this->getPctCaput($value->bulan4_pct,$value->bulan4_cnt);
				$caput_data[$i]->bulan_mei=$this->getPctCaput($value->bulan5_pct,$value->bulan5_cnt);
				$caput_data[$i]->bulan_jun=$this->getPctCaput($value->bulan6_pct,$value->bulan6_cnt);
				$caput_data[$i]->bulan_jul=$this->getPctCaput($value->bulan7_pct,$value->bulan7_cnt);
				$caput_data[$i]->bulan_agu=$this->getPctCaput($value->bulan8_pct,$value->bulan8_cnt);
				$caput_data[$i]->bulan_sep=$this->getPctCaput($value->bulan9_pct,$value->bulan9_cnt);
				$caput_data[$i]->bulan_okt=$this->getPctCaput($value->bulan10_pct,$value->bulan10_cnt);
				$caput_data[$i]->bulan_nov=$this->getPctCaput($value->bulan11_pct,$value->bulan11_cnt);
				$caput_data[$i]->bulan_des=$this->getPctCaput($value->bulan12_pct,$value->bulan12_cnt);
			}
			$caput_data[$i]->bulan_jan_sisa=100-$caput_data[$i]->bulan_jan;
			$caput_data[$i]->bulan_feb_sisa=100-$caput_data[$i]->bulan_feb;
			$caput_data[$i]->bulan_mar_sisa=100-$caput_data[$i]->bulan_mar;
			$caput_data[$i]->bulan_apr_sisa=100-$caput_data[$i]->bulan_apr;
			$caput_data[$i]->bulan_mei_sisa=100-$caput_data[$i]->bulan_mei;
			$caput_data[$i]->bulan_jun_sisa=100-$caput_data[$i]->bulan_jun;
			$caput_data[$i]->bulan_jul_sisa=100-$caput_data[$i]->bulan_jul;
			$caput_data[$i]->bulan_agu_sisa=100-$caput_data[$i]->bulan_agu;
			$caput_data[$i]->bulan_sep_sisa=100-$caput_data[$i]->bulan_sep;
			$caput_data[$i]->bulan_okt_sisa=100-$caput_data[$i]->bulan_okt;
			$caput_data[$i]->bulan_nov_sisa=100-$caput_data[$i]->bulan_nov;
			$caput_data[$i]->bulan_des_sisa=100-$caput_data[$i]->bulan_des;
			if($pg=="ro"||$pg=="komponen"||$pg=="subkomponen"){
				$caput_data[$i]->bulan_jan_tnc=$value->bulan1_tnc;
				$caput_data[$i]->bulan_feb_tnc=$value->bulan2_tnc;
				$caput_data[$i]->bulan_mar_tnc=$value->bulan3_tnc;
				$caput_data[$i]->bulan_apr_tnc=$value->bulan4_tnc;
				$caput_data[$i]->bulan_mei_tnc=$value->bulan5_tnc;
				$caput_data[$i]->bulan_jun_tnc=$value->bulan6_tnc;
				$caput_data[$i]->bulan_jul_tnc=$value->bulan7_tnc;
				$caput_data[$i]->bulan_agu_tnc=$value->bulan8_tnc;
				$caput_data[$i]->bulan_sep_tnc=$value->bulan9_tnc;
				$caput_data[$i]->bulan_okt_tnc=$value->bulan10_tnc;
				$caput_data[$i]->bulan_nov_tnc=$value->bulan11_tnc;
				$caput_data[$i]->bulan_des_tnc=$value->bulan12_tnc;
			}
			else{
				$caput_data[$i]->bulan_jan_tnc=0;
				$caput_data[$i]->bulan_feb_tnc=0;
				$caput_data[$i]->bulan_mar_tnc=0;
				$caput_data[$i]->bulan_apr_tnc=0;
				$caput_data[$i]->bulan_mei_tnc=0;
				$caput_data[$i]->bulan_jun_tnc=0;
				$caput_data[$i]->bulan_jul_tnc=0;
				$caput_data[$i]->bulan_agu_tnc=0;
				$caput_data[$i]->bulan_sep_tnc=0;
				$caput_data[$i]->bulan_okt_tnc=0;
				$caput_data[$i]->bulan_nov_tnc=0;
				$caput_data[$i]->bulan_des_tnc=0;
			}
			$caput_data[$i]->bulan_jan_tnc_clr=$this->getColorTnc($caput_data[$i]->bulan_jan_tnc);
			$caput_data[$i]->bulan_feb_tnc_clr=$this->getColorTnc($caput_data[$i]->bulan_feb_tnc);
			$caput_data[$i]->bulan_mar_tnc_clr=$this->getColorTnc($caput_data[$i]->bulan_mar_tnc);
			$caput_data[$i]->bulan_apr_tnc_clr=$this->getColorTnc($caput_data[$i]->bulan_apr_tnc);
			$caput_data[$i]->bulan_mei_tnc_clr=$this->getColorTnc($caput_data[$i]->bulan_mei_tnc);
			$caput_data[$i]->bulan_jun_tnc_clr=$this->getColorTnc($caput_data[$i]->bulan_jun_tnc);
			$caput_data[$i]->bulan_jul_tnc_clr=$this->getColorTnc($caput_data[$i]->bulan_jul_tnc);
			$caput_data[$i]->bulan_agu_tnc_clr=$this->getColorTnc($caput_data[$i]->bulan_agu_tnc);
			$caput_data[$i]->bulan_sep_tnc_clr=$this->getColorTnc($caput_data[$i]->bulan_sep_tnc);
			$caput_data[$i]->bulan_okt_tnc_clr=$this->getColorTnc($caput_data[$i]->bulan_okt_tnc);
			$caput_data[$i]->bulan_nov_tnc_clr=$this->getColorTnc($caput_data[$i]->bulan_nov_tnc);
			$caput_data[$i]->bulan_des_tnc_clr=$this->getColorTnc($caput_data[$i]->bulan_des_tnc);
            $i++;
        }
        return view('contents.capaian.output', compact('current', 'modul','tahun','caput_data','judul','pg','pg_to','komponen','kd_dir','kd_subdir','data_sp','data_ikp','data_ikk','data_keg','data_kro','data_ro','data_komponen','kd_kro','mdl','kodea_kegiatan','kodea_kro','kodea_ro','kodea_komponen','kodeb_kegiatan','kodeb_kro','kodeb_ro','kodeb_komponen'));
    }
	function getColorTnc($sts){
		$s='#000';
		if($sts>0){
			$s='red';
		}
		return $s;
	}
	function getPctIsian($jml,$cnt){
		$s=0;
		if($cnt>0&&$jml>0){
			$s=($cnt/$jml)*100;
		}
		$s=number_format((float) $s,2);
		return $s;
	}
	function getPctCaput($pct,$cnt){
		$s=0;
		if($cnt>0){
			$s=($pct/($cnt*100))*100;
		}
		$s=number_format((float) $s,2);
		return $s;
	}
    public function checkInputCapaian(Request $request)
    {
		$matrik=new MatriksPengendalian;
		$matrikApproval=new MatriksApproval;
		$sts=0;
		$mdl=$request->mdl;
		$pg=$request->cpg;
		$kd=$request->kd;
		$kd_kro=$request->kd_kro;
		$kode=$request->kode;
		$bulan=$request->bulan;
		$tahun=$request->tahun;
		$kd_dir=$request->kd_dir;
		$kd_subdir=$request->kd_subdir;
		$kode_kegiatan='';
		$kode_output='';
		$kode_suboutput='';
		$kode_komponen='';
		$kode_subkomponen='';
		
		if($bulan=='JAN'){
			return '1';
		}
		if($bulan!=''){
			switch($bulan){
				case 'JAN':$bulan_idx=1;break;
				case 'FEB':$bulan_idx=2;break;
				case 'MAR':$bulan_idx=3;break;
				case 'APR':$bulan_idx=4;break;
				case 'MEI':$bulan_idx=5;break;
				case 'JUN':$bulan_idx=6;break;
				case 'JUL':$bulan_idx=7;break;
				case 'AGU':$bulan_idx=8;break;
				case 'SEP':$bulan_idx=9;break;
				case 'OKT':$bulan_idx=10;break;
				case 'NOV':$bulan_idx=11;break;
				case 'DES':$bulan_idx=12;break;
			}
		}
		if($kode!=''){
			$arrkode=explode(".", $kode);
			if($pg=='ro'){
				$kode_kegiatan=$arrkode[0];
				$kode_output=$arrkode[1];
				$kode_suboutput=$arrkode[2];
			}
			elseif($pg=='komponen'){
				$kode_kegiatan=$arrkode[0];
				$kode_output=$arrkode[1];
				$kode_suboutput=$arrkode[2];
				$kode_komponen=$arrkode[3];
			}
			elseif($pg=='subkomponen'){
				$kode_kegiatan=$arrkode[0];
				$kode_output=$arrkode[1];
				$kode_komponen=$arrkode[2];
				$kode_subkomponen=$arrkode[3];
				
				if($kd_kro!=''){
					$arrKodeKRO=explode(".", $kd_kro);
					$kode_suboutput=$arrKodeKRO[2];
				}
			}
		}
		$data  = $matrik->where([
                'kode' => $kd,
                'kode_kegiatan' => $kode_kegiatan,
				'kode_output'	=> $kode_output,
				'kode_suboutput'=> $kode_suboutput,
				'kode_komponen' => $kode_komponen,
                'kode_subdir'   => $kd_subdir,
                'bulan'         => $bulan_idx,
                'tahun'         => $tahun,
            ]);
		
		//echo $data->toSql();
		//echo json_encode($data->getBindings());
		//die();
		$count=$data->count();
		if($count>0){
			return '1';
		}
		else{
			$data1  = $matrik->where([
                'kode' => $kd,
                'kode_kegiatan' => $kode_kegiatan,
				'kode_output'	=> $kode_output,
				'kode_suboutput'=> $kode_suboutput,
				'kode_komponen' => $kode_komponen,
                'kode_subdir'   => $kd_subdir,
                'bulan'         => ($bulan_idx-1),
                'tahun'         => $tahun,
            ]);
			//echo $data1->toSql();
			//echo json_encode($data1->getBindings());
			//die();
			$count1=$data1->count();
			if($count1>0){
				return '1';
			}
			else{
				return '0';
			}
		}
	}
    public function inputCapaian(Request $request)
    {
		$dir=new Direktorat;
		$matrik=new MatriksPengendalian;
		$matrikApproval=new MatriksApproval;
		$matrikTarget=new MatriksTarget;
		$matrikSetting=new MatriksSetting;
		
        $modul='Capaian';
        $current="Capaian Pusat";
		$mdl=$request->mdl;
		$pg=$request->cpg;
		$kd=$request->kd;
		$kode=$request->kode;
		$bulan=$request->bulan;
		$tahun=$request->tahun;
		$kd_dir=$request->kd_dir;
		$kd_subdir=$request->kd_subdir;
		$kode_kegiatan='';
		$kode_output='';
		$kode_suboutput='';
		$kode_komponen='';
		$kode_subkomponen='';
		$bulan_nm='';
		$direktorat='';
		
		$kodea_kegiatan=$request->kodea_kegiatan;
		$kodea_kro=$request->kodea_kro;
		$kodea_ro=$request->kodea_ro;
		$kodea_komponen=$request->kodea_komponen;
		$kodeb_kegiatan=$request->kodeb_kegiatan;
		$kodeb_kro=$request->kodeb_kro;
		$kodeb_ro=$request->kodeb_ro;
		$kodeb_komponen=$request->kodeb_komponen;
		
		$data_sp=[];
		$data_ikp=[];
		$data_ikk=[];
		$data_keg=[];
		$data_kro=[];
		$data_ro=[];
		$data_komponen=[];
		$str_sp='';
		$str_ikp='';
		$str_ikk='';
		$str_keg='';
		$str_kro='';
		$str_ro='';
		$str_komponen='';
		$kd_kro=$request->kd_kro;
		
		$str_ikk=" select b.kode,b.nama 
					from tb_indikator_kegiatan a 
					inner join tbm_indikator_kegiatan b on a.id_ikk=b.id
					where a.id_dir=".$kd_dir." and a.kd_kegiatan='".substr($kode,0,4)."' order by a.id_sp,a.id_ikk";
					
		$str_keg=" select kode,deskripsi nama from tb_sakti_kegiatan where kode='".substr($kode,0,4)."'";
		
		$str_kro=" select substring(kode,6,3) kode,deskripsi nama from tb_sakti_output where kode='".substr($kd_kro,0,8)."'";
		
		$str_ro=" select substring(kode,10,3) kode,deskripsi nama from tb_sakti_suboutput where kode='".$kd_kro."'";
		
		
		$str_sp=" select b.kode,b.nama 
					from tb_sasaran_program a 
					inner join tbm_sasaran_program b on a.id_sp=b.id
					where a.id_dir=".$kd_dir;
			
		$str_ikp=" select b.kode,b.nama 
				from tb_indikator_program a 
				inner join tbm_indikator_program b on a.id_ikp=b.id
				where a.id_dir=".$kd_dir." order by a.id_sp,a.id_ikp";
				
		$data_sp=DB::select($str_sp);
		$data_ikp=DB::select($str_ikp);
		if($str_ikk!=''){
			$data_ikk=DB::select($str_ikk);
		}
		if($str_keg!=''){
			$data_keg=DB::select($str_keg);
		}
		if($str_kro!=''){
			$data_kro=DB::select($str_kro);
		}
		if($str_ro!=''){
			$data_ro=DB::select($str_ro);
		}
		if($kode!=''){
			$arrkode=explode(".", $kode);
			if($pg=='ro'){
				$kode_kegiatan=$arrkode[0];
				$kode_output=$arrkode[1];
				$kode_suboutput=$arrkode[2];
			}
			elseif($pg=='komponen'){
				$kode_kegiatan=$arrkode[0];
				$kode_output=$arrkode[1];
				$kode_suboutput=$arrkode[2];
				$kode_komponen=$arrkode[3];
				
				$str_komponen=" select substring(kode,14,3) kode,deskripsi nama from tb_sakti_komponen where kode='".$kd_kro.".".$kode_komponen."'";
			}
			elseif($pg=='subkomponen'){
				$kode_kegiatan=$arrkode[0];
				$kode_output=$arrkode[1];
				$kode_komponen=$arrkode[2];
				$kode_subkomponen=$arrkode[3];
				$kode=$kode_subkomponen;
				
				if($kd_kro!=''){
					$arrKodeKRO=explode(".", $kd_kro);
					$kode_suboutput=$arrKodeKRO[2];
				}
				$str_komponen=" select substring(kode,14,3) kode,deskripsi nama from tb_sakti_komponen where kode='".$kd_kro.".".$kode_komponen."'";
			}
		}
		
		if($str_komponen!=''){
			$data_komponen=DB::select($str_komponen);
		}
		$bulan_idx=0;
		if($bulan!=''){
			switch($bulan){
				case 'JAN':$bulan_idx=1;$bulan_nm='JANUARI';break;
				case 'FEB':$bulan_idx=2;$bulan_nm='FEBRUARI';break;
				case 'MAR':$bulan_idx=3;$bulan_nm='MARET';break;
				case 'APR':$bulan_idx=4;$bulan_nm='APRIL';break;
				case 'MEI':$bulan_idx=5;$bulan_nm='MEI';break;
				case 'JUN':$bulan_idx=6;$bulan_nm='JUNI';break;
				case 'JUL':$bulan_idx=7;$bulan_nm='JULI';break;
				case 'AGU':$bulan_idx=8;$bulan_nm='AGUSTUS';break;
				case 'SEP':$bulan_idx=9;$bulan_nm='SEPTEMBER';break;
				case 'OKT':$bulan_idx=10;$bulan_nm='OKTOBER';break;
				case 'NOV':$bulan_idx=11;$bulan_nm='NOVEMBER';break;
				case 'DES':$bulan_idx=12;$bulan_nm='DESEMBER';break;
			}
		}
		$hal="input";
		
		if($pg=='ro'){
			$str_real="select sum(a.nilai_rupiah) total FROM tb_sakti_realisasi a where no_sp2d is not null
				and a.kode_kegiatan='".$kode_kegiatan."' and a.kode_output='".$kode_output."' and a.kode_suboutput='".$kode_suboutput."' and a.kode_subkomponen 
				in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = ".$kd_dir.") ";
			$data_real=DB::select($str_real);
		}
		elseif($pg=='komponen'){
			$str_real="select sum(a.nilai_rupiah) total FROM tb_sakti_realisasi a where no_sp2d is not null
				and a.kode_kegiatan='".$kode_kegiatan."' and a.kode_output='".$kode_output."' and a.kode_suboutput='".$kode_suboutput."' and a.kode_komponen='".$kode_komponen."' and a.kode_subkomponen 
				in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = ".$kd_dir.") ";
			$data_real=DB::select($str_real);
		}
		elseif($pg=='subkomponen'){
			$str_real="select sum(a.nilai_rupiah) total FROM tb_sakti_realisasi a where no_sp2d is not null
				and a.kode_kegiatan='".$kode_kegiatan."' and a.kode_output='".$kode_output."' and a.kode_suboutput='".$kode_suboutput."' and a.kode_komponen='".$kode_komponen."' and  a.kode_subkomponen='".$kode_subkomponen."' and a.kode_subkomponen 
				in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = ".$kd_dir.") ";
			$data_real=DB::select($str_real);
		}
		$realisasi=0;
		if(!empty($data_real)){
			foreach($data_real as $item){
				$realisasi=$item->total;
			}
		}
		$realisasi=number_format($realisasi);
		
		if($pg=='ro'){
			$data= $matrik->where([
	            'kode' => $kode,
	            'kode_kegiatan' => $kode_kegiatan,
	            'kode_output' => $kode_output,
	            'kode_suboutput' => $kode_suboutput,
	            'bulan' => $bulan_idx,
	            'tahun'=> $tahun
	        ])->first();
			$dataYear= $matrik->where([
	            'kode' => $kode,
	            'kode_kegiatan' => $kode_kegiatan,
	            'kode_output' => $kode_output,
	            'kode_suboutput' => $kode_suboutput,
	            'tahun'=> $tahun
	        ])->get();
			$dataTarget= $matrikTarget->where([
	            'kode' => $kode,
	            'kode_kegiatan' => $kode_kegiatan,
	            'kode_output' => $kode_output,
	            'kode_suboutput' => $kode_suboutput,
	            'tahun'=> $tahun
	        ])->first();
		}
		else{
			$data= $matrik->where([
	            'kode' => $kode,
	            'kode_kegiatan' => $kode_kegiatan,
	            'kode_output' => $kode_output,
	            'kode_suboutput' => $kode_suboutput,
	            'kode_komponen' => $kode_komponen,
	            'bulan' => $bulan_idx,
	            'tahun'=> $tahun
	        ])->first();
			$dataYear= $matrik->where([
	            'kode' => $kode,
	            'kode_kegiatan' => $kode_kegiatan,
	            'kode_output' => $kode_output,
	            'kode_suboutput' => $kode_suboutput,
	            'kode_komponen' => $kode_komponen,
	            'tahun'=> $tahun
	        ])->get();
			$dataTarget= $matrikTarget->where([
	            'kode' => $kode,
	            'kode_kegiatan' => $kode_kegiatan,
	            'kode_output' => $kode_output,
	            'kode_suboutput' => $kode_suboutput,
	            'kode_komponen' => $kode_komponen,
	            'tahun'=> $tahun
	        ])->first();
		}
		$target_volume=0;
		$target_tovolume=0;
		$target_satuan='';
		$sumTargetMatrik=$dataYear->sum('to_volume');
		$target_totala=0; //total target sebelum proses pelaksanaan
		
		if($dataTarget){
			$target_volume=$dataTarget->co_volume;
			$target_satuan=$dataTarget->co_satuan;
		}
		if(empty($data)){
			/*
			$target_volume=$target_volume-$sumTargetMatrik;
			if($target_volume<=0){
				$target_volume=0;
			}
			*/
			$target_totala=$sumTargetMatrik;
		}
		else{
			$target_volume=$data->co_volume;
			$target_tovolume=$data->to_volume;
			$target_totala=$sumTargetMatrik-$target_tovolume;
		}
		
		$direktorat = $dir->where('id_dir',$kd_dir)->first()->nama_dir;
		
		/*
		atatus:
		0=>kasubagtu simpan draft
		1=>kasubagtu pengajuan
		2=>pptk setuju
		3=>pptk perbaikan
		4=>ppk setuju
		5=>ppk perbaikan
		6=>bagren simpan draft
		7=>bagren setuju
		8=>bagren perbaikan
		
		level:
		PPTK=>3
		PPK=>2
		KasubagTU=>27
		Superadmin=>0
		
		*/
		
		$status=0;
		$id_matriks=0;
		if($data){
			$status=$data->status;
			$id_matriks=$data->id;
		}
		$act="input";
		if($status==0){
			if(Auth::user()->level==27){
				$act="input";
			}
			else if(Auth::user()->level==0){
				$act="input";
				$status=6;
			}
			else{
				$act="view";
			}
		}
		else if($status==1){
			if(Auth::user()->level==3){
				$act="validasi";
			}
			else{
				$act="view";
			}
		}
		else if($status==2){
			if(Auth::user()->level==2){
				$act="validasi";
			}
			else{
				$act="view";
			}
		}
		else if($status==3){
			if(Auth::user()->level==27){
				$act="input";
			}
			else{
				$act="view";
			}
		}
		else if($status==4){
			if(Auth::user()->level==0){
				$act="input";
			}
			else{
				$act="view";
			}
		}
		else if($status==5){
			if(Auth::user()->level==27){
				$act="input";
			}
			else{
				$act="view";
			}
		}
		else if($status==6){
			if(Auth::user()->level==0){
				$act="input";
			}
			else{
				$act="view";
			}
		}
		else if($status==6){
			if(Auth::user()->level==0){
				$act="input";
			}
			else{
				$act="view";
			}
		}
		else if($status==7){
			$act="view";
		}
		else if($status==8){
			if(Auth::user()->level==27){
				$act="input";
			}
			else{
				$act="view";
			}
		}
		
		$tgl_mulai='';
		$tgl_akhir='';
		$data_setting=$matrikSetting::first();
		if(!empty($data_setting)){
			$tgl_mulai=$data_setting->tgl_mulai;
			$tgl_akhir=$data_setting->tgl_akhir;
		}
		$errtanggalisi='';
		if($tgl_mulai!=''){
			if(Auth::user()->level==27&&$act!="view"){
				$tgl_skr=date('Y-m-d');
				if(!$this->betweenDates($tgl_skr,$tgl_mulai,$tgl_akhir)){
					$errtanggalisi='Tanggal pengisian tidak valid. Tanggal pengisian dimulai dari tanggal '.$this->IndonesiaTgl($tgl_mulai).' smapai tanggal '.$this->IndonesiaTgl($tgl_akhir);
					$act="view";
				}
			}
		}
		
		$count_approval=0;
		if($id_matriks!=0){
			$count= $matrikApproval->where([
	            'id_matriks' => $id_matriks
	        ])->count();
			$count_approval=$count;
		}
        return view('contents.capaian.input', compact('current', 'modul','act','kode','bulan','bulan_nm','tahun','pg','data','kd_dir','kd_subdir','kode_kegiatan','kode_output','kode_suboutput','kode_komponen','kode_subkomponen','direktorat','status','count_approval','data_sp','data_ikp','data_ikk','data_keg','data_kro','data_ro','data_komponen','kd_kro','mdl','kodea_kegiatan','kodea_kro','kodea_ro','kodea_komponen','kodeb_kegiatan','kodeb_kro','kodeb_ro','kodeb_komponen','target_volume','target_satuan','errtanggalisi','realisasi','target_totala'));
    }
    public function submitInputCapaian(Request $request)
    {
		$dir=new Direktorat;
		$subdir=new Subdirektorat;
        $matrik=new MatriksPengendalian;
        $matrikFile=new MatriksFile;
        $matrikApproval=new MatriksApproval;
		$user=new User;
		$tools=new ToolsController;
		
		$pg=$request->cpg;
		$kode=$request->kode;
		$kd_dir=$request->kode_dir;
		$kd_subdir=$request->kode_subdir;
		$kd_kro=$request->kd_kro;
		$status_old=$request->status_old;
		$tahun=$request->tahun;
		$kodep='';
		
		$data_dir = $dir->where([
                'id_dir' => $kd_dir
        ])->first();
		$data_subdir = $subdir->where([
                'id_dir' => $kd_dir,
                'id' => $kd_subdir
        ])->first();
		
		if($pg=="ro"){
			$kodep=$request->kode_kegiatan.'.'.$request->kode_output.'.'.$request->kode_suboutput;
		}
		elseif($pg=="komponen"){
			$kodep=$request->kode_kegiatan.'.'.$request->kode_output.'.'.$request->kode_suboutput.'.'.$request->kode_komponen;
		}
		elseif($pg=="subkomponen"){
			$kodep=$request->kode_kegiatan.'.'.$request->kode_output.'.'.$request->kode_suboutput.'.'.$request->kode_komponen.'.'.$request->kode;
		}
		$validation = [
            'kode' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'evidence' => 'max:2048',
        ];

        $message    = [
            'required'  => ':attribute tidak boleh kosong',
            'integer'   => ':attribute tidak valid',
            'date'      => ':attribute tidak valid',
            'max'       => ':attribute Ukuran Maksimal 2 MB'
        ];

        $names      = [
            'kode'=> 'Kode',
            'bulan'=> 'Bulan',
            'tahun'=> 'Tahun',
            'evidence'=> 'Dokumen Evidence',
        ];
		
        $validator = Validator::make($request->all(), $validation, $message, $names);
		
        if ($validator->fails())
        {
            return response()->json([
                'status'    => 'failed',
                'title'     => 'Validasi Error',
                'message'   => $validator->errors()->all()
            ]);
        }
		try
        {
            $evidence   = "";
            //$direktorat = $dir->where('id_dir', Auth::user()->id_dir)->first()->nama_dir;
			$direktorat = $dir->where('id_dir',$request->kode_dir)->first()->nama_dir;
			$bulan=$request->bulan;
			if($bulan!=''){
				switch($bulan){
					case 'JAN':$bulan_idx=1;$bulan_nm='JANUARI';break;
					case 'FEB':$bulan_idx=2;$bulan_nm='FEBRUARI';break;
					case 'MAR':$bulan_idx=3;$bulan_nm='MARET';break;
					case 'APR':$bulan_idx=4;$bulan_nm='APRIL';break;
					case 'MEI':$bulan_idx=5;$bulan_nm='MEI';break;
					case 'JUN':$bulan_idx=6;$bulan_nm='JUNI';break;
					case 'JUL':$bulan_idx=7;$bulan_nm='JULI';break;
					case 'AGU':$bulan_idx=8;$bulan_nm='AGUSTUS';break;
					case 'SEP':$bulan_idx=9;$bulan_nm='SEPTEMBER';break;
					case 'OKT':$bulan_idx=10;$bulan_nm='OKTOBER';break;
					case 'NOV':$bulan_idx=11;$bulan_nm='NOVEMBER';break;
					case 'DES':$bulan_idx=12;$bulan_nm='DESEMBER';break;
				}
			}
			
			
            if($request->hasFile('evidence'))
            {
                $evidence = $this->uploadFile($request, 'evidence', $direktorat);
            }
			
			$count  = $matrik->where([
                'kode' => $request->kode,
                'kode_kegiatan' => $request->kode_kegiatan,
				'kode_output'	=> $request->kode_output,
				'kode_suboutput'=> $request->kode_suboutput,
				'kode_komponen' => $request->kode_komponen,
                'kode_subdir'   => $request->kode_subdir,
                'bulan'         => $bulan_idx,
                'tahun'         => $request->tahun,
            ])->count();
			$count_approval=0;
			if($request->count_approval!=''){
				$count_approval=$request->count_approval;
			}
			$status=$request->status;
			
			$note_status='';
			if($status==0){
				$note_status='Kasubag TU mengisi capaian output';
			}
			if($status==1){
				if($count_approval==1){
					$note_status='Kasubag TU mengisi dan mengajukan persetujuan ke PPTK';
				}
				elseif($count_approval==2){
					$note_status='Kasubag TU mengajukan persetujuan ke PPTK';
				}
				elseif($count_approval>2){
					$note_status='Kasubag TU melakukan perbaikan dan mengajukan persetujuan ke PPTK';
				}
				$data_user=$user->where('level',3)->where('id_dir',$kd_dir)->where('id_subdir',$kd_subdir)->get();
				if($count_approval>2){
					$message='Kasubag TU melakukan perbaikan dan mengajukan persetujuan capaian output ke PPTK '.$data_subdir->nama_subdir.' dengan nomenklatur *'.$kodep.'* pada bulan *'.$bulan_nm.'* tahun *'.$tahun.'*';
				}
				else{
					$message='Kasubag TU mengajukan persetujuan capaian output ke PPTK '.$data_subdir->nama_subdir.' dengan nomenklatur *'.$kodep.'* pada bulan *'.$bulan_nm.'* tahun *'.$tahun.'*';
				}
				foreach($data_user as $item){
					if($item->no_hp!=''){
						$no_hp=$item->no_hp;
						$tools->sendingWa($item->no_hp, $message);
					}
				}
				
				$data_user=$user->where('level',0)->get();
				if($count_approval>2){
					$message='Kasubag TU melakukan perbaikan dan mengajukan persetujuan capaian output ke PPTK '.$data_subdir->nama_subdir.' dengan nomenklatur *'.$kodep.'* pada bulan *'.$bulan_nm.'* tahun *'.$tahun.'*';
				}
				else{
					$message='Kasubag TU mengajukan persetujuan capaian output ke PPTK '.$data_subdir->nama_subdir.' dengan nomenklatur *'.$kodep.'* pada bulan *'.$bulan_nm.'* tahun *'.$tahun.'*';
				}
				foreach($data_user as $item){
					if($item->no_hp!=''){
						$no_hp=$item->no_hp;
						$tools->sendingWa($item->no_hp, $message);
					}
				}
			}
			else if($status==6){
				$note_status='Admin Bagren mengisi capaian output';
			}
			else if($status==7){
				if($status_old==4){
					$note_status='Admin Bagren menyetujui capaian output dari PPK';
					
					$data_user=$user->where('level',2)->where('id_dir',$kd_dir)->get();
					$message='Admin Bagren menyetujui pengajuan capaian output dari Kasubag TU, PPTK dan PPK '.$data_dir->nama_dir.' dengan nomenklatur *'.$kodep.'* pada bulan *'.$bulan_nm.'* tahun *'.$tahun.'*';
					foreach($data_user as $item){
						if($item->no_hp!=''){
							$no_hp=$item->no_hp;
							$tools->sendingWa($item->no_hp, $message);
						}
					}
					
					$data_user=$user->where('level',3)->where('id_dir',$kd_dir)->where('id_subdir',$kd_subdir)->get();
					$message='Admin Bagren menyetujui pengajuan capaian output dari Kasubag TU, PPTK dan PPK '.$data_dir->nama_dir.' dengan nomenklatur *'.$kodep.'* pada bulan *'.$bulan_nm.'* tahun *'.$tahun.'*';
					foreach($data_user as $item){
						if($item->no_hp!=''){
							$no_hp=$item->no_hp;
							$tools->sendingWa($item->no_hp, $message);
						}
					}
					
					$data_user=$user->where('level',27)->get();
					$message='Admin Bagren menyetujui pengajuan capaian output dari Kasubag TU, PPTK dan PPK '.$data_dir->nama_dir.' dengan nomenklatur *'.$kodep.'* pada bulan *'.$bulan_nm.'* tahun *'.$tahun.'*';
					foreach($data_user as $item){
						if($item->no_hp!=''){
							$no_hp=$item->no_hp;
							$tools->sendingWa($item->no_hp, $message);
						}
					}
				}
				else{
					$note_status='Bagren menyetujui capaian output';
					$data_user=$user->where('level',27)->get();
					$message='Admin Bagren menyetujui pengajuan capaian output '.$data_dir->nama_dir.' dengan nomenklatur *'.$kodep.'* pada bulan *'.$bulan_nm.'* tahun *'.$tahun.'*';
					foreach($data_user as $item){
						if($item->no_hp!=''){
							$no_hp=$item->no_hp;
							$tools->sendingWa($item->no_hp, $message);
						}
					}
				}
			}
			else if($status==8){
				$note_status='Admin Bagren meminta perbaikan capaian output ke Kasubag TU';
				
				$data_user=$user->where('level',27)->get();
				$message='Admin Bagren meminta perbaikan capaian output ke Kasubag TU dengan nomenklatur *'.$kodep.'* pada bulan *'.$bulan_nm.'* tahun *'.$tahun.'*';
				foreach($data_user as $item){
					if($item->no_hp!=''){
						$no_hp=$item->no_hp;
						$tools->sendingWa($item->no_hp, $message);
					}
				}
				
				$data_user=$user->where('level',2)->where('id_dir',$kd_dir)->get();
				$message='Admin Bagren meminta perbaikan capaian output ke Kasubag TU dengan nomenklatur *'.$kodep.'* pada bulan *'.$bulan_nm.'* tahun *'.$tahun.'*';
				foreach($data_user as $item){
					if($item->no_hp!=''){
						$no_hp=$item->no_hp;
						$tools->sendingWa($item->no_hp, $message);
					}
				}
				
				$data_user=$user->where('level',3)->where('id_dir',$kd_dir)->where('id_subdir',$kd_subdir)->get();
				$message='Admin Bagren meminta perbaikan capaian output ke Kasubag TU dengan nomenklatur *'.$kodep.'* pada bulan *'.$bulan_nm.'* tahun *'.$tahun.'*';
				foreach($data_user as $item){
					if($item->no_hp!=''){
						$no_hp=$item->no_hp;
						$tools->sendingWa($item->no_hp, $message);
					}
				}
			}
			if($count == 0)
            {
                $query=$matrik->create([
                    'kode'          => $request->kode,
                    'kode_subdir'   => $request->kode_subdir,
                    'kode_kegiatan' => $request->kode_kegiatan,
                    'kode_output'	=> $request->kode_output,
                    'kode_suboutput'=> $request->kode_suboutput,
                    'kode_komponen' => $request->kode_komponen,
                    'bulan'         => $bulan_idx,
                    'tahun'         => $request->tahun,
	                'co_volume'     => $request->co_volume,
	                'co_satuan'     => $request->co_satuan,
					'to_volume'     => $request->to_volume,
					'to_satuan'     => $request->to_satuan,
	                'to_pct'        => $request->to_pct,
	                'persen_kinerja' => $request->proses_kinerja,
	                'pemanfaatan'    => $request->pemanfaatan,
	                'pemanfaatan_ket'=> $request->pemanfaatan_ket,
	                'kendala'        => $request->kendala,
	                'tinjut'         => $request->tinjut,
	                'kendala'        => $request->kendala,
                    'status'      	 => $status,
                    'evidence'       => $evidence,
                    'created_by'     => Auth::user()->id_akses,
                    'created_at'     => date("Y-m-d H:i:s")
                ]);
				$data=	$matrik->where([
			                'kode_kegiatan' => $request->kode_kegiatan,
							'kode_output'	=> $request->kode_output,
							'kode_suboutput'=> $request->kode_suboutput,
							'kode_komponen' => $request->kode_komponen,
			                'kode_subdir'   => $request->kode_subdir,
			                'bulan'         => $bulan_idx,
			                'tahun'         => $request->tahun,
		            	])->get();
						
				$id_matriks=0;
				foreach($data as $item){
					$id_matriks=$item->id;
				}
				$matrikFile->create([
                   	'id_matriks' => $id_matriks,
                    'evidence'   => $evidence,
                    'created_by' => Auth::user()->id_akses,
                    'created_at' => date("Y-m-d H:i:s")
                ]);
				$matrikApproval->create([
                   	'id_matriks' 	=> $id_matriks,
                    'note_status'   => $note_status,
                    'status'   		=> $status,
                    'created_by' 	=> Auth::user()->id_akses,
                    'created_at' 	=> date("Y-m-d H:i:s")
                ]);
            }
            else
            {
				if($evidence==''){
					if($request->evidence_old!=''){
						$evidence=$request->evidence_old;
					}
				}
                $matrik->where([
                    'id' => $request->id_matriks
                ])->update([
	                'to_volume'     => $request->to_volume,
	                'to_pct'      	=> $request->to_pct,
	                'persen_kinerja' => $request->proses_kinerja,
	                'pemanfaatan'    => $request->pemanfaatan,
	                'pemanfaatan_ket'=> $request->pemanfaatan_ket,
	                'kendala'        => $request->kendala,
	                'tinjut'         => $request->tinjut,
	                'kendala'        => $request->kendala,
                    'evidence'       => $evidence,
                    'status'      	 => $request->status,
                    'updated_by'     => Auth::user()->id_akses,
                    'updated_at'     => date("Y-m-d H:i:s")
                ]);
				if($request->evidence_old!=$evidence){
					$matrikFile->create([
	                   	'id_matriks' => $request->id_matriks,
	                    'evidence'   => $evidence,
	                    'created_by' => Auth::user()->id_akses,
                    	'created_at' => date("Y-m-d H:i:s")
	                ]);
				}
				if($request->count_approval==0){
					$matrikApproval->create([
	                   	'id_matriks' 	=> $request->id_matriks,
	                    'note_status'   => $note_status,
	                    'status'   		=> $status,
	                    'created_by' 	=> Auth::user()->id_akses,
	                    'created_at' 	=> date("Y-m-d H:i:s")
	                ]);
				}
				else{
					if($request->status_old!=$status){
						$matrikApproval->create([
		                   	'id_matriks' 	=> $request->id_matriks,
		                    'note_status'   => $note_status,
		                    'note_perbaikan'   => $request->note_perbaikan,
		                    'status'   		=> $status,
		                    'created_by' 	=> Auth::user()->id_akses,
		                    'created_at' 	=> date("Y-m-d H:i:s")
		                ]);
					}
				}
            }
            //$data       = $capaian->where('kode', $request->kode)->get();
			
            return response()->json([
                'status'    => 'success',
                'title'     => 'Data Berhasil Disimpan',
                'message'   => 'Data Capaian Output Berhasil Diupload'
            ]);
        } 
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }
    }
    public function submitValidasiCapaian(Request $request)
	{
		$dir=new Direktorat;
		$subdir=new Subdirektorat;
        $matrik=new MatriksPengendalian;
        $matrikApproval=new MatriksApproval;
		$user=new User;
		$tools=new ToolsController;
		
		$pg=$request->cpg;
		$kode=$request->kode;
		$kd_dir=$request->kode_dir;
		$kd_subdir=$request->kode_subdir;
		$kd_kro=$request->kd_kro;
		$tahun=$request->tahun;
		
		$kodep='';
		$data= $matrik->where([
            'id' => $request->id_matriks
        ])->first();
		
		if($pg=="ro"){
			$kodep=$data->kode_kegiatan.'.'.$data->kode_output.'.'.$data->kode_suboutput;
		}
		elseif($pg=="komponen"){
			$kodep=$data->kode_kegiatan.'.'.$data->kode_output.'.'.$data->kode_suboutput.'.'.$data->kode_komponen;
		}
		elseif($pg=="subkomponen"){
			$kodep=$data->kode_kegiatan.'.'.$data->kode_output.'.'.$data->kode_suboutput.'.'.$data->kode_komponen.'.'.$data->kode;
		}
		
		$data_dir = $dir->where([
                'id_dir' => $kd_dir
        ])->first();
		
		$data_subdir = $subdir->where([
                'id_dir' => $kd_dir,
                'id' => $kd_subdir
        ])->first();
		
		try
        {
			$tahun=$data->tahun;
			$bulan=$data->bulan;
			if($bulan!=''){
				switch($bulan){
					case 1:$bulan_nm='JANUARI';break;
					case 2:$bulan_nm='FEBRUARI';break;
					case 3:$bulan_nm='MARET';break;
					case 4:$bulan_nm='APRIL';break;
					case 5:$bulan_nm='MEI';break;
					case 6:$bulan_nm='JUNI';break;
					case 7:$bulan_nm='JULI';break;
					case 8:$bulan_nm='AGUSTUS';break;
					case 9:$bulan_nm='SEPTEMBER';break;
					case 10:$bulan_nm='OKTOBER';break;
					case 11:$$bulan_nm='NOVEMBER';break;
					case 12:$bulan_nm='DESEMBER';break;
				}
			}
			$status=$request->status;
			$act=$request->act;
			$note='';
			if($status==2){
				$note='PPTK menyetujui pengajuan capaian output dari Kasubag TU dan meminta persetujuan kepada PPK';
				
				$data_user=$user->where('level',27)->get();
				$message='PPTK '.$data_subdir->nama_subdir.' menyetujui pengajuan capaian output dari Kasubag TU dengan nomenklatur *'.$kodep.'* pada bulan *'.$bulan_nm.'* tahun *'.$tahun.'*';
				foreach($data_user as $item){
					if($item->no_hp!=''){
						$no_hp=$item->no_hp;
						$tools->sendingWa($item->no_hp, $message);
					}
				}
				
				$data_user=$user->where('level',2)->where('id_dir',$kd_dir)->get();
				$message='PPTK '.$data_subdir->nama_subdir.' meminta persetujuan capaian output kepada PPK dengan nomenklatur *'.$kodep.'* pada bulan *'.$bulan_nm.'* tahun *'.$tahun.'*';
				foreach($data_user as $item){
					if($item->no_hp!=''){
						$no_hp=$item->no_hp;
						$tools->sendingWa($item->no_hp, $message);
					}
				}
				
				$data_user=$user->where('level',0)->get();
				$message='PPTK '.$data_subdir->nama_subdir.' meminta persetujuan capaian output kepada PPK dengan nomenklatur *'.$kodep.'* pada bulan *'.$bulan_nm.'* tahun *'.$tahun.'*';
				foreach($data_user as $item){
					if($item->no_hp!=''){
						$no_hp=$item->no_hp;
						$tools->sendingWa($item->no_hp, $message);
					}
				}
			}
			else if($status==3){
				$note='PPTK meminta perbaikan capaian output ke Kasubag TU';
				
				$data_user=$user->where('level',27)->get();
				$message='PPTK '.$data_subdir->nama_subdir.' meminta perbaikan capaian output ke Kasubag TU dengan nomenklatur *'.$kodep.'* pada bulan *'.$bulan_nm.'* tahun *'.$tahun.'*';
				foreach($data_user as $item){
					if($item->no_hp!=''){
						$no_hp=$item->no_hp;
						$tools->sendingWa($item->no_hp, $message);
					}
				}
				
				$data_user=$user->where('level',0)->get();
				$message='PPTK '.$data_subdir->nama_subdir.' meminta perbaikan capaian output ke Kasubag TU dengan nomenklatur *'.$kodep.'* pada bulan *'.$bulan_nm.'* tahun *'.$tahun.'*';
				foreach($data_user as $item){
					if($item->no_hp!=''){
						$no_hp=$item->no_hp;
						$tools->sendingWa($item->no_hp, $message);
					}
				}
			}
			else if($status==4){
				$note='PPK menyetujui pengajuan capaian output dari PPTK dan meminta persetujuan kepada Admin Bagren';
				
				$data_user=$user->where('level',3)->where('id_dir',$kd_dir)->where('id_subdir',$kd_subdir)->get();
				$message='PPK '.$data_dir->nama_dir.' menyetujui pengajuan capaian output dari Kasubag TU dan PPTK dengan nomenklatur *'.$kodep.'* pada bulan *'.$bulan_nm.'* tahun *'.$tahun.'*';
				foreach($data_user as $item){
					if($item->no_hp!=''){
						$no_hp=$item->no_hp;
						$tools->sendingWa($item->no_hp, $message);
					}
				}
				
				$data_user=$user->where('level',0)->get();
				$message='PPK '.$data_dir->nama_dir.' meminta persetujuan capaian output kepada Admin Bagren dengan nomenklatur *'.$kodep.'* pada bulan *'.$bulan_nm.'* tahun *'.$tahun.'*';
				foreach($data_user as $item){
					if($item->no_hp!=''){
						$no_hp=$item->no_hp;
						$tools->sendingWa($item->no_hp, $message);
					}
				}
			}
			else if($status==5){
				$note='PPK meminta perbaikan capaian output ke Kasubag TU';
				
				$data_user=$user->where('level',27)->get();
				$message='PPK '.$data_dir->nama_dir.' meminta perbaikan capaian output ke Kasubag TU dengan nomenklatur *'.$kodep.'* pada bulan *'.$bulan_nm.'* tahun *'.$tahun.'*';
				foreach($data_user as $item){
					if($item->no_hp!=''){
						$no_hp=$item->no_hp;
						$tools->sendingWa($item->no_hp, $message);
					}
				}
				
				$data_user=$user->where('level',0)->get();
				$message='PPK '.$data_dir->nama_dir.' meminta perbaikan capaian output ke Kasubag TU dengan nomenklatur *'.$kodep.'* pada bulan *'.$bulan_nm.'* tahun *'.$tahun.'*';
				foreach($data_user as $item){
					if($item->no_hp!=''){
						$no_hp=$item->no_hp;
						$tools->sendingWa($item->no_hp, $message);
					}
				}
			}
			
            $matrik->where([
                'id' => $request->id_matriks
            ])->update([
                'status'     => $status,
                'updated_by' => Auth::user()->id_akses,
                'updated_at' => date("Y-m-d H:i:s")
            ]);
			
			$matrikApproval->create([
               	'id_matriks' 	=> $request->id_matriks,
                'note_status'   => $note,
                'note_perbaikan'=> $request->note_perbaikan,
                'status'   		=> $status,
                'created_by' 	=> Auth::user()->id_akses,
               	'created_at' 	=> date("Y-m-d H:i:s")
            ]);
            return response()->json([
                'status'    => 'success',
                'title'     => 'Data Berhasil Disimpan',
                'message'   => 'Data Capaian Output Berhasil Disimpan'
            ]);
        } 
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }
	}
	
    public function logfile(Request $request)
    {
		$return='';
		if($request->id_matriks!=''){
			$str=" select a.created_at as log_time, b.nama, a.evidence 
				   from tb_matriks_logfile a
				   left join tb_akses b on a.created_by=b.id_akses
				   where a.id_matriks=".$request->id_matriks." 
				   order by a.created_at desc ";
			$data=DB::select($str);
			
			$return='';
			if(!empty($data)){
		        $return = '<br><div class="timeline timeline-inverse">';
		        foreach ($data as $value)
		        {
					$evidence_file=route('download.dokumen-capaian',['id_dir'=>$request->kd_dir,'jenis_file'=>'evidence','nama_file'=>$value->evidence]);
		            $return .= '<div>
		                <i class="fas fa-file bg-info" style="color:#fff"></i>
		                <div class="timeline-item">
		                    <div class="timeline-body" style="color:#000;font-weight:450">
		                        <a href="'.$evidence_file.'" target="_blank" style="text-decoration:none"><font style="color:red;font-weight:450;"><i class="far fa-file"></i> '.$value->evidence.'</font></a>
		                    </div>
		                    <span class="time" style="color:#000;font-weight:450">'.date("d/m/Y H:i", strtotime($value->log_time)).'</span>
		                    <h4 class="timeline-header"><font style="color:#000;font-weight:450">'.$value->nama.'</font> </h4>
		                </div>
		            </div>';
		        }
		        $return .= '<div>
		                        <i class="far fa-clock bg-gray" style="color:#fff"></i>
		                    </div>
		                </div>';
			}
			else{
				$return='<font class="normal">tidak ada data</font>';
			}
		}
        return $return;
    }
	
    public function logapproval(Request $request)
    {
		$return='';
		if($request->id_matriks!=''){
			$str=" select a.created_at as log_time, b.nama, a.note_status, a.note_perbaikan 
				   from tb_matriks_logapproval a
				   left join tb_akses b on a.created_by=b.id_akses
				   where a.id_matriks=".$request->id_matriks." 
				   order by a.created_at desc ";
			$data=DB::select($str);
			
			$return='';
			if(!empty($data)){
		        $return = '<br><div class="timeline timeline-inverse">';
		        foreach ($data as $value)
		        {
					$note=$value->note_status;
					$note_perbaikan=$value->note_perbaikan;
					if($note_perbaikan!=''){
						$note.='<br><br>Catatan Perbaikan:<br>'.$note_perbaikan;
					}
		            $return .= '<div>
		                <i class="fas fa-file bg-info" style="color:#fff"></i>
		                <div class="timeline-item">
		                    <span class="time" style="color:#000;font-weight:450">'.date("d/m/Y H:i", strtotime($value->log_time)).'</span>
		                    <h4 class="timeline-header"><font style="color:#000;font-weight:450">'.$value->nama.'</font> </h4>
		                    <div class="timeline-body" style="color:#000;font-weight:400;font-size:11pt">
		                        '.$note.'
		                    </div>
		                </div>
		            </div>';
		        }
		        $return .= '<div>
		                        <i class="far fa-clock bg-gray" style="color:#fff"></i>
		                    </div>
		                </div>';
			}
			else{
				$return='<font class="normal">tidak ada data</font>';
			}
		}
        return $return;
    }
    public function inputTarget(Request $request)
    {
		$dir=new Direktorat;
		$matrik=new MatriksTarget;
        $modul='Capaian';
        $current="Capaian Pusat";
		$mdl=$request->mdl;
		$pg=$request->cpg;
		$kd=$request->kd;
		$kode=$request->kode;
		$bulan=$request->bulan;
		$tahun=$request->tahun;
		$kd_dir=$request->kd_dir;
		$kd_subdir=$request->kd_subdir;
		$kode_kegiatan='';
		$kode_output='';
		$kode_suboutput='';
		$kode_komponen='';
		$kode_subkomponen='';
		$bulan_nm='';
		$direktorat='';
		
		$data_sp=[];
		$data_ikp=[];
		$data_ikk=[];
		$data_keg=[];
		$data_kro=[];
		$data_ro=[];
		$data_komponen=[];
		$str_sp='';
		$str_ikp='';
		$str_ikk='';
		$str_keg='';
		$str_kro='';
		$str_ro='';
		$str_komponen='';
		$kd_kro=$request->kd_kro;
		
		$str_ikk=" select b.kode,b.nama 
					from tb_indikator_kegiatan a 
					inner join tbm_indikator_kegiatan b on a.id_ikk=b.id
					where a.id_dir=".$kd_dir." and a.kd_kegiatan='".substr($kode,0,4)."' order by a.id_sp,a.id_ikk";
					
		$str_keg=" select kode,deskripsi nama from tb_sakti_kegiatan where kode='".substr($kode,0,4)."'";
		
		$str_kro=" select substring(kode,6,3) kode,deskripsi nama from tb_sakti_output where kode='".substr($kd_kro,0,8)."'";
		
		$str_ro=" select substring(kode,10,3) kode,deskripsi nama from tb_sakti_suboutput where kode='".$kd_kro."'";
		
		$str_sp=" select b.kode,b.nama 
					from tb_sasaran_program a 
					inner join tbm_sasaran_program b on a.id_sp=b.id
					where a.id_dir=".$kd_dir;
			
		$str_ikp=" select b.kode,b.nama 
				from tb_indikator_program a 
				inner join tbm_indikator_program b on a.id_ikp=b.id
				where a.id_dir=".$kd_dir." order by a.id_sp,a.id_ikp";
				
		$data_sp=DB::select($str_sp);
		$data_ikp=DB::select($str_ikp);
		if($str_ikk!=''){
			$data_ikk=DB::select($str_ikk);
		}
		if($str_keg!=''){
			$data_keg=DB::select($str_keg);
		}
		if($str_kro!=''){
			$data_kro=DB::select($str_kro);
		}
		if($str_ro!=''){
			$data_ro=DB::select($str_ro);
		}
		if($kode!=''){
			$arrkode=explode(".", $kode);
			if($pg=='ro'){
				$kode_kegiatan=$arrkode[0];
				$kode_output=$arrkode[1];
				$kode_suboutput=$arrkode[2];
			}
			elseif($pg=='komponen'){
				$kode_kegiatan=$arrkode[0];
				$kode_output=$arrkode[1];
				$kode_suboutput=$arrkode[2];
				$kode_komponen=$arrkode[3];
				
				$str_komponen=" select substring(kode,14,3) kode,deskripsi nama from tb_sakti_komponen where kode='".$kd_kro.".".$kode_komponen."'";
			}
			elseif($pg=='subkomponen'){
				$kode_kegiatan=$arrkode[0];
				$kode_output=$arrkode[1];
				$kode_komponen=$arrkode[2];
				$kode_subkomponen=$arrkode[3];
				$kode=$kode_subkomponen;
				
				if($kd_kro!=''){
					$arrKodeKRO=explode(".", $kd_kro);
					$kode_suboutput=$arrKodeKRO[2];
				}
				
				$str_komponen=" select substring(kode,14,3) kode,deskripsi nama from tb_sakti_komponen where kode='".$kd_kro.".".$kode_komponen."'";
			}
		}
		
		if($str_komponen!=''){
			$data_komponen=DB::select($str_komponen);
		}
		
		if($pg=='ro'){
			$data= $matrik->where([
	            'kode' => $kode,
	            'kode_kegiatan' => $kode_kegiatan,
	            'kode_output' => $kode_output,
	            'kode_suboutput' => $kode_suboutput,
	            'tahun'=> $tahun
	        ])->get();
		}
		else{
			$data= $matrik->where([
	            'kode' => $kode,
	            'kode_kegiatan' => $kode_kegiatan,
	            'kode_output' => $kode_output,
	            'kode_suboutput' => $kode_suboutput,
	            'kode_komponen' => $kode_komponen,
	            'tahun'=> $tahun
	        ])->get();
		}
		$direktorat = $dir->where('id_dir',$kd_dir)->first()->nama_dir;
		
        return view('contents.capaian.input-target', compact('current', 'modul','kode','tahun','pg','data','kd_dir','kd_subdir','kode_kegiatan','kode_output','kode_suboutput','kode_komponen','kode_subkomponen','direktorat','data_sp','data_ikp','data_ikk','data_keg','data_kro','data_ro','data_komponen','kd_kro','mdl'));
    }
    public function submitInputTarget(Request $request)
    {
		$dir=new Direktorat;
        $matrik=new MatriksTarget;
		
		$validation = [
            'kode' => 'required',
            'tahun' => 'required',
            'co_volume' => 'required',
            'co_satuan' => 'required',
        ];

        $message    = [
            'required'  => ':attribute tidak boleh kosong',
            'integer'   => ':attribute tidak valid',
            'date'      => ':attribute tidak valid',
            'max'       => ':attribute Ukuran Maksimal 2 MB'
        ];

        $names      = [
            'kode'=> 'Kode',
            'tahun'=> 'Tahun',
            'co_volume'=> 'Target',
            'co_satuan'=> 'Satuan',
        ];
        $validator = Validator::make($request->all(), $validation, $message, $names);

        if ($validator->fails())
        {
            return response()->json([
                'status'    => 'failed',
                'title'     => 'Validasi Error',
                'message'   => $validator->errors()->all()
            ]);
        }
		
		try
        {
			$direktorat = $dir->where('id_dir',$request->kode_dir)->first()->nama_dir;
			
			$count  = $matrik->where([
                'kode'          => $request->kode,
				'kode_kegiatan' => $request->kode_kegiatan,
                'kode_output'	=> $request->kode_output,
                'kode_suboutput'=> $request->kode_suboutput,
				'kode_komponen' => $request->kode_komponen,
                'kode_subdir'   => $request->kode_subdir,
                'tahun'         => $request->tahun,
            ])->count();
			
			if($count == 0)
            {
                $query=$matrik->create([
                    'kode'          => $request->kode,
                    'kode_subdir'   => $request->kode_subdir,
                    'kode_kegiatan' => $request->kode_kegiatan,
                    'kode_output'	=> $request->kode_output,
                    'kode_suboutput'   => $request->kode_suboutput,
                    'kode_komponen'    => $request->kode_komponen,
                    'tahun'         => $request->tahun,
	                'co_volume'     => $request->co_volume,
	                'co_satuan'     => $request->co_satuan,
                    'created_by'    => Auth::user()->id_akses,
                    'created_at'    => date("Y-m-d H:i:s")
                ]);
            }
            else
            {
                $matrik->where([
                    'id' => $request->id_matriks
                ])->update([
	                'co_volume'     => $request->co_volume,
	                'co_satuan'     => $request->co_satuan
                ]);
            }
            //$data       = $capaian->where('kode', $request->kode)->get();
			
            return response()->json([
                'status'    => 'success',
                'title'     => 'Data Berhasil Disimpan',
                'message'   => 'Data Capaian Output Berhasil Diupload'
            ]);
        } 
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }
    }
    public function inputSetting()
    {
        $MatriksSetting=new MatriksSetting;

        $modul      = 'Capaian';
        $current    = "Capaian Pusat";

        $data= $MatriksSetting::first();
        return view('contents.capaian.setting', compact('current', 'modul', 'data'));
    }
    public function submitInputSetting(Request $request)
    {
        $matrikSetting=new MatriksSetting;
		
		$validation = [
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required'
        ];

        $message    = [
            'required'  => ':attribute tidak boleh kosong',
            'integer'   => ':attribute tidak valid',
            'date'      => ':attribute tidak valid',
            'max'       => ':attribute Ukuran Maksimal 2 MB'
        ];

        $names = [
            'tgl_mulai'=> 'Tanggal Mulai',
            'tgl_akhir'=> 'Tanggal Akhir',
        ];
        $validator = Validator::make($request->all(), $validation, $message, $names);

        if ($validator->fails())
        {
            return response()->json([
                'status'    => 'failed',
                'title'     => 'Validasi Error',
                'message'   => $validator->errors()->all()
            ]);
        }
		
		try
        {
			$count  = $matrikSetting::count();
			if($count == 0)
            {
                $matrikSetting->create([
                    'tgl_mulai' => $request->tgl_mulai,
                    'tgl_akhir' => $request->tgl_akhir,
                    'created_by'    => Auth::user()->id_akses,
                    'created_at'    => date("Y-m-d H:i:s")
                ]);
            }
            else
            {
                $matrikSetting::query()->update([
	                'tgl_mulai'     => $request->tgl_mulai,
	                'tgl_akhir'     => $request->tgl_akhir
                ]);
            }
            //$data       = $capaian->where('kode', $request->kode)->get();
			
            return response()->json([
                'status'    => 'success',
                'title'     => 'Data Berhasil Disimpan',
                'message'   => 'Data Setting Capaian Output Berhasil Diupload'
            ]);
        } 
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }
    }
    public function importSakti(Request $request)
    {
        $modul      = 'Capaian';
        $current    = "Capaian Pusat";
		$mdl=$request->mdl;
		$mdl_nm='';
		$mdl_file='';
		if($mdl=="ag"){
			$mdl_nm='Sakti Anggaran';
			$mdl_file='tb_sakti_anggaran.xlsx';
		}
		elseif($mdl=="as"){
			$mdl_nm='Sakti Anggaran Eselon 1';
			$mdl_file='tb_sakti_anggaran_eselon1.xlsx';
		}
		elseif($mdl=="rg"){
			$mdl_nm='Sakti Realisasi';
			$mdl_file='tb_sakti_realisasi.xlsx';
		}
		elseif($mdl=="rs"){
			$mdl_nm='Sakti Realisasi Eselon 1';
			$mdl_file='tb_sakti_realisasi_eselon1.xlsx';
		}
        return view('contents.capaian.import', compact('current', 'modul','mdl','mdl_nm','mdl_file'));
    }
    public function submitImportSakti(Request $request)
    {
		$mdl=$request->mdl;
		$mdl_nm=$request->mdl_nm;
		$validation = [
            'fileimport' => 'required',
        ];
        $message    = [
            'required'  => ':attribute tidak boleh kosong'
        ];
        $names      = [
            'fileimport'=> 'File Import',
        ];
		
        $validator = Validator::make($request->all(), $validation, $message, $names);
		
        if ($validator->fails())
        {
            return response()->json([
                'status'    => 'failed',
                'title'     => 'Validasi Error',
                'message'   => $validator->errors()->all()
            ]);
        }
		
		try
        {
			if($request->hasFile('fileimport'))
            {
                $fileImport = $this->uploadFileImport($request, 'fileimport');
				$msg='';
				if($mdl=='ag'){
					DB::table('tb_sakti_anggaran')->delete();
					Excel::import(new SaktiAnggaranImport, './assets/files/imports/'.$fileImport);
				}
				elseif($mdl=='as'){
					DB::table('tb_sakti_anggaran_eselon1')->delete();
					Excel::import(new SaktiAnggaranEselon1Import, './assets/files/imports/'.$fileImport);
				}
				elseif($mdl=='rg'){
					DB::table('tb_sakti_realisasi')->delete();
					Excel::import(new SaktiRealisasiImport, './assets/files/imports/'.$fileImport);
				}
				elseif($mdl=='rs'){
					DB::table('tb_sakti_realisasi_eselon1')->delete();
					Excel::import(new SaktiRealisasiEselon1Import, './assets/files/imports/'.$fileImport);
				}
				return response()->json([
	                'status'    => 'success',
	                'title'     => 'Data Berhasil Diimport',
	                'message'   => $mdl_nm.' berhasil diimport'
	            ]);
			}
			else{
				return response()->json([
	                'status'    => 'failed',
	                'title'     => 'Validasi Error',
	                'message'   => 'File '.$mdl_nm.' harus diisi terlebih dahulu'
	            ]);
			}
		}
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }
	}
    public function viewOutputDaerah()
    {
        $provinsi   = new Provinsi;

        $modul      = 'Capaian';
        $current    = "Capaian Daerah";

        $data_provinsi  = $provinsi->where('id_prov', 'NOT LIKE', 'undefined')->get();

        return view('contents.capaian.output-daerah', compact('current', 'modul', 'data_provinsi'));
    }
	
    public function viewTargetCaputs()
    {
        $dir        = new Direktorat;

        $modul      = 'Master';
        $current    = "Target Capaian";

        $data_direktorat    = $dir->where('id_dir', '<>', 0)->get();

        return view('contents.capaian.target-output', compact('current', 'modul', 'data_direktorat'));
    }

    public function viewValidasiOutput(Request $request)
    {
        $dir        = new Direktorat;

        $modul      = 'Capaian';
        $current    = "Validasi Capaian";

        $data_direktorat    = $dir->where('id_dir', '<>', 0)->get();

        return view('contents.capaian.target-output', compact('current', 'modul', 'data_direktorat'));
    }

    public function dataKegiatan(Request $request)
    {
        $subkomponen    = new SubKomponen;
        $realisasi      = new SaktiRealisasi;

        $kode_subkomponen = $subkomponen->where('kode_direktorat', $request->id_dir)->get();

        $kd_skmpn = [];

        foreach ($kode_subkomponen as $value_sk)
        {
            $kd_skmpn[] = $value_sk->kode;
        }

        $data       = $realisasi
                        ->select('*', 'tb_sakti_kegiatan.kode as id', DB::raw('CONCAT(kode_kegiatan, \' - \', tb_sakti_kegiatan.deskripsi) AS text'))
                        ->leftJoin('tb_sakti_kegiatan', 'tb_sakti_realisasi.kode_kegiatan', '=', 'tb_sakti_kegiatan.kode')
                        ->whereIn('kode_subkomponen', $kd_skmpn)->groupBy('kode_kegiatan')->get();

        return $data;
    }

    public function dataOutput(Request $request)
    {
        $subkomponen    = new SubKomponen;
        $realisasi      = new SaktiRealisasi;

        $kode_subkomponen = $subkomponen->where('kode_direktorat', $request->id_dir)->get();

        $kd_skmpn = [];

        foreach ($kode_subkomponen as $value_sk)
        {
            $kd_skmpn[] = $value_sk->kode;
        }

        $data       = $realisasi
                        ->select('*', 'tb_sakti_output.kode as id', DB::raw('CONCAT(kode_output, \' - \', tb_sakti_output.deskripsi) AS text'))
                        ->leftJoin('tb_sakti_output', '\''.$request->kode_kegiatan.'\'.tb_sakti_realisasi.kode_output', '=', 'tb_sakti_output.kode')
                        ->where('tb_sakti_realisasi.kode_output', $request->kode_kegiatan)
                        ->whereIn('kode_subkomponen', $kd_skmpn)->groupBy('kode_output')->get();

        return $data;
    }


    public function dataTreegridDaerah(Request $request)
    {
        // $output         = new SaktiOutput;
        // $anggaran       = new SaktiAnggaran;
        // $kegiatan       = new SaktiKegiatan;
        // $triwulan       = $request->triwulan;
        // $kdsatker       = $request->kdsatker;
        
        // if($triwulan == "1")
        // {
        //     $bulan  = [1, 2, 3];
        // }
        // else if($triwulan == "2")
        // {
        //     $bulan  = [4, 5, 6];
        // }
        // else if($triwulan == "3")
        // {
        //     $bulan  = [7, 8, 9];
        // }
        // else if($triwulan == "4")
        // {
        //     $bulan  = [10, 11, 12];
        // }

        // $data   = $anggaran->where([
        //     'kdsatker'  => $kdsatker
        // ])->groupBy('kode_kegiatan')->get();
        
        // foreach ($data as $value)
        // {
        //     $data[$i]->type             = "kegiatan";
        //     $data[$i]->kode_treegrid    = $value->kode_kegiatan;
        //     $data[$i]->uraian_treegrid  = '<br><span style="padding: 5px; border-radius: 4px" class="font-weight-bolder mb-1 bg-warning">Kegiatan</span><br><br>'.$kegiatan->where('kode', $value->kode_kegiatan)->first()->deskripsi;
            
        //     $j                          = 0;
        //     $data_output                = $output->where('status', 1)->where('kode', 'like', '%'.$value->kode_kegiatan.'%')->get();
        //     $anak                       = [];

        //     $data[$i]->children         = $anak;
        //     $i++;
        // }

        // return $request;

        $dir            = new Direktorat;
        $output         = new SaktiOutput;
        $subkomponen    = new SubKomponen;
        $komponen       = new SaktiKomponen;
        $anggaran       = new SaktiAnggaran;
        $kegiatan       = new SaktiKegiatan;
        $suboutput      = new SaktiSubOutput;
        $realisasi      = new SaktiRealisasi;
        $matrik         = new MatriksPengendalian;

        $i                = 0;
        $triwulan         = $request->triwulan;
        if($triwulan == "1")
        {
            $bulan  = [1, 2, 3];
        }
        else if($triwulan == "2")
        {
            $bulan  = [4, 5, 6];
        }
        else if($triwulan == "3")
        {
            $bulan  = [7, 8, 9];
        }
        else if($triwulan == "4")
        {
            $bulan  = [10, 11, 12];
        }

        // $data       = $realisasi->where('kdsatker', $request->kdsatker)->groupBy('kode_kegiatan')->get();
        $data       = $realisasi->where([
            'kdsatker'      => $request->kdsatker,
            'kode_kegiatan' => '1237',
            'kode_output'   => 'PBL'
        ])->groupBy('kode_kegiatan')->get();

        foreach ($data as $value)
        {
            $data[$i]->type             = "kegiatan";
            $data[$i]->kode_treegrid    = $value->kode_kegiatan;
            $data[$i]->uraian_treegrid  = '<br><span style="padding: 5px; border-radius: 4px" class="font-weight-bolder mb-1 bg-warning">Kegiatan</span><br><br>'.$kegiatan->where('kode', $value->kode_kegiatan)->first()->deskripsi;
            
            $j                          = 0;
            // $data_output                = $output->where('status', 1)->where('kode', 'like', '%'.$value->kode_kegiatan.'%')->get();
            $data_output                = $output->where('status', 1)->where('kode', 'like', '%1237.PBL%')->get();
            $anak                   = [];

            foreach($data_output as $value_output)
            {
                $anak[$j]['type']               = "output";
                $anak[$j]['kode_treegrid']    = $value_output->kode;
                $anak[$j]['uraian_treegrid']  = '<br><span style="padding: 5px; border-radius: 4px" class="font-weight-bolder mb-1 bg-primary">KRO</span><br><br>'.$value_output->deskripsi;

                $k                                = 0;
                $data_suboutput                   = $suboutput->where('status', 1)->where('kode', 'like', '%'.$value_output->kode.'%')->get();
                $cucu                             = [];

                foreach ($data_suboutput as $value_suboutput)
                {
                    $cucu[$k]['type']               = "suboutput";
                    $cucu[$k]['kode_treegrid']    = $value_suboutput->kode;
                    $cucu[$k]['uraian_treegrid']  = '<br><span style="padding: 5px; border-radius: 4px" class="font-weight-bolder mb-1 bg-success">RO</span><br><br>'.$value_suboutput->deskripsi;

                    $l              = 0;
                    $data_komponen  = $komponen->where('status', 1)->where('kode', 'like', '%'.$value_suboutput->kode.'%')->get();
                    $cicit          = [];

                    foreach ($data_komponen as $value_komponen)
                    {
                        $kode               = explode(".", $value_komponen->kode);
                        $kode_kegiatan      = $kode[0];
                        $kode_output        = $kode[1];
                        $kode_suboutput     = $kode[2];
                        $kode_komponen      = $kode[3];

                        $pagu   = $anggaran
                                        ->where([
                                            'kode_kegiatan'     => $kode_kegiatan,
                                            'kode_output'       => $kode_output,
                                            'kode_komponen'     => $kode_komponen,
                                            'urutan_header1'    => 0,
                                            'urutan_header2'    => 0,
                                            'kdsatker'          => $request->kdsatker
                                        ])
                                        ->sum('total');

                        $total_realisasi  = $realisasi
                                            ->whereNotNull('no_sp2d')
                                            ->where([
                                                'kode_kegiatan'     => $kode_kegiatan,
                                                'kode_output'       => $kode_output,
                                                'kode_komponen'     => $kode_komponen,
                                                'kdsatker'          => $request->kdsatker
                                            ])      
                                            ->sum('nilai_rupiah');

                        $target     = 0;
                        $bulan1     = '<a href="javascript:void(0)" onclick="openModalUpload(1, \''.$value_komponen->kode.'\', \'komponen\')"><i class="fas fa-edit text-danger"></i></a>';
                        $bulan2     = '<a href="javascript:void(0)" onclick="openModalUpload(2, \''.$value_komponen->kode.'\', \'komponen\')"><i class="fas fa-edit text-danger"></i></a>';
                        $bulan3     = '<a href="javascript:void(0)" onclick="openModalUpload(3, \''.$value_komponen->kode.'\', \'komponen\')"><i class="fas fa-edit text-danger"></i></a>';
                        
                        $cek_matrik =   $matrik->whereIn('bulan', $bulan)->where([
                                            'kode_subdir'   => $request->id_subdir,
                                            'tahun'         => date("Y"),
                                            'kode'          => $value_komponen->kode
                                        ])->count();

                        if($cek_matrik > 0)
                        {
                            $target           = $matrik->whereIn('bulan', $bulan)->where([
                                'kode_subdir'   => $request->id_subdir,
                                'tahun'         => date("Y"),
                                'kode'          => $value_komponen->kode
                            ])->sum('to_volume');

                            $cek_bulan1 = $matrik->where([
                                'kode_subdir'   => $request->id_subdir,
                                'tahun'         => date("Y"),
                                'kode'          => $value_komponen->kode,
                                'bulan'         => $bulan[0]
                            ])->first();

                            $cek_bulan2 = $matrik->where([
                                'kode_subdir'   => $request->id_subdir,
                                'tahun'         => date("Y"),
                                'kode'          => $value_komponen->kode,
                                'bulan'         => $bulan[1]
                            ])->first();

                            $cek_bulan3 = $matrik->where([
                                'kode_subdir'   => $request->id_subdir,
                                'tahun'         => date("Y"),
                                'kode'          => $value_komponen->kode,
                                'bulan'         => $bulan[2]
                            ])->first();

                            if($cek_bulan1)
                            {
                                $nama_file  = $cek_bulan1->evidence;
                                $link       = route("download.all-files", ['path' => "app/assets/files/$nama_dir/$nama_file"]);
                                $bulan1     = '<a href="'.$link.'"><i class="fas fa-edit text-success"></i></a>';

                                $bulan1     = '<a href="javascript:void(0)" onclick="openModalUpload(1, \''.$value_komponen->kode.'\', \'komponen\')"><i class="fas fa-edit text-success"></i></a>';
                            }

                            if($cek_bulan2)
                            {
                                $nama_file  = $cek_bulan2->evidence;
                                $link       = route("download.all-files", ['path' => "app/assets/files/$nama_dir/$nama_file"]);
                                $bulan2     = '<a href="'.$link.'"><i class="fas fa-edit text-success"></i></a>';

                                $bulan2     = '<a href="javascript:void(0)" onclick="openModalUpload(2, \''.$value_komponen->kode.'\', \'komponen\')"><i class="fas fa-edit text-success"></i></a>';
                            }

                            if($cek_bulan3)
                            {
                                $nama_file  = $cek_bulan3->evidence;
                                $link       = route("download.all-files", ['path' => "app/assets/files/$nama_dir/$nama_file"]);
                                $bulan3     = '<a href="'.$link.'"><i class="fas fa-edit text-success"></i></a>';

                                $bulan3     = '<a href="javascript:void(0)" onclick="openModalUpload(3, \''.$value_komponen->kode.'\', \'komponen\')"><i class="fas fa-edit text-success"></i></a>';
                            }
                        }
                        
                        $cicit[$l]['bulan1']            = $bulan1;
                        $cicit[$l]['bulan2']            = $bulan2;
                        $cicit[$l]['bulan3']            = $bulan3;
                        $cicit[$l]['target']            = number_format($target);
                        $cicit[$l]['type']              = "komponen";
                        $cicit[$l]['pagu']              = number_format($pagu);
                        $cicit[$l]['realisasi']         = number_format($total_realisasi);
                        $cicit[$l]['kode_treegrid']     = $value_komponen->kode;
                        $cicit[$l]['uraian_treegrid']   = '<br><span style="padding: 5px; border-radius: 4px" class="font-weight-bolder mb-1 bg-danger">Komponen</span><br><br>'.$value_komponen->deskripsi;

                        $kode               = explode(".", $value_komponen->kode);
                        $kode_kegiatan      = $kode[0];
                        $kode_output        = $kode[1];
                        $kode_suboutput     = $kode[2];
                        $kode_komponen      = $kode[3];

                        $m                  = 0;
                        $data_subkomponen   = $anggaran
                                                ->where([
                                                    'kode_kegiatan' => $kode_kegiatan,
                                                    'kode_output'   => $kode_output,
                                                    'kode_komponen' => $kode_komponen,
                                                    'kdsatker'      => $request->kdsatker
                                                ])
                                                ->groupBy('kode_subkomponen')
                                                ->get();

                        $canggah    = [];

                        foreach ($data_subkomponen as $value_subkomponen)
                        {
                            $pagu   = $anggaran
                                        ->where([
                                            'kode_kegiatan'     => $kode_kegiatan,
                                            'kode_output'       => $kode_output,
                                            'kode_komponen'     => $kode_komponen,
                                            'kode_subkomponen'  => $value_subkomponen->kode_subkomponen,
                                            'kdsatker'          => $request->kdsatker,
                                            'urutan_header1'    => 0,
                                            'urutan_header2'    => 0
                                        ])
                                        ->sum('total');

                            $total_realisasi  = $realisasi
                                                ->whereNotNull('no_sp2d')
                                                ->where([
                                                    'kdsatker'          => $request->kdsatker,
                                                    'kode_kegiatan'     => $kode_kegiatan,
                                                    'kode_output'       => $kode_output,
                                                    'kode_komponen'     => $kode_komponen,
                                                    'kode_subkomponen'  => $value_subkomponen->kode_subkomponen
                                                ])      
                                                ->sum('nilai_rupiah');

                            $target     = 0;
                            $bulan1     = '<a href="javascript:void(0)" onclick="openModalUpload(1, \''.$value_komponen->kode.'\', \'komponen\')"><i class="fas fa-edit text-danger"></i></a>';
                            $bulan2     = '<a href="javascript:void(0)" onclick="openModalUpload(2, \''.$value_komponen->kode.'\', \'komponen\')"><i class="fas fa-edit text-danger"></i></a>';
                            $bulan3     = '<a href="javascript:void(0)" onclick="openModalUpload(3, \''.$value_komponen->kode.'\', \'komponen\')"><i class="fas fa-edit text-danger"></i></a>';
                            
                            $cek_matrik =   $matrik->whereIn('bulan', $bulan)->where([
                                                'kode_subdir'   => $request->id_subdir,
                                                'tahun'         => date("Y"),
                                                'kode'          => $value_komponen->kode
                                            ])->count();

                            if($cek_matrik > 0)
                            {
                                $target           = $matrik->whereIn('bulan', $bulan)->where([
                                    'kode_subdir'   => $request->id_subdir,
                                    'tahun'         => date("Y"),
                                    'kode'          => $value_subkomponen->kode_subkomponen
                                ])->sum('to_volume');

                                $cek_bulan1 = $matrik->where([
                                    'kode_subdir'   => $request->id_subdir,
                                    'tahun'         => date("Y"),
                                    'kode'          => $value_subkomponen->kode_subkomponen,
                                    'bulan'         => $bulan[0]
                                ])->first();

                                $cek_bulan2 = $matrik->where([
                                    'kode_subdir'   => $request->id_subdir,
                                    'tahun'         => date("Y"),
                                    'kode'          => $value_subkomponen->kode_subkomponen,
                                    'bulan'         => $bulan[1]
                                ])->first();

                                $cek_bulan3 = $matrik->where([
                                    'kode_subdir'   => $request->id_subdir,
                                    'tahun'         => date("Y"),
                                    'kode'          => $value_subkomponen->kode_subkomponen,
                                    'bulan'         => $bulan[2]
                                ])->first();

                                if($cek_bulan1)
                                {
                                    $nama_file  = $cek_bulan1->evidence;
                                    $link       = route("download.all-files", ['path' => "app/assets/files/$nama_dir/$nama_file"]);
                                    $bulan1     = '<a href="'.$link.'"><i class="fas fa-edit text-success"></i></a>';
                                }

                                if($cek_bulan2)
                                {
                                    $nama_file  = $cek_bulan2->evidence;
                                    $link       = route("download.all-files", ['path' => "app/assets/files/$nama_dir/$nama_file"]);
                                    $bulan2     = '<a href="'.$link.'"><i class="fas fa-edit text-success"></i></a>';
                                }

                                if($cek_bulan3)
                                {
                                    $nama_file  = $cek_bulan3->evidence;
                                    $link       = route("download.all-files", ['path' => "app/assets/files/$nama_dir/$nama_file"]);
                                    $bulan3     = '<a href="'.$link.'"><i class="fas fa-edit text-success"></i></a>';
                                }
                            }
                            
                            $canggah[$m]['bulan1']            = $bulan1;
                            $canggah[$m]['bulan2']            = $bulan2;
                            $canggah[$m]['bulan3']            = $bulan3;
                            $canggah[$m]['target']            = number_format($target);
                            $canggah[$m]['type']            = "subkomponen";
                            $canggah[$m]['pagu']            = number_format($pagu);
                            $canggah[$m]['realisasi']       = number_format($total_realisasi);
                            $canggah[$m]['kode_treegrid']   = $value_subkomponen->kode_subkomponen;
                            $canggah[$m]['uraian_treegrid'] = '<br><span style="padding: 5px; border-radius: 4px" class="font-weight-bolder mb-1 bg-purple">Subkomponen</span><br><br>'.$value_subkomponen->uraian_subkomponen;

                            $m++;
                        }

                        $cicit[$l]['children']  = $canggah;
                        
                        $l++;
                    }
                    $cucu[$k]['children']   = $cicit;
                    $k++;
                }
                $anak[$j]['children']       = $cucu;
                $j++;
            }
            $data[$i]->children         = $anak;
            $i++;
        }
        return $data;
    }

    public function dataTreegrid(Request $request)
    {
        $dir            = new Direktorat;
        $output         = new SaktiOutput;
        $subkomponen    = new SubKomponen;
        $komponen       = new SaktiKomponen;
        $anggaran       = new SaktiAnggaran;
        $kegiatan       = new SaktiKegiatan;
        $suboutput      = new SaktiSubOutput;
        $realisasi      = new SaktiRealisasi;
        $matrik         = new MatriksPengendalian;

        $i                = 0;
        $id_dir           = $request->id_dir;
        $id_subdir        = $request->id_subdir;
        $nama_dir         = $dir->where('id_dir', $id_dir)->first()->nama_dir;
        $triwulan         = $request->triwulan;
        $kode_subkomponen = $subkomponen->where('kode_direktorat', $id_dir)->where('kode_subdirektorat', $id_subdir)->get();

        if($triwulan == "1")
        {
            $bulan  = [1, 2, 3];
        }
        else if($triwulan == "2")
        {
            $bulan  = [4, 5, 6];
        }
        else if($triwulan == "3")
        {
            $bulan  = [7, 8, 9];
        }
        else if($triwulan == "4")
        {
            $bulan  = [10, 11, 12];
        }

        $kd_skmpn = [];

        foreach ($kode_subkomponen as $value_sk)
        {
            $kd_skmpn[] = $value_sk->kode;
        }

        $data       = $realisasi->whereIn('kode_subkomponen', $kd_skmpn)->groupBy('kode_kegiatan')->get();

        foreach ($data as $value)
        {
            $data[$i]->type             = "kegiatan";
            $data[$i]->kode_treegrid    = $value->kode_kegiatan;
            $data[$i]->kode_input       = $value->kode_kegiatan;
            $data[$i]->uraian_treegrid  = '<br><span style="padding: 5px; border-radius: 4px" class="font-weight-bolder mb-1 bg-warning">Kegiatan</span><br><br>'.$kegiatan->where('kode', $value->kode_kegiatan)->first()->deskripsi;
            
            $j                          = 0;
            $data_output                = $output->where('status', 1)->where('kode', 'like', '%'.$value->kode_kegiatan.'%')->get();
            $anak                   = [];

            foreach($data_output as $value_output)
            {
                $anak[$j]['type']             = "output";
                $anak[$j]['kode_treegrid']    = $value_output->kode;
                $anak[$j]['kode_input']       = $value_output->kode;
                $anak[$j]['uraian_treegrid']  = '<br><span style="padding: 5px; border-radius: 4px" class="font-weight-bolder mb-1 bg-primary">KRO</span><br><br>'.$value_output->deskripsi;

                $k              = 0;
                $data_suboutput = $suboutput->where('status', 1)->where('kode', 'like', '%'.$value_output->kode.'%')->get();
                $cucu           = [];

                foreach ($data_suboutput as $value_suboutput)
                {
                    $cucu[$k]['type']             = "suboutput";
                    $cucu[$k]['kode_treegrid']    = $value_suboutput->kode;
                    $cucu[$k]['kode_input']       = $value_suboutput->kode;
                    $cucu[$k]['uraian_treegrid']  = '<br><span style="padding: 5px; border-radius: 4px" class="font-weight-bolder mb-1 bg-success">RO</span><br><br>'.$value_suboutput->deskripsi;

                    $l              = 0;
                    $data_komponen  = $komponen->where('status', 1)->where('kode', 'like', '%'.$value_suboutput->kode.'%')->get();
                    $cicit          = [];

                    foreach ($data_komponen as $value_komponen)
                    {
                        $kode               = explode(".", $value_komponen->kode);
                        $kode_kegiatan      = $kode[0];
                        $kode_output        = $kode[1];
                        $kode_suboutput     = $kode[2];
                        $kode_komponen      = $kode[3];

                        $pagu   = $anggaran
                                        ->where([
                                            'kode_kegiatan'     => $kode_kegiatan,
                                            'kode_output'       => $kode_output,
                                            'kode_komponen'     => $kode_komponen,
                                            'urutan_header1'    => 0,
                                            'urutan_header2'    => 0
                                        ])
                                        ->sum('total');

                        $total_realisasi  = $realisasi
                                            ->whereNotNull('no_sp2d')
                                            ->where([
                                                'kode_kegiatan'     => $kode_kegiatan,
                                                'kode_output'       => $kode_output,
                                                'kode_komponen'     => $kode_komponen
                                            ])      
                                            ->sum('nilai_rupiah');

                        //$target     = '<a href="javascript:void(0)" onclick="openModalTargetPusat(1, \''.$value_komponen->kode.'\')"><i class="fas fa-edit text-danger"></i></a>';
                        $bulan1     = '<a href="javascript:void(0)" onclick="openModalUpload(1, \''.$value_komponen->kode.'\', \'komponen\')"><i class="fas fa-edit text-danger"></i></a>';
                        $bulan2     = '<a href="javascript:void(0)" onclick="openModalUpload(2, \''.$value_komponen->kode.'\', \'komponen\')"><i class="fas fa-edit text-danger"></i></a>';
                        $bulan3     = '<a href="javascript:void(0)" onclick="openModalUpload(3, \''.$value_komponen->kode.'\', \'komponen\')"><i class="fas fa-edit text-danger"></i></a>';
                        
                        $cek_matrik =   $matrik->whereIn('bulan', $bulan)->where([
                                            'kode_subdir'   => $id_subdir,
                                            'tahun'         => date("Y"),
                                            'kode'          => $value_komponen->kode
                                        ])->count();

                        $target = 0;
                        
                        if($cek_matrik > 0)
                        {
                            $target           = $matrik->whereIn('bulan', $bulan)->where([
                                'kode_subdir'   => $id_subdir,
                                'tahun'         => date("Y"),
                                'kode'          => $value_komponen->kode
                            ])->sum('to_volume');

                            $cek_bulan1 = $matrik->where([
                                'kode_subdir'   => $id_subdir,
                                'tahun'         => date("Y"),
                                'kode'          => $value_komponen->kode,
                                'bulan'         => $bulan[0]
                            ])->first();

                            $cek_bulan2 = $matrik->where([
                                'kode_subdir'   => $id_subdir,
                                'tahun'         => date("Y"),
                                'kode'          => $value_komponen->kode,
                                'bulan'         => $bulan[1]
                            ])->first();

                            $cek_bulan3 = $matrik->where([
                                'kode_subdir'   => $id_subdir,
                                'tahun'         => date("Y"),
                                'kode'          => $value_komponen->kode,
                                'bulan'         => $bulan[2]
                            ])->first();

                            if($cek_bulan1)
                            {
                                $nama_file  = $cek_bulan1->evidence;
                                $link       = route("download.all-files", ['path' => "app/assets/files/$nama_dir/$nama_file"]);
                                $bulan1     = '<a href="'.$link.'"><i class="fas fa-edit text-success"></i></a>';

                                $bulan1     = '<a href="javascript:void(0)" onclick="openModalUpload(1, \''.$value_komponen->kode.'\', \'komponen\')"><i class="fas fa-edit text-success"></i></a>';
                            }

                            if($cek_bulan2)
                            {
                                $nama_file  = $cek_bulan2->evidence;
                                $link       = route("download.all-files", ['path' => "app/assets/files/$nama_dir/$nama_file"]);
                                $bulan2     = '<a href="'.$link.'"><i class="fas fa-edit text-success"></i></a>';

                                $bulan2     = '<a href="javascript:void(0)" onclick="openModalUpload(2, \''.$value_komponen->kode.'\', \'komponen\')"><i class="fas fa-edit text-success"></i></a>';
                            }

                            if($cek_bulan3)
                            {
                                $nama_file  = $cek_bulan3->evidence;
                                $link       = route("download.all-files", ['path' => "app/assets/files/$nama_dir/$nama_file"]);
                                $bulan3     = '<a href="'.$link.'"><i class="fas fa-edit text-success"></i></a>';

                                $bulan3     = '<a href="javascript:void(0)" onclick="openModalUpload(3, \''.$value_komponen->kode.'\', \'komponen\')"><i class="fas fa-edit text-success"></i></a>';
                            }
                        }
                        
                        $cicit[$l]['target']            = $target;

                        if(is_numeric($target))
                        {
                            $cicit[$l]['target']        = number_format($target);
                        }

                        $cicit[$l]['bulan1']          = $bulan1;
                        $cicit[$l]['bulan2']          = $bulan2;
                        $cicit[$l]['bulan3']          = $bulan3;
                        $cicit[$l]['type']            = "komponen";
                        $cicit[$l]['pagu']            = number_format($pagu);
                        $cicit[$l]['realisasi']       = number_format($total_realisasi);
                        $cicit[$l]['kode_treegrid']   = $value_komponen->kode;
                        $cicit[$l]['kode_input']      = $value_komponen->kode;
                        $cicit[$l]['uraian_treegrid'] = '<br><span style="padding: 5px; border-radius: 4px" class="font-weight-bolder mb-1 bg-danger">Komponen</span><br><br>'.$value_komponen->deskripsi;

                        $kode               = explode(".", $value_komponen->kode);
                        $kode_kegiatan      = $kode[0];
                        $kode_output        = $kode[1];
                        $kode_suboutput     = $kode[2];
                        $kode_komponen      = $kode[3];

                        $m                  = 0;
                        $data_subkomponen   = $anggaran
                                                ->where([
                                                    'kode_kegiatan' => $kode_kegiatan,
                                                    'kode_output'   => $kode_output,
                                                    'kode_komponen' => $kode_komponen
                                                ])
                                                ->whereIn('kode_subkomponen', $kd_skmpn)
                                                ->groupBy('kode_subkomponen')
                                                ->get();

                        $canggah = [];

                        foreach ($data_subkomponen as $value_subkomponen)
                        {
                            $pagu   = $anggaran
                                        ->where([
                                            'kode_kegiatan'     => $kode_kegiatan,
                                            'kode_output'       => $kode_output,
                                            'kode_komponen'     => $kode_komponen,
                                            'kode_subkomponen'  => $value_subkomponen->kode_subkomponen,
                                            'urutan_header1'    => 0,
                                            'urutan_header2'    => 0
                                        ])
                                        ->sum('total');

                            $total_realisasi  = $realisasi
                                                ->whereNotNull('no_sp2d')
                                                ->where([
                                                    'kode_kegiatan'     => $kode_kegiatan,
                                                    'kode_output'       => $kode_output,
                                                    'kode_komponen'     => $kode_komponen,
                                                    'kode_subkomponen'  => $value_subkomponen->kode_subkomponen
                                                ])      
                                                ->sum('nilai_rupiah');

                            $canggah[$m]['type']            = "subkomponen";
                            $canggah[$m]['pagu']            = number_format($pagu);
                            $canggah[$m]['realisasi']       = number_format($total_realisasi);
                            $canggah[$m]['kode_treegrid']   = $value_subkomponen->kode_subkomponen;
                            $canggah[$m]['kode_input']      = implode('.', [$cicit[$l]['kode_input'] , $value_subkomponen->kode_subkomponen]);
                            $canggah[$m]['uraian_treegrid'] = '<br><span style="padding: 5px; border-radius: 4px" class="font-weight-bolder mb-1 bg-purple">Subkomponen</span><br><br>'.$value_subkomponen->uraian_subkomponen;

                            $full_kode_subkomponen = $canggah[$m]['kode_input'];

                            //$target     = '<a href="javascript:void(0)" onclick="openModalTargetPusat(1, \''.$value_komponen->kode.'\')"><i class="fas fa-edit text-danger"></i></a>';
                            $cek_matrik = $matrik->whereIn('bulan', $bulan)->where([
                                                'kode_subdir'   => $id_subdir,
                                                'tahun'         => date("Y"),
                                                'kode'          => $value_komponen->kode
                                            ])->count();

                            $edit_class1 = $edit_class2 = $edit_class3 = "text-danger";
                            $target = 0;
                            if($cek_matrik > 0)
                            {
                                $target = $matrik->whereIn('bulan', $bulan)->where([
                                    'kode_subdir'   => $id_subdir,
                                    'tahun'         => date("Y"),
                                    'kode'          => $full_kode_subkomponen
                                ])->sum('to_volume');

                                $cek_bulan1 = $matrik->where([
                                    'kode_subdir'   => $id_subdir,
                                    'tahun'         => date("Y"),
                                    'kode'          => $full_kode_subkomponen,
                                    'bulan'         => $bulan[0]
                                ])->first();

                                $cek_bulan2 = $matrik->where([
                                    'kode_subdir'   => $id_subdir,
                                    'tahun'         => date("Y"),
                                    'kode'          => $full_kode_subkomponen,
                                    'bulan'         => $bulan[1]
                                ])->first();

                                $cek_bulan3 = $matrik->where([
                                    'kode_subdir'   => $id_subdir,
                                    'tahun'         => date("Y"),
                                    'kode'          => $full_kode_subkomponen,
                                    'bulan'         => $bulan[2]
                                ])->first();

                                if($cek_bulan1)
                                {
                                    $edit_class1 = "text-success";
                                    /*
                                    $nama_file  = $cek_bulan1->evidence;
                                    $link       = route("download.all-files", ['path' => "app/assets/files/$nama_dir/$nama_file"]);
                                    $bulan1     = '<a href="'.$link.'"><i class="fas fa-edit text-success"></i></a>';
                                    */
                                }

                                if($cek_bulan2)
                                {
                                    $edit_class2 = "text-success";
                                    /*
                                    $nama_file  = $cek_bulan2->evidence;
                                    $link       = route("download.all-files", ['path' => "app/assets/files/$nama_dir/$nama_file"]);
                                    $bulan2     = '<a href="'.$link.'"><i class="fas fa-edit text-success"></i></a>';
                                    */
                                }

                                if($cek_bulan3)
                                {
                                    $edit_class3 = "text-success";
                                    /*
                                    $nama_file  = $cek_bulan3->evidence;
                                    $link       = route("download.all-files", ['path' => "app/assets/files/$nama_dir/$nama_file"]);
                                    $bulan3     = '<a href="'.$link.'"><i class="fas fa-edit text-success"></i></a>';
                                    */
                                }
                            }

                            $bulan1 = '<a href="javascript:void(0)" onclick="openModalUpload(1, \''.$full_kode_subkomponen.'\', \''.$canggah[$m]['type'].'\')"><i class="fas fa-edit '.$edit_class1.'"></i></a>';
                            $bulan2 = '<a href="javascript:void(0)" onclick="openModalUpload(2, \''.$full_kode_subkomponen.'\', \''.$canggah[$m]['type'].'\')"><i class="fas fa-edit '.$edit_class2.'"></i></a>';
                            $bulan3 = '<a href="javascript:void(0)" onclick="openModalUpload(3, \''.$full_kode_subkomponen.'\', \''.$canggah[$m]['type'].'\')"><i class="fas fa-edit '.$edit_class3.'"></i></a>';
                            
                            $canggah[$m]['target']          = $target;
                            
                            if(is_numeric($target))
                            {
                                $canggah[$m]['target']      = number_format($target);
                            }

                            $canggah[$m]['bulan1']          = $bulan1;
                            $canggah[$m]['bulan2']          = $bulan2;
                            $canggah[$m]['bulan3']          = $bulan3;
                            $m++;
                        }

                        $cicit[$l]['children']  = $canggah;
                        
                        $l++;
                    }

                    $cucu[$k]['children']   = $cicit;
                    $k++;
                }

                $anak[$j]['children']       = $cucu;
                $j++;
            }

            $data[$i]->children         = $anak;
            $i++;
        }

        return $data;
    }

    public function countRo(Request $request)
    {
        $anggaran   = new SaktiAnggaran;
        $matrik     = new MatriksPengendalian;

        $ro         = $anggaran
                        ->leftJoin('tbm_subkomponen', 'tb_sakti_anggaran.kode_subkomponen', '=', 'tbm_subkomponen.kode')
                        ->where('tbm_subkomponen.kode_direktorat', $request->id_dir)
                        ->groupBy('tbm_subkomponen.kode')->get();
        
        $input      = $matrik->where('kode_subdir', $request->id_subdir)->count();

        return response()->json([
            'ro'    => count($ro),
            'input' => $input
        ]);
    }

    public function detailInput(Request $request)
    {
        $matrik     = new MatriksPengendalian;
        $capaian    = new EvidenceCapaian;
        
        $data       = "none";
        $count      = $matrik->where([
            'kode'  => $request->kode,
            'bulan' => $request->bulan,
            'tahun' => date("Y")
        ])->count();
            
        $detail = $capaian->where('kode', $request->kode)->get();
        
        if($count > 0)
        {
            $data   = $matrik->where([
                'kode'  => $request->kode,
                'bulan' => $request->bulan,
                'tahun' => date("Y")
            ])->first();

            $data->data = $detail; // data upload evidence
        }

        return $data;
    }

    public function hideData(Request $request)
    {
        $output     = new SaktiOutput;
        $kegiatan   = new SaktiKegiatan;
        $komponen   = new SaktiKomponen;
        $suboutput  = new SaktiSubOutput;

        if($request->type == "kegiatan")
        {
            $kegiatan->where('kode', $request->kode)->update(['status' => 0]);
        }
        else if($request->type == "output")
        {
            $output->where('kode', $request->kode)->update(['status' => 0]);
        }
        if($request->type == "suboutput")
        {
            $suboutput->where('kode', $request->kode)->update(['status' => 0]);
        }
        if($request->type == "komponen")
        {
            $komponen->where('kode', $request->kode)->update(['status' => 0]);
        }

        return response()->json([
            'status'    => 'success',
            'title'     => 'Data Berhasil Dihapus',
            'message'   => 'Data yang Sudah Dihapus Tidak Bisa Dipulihan'
        ]);
    }

    public function submitTarget(Request $request)
    {
        $matrik = new MatriksPengendalian;
        $selected = [
                'kode'          => $request->kode,
                'kode_subdir'   => $request->kode_subdir,
                'bulan'         => $request->bulan,
                'tahun'         => $request->tahun
        ];

        try
        {
            $count  = $matrik->where($selected)->count();
    
            if($count == 0)
            {
                $matrik->create([
                    'created_by'            => Auth::user()->id_akses,
                    'kode'                  => $request->kode,
                    'kode_subdir'           => $request->kode_subdir,
                    'bulan'                 => $request->bulan,
                    'tahun'                 => $request->tahun,
                    'to_volume'             => $request->target,
                    'co_volume'             => $request->realisasi,
                    'co_satuan'             => $request->satuan_realisasi_target,
                    'keterangan'            => $request->keterangan,
                    'kendala'               => $request->kendala,
                    'tinjut'                => $request->tinjut,
                    'persen_kinerja'        => $request->persen_kinerja,
                    // 'deadline'              => date("Y-m-d", strtotime($request->deadline))
                ]);
            }    
            else
            {
                $matrik->where($selected)->update([
                    // 'to_volume'             => $request->target,
                    'co_volume'             => $request->realisasi,
                    'co_satuan'             => $request->satuan_realisasi_target,
                    'pemanfaatan'           => $request->pemanfaatan,
                    'status_pemanfaatan'    => $request->status_pemanfaatan,
                    'keterangan'            => $request->keterangan,
                    'kendala'               => $request->kendala,
                    'tinjut'                => $request->tinjut,
                    'persen_kinerja'        => $request->persen_kinerja,
                ]);
            }
            
            return response()->json([
                'status'    => 'success',
                'title'     => 'Data Berhasil Disimpan',
                'message'   => 'Data Capaian Output Berhasil Diinput'
            ]);
        } 
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }
    }

    public function uploadEvidenceOld(Request $request)
    {
        $dir    = new Direktorat;
        $matrik = new MatriksPengendalian;

        try
        {
            $count  = $matrik->where([
                'kode'          => $request->kode,
                'kode_subdir'   => $request->kode_subdir,
                'bulan'         => $request->bulan,
                'tahun'         => $request->tahun
            ])->count();
                
            $direktorat         = $dir->where('id_dir', $request->kode_dir)->first()->nama_dir;
            $evidence           = "";

            if($request->triwulan == "1")
            {
                $bulan  = $request->bulan;
            }
            else if($request->triwulan == "2")
            {
                switch ($request->bulan)
                {
                    case '1':
                        $bulan = 4;
                        break;
                    case '2':
                        $bulan = 5;
                        break;
                    case '3':
                        $bulan = 6;
                        break;
                }
            }
            else if($request->triwulan == "3")
            {
                switch ($request->bulan)
                {
                    case '1':
                        $bulan = 7;
                        break;
                    case '2':
                        $bulan = 8;
                        break;
                    case '3':
                        $bulan = 9;
                        break;
                }
            }
            else if($request->triwulan == "4")
            {
                switch ($request->bulan)
                {
                    case '1':
                        $bulan = 10;
                        break;
                    case '2':
                        $bulan = 11;
                        break;
                    case '3':
                        $bulan = 12;
                        break;
                }
            }
            
            if($request->hasFile('evidence'))
            {
                $evidence = $this->uploadFile($request, 'evidence', $direktorat);
            }

            if($count == 0)
            {
                
                $matrik->create([
                    'kode'          => $request->kode,
                    'kode_subdir'   => $request->kode_subdir,
                    'created_by'    => Auth::user()->id_akses,
                    'bulan'         => $bulan,
                    'tahun'         => $request->tahun,
                    'evidence'      => $evidence
                ]);
            }
            else
            {
                $matrik->where([
                    'kode'          => $request->kode,
                    'kode_subdir'   => $request->kode_subdir,
                    'bulan'         => $bulan,
                    'tahun'         => $request->tahun
                ])->update([
                    'evidence'      => $evidence
                ]);
            }

            return response()->json([
                'status'    => 'success',
                'title'     => 'Data Berhasil Disimpan',
                'message'   => 'Data Capaian Output Berhasil Diinput'
            ]);
        } 
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }
    }

    public function uploadEvidence(Request $request)
    {
        $dir        = new Direktorat;
        $capaian    = new EvidenceCapaian;

        $validation = [
            // 'pertanyaan'        => 'required',
            'evidence' => 'max:2048',
        ];

        $message    = [
            'required'  => ':attribute tidak boleh kosong',
            'integer'   => ':attribute tidak valid',
            'date'      => ':attribute tidak valid',
            'max'       => ':attribute Ukuran Maksimal 2 MB'
        ];

        $names      = [
            'pertanyaan'        => 'Pertanyaan',
            'kak'               => 'Dokumen Evidence',
        ];

        $validator = Validator::make($request->all(), $validation, $message, $names);

        if ($validator->fails())
        {
            return response()->json([
                'status'    => 'failed',
                'title'     => 'Validasi Error',
                'message'   => $validator->errors()->all()
            ]);
        }
        
        try
        {
            $evidence   = "";
            $direktorat = $dir->where('id_dir', Auth::user()->id_dir)->first()->nama_dir;

            if($request->hasFile('evidence'))
            {
                $evidence = $this->uploadFile($request, 'evidence', $direktorat);
            }

            $capaian->create([
                'kode'          => $request->kode,
                'pertanyaan'    => $request->pertanyaan,
                'jawaban'       => $request->jawaban,
                'evidence'      => $evidence
            ]);

            $data       = $capaian->where('kode', $request->kode)->get();

            return response()->json([
                'data'      => $data,
                'status'    => 'success',
                'title'     => 'Data Berhasil Disimpan',
                'message'   => 'Data Capaian Output Berhasil Diupload'
            ]);
        } 
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }
    }

    public function deleteUploadEvidence(Request $request)
    {
        try
        {
            $deleted = EvidenceCapaian::destroy($request->id);

            $msg = $deleted ? 'berhasil' : 'gagal';

            return response()->json([
                'status'    => $msg,
                'title'     => 'Data ' . $msg .' dihapus',
                'message'   => 'Data Evidence ' . $msg .' dihapus'
            ]);
        } 
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }
    }

    public function uploadFile($request, $type, $direktorat)
    {
        $files = $request->File($type);
        if(!empty($files))
        {
            $ext        = $type."_".strtotime(date("Y-m-d H:i:s"))."." .$files->clientExtension();
            $name_file  = $ext;
            $files->storeAs('./assets/files/'.$direktorat.'/evidence-capaian/', $ext);
            return $name_file;
        }
    }
    public function uploadFileImport($request, $type)
    {
        $files = $request->File($type);
        if(!empty($files))
        {
            $ext        = $type."_".strtotime(date("Y-m-d H:i:s"))."." .$files->clientExtension();
            $name_file  = $ext;
            $files->storeAs('./assets/files/imports/', $ext);
            return $name_file;
        }
    }
}
