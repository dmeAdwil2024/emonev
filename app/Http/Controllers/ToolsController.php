<?php

namespace App\Http\Controllers;

use Zip;
use Auth;
use Mail;

use App\POK;
use App\LogWa;
use App\Usulan;
use App\Satker;
use App\Jabatan;
use App\Provinsi;
use App\LogTicket;
use App\Direktorat;
use App\Subdirektorat;
use App\TicketRevisi;
use App\MasterPejabat;
use App\PejabatDaerah;
use App\MasterDokumen;

use App\SaktiRefSts;
use App\SaktiAnggaran;
use App\SaktiRealisasi;

use GuzzleHttp\Client;

use Illuminate\Http\Request;

class ToolsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function provinsi()
    {
        $provinsi   = new Provinsi;

        $data       = $provinsi->select('*', 'id_prov as id', 'namaprov as text')->orderBy('namaprov')->get();

        return $data;
    }

    public function direktorat()
    {
        $direktorat = new Direktorat;

        $data       = $direktorat->select('*', 'id_dir as id', 'nama_dir as text')->orderBy('nama_dir')->get();

        return $data;
    }

    public function subdirektorat(Request $request)
    {
        $subdit     = new Subdirektorat;
        
        $i          = 0;
        $data       = $subdit->select('*', 'nama_subdir as text')->where('id_dir', $request->id_dir)->orderBy('nama_subdir')->get();

        // foreach ($data as $value)
        // {
        //     $id = (string) $value->id_subdir;

        //     $data[$i]->id   = $id;
        //     $i++;
        // }

        return $data;
    }

    public function pejabatPptk()
    {
        $pejabat = new MasterPejabat;

        // $data       = $pejabat->select('*', 'id', 'nama_pejabat as text')->orderBy('nama_pejabat')->where('type', 'pptk')->get();

        // if(Auth::user()->level == "2")
        // {
        //     $data       = $pejabat->select('*', 'id', 'nama_pejabat as text')->orderBy('nama_pejabat')->where('type', 'ppk')->get();
        // }
        
        $data       = $pejabat->select('*', 'id', 'nama_pejabat as text')->where('type', 'pptk')->where('id_dir', Auth::user()->id_dir)->orderBy('nama_pejabat')->get();

        return $data;
    }

    public function jabatan()
    {
        $jabatan = new Jabatan;

        $data    = $jabatan->select('*', 'nama as id', 'nama as text')->where('provinsi', Auth::user()->prov)->get();

        return $data;
    }

    public function pejabatDaerah()
    {
        $pejabat = new PejabatDaerah;

        $data    = $pejabat->select('*', 'nama_pejabat as id', 'nama_pejabat as text')->where('uid', Auth::user()->id_akses)->get();

        return $data;
    }

    public function submitPejabatDaerah(Request $request)
    {
        $pejabat = new PejabatDaerah;

        try
        {
            $pejabat->create([
                'uid'           => Auth::user()->id_akses,
                'nama_pejabat'  => $request->nama_pejabat
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

    public function submitJabatan(Request $request)
    {
        $jabatan = new Jabatan;

        try
        {
            $jabatan->create([
                'nama'      => $request->nama_jabatan,
                'provinsi'  => Auth::user()->prov
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

    public function detailPejabat(Request $request)
    {
        $pejabat = new MasterPejabat;

        $data       = $pejabat->select('*', 'id', 'nama_pejabat as text')->orderBy('nama_pejabat')->where('id', $request->id_pejabat)->first();

        return $data;
    }

    public function download(Request $request, $jenis_file, $nama_file)
    {
        $ticket          = new TicketRevisi;
        $dir             = new Direktorat;
        $data_ticket     = $ticket->where($jenis_file, $nama_file)->first();

        $nama_direktorat = $dir->where('id_dir', $data_ticket->direktorat)->first()->nama_dir;

        if(Auth::user()->level == "6")
        {
            switch ($jenis_file) {
                case 'nota_dinas_pptk':
                    $ticket->where('id', $request->id_ticket)->update(['nota_pptk_download_keu_at' => date("Y-m-d H:i:s"), 'download_keu_at' => date("Y-m-d H:i:s")]);
                    break;
                case 'nota_dinas_ppk':
                    $ticket->where('id', $request->id_ticket)->update(['nota_ppk_download_keu_at' => date("Y-m-d H:i:s"), 'download_keu_at' => date("Y-m-d H:i:s")]);
                    break;
                case 'matrik_rab':
                    $ticket->where('id', $request->id_ticket)->update(['rab_download_keu_at' => date("Y-m-d H:i:s"), 'download_keu_at' => date("Y-m-d H:i:s")]);
                    break;
                case 'kak':
                    $ticket->where('id', $request->id_ticket)->update(['kak_download_keu_at' => date("Y-m-d H:i:s"), 'download_keu_at' => date("Y-m-d H:i:s")]);
                    break;
                case 'dokumen_pendukung':
                    $ticket->where('id', $request->id_ticket)->update(['dokumen_pendukung_download_keu_at' => date("Y-m-d H:i:s"), 'download_keu_at' => date("Y-m-d H:i:s")]);
                    break;
            }
        }

        return response()->download(storage_path("app/assets/files/$nama_direktorat/$nama_file"));
    }

    public function downloadCapaian($id_dir,$jenis_file,$nama_file)
    {
		$dir = new Direktorat;
		$nama_direktorat = $dir->where('id_dir',$id_dir)->first()->nama_dir;
		$path='';
		switch ($jenis_file) {
			case "buku":$path="buku-capaian";break;
			case "evidence":$path="evidence-capaian";break;
		}
		return response()->file(storage_path("app/assets/files/$nama_direktorat/$path/$nama_file",[
		  'Content-Disposition' => 'inline; filename="'. $nama_file .'"'
		]));
    }
    public function downloadUsulan(Request $request, $jenis_file, $nama_file)
    {
        $ticket          = new Usulan;
        $dir             = new Direktorat;
        $data_ticket     = $ticket->where($jenis_file, $nama_file)->first();

        $nama_direktorat = $dir->where('id_dir', $data_ticket->direktorat)->first()->nama_dir;

        if(Auth::user()->level == "6")
        {
            switch ($jenis_file) {
                case 'nota_dinas_pptk':
                    $ticket->where('id', $request->id_ticket)->update(['nota_pptk_download_keu_at' => date("Y-m-d H:i:s"), 'download_keu_at' => date("Y-m-d H:i:s")]);
                    break;
                case 'nota_dinas_ppk':
                    $ticket->where('id', $request->id_ticket)->update(['nota_ppk_download_keu_at' => date("Y-m-d H:i:s"), 'download_keu_at' => date("Y-m-d H:i:s")]);
                    break;
                case 'matrik_rab':
                    $ticket->where('id', $request->id_ticket)->update(['rab_download_keu_at' => date("Y-m-d H:i:s"), 'download_keu_at' => date("Y-m-d H:i:s")]);
                    break;
                case 'kak':
                    $ticket->where('id', $request->id_ticket)->update(['kak_download_keu_at' => date("Y-m-d H:i:s"), 'download_keu_at' => date("Y-m-d H:i:s")]);
                    break;
                case 'dokumen_pendukung':
                    $ticket->where('id', $request->id_ticket)->update(['dokumen_pendukung_download_keu_at' => date("Y-m-d H:i:s"), 'download_keu_at' => date("Y-m-d H:i:s")]);
                    break;
            }
        }

        return response()->download(storage_path("app/assets/files/$nama_direktorat/$nama_file"));
    }

    public function downloadFile(Request $request)
    {
        $path = $request->path;
        return response()->download(storage_path($path));
    }

    public function downloadPok($pejabat, $nama_file, Request $request)
    {
        $pok = new POK;

        $pok->where('id', $request->id)->update(['bagkeu_download_at' => date("Y-m-d H:i:s")]);

        return response()->download(storage_path("app/POK/$pejabat/$nama_file"));
    }

    public function downloadDokumenPok($nama_file)
    {
        return response()->download(storage_path("app/POK/DISTRIBUSI/$nama_file"));
    }

    public function downloadKpaPok($pejabat, $nama_file, Request $request)
    {
        $pok = new POK;
        
        $data_pok   = $pok->where('id', $request->id)->first();
        
        if($data_pok->zip_pengantar === null)
        {
            $bagren     = $data_pok->file_bagren;
            $bagkeu     = $data_pok->file_bagkeu;
            
            $path_keu   = storage_path("app/POK/BAGKEU/".$bagkeu);
            $path_ren   = storage_path("app/POK/BAGREN/".$bagren);
            
            $zip_name   = 'FILE_PENGANTAR_POK_'.strtotime(date('YmdHis')).'.zip';
            $zip        = Zip::create($zip_name)->add([$path_keu, $path_ren]);
            $zip->close();

            $pok->where('id', $request->id)->update([
                'zip_pengantar'     => $zip_name,
                'kpa_download_at'   => date("Y-m-d H:i:s"),
            ]);
        }
        else
        {
            $zip_name   = $data_pok->zip_pengantar;
        }

        return response()->download(public_path($zip_name));
    }

    public function downloadMasterDokumen(Request $request, $nama_file)
    {
        $ticket     = new TicketRevisi;

        if(Auth::user()->level == "6")
        {
            $ticket->where('id', $request->id_ticket)->update(['lampiran_kabagren_download_keu_at' => date("Y-m-d H:i:s"), 'download_keu_at' => date("Y-m-d H:i:s")]);
        }

        return response()->download(storage_path("app/assets/master-dokumen/nota_pengantar_kabagren/$nama_file"));
    } 

    public function record($id_ticketing, $activity, $user)
    {
        $log = new LogTicket;

        $log->create([
            'user'          => $user,
            'activity'      => $activity,
            'id_ticketing'  => $id_ticketing
        ]);
    }

    public function sendingEmail($text, $email, $no_surat)
    {
        $subject = "E-Ticketing Emonev Adwil. Nomor Surat: ".$no_surat;
        // Create the Transport
        $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
        ->setUsername('emonev.adwil@gmail.com')
        ->setPassword('xupypzzrivhofpta')
        ;

        // Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

        // Create a message
        $message = (new \Swift_Message($subject))
        ->setFrom(['no-repyl@emonev-adwil.kemendagri.go.id' => 'Emonev Adwil'])
        ->setTo([$email => 'User Emonev Adwil'])
        ->setBody($text)
        ;

        // Send the message
        $result = $mailer->send($message);

        return $result;
    }

    public function uploadMasterDokumen(Request $request)
    {
        $dir        = new Direktorat;
        $dokumen    = new MasterDokumen;

        if($request->hasFile('nota_pengantar_kabagren'))
        {
            try
            {
                $path                       = '/download/master-dokumen/';
                $nota_pengantar_kabagren    = $this->uploadFile($request, 'nota_pengantar_kabagren', $path);
                $direktorat                 = $dir->where('id_dir', $request->direktorat)->first()->nama_dir;

                $dokumen->where('direktorat', $request->direktorat)->update(['status' => 0]);

                $dokumen->create([
                    'judul_dokumen' => 'Nota Pengantar Kabagren ('.$direktorat.')',
                    'file'          => $nota_pengantar_kabagren,
                    'path'          => $path,
                    'direktorat'    => $request->direktorat,
                    'owned_by'      => Auth::user()->level,
                    'status'        => 1,
                    'upload_by'     => Auth::user()->id_akses
                ]);

                return response()->json([

                    'status'    => 'success',
                    'title'     => 'Dokumen Berhasil Disimpan!',
                    'message'   => 'Dokumen Berhasil Disimpan!'
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
        else
        {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'File Tidak Boleh Kosong'
            ]);    
        }
    }

    public function uploadFile($request, $type, $path)
    {
        $files = $request->File($type);

        if(!empty($files))
        {
            $ext        = strtoupper($type)."_".strtotime(date("Y-m-d H:i:s"))."." .$files->clientExtension();
            $name_file  = $ext;

            $files->storeAs($path.'/', $ext);

            return $name_file;
        }
    }

    public function sendingWa($phone_no, $message, $no_surat = null, $tipe = null)
    {
        try
        {

            $model   = new LogWa;
            $message = preg_replace( "/(\n)/", "<ENTER>", $message );
            $message = preg_replace( "/(\r)/", "<ENTER>", $message );

            $phone_no = preg_replace( "/(\n)/", ",", $phone_no );
            $phone_no = preg_replace( "/(\r)/", "", $phone_no );

            $model->create([
                'tipe'      => $tipe,
                'no_hp'     => $phone_no,
                'no_surat'  => $no_surat,
                'message'   => $message
            ]);
            if($phone_no=='089524627319'||$phone_no=='089516543062'||$phone_no=='0895325780305'||$phone_no=='089680746121'){
              /*
              $data = array("phone_no" => $phone_no, "key" => env('API_KEY_NASCONDIMI'), "message" => $message);
              $data_string = json_encode($data);
              $ch = curl_init('http://116.203.92.59/api/send_message');
                  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                  curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  curl_setopt($ch, CURLOPT_VERBOSE, 0);
                  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
                  curl_setopt($ch, CURLOPT_TIMEOUT, 15);
                  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                  'Content-Type: application/json',
                  'Content-Length: ' . strlen($data_string))
              );
              return curl_exec($ch);
              */
            }
        }
        catch (\Throwable $th)
        {
            return false;
        }
        
    }

    public function sendWa(Request $request)
    {
        try
        {
            $message = $request->message;
            $message = preg_replace( "/(\n)/", "<ENTER>", $message );
            $message = preg_replace( "/(\r)/", "<ENTER>", $message );

            $phone_no = $request->phone_no;
            $phone_no = preg_replace( "/(\n)/", ",", $phone_no );
            $phone_no = preg_replace( "/(\r)/", "", $phone_no );

            $data = array("phone_no" => $phone_no, "key" => env('API_KEY_NASCONDIMI'), "message" => $message);
            $data_string = json_encode($data);
            $ch = curl_init('http://116.203.92.59/api/send_message');
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_VERBOSE, 0);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
                curl_setopt($ch, CURLOPT_TIMEOUT, 15);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
            );

            return curl_exec($ch);
        }
        catch (\Throwable $th)
        {
            return false;
        }
        
    }

    public function testing()
    {
        $client     = new Client();
        $refSts     = new SaktiRefSts;
        $anggaran   = new SaktiAnggaran;
        $realisasi  = new SaktiRealisasi;

        // $response = $client->post('https://monsakti.kemenkeu.go.id/sitp-monsakti-omspan/webservice/API/ANG/dataAng/KL010/027486/B01', [
        //     'headers' => [
        //         'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjb3UiOiIwIiwidXNyIjoiS0VNRU5URVJJQU4gREFMQU0gIE5FR0VSSSIsInVpZCI6IkRHUiIsImtkcyI6IktMMDEwIiwia2R0IjoiMjAyMyIsImtkYiI6IkFORyIsInJvbCI6IndlYnNlcnZpY2UiLCJjcmUiOjE2Nzg5NzYwNTEsImtpZCI6IkRHUiIsImFwaSI6IjUxNjcifQ.wIsS9n8pUOxBOr9nbzJMeP3rY6aNJ_ntzcJugLdyIZw'
        //     ]
        // ]);

        // $response = $client->post('https://monsakti.kemenkeu.go.id/sitp-monsakti-omspan/webservice/API/PEM/realisasi/KL010/027486', [
        //     'headers' => [
        //         'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjb3UiOjEsInVzciI6IktFTUVOVEVSSUFOIERBTEFNICBORUdFUkkiLCJ1aWQiOiJER1IiLCJrZHMiOiJLTDAxMCIsImtkdCI6IjIwMjMiLCJrZGIiOiJQRU0iLCJyb2wiOiJ3ZWJzZXJ2aWNlIiwiY3JlIjoxNjc4OTc3NDgwLCJraWQiOiJER1IiLCJhcGkiOiI1MTY3In0.czF-AyfZel1U90MmGOugF5Yt6UwAsm2l8jw2EJI-Zao'
        //     ]
        // ]);

        $response   = $client->post('https://monsakti.kemenkeu.go.id/sitp-monsakti-omspan/webservice/resetToken/PEM/realisasi/KL010', [
            'http_errors' => false,
            'headers' => [
                'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjb3UiOjEsInVzciI6IktFTUVOVEVSSUFOIERBTEFNICBORUdFUkkiLCJ1aWQiOiJER1IiLCJrZHMiOiJLTDAxMCIsImtkdCI6IjIwMjMiLCJrZGIiOiJQRU0iLCJyb2wiOiJ3ZWJzZXJ2aWNlIiwiY3JlIjoxNjc4OTc3NDgwLCJraWQiOiJER1IiLCJhcGkiOiI1MTY3In0.czF-AyfZel1U90MmGOugF5Yt6UwAsm2l8jw2EJI-Zao'
            ]
        ]);

        // $anggaran->truncate();
        // $realisasi->truncate();
        $data=json_decode($response->getBody());

        return $data;

        foreach ($data[1] as $value)
        {
            $kdsatker           = $value->KDSATKER;
            $kode_kementerian   = $value->KODE_KEMENTERIAN;
            $kd_jns_spp         = $value->KD_JNS_SPP;
            $no_spp             = $value->NO_SPP;
            $tgl_spp            = $value->TGL_SPP;
            $no_spm             = $value->NO_SPM;
            $tgl_spm            = $value->TGL_SPM;
            $no_sp2d            = $value->TGL_SP2D;
            $tgl_sp2d           = $value->TGL_SP2D;
            $no_sp2b            = $value->TGL_SP2B;
            $tgl_sp2b           = $value->TGL_SP2B;
            $uraian             = $value->URAIAN;
            $kode_coa           = $value->KODE_COA;
            $kode_program       = $value->KODE_PROGRAM;
            $kode_kegiatan      = $value->KODE_KEGIATAN;
            $kode_output        = $value->KODE_OUTPUT;
            $kode_suboutput     = $value->KODE_SUBOUTPUT;
            $kode_komponen      = $value->KODE_KOMPONEN;
            $kode_subkomponen   = $value->KODE_SUBKOMPONEN;
            $kode_akun          = $value->KODE_AKUN;
            $kode_item          = $value->KODE_ITEM;
            $mata_uang          = $value->MATA_UANG;
            $kurs               = $value->KURS;
            $nilai_valas        = $value->NILAI_VALAS;
            $nilai_rupiah       = $value->NILAI_RUPIAH;

            $realisasi->create([
                'kdsatker'      => $kdsatker,
                'kode_kementerian'  => $kode_kementerian,
                'kd_jns_spp'    => $kd_jns_spp,
                'no_spp'    => $no_spp,
                'tgl_spp'   => $tgl_spp,
                'no_spm'    => $no_spm,
                'tgl_spm'   => $tgl_spm,
                'no_sp2d'   => $no_sp2d,
                'tgl_sp2d'  => $tgl_sp2d,
                'no_sp2b'   => $no_sp2b,
                'tgl_sp2b'  => $tgl_sp2b,
                'uraian'    => $uraian,
                'kode_coa'  => $kode_coa,
                'kode_program'  => $kode_program,
                'kode_kegiatan' => $kode_kegiatan,
                'kode_output'   => $kode_output,
                'kode_suboutput'    => $kode_suboutput,
                'kode_komponen' => $kode_komponen,
                'kode_subkomponen'  => $kode_subkomponen,
                'kode_akun' => $kode_akun,
                'kode_item' => $kode_item,
                'mata_uang' => $mata_uang,
                'kurs'  => $kurs,
                'nilai_valas'   => $nilai_valas,
                'nilai_rupiah'  => $nilai_rupiah,
            ]);
        }

        // foreach($data[1] as $value)
        // {
        //     $kdsatker           = $value->KDSATKER;
        //     $kode_program       = $value->KODE_PROGRAM;
        //     $kode_kegiatan      = $value->KODE_KEGIATAN;
        //     $kode_output        = $value->KODE_OUTPUT;
        //     $kdib               = $value->KDIB;
        //     $volume_output      = $value->VOLUME_OUTPUT;
        //     $kode_komponen      = $value->KODE_KOMPONEN;
        //     $kode_subkomponen   = $value->KODE_SUBKOMPONEN;
        //     $uraian_subkomponen = $value->URAIAN_SUBKOMPONEN;
        //     $kode_akun          = $value->KODE_AKUN;
        //     $kode_jenis_beban   = $value->KODE_JENIS_BEBAN;
        //     $kode_cara_tarik    = $value->KODE_CARA_TARIK;
        //     $kode_jenis_bantuan = $value->KODE_JENIS_BANTUAN;
        //     $kode_register      = $value->KODE_REGISTER;
        //     $header1            = $value->HEADER1;
        //     $header2            = $value->HEADER2;
        //     $kode_item          = $value->KODE_ITEM;
        //     $nomor_item         = $value->NOMOR_ITEM;
        //     $cons_item          = $value->CONS_ITEM;
        //     $uraian_item        = $value->URAIAN_ITEM;
        //     $sumber_dana        = $value->SUMBER_DANA;
        //     $vol_keg_1          = $value->VOL_KEG_1;
        //     $sat_keg_1          = $value->SAT_KEG_1;
        //     $vol_keg_2          = $value->VOL_KEG_2;
        //     $sat_keg_2          = $value->SAT_KEG_2;
        //     $vol_keg_3          = $value->VOL_KEG_3;
        //     $sat_keg_3          = $value->SAT_KEG_3;
        //     $vol_keg_4          = $value->VOL_KEG_4;
        //     $sat_keg_4          = $value->SAT_KEG_4;
        //     $volkeg             = $value->VOLKEG;
        //     $satkeg             = $value->SATKEG;
        //     $hargasat           = $value->HARGASAT;
        //     $total              = $value->TOTAL;
        //     $kode_blokir        = $value->KODE_BLOKIR;
        //     $nilai_blokir       = $value->NILAI_BLOKIR;
        //     $kode_sts_history   = $value->KODE_STS_HISTORY;
        //     $pok_nilai_1        = $value->POK_NILAI_1;
        //     $pok_nilai_2        = $value->POK_NILAI_2;
        //     $pok_nilai_3        = $value->POK_NILAI_3;
        //     $pok_nilai_4        = $value->POK_NILAI_4;
        //     $pok_nilai_5        = $value->POK_NILAI_5;
        //     $pok_nilai_6        = $value->POK_NILAI_6;
        //     $pok_nilai_7        = $value->POK_NILAI_7;
        //     $pok_nilai_8        = $value->POK_NILAI_8;
        //     $pok_nilai_9        = $value->POK_NILAI_9;
        //     $pok_nilai_10       = $value->POK_NILAI_10;
        //     $pok_nilai_11       = $value->POK_NILAI_11;
        //     $pok_nilai_12       = $value->POK_NILAI_12;
        //     $urutan_header1     = $value->HEADER1;
        //     $urutan_header2     = $value->HEADER2;

        //     $anggaran->create([
        //         'kdsatker'  => $kdsatker,
        //         'kode_program'  => $kode_program,
        //         'kode_kegiatan' => $kode_kegiatan,
        //         'kode_output'   => $kode_output,
        //         'kdib'  => $kdib,
        //         'volume_output' => $volume_output,
        //         'kode_komponen' => $kode_komponen,
        //         'kode_subkomponen'  => $kode_subkomponen,
        //         'uraian_subkomponen'    => $uraian_subkomponen,
        //         'kode_akun' => $kode_akun,
        //         'kode_jenis_beban'  => $kode_jenis_beban,
        //         'kode_cara_tarik'   => $kode_cara_tarik,
        //         'kode_jenis_bantuan'    => $kode_jenis_bantuan,
        //         'kode_register' => $kode_register,
        //         'header1'   => $header1,
        //         'header2'   => $header2,
        //         'kode_item' => $kode_item,
        //         'nomor_item'    => $nomor_item,
        //         'cons_item' => $cons_item,
        //         'uraian_item'   => $uraian_item,
        //         'sumber_dana'   => $sumber_dana,
        //         'vol_keg_1' => $vol_keg_1,
        //         'sat_keg_1' => $sat_keg_1,
        //         'vol_keg_2' => $vol_keg_2,
        //         'sat_keg_2' => $sat_keg_2,
        //         'vol_keg_3' => $vol_keg_3,
        //         'sat_keg_3' => $sat_keg_3,
        //         'vol_keg_4' => $vol_keg_4,
        //         'sat_keg_4' => $sat_keg_4,
        //         'volkeg'    => $volkeg,
        //         'satkeg'    => $satkeg,
        //         'hargasat'  => $hargasat,
        //         'total' => $total,
        //         'kode_blokir'   => $kode_blokir,
        //         'nilai_blokir'  => $nilai_blokir,
        //         'kode_sts_history'  => $kode_sts_history,
        //         'pok_nilai_1'   => $pok_nilai_1,
        //         'pok_nilai_2'   => $pok_nilai_2,
        //         'pok_nilai_3'   => $pok_nilai_3,
        //         'pok_nilai_4'   => $pok_nilai_4,
        //         'pok_nilai_5'   => $pok_nilai_5,
        //         'pok_nilai_6'   => $pok_nilai_6,
        //         'pok_nilai_7'   => $pok_nilai_7,
        //         'pok_nilai_8'   => $pok_nilai_8,
        //         'pok_nilai_9'   => $pok_nilai_9,
        //         'pok_nilai_10'  => $pok_nilai_10,
        //         'pok_nilai_11'  => $pok_nilai_11,
        //         'pok_nilai_12'  => $pok_nilai_12,
        //         'urutan_header1'    => $urutan_header1,
        //         'urutan_header2'    => $urutan_header2
        //     ]);
        // }
    }

    public function satker(Request $request)
    {
        $satker = new Satker;
        $prov   = new Provinsi;

        // if(is_numeric(Auth::user()->prov))
        // {
        //     $provinsi   = $prov->where('id_prov', Auth::user()->prov)->first()->namaprov;
        //     $data       = $satker->where('provinsi', 'like', $provinsi)->get();
        // }
        // else
        // {
        //     $provinsi   = $prov->where('id_prov', Auth::user()->prov)->first()->namaprov;
        //     $data       = $satker->where('provinsi', 'like', $provinsi)->get();
        // }

        $data       = $satker->where('provinsi', 'like', $request->provinsi)->get();

        return $data;
    }
}
