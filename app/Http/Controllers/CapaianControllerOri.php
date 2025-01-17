<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Validator;
use App\Provinsi;
use App\Direktorat;
use App\SaktiOutput;
use App\SubKomponen;
use App\SaktiAnggaran;
use App\SaktiKomponen;
use App\SaktiKegiatan;
use App\SaktiSubOutput;
use App\SaktiRealisasi;
use App\EvidenceCapaian;
use App\MatriksPengendalian;
use Illuminate\Http\Request;

class CapaianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewOutput()
    {
        $dir        = new Direktorat;

        $modul      = 'Capaian';
        $current    = "Capaian Pusat";

        $data_direktorat    = $dir->where('id_dir', '<>', 0)->get();

        return view('contents.capaian.output', compact('current', 'modul', 'data_direktorat'));
    }

    public function viewOutputDaerah()
    {
        $provinsi   = new Provinsi;

        $modul      = 'Capaian';
        $current    = "Capaian Daerah";

        $data_provinsi  = $provinsi->where('id_prov', 'NOT LIKE', 'undefined')->get();

        return view('contents.capaian.output-daerah', compact('current', 'modul', 'data_provinsi'));
    }

    public function viewTargetCaput()
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
        $nama_dir         = $dir->where('id_dir', $id_dir)->first()->nama_dir;
        $triwulan         = $request->triwulan;
        $kode_subkomponen = $subkomponen->where('kode_direktorat', $id_dir)->get();

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
            $data[$i]->uraian_treegrid  = '<br><span style="padding: 5px; border-radius: 4px" class="font-weight-bolder mb-1 bg-warning">Kegiatan</span><br><br>'.$kegiatan->where('kode', $value->kode_kegiatan)->first()->deskripsi;
            
            $j                          = 0;
            $data_output                = $output->where('status', 1)->where('kode', 'like', '%'.$value->kode_kegiatan.'%')->get();
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

                        $target     = '<a href="javascript:void(0)" onclick="openModalTargetPusat(1, \''.$value_komponen->kode.'\')"><i class="fas fa-edit text-danger"></i></a>';
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
                        
                        $cicit[$l]['target']            = $target;

                        if(is_numeric($target))
                        {
                            $cicit[$l]['target']        = number_format($target);
                        }

                        $cicit[$l]['bulan1']            = $bulan1;
                        $cicit[$l]['bulan2']            = $bulan2;
                        $cicit[$l]['bulan3']            = $bulan3;
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
                                                    'kode_komponen' => $kode_komponen
                                                ])
                                                ->whereIn('kode_subkomponen', $kd_skmpn)
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

                            $target     = '<a href="javascript:void(0)" onclick="openModalTargetPusat(1, \''.$value_komponen->kode.'\')"><i class="fas fa-edit text-danger"></i></a>';
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

                            $canggah[$m]['target']          = $target;
                            
                            if(is_numeric($target))
                            {
                                $canggah[$m]['target']      = number_format($target);
                            }

                            $canggah[$m]['bulan1']          = $bulan1;
                            $canggah[$m]['bulan2']          = $bulan2;
                            $canggah[$m]['bulan3']          = $bulan3;
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
            
        $detail     = $capaian->where('kode', $request->kode)->get();
        
        if($count > 0)
        {
            $data   = $matrik->where([
                'kode'  => $request->kode,
                'bulan' => $request->bulan,
                'tahun' => date("Y")
            ])->first();

            $data->data = $detail;
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

        try
        {
            $count  = $matrik->where([
                'kode'          => $request->kode,
                'kode_subdir'   => $request->kode_subdir,
                'bulan'         => $request->bulan,
                'tahun'         => $request->tahun
            ])->count();
    
            if($count == 0)
            {
                $matrik->create([
                    'created_by'            => Auth::user()->akses_id,
                    'kode'                  => $request->kode,
                    'kode_subdir'           => $request->kode_subdir,
                    'bulan'                 => $request->bulan,
                    'tahun'                 => $request->tahun,
                    'to_volume'             => $request->target,
                    'to_satuan'             => $request->satuan_realisasi_target
                    // 'deadline'              => date("Y-m-d", strtotime($request->deadline))
                ]);
            }    
            else
            {
                $matrik->where([
                    'kode'          => $request->kode,
                    'kode_subdir'   => $request->kode_subdir,
                    'bulan'         => $request->bulan,
                    'tahun'         => $request->tahun
                ])->update([
                    // 'to_volume'             => $request->target,
                    'co_volume'             => $request->realisasi,
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
                    'created_by'    => Auth::user()->akses_id,
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
            'evidence'          => 'max:2048',
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
            $evidence           = "";
            $direktorat         = $dir->where('id_dir', Auth::user()->id_dir)->first()->nama_dir;

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
}
