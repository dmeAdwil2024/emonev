<?php

namespace App\Http\Controllers;

use Auth;
use Validator;

use App\User;
use App\Kota;
use App\Satker;
use App\Provinsi;
use App\LevelUser;
use App\MemberRegister;
use Illuminate\Http\Request;
use App\Http\Controllers\ToolsController;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewUsers()
    {
        $modul      = 'Master';
        $type       = 'data_users';
        $current    = 'Data Pengguna';

        return view('contents.master.index', compact('current', 'modul', 'type'));
    }

    public function viewRequestUsers()
    {
        $modul      = 'Master';
        $type       = 'request_user';
        $current    = "Pengajuan Pengguna";

        return view('contents.master.index', compact('current', 'modul', 'type'));
    }

    public function profile()
    {
        $satker         = new Satker;
        $provinsi       = new Provinsi;

        $modul          = "User";
        $current        = "Profile";
        $data_satker    = $satker->get();

        if(is_numeric(Auth::user()->prov))
        {
            $nama_provinsi  = $provinsi->where('id_prov', Auth::user()->prov)->first()->namaprov;
            $data_satker    = $satker->where('provinsi', $nama_provinsi)->get();
        }

        return view('profile', compact('current', 'modul', 'data_satker'));

    }

    public function update(Request $request)
    {
        $user   = new User;
        
        try
        {
            if($request->has('username'))
            {
                $user->where('id_akses', Auth::user()->id_akses)->update([
                    'username'  => $request->username,
                    'nama'      => $request->nama,
                    'email'     => $request->email,
                    'no_hp'     => $request->no_hp
                ]);
            }
            else
            {
                $user->where('id_akses', Auth::user()->id_akses)->update([
                    'nama'      => $request->nama,
                    'email'     => $request->email,
                    'no_hp'     => $request->no_hp,
                    'kdsatker'  => $request->kdsatker
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Profile User Berhasil Diubah',
                'title' => 'Proses Berhasil'
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

    public function dataUsers()
    {
        $i      = 0;
        $no     = 1;
        $user   = new User;
        $kota   = new Kota;
        $prov   = new Provinsi;
        $level  = new LevelUser;

        $data   = $user->where('status', 1)->get();
        
        foreach($data as $value)
        {
            $username                   = '<a class="font-weight-bolder" href="javascript:void(0)" onclick="hideUser(\''.$value->id_akses.'\')">'.$value->username.'</a>';

            $data[$i]->no               = '<a href="javascript:void(0)" onclick="hideUser(\''.$value->id_akses.'\')">'.$no.".</a>";
            $data[$i]->nama_provinsi    = "Pusat";
            $data[$i]->username         = $username;

            if(is_numeric($value->prov))
            {
                $data[$i]->nama_provinsi    = $prov->where('id_prov', $value->prov)->first()->namaprov;

                if(is_numeric($value->kab))
                {
                    $data[$i]->nama_provinsi    = $kota->where('id_kab', $value->kab)->first()->namakab;
                }
            }

            $data[$i]->level            = $level->where('id', $value->level)->first()->nama;
            $data[$i]->button           = '<div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="javascript:void(0)" onclick="openFormUpdateUser('.$value->id_akses.')">Ubah User</a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="resetPassword(\''.$value->id_akses.'\')">Update Password</a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="hideUser('.$value->id_akses.')">Hapus User</a>
                </div>
            </div>
            ';

            $i++;
            $no++;
        }

        return $data;
    }

    public function detailUser(Request $request)
    {
        $user   = new User;
        $data   = $user->where('id_akses', $request->id)->first();
        
        return $data;
    }

    public function detailRequest(Request $request)
    {
        $user   = new MemberRegister;
        $data   = $user->where('id', $request->id)->first();

        return $data;
    }

    public function dataRequestUsers(Request $request)
    {
        $kota   = new Kota;
        $prov   = new Provinsi;
        $level  = new LevelUser;
        $user   = new MemberRegister;

        $i      = 0;
        $no     = 1;
        $data   = $user;

        if($request->status != 'all')
        {
            if($request->status == 'pending')
            {
                $data = $data->whereNull('status');
            }
            else
            {
                $data = $data->where('status', $request->status);
            }
        }
        
        if($request->satker != 'all')
        {
            $data   = $data->where('satker', 'like', $request->satker);
        }

        $data   = $data->get();

        foreach($data as $value)
        {
            $data[$i]->no               = $no.".";
            $data[$i]->nama_provinsi    = "Pusat";
            $data[$i]->nama_format      = '<a href="javascript:void(0)" onclick="rejectForm('.$value->id.')">'.$value->nama.'</a>';

            if(is_numeric($value->provinsi))
            {
                $data[$i]->nama_provinsi    = $prov->where('id_prov', $value->provinsi)->first()->namaprov;
            }

            if(is_numeric($value->kota))
            {
                $data[$i]->nama_provinsi    = $kota->where('id_kab', $value->kota)->first()->namakab;
            }

            $data[$i]->download_sk      = '<a href='.route('download.all-files').'?path='.'app/sk/'.$value->sk.'> <i class="fas fa-file"></i> </a>';
            $data[$i]->level            = $level->where('id', $value->jabatan_dalam_satker)->first()->nama;
            $data[$i]->button           = '<div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="javascript:void(0)" onclick="rejectForm('.$value->id.')">Tolak Pengajuan</a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="updateStatus('.$value->id.', \'accept\')">Terima Pengajuan</a>
                </div>
            </div>';

            if($value->status != NULL)
            {
                $data[$i]->button           = "";
                $data[$i]->nama_format      = $value->nama;
            }

            if($value->satker == "sekda")
            {
                $data[$i]->satker           = "SETDA";
            }
            else if($value->satker == "dpuprpkp")
            {
                $data[$i]->satker           = "Dinas Pekerjaan Umum, Penataan Ruang, Perumahan dan Kawasan Permukiman";
            }

            $i++;
            $no++;
        }

        return $data;
    }

    public function prosesUser(Request $request)
    {
        $user   = new User;
        $member = new MemberRegister;
        $tools  = new ToolsController;

        try
        {
            $data_member    = $member->where('id', $request->id)->first();

            if($request->status == "accept")
            {
                $username       = $data_member->nip;
                $nama           = $data_member->nama;
                $kab            = $data_member->kota;
                $email          = $data_member->email;
                $no_hp          = $data_member->no_hp;
                $prov           = $data_member->provinsi;
                $kode_satker    = $data_member->kode_satker;
                $password       = randomPassword(8);
                $level          = $data_member->jabatan_dalam_satker;

                $user->create([
                    'nama'      => $nama,
                    'email'     => $email,
                    'no_hp'     => $no_hp,
                    'username'  => $username,
                    'password'  => bcrypt($password),
                    'level'     => $level,
                    'id_group'  => 0,
                    'id_dir'    => 0,
                    'id_subdir' => 0,
                    'prov'      => $prov,
                    'kdsatker'  => $kode_satker,
                    'kab'       => $kab
                ]);

                $message     = 'Permintaan User E-Monev Bina Adwil Anda Sudah Diproses. Silakan login menggunakan informasi berikut \n\n';
                $message    .= '*Username: '.$username.'* \n';
                $message    .= '*Password: '.$password.'* \n';

                $tools->sendingWa($no_hp, $message);
            }

            $member->where('id', $request->id)->update([
                'status'    => $request->status
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'User Berhasil Diverifikasi',
                'title' => 'User Akan Menerima User & Password Melalui Whatsapp'
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

    public function changePassword(Request $request)
    {
        $user = new User;

        $data = $user->where('id_akses', $request->id_akses)->first();

        try
        {
            if($request->password == "SUSPEND")
            {
                $user->where('id_akses', $request->id_akses)->update([
                    'password' => "SUSPEND"
                ]);
            }
            else
            {
                $user->where('id_akses', $request->id_akses)->update([
                    'password' => bcrypt($request->password)
                ]);
            }

            return response()->json([
                'status'    => 'success',
                'message'   => 'Update Password Berhasil',
                'title'     => 'Proses Sukses'
            ]);
        }
        catch (\Throwable $th)
        {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
                'title' => 'Oopps.. Gagal Memproses Data'
            ]);    
        }
    }

    public function hideUser(Request $request)
    {
        $user = new User;

        try
        {
            $user->where('id_akses', $request->id)->update([
                'status' => 0
            ]);

            return response()->json([
                'status'    => 'success',
                'message'   => 'User Berhasil Dihapus',
                'title'     => 'Proses Sukses'
            ]);
        }
        catch (\Throwable $th)
        {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
                'title' => 'Oopps.. Gagal Memproses Data'
            ]);    
        }
    }
}
