<?php

namespace App\Http\Controllers;

use App\Direktorat;
use App\Subdirektorat;
use Illuminate\Http\Request;

class SubditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view()
    {
        $direktorat = new Direktorat;

        $modul      = 'Master';
        $current    = "Data Subdit";

        $data_dir   = $direktorat->where('id_dir', 'NOT LIKE', '0')->orderBy('id_dir')->get();

        return view('contents.master.subdit.data', compact('current', 'modul', 'data_dir'));
    }

    public function data()
    {
        $dir    = new Direktorat;
        $subdit = new Subdirektorat;

        $i      = 0;
        $data   = $subdit->where('id_subdir', 'NOT LIKE', 0)->get();
        
        foreach($data as $value)
        {
            $direktorat = $dir->where('id_dir', $value->id_dir)->first()->nama_dir;

            $button     = '<div class="btn-group-vertical">
                <div class="btn-group">
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false"></button>
                    <ul class="dropdown-menu" style="">
                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="updateForm('.$value->id.', \''.$value->id_subdir.'\', \''.$value->nama_subdir.'\', '.$value->id_dir.')">Ubah</a></li>
                        <li><a class="dropdown-item text-danger" href="javascript:void(0)" onclick="remove(\''.$value->id.'\')">Hapus</a></li>
                    </ul>
                </div>
            </div>
            ';

            $data[$i]->button       = $button;
            $data[$i]->direktorat   = $direktorat;

            $i++;
        }

        return $data;
    }

    public function destroy(Request $request)
    {
        $subdit = new Subdirektorat;

        try
        {
            $subdit->where('id', $request->id)->delete();

            return response()->json([
                'status'    => 'success',
                'title'     => 'Subdirekorat Berhasil Dihapus',
                'message'   => 'Subdirekorat Berhasil Dihapus'
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
        $subdit = new Subdirektorat;

        try
        {

            if($request->id == "none")
            {
                $subdit->create([
                    'id_dir'        => $request->direktorat,
                    'id_subdir'     => $request->id_subdir,
                    'nama_subdir'   => $request->nama_subdir
                ]);
            }
            else
            {
                $subdit->where('id', $request->id)->update([
                    'id_dir'        => $request->direktorat,
                    'id_subdir'     => $request->id_subdir,
                    'nama_subdir'   => $request->nama_subdir
                ]);
            }

            return response()->json([
                'status'    => 'success',
                'title'     => 'Subdirekorat Berhasil Disimpan',
                'message'   => 'Subdirekorat Berhasil Disimpan'
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
