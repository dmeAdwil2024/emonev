<?php

namespace App\Http\Controllers;

use App\PaguHistory;
use Illuminate\Http\Request;

class PaguController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewHistory()
    {
        $modul      = 'Pagu';
        $current    = "Riwayat Pagu";

        return view('contents.pagu.history', compact('current', 'modul'));
    }

    public function historyPagu()
    {
        $pagu   = new PaguHistory;
        
        $i      = 0;
        $no     = 1;
        $tahun  = date("Y");
        $data   = $pagu->where("title","like","%{$tahun}%")
                  ->orWhere("tanggal","like","%{$tahun}%")
                  ->orderBy('created_at',"DESC")->get();
                   
        foreach ($data as $value)
        {
            $keterangan         = preg_replace( "/\r|\n/", "", $value->keterangan);
            $data[$i]->no       = $no.".";
            $data[$i]->tgl      = date("d/m/Y", strtotime($value->tanggal));
            $data[$i]->nominal  = number_format($value->pagu);
            $data[$i]->judul    = '<a href="javascript:void(0)" onclick="openModalAction(\''.$value->id.'\', \''.$value->pagu.'\', \''.$value->title.'\', \''.$value->tanggal.'\', \''.$keterangan.'\')">'.$value->title.'</a>';

            $i++;
            $no++;
        }

        return $data;
    }

    public function submitHistoryPagu(Request $request)
    {
        $pagu   = new PaguHistory;

        try
        {
            $pagu->create([
                'pagu'          => $request->pagu,
                'title'         => $request->history,
                'tanggal'       => date("Y-m-d", strtotime($request->tanggal)),
                'keterangan'    => $request->keterangan
            ]);

            return response()->json([
                'status'    => 'success',
                'title'     => 'History Pagu Berhasil Ditambahkan!',
                'message'   => 'History Pagu Berhasil Ditambahkan!'
            ]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Submit. Please Try Again'
            ]);
        }
    }

    public function removeHistoryPagu(Request $request)
    {
        $pagu   = new PaguHistory;

        try
        {
            $pagu->where(['id' => $request->id])->delete();

            return response()->json([
                'status'    => 'success',
                'title'     => 'History Pagu Berhasil Dihapus!',
                'message'   => 'History Pagu Berhasil Dihapus!'
            ]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Submit. Please Try Again'
            ]);
        }
    }

    public function updateHistoryPagu(Request $request)
    {
        $pagu   = new PaguHistory;

        try
        {
            $pagu->where('id', $request->id)->update([
                'pagu'          => $request->pagu,
                'title'         => $request->history,
                'tanggal'       => date("Y-m-d", strtotime($request->tanggal)),
                'keterangan'    => $request->keterangan
            ]);

            return response()->json([
                'status'    => 'success',
                'title'     => 'History Pagu Berhasil Diubah!',
                'message'   => 'History Pagu Berhasil Diubah!'
            ]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Submit. Please Try Again'
            ]);
        }
    }
}
