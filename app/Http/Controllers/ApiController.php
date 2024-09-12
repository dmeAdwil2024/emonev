<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Satker;
use App\SaktiAnggaran;
use App\SaktiRealisasi;
use App\SubkomponenDekon;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.apikey');
    }

    public function realisasiProvinsi()
    {
        $model      = new Satker;
        $model1     = new SaktiRealisasi;

        $i          = 0; 
        $data       = $model->select('provinsi')->where('provinsi', 'NOT LIKE', 'PUSAT')->groupBy('provinsi')->get();
        
        foreach ($data as $value)
        {
            $satker         = [];
            $kode_satker    = $model->select('kode')->where('provinsi', 'like', $value->provinsi)->get();
            
            foreach ($kode_satker as $v_satker)
            {
                $satker[]   = $v_satker->kode;
            }

            $total_realisasi  = $model1->whereIn('kdsatker', $satker)->where([
                'status_data'   => 'Upload SP2D'
            ])->sum('nilai_rupiah');

            $data[$i]->realisasi  = $total_realisasi;

            $i++;
        }

        return $data;
    }

    public function detailRealisasiProvinsi($provinsi)
    {
        $model          = new Satker;
        $model1         = new SaktiRealisasi;

        $count_satker   = $model->where('provinsi', 'like', strtoupper($provinsi))->count();

        if($count_satker == 0)
        {
            return response()->json([
                'status'    => '404',
                'message'   => 'Mohon periksa nama provinsi yang Anda Request',
                'title'     => 'Data Provinsi Tidak Ditemukan'
            ]);
        }
        else
        {
            $i              = 0;
            $data_satker    = $model->select('provinsi', 'kode as kdsatker', 'nama_satker')->where('provinsi', 'like', strtoupper($provinsi))->get();

            foreach ($data_satker as $satker)
            {
                $realisasi  = $model1->where([
                    'kdsatker'      => $satker->kdsatker,
                    'status_data'   => 'Upload SP2D'
                ])->sum('nilai_rupiah');

                $data_satker[$i]->realisasi = $realisasi;

                $i++;
            }

            return $data_satker;
        }
    }

    public function paguProvinsi()
    {
        $model      = new Satker;
        $model1     = new SaktiAnggaran;

        $i          = 0; 
        $data       = $model->select('provinsi')->where('provinsi', 'NOT LIKE', 'PUSAT')->groupBy('provinsi')->get();
        
        foreach ($data as $value)
        {
            $satker         = [];
            $kode_satker    = $model->select('kode')->where('provinsi', 'like', $value->provinsi)->get();
            
            foreach ($kode_satker as $v_satker)
            {
                $satker[]   = $v_satker->kode;
            }

            $total_pagu = $model1->whereIn('kdsatker', $satker)->sum('total');

            $data[$i]->pagu  = $total_pagu;

            $i++;
        }

        return $data;
    }

    public function detailPaguProvinsi($provinsi)
    {
        $model      = new Satker;
        $model1     = new SaktiAnggaran;

        $count_satker   = $model->where('provinsi', 'like', strtoupper($provinsi))->count();

        if($count_satker == 0)
        {
            return response()->json([
                'status'    => '404',
                'message'   => 'Mohon periksa nama provinsi yang Anda Request',
                'title'     => 'Data Provinsi Tidak Ditemukan'
            ]);
        }
        else
        {
            $i          = 0; 
            $data       = $model->select('provinsi', 'kode as kdsatker', 'nama_satker')->where('provinsi', 'LIKE', strtoupper($provinsi))->get();
            
            foreach ($data as $value)
            {
                $total_pagu         = $model1->where('kdsatker', $value->kdsatker)->sum('total');
                $data[$i]->pagu     = $total_pagu;

                $i++;
            }

            return $data;
        }
    }

    public function summarizeDetailProvinsi($provinsi)
    {
        $model      = new Satker;
        $model1     = new SaktiAnggaran;
        $model2     = new SaktiRealisasi;

        $count_satker   = $model->where('provinsi', 'like', strtoupper($provinsi))->count();

        if($count_satker == 0)
        {
            return response()->json([
                'status'    => '404',
                'message'   => 'Mohon periksa nama provinsi yang Anda Request',
                'title'     => 'Data Provinsi Tidak Ditemukan'
            ]);
        }
        else
        {
            $i          = 0; 
            $data       = $model->select('provinsi', 'kode as kdsatker', 'nama_satker')->where('provinsi', 'LIKE', strtoupper($provinsi))->get();
            
            foreach ($data as $value)
            {
                $total_pagu         = $model1->where('kdsatker', $value->kdsatker)->sum('total');
                $total_realisasi    = $model2->where('kdsatker', $value->kdsatker)->where([
                    'status_data'   => 'Upload SP2D'
                ])->sum('nilai_rupiah');
    
                $data[$i]->pagu         = (int) $total_pagu;
                $data[$i]->realisasi    = (int) $total_realisasi;
                $data[$i]->sisa         = (int) $total_pagu-$total_realisasi;

                $i++;
            }

            return $data;
        }
    }

    public function summarizeProvinsi()
    {
        $model      = new Satker;
        $model1     = new SaktiAnggaran;
        $model2     = new SaktiRealisasi;

        $i          = 0; 
        $data       = $model->select('provinsi')->where('provinsi', 'NOT LIKE', 'PUSAT')->groupBy('provinsi')->get();
        
        foreach ($data as $value)
        {
            $satker         = [];
            $kode_satker    = $model->select('kode')->where('provinsi', 'like', $value->provinsi)->get();
            
            foreach ($kode_satker as $v_satker)
            {
                $satker[]   = $v_satker->kode;
            }

            $total_pagu         = $model1->whereIn('kdsatker', $satker)->sum('total');
            $total_realisasi    = $model2->whereIn('kdsatker', $satker)->where([
                'status_data'   => 'Upload SP2D'
            ])->sum('nilai_rupiah');

            $data[$i]->pagu         = (int) $total_pagu;
            $data[$i]->realisasi    = (int) $total_realisasi;
            $data[$i]->sisa         = (int) $total_pagu-$total_realisasi;

            $i++;
        }

        return $data;
    }

    public function summarizeSatker($kode_satker)
    {
        $i              = 0;
        $satker         = new Satker;
        $pagu           = new SaktiAnggaran;
        $realisasi      = new SaktiRealisasi;
        $subkomponen    = new SubkomponenDekon;

        $data_satker    = $satker->where('kode', $kode_satker)->first();
        $count          = $subkomponen->where('kdsatker', $kode_satker)->count();

        $count_satker   = $satker->where('kode', $kode_satker)->count();

        if($count_satker == 0)
        {
            return response()->json([
                'status'    => '404',
                'message'   => 'Mohon periksa kode satker yang Anda Request',
                'title'     => 'Data Satker Tidak Ditemukan'
            ]);
        }
        else
        {
            
            $data   = $subkomponen->select('kode_subkomponen', 'kode_subkomponen_pagu', 'kode_subkomponen_realisasi', 'deskripsi')->where('kdsatker', $kode_satker)->get();

            if($count == 0)
            {
                $data   = $subkomponen->select('kode_subkomponen', 'kode_subkomponen_pagu', 'kode_subkomponen_realisasi', 'deskripsi')->where([
                    'kdsatker'      => "ALL",
                    'jenis_satker'  => $data_satker->jenis_satker
                ])->get();
            }
        }

        foreach ($data as $value)
        {
            $kode_pagu          = $value->kode_subkomponen_pagu;
            $kode_realisasi     = $value->kode_subkomponen_realisasi;
            
            $total_anggaran     = $pagu->where([
                'kdsatker'          => $kode_satker,
                'kode_subkomponen'  => $kode_pagu
            ])->where('hargasat', '<>', 0)->sum('total');

            $total_realisasi    = $realisasi->where([
                'kdsatker'          => $kode_satker,
                'kode_subkomponen'  => $kode_realisasi,
                'status_data'       => 'Upload SP2D'
            ])->sum('nilai_rupiah');

            $total_sisa                 = $total_anggaran-$total_realisasi;

            $data[$i]->kdsatker         = $kode_satker;
            $data[$i]->nama_satker      = $data_satker->nama_satker;
            $data[$i]->tugas            = $value->deskripsi;
            $data[$i]->total_sisa       = (int) $total_sisa;
            $data[$i]->total_anggaran   = (int) $total_anggaran;
            $data[$i]->total_realisasi  = (int) $total_realisasi;

            $i++;
        }

        return $data;
    }
}
