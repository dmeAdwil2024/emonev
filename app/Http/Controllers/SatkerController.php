<?php

namespace App\Http\Controllers;

use App\Satker;
use App\Provinsi;
use App\SatkerEselon1;
use App\SatkerKemendagri;
use App\Imports\SatkerImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SatkerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewSatker()
    {
        $provinsi   = new Provinsi;

        $modul      = 'Master';
        $current    = "Data Satuan Kerja";

        $data_prov  = $provinsi->orderBy('namaprov')->get();

        return view('contents.master.satker.data', compact('current', 'modul', 'data_prov'));
    }

    public function viewSatkerEselon1()
    {
        $model2         = new SatkerEselon1;
        $model          = new SatkerKemendagri;

        $i              = 0;
        $modul          = 'Master';
        $current        = "Satker Eselon 1";

        $data_satker    = $model->get();
        
        foreach ($data_satker as $satker)
        {
            $data_satker[$i]->subsatker    = $model2->where('id_satker_kemendagri', $satker->id)->get();

            $i++;
        }

        return view('contents.master.satker.eselon1', compact('current', 'modul', 'data_satker'));
    }

    public function dataSatkerEselon1(Request $request)
    {
        $satker     = new SatkerEselon1;

        $i          = 0;
        $data       = $satker->where('id_satker_kemendagri', $request->id)->get();
        
        foreach($data as $value)
        {
            $button = '<div class="btn-group-vertical">
                <div class="btn-group">
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false"></button>
                    <ul class="dropdown-menu" style="">
                        <li class="d-none">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="fillSubSatker(\''.$value->id.'\', \''.$value->kode.'\', \''.$value->kode_sakti_pagu.'\', \''.$value->nama_satker.'\')">Ubah</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-danger" href="javascript:void(0)" onclick="removeSubSatker(\''.$value->id.'\', \''.$value->id_satker_kemendagri.'\')">Hapus</a>
                        </li>
                    </ul>
                </div>
            </div>
            ';

            $data[$i]->button           = $button;

            $i++;
        }

        return $data;
    }

    public function data()
    {
        $satker     = new Satker;

        $i          = 0;
        $data       = $satker->get();
        
        foreach($data as $value)
        {
            $button = '<div class="btn-group-vertical">
                <div class="btn-group">
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false"></button>
                    <ul class="dropdown-menu" style="">
                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="updateForm('.$value->id.', \''.$value->kode.'\', \''.$value->jenis_satker.'\', \''.$value->provinsi.'\', \''.$value->nama_satker.'\', \''.$value->kode_sakti_pagu.'\')">Ubah</a></li>
                        <li><a class="dropdown-item text-danger" href="javascript:void(0)" onclick="remove(\''.$value->id.'\')">Hapus</a></li>
                    </ul>
                </div>
            </div>
            ';

            $data[$i]->button           = $button;

            $i++;
        }

        return $data;
    }

    public function submit(Request $request)
    {
        $satker = new Satker;

        try
        {
            if($request->id_satker == "none")
            {
                $satker->create([
                    'kode'              => $request->kode_satker,
                    'provinsi'          => $request->provinsi,
                    'nama_satker'       => $request->nama_satker,
                    'jenis_satker'      => $request->jenis_satker,
                    'kode_sakti_pagu'   => $request->kode_sakti_pagu,
                    'synch'             => 0,
                    'synch_realisasi'   => 0
                ]);
            }
            else
            {
                $satker->where('id', $request->id_satker)->update([
                    'kode'              => $request->kode_satker,
                    'provinsi'          => $request->provinsi,
                    'nama_satker'       => $request->nama_satker,
                    'jenis_satker'      => $request->jenis_satker,
                    'kode_sakti_pagu'   => $request->kode_sakti_pagu,
                    'synch'             => 0,
                    'synch_realisasi'   => 0
                ]);
            }

            return response()->json([
                'status'    => 'success',
                'title'     => 'Satuan Kerja Berhasil Disimpan',
                'message'   => 'Satuan Kerja Berhasil Disimpan'
            ]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Processing. Please Try Again'
            ]);
        }
    }

    public function submitSatkerEselon1(Request $request)
    {
        $model1 = new SatkerEselon1;
        $model2 = new SatkerKemendagri;
        
        try
        {
            $id_model2  = $request->id_satker_emonev;
            $count2     = $model2->where('id', $id_model2)->count();

            if($count2 == 0)
            {
                $id_model2  = $model2->create([
                    'nama_satker'   => $request->nama_satker_emonev
                ])->id;
            }

            $id_model1  = $request->id_satker;
            $count1     = $model1->where('id', $id_model1)->count();

            if($count1 == 0)
            {
                $id_model1  = $model1->create([
                    'id_satker_kemendagri'  => $id_model2,
                    'kode'                  => $request->kode_satker,
                    'kode_sakti_pagu'       => $request->kode_sakti_pagu,
                    'nama_satker'           => $request->nama_satker,
                    'synch'                 => 0,
                    'synch_realisasi'       => 0
                ])->id;
            }
            else
            {
                $model1->where('id', $id_model1)->update([
                    'id_satker_kemendagri'  => $id_model2,
                    'kode'                  => $request->kode_satker,
                    'kode_sakti_pagu'       => $request->kode_sakti_pagu,
                    'nama_satker'           => $request->nama_satker,
                    'synch'                 => 0,
                    'synch_realisasi'       => 0
                ]);
            }

            return response()->json([
                'id_satker'         => $id_model1,
                'id_satker_emonev'  => $id_model2,
                'status'            => 'success',
                'title'             => 'Satuan Kerja Berhasil Disimpan',
                'message'           => 'Satuan Kerja Berhasil Disimpan'
            ]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Processing. Please Try Again'
            ]);
        }
    }

    function submitSatkerEmonev(Request $request)
    {
        $model2 = new SatkerKemendagri;
        
        try
        {
            $id_model2  = $request->id_satker_emonev;
            $count2     = $model2->where('id', $id_model2)->count();

            if($count2 == 0)
            {
                $id_model2  = $model2->create([
                    'nama_satker'   => $request->nama_satker_emonev
                ])->id;
            }
            else
            {
                $model2->where('id', $id_model2)->update([
                    'nama_satker'   => $request->nama_satker_emonev
                ]);
            }

            return response()->json([
                'id_satker_emonev'  => $id_model2,
                'status'            => 'success',
                'title'             => 'Satuan Kerja Berhasil Disimpan',
                'message'           => 'Satuan Kerja Berhasil Disimpan'
            ]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Processing. Please Try Again'
            ]);
        }
    }

    public function destroySatkerEselon1(Request $request)
    {
        $satker = new SatkerEselon1;

        try
        {
            $satker->where('id', $request->id)->delete();

            return response()->json([
                'status'    => 'success',
                'title'     => 'Satuan Kerja Berhasil Dihapus',
                'message'   => 'Satuan Kerja Berhasil Dihapus'
            ]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Processing. Please Try Again'
            ]);
        }        
    }

    public function destroySatkerEmonev(Request $request)
    {
        $satker     = new SatkerKemendagri;
        $satker2    = new SatkerEselon1;

        try
        {
            $satker->where('id', $request->id)->delete();
            $satker2->where('id_satker_kemendagri', $request->id)->delete();

            return response()->json([
                'status'    => 'success',
                'title'     => 'Satuan Kerja Berhasil Dihapus',
                'message'   => 'Satuan Kerja Berhasil Dihapus'
            ]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Processing. Please Try Again'
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $satker = new Satker;

        try
        {
            $satker->where('id', $request->id)->delete();

            return response()->json([
                'status'    => 'success',
                'title'     => 'Satuan Kerja Berhasil Dihapus',
                'message'   => 'Satuan Kerja Berhasil Dihapus'
            ]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Processing. Please Try Again'
            ]);
        }
    }

    public function import() 
    {
        Excel::import(new SatkerImport, 'Master Satker.xlsx');
        
        return true;
    }

}
