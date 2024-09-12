<?php

namespace App\Http\Controllers;

use App\Satker;
use App\Direktorat;
use App\SubKomponen;
use App\SubkomponenDekon;
use Illuminate\Http\Request;

class SubkomponenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Dekonsentrasi
    public function view()
    {
        $satker         = new Satker;
        $subkomponen    = new SubkomponenDekon;

        $modul          = 'Master';
        $current        = "Data Subkomponen Dekon";

        $data           = $satker->orderBy('provinsi')->get();

        return view('contents.master.subkomponen.dekon', compact('current', 'modul', 'data'));
    }

    public function data()
    {
        $satker         = new Satker;
        $subkomponen    = new SubkomponenDekon;

        $i      = 0;
        $data   = $subkomponen->get();
        
        foreach($data as $value)
        {
            $nama_satker = "ALL";

            if(strtolower($value->kdsatker) != "all")
            {
                $nama_satker = $satker->where('kode', $value->kdsatker)->first()->nama_satker;
            }

            $button     = '<div class="btn-group-vertical">
                <div class="btn-group">
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false"></button>
                    <ul class="dropdown-menu" style="">
                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="updateForm('.$value->id.', \''.$value->kdsatker.'\', \''.$value->jenis_satker.'\', \''.$value->kode_subkomponen.'\', \''.$value->kode_subkomponen_pagu.'\', \''.$value->kode_subkomponen_realisasi.'\', \''.$value->deskripsi.'\')">Ubah</a></li>
                        <li><a class="dropdown-item text-danger" href="javascript:void(0)" onclick="remove(\''.$value->id.'\')">Hapus</a></li>
                    </ul>
                </div>
            </div>
            ';

            $data[$i]->button       = $button;
            $data[$i]->nama_satker  = $nama_satker;

            $i++;
        }

        return $data;
    }

    public function destroy(Request $request)
    {
        $subkomponen = new SubkomponenDekon;

        try
        {
            $subkomponen->where('id', $request->id)->delete();

            return response()->json([
                'status'    => 'success',
                'title'     => 'Subkomponen Berhasil Dihapus',
                'message'   => 'Subkomponen Berhasil Dihapus'
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

    public function submit(Request $request)
    {
        $subkomponen = new SubkomponenDekon;

        try
        {

            if($request->id == "none")
            {
                $subkomponen->create([
                    'kdsatker'                      => $request->kdsatker,
                    'deskripsi'                     => $request->deskripsi,
                    'jenis_satker'                  => $request->jenis_satker,
                    'kode_subkomponen'              => $request->kode_subkomponen,
                    'kode_subkomponen_pagu'         => $request->kode_subkomponen_pagu,
                    'kode_subkomponen_realisasi'    => $request->kode_subkomponen_realisasi
                ]);
            }
            else
            {
                $subkomponen->where('id', $request->id)->update([
                    'kdsatker'                      => $request->kdsatker,
                    'deskripsi'                     => $request->deskripsi,
                    'jenis_satker'                  => $request->jenis_satker,
                    'kode_subkomponen'              => $request->kode_subkomponen,
                    'kode_subkomponen_pagu'         => $request->kode_subkomponen_pagu,
                    'kode_subkomponen_realisasi'    => $request->kode_subkomponen_realisasi
                ]);
            }

            return response()->json([
                'status'    => 'success',
                'title'     => 'Kode Subkomponen Berhasil Disimpan',
                'message'   => 'Kode Subkomponen Berhasil Disimpan'
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

    // Pusat
    public function viewPusat()
    {
        $direktorat     = new Direktorat;
        $subkomponen    = new SubKomponen;

        $modul          = 'Master';
        $current        = "Data Subkomponen Pusat";

        $data           = $direktorat->where('id_dir', '<>', 0)->get();

        return view('contents.master.subkomponen.pusat', compact('current', 'modul', 'data'));
    }

    public function dataPusat()
    {
        $subkomponen    = new Subkomponen;

        $i      = 0;
        $data   = $subkomponen
                    ->select('*', 'tbm_subkomponen.id as id', 'tbm_dir.nama_dir as direktorat', 'tbm_subdir.nama_subdir as subdirektorat')
                    ->leftJoin('tbm_dir', 'tbm_subkomponen.kode_direktorat', '=', 'tbm_dir.id_dir')
                    ->leftJoin('tbm_subdir', 'tbm_subkomponen.kode_subdirektorat', '=', 'tbm_subdir.id')
                    ->get();
        
        foreach($data as $value)
        {
            $direktorat     = $value->kode_direktorat;
            $subdirektorat  = $value->kode_subdirektorat;

            if($value->direktorat === NULL)
            {
                $direktorat             = "NONE";
                $data[$i]->direktorat   = "NONE";
            }

            if($value->subdirektorat === NULL)
            {
                $subdirektorat             = "NONE";
                $data[$i]->subdirektorat   = "NONE";
            }

            $button     = '<div class="btn-group-vertical">
                <div class="btn-group">
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false"></button>
                    <ul class="dropdown-menu" style="">
                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="updateForm('.$value->id.', \''.$value->kode.'\', \''.$value->kode_pagu.'\', \''.$value->kode_realisasi.'\', \''.$direktorat.'\', \''.$subdirektorat.'\')">Ubah</a></li>
                        <li><a class="dropdown-item text-danger" href="javascript:void(0)" onclick="remove(\''.$value->id.'\')">Hapus</a></li>
                    </ul>
                </div>
            </div>
            ';

            $data[$i]->button       = $button;

            $i++;
        }

        return $data;
    }

    public function destroyPusat(Request $request)
    {
        $subkomponen = new Subkomponen;

        try
        {
            $subkomponen->where('id', $request->id)->delete();

            return response()->json([
                'status'    => 'success',
                'title'     => 'Subkomponen Berhasil Dihapus',
                'message'   => 'Subkomponen Berhasil Dihapus'
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

    public function submitPusat(Request $request)
    {
        $subkomponen = new Subkomponen;

        try
        {

            if($request->id == "none")
            {
                $subkomponen->create([
                    'kode'                  => $request->kode,
                    'kode_pagu'             => $request->kode_pagu,
                    'kode_realisasi'        => $request->kode_realisasi,
                    'kode_direktorat'       => $request->kode_direktorat,
                    'kode_subdirektorat'    => $request->kode_subdirektorat
                ]);
            }
            else
            {
                $subkomponen->where('id', $request->id)->update([
                    'kode'                  => $request->kode,
                    'kode_pagu'             => $request->kode_pagu,
                    'kode_realisasi'        => $request->kode_realisasi,
                    'kode_direktorat'       => $request->kode_direktorat,
                    'kode_subdirektorat'    => $request->kode_subdirektorat
                ]);
            }

            return response()->json([
                'status'    => 'success',
                'title'     => 'Kode Subkomponen Berhasil Disimpan',
                'message'   => 'Kode Subkomponen Berhasil Disimpan'
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
}
