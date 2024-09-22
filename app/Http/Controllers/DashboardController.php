<?php

namespace App\Http\Controllers;

use DB;
use App\PaguHistory;
use App\SaktiRefSts;
use App\SaktiAnggaran;
use App\SatkerEselon1;
use App\SaktiRealisasi;
use App\SatkerKemendagri;
use App\RealisasiSaktiEselon1;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    //
    public function dashboard()
    {
        // variable tambahan
        $modul      = "Home";
        $current    = "Dashboard";
        // siapkan table yang digunakan
        $pagu       = new PaguHistory;
        $ang        = new SaktiAnggaran;
        $ses1       = new SatkerEselon1;
        $real       = new SaktiRealisasi;
        $es1        = new SatkerKemendagri;
        $real1      = new RealisasiSaktiEselon1;
        // ====================
        // pagu anggaran ditjen
        // query data anggaran
        $anggaran   = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->sum('total');
        // set tahun
        $tahun  = date("Y");
        // query data pagu
        $data_pagu  = $pagu->where("title","like","%{$tahun}%")
                    ->orWhere("tanggal","like","%{$tahun}%")
                    ->orderBy('tanggal', 'DESC')->first();
        // end perihal data pagu
        // =====================
        // realisasi anggaran ditjen
        // query realisasi
        $realisasi  = $real->whereNotNull('no_sp2d')->sum('nilai_rupiah');
        //
        $pagu_pusat = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->where('kdsatker', '027486')->sum('total');
        
        $rm_pusat = $ang->where('kode_register', 'NOT LIKE', '1CZ6CF2A')->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->where('kdsatker', '027486')->sum('total');

        $phln_pusat = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0,
            'kode_register'     => "1CZ6CF2A"
        ])->where('kdsatker', '027486')->sum('total');

        $realisasi_phln = $real->where([
            'kdsatker'      => '027486',
            'kode_kegiatan' => '1237',
            'kode_output'   => 'FBA'
        ])->sum('nilai_rupiah');

        $rm_pusat   = $pagu_pusat-$phln_pusat;
        
        // $realisasi_pusat = $real->where('kdsatker', '027486')->whereNotNull('no_sp2d')->sum('nilai_rupiah');
        $realisasi_pusat    = getSumRealisasiPusat();
        $sisa_pusat         = $pagu_pusat-$realisasi_pusat;
        $sisa_rm_pusat      = $rm_pusat-$realisasi_pusat;        

        $pagu_dekon = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->whereNotIn('kdsatker', ['027486', '356000', '417936', '690639'])->sum('total');
        
        // $realisasi_dekon = $real->whereNotIn('kdsatker', ['027486', '356000', '417936', '690639'])->sum('nilai_rupiah');
        $realisasi_dekon    = getSumRealisasiDekon();
        $sisa_dekon         = $pagu_dekon-$realisasi_dekon;

        $pagu_tp = $ang->whereIn('kdsatker', ['356000', '417936', '690639'])->sum('total');
        $realisasi_tp = $real->where('status_data', 'Upload SP2D')->whereIn('kdsatker', ['356000', '417936', '690639'])->sum('nilai_rupiah');
        $sisa_tp = $pagu_tp-$realisasi_tp;

        $last_synch_ang = $ang->max('created_at');
        $last_synch_real = $real->max('created_at');

        $data_dekon = DB::SELECT('SELECT sum(nilai_rupiah) as total, kdsatker, nama_satker FROM tb_sakti_realisasi 
        LEFT OUTER JOIN tbm_satker ON tbm_satker.kode=tb_sakti_realisasi.kdsatker
        WHERE kdsatker NOT LIKE \'027486\'
        GROUP BY kdsatker, nama_satker
        ORDER BY SUM(nilai_rupiah) DESC');

        $realisasi          = $realisasi_pusat+$realisasi_dekon+$realisasi_tp;
        $selisih            = $anggaran-$realisasi;

        $color              = [];
        $real_eselon1       = [];
        $satker_eselon1     = [];
        $data_es1           = DB::table('v_sisa')->orderBy('persentase_realisasi', 'desc')->get();

        foreach ($data_es1 as $value_es1)
        {
            // $real_eselon1[]     = $ses1
            //                     ->leftJoin('tb_sakti_realisasi_eselon1', 'tb_sakti_realisasi_eselon1.kdsatker', '=', 'tbm_satker_eselon1.kode')
            //                     ->where([
            //                         'status_data'           => 'Upload SP2D',
            //                         'id_satker_kemendagri'  => $value_es1->id
            //                     ])->sum('nilai_rupiah');

            // $satker_eselon1[]   = $value_es1->nama_satker;
            $color[]            = $value_es1->bgcolor;
            $satker_eselon1[]   = $value_es1->nama_satker;
            $real_eselon1[]     = number_format((float) $value_es1->persentase_realisasi,2);
        }

        $color   = json_encode($color);
        $real_eselon1   = json_encode($real_eselon1);
        $satker_eselon1 = json_encode($satker_eselon1);
        
        // kirim data ke view
        return view('newdashboard', compact('anggaran','data_pagu', 'realisasi', 'selisih', 'pagu_pusat', 'realisasi_pusat', 'sisa_pusat', 'sisa_rm_pusat', 'pagu_dekon', 'realisasi_dekon', 'sisa_dekon', 'pagu_tp', 'realisasi_tp', 'sisa_tp', 'last_synch_ang', 'last_synch_real', 'data_dekon', 'rm_pusat', 'phln_pusat', 'data_pagu', 'realisasi_phln', 'satker_eselon1', 'real_eselon1', 'data_es1', 'color'));
    }

    public function sumRealisasi(Request $request)
    {
        $nama_satker    = $request->nama_satker;
        $data           = DB::table('v_sisa')->where('nama_satker', $nama_satker)->get();

        return $data;
    }

    //
    public function dashboardadmin()
    {
        // variable tambahan
        $modul      = "Home";
        $current    = "Dashboard";
        // siapkan table yang digunakan
        $pagu       = new PaguHistory;
        $ang        = new SaktiAnggaran;
        $ses1       = new SatkerEselon1;
        $real       = new SaktiRealisasi;
        $es1        = new SatkerKemendagri;
        $real1      = new RealisasiSaktiEselon1;
        // ====================
        // pagu anggaran ditjen
        // query data anggaran
        $anggaran   = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->sum('total');
        // set tahun
        $tahun  = date("Y");
        // query data pagu
        $data_pagu  = $pagu->where("title","like","%{$tahun}%")
                    ->orWhere("tanggal","like","%{$tahun}%")
                    ->orderBy('tanggal', 'DESC')->first();
        // end perihal data pagu
        // =====================
        // realisasi anggaran ditjen
        // query realisasi
        $realisasi  = $real->whereNotNull('no_sp2d')->sum('nilai_rupiah');
        //
        $pagu_pusat = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->where('kdsatker', '027486')->sum('total');
        
        $rm_pusat = $ang->where('kode_register', 'NOT LIKE', '1CZ6CF2A')->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->where('kdsatker', '027486')->sum('total');

        $phln_pusat = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0,
            'kode_register'     => "1CZ6CF2A"
        ])->where('kdsatker', '027486')->sum('total');

        $realisasi_phln = $real->where([
            'kdsatker'      => '027486',
            'kode_kegiatan' => '1237',
            'kode_output'   => 'FBA'
        ])->sum('nilai_rupiah');

        $rm_pusat   = $pagu_pusat-$phln_pusat;
        
        // $realisasi_pusat = $real->where('kdsatker', '027486')->whereNotNull('no_sp2d')->sum('nilai_rupiah');
        $realisasi_pusat    = getSumRealisasiPusat();
        $sisa_pusat         = $pagu_pusat-$realisasi_pusat;
        $sisa_rm_pusat      = $rm_pusat-$realisasi_pusat;        

        $pagu_dekon = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->whereNotIn('kdsatker', ['027486', '356000', '417936', '690639'])->sum('total');
        
        // $realisasi_dekon = $real->whereNotIn('kdsatker', ['027486', '356000', '417936', '690639'])->sum('nilai_rupiah');
        $realisasi_dekon    = getSumRealisasiDekon();
        $sisa_dekon         = $pagu_dekon-$realisasi_dekon;

        $pagu_tp = $ang->whereIn('kdsatker', ['356000', '417936', '690639'])->sum('total');
        $realisasi_tp = $real->where('status_data', 'Upload SP2D')->whereIn('kdsatker', ['356000', '417936', '690639'])->sum('nilai_rupiah');
        $sisa_tp = $pagu_tp-$realisasi_tp;

        $last_synch_ang = $ang->max('created_at');
        $last_synch_real = $real->max('created_at');

        $data_dekon = DB::SELECT('SELECT sum(nilai_rupiah) as total, kdsatker, nama_satker FROM tb_sakti_realisasi 
        LEFT OUTER JOIN tbm_satker ON tbm_satker.kode=tb_sakti_realisasi.kdsatker
        WHERE kdsatker NOT LIKE \'027486\'
        GROUP BY kdsatker, nama_satker
        ORDER BY SUM(nilai_rupiah) DESC');

        $realisasi          = $realisasi_pusat+$realisasi_dekon+$realisasi_tp;
        $selisih            = $anggaran-$realisasi;

        $color              = [];
        $real_eselon1       = [];
        $satker_eselon1     = [];
        $data_es1           = DB::table('v_sisa')->orderBy('persentase_realisasi', 'desc')->get();

        foreach ($data_es1 as $value_es1)
        {
            // $real_eselon1[]     = $ses1
            //                     ->leftJoin('tb_sakti_realisasi_eselon1', 'tb_sakti_realisasi_eselon1.kdsatker', '=', 'tbm_satker_eselon1.kode')
            //                     ->where([
            //                         'status_data'           => 'Upload SP2D',
            //                         'id_satker_kemendagri'  => $value_es1->id
            //                     ])->sum('nilai_rupiah');

            // $satker_eselon1[]   = $value_es1->nama_satker;
            $color[]            = $value_es1->bgcolor;
            $satker_eselon1[]   = $value_es1->nama_satker;
            $real_eselon1[]     = number_format((float) $value_es1->persentase_realisasi,2);
        }

        $color   = json_encode($color);
        $real_eselon1   = json_encode($real_eselon1);
        $satker_eselon1 = json_encode($satker_eselon1);
        
        // kirim data ke view
        return view('newdashboardadmin', compact('anggaran','data_pagu', 'realisasi', 'selisih', 'pagu_pusat', 'realisasi_pusat', 'sisa_pusat', 'sisa_rm_pusat', 'pagu_dekon', 'realisasi_dekon', 'sisa_dekon', 'pagu_tp', 'realisasi_tp', 'sisa_tp', 'last_synch_ang', 'last_synch_real', 'data_dekon', 'rm_pusat', 'phln_pusat', 'data_pagu', 'realisasi_phln', 'satker_eselon1', 'real_eselon1', 'data_es1', 'color'));
    }

    public function dashboardkasubag()
    {
        
        // kirim data ke view
        return view('newdashboardkasubag');
    }

    public function dashboardpusatpptk()
    {
        // kirim data ke view
        return view('newdashboardpusatpptk');
    }

    public function dashboarddaerahkpa()
    {
        // kirim data ke view
        return view('newdashboarddaerahkpa');
    }

    public function dashboarddaerahppk()
    {
        // kirim data ke view
        return view('newdashboarddaerahppk');
    }

    public function caputNew() {
        // variable tambahan
        $modul      = "Home";
        $current    = "Dashboard";
        // siapkan table yang digunakan
        $pagu       = new PaguHistory;
        $ang        = new SaktiAnggaran;
        $ses1       = new SatkerEselon1;
        $real       = new SaktiRealisasi;
        $es1        = new SatkerKemendagri;
        $real1      = new RealisasiSaktiEselon1;
        // ====================
        // pagu anggaran ditjen
        // query data anggaran
        $anggaran   = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->sum('total');
        // set tahun
        $tahun  = date("Y");
        // query data pagu
        $data_pagu  = $pagu->where("title","like","%{$tahun}%")
                    ->orWhere("tanggal","like","%{$tahun}%")
                    ->orderBy('tanggal', 'DESC')->first();
        // end perihal data pagu
        // =====================
        // realisasi anggaran ditjen
        // query realisasi
        $realisasi  = $real->whereNotNull('no_sp2d')->sum('nilai_rupiah');
        //
        $pagu_pusat = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->where('kdsatker', '027486')->sum('total');
        
        $rm_pusat = $ang->where('kode_register', 'NOT LIKE', '1CZ6CF2A')->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->where('kdsatker', '027486')->sum('total');

        $phln_pusat = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0,
            'kode_register'     => "1CZ6CF2A"
        ])->where('kdsatker', '027486')->sum('total');

        $realisasi_phln = $real->where([
            'kdsatker'      => '027486',
            'kode_kegiatan' => '1237',
            'kode_output'   => 'FBA'
        ])->sum('nilai_rupiah');

        $rm_pusat   = $pagu_pusat-$phln_pusat;
        
        // $realisasi_pusat = $real->where('kdsatker', '027486')->whereNotNull('no_sp2d')->sum('nilai_rupiah');
        $realisasi_pusat    = getSumRealisasiPusat();
        $sisa_pusat         = $pagu_pusat-$realisasi_pusat;
        $sisa_rm_pusat      = $rm_pusat-$realisasi_pusat;        

        $pagu_dekon = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->whereNotIn('kdsatker', ['027486', '356000', '417936', '690639'])->sum('total');
        
        // $realisasi_dekon = $real->whereNotIn('kdsatker', ['027486', '356000', '417936', '690639'])->sum('nilai_rupiah');
        $realisasi_dekon    = getSumRealisasiDekon();
        $sisa_dekon         = $pagu_dekon-$realisasi_dekon;

        $pagu_tp = $ang->whereIn('kdsatker', ['356000', '417936', '690639'])->sum('total');
        $realisasi_tp = $real->where('status_data', 'Upload SP2D')->whereIn('kdsatker', ['356000', '417936', '690639'])->sum('nilai_rupiah');
        $sisa_tp = $pagu_tp-$realisasi_tp;

        $last_synch_ang = $ang->max('created_at');
        $last_synch_real = $real->max('created_at');

        $data_dekon = DB::SELECT('SELECT sum(nilai_rupiah) as total, kdsatker, nama_satker FROM tb_sakti_realisasi 
        LEFT OUTER JOIN tbm_satker ON tbm_satker.kode=tb_sakti_realisasi.kdsatker
        WHERE kdsatker NOT LIKE \'027486\'
        GROUP BY kdsatker, nama_satker
        ORDER BY SUM(nilai_rupiah) DESC');

        $realisasi          = $realisasi_pusat+$realisasi_dekon+$realisasi_tp;
        $selisih            = $anggaran-$realisasi;

        $color              = [];
        $real_eselon1       = [];
        $satker_eselon1     = [];
        $data_es1           = DB::table('v_sisa')->orderBy('persentase_realisasi', 'desc')->get();

        foreach ($data_es1 as $value_es1)
        {
            // $real_eselon1[]     = $ses1
            //                     ->leftJoin('tb_sakti_realisasi_eselon1', 'tb_sakti_realisasi_eselon1.kdsatker', '=', 'tbm_satker_eselon1.kode')
            //                     ->where([
            //                         'status_data'           => 'Upload SP2D',
            //                         'id_satker_kemendagri'  => $value_es1->id
            //                     ])->sum('nilai_rupiah');

            // $satker_eselon1[]   = $value_es1->nama_satker;
            $color[]            = $value_es1->bgcolor;
            $satker_eselon1[]   = $value_es1->nama_satker;
            $real_eselon1[]     = number_format((float) $value_es1->persentase_realisasi,2);
        }

        $color   = json_encode($color);
        $real_eselon1   = json_encode($real_eselon1);
        $satker_eselon1 = json_encode($satker_eselon1);


        return view('newcapaianoutputadmin', compact('anggaran','data_pagu', 'realisasi', 'selisih', 'pagu_pusat', 'realisasi_pusat', 'sisa_pusat', 'sisa_rm_pusat', 'pagu_dekon', 'realisasi_dekon', 'sisa_dekon', 'pagu_tp', 'realisasi_tp', 'sisa_tp', 'last_synch_ang', 'last_synch_real', 'data_dekon', 'rm_pusat', 'phln_pusat', 'data_pagu', 'realisasi_phln', 'satker_eselon1', 'real_eselon1', 'data_es1', 'color'));
    }
}
