<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\POK;
use App\User;
use App\LogPok;
use App\Direktorat;
use App\TicketRevisi;
use Illuminate\Http\Request;
use App\Http\Controllers\ToolsController;
use App\Http\Controllers\TicketingController;

class PokController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $modul      = 'POK';
        $current    = "Penerbitan POK";

        return view('contents.pok.index', compact('current', 'modul'));
    }

    public function jumlahRevisiByDirektorat(Request $request)
    {
        $direktorat = new Direktorat;
        $revisi     = new TicketRevisi;

        $i      = 0;
        $bulan  = $request->bulan;
        $data   = $direktorat->where('id_dir', '>', 0)->orderBy('nama_dir')->get();

        foreach ($data as $value)
        {
            $data[$i]->jumlah_revisi = $revisi->whereYear('created_at', date("Y", strtotime($bulan)))->whereMonth('created_at', date("m", strtotime($bulan)))->where(['direktorat' => $value->id_dir, 'provinsi' => 'undefined', 'distribusi_pok' => 1])->count();
            $i++;
        }

        return $data;
    }

    public function dataPok(Request $request)
    {
        $pok    = new POK;

        $i      = 0;

        $data   = $pok->get();

        if(Auth::user()->level == "1")
        {
            $data   = $pok->where('status_bagkeu', 'disetujui')->get();
        }

        foreach ($data as $value)
        {
            $data[$i]->status_bagren  = $value->status_bagren;
            $data[$i]->status_keuangan  = $value->status_bagkeu;
            $data[$i]->status_kpa  = $value->status_kpa;            
            // $data[$i]->status_distribusi = '<span class="bg-success text-uppercase p-2">'.date("d/m/Y H:i", strtotime($value->distribusi_pok_at)).'</span>';
            $data[$i]->status_distribusi = '';

            if($value->distribusi_pok_at != NULL)
            {
                $data[$i]->status_distribusi = '<span class="bg-success text-uppercase p-2">'.date("d/m/Y H:i", strtotime($value->distribusi_pok_at)).'</span>';
            }

            if(strtolower($value->status_bagren) != "perbaikan")
            {
                $data[$i]->status_bagren = '<span class="bg-success text-uppercase p-2">'.date("d/m/Y H:i", strtotime($value->created_at)).'</span>';
            }
            else
            {
                $data[$i]->status_bagren = '<span class="bg-danger text-uppercase p-2"> Butuh Perbaikan </a>';

                if(Auth::user()->level == 5)
                {
                    $data[$i]->status_bagren = '<a onclick="formUpdatePokBagren(\''.$value->id.'\')" class="btn btn-danger"> Butuh Perbaikan <br> <small>Klik Untuk Upload</small> </a>';
                }
            }

            if(strtolower($value->status_bagkeu) == "disetujui")
            {
                $data[$i]->status_keuangan = '<span class="bg-success text-uppercase p-2">'.date("d/m/Y H:i", strtotime($value->bagkeu_at)).'</span>';
            }

            if(strtolower($value->status_kpa) == "disetujui")
            {
                $data[$i]->status_kpa = '<span class="bg-success text-uppercase p-2">'.date("d/m/Y H:i", strtotime($value->kpa_at)).'</span>';
            }

            if(Auth::user()->level == "6")
            {
                if($value->status_bagkeu === NULL || strtolower($value->status_bagren) == "new")
                {
                    $data[$i]->status_keuangan  = '<a onclick="showFormBagkeu(\''.$value->id.'\')" href="'.route('download.dokumen-pok', ['pejabat' => 'BAGREN', 'nama_file' => $value->file_bagren]).'?id='.$value->id.'" class="btn btn-primary"> <i class="fas fa-download"></i> <br> Download</a>';
                }
                
                if($value->distribusi_pok_at === null)
                {
                    if($value->file_kpa != NULL)
                    {
                        $data[$i]->status_distribusi  = '<a onclick="showFormDistribusiPok(\''.$value->id.'\')" href="'.route('download.dokumen-pok', ['pejabat' => 'KPA', 'nama_file' => $value->file_kpa]).'?id='.$value->id.'" class="btn btn-primary"> <i class="fas fa-download"></i> <br> Download</a>';
                    }
                }
            }
            else if(Auth::user()->level == "1")
            {
                if($value->status_kpa === NULL)
                {
                    $data[$i]->status_kpa  = '<a onclick="showFormKpa(\''.$value->id.'\')" href="'.route('download.dokumen-kpa-pok', ['pejabat' => 'BAGREN', 'nama_file' => $value->file_bagren]).'?id='.$value->id.'" class="btn btn-primary"> <i class="fas fa-download"></i> <br> Download</a>';
                }              
            }

            $data[$i]->file_bagren = '<a href="javascript:void(0)" onclick="loadHistory(\''.$value->id.'\')"> '.$value->file_bagren.' </a>';

            $i++;
        }

        return $data;
    }

    public function dataRevisi(Request $request)
    {
        $revisi = new TicketRevisi;

        try
        {
            $i      = 0;
            $data   = $revisi->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')->where('created_by', Auth::user()->id_akses)->orderBy('id', 'DESC')->get();

            if(Auth::user()->level == "5")
            {
                $data = $revisi->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')->where('status_verifikasi', 'disetujui')->orderBy('id', 'DESC')->get();
            }
            else if(Auth::user()->level == "2")
            {
                $data = $revisi->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')->where('status_kabagkeu', 'disetujui')->orderBy('id', 'DESC')->get();
            }
            else if(Auth::user()->level == "6")
            {
                $data = $revisi->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')->where('status_kabagren', 'disetujui')->orderBy('id', 'DESC')->get();
            }

            foreach($data as $value)
            {
                if($value->status == "approved" || strtolower($value->status) == "disetujui")
                {
                    $data[$i]->status_style = '<span class="bg-success p-2">SELESAI DIPROSES</span>';
                }
                else if($value->status == "BUTUH PERBAIKAN")
                {
                    $data[$i]->status_style = '<span class="bg-danger p-2">BUTUH PERBAIKAN</span>';
                }
                else if($value->status == "new")
                {
                    $data[$i]->status_style = '<span class="bg-info p-2">PENGAJUAN BARU</span>';
                }
                else
                {
                    $data[$i]->status_style = '<span class="bg-warning p-2">'.strtoupper($value->status).'</span>';
                }

                $data[$i]->tahap1           = '<span class="bg-warning text-uppercase p-2">Belum Diproses</span>';
                $data[$i]->tahap2           = '<span class="bg-warning text-uppercase p-2">Belum Diproses</span>';
                $data[$i]->tahap3           = '<span class="bg-warning text-uppercase p-2">Belum Diproses</span>';
                $data[$i]->tahap_status     = '<span class="bg-warning text-uppercase p-2">Belum Diproses</span>';
                                
                if($value->status_kabagren == "disetujui")
                {
                    $data[$i]->tahap1           = '<span class="bg-success text-uppercase p-2">'.date("d/m/Y H:i", strtotime($value->kabagren_at)).'</span>';
                }

                if($value->status_kabagkeu == "disetujui")
                {
                    $data[$i]->tahap2 = '<span class="bg-success text-uppercase p-2">'.date("d/m/Y H:i", strtotime($value->kabagkeu_at)).'</span>';
                }

                if($value->status_kpa == "disetujui")
                {
                    $data[$i]->tahap3    = '<span class="bg-success text-uppercase p-2">'.date("d/m/Y H:i", strtotime($value->kpa_at)).'</span>';
                }

                if(Auth::user()->level == "5")
                {
                    $data[$i]->keterangan_revisi     = '<a href="javascript:void(0)" onclick="openFormProses('.$value->id.', \'kabagren\')">'.$value->nomor_surat.'<br> <small>'.$value->perihal.'</small>'.'</a>';
                }
                else if(Auth::user()->level == "6")
                {
                    $keterangan_revisi  = '<a href="javascript:void(0)" onclick="openFormProses('.$value->id.', \'kabagkeu\')">'.$value->nomor_surat.'<br> <small>'.$value->perihal.'</small>'.'</a>';

                    // if($value->download_keu_at === NULL)
                    // {
                    //     $tahap2 .= '<br>';
                    //     $tahap2 .= '<span class="mt-5 bg-danger text-uppercase p-2">Belum Download</span>';
                    // }
                    // else
                    // {
                    //     $tahap2 .= '<br>';
                    //     $tahap2 .= '<span class="mt-5 bg-success text-uppercase p-2">'.date("d/m/Y H:i", strtotime($value->download_keu_at)).'</span>';
                    // }

                    $data[$i]->keterangan_revisi    = $keterangan_revisi;
                }
                else if(Auth::user()->level == "2")
                {
                    $keterangan_revisi  = '<a href="javascript:void(0)" onclick="openFormProses('.$value->id.', \'kpa\')">'.$value->nomor_surat.'<br> <small>'.$value->perihal.'</small>'.'</a>';

                    $data[$i]->keterangan_revisi    = $keterangan_revisi;
                }

                // $data[$i]->tahap2   = $tahap2;

                $i++;
            }

            return $data;
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
    
    

    public function submitBagren(Request $request)
    {
        $pok    = new POK;
        $tools  = new ToolsController;
        
        try
        {
            $nama_file  = '';
            $file       = $request->file('nota_kabagren');
            
            if($request->hasFile('nota_kabagren'))
            {
                $nama_file  = $file->getClientOriginalName();

                $file->storeAs('POK/BAGREN/', $nama_file);
            }

            $data = $pok->create([
                'file_bagren_old'   => [],
                'file_bagkeu_old'   => [],
                'file_kpa_old'      => [],
                'catatan_bagkeu'    => [],
                'catatan_kpa'       => [],
                'distribusi_pok'    => [],
                'file_bagren'       => $nama_file,
                'status_bagren'     => "NEW",
                'bagren_by'         => Auth::user()->id_akses,
                'bagren_at'         => date("Y-m-d H:i:s")
            ]);

            $this->record($data->id, "Submit Nota Pengantar Penerbitan POK. Meneruskan ke Bagian Keuangan", Auth::user()->id_akses);
            
            $message_keuangan   = Auth::user()->nama." Telah Submit Nota Pengantar Penerbitan POK pada: ".date("d/m/Y H:i").". Mohon Segera Ditindak Lanjut";

            $tools->sendingWa(Auth::user()->no_hp, $message_keuangan);

            $message_bang_arief = "Ijin Bang Arief, ".Auth::user()->nama." (Bagren) telah submit nota pengantar penerbitan POK";
            $tools->sendingWa("081213833316", $message_bang_arief, "UNSET", "POK");

            return response()->json([
                'status'    => 'success',
                'title'     => 'Status Pengajuan Berhasil Diubah',
                'message'   => 'Status Pengajuan Berhasil Diubah'
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

    public function updateBagren(Request $request)
    {
        $pok    = new POK;
        $tools  = new ToolsController;
        
        $file = $request->file('nota_kabagren');
 
        try
        {
            $data_old   = $pok->where('id', $request->id)->first();
            
            if($request->hasFile('nota_kabagren'))
            {
                $file_bagren_old     = $data_old->file_bagren;
                $arr_file_bagren_old = $data_old->file_bagren_old;

                if(!in_array("TIDAK ADA DOKUMEN LAMA", $arr_file_bagren_old))
                {
                    array_push($arr_file_bagren_old, $file_bagren_old);
                }
                else
                {
                    $arr_file_bagren_old = [$file_bagren_old];
                }

                $nama_file  = $file->getClientOriginalName();

                $file->storeAs('POK/BAGREN/', $nama_file);

                $pok->where('id', $request->id)->update([
                    'file_bagren_old'   => $arr_file_bagren_old
                ]);
            }

            $pok->where('id', $request->id)->update([
                'file_bagren'   => $nama_file,
                'status_bagren' => "NEW",
                'bagren_by'     => Auth::user()->id_akses,
                'bagren_at'     => date("Y-m-d H:i:s")
            ]);

            $this->record($request->id, "Update Nota Pengantar Penerbitan POK. Meneruskan ke Bagian Keuangan", Auth::user()->id_akses);
            
            $message_keuangan   = Auth::user()->nama." Telah Mengupdate Nota Pengantar Penerbitan POK pada: ".date("d/m/Y H:i").". Mohon Segera Ditindak Lanjut";

            $tools->sendingWa(Auth::user()->no_hp, $message_keuangan);

            $message_bang_arief = "Ijin Bang Arief, ".Auth::user()->nama." (Bagren) telah update nota pengantar penerbitan POK";
            $tools->sendingWa("081213833316", $message_bang_arief, "UNSET", "POK");

            return response()->json([
                'status'    => 'success',
                'title'     => 'Status Pengajuan Berhasil Diubah',
                'message'   => 'Status Pengajuan Berhasil Diubah'
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

    public function submitBagkeu(Request $request)
    {
        $pok    = new POK;
        $tools  = new ToolsController;
        
        $file = $request->file('nota_kabagkeu');
        $nama_file = "";
 
        try
        {
            $data_old   = $pok->where('id', $request->id)->first();
            
            if($request->hasFile('nota_kabagkeu'))
            {
                $file_bagkeu_old     = $data_old->file_bagkeu;
                $arr_file_bagkeu_old = $data_old->file_bagkeu_old;

                if(!in_array("TIDAK ADA DOKUMEN LAMA", $arr_file_bagkeu_old))
                {
                    array_push($arr_file_bagkeu_old, $file_bagkeu_old);
                }
                else
                {
                    $arr_file_bagkeu_old = [$file_bagkeu_old];
                }

                $nama_file  = $file->getClientOriginalName();

                $file->storeAs('POK/BAGKEU/', $nama_file);

                $pok->where('id', $request->id)->update([
                    'file_bagkeu_old'   => $arr_file_bagkeu_old
                ]);
            }

            $catatan    = [];

            if($request->has('catatan') && !empty($request->catatan))
            {
                $catatan    = [];
                $notes      = explode('|',$request->catatan);

                foreach($notes as $note)
                {
                    if(!empty($note))
                    {
                        $catatan[] = $note;
                    }
                }
            }

            if($request->status == "disetujui")
            {
                $pok->where('id', $request->id)->update([
                    'file_bagkeu'       => $nama_file,
                    'status_bagkeu'     => $request->status,
                    'bagkeu_by'         => Auth::user()->id_akses,
                    'bagkeu_at'         => date("Y-m-d H:i:s"),
                    'catatan_bagkeu'    => $catatan
                ]);

                $this->record($request->id, "Submit Nota Pengantar Penerbitan POK. Meneruskan ke Bagian KPA", Auth::user()->id_akses);
            
                $message_kpa   = Auth::user()->nama." Telah Submit Nota Pengantar Penerbitan POK pada: ".date("d/m/Y H:i").". Mohon Segera Ditindak Lanjut";

                $tools->sendingWa(Auth::user()->no_hp, $message_kpa);

                $message_bang_arief = "Ijin Bang Arief, ".Auth::user()->nama." (Keuangan) telah submit nota pengantar penerbitan POK";
                $tools->sendingWa("081213833316", $message_bang_arief, "UNSET", "POK");
            }
            else
            {
                $pok->where('id', $request->id)->update([
                    'file_bagkeu'       => $nama_file,
                    'status_bagkeu'     => NULL,
                    'status_bagren'     => "perbaikan",
                    'bagkeu_by'         => Auth::user()->id_akses,
                    'bagkeu_at'         => date("Y-m-d H:i:s"),
                    'catatan_bagkeu'    => $catatan
                ]);

                $this->record($request->id, "Telah Menolak Berkas dari Bagian Perencanaan pada: ".date("d/m/Y H:i").". Dokumen dikembalikan ke Bagian Perencanaan. Mohon segera diperbaiki sesuai catatan Bagian Keuangan", Auth::user()->id_akses);
            
                $message_bagren   = Auth::user()->nama." Telah Menolak Berkas dari Bagian Perencanaan pada: ".date("d/m/Y H:i").". Dokumen dikembalikan ke Bagian Perencanaan. Mohon segera diperbaiki sesuai catatan Bagian Keuangan";

                $message_bang_arief = "Ijin Bang Arief, ".Auth::user()->nama." (Keuangan) telah menolak nota pengantar penerbitan POK";
                $tools->sendingWa("081213833316", $message_bang_arief, "UNSET", "POK");

                $tools->sendingWa(Auth::user()->no_hp, $message_bagren);
            }
            

            return response()->json([
                'status'    => 'success',
                'title'     => 'Status Pengajuan Berhasil Diubah',
                'message'   => 'Status Pengajuan Berhasil Diubah'
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

    public function submitKpa(Request $request)
    {
        $pok    = new POK;
        $tools  = new ToolsController;
        
        $file = $request->file('nota_kpa');
        $nama_file = "";
 
        try
        {
            $data_old   = $pok->where('id', $request->id)->first();
            
            if($request->hasFile('nota_kpa'))
            {
                $file_kpa_old     = $data_old->file_kpa;
                $arr_file_kpa_old = $data_old->file_kpa_old;

                if(!in_array("TIDAK ADA DOKUMEN LAMA", $arr_file_kpa_old))
                {
                    array_push($arr_file_kpa_old, $file_kpa_old);
                }
                else
                {
                    $arr_file_kpa_old = [$file_kpa_old];
                }

                $nama_file  = $file->getClientOriginalName();

                $file->storeAs('POK/KPA/', $nama_file);

                $pok->where('id', $request->id)->update([
                    'file_kpa_old'   => $arr_file_kpa_old
                ]);
            }

            $catatan    = [];

            if($request->has('catatan') && !empty($request->catatan))
            {
                $catatan    = [];
                $notes      = explode('|',$request->catatan);

                foreach($notes as $note)
                {
                    if(!empty($note))
                    {
                        $catatan[] = $note;
                    }
                }
            }

            if($request->status == "disetujui")
            {
                $pok->where('id', $request->id)->update([
                    'file_kpa'       => $nama_file,
                    'status_kpa'     => $request->status,
                    'kpa_by'         => Auth::user()->id_akses,
                    'kpa_at'         => date("Y-m-d H:i:s"),
                    'catatan_kpa'    => $catatan
                ]);

                $this->record($request->id, "Mengesahkan Penerbitan POK", Auth::user()->id_akses);
            
                $message_bagren   = "Penerbitan POK sudah disahkan oleh KPA pada: ".date("d/m/Y H:i").". Silakan Dilaksanakan Dengan Penuh Keikhlasan";

                $tools->sendingWa(Auth::user()->no_hp, $message_bagren);

                $message_bang_arief = "Ijin Bang Arief, ".Auth::user()->nama." (KPA) telah submit nota pengantar penerbitan POK";
                $tools->sendingWa("081213833316", $message_bang_arief, "UNSET", "POK");
            }
            else
            {
                $pok->where('id', $request->id)->update([
                    'file_kpa'       => $nama_file,
                    'status_kpa'     => NULL,
                    'status_bagkeu'     => NULL,
                    // 'status_bagren'     => "perbaikan",
                    'kpa_by'         => Auth::user()->id_akses,
                    'kpa_at'         => date("Y-m-d H:i:s"),
                    'catatan_kpa'    => $catatan
                ]);

                $this->record($request->id, "Telah Menolak Berkas dari Bagian Perencanaan pada: ".date("d/m/Y H:i").". Dokumen dikembalikan ke Bagian Perencanaan. Mohon segera diperbaiki sesuai catatan KPA", Auth::user()->id_akses);
            
                $message_bagren   = Auth::user()->nama." Telah Menolak Berkas dari Bagian Perencanaan pada: ".date("d/m/Y H:i").". Dokumen dikembalikan ke Bagian Perencanaan. Mohon segera diperbaiki sesuai catatan KPA";

                $tools->sendingWa(Auth::user()->no_hp, $message_bagren);

                $message_bang_arief = "Ijin Bang Arief, ".Auth::user()->nama." (KPA) telah menolak nota pengantar penerbitan POK";
                $tools->sendingWa("081213833316", $message_bang_arief, "UNSET", "POK");
            }
            

            return response()->json([
                'status'    => 'success',
                'title'     => 'Status Pengajuan Berhasil Diubah',
                'message'   => 'Status Pengajuan Berhasil Diubah'
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

    public function record($id_pok, $activity, $user)
    {
        $log = new LogPok;

        $log->create([
            'userid'    => $user,
            'activity'  => $activity,
            'id_pok'       => $id_pok
        ]);
    }

    public function submitKabagren(Request $request)
    {
        $revisi = new TicketRevisi;
        $tools = new ToolsController;
        $ticketing = new TicketingController;

        try
        {
            $revisi->where(['id' => $request->id])->update([
                'status_kabagren'   => 'disetujui',
                'lampiran_kabagren' => $request->nota_kabagren,
                'kabagren_by'       => Auth::user()->id_akses,
                'kabagren_at'       => date("Y-m-d H:i:s"),
                'status'            => 'Selesai Diproses Kabagren'
            ]);

            $nomor_surat = $revisi->where('id', $request->id)->first()->nomor_surat;
            $ticketing->record($request->id, "Memproses Revisi E-Ticketing. Meneruskan ke Bagian Keuangan", Auth::user()->id_akses);
            
            $message_pptk   = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: ".$nomor_surat." Sudah Diproses oleh Kepala Bagian Perencanaan dan Akan Diteruskan ke Bagian Keuangan untuk Penerbitan POK";

            $message_keuangan   = "Revisi E-Ticketing baru dengan Nomor Surat: ".$nomor_surat." selesai diproses oleh Kabagren dan diteruskan ke Bagian Keuangan. Mohon segera ditindak lanjut";

            $tools->sendingWa(Auth::user()->no_hp, $message_pptk);
            $tools->sendingWa(Auth::user()->no_hp, $message_keuangan);

            return response()->json([
                'status'    => 'success',
                'title'     => 'Status Pengajuan Berhasil Diubah',
                'message'   => 'Status Pengajuan Berhasil Diubah'
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

    public function submitKabagKeu(Request $request)
    {
        $ticketing = new TicketingController;
        $catatan    = [];

        if($request->has('catatan') && !empty($request->catatan))
        {
            $catatan    = [];
            $notes      = explode('|',$request->catatan);

            foreach($notes as $note)
            {
                if(!empty($note))
                {
                    $catatan[] = $note;
                }
            }
        }

        try
        {
            $dir            = new Direktorat;
            $revisi         = new TicketRevisi;
            $tools          = new ToolsController;
            $ticketing      = new TicketingController;

            $lampiran_kabagkeu = "Tidak Ada File";
            $nomor_surat = $revisi->where('id', $request->id)->first()->nomor_surat;

            if($request->hasFile('lampiran_kabagkeu'))
            {
                $direktorat         = $dir->where('id_dir', $revisi->where('id', $request->id)->first()->direktorat)->first()->nama_dir;
                $lampiran_kabagkeu     = $ticketing->uploadFile($request, 'lampiran_kabagkeu', $direktorat);
            }

            if($request->status == "disetujui")
            {
                $revisi->where('id', $request->id)->update([
                    'catatan_kabagkeu'      => $catatan,
                    'status'                => "Selesai Diproses Kabagkeu",
                    'status_kabagkeu'       => $request->status,
                    'kabagkeu_at'           => date("Y-m-d H:i:s"),
                    'lampiran_kabagkeu'     => $lampiran_kabagkeu,
                    'kabagkeu_by'           => Auth::user()->id_akses
                ]);

                $message_pptk   = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: ".$nomor_surat." Sudah Diproses oleh Bagian Keuangan dan Akan Diteruskan ke KPA untuk Penerbitan POK";

                $message_kpa   = "Revisi E-Ticketing baru dengan Nomor Surat: ".$nomor_surat." selesai diproses oleh Bagian Keuangan dan diteruskan ke KPA. Mohon segera ditindak lanjut";

                $tools->sendingWa(Auth::user()->no_hp, $message_kpa);
                $tools->sendingWa(Auth::user()->no_hp, $message_pptk);
            }
            else
            {
                $revisi->where('id', $request->id)->update([
                    'catatan_kabagkeu'      => $catatan,
                    'status'                => "Ditolak Kabagkeu. Kembali ke Kabagren",
                    'status_kabagkeu'       => NULL,
                    'status_kabagren'       => NULL,
                    'kabagkeu_at'           => date("Y-m-d H:i:s"),
                    'lampiran_kabagkeu'     => $lampiran_kabagkeu,
                    'kabagkeu_by'           => Auth::user()->id_akses
                ]);

                $message_kabagren   = "Pengajuan Revisi E-Ticketing dengan Nomor Surat: ".$nomor_surat." *DITOLAK* oleh Bagian Keuangan. Segera lakukan perbaikan sesuai catatan dari Bagian Keuangan";

                $tools->sendingWa(Auth::user()->no_hp, $message_kabagren);
            }

            $catatan_simpan = "<ol>";

            foreach ($catatan as $value)
            {
                $catatan_simpan .= '<li>'.$value.'</li>';
            }

            $catatan_simpan .= "</ol>";

            $ticketing->record($request->id, "Memverifikasi Revisi E-Ticketing. Catatan: ".$catatan_simpan, Auth::user()->id_akses);

            return response()->json([
                'status'    => 'success',
                'title'     => 'Status Pengajuan Berhasil Diubah',
                'message'   => 'Status Pengajuan Berhasil Diubah'
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

    public function submitKpaOld(Request $request)
    {
        $ticketing = new TicketingController;
        $catatan    = [];

        if($request->has('catatan') && !empty($request->catatan))
        {
            $catatan    = [];
            $notes      = explode('|',$request->catatan);

            foreach($notes as $note)
            {
                if(!empty($note))
                {
                    $catatan[] = $note;
                }
            }
        }

        try
        {
            $dir            = new Direktorat;
            $revisi         = new TicketRevisi;
            $tools          = new ToolsController;
            $ticketing      = new TicketingController;
            $nomor_surat = $revisi->where('id', $request->id)->first()->nomor_surat;

            $lampiran_kpa = "Tidak Ada File";

            if($request->hasFile('lampiran_kpa'))
            {
                $direktorat     = $dir->where('id_dir', $revisi->where('id', $request->id)->first()->direktorat)->first()->nama_dir;
                $lampiran_kpa   = $ticketing->uploadFile($request, 'lampiran_kpa', $direktorat);
            }

            if($request->status == "disetujui")
            {
                $revisi->where('id', $request->id)->update([
                    'catatan_kpa'   => $catatan,
                    'status'        => "Disetujui",
                    'status_kpa'    => $request->status,
                    'kpa_at'        => date("Y-m-d H:i:s"),
                    'lampiran_kpa'  => $lampiran_kpa,
                    'kpa_by'        => Auth::user()->id_akses
                ]);

                $message_pptk   = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: ".$nomor_surat." Sudah Diproses oleh Bagian KPA. Silakan Dilaksanakan Dengan Penuh Keikhlasan";
                
                $tools->sendingWa(Auth::user()->no_hp, $message_pptk);
            }
            else
            {
                $revisi->where('id', $request->id)->update([
                    'catatan_kpa'       => $catatan,
                    'status'            => "Ditolak kpa. Kembali ke Kabagren",
                    'status_kpa'        => NULL,
                    'status_kabagkeu'   => NULL,
                    'status_kabagren'   => NULL,
                    'kpa_at'            => date("Y-m-d H:i:s"),
                    'lampiran_kpa'      => $lampiran_kpa,
                    'kpa_by'            => Auth::user()->id_akses
                ]);

                $message_kabagren   = "Pengajuan Revisi E-Ticketing dengan Nomor Surat: ".$nomor_surat." *DITOLAK* oleh KPA. Segera lakukan perbaikan sesuai catatan dari KPA";

                $tools->sendingWa(Auth::user()->no_hp, $message_kabagren);
            }

            $catatan_simpan = "<ol>";

            foreach ($catatan as $value)
            {
                $catatan_simpan .= '<li>'.$value.'</li>';
            }

            $catatan_simpan .= "</ol>";

            $ticketing->record($request->id, "Memverifikasi Revisi E-Ticketing. Catatan: ".$catatan_simpan, Auth::user()->id_akses);

            return response()->json([
                'status'    => 'success',
                'title'     => 'Status Pengajuan Berhasil Diubah',
                'message'   => 'Status Pengajuan Berhasil Diubah'
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

    public function distribusiPok(Request $request)
    {
        $pok        = new POK;
        $users      = new User;
        $direktorat = new Direktorat;
        $ticketing  = new TicketRevisi;
        $tools      = new ToolsController;
        
        try
        {
            $data_direktorat = $direktorat->where('id_dir', '>', 0)->get();
            $dokumen_pok     = [];

            foreach($data_direktorat as $dir)
            {
                $file = $request->File("dokumen_".$dir->id_dir);

                if(!empty($file))
                {
                    $no_hp      = $users->where('id_dir', $dir->id_dir)->where('prov', '=', '')->first()->no_hp;
                    $nama_file  = "POK_".$dir->id_dir."_".strtotime(date("Y-m-d H:i:s"))."." .$file->clientExtension();

                    $link       = env("APP_URL")."/download/pok/".$nama_file;
                    $message    = "Bagian Keuangan Telah Mengupload Dokumen POK. Silakan Kunjungi ".$link." untuk Download Dokumen";

                    $file->storeAs('POK/DISTRIBUSI/', $nama_file);
                    $dokumen_pok[] = ['id_dir' => $dir->id_dir, 'file' => $nama_file, 'no_hp' => $no_hp, 'message' => $message];

                    $tools->sendingWa($no_hp, $message);

                    $message_bang_arief = "Ijin Bang Arief, POK telah terbit. Bisa download melalui link berikut: ".$link;
                    $tools->sendingWa("081213833316", $message_bang_arief, "UNSET", "POK");

                }
            }
            
            $pok->where('id', $request->id)->update([
                'distribusi_pok'     => $dokumen_pok,
                'distribusi_pok_at' => date("Y-m-d H:i:s")
            ]);

            $ticketing->where([
                'distribusi_pok' => 0
            ])->update(['distribusi_pok' => 1]);

            $activity = "Distribusi Dokumen POK";
            $this->record($request->id, $activity, Auth::user()->id);

            return response()->json([
                'status' => 'success',
                'message' => "POK Berhasil Didistribusikan",
                'title' => 'Proses Berhasil'
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

    public function loadHistory(Request $request)
    {
        $pok    = new POK;
        $log    = new LogPok;

        $data_pok   = $pok->where('id', $request->id)->first();

        $data   = $log
                ->select('*', 'tb_log_pok.created_at as log_time')
                ->leftJoin('tb_akses', 'tb_log_pok.userid', '=', 'tb_akses.id_akses')
                ->where('id_pok', $request->id)->orderBy('tb_log_pok.created_at', 'DESC')->get();

        $return = '<div class="timeline timeline-inverse">';

        if($data_pok->distribusi_pok != NULL && !empty($data_pok->distribusi_pok))
        {
            $link = "";
            foreach ($data_pok->distribusi_pok as $value)
            {
                if(Auth::user()->id_dir == $value['id_dir'])
                {
                    $link   = env("APP_URL")."/download/pok/".$value['file'];
                }
            }

            $file   = $value['file'];
            
            $return .= '<div>
                <i class="fas fa-file bg-info"></i>

                <div class="timeline-item">
                    <span class="time">'.date("d/m/Y H:i", strtotime($data_pok->updated_at)).'</span>

                    <h3 class="timeline-header"><a href="#">Link Download POK Aktif</a> </h3>

                    <div class="timeline-body">
                        Silakan klik link berikut untuk download POK: <a href="'.env('APP_URL').'/download/pok/'.$file.'">'.$link.'</a>
                    </div>
                </div>
            </div>';
        }

        foreach ($data as $value)
        {
            $return .= '<div>
                <i class="fas fa-file bg-info"></i>

                <div class="timeline-item">
                    <span class="time">'.date("d/m/Y H:i", strtotime($value->log_time)).'</span>

                    <h3 class="timeline-header"><a href="#">'.$value->nama.'</a> </h3>

                    <div class="timeline-body">
                        '.$value->activity.'
                    </div>
                </div>
            </div>';
        }

        $return .= '<div>
                        <i class="far fa-clock bg-gray"></i>
                    </div>
                </div>';

        return $return;
    }
}
