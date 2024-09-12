<?php

namespace App\Http\Controllers;

use App\User;
use App\Satker;
use App\Provinsi;
use App\TicketRevisi;
use App\MasterPejabat;
use App\MemberRegister;

use App\Http\Controllers\ToolsController;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LandersController extends Controller
{
    public function suratPengesahan($token)
    {
        $provinsi = new Provinsi;
        ini_set('max_execution_time', 300);
        ini_set("memory_limit","512M");
        
        $url = url()->current();

        $ticket = new TicketRevisi;
        $data   = $ticket->where('token', $token)->first();
        \QrCode::size(500)->format('png')->generate($url, './qr/qr_'.$token.'.png');

        $nama_provinsi = "Jakarta";

        if(strtolower($data->provinsi) != "undefined")
        {
            $nama_provinsi = $provinsi->where('id_prov', $data->provinsi)->first()->namaprov;
        }

        $data->nama_provinsi = $nama_provinsi;

        $pdf = Pdf::loadView('landers.surat-pengesahan', ['data' => $data, 'token' => $token]);
        
        return $pdf->download('Surat Persetujuan.pdf');

        // return view('landers.surat-pengesahan', compact('data', 'token'));
    }

    public function viewRegistrasi()
    {
        $satker         = new Satker;
        $data_satker    = $satker->get();

        return $data_satker;

        return view('auth.login', compact('data_satker'));
    }

    public function register(Request $request)
    {
        $member = new MemberRegister;
        $tools  = new ToolsController;

        try
        {

            $nama_file  = '';
            $file       = $request->file('sk');
            
            if($request->hasFile('sk'))
            {
                // $nama_file  = $file->getClientOriginalName();

                $ext        = "SK_".strtotime(date("Y-m-d H:i:s"))."." .$file->clientExtension();
                $nama_file  = $ext;

                $extn       = $file->clientExtension();
                $allow      = ['pdf', 'docx', 'doc'];

                if(!in_array($extn, $allow))
                {
                    return response()->json([
                        'status'    => 'error',
                        'message'   => "Mohon Mengupload File PDF/WORD",
                        'title'     => "File Tidak Diizinkan"
                    ]);
                }

                $file->storeAs('sk/', $nama_file);
            }
            else
            {
                return response()->json([
                    'status'    => 'error',
                    'message'   => "Mohon Mengupload File PDF/WORD Untuk SK",
                    'title'     => "File Belum Diupload"
                ]);
            }

            $bidang     = null;
            $kota       = null;
            $provinsi   = $request->provinsi;
            
            if($request->satker == "sekda" && $request->jabatan_dalam_satker == "2")
            {
                $bidang = $request->bidang;
            }

            if($request->provinsi == "kab_malinau" || $request->provinsi == "kab_pulau_morotai" || $request->provinsi == "kab_tanimbar")
            {
                switch ($request->provinsi)
                {
                    case 'kab_malinau':
                        
                        $kota       = "6502";
                        $provinsi   = "65";

                        break;

                    case 'kab_pulau_morotai':
                    
                        $kota       = "8207";
                        $provinsi   = "82";

                        break;

                    case 'kab_tanimbar':
                
                        $kota       = "8273";
                        $provinsi   = "82";

                        break;
                    
                    default:
                        $kota       = null;
                        $provinsi   = $request->provinsi;
                        break;
                }
            }

            $member->create([
                'info'                  => getInfo(),
                'sk'                    => $nama_file,
                'nip'                   => $request->nip,
                'nama'                  => $request->nama,
                'no_hp'                 => $request->no_hp,
                'email'                 => $request->email,
                'satker'                => $request->satker,
                'bidang'                => $bidang,
                'jabatan'               => $request->jabatan,
                'pangkat'               => $request->pangkat,
                'provinsi'              => $provinsi,
                'kota'                  => $kota,
                'kode_satker'           => $request->kode_satker,
                'jabatan_dalam_satker'  => $request->jabatan_dalam_satker,
            ]);

            $no_hp          = "081213833316";
            $message        = $request->nama." baru saja mendaftar pada aplikasi Emonev. Mohon segera ditindak lanjuti";
            $message_dev    = $message."\nNama File: $nama_file\nDetail: ".json_encode(getInfo());

            $wa = $tools->sendingWa($no_hp, $message_dev);

            return response()->json([
                'status'    => 'success',
                'title'     => 'Berhasil Mendaftar!',
                'message'   => 'Data Anda Berhasil Kami Simpan dan Akan Segera Ditindak Lanjut',
                'status_wa' => json_encode($wa)
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

    public function resetPassword(Request $request)
    {
        $user   = new User;
        $tools  = new ToolsController;

        $count  = $user->where('username', $request->username)->count();

        if($count == 0)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'User Tidak Terdaftar',
                'title' => 'Oopps.. Gagal Memproses Data'
            ]);
        }

        try
        {
            $data       = $user->where('username', $request->username)->first();
            $password   = randomPassword(8);

            $user->where('username', $request->username)->update([
                'password' => bcrypt($password)
            ]);

            $message     = 'Permintaan Reset Password E-Monev Bina Adwil Anda Sudah Diproses. Silakan login menggunakan informasi berikut \n\n';
            $message    .= '*Username: '.$request->username.'* \n';
            $message    .= '*Password: '.$password.'* \n';

            $tools->sendingWa($data->no_hp, $message);

            return response()->json([
                'status' => 'success',
                'message' => 'Password Berhasil Direset',
                'title' => 'Password Baru Sudah Dikirim Melalui Pesan Whatsapp'
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


    public function betaTesting()
    {
        $user       = new User;
        $pejabat    = new MasterPejabat;

        $data       = $pejabat->all();

        foreach($data as $value)
        {
            $username   = $value->nip;
            $nama       = $value->nama_pejabat;
            $email      = $value->email;
            $no_hp      = $value->no_hp;
            $prov       = "";
            $password   = "emonev_adwil_2023";

            if($value->type == "pptk")
            {
                $level      = 3;
            }
            else if($value->type == "ppk")
            {
                $level      = 2;
            }
            if($value->type == "bendahara")
            {
                $level      = 10;
            }

                $user->create([
                    'nama'      => $nama,
                    'email'     => $email,
                    'no_hp'     => $no_hp,
                    'username'  => $username,
                    'password'  => bcrypt($password),
                    'level'     => $level,
                    'id_group'  => 0,
                    'id_dir'    => $value->id_dir,
                    'id_subdir' => 0,
                    'prov'      => $prov,
                    'kab'       => ''
                ]);
        }
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

        // $data       = $satker->where('provinsi', 'like', $request->provinsi)->get();
        
        if(is_numeric($request->provinsi))
        {
            $nama_provinsi  = $prov->where('id_prov', $request->provinsi)->first()->namaprov;
            $data           = $satker->where('provinsi', 'like', $nama_provinsi)->whereNotIn('kode', ['356000', '417936', '690639'])->get();
        }
        else
        {
            switch ($request->provinsi)
            {
                case 'kab_malinau':
                    $nama_provinsi  = "KALIMANTAN UTARA";
                    $data           = $satker->where('kode', 'like', '356000')->get();
                    break;
                case 'kab_pulau_morotai':
                    $nama_provinsi  = "MALUKU UTARA";
                    $data           = $satker->where('kode', 'like', '417936')->get();
                    break;
                case 'kab_tanimbar':
                    $data           = $satker->where('kode', 'like', '690639')->get();
                    $nama_provinsi  = "MALUKU";
                    break;
                default:
                    $nama_provinsi  = $request->provinsi;
                    $data           = $satker->where('provinsi', 'like', $nama_provinsi)->whereNotIn('kode', ['356000', '417936', '690639'
                    ])->get();
                    break;
            }
        }

        $i          = 0;

        foreach ($data as $value)
        {
            $data[$i]->id   = $value->kode;
            $data[$i]->text = $value->kode." - ".$value->nama_satker;

            $i++;
        }


        return $data;
    }
}
