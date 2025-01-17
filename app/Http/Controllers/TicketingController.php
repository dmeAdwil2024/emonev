<?php

namespace App\Http\Controllers;

use App\Satker;
use Auth;
use Validator;

use App\User;
use App\Usulan;
use App\Provinsi;
use App\LogTicket;
use App\Direktorat;
use App\TicketRevisi;
use App\MasterPejabat;
use App\MasterDokumen;
use App\TicketStatus;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\ToolsController;
use Illuminate\Support\Facades\View;

class TicketingController extends Controller
{
    var $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $u = new User;
            $this->user = $u->getDetail(Auth()->user()->id_akses);

            View::share('user', $this->user);
            return $next($request);
        });
    }

    public function viewRevisiPusat()
    {
        $type       = "pusat";
        $modul      = 'E-Ticketing';
        $current    = "Pengajuan Revisi Pusat";

        return view('contents.e-ticketing.index', compact('current', 'modul', 'type'));
    }

    public function viewGgwpDaerah()
    {
        $type       = "daerah";
        $kegiatan   = "gwpp";
        $modul      = 'E-Ticketing';
        $current    = "Kegiatan GWPP";

        return view('contents.e-ticketing.index', compact('current', 'modul', 'type', 'kegiatan'));
    }

    /**
     * 1 - Halaman Utama Revisi GWPP Daerah
     */
    public function viewGwppDaerah()
    {
        $type     = "Daerah";
        $kegiatan = "GWPP";
        $modul    = "E-Ticketing";
        $current  = "Revisi Kegiatan Daerah";
        $provinsi = (new Provinsi())->getById($this->user->prov);

        $opsi = TicketStatus::OPSI;
        $label = TicketStatus::LABEL;

        $months     = ['Semua', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $isPPK = $this->user->level == \App\UserAccess::LEVEL_PPK;

        return view('contents.e-ticketing.index-new', compact('current', 'modul', 'type', 'kegiatan', 'provinsi', 'opsi', 'label', 'months', 'isPPK'));
    }

    /**
     * 2.A - Halaman Pengajuan baru
     */
    public function viewTicketBaru($tahun, $provinsi, $satker)
    {
        $type     = "Daerah";
        $kegiatan = "GWPP";
        $modul    = "E-Ticketing";
        $current  = "Formulir Pengajuan Baru";

        $aProv    = explode('-', $provinsi);
        $id_prov  = $aProv[0];
        $namaprov = $aProv[1];

        $aSatker  = explode('-', $satker);
        $kode_satker = $aSatker[0];
        $nama_satker = $aSatker[1];

        $isPPK = $this->user->level == \App\UserAccess::LEVEL_PPK;

        return view('contents.e-ticketing.daerah.form-baru', compact('current', 'modul', 'type', 'kegiatan', 'tahun', 'id_prov', 'namaprov', 'kode_satker', 'nama_satker', 'isPPK'));
    }

    /**
     * 2.B - Simpan Pengajuan baru
     */
    public function submitTicketBaru(Request $request)
    {
        $user       = new User;
        $dir        = new Direktorat;
        $revisi     = new TicketRevisi;
        $pejabat    = new MasterPejabat;
        $tools      = new ToolsController;

        $validation = [
            'tahun_anggaran'    => 'required|integer',
            'nomor_surat'       => 'required',
            'tanggal_surat'     => 'required|date',
            'satker'            => 'required',
            'kode_satker'       => 'required',
            'nama_satker'       => 'required',
            'provinsi'          => 'required',
            'direktorat'        => 'required',
            'jenis_revisi'      => 'required',
            'perihal'           => 'required',
            'judul_kak'         => 'required',
            'nota_dinas_ppk'    => 'max:10240|required',
            'matrik_rab'        => 'max:10240|required',
            'dokumen_pendukung' => 'max:10240|required',
        ];

        $message    = [
            'required'  => ':attribute tidak boleh kosong',
            'integer'   => ':attribute tidak valid',
            'date'      => ':attribute tidak valid',
            'max'       => ':attribute Ukuran Maksimal 10 MB'
        ];

        $names      = [
            'tahun_anggaran'    => 'Tahun Anggaran',
            'nomor_surat'       => 'Nomor Surat',
            'tanggal_surat'     => 'Tanggal Surat',
            'satker'            => 'Satuan Kerja',
            'kode_satker'       => 'Kode Satuan Kerja',
            'nama_satker'       => 'Nama Satuan Kerja',
            'provinsi'          => 'Provinsi',
            'direktorat'        => 'Unit Kerja',
            'jenis_revisi'      => 'Jenis Revisi',
            'perihal'           => 'Perihal',
            'judul_kak'         => 'Judul KAK',
            'nota_dinas_ppk'    => 'Nota Dinas PPK',
            'matrik_rab'        => 'Matrik RAB',
            'dokumen_pendukung' => 'Dokumen Pendukung',
        ];

        $validator = Validator::make($request->all(), $validation, $message, $names);

        if ($validator->fails()) {
            return response()->json([
                'status'    => 'error',
                'title'     => 'Validasi Error',
                'message'   => $validator->errors()->all()
            ]);
        }

        try {
            $matrik_rab         = "Tidak Ada File";
            $nota_dinas_ppk     = "Tidak Ada File";
            $dokumen_pendukung  = "Tidak Ada File";

            $direktorat         = $dir->where('id_dir', $request->direktorat)->first()->nama_dir;

            if ($request->hasFile('nota_dinas_ppk')) {
                $nota_dinas_ppk = $this->uploadFileFormatted($request, 'nota_dinas_ppk', $direktorat);
            }

            if ($request->hasFile('matrik_rab')) {
                $matrik_rab     = $this->uploadFileFormatted($request, 'matrik_rab', $direktorat);
            }

            if ($request->hasFile('dokumen_pendukung')) {
                $dokumen_pendukung = $this->uploadFileFormatted($request, 'dokumen_pendukung', $direktorat);
            }

            $current_status = TicketStatus::BARU;

            $id_ticketing = $revisi->create([
                'token'             => md5($request->nomor_surat . strtotime(date("ymdhis"))) . random_int(100000, 99999999),
                'key'               => random_int(100000, 999999),
                'tahun_anggaran'    => $request->tahun_anggaran,
                'nomor_surat'       => $request->nomor_surat,
                'tanggal_surat'     => $request->tanggal_surat,
                'satker'            => $request->satker,
                'kode_satker'       => $request->kode_satker,
                'nama_satker'       => $request->nama_satker,
                'provinsi'          => $request->provinsi,
                'direktorat'        => $request->direktorat,
                'jenis_revisi'      => $request->jenis_revisi,
                'perihal'           => $request->perihal,
                'judul_kak'         => $request->judul_kak,
                'nota_dinas_ppk'    => $nota_dinas_ppk,
                'matrik_rab'        => $matrik_rab,
                'dokumen_pendukung' => $dokumen_pendukung,
                'nota_dinas_pptk_old'   => ["BELUM ADA DOKUMEN LAMA"],
                'nota_dinas_ppk_old'    => ["BELUM ADA DOKUMEN LAMA"],
                'matrik_rab_old'        => ["BELUM ADA DOKUMEN LAMA"],
                'kak_old'               => ["BELUM ADA DOKUMEN LAMA"],
                'dokumen_pendukung_old' => ["BELUM ADA DOKUMEN LAMA"],
                'keterangan'        => $request->keterangan,
                'status'            => $current_status,
                'current_status'    => $current_status,
                'type'              => $request->type,
                'created_by'        => Auth::user()->id_akses
            ]);


            if ($id_ticketing) {
                DB::table('tb_ticket_stats')->insert([
                    'ticket_id'  => $id_ticketing->id,
                    'status'     => $current_status,
                    'created_at' => date('Y-m-d'),
                    'created_by' => Auth::user()->id_akses,
                ]);
            }

            /**
             * change $sendMail value to true to test email notification,
             * please make sure to set your own email for testing
             * !! DO NOT spam other user email for testing !!
             */
            $sendEmail      = false;

            $data_pejabat   = $pejabat->where('id_dir', Auth::user()->id_dir)->first();
            $email_pejabat  = isset($data_pejabat->email) ? $data_pejabat->email : '';

            $text = Auth::user()->nama . " telah mengajukan revisi baru. Mohon segera ditindak lanjut";

            if (!empty($email_pejabat) && $sendEmail) {
                $tools->sendingEmail($text, $email_pejabat, $request->nomor_surat);
            }

            $this->record($id_ticketing->id, TicketStatus::ACTIVITY[$current_status], Auth::user()->id_akses, $nota_dinas_ppk, $matrik_rab, $dokumen_pendukung);


            if ($request->provinsi == "undefined") {
                $message_pptk   = "Pengajuan Revisi E-Ticketing Anda Berhasil Dikirim. Nomor Surat: " . $request->nomor_surat;
                $message_ppk    = Auth::user()->nama . " telah mengajukan revisi E-Ticketing baru dengan Nomor Surat: " . $request->nomor_surat . ". Mohon segera ditindak lanjut";

                $no_hp_ppk = $user->where([
                    'id_dir'    => Auth::user()->id_dir,
                    'level'     => 2,
                    //'prov'      => $request->provinsi
                    'prov'      => ''
                ])->first()->no_hp;

                $tools->sendingWa($no_hp_ppk, $message_ppk, $request->nomor_surat, "Ticketing Revisi");
                $tools->sendingWa(Auth::user()->no_hp, $message_pptk, $request->nomor_surat, "Ticketing Revisi");
            } else {
                $message_ppk    = "Pengajuan Revisi E-Ticketing Anda Berhasil Dikirim. Nomor Surat: " . $request->nomor_surat;
                $message_bagren = Auth::user()->nama . " telah mengajukan revisi E-Ticketing daerah baru dengan Nomor Surat: " . $request->nomor_surat . ". Mohon segera ditindak lanjut";

                $tools->sendingWa(Auth::user()->no_hp, $message_ppk, $request->nomor_surat, "Ticketing Revisi");
                $tools->sendingWa(Auth::user()->no_hp, $message_bagren, $request->nomor_surat, "Ticketing Revisi");
            }

            $message_bang_arief = "Ijin Bang Arief, " . Auth::user()->nama . " telah mengajukan Ticketing Revisi Pusat baru dengan Nomor Surat: " . $request->nomor_surat;
            $tools->sendingWa("081213833316", $message_bang_arief, $request->nomor_surat, "Tickting Revisi");

            return response()->json([
                'status'    => 'success',
                'title'     => 'Tiket Revisi Berhasil Dibuat',
                'message'   => 'Pengajuan Revisi Akan Segera Diproses'
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Submit. Please Try Again'
            ]);
        }
    }

    /**
     * 3 - List Revisi E-Ticketing Daerah
     */
    public function viewListGwppDaerah($tahun, $bulan, $provinsi, $satker, $status)
    {
        $type       = "Daerah";
        $kegiatan   = "GWPP";
        $modul      = "E-Ticketing";
        $current    = $status;

        $aProv    = explode('-', $provinsi);
        $id_prov  = isset($aProv[0]) ? $aProv[0] : null;
        $namaprov = isset($aProv[1]) ? $aProv[1] : 'SEMUA PROVINSI';

        $aSatker  = explode('-', $satker);
        $kode_satker = isset($aSatker[0]) ? $aSatker[0] : '';
        $nama_satker = isset($aSatker[1]) ? $aSatker[1] : 'SEMUA SATUAN KERJA';

        $t = new TicketRevisi;
        $list = $t->getListBy($status, $tahun, $bulan, $id_prov, $satker);

        $isPPK = $this->user->level == \App\UserAccess::LEVEL_PPK;
        $isKPA = $this->user->level == \App\UserAccess::LEVEL_KPA;
        $level = Auth()->user()->level;

        return view('contents.e-ticketing.daerah.daftar-revisi', compact('current', 'modul', 'type', 'kegiatan', 'list', 'id_prov', 'namaprov', 'kode_satker', 'nama_satker', 'isPPK', 'isKPA', 'level'));
    }

    /**
     * 4.A - Halaman Revisi KPA
     */
    public function viewRevisiKpa($id = null)
    {
        if ($this->user->level != \App\UserAccess::LEVEL_KPA) {
            return redirect('ticketing/revisi-gwpp');
        }

        $type     = "Daerah";
        $kegiatan = "GWPP";
        $modul    = "E-Ticketing";
        $current  = "Formulir Tindak Lanjut Revisi oleh KPA";

        $t = new TicketRevisi;
        $data = $t->find($id);

        $l = new LogTicket;
        $filelog = $l->getFileLogs($id);
        $log = $l->getLogs($id);

        return view('contents.e-ticketing.daerah.form-revisi-kpa', compact('current', 'modul', 'type', 'kegiatan', 'data', 'log', 'filelog'));
    }

    /**
     * 4.B - Simpan Revisi KPA (disetujui / dikembalikan untuk perbaikan)
     */

    public function submitRevisiKpa(Request $request)
    {
        try {
            $user         = new User;
            $dir          = new Direktorat;
            $revisi       = new TicketRevisi;
            $tools        = new ToolsController;
            $lampiran_kpa = "Tidak Ada File";

            $dataRevisi = $revisi->where('id', $request->id)->first();

            $validation = [];

            $message = [
                'required' => ':attribute tidak boleh kosong',
                'max'      => ':attribute Ukuran Maksimal 10 MB'
            ];

            $names = [
                'no_nota_kpa'  => 'Nomer Nota Dinas',
                'lampiran_kpa' => 'Nota Dinas KPA',
                'catatan_kpa'  => 'Catatan',
            ];

            if ($request->status_kpa === TicketStatus::DISETUJUI_KPA) {
                $validation = [
                    'no_nota_kpa'  => 'required',
                    'lampiran_kpa' => 'max:10240|required',
                ];

                if (! empty($dataRevisi->lampiran_kpa)) {
                    unset($validation['lampiran_kpa']);
                }
            } else {
                $validation = [
                    'catatan_kpa' => 'required',
                ];
            }

            $validator = Validator::make($request->all(), $validation, $message, $names);

            if ($validator->fails()) {
                return response()->json([
                    'status'    => 'error',
                    'title'     => 'Validasi Error',
                    'message'   => $validator->errors()->all()
                ]);
            }

            $nomor_surat = $dataRevisi->nomor_surat;

            if ($request->hasFile('lampiran_kpa')) {
                $direktorat   = $dir->where('id_dir', $dataRevisi->direktorat)->first()->nama_dir;
                $lampiran_kpa = $this->uploadFile($request, 'lampiran_kpa', $direktorat);
            }

            $revisi->where('id', $request->id)->update([
                'catatan_kpa'    => [$request->catatan_kpa],
                'lampiran_kpa'   => $lampiran_kpa,
                'status_kpa'     => $request->status_kpa,
                'no_nota_kpa'    => $request->no_nota_kpa,
                'status'         => $request->status_kpa,
                'current_status' => $request->status_kpa,
                'kpa_at'         => date("Y-m-d H:i:s"),
                'kpa_by'         => Auth::user()->id_akses
            ]);

            if ($request->status_kpa === TicketStatus::DISETUJUI_KPA) {
                $no_hp_bagren = $user->where('prov_handle', 'like', '%' . $dataRevisi->provinsi . '%')->where([
                    'level'     => 5
                ])->first()->no_hp;

                $message_ppk        = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: " . $nomor_surat . " Disetujui Oleh KPA";
                $message_bagren     = "Pengajuan Revisi E-Ticketing dengan Nomor Surat: " . $nomor_surat . " Disetujui Oleh KPA dan diteruskan ke Bagren. Silakan diproses";

                $tools->sendingWa(Auth::user()->no_hp, $message_ppk, $nomor_surat, "Tickting Revisi");
                $tools->sendingWa($no_hp_bagren, $message_bagren, $nomor_surat, "Tickting Revisi");
            } else {
                $message_ppk   = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: " . $nomor_surat . " *DITOLAK* oleh KPA. Mohon segera diperbaiki sesuai catatan dari Fasgub";

                $tools->sendingWa(Auth::user()->no_hp, $message_ppk, $nomor_surat, "Tickting Revisi");
            }

            $this->record($request->id, TicketStatus::ACTIVITY[$request->status_kpa], Auth::user()->id_akses);

            return response()->json([
                'status'  => 'success',
                'title'   => 'Status Revisi E-Ticketing Berhasil Diubah',
                'message' => 'Status Revisi E-Ticketing Berhasil Diubah'
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage(),
                'title'   => 'Oopps.. Error Processing. Please Try Again'
            ]);
        }
    }

    /**
     * 5.A - Halaman Perbaikan oleh PPK
     */
    public function viewRevisiPpk($id = null)
    {
        $isPPK = $this->user->level == \App\UserAccess::LEVEL_PPK;

        if (! $isPPK) {
            return redirect('ticketing/revisi-gwpp');
        }

        $t = new TicketRevisi;
        $p = new Provinsi;
        $l = new LogTicket;

        $data = $t->find($id);
        $prov = $p->find($data->provinsi);

        $id_prov  = $data->provinsi;
        $namaprov = isset($prov->namaprov) ? $prov->namaprov : 'SEMUA';

        $satker      = $data->satker;
        $kode_satker = $data->kode_satker;
        $nama_satker = $data->nama_satker;
        $tahun       = $data->tahun_anggaran;

        $totalRevisi = $l->where([
            'id_ticketing' => $data->id,
            'user'         => Auth()->user()->id_akses,
        ])
            ->whereIn('activity', [TicketStatus::ACTIVITY[TicketStatus::BARU], TicketStatus::ACTIVITY[TicketStatus::PERBAIKAN_FIX]])
            ->count();

        if ($totalRevisi > 2) {
            return redirect('ticketing/baru/' . $tahun . '/' . $id_prov . '-' . $namaprov . '/' . $satker);
        }

        $type     = "Daerah";
        $kegiatan = "GWPP";
        $modul    = "E-Ticketing";
        $current  = "Formulir Perbaikan ke-" . $totalRevisi;

        return view('contents.e-ticketing.daerah.form-edit', compact('current', 'modul', 'type', 'kegiatan', 'tahun', 'id_prov', 'namaprov', 'kode_satker', 'nama_satker', 'isPPK', 'data'));
    }

    /**
     * 5.B - Simpan update revisi oleh PPK
     * Dikirim kembali ke KPAs
     */
    public function submitRevisiPpk(Request $request)
    {
        $user       = new User;
        $dir        = new Direktorat;
        $revisi     = new TicketRevisi;
        $pejabat    = new MasterPejabat;
        $tools      = new ToolsController;

        $dataRevisi = $revisi->find($request->id);

        $validation = [
            'nomor_surat'       => 'required',
            'tanggal_surat'     => 'required|date',
            'jenis_revisi'      => 'required',
            'perihal'           => 'required',
            'judul_kak'         => 'required',
            'nota_dinas_ppk'    => 'max:10240|required',
            'matrik_rab'        => 'max:10240|required',
            'dokumen_pendukung' => 'max:10240|required',
        ];

        if (! empty($dataRevisi->nota_dinas_ppk)) {
            unset($validation['nota_dinas_ppk']);
        }

        if (! empty($dataRevisi->matrik_rab)) {
            unset($validation['matrik_rab']);
        }

        if (! empty($dataRevisi->dokumen_pendukung)) {
            unset($validation['dokumen_pendukung']);
        }

        $message    = [
            'required'  => ':attribute tidak boleh kosong',
            'integer'   => ':attribute tidak valid',
            'date'      => ':attribute tidak valid',
            'max'       => ':attribute Ukuran Maksimal 10 MB'
        ];

        $names      = [
            'nomor_surat'       => 'Nomor Surat',
            'tanggal_surat'     => 'Tanggal Surat',
            'jenis_revisi'      => 'Jenis Revisi',
            'perihal'           => 'Perihal',
            'judul_kak'         => 'Judul KAK',
            'nota_dinas_ppk'    => 'Nota Dinas PPK',
            'matrik_rab'        => 'Matrik RAB',
            'dokumen_pendukung' => 'Dokumen Pendukung',
        ];

        $validator = Validator::make($request->all(), $validation, $message, $names);

        if ($validator->fails()) {
            return response()->json([
                'status'    => 'error',
                'title'     => 'Validasi Error',
                'message'   => $validator->errors()->all()
            ]);
        }

        try {
            $hasNodinBaru = false;
            $hasRabBaru   = false;
            $hasDokBaru   = false;

            $matrik_rab         = "Tidak Ada File";
            $nota_dinas_ppk     = "Tidak Ada File";
            $dokumen_pendukung  = "Tidak Ada File";

            $direktorat         = $dir->where('id_dir', $request->direktorat)->first()->nama_dir;

            if ($request->hasFile('nota_dinas_ppk')) {
                $hasNodinBaru   = true;
                $nota_dinas_ppk = $this->uploadFileFormatted($request, 'nota_dinas_ppk', $direktorat);
            }

            if ($request->hasFile('matrik_rab')) {
                $hasRabBaru = true;
                $matrik_rab = $this->uploadFileFormatted($request, 'matrik_rab', $direktorat);
            }

            if ($request->hasFile('dokumen_pendukung')) {
                $hasDokBaru        = true;
                $dokumen_pendukung = $this->uploadFileFormatted($request, 'dokumen_pendukung', $direktorat);
            }

            $current_status = TicketStatus::PERBAIKAN;

            $fixRevisi = [
                'nomor_surat'       => $request->nomor_surat,
                'tanggal_surat'     => $request->tanggal_surat,
                'direktorat'        => $request->direktorat,
                'jenis_revisi'      => $request->jenis_revisi,
                'perihal'           => $request->perihal,
                'judul_kak'         => $request->judul_kak,
                'nota_dinas_ppk'    => $nota_dinas_ppk,
                'matrik_rab'        => $matrik_rab,
                'dokumen_pendukung' => $dokumen_pendukung,
                'nota_dinas_pptk_old'   => [$dataRevisi->nota_dinas_pptk],
                'nota_dinas_ppk_old'    => [$dataRevisi->nota_dinas_ppk],
                'matrik_rab_old'        => [$dataRevisi->matrik_rab],
                'kak_old'               => [$dataRevisi->kak],
                'dokumen_pendukung_old' => [$dataRevisi->dokumen_pendukung],
                'keterangan'        => $request->keterangan,
                'status'            => TicketStatus::PERBAIKAN_FIX,
                'current_status'    => $current_status,
                'type'              => $request->type,
                'created_by'        => Auth::user()->id_akses
            ];

            if (! $hasNodinBaru) {
                unset($fixRevisi['nota_dinas_ppk']);
                unset($fixRevisi['nota_dinas_ppk_old']);
            }

            if (! $hasRabBaru) {
                unset($fixRevisi['matrik_rab']);
                unset($fixRevisi['matrik_rab_old']);
            }
            if (! $hasDokBaru) {
                unset($fixRevisi['dokumen_pendukung']);
                unset($fixRevisi['dokumen_pendukung_old']);
            }

            $revisi->where('id', $request->id)->update($fixRevisi);

            DB::table('tb_ticket_stats')->insert([
                'ticket_id'  => $request->id,
                'status'     => $current_status,
                'created_at' => date('Y-m-d'),
                'created_by' => Auth::user()->id_akses,
            ]);

            /**
             * change $sendMail value to true to test email notification,
             * please make sure to set your own email for testing
             * !! DO NOT spam other user email for testing !!
             */
            $sendEmail      = false;

            $data_pejabat   = $pejabat->where('id_dir', Auth::user()->id_dir)->first();
            $email_pejabat  = isset($data_pejabat->email) ? $data_pejabat->email : '';

            $text = Auth::user()->nama . " telah mengajukan revisi baru. Mohon segera ditindak lanjut";

            if (!empty($email_pejabat) && $sendEmail) {
                $tools->sendingEmail($text, $email_pejabat, $request->nomor_surat);
            }

            $this->record($request->id, TicketStatus::ACTIVITY[$current_status], Auth::user()->id_akses, $nota_dinas_ppk, $matrik_rab, $dokumen_pendukung);


            if ($request->provinsi == "undefined") {
                $message_pptk   = "Pengajuan Revisi E-Ticketing Anda Berhasil Dikirim. Nomor Surat: " . $request->nomor_surat;
                $message_ppk    = Auth::user()->nama . " telah mengajukan perbaikan E-Ticketing dengan Nomor Surat: " . $request->nomor_surat . ". Mohon segera ditindak lanjut";

                $no_hp_ppk = $user->where([
                    'id_dir'    => Auth::user()->id_dir,
                    'level'     => 2,
                    //'prov'      => $request->provinsi
                    'prov'      => ''
                ])->first()->no_hp;

                $tools->sendingWa($no_hp_ppk, $message_ppk, $request->nomor_surat, "Ticketing Revisi");
                $tools->sendingWa(Auth::user()->no_hp, $message_pptk, $request->nomor_surat, "Ticketing Revisi");
            } else {
                $message_ppk    = "Pengajuan Revisi E-Ticketing Anda Berhasil Dikirim. Nomor Surat: " . $request->nomor_surat;
                $message_bagren = Auth::user()->nama . " telah mengajukan perbaikan E-Ticketing daerah baru dengan Nomor Surat: " . $request->nomor_surat . ". Mohon segera ditindak lanjut";

                $tools->sendingWa(Auth::user()->no_hp, $message_ppk, $request->nomor_surat, "Ticketing Revisi");
                $tools->sendingWa(Auth::user()->no_hp, $message_bagren, $request->nomor_surat, "Ticketing Revisi");
            }

            $message_bang_arief = "Ijin Bang Arief, " . Auth::user()->nama . " telah mengajukan Ticketing Revisi Pusat baru dengan Nomor Surat: " . $request->nomor_surat;
            $tools->sendingWa("081213833316", $message_bang_arief, $request->nomor_surat, "Tickting Revisi");

            return response()->json([
                'status'    => 'success',
                'title'     => 'Tiket Revisi Berhasil diperbaiki',
                'message'   => 'Pengajuan Revisi Akan Segera Diproses'
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Submit. Please Try Again'
            ]);
        }
    }

    /**
     * 5.B - Simpan update revisi oleh PPK
     * Dikirim kembali ke KPAs
     */
    public function submitRevisiFasgub(Request $request)
    {
        $user       = new User;
        $dir        = new Direktorat;
        $revisi     = new TicketRevisi;
        $pejabat    = new MasterPejabat;
        $tools      = new ToolsController;

        $dataRevisi = $revisi->find($request->id);

        $validation = [
            'nomor_surat'       => 'required',
            'tanggal_surat'     => 'required|date',
            'jenis_revisi'      => 'required',
            'perihal'           => 'required',
            'judul_kak'         => 'required',
            'nota_dinas_ppk'    => 'max:10240|required',
            'matrik_rab'        => 'max:10240|required',
            'dokumen_pendukung' => 'max:10240|required',
        ];

        if (! empty($dataRevisi->nota_dinas_ppk)) {
            unset($validation['nota_dinas_ppk']);
        }

        if (! empty($dataRevisi->matrik_rab)) {
            unset($validation['matrik_rab']);
        }

        if (! empty($dataRevisi->dokumen_pendukung)) {
            unset($validation['dokumen_pendukung']);
        }

        $message    = [
            'required'  => ':attribute tidak boleh kosong',
            'integer'   => ':attribute tidak valid',
            'date'      => ':attribute tidak valid',
            'max'       => ':attribute Ukuran Maksimal 10 MB'
        ];

        $names      = [
            'nomor_surat'       => 'Nomor Surat',
            'tanggal_surat'     => 'Tanggal Surat',
            'jenis_revisi'      => 'Jenis Revisi',
            'perihal'           => 'Perihal',
            'judul_kak'         => 'Judul KAK',
            'nota_dinas_ppk'    => 'Nota Dinas PPK',
            'matrik_rab'        => 'Matrik RAB',
            'dokumen_pendukung' => 'Dokumen Pendukung',
        ];

        $validator = Validator::make($request->all(), $validation, $message, $names);

        if ($validator->fails()) {
            return response()->json([
                'status'    => 'error',
                'title'     => 'Validasi Error',
                'message'   => $validator->errors()->all()
            ]);
        }

        try {
            $hasNodinBaru = false;
            $hasRabBaru   = false;
            $hasDokBaru   = false;

            $matrik_rab         = "Tidak Ada File";
            $nota_dinas_ppk     = "Tidak Ada File";
            $dokumen_pendukung  = "Tidak Ada File";

            $direktorat         = $dir->where('id_dir', $request->direktorat)->first()->nama_dir;

            if ($request->hasFile('nota_dinas_ppk')) {
                $hasNodinBaru   = true;
                $nota_dinas_ppk = $this->uploadFileFormatted($request, 'nota_dinas_ppk', $direktorat);
            }

            if ($request->hasFile('matrik_rab')) {
                $hasRabBaru = true;
                $matrik_rab = $this->uploadFileFormatted($request, 'matrik_rab', $direktorat);
            }

            if ($request->hasFile('dokumen_pendukung')) {
                $hasDokBaru        = true;
                $dokumen_pendukung = $this->uploadFileFormatted($request, 'dokumen_pendukung', $direktorat);
            }

            $current_status = $request->status_fasgub;

            $fixRevisi = [
                'nomor_surat'       => $request->nomor_surat,
                'tanggal_surat'     => $request->tanggal_surat,
                'direktorat'        => $request->direktorat,
                'jenis_revisi'      => $request->jenis_revisi,
                'perihal'           => $request->perihal,
                'judul_kak'         => $request->judul_kak,
                'nota_dinas_ppk'    => $nota_dinas_ppk,
                'matrik_rab'        => $matrik_rab,
                'dokumen_pendukung' => $dokumen_pendukung,
                'nota_dinas_pptk_old'   => [$dataRevisi->nota_dinas_pptk],
                'nota_dinas_ppk_old'    => [$dataRevisi->nota_dinas_ppk],
                'matrik_rab_old'        => [$dataRevisi->matrik_rab],
                'kak_old'               => [$dataRevisi->kak],
                'dokumen_pendukung_old' => [$dataRevisi->dokumen_pendukung],
                'keterangan'        => $request->keterangan,
                'status'            => $current_status,
                'current_status'    => $current_status,
                'type'              => $request->type,
                'created_by'        => Auth::user()->id_akses
            ];

            if (! $hasNodinBaru) {
                unset($fixRevisi['nota_dinas_ppk']);
                unset($fixRevisi['nota_dinas_ppk_old']);
            }

            if (! $hasRabBaru) {
                unset($fixRevisi['matrik_rab']);
                unset($fixRevisi['matrik_rab_old']);
            }
            if (! $hasDokBaru) {
                unset($fixRevisi['dokumen_pendukung']);
                unset($fixRevisi['dokumen_pendukung_old']);
            }

            $revisi->where('id', $request->id)->update($fixRevisi);

            DB::table('tb_ticket_stats')->insert([
                'ticket_id'  => $request->id,
                'status'     => $current_status,
                'created_at' => date('Y-m-d'),
                'created_by' => Auth::user()->id_akses,
            ]);

            /**
             * change $sendMail value to true to test email notification,
             * please make sure to set your own email for testing
             * !! DO NOT spam other user email for testing !!
             */
            // $sendEmail      = false;

            // $data_pejabat   = $pejabat->where('id_dir', Auth::user()->id_dir)->first();
            // $email_pejabat  = isset($data_pejabat->email) ? $data_pejabat->email : '';

            // $text = Auth::user()->nama . " telah mengajukan revisi baru. Mohon segera ditindak lanjut";

            // if (!empty($email_pejabat) && $sendEmail) {
            //     $tools->sendingEmail($text, $email_pejabat, $request->nomor_surat);
            // }

            $this->record($request->id, TicketStatus::ACTIVITY[$current_status], Auth::user()->id_akses, $nota_dinas_ppk, $matrik_rab, $dokumen_pendukung);


            if ($request->provinsi == "undefined") {
                $message_pptk   = "Pengajuan Revisi E-Ticketing Anda Berhasil Dikirim. Nomor Surat: " . $request->nomor_surat;
                $message_ppk    = Auth::user()->nama . " telah mengajukan perbaikan E-Ticketing dengan Nomor Surat: " . $request->nomor_surat . ". Mohon segera ditindak lanjut";

                $no_hp_ppk = $user->where([
                    'id_dir'    => Auth::user()->id_dir,
                    'level'     => 2,
                    //'prov'      => $request->provinsi
                    'prov'      => ''
                ])->first()->no_hp;

                $tools->sendingWa($no_hp_ppk, $message_ppk, $request->nomor_surat, "Ticketing Revisi");
                $tools->sendingWa(Auth::user()->no_hp, $message_pptk, $request->nomor_surat, "Ticketing Revisi");
            } else {
                $message_ppk    = "Pengajuan Revisi E-Ticketing Anda Berhasil Dikirim. Nomor Surat: " . $request->nomor_surat;
                $message_bagren = Auth::user()->nama . " telah mengajukan perbaikan E-Ticketing daerah baru dengan Nomor Surat: " . $request->nomor_surat . ". Mohon segera ditindak lanjut";

                $tools->sendingWa(Auth::user()->no_hp, $message_ppk, $request->nomor_surat, "Ticketing Revisi");
                $tools->sendingWa(Auth::user()->no_hp, $message_bagren, $request->nomor_surat, "Ticketing Revisi");
            }

            // $message_bang_arief = "Ijin Bang Arief, " . Auth::user()->nama . " telah mengajukan Ticketing Revisi Pusat baru dengan Nomor Surat: " . $request->nomor_surat;
            // $tools->sendingWa("081213833316", $message_bang_arief, $request->nomor_surat, "Tickting Revisi");

            return response()->json([
                'status'    => 'success',
                'title'     => 'Tiket Revisi Berhasil diperbaiki',
                'message'   => 'Pengajuan Revisi Akan Segera Diproses'
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Submit. Please Try Again'
            ]);
        }
    }

    /**
     * 6.A - Halamaan review oleh Bagren
     * setelah disetujui KPA
     */
    public function viewRevisiBagren($id = null)
    {
        if ($this->user->level != \App\UserAccess::LEVEL_BAGREN) {
            return redirect('ticketing/revisi-gwpp');
        }

        $type     = "Daerah";
        $kegiatan = "GWPP";
        $modul    = "E-Ticketing";
        $current  = "Formulir Verifikasi oleh BAGREN";

        $t = new TicketRevisi;
        $data = $t->find($id);

        $l = new LogTicket;
        $filelog = $l->getFileLogs($id);
        $log = $l->getLogs($id);

        return view('contents.e-ticketing.daerah.form-revisi-bagren', compact('current', 'modul', 'type', 'kegiatan', 'data', 'log', 'filelog'));
    }

    /**
     * 6.B - Simpan Revisi Bagren (disetujui / Diteliti / Ditolak)
     */
    public function submitRevisiBagren(Request $request)
    {
        try {
            $user         = new User;
            $dir          = new Direktorat;
            $revisi       = new TicketRevisi;
            $tools        = new ToolsController;

            $dataRevisi = $revisi->where('id', $request->id)->first();

            $validation = [];

            $message = [
                'required' => ':attribute tidak boleh kosong',
                'max'      => ':attribute Ukuran Maksimal 10 MB'
            ];

            $names = [
                'catatan_verifikasi' => 'Catatan Verifikasi',
            ];

            if ($request->status_verifikasi === TicketStatus::PERBAIKAN) {
                $validation = [
                    'catatan_verifikasi' => 'required',
                ];
            }

            $validator = Validator::make($request->all(), $validation, $message, $names);

            if ($validator->fails()) {
                return response()->json([
                    'status'    => 'error',
                    'title'     => 'Validasi Error',
                    'message'   => $validator->errors()->all()
                ]);
            }

            $nomor_surat = $dataRevisi->nomor_surat;

            $data = [
                'catatan_verifikasi' => $request->catatan_verifikasi,
                'status_verifikasi'  => $request->status_verifikasi,
                'status'             => $request->status_verifikasi,
                'current_status'     => $request->status_verifikasi,
                'verified_at'        => date("Y-m-d H:i:s"),
                'verified_by'        => Auth::user()->id_akses
            ];

            if ($request->status_verifikasi == TicketStatus::PERBAIKAN) {
                $data['status_kpa'] = null;
                $data['no_nota_kpa'] = null;
                $data['lampiran_kpa'] = null;
                $data['catatan_kpa'] = [null];
            }

            $revisi->where('id', $request->id)->update($data);

            if ($request->status_verifikasi === TicketStatus::DISETUJUI_BAGREN) {
                $no_hp_bagren = $user->where('prov_handle', 'like', '%' . $dataRevisi->provinsi . '%')->where([
                    'level'     => 5
                ])->first()->no_hp;

                $message_ppk    = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: {$nomor_surat} Disetujui Oleh Bagren";
                $message_bagren = "Pengajuan Revisi E-Ticketing dengan Nomor Surat: {$nomor_surat} Disetujui Oleh Bagren dan diteruskan ke Fasgub. Silakan diproses";

                $tools->sendingWa(Auth::user()->no_hp, $message_ppk, $nomor_surat, "Tickting Revisi");
                $tools->sendingWa($no_hp_bagren, $message_bagren, $nomor_surat, "Tickting Revisi");
            } else {
                $message_ppk = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: {$nomor_surat} *DITOLAK* oleh Bagren. Mohon segera diperbaiki.";

                $tools->sendingWa(Auth::user()->no_hp, $message_ppk, $nomor_surat, "Tickting Revisi");
            }

            $this->record($request->id, TicketStatus::ACTIVITY[$request->status_verifikasi], Auth::user()->id_akses);

            return response()->json([
                'status'  => 'success',
                'title'   => 'Status Revisi E-Ticketing Berhasil Diubah',
                'message' => 'Status Revisi E-Ticketing Berhasil Diubah'
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage(),
                'title'   => 'Oopps.. Error Processing. Please Try Again'
            ]);
        }
    }

    /**
     * 7.A - Halamaan review oleh Fasgub
     * setelah disetujui KPA
     */
    public function viewRevisiFasgub($id = null)
    {
        if ($this->user->level != \App\UserAccess::LEVEL_FASGUB) {
            return redirect('ticketing/revisi-gwpp');
        }

        $type     = "Daerah";
        $kegiatan = "GWPP";
        $modul    = "E-Ticketing";
        $current  = "Formulir Verifikasi oleh FASGUB";

        $t = new TicketRevisi;
        $data = $t->find($id);

        $l = new LogTicket;
        $filelog = $l->getFileLogs($id);
        $log = $l->getLogs($id);

        return view('contents.e-ticketing.daerah.form-revisi-fasgub', compact('current', 'modul', 'type', 'kegiatan', 'data', 'log', 'filelog'));
    }

    /**
     * X.1 - Helper List Satker berdasarkan nama provinsi terpilih
     */
    public function getSatkerProvinsi(Request $request)
    {
        $s = new Satker;
        $satker = $s->getSatkerProv($request->namaprov, $this->user->kdsatker);

        return response()->json([
            'data' => $satker
        ]);
    }

    /**
     * X.2 - Helper Rekap status Ticket Revisi berdasarkan Satker terpilih
     */
    public function getRekapSatker(Request $request)
    {
        $t = new TicketRevisi;
        $rekap = $t->getRekap($request->satker, $request->tahun, $request->bulan);

        return response()->json([
            'data' => $rekap
        ]);
    }

    /**
     * X.3 - Helper Link berdasarkan status Revisi
     */


    public function viewGgwpDaerahListPerbaikan()
    {
        $type       = "Daerah";
        $kegiatan   = "GWPP";
        $modul      = "E-Ticketing";
        $current    = "Perbaikan";

        return view('contents.e-ticketing.daftar-revisi-daerah', compact('current', 'modul', 'type', 'kegiatan'));
    }
    public function viewGgwpDaerahSubmitRev()
    {
        $type       = "Daerah";
        $kegiatan   = "GWPP";
        $modul      = "E-Ticketing";
        $current    = "Formulir Pengajuan Baru";

        return view('contents.e-ticketing.form-revisi-daerah', compact('current', 'modul', 'type', 'kegiatan'));
    }
    // end of controller baru untuk gwpp
    public function viewSarprasDaerah()
    {
        $type       = "daerah";
        $kegiatan   = "sarpras";
        $modul      = 'E-Ticketing';
        $current    = "Sarana & Prasarana";

        return view('contents.e-ticketing.index', compact('current', 'modul', 'type', 'kegiatan'));
    }

    public function suratPengesahan(Request $request)
    {
        ini_set('max_execution_time', 300);
        ini_set("memory_limit", "512M");

        $url = url()->current();
        $token = $request->token;

        $ticket = new TicketRevisi;
        $data   = $ticket->where('token', $token)->first();
        $img_logo = env('APP_URL') . '/images/logo-kemendagri.png';
        $img_logo = env('APP_URL') . '/images/logo-emonev.png';
        return view('landers.surat-pengesahan-preview', compact('data', 'token', 'img_logo', 'img_emonev'));
    }

    public function downloadSuratPengesahan(Request $request)
    {
        ini_set('max_execution_time', 300);
        ini_set("memory_limit", "512M");

        $url = url()->current();
        $token = $request->token;

        $ticket = new TicketRevisi;
        $data   = $ticket->where('token', $token)->first();
        $img_logo = public_path('images/logo-kemendagri.png');
        $img_emonev = public_path('images/logo-emonev.png');
        $pdf = Pdf::loadView('landers.surat-pengesahan-preview', ['data' => $data, 'token' => $token, 'img_logo' => $img_logo, 'img_emonev' => $img_emonev]);

        return $pdf->stream('Preview Surat Persetujuan - ' . $token . '.pdf');
    }

    public function betaTesting()
    {
        ini_set('max_execution_time', 300);
        ini_set("memory_limit", "512M");

        // $url = url()->current();
        // $token = $request->token;
        $token  = "db13bb90650fdc2210068cc331d89228";

        $ticket = new TicketRevisi;
        $data   = $ticket->where('token', $token)->first();
        $img_logo = env('APP_URL') . '/images/logo-kemendagri.png';
        $img_emonev = env('APP_URL') . '/images/logo-emonev.png';
        return view('landers.surat-pengesahan-preview', compact('data', 'token', 'img_logo', 'img_emonev'));
    }

    public function previewSuratPengesahan(Request $request)
    {
        $catatan    = [];
        $tembusan_pengesahan    = [];
        $deskripsi_pengesahan   = [];

        if ($request->has('catatan') && !empty($request->catatan)) {
            $catatan    = [];
            $notes      = explode('|', $request->catatan);

            foreach ($notes as $note) {
                if (!empty($note)) {
                    $catatan[] = $note;
                }
            }
        }

        if ($request->has('deskripsi_pengesahan') && !empty($request->deskripsi_pengesahan)) {
            $deskripsi_pengesahan    = [];
            $deskripsis      = explode('|', $request->deskripsi_pengesahan);

            foreach ($deskripsis as $deskripsi) {
                if (!empty($deskripsi)) {
                    $deskripsi_pengesahan[] = $deskripsi;
                }
            }
        }

        if ($request->has('tembusan') && !empty($request->tembusan)) {
            $tembusans              = explode('|', $request->tembusan);
            $tembusan_pengesahan    = [];

            foreach ($tembusans as $tembusan) {
                if (!empty($tembusan)) {
                    $tembusan_pengesahan[] = $tembusan;
                }
            }
        }

        try {
            $dir            = new Direktorat;
            $revisi         = new TicketRevisi;
            $tools          = new ToolsController;

            $data_old    = $revisi->where('id', $request->id)->first();
            $nomor_surat = $revisi->where('id', $request->id)->first()->nomor_surat;

            $catatan_simpan = "<ol>";

            foreach ($catatan as $value) {
                $catatan_simpan .= '<li>' . $value . '</li>';
            }

            $catatan_simpan .= "</ol>";


            $revisi->where('id', $request->id)->update([
                'catatan_verifikasi'    => $catatan,
                'tanggal_pengesahan'    => date("Y-m-d", strtotime($request->tanggal_pengesahan)),
                'nomor_surat_pengesahan' => $request->nomor_surat_pengesahan,
                'deskripsi_pengesahan'  => $deskripsi_pengesahan,
                'tembusan'              => $tembusan_pengesahan
            ]);
        } catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Processing. Please Try Again'
            ]);
        }
    }

    /*
    public function submitRevisi(Request $request)
    {
        $user       = new User;
        $dir        = new Direktorat;
        $revisi     = new TicketRevisi;
        $pejabat    = new MasterPejabat;
        $tools      = new ToolsController;

        $validation = [
            'tahun_anggaran'    => 'required|integer',
            'nomor_surat'       => 'required',
            'tanggal_surat'     => 'required|date',
            'satker'            => 'required',
            'provinsi'          => 'required',
            'direktorat'        => 'required',
            'jenis_revisi'      => 'required',
            'nama_pejabat'      => 'required',
            'jabatan'           => 'required',
            'perihal'           => 'required',
            'nota_dinas_pptk'   => 'max:10240',
            'nota_dinas_ppk'    => 'max:10240',
            'matrik_rab'        => 'max:10240',
            'dokumen_pendukung'   => 'max:10240',
            'kak'   => 'max:10240',
        ];

        $message    = [
            'required'  => ':attribute tidak boleh kosong',
            'integer'   => ':attribute tidak valid',
            'date'      => ':attribute tidak valid',
            'max'       => ':attribute Ukuran Maksimal 10 MB'
        ];

        $names      = [
            'tahun_anggaran'    => 'Tahun Anggaran',
            'nomor_surat'       => 'Nomor Surat',
            'tanggal_surat'     => 'Tanggal Surat',
            'satker'            => 'Satuan Kerja',
            'provinsi'          => 'Provinsi',
            'direktorat'        => 'Unit Kerja',
            'jenis_revisi'      => 'Jenis Revisi',
            'nama_pejabat'      => 'Nama Pejabat',
            'jabatan'           => 'Jabatan',
            'perihal'           => 'Perihal',
            'nota_dinas_pptk'   => 'Nota Dinas PPTK',
            'nota_dinas_ppk'    => 'Nota Dinas PPK',
            'matrik_rab'        => 'Matrik RAB',
            'dokumen_pendukung'   => 'Dokumen Pendukung',
            'kak'   => 'Dokumen KAK',
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
            $kak                = "Tidak Ada File";
            $matrik_rab         = "Tidak Ada File";
            $nota_dinas_ppk     = "Tidak Ada File";
            $nota_dinas_pptk    = "Tidak Ada File";
            $dokumen_pendukung  = "Tidak Ada File";

            $direktorat         = $dir->where('id_dir', $request->direktorat)->first()->nama_dir;

            if($request->hasFile('nota_dinas_pptk'))
            {
                $nota_dinas_pptk = $this->uploadFile($request, 'nota_dinas_pptk', $direktorat);
            }

            if($request->hasFile('nota_dinas_ppk'))
            {
                $nota_dinas_ppk = $this->uploadFile($request, 'nota_dinas_ppk', $direktorat);
            }

            if($request->hasFile('matrik_rab'))
            {
                $matrik_rab     = $this->uploadFile($request, 'matrik_rab', $direktorat);
            }

            if($request->hasFile('kak'))
            {
                $kak = $this->uploadFile($request, 'kak', $direktorat);
            }

            if($request->hasFile('dokumen_pendukung'))
            {
                $dokumen_pendukung = $this->uploadFile($request, 'dokumen_pendukung', $direktorat);
            }

            $id_ticketing = $revisi->create([
                'token'             => md5($request->nomor_surat.strtotime(date("ymdhis"))).random_int(100000, 99999999),
                'key'               => random_int(100000, 999999),
                'tahun_anggaran'    => $request->tahun_anggaran,
                'nomor_surat'       => $request->nomor_surat,
                'tanggal_surat'     => $request->tanggal_surat,
                'satker'            => $request->satker,
                'provinsi'          => $request->provinsi,
                'direktorat'        => $request->direktorat,
                'jenis_revisi'      => $request->jenis_revisi,
                'nama_pejabat'      => $request->nama_pejabat,
                'jabatan'           => $request->jabatan,
                'perihal'           => $request->perihal,
                'nota_dinas_pptk'   => $nota_dinas_pptk,
                'nota_dinas_ppk'    => $nota_dinas_ppk,
                'matrik_rab'        => $matrik_rab,
                'kak'               => $kak,
                'dokumen_pendukung' => $dokumen_pendukung,
                'nota_dinas_pptk_old'   => ["BELUM ADA DOKUMEN LAMA"],
                'nota_dinas_ppk_old'    => ["BELUM ADA DOKUMEN LAMA"],
                'matrik_rab_old'        => ["BELUM ADA DOKUMEN LAMA"],
                'kak_old'               => ["BELUM ADA DOKUMEN LAMA"],
                'dokumen_pendukung_old' => ["BELUM ADA DOKUMEN LAMA"],
                'keterangan'        => $request->keterangan,
                'status'            => 'new',
                'type'              => $request->type,
                'created_by'        => Auth::user()->id_akses
            ]);

            $data_pejabat   = $pejabat->where('id_dir', Auth::user()->id_dir)->first();
            // $email_pejabat  = $data_pejabat->email;
            $email_pejabat  = "";
            $text = Auth::user()->nama." telah mengajukan revisi baru. Mohon segera ditindak lanjut";
            // $tools->sendingEmail($text, $email_pejabat, $request->nomor_surat);
            $this->record($id_ticketing->id, "Mengajukan Revisi E-Ticketing", Auth::user()->id_akses);


            if($request->provinsi == "undefined")
            {
                $message_pptk   = "Pengajuan Revisi E-Ticketing Anda Berhasil Dikirim. Nomor Surat: ".$request->nomor_surat;
                $message_ppk    = Auth::user()->nama." telah mengajukan revisi E-Ticketing baru dengan Nomor Surat: ".$request->nomor_surat.". Mohon segera ditindak lanjut";

                $no_hp_ppk = $user->where([
                    'id_dir'    => Auth::user()->id_dir,
                    'level'     => 2,
                    //'prov'      => $request->provinsi
                    'prov'      => ''
                ])->first()->no_hp;

                $tools->sendingWa($no_hp_ppk, $message_ppk, $request->nomor_surat, "Tickting Revisi");
                $tools->sendingWa(Auth::user()->no_hp, $message_pptk, $request->nomor_surat, "Tickting Revisi");
            }
            else
            {
                $message_ppk    = "Pengajuan Revisi E-Ticketing Anda Berhasil Dikirim. Nomor Surat: ".$request->nomor_surat;
                $message_bagren = Auth::user()->nama." telah mengajukan revisi E-Ticketing daerah baru dengan Nomor Surat: ".$request->nomor_surat.". Mohon segera ditindak lanjut";

                $tools->sendingWa(Auth::user()->no_hp, $message_ppk, $request->nomor_surat, "Tickting Revisi");
                $tools->sendingWa(Auth::user()->no_hp, $message_bagren, $request->nomor_surat, "Tickting Revisi");
            }

            $message_bang_arief = "Ijin Bang Arief, ".Auth::user()->nama." telah mengajukan Ticketing Revisi Pusat baru dengan Nomor Surat: ".$request->nomor_surat;
            $tools->sendingWa("081213833316", $message_bang_arief, $request->nomor_surat, "Tickting Revisi");

            return response()->json([
                'status'    => 'success',
                'title'     => 'Tiket Revisi Berhasil Dibuat',
                'message'   => 'Pengajuan Revisi Akan Segera Diproses'
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
    */

    public function updateRevisi(Request $request)
    {
        $dir        = new Direktorat;
        $revisi     = new TicketRevisi;
        $pejabat    = new MasterPejabat;
        $tools      = new ToolsController;

        try {
            $data_old   = $revisi->where('id', $request->id)->first();
            $direktorat = $dir->where('id_dir', $data_old->direktorat)->first()->nama_dir;

            if ($request->hasFile('nota_dinas_pptk')) {
                $nota_dinas_pptk_old     = $data_old->nota_dinas_pptk;
                $arr_nota_dinas_pptk_old = $data_old->nota_dinas_pptk_old;

                if (!in_array("BELUM ADA DOKUMEN LAMA", $arr_nota_dinas_pptk_old)) {
                    array_push($arr_nota_dinas_pptk_old, $nota_dinas_pptk_old);
                } else {
                    $arr_nota_dinas_pptk_old = [$nota_dinas_pptk_old];
                }

                $nota_dinas_pptk = $this->uploadFile($request, 'nota_dinas_pptk', $direktorat);

                $revisi->where('id', $request->id)->update([
                    'nota_dinas_pptk'       => $nota_dinas_pptk,
                    'nota_dinas_pptk_old'   => $arr_nota_dinas_pptk_old
                ]);
            }

            if ($request->hasFile('nota_dinas_ppk')) {
                $nota_dinas_ppk_old     = $data_old->nota_dinas_ppk;
                $arr_nota_dinas_ppk_old = $data_old->nota_dinas_ppk_old;

                if (!in_array("BELUM ADA DOKUMEN LAMA", $arr_nota_dinas_ppk_old)) {
                    array_push($arr_nota_dinas_ppk_old, $nota_dinas_ppk_old);
                } else {
                    $arr_nota_dinas_ppk_old = [$nota_dinas_ppk_old];
                }

                $nota_dinas_ppk = $this->uploadFile($request, 'nota_dinas_ppk', $direktorat);

                $revisi->where('id', $request->id)->update([
                    'nota_dinas_ppk'       => $nota_dinas_ppk,
                    'nota_dinas_ppk_old'   => $arr_nota_dinas_ppk_old
                ]);
            }

            if ($request->hasFile('matrik_rab')) {
                $matrik_rab_old     = $data_old->matrik_rab;
                $arr_matrik_rab_old = $data_old->matrik_rab_old;

                if (!in_array("BELUM ADA DOKUMEN LAMA", $arr_matrik_rab_old)) {
                    array_push($arr_matrik_rab_old, $matrik_rab_old);
                } else {
                    $arr_matrik_rab_old = [$matrik_rab_old];
                }

                $matrik_rab = $this->uploadFile($request, 'matrik_rab', $direktorat);

                $revisi->where('id', $request->id)->update([
                    'matrik_rab'       => $matrik_rab,
                    'matrik_rab_old'   => $arr_matrik_rab_old
                ]);
            }

            if ($request->hasFile('kak')) {
                $kak_old     = $data_old->kak;
                $arr_kak_old = $data_old->kak_old;

                if (!in_array("BELUM ADA DOKUMEN LAMA", $arr_kak_old)) {
                    array_push($arr_kak_old, $kak_old);
                } else {
                    $arr_kak_old = [$kak_old];
                }

                $kak = $this->uploadFile($request, 'kak', $direktorat);

                $revisi->where('id', $request->id)->update([
                    'kak'       => $kak,
                    'kak_old'   => $arr_kak_old
                ]);
            }

            if ($request->hasFile('dokumen_pendukung')) {
                $dokumen_pendukung_old     = $data_old->dokumen_pendukung;
                $arr_dokumen_pendukung_old = $data_old->dokumen_pendukung_old;

                if (!in_array("BELUM ADA DOKUMEN LAMA", $arr_dokumen_pendukung_old)) {
                    array_push($arr_dokumen_pendukung_old, $dokumen_pendukung_old);
                } else {
                    $arr_dokumen_pendukung_old = [$dokumen_pendukung_old];
                }

                $dokumen_pendukung = $this->uploadFile($request, 'dokumen_pendukung', $direktorat);

                $revisi->where('id', $request->id)->update([
                    'dokumen_pendukung'       => $dokumen_pendukung,
                    'dokumen_pendukung_old'   => $arr_dokumen_pendukung_old
                ]);
            }

            $revisi->where('id', $request->id)->update([
                'status' => 'Perbaikan Disubmit'
            ]);

            $data_pejabat   = $pejabat->where('id_dir', Auth::user()->id_dir)->first();
            $email_pejabat  = $data_pejabat->email;
            $text = Auth::user()->nama . " telah mengajukan perubahan revisi ticketing baru. Mohon segera ditindak lanjut";
            // $tools->sendingEmail($text, $email_pejabat, $data_old->nomor_surat);
            $this->record($request->id, "Telah melakukan Perbaikan Data Revisi E-Ticketing", Auth::user()->id_akses);

            // $message_pptk   = "Pengajuan Revisi E-Ticketing Anda Berhasil Dikirim. Nomor Surat: ".$data_old->nomor_surat;
            // $message_ppk    = Auth::user()->nama." telah mengajukan revisi E-Ticketing baru dengan Nomor Surat: ".$data_old->nomor_surat.". Mohon segera ditindak lanjut";

            // $tools->sendingWa(Auth::user()->no_hp, $message_pptk);
            // $tools->sendingWa(Auth::user()->no_hp, $message_ppk);

            return response()->json([
                'status'    => 'success',
                'title'     => 'Tiket Revisi Berhasil Diubah',
                'message'   => 'Pengajuan Revisi Akan Segera Diproses'
            ]);
        } catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Submit. Please Try Again'
            ]);
        }
    }

    public function dataRevisi(Request $request)
    {
        $provinsi   = new Provinsi;
        $dir        = new Direktorat;
        $revisi     = new TicketRevisi;

        try {
            $i      = 0;
            $data   = $revisi->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')->orderBy('id', 'DESC');

            if (Auth::user()->level == "2") {
                $data = $revisi
                    ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                    ->where('provinsi', 'undefined')
                    ->where('direktorat', Auth::user()->id_dir)->orderBy('id', 'DESC');

                if (is_numeric(Auth::user()->prov)) {
                    $data = $revisi
                        ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                        ->where('type', $request->type)
                        ->where('provinsi', Auth::user()->prov)
                        ->where('direktorat', Auth::user()->id_dir)->orderBy('id', 'DESC');
                }

                if (Auth::user()->username == "198505062004121001") {
                    $data = $revisi
                        ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                        ->where('provinsi', 'undefined')->orderBy('id', 'DESC');

                    if ($request->type == "gwpp") {
                        $data = $revisi
                            ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                            ->where('type', $request->type)->orderBy('id', 'DESC');
                    } else if ($request->type == "sarpras") {
                        $data = $revisi
                            ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                            ->where('type', $request->type)->orderBy('id', 'DESC');
                    }
                }
            } else if (Auth::user()->level == "3") {
                // if(!is_numeric(Auth::user()->prov))
                // {
                $data   = $revisi
                    ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                    ->where('created_by', Auth::user()->id_akses)
                    ->where('type', $request->type)
                    ->orderBy('id', 'DESC');
                // }

            } else if (Auth::user()->level == "1") {
                if (strtolower(Auth::user()->prov) == "all") {
                    $data = $revisi
                        ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                        ->where('direktorat', Auth::user()->id_dir)
                        ->where('type', $request->type)
                        ->orderBy('id', 'DESC');
                } else {
                    $data = $revisi
                        ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                        ->where('direktorat', Auth::user()->id_dir)
                        ->where('provinsi', Auth::user()->prov)
                        ->where('type', $request->type)
                        ->orderBy('id', 'DESC');
                }
            } else if (Auth::user()->level == "5") {
                $data = $revisi
                    ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                    ->whereNotNull('approved_by')
                    ->where('provinsi', 'undefined')
                    ->orderBy('id', 'DESC');

                if (strtolower(Auth::user()->prov) == "all") {
                    if ($request->type == "gwpp") {
                        $data = $revisi
                            ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                            ->where('provinsi', 'not like', '%undefined%')
                            // ->whereNotNull('status_fasgub')
                            ->where('type', $request->type)
                            ->orderBy('id', 'DESC');
                    } else {
                        $data = $revisi
                            ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                            ->where('provinsi', 'not like', '%undefined%')
                            // ->whereNotNull('status_ban')
                            ->where('type', $request->type)
                            ->orderBy('id', 'DESC');
                    }
                } else {
                    if ($request->type == "gwpp") {
                        $data = $revisi
                            ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                            ->where('provinsi', 'like', Auth::user()->prov)
                            // ->whereNotNull('status_fasgub')
                            ->where('type', $request->type)
                            ->orderBy('id', 'DESC');

                        if (Auth::user()->prov_handle != NULL) {
                            $data = $revisi
                                ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                                ->whereIn('provinsi', Auth::user()->prov_handle)
                                ->where('type', $request->type)
                                ->orderBy('id', 'DESC');
                        }
                    } else {
                        $data = $revisi
                            ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                            ->where('provinsi', 'like', Auth::user()->prov)
                            // ->whereNotNull('status_ban')
                            ->where('type', $request->type)
                            ->orderBy('id', 'DESC');

                        if (Auth::user()->direktorat_handle != NULL) {
                            if ($request->type != "sarpras") {
                                $data = $revisi
                                    ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                                    ->whereIn('direktorat', Auth::user()->direktorat_handle)
                                    ->where('type', $request->type)
                                    ->orderBy('id', 'DESC');
                            }
                        }
                    }
                }

                // if(Auth::user()->prov_handle != NULL)
                // {
                //     $data = $revisi
                //         ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                //         ->whereIn('provinsi', Auth::user()->prov_handle)
                //         ->where('type', $request->type)
                //         ->orderBy('id', 'DESC');
                // }

                // if(Auth::user()->direktorat_handle != NULL)
                // {
                //     if($request->type != "gwpp" || $request->type != "sarpras")
                //     {
                //         $data = $revisi
                //         ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                //         ->whereIn('direktorat', Auth::user()->direktorat_handle)
                //         ->where('type', $request->type)
                //         ->orderBy('id', 'DESC');
                //     }
                // }
            } else if (Auth::user()->level == "0") {
                $data = $revisi->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')->orderBy('id', 'DESC');

                if ($request->type == "gwpp") {
                    $data = $revisi
                        ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                        ->where('provinsi', 'not like', '%undefined%')
                        // ->whereNotNull('status_fasgub')
                        ->where('type', $request->type)
                        ->orderBy('id', 'DESC');
                } else {
                    $data = $revisi
                        ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                        ->where('provinsi', 'like', '%undefined%')
                        // ->whereNotNull('status_ban')
                        ->where('type', $request->type)
                        ->orderBy('id', 'DESC');
                }
            } else if (Auth::user()->level == "7") {
                $data = $revisi
                    ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                    ->where('created_by', Auth::user()->id_akses)
                    ->orderBy('id', 'DESC');

                if ($request->type == "gwpp") {
                    $data = $revisi
                        ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                        // ->where('provinsi', 'not like', '%undefined%')
                        ->whereIn('provinsi', Auth::user()->prov_handle)
                        // ->whereNotNull('status_verifikasi')
                        ->where('type', $request->type)
                        ->orderBy('id', 'DESC');
                }
            } else if (Auth::user()->level == "8" || Auth::user()->level == "9") {
                $data = $revisi
                    ->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')
                    // ->where('provinsi', 'not like', '%undefined%')
                    ->whereIn('provinsi', Auth::user()->prov_handle)
                    ->where('type', $request->type)
                    ->orderBy('id', 'DESC');
            }

            // if($request->status != "all")
            // {
            //     $data = $revisi->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')->where('status', 'like', '%'.$request->status.'%')->orderBy('id', 'DESC');

            //     if(Auth::user()->level == "2" || Auth::user()->level == "3")
            //     {
            //         $data = $revisi->leftJoin('tbm_dir', 'tb_ticket_rev.direktorat', '=', 'tbm_dir.id_dir')->where('created_by', Auth::user()->id_akses)->where('status', 'like', '%'.$request->status.'%')->orderBy('id', 'DESC');
            //     }
            // }

            if ($request->status != "all") {
                $data   = $data->where('status', 'like', $request->status);
            }

            $data   = $data->where('tahun_anggaran', $request->tahun);
            $data   = $data->get();
            // Progress column value
            foreach ($data as $value) {
                if ($value->status == "approved" || strtolower($value->status) == "disetujui") {
                    $data[$i]->status_style = '<span class="bg-success p-2">SELESAI DIPROSES</span>';
                } else if ($value->status == "BUTUH PERBAIKAN" || $value->status == "DITOLAK" || $value->status == "Butuh Perbaikan") {
                    $data[$i]->status_style = '<span class="bg-danger p-2">' . strtoupper($value->status) . '</span>';
                } else if ($value->status == "new") {
                    $data[$i]->status_style     = '<span class="bg-info p-2">PENGAJUAN BARU</span>';
                    // $data[$i]->tahap1           = '<span class="bg-success text-uppercase p-2" title="di ajukan oleh ppk">'.date("d/m/Y H:i", strtotime($value->created_at)).'</span>';
                    // $data[$i]->tahap1_daerah    = '<span class="bg-success text-uppercase p-2" title="di ajukan oleh ppk">'.date("d/m/Y H:i", strtotime($value->created_at)).'</span>';
                } else {
                    $data[$i]->status_style = '<span class="bg-warning p-2 ' . $value->status . '">' . strtoupper($value->status) . '</span>';
                }

                $data[$i]->aksi     = '<div class="btn-group">
                    <button type="button" class="btn btn-info">Action</button>
                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="javascript:void(0)" onclick="openDetail(' . $value->id . ')">Lihat Detail
                        <div class="dropdown-divider"></div>
                    </div>
                </div>
                ';
                // pengajuan = tahap 1
                $data[$i]->tahap1           = '<span class="bg-success text-uppercase p-2" title="Pengajuan Baru">' . date("d/m/Y H:i", strtotime($value->created_at)) . '</span>';
                // $data[$i]->tahap2           = '<span class="bg-warning text-uppercase p-2">Belum Diproses</span>';
                // $data[$i]->tahap3           = '<span class="bg-warning text-uppercase p-2">Belum Diproses</span>';
                // $data[$i]->tahap_status     = '<span class="bg-warning text-uppercase p-2">Belum Diproses</span>';

                $data[$i]->tahap2           = '';
                $data[$i]->tahap3           = '';
                $data[$i]->tahap_status     = '';

                $data[$i]->tahap1_daerah    = '<span class="bg-success text-uppercase p-2" title="Pengajuan Baru">' . date("d/m/Y H:i", strtotime($value->created_at)) . '</span>';
                // $data[$i]->tahap2_daerah    = '<span class="bg-warning text-uppercase p-2">Belum Diproses</span>';
                // $data[$i]->tahap3_daerah    = '<span class="bg-warning text-uppercase p-2">Belum Diproses</span>';
                // $data[$i]->tahap4_daerah    = '<span class="bg-warning text-uppercase p-2">Belum Diproses</span>';

                $data[$i]->tahap2_daerah    = '';
                $data[$i]->tahap3_daerah    = '';
                $data[$i]->tahap4_daerah    = '';

                $data[$i]->keterangan_revisi     = '<a href="javascript:void(0)" onclick="openDetail(' . $value->id . ')">' . $value->nomor_surat . '<br> <small>' . $value->perihal . '</small>' . '</a>';

                if ($request->type == "gwpp") {
                    if ($value->status_fasgub == "disetujui") {
                        $data[$i]->tahap3_daerah    = '<span class="bg-success text-uppercase p-2">' . date("d/m/Y H:i", strtotime($value->fasgub_at)) . '</span>';
                    } else if ($value->status_fasgub == "perbaikan") {
                        $data[$i]->tahap3_daerah    = '<span class="bg-danger text-uppercase p-2">BUTUH PERBAIKAN</span>';
                    }
                } else {
                    if ($value->status_ban == "disetujui") {
                        $data[$i]->tahap3_daerah    = '<span class="bg-success text-uppercase p-2">' . date("d/m/Y H:i", strtotime($value->ban_at)) . '</span>';
                    } else if ($value->status_ban == "perbaikan") {
                        $data[$i]->tahap3_daerah    = '<span class="bg-danger text-uppercase p-2">BUTUH PERBAIKAN</span>';
                    }
                }

                if ($value->status_kpa == "disetujui") {
                    $data[$i]->tahap2           = '<span class="bg-success text-uppercase p-2" title="Petugas Sudah Memperbaiki">' . date("d/m/Y H:i", strtotime($value->kpa_at)) . '</span>';
                    $data[$i]->tahap2_daerah    = '<span class="bg-success text-uppercase p-2" title="Petugas Sudah Memperbaiki">' . date("d/m/Y H:i", strtotime($value->kpa_at)) . '</span>';
                } else if ($value->status_kpa == "perbaikan") {
                    $data[$i]->tahap2_daerah    = '<span class="bg-danger text-uppercase p-2">BUTUH PERBAIKAN</span>';
                    //$data[$i]->tahap4_daerah    = '';
                }

                // if($value->status == "BUTUH PERBAIKAN")
                // {
                //     $data[$i]->tahap1           = '<span class="bg-danger text-uppercase p-2">BUTUH PERBAIKAN</span>';
                //     $data[$i]->tahap1_daerah    = '<span class="bg-danger text-uppercase p-2">BUTUH PERBAIKAN</span>';
                //     $data[$i]->tahap2           = '<span class="bg-danger text-uppercase p-2">'.date("d/m/Y H:i", strtotime($value->kpa_at)).'</span>';
                //     $data[$i]->tahap2_daerah    = '<span class="bg-danger text-uppercase p-2">'.date("d/m/Y H:i", strtotime($value->kpa_at)).'</span>';
                // }
                // if($value->status == "Perbaikan Disubmit")
                // {
                //     $data[$i]->tahap2           = '';
                //     $data[$i]->tahap2_daerah    = '';
                // }
                // if($value->status == "Selesai Diproses KPA")
                // {
                //     $data[$i]->tahap2           = '';
                //     $data[$i]->tahap2_daerah    = '';
                // }
                if ($value->status_approval == "disetujui") {
                    $data[$i]->tahap2           = '<span class="bg-success text-uppercase p-2">' . date("d/m/Y H:i", strtotime($value->approved_at)) . '</span>';
                } else if ($value->status_approval == "perbaikan") {
                    $data[$i]->tahap2           = '<span class="bg-danger text-uppercase p-2">BUTUH PERBAIKAN</span>';
                }

                if ($value->status_verifikasi == "disetujui") {
                    $data[$i]->tahap3           = '<span class="bg-success text-uppercase p-2">' . date("d/m/Y H:i", strtotime($value->verified_at)) . '</span>';

                    $data[$i]->tahap4_daerah    = '<span class="bg-success text-uppercase p-2">' . date("d/m/Y H:i", strtotime($value->verified_at)) . '</span>';
                } else if ($value->status_verifikasi == "perbaikan") {
                    $data[$i]->tahap3           = '<span class="bg-danger text-uppercase p-2">BUTUH PERBAIKAN</span>';
                    $data[$i]->tahap4_daerah    = '';
                }

                // new logic condition : 2 > 1 > 5 > 7 > 5
                if ($value->status == "BUTUH PERBAIKAN" && $value->status_approval == NULL) {
                    // $data[$i]->tahap1           = '<span class="bg-danger text-uppercase p-2" title="">BUTUH PERBAIKAN</span>';
                    // $data[$i]->tahap1_daerah    = '<span class="bg-danger text-uppercase p-2" title="">BUTUH PERBAIKAN</span>';
                    // $data[$i]->tahap2           = '<span class="bg-danger text-uppercase p-2" title="">'.date("d/m/Y H:i", strtotime($value->fasgub_at)).'</span>';
                    // $data[$i]->tahap2_daerah    = '<span class="bg-danger text-uppercase p-2" title="">'.date("d/m/Y H:i", strtotime($value->fasgub_at)).'</span>';

                    $data[$i]->tahap1           = '<span class="bg-danger text-uppercase p-2" title="">BUTUH PERBAIKAN</span>';
                    $data[$i]->tahap1_daerah    = '<span class="bg-danger text-uppercase p-2" title="">BUTUH PERBAIKAN</span>';
                    $data[$i]->tahap2           = '';
                    $data[$i]->tahap2_daerah    = '';

                    // if($value->status_kpa== "disetujui")
                    // {
                    //     $data[$i]->tahap4           = '<span class="bg-danger text-uppercase p-2" title="Permohonan Perbaikan">'.date("d/m/Y H:i", strtotime($value->updated_at)).'</span>';
                    //     $data[$i]->tahap4_daerah    = '<span class="bg-danger text-uppercase p-2" title="Permohonan Perbaikan">'.date("d/m/Y H:i", strtotime($value->updated_at)).'</span>';
                    // }
                }
                if ($value->status == "Perbaikan Disubmit" && $value->status_approval == NULL) {
                    $data[$i]->tahap1           = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->created_at)) . '</span>';
                    $data[$i]->tahap1_daerah    = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->created_at)) . '</span>';
                    // $data[$i]->tahap2           = '<span class="bg-danger text-uppercase p-2" title="">'.date("d/m/Y H:i", strtotime($value->updated_at)).'</span>';
                    // $data[$i]->tahap2_daerah    = '<span class="bg-danger text-uppercase p-2" title="">'.date("d/m/Y H:i", strtotime($value->updated_at)).'</span>';
                    $data[$i]->tahap2           = '';
                    $data[$i]->tahap2_daerah    = '';
                }
                if ($value->status_kpa == "disetujui" && $value->status == "Selesai Diproses KPA") {
                    $data[$i]->tahap1           = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->created_at)) . '</span>';
                    $data[$i]->tahap1_daerah    = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->created_at)) . '</span>';
                    $data[$i]->tahap2           = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->kpa_at)) . '</span>';
                    $data[$i]->tahap2_daerah    = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->kpa_at)) . '</span>';
                }
                if ($value->status == "BUTUH PERBAIKAN" && $value->status_approval == NULL && $value->status_kpa == "disetujui") {
                    // $data[$i]->tahap1           = '<span class="bg-danger text-uppercase p-2" title="">BUTUH PERBAIKAN</span>';
                    // $data[$i]->tahap1_daerah    = '<span class="bg-danger text-uppercase p-2" title="">BUTUH PERBAIKAN</span>';
                    // $data[$i]->tahap2           = '<span class="bg-danger text-uppercase p-2" title="">'.date("d/m/Y H:i", strtotime($value->fasgub_at)).'</span>';
                    // $data[$i]->tahap2_daerah    = '<span class="bg-danger text-uppercase p-2" title="">'.date("d/m/Y H:i", strtotime($value->fasgub_at)).'</span>';
                    // $data[$i]->tahap3           = '<span class="bg-danger text-uppercase p-2" title="">'.date("d/m/Y H:i", strtotime($value->updated_at)).'</span>';
                    // $data[$i]->tahap4_daerah    = '<span class="bg-danger text-uppercase p-2" title="">'.date("d/m/Y H:i", strtotime($value->updated_at)).'</span>';

                    $data[$i]->tahap1           = '<span class="bg-danger text-uppercase p-2" title="">BUTUH PERBAIKAN</span>';
                    $data[$i]->tahap1_daerah    = '<span class="bg-danger text-uppercase p-2" title="">BUTUH PERBAIKAN</span>';
                    $data[$i]->tahap2           = '';
                    $data[$i]->tahap2_daerah    = '';
                    $data[$i]->tahap3           = '';
                    $data[$i]->tahap4_daerah    = '';
                }
                if ($value->status == "Perbaikan Disubmit" && $value->status_approval == NULL && $value->status_kpa == "disetujui") {
                    $data[$i]->tahap1           = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->created_at)) . '</span>';
                    $data[$i]->tahap1_daerah    = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->created_at)) . '</span>';
                    $data[$i]->tahap2           = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->fasgub_at)) . '</span>';
                    $data[$i]->tahap2_daerah    = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->fasgub_at)) . '</span>';
                    // $data[$i]->tahap4           = '<span class="bg-success text-uppercase p-2" title="Permohonan Perbaikan">'.date("d/m/Y H:i", strtotime($value->updated_at)).'</span>';
                    // $data[$i]->tahap4_daerah    = '<span class="bg-success text-uppercase p-2" title="Permohonan Perbaikan">'.date("d/m/Y H:i", strtotime($value->updated_at)).'</span>';
                    $data[$i]->tahap3           = '';
                    $data[$i]->tahap4_daerah    = '';
                }
                if ($value->status == "Disetujui Bagren" && $value->status_approval == NULL && $value->status_kpa == "disetujui") {
                    $data[$i]->tahap1           = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->created_at)) . '</span>';
                    $data[$i]->tahap1_daerah    = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->created_at)) . '</span>';
                    $data[$i]->tahap2           = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->kpa_at)) . '</span>';
                    $data[$i]->tahap2_daerah    = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->kpa_at)) . '</span>';
                    $data[$i]->tahap3           = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->verified_at)) . '</span>';
                    $data[$i]->tahap4_daerah    = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->verified_at)) . '</span>';
                }
                if ($value->status == "BUTUH PERBAIKAN" && $value->status_approval == NULL && $value->status_kpa == "disetujui") {
                    // $data[$i]->tahap1           = '<span class="bg-danger text-uppercase p-2" title="">BUTUH PERBAIKAN</span>';
                    // $data[$i]->tahap1_daerah    = '<span class="bg-danger text-uppercase p-2" title="">BUTUH PERBAIKAN</span>';
                    // $data[$i]->tahap2           = '<span class="bg-danger text-uppercase p-2" title="">'.date("d/m/Y H:i", strtotime($value->kpa_at)).'</span>';
                    // $data[$i]->tahap2_daerah    = '<span class="bg-danger text-uppercase p-2" title="">'.date("d/m/Y H:i", strtotime($value->kpa_at)).'</span>';
                    // $data[$i]->tahap3           = '<span class="bg-danger text-uppercase p-2" title="">'.date("d/m/Y H:i", strtotime($value->verified_at)).'</span>';
                    // $data[$i]->tahap3_daerah    = '<span class="bg-danger text-uppercase p-2" title="">'.date("d/m/Y H:i", strtotime($value->fasgub_at)).'</span>';
                    // $data[$i]->tahap4_daerah    = '<span class="bg-danger text-uppercase p-2" title="">'.date("d/m/Y H:i", strtotime($value->verified_at)).'</span>';

                    $data[$i]->tahap1           = '<span class="bg-danger text-uppercase p-2" title="">BUTUH PERBAIKAN</span>';
                    $data[$i]->tahap1_daerah    = '<span class="bg-danger text-uppercase p-2" title="">BUTUH PERBAIKAN</span>';
                    $data[$i]->tahap2           = '';
                    $data[$i]->tahap2_daerah    = '';
                    $data[$i]->tahap3           = '';
                    $data[$i]->tahap3_daerah    = '';
                    $data[$i]->tahap4_daerah    = '';
                }
                if ($value->status == "Perbaikan Disubmit" && $value->status_approval == NULL && $value->status_kpa == "disetujui") {
                    $data[$i]->tahap1           = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->created_at)) . '</span>';
                    $data[$i]->tahap1_daerah    = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->created_at)) . '</span>';
                    $data[$i]->tahap2           = '<span class="bg-danger text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->kpa_at)) . '</span>';
                    $data[$i]->tahap2_daerah    = '<span class="bg-danger text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->kpa_at)) . '</span>';
                    $data[$i]->tahap3           = '<span class="bg-danger text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->verified_at)) . '</span>';
                    // $data[$i]->tahap3_daerah    = '<span class="bg-danger text-uppercase p-2" title="">'.date("d/m/Y H:i", strtotime($value->fasgub_at)).'</span>';
                    $data[$i]->tahap4_daerah    = '<span class="bg-danger text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->verified_at)) . '</span>';
                }
                if ($value->status == "Selesai Diproses Fasgub" && $value->status_fasgub == "disetujui") {
                    $data[$i]->tahap1           = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->created_at)) . '</span>';
                    $data[$i]->tahap1_daerah    = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->created_at)) . '</span>';
                    $data[$i]->tahap2           = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->kpa_at)) . '</span>';
                    $data[$i]->tahap2_daerah    = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->kpa_at)) . '</span>';
                    $data[$i]->tahap3           = '<span class="bg-danger text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->verified_at)) . '</span>';
                    // $data[$i]->tahap3_daerah    = '<span class="bg-danger text-uppercase p-2" title="">'.date("d/m/Y H:i", strtotime($value->fasgub_at)).'</span>';
                    //$data[$i]->tahap4_daerah    = '<span class="bg-danger text-uppercase p-2" title="">'.date("d/m/Y H:i", strtotime($value->verified_at)).'</span>';
                }
                if ($value->status == "Disetujui" && $value->status_fasgub == "disetujui") {
                    $data[$i]->tahap1           = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->created_at)) . '</span>';
                    $data[$i]->tahap1_daerah    = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->created_at)) . '</span>';
                    $data[$i]->tahap2           = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->kpa_at)) . '</span>';
                    $data[$i]->tahap2_daerah    = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->kpa_at)) . '</span>';
                    $data[$i]->tahap3           = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->verified_at)) . '</span>';
                    $data[$i]->tahap3_daerah    = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->fasgub_at)) . '</span>';
                    $data[$i]->tahap4_daerah    = '<span class="bg-success text-uppercase p-2" title="">' . date("d/m/Y H:i", strtotime($value->verified_at)) . '</span>';
                }
                // if($value->approved_by == '1')
                // {
                //     $data[$i]->tahap1           = '<span class="bg-danger text-uppercase p-2" title="'.$value->approved_by.'">'.date("d/m/Y H:i", strtotime($value->created_at)).'</span>';
                //     $data[$i]->tahap1_daerah    = '<span class="bg-danger text-uppercase p-2" title="'.$value->approved_by.'">'.date("d/m/Y H:i", strtotime($value->created_at)).'</span>';
                // }
                // if($value->approved_by == '5')
                // {
                //     $data[$i]->tahap1           = '<span class="bg-danger text-uppercase p-2" title="'.$value->approved_by.'">'.date("d/m/Y H:i", strtotime($value->created_at)).'</span>';
                //     $data[$i]->tahap1_daerah    = '<span class="bg-danger text-uppercase p-2" title="'.$value->approved_by.'">'.date("d/m/Y H:i", strtotime($value->created_at)).'</span>';
                //     $data[$i]->tahap2           = '<span class="bg-danger text-uppercase p-2" title="'.$value->approved_by.'">'.date("d/m/Y H:i", strtotime($value->created_at)).'</span>';
                //     $data[$i]->tahap2_daerah    = '<span class="bg-danger text-uppercase p-2" title="'.$value->approved_by.'">'.date("d/m/Y H:i", strtotime($value->created_at)).'</span>';
                // }
                // if($value->approved_by == '7')
                // {
                //     $data[$i]->tahap1           = '<span class="bg-danger text-uppercase p-2" title="'.$value->approved_by.'">'.date("d/m/Y H:i", strtotime($value->created_at)).'</span>';
                //     $data[$i]->tahap1_daerah    = '<span class="bg-danger text-uppercase p-2" title="'.$value->approved_by.'">'.date("d/m/Y H:i", strtotime($value->created_at)).'</span>';
                //     $data[$i]->tahap2           = '<span class="bg-danger text-uppercase p-2" title="'.$value->approved_by.'">'.date("d/m/Y H:i", strtotime($value->created_at)).'</span>';
                //     $data[$i]->tahap2_daerah    = '<span class="bg-danger text-uppercase p-2" title="'.$value->approved_by.'">'.date("d/m/Y H:i", strtotime($value->created_at)).'</span>';
                //     $data[$i]->tahap3           = '<span class="bg-danger text-uppercase p-2" title="'.$value->approved_by.'">'.date("d/m/Y H:i", strtotime($value->created_at)).'</span>';
                //     $data[$i]->tahap3_daerah    = '<span class="bg-danger text-uppercase p-2" title="'.$value->approved_by.'">'.date("d/m/Y H:i", strtotime($value->created_at)).'</span>';
                // }
                // if($value->approved_by == '5')
                // {
                //     $data[$i]->tahap1           = '<span class="bg-danger text-uppercase p-2" title="'.$value->approved_by.'">'.date("d/m/Y H:i", strtotime($value->created_at)).'</span>';
                //     $data[$i]->tahap1_daerah    = '<span class="bg-danger text-uppercase p-2" title="'.$value->approved_by.'">'.date("d/m/Y H:i", strtotime($value->created_at)).'</span>';
                // }
                //

                if (Auth::user()->level == "0" || Auth::user()->level == "2") {
                    $data[$i]->keterangan_revisi     = '<a href="javascript:void(0)" onclick="openFormProses(' . $value->id . ', \'ppk\')">' . $value->nomor_surat . '<br> <small>' . $value->perihal . '</small>' . '</a>';

                    $data[$i]->aksi     = '<div class="btn-group">
                        <button type="button" class="btn btn-info">Action</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="openDetail(' . $value->id . ')">Lihat Detail</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="openFormProses(' . $value->id . ', \'ppk\')">Approval Pengajuan</a>
                        </div>
                    </div>
                    ';
                } else if (Auth::user()->level == "0" || Auth::user()->level == "5") {
                    $data[$i]->keterangan_revisi     = '<a href="javascript:void(0)" onclick="openFormProses(' . $value->id . ', \'bagren\')">' . $value->nomor_surat . '<br> <small>' . $value->perihal . '</small>' . '</a>';

                    $data[$i]->aksi     = '<div class="btn-group">
                        <button type="button" class="btn btn-info">Action</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="openDetail(' . $value->id . ')">Lihat Detail</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="openFormProses(' . $value->id . ', \'bagren\')">Verifikasi Pengajuan</a>
                        </div>
                    </div>
                    ';
                } else if (Auth::user()->level == "1") {
                    $data[$i]->keterangan_revisi     = '<a href="javascript:void(0)" onclick="openFormProses(' . $value->id . ', \'kpa\')">' . $value->nomor_surat . '<br> <small>' . $value->perihal . '</small>' . '</a>';

                    $data[$i]->aksi     = '<div class="btn-group">
                        <button type="button" class="btn btn-info">Action</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="openDetail(' . $value->id . ')">Lihat Detail</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="openFormProses(' . $value->id . ', \'kpa\')">Verifikasi Pengajuan</a>
                        </div>
                    </div>
                    ';
                } else if (Auth::user()->level == "7") {
                    $data[$i]->keterangan_revisi     = '<a href="javascript:void(0)" onclick="openFormProses(' . $value->id . ', \'fasgub\')">' . $value->nomor_surat . '<br> <small>' . $value->perihal . '</small>' . '</a>';

                    $data[$i]->aksi     = '<div class="btn-group">
                        <button type="button" class="btn btn-info">Action</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="openDetail(' . $value->id . ')">Lihat Detail</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="openFormProses(' . $value->id . ', \'fasgub\')">Verifikasi Pengajuan</a>
                        </div>
                    </div>
                    ';
                } else if (Auth::user()->level == "8" || Auth::user()->level == "9") {
                    $data[$i]->keterangan_revisi     = '<a href="javascript:void(0)" onclick="openFormProses(' . $value->id . ', \'ban\')">' . $value->nomor_surat . '<br> <small>' . $value->perihal . '</small>' . '</a>';

                    $data[$i]->aksi     = '<div class="btn-group">
                        <button type="button" class="btn btn-info">Action</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="openDetail(' . $value->id . ')">Lihat Detail</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="openFormProses(' . $value->id . ', \'ban\')">Verifikasi Pengajuan</a>
                        </div>
                    </div>
                    ';
                }

                if (strtolower($value->status) == "ditolak") {
                    $data[$i]->tahap1               = '<span class="bg-danger text-uppercase p-2">DITOLAK</span>';
                    $data[$i]->tahap2               = '<span class="bg-danger text-uppercase p-2">DITOLAK</span>';
                    $data[$i]->tahap3               = '<span class="bg-danger text-uppercase p-2">DITOLAK</span>';
                    $data[$i]->keterangan_revisi    = $value->nomor_surat . '<br> <small>' . $value->perihal . '</small>';
                }

                if ($value->provinsi == "undefined") {
                    $data[$i]->nama_provinsi        = "Pusat";
                } else {
                    $data[$i]->nama_provinsi        = $provinsi->where('id_prov', $value->provinsi)->first()->namaprov;
                }

                if ($value->direktorat == "0") {
                    $data[$i]->nama_direktorat      = "Dekon";
                } else {
                    $data[$i]->nama_direktorat      = $dir->where('id_dir', $value->direktorat)->first()->nama_dir;
                }

                $data[$i]->status_pengesahan        = '<span title="Belum Disahkan" class="text-danger text-uppercase p-2"><i class="fas fa-clock"></i></span>';

                if ($value->nomor_surat_pengesahan != null || !empty($value->nomor_surat_pengesahan)) {
                    $url                         = '<a title="Download Surat Pengesahan" href="' . env('APP_URL') . '/' . $value->token . '/ticketing"><span class="text-success text-uppercase p-2"> <i class="fas fa-download"></i> </span></a>';

                    $data[$i]->status_pengesahan = $url;
                }

                $i++;
            }

            return $data;
        } catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Submit. Please Try Again'
            ]);
        }
    }

    public function detailRevisi(Request $request)
    {
        $user       = new User;
        $provinsi   = new Provinsi;
        $direktorat = new Direktorat;
        $revisi     = new TicketRevisi;
        $pejabat    = new MasterPejabat;
        $dokumen    = new MasterDokumen;

        $data                   = $revisi->where('id', $request->id)->first();

        $data->tanggal_surat_masked     = dateMasked($data->tanggal_surat);
        $data->created_at_masked        = date("d/m/Y H:i:s", strtotime($data->created_at));

        $data->nama_lkp_pjb     = $data->nama_pejabat;
        $data->creator          = $user->where('id_akses', $data->created_by)->first()->nama;
        $data->nama_provinsi    = $provinsi->where('id_prov', $data->provinsi)->first()->namaprov;
        $data->nama_direktorat  = $direktorat->where('id_dir', $data->direktorat)->first()->nama_dir;

        if (is_numeric($data->nama_pejabat)) {
            $data->nama_lkp_pjb     = $pejabat->where('id', $data->nama_pejabat)->first()->nama_pejabat;
        }

        $data->download_nota_dinas_pptk  = '<a href="' . route('download.dokumen', ['jenis_file' => 'nota_dinas_pptk', 'nama_file' => $data->nota_dinas_pptk]) . '?id_ticket=' . $request->id . '" class="btn btn-success"> <i class="fas fa-download"></i> <br> Download</a>';

        $data->download_nota_dinas_ppk  = '<a href="' . route('download.dokumen', ['jenis_file' => 'nota_dinas_ppk', 'nama_file' => $data->nota_dinas_ppk]) . '?id_ticket=' . $request->id . '" class="btn btn-success"> <i class="fas fa-download"></i> <br> Download</a>';

        $data->download_kak  = '<a href="' . route('download.dokumen', ['jenis_file' => 'kak', 'nama_file' => $data->kak]) . '?id_ticket=' . $request->id . '" class="btn btn-success"> <i class="fas fa-download"></i> <br> Download</a>';

        $data->download_matrik_rab  = '<a href="' . route('download.dokumen', ['jenis_file' => 'matrik_rab', 'nama_file' => $data->matrik_rab]) . '?id_ticket=' . $request->id . '" class="btn btn-success"> <i class="fas fa-download"></i> <br> Download</a>';

        $data->download_dokumen_pendukung  = '<a href="' . route('download.dokumen', ['jenis_file' => 'dokumen_pendukung', 'nama_file' => $data->dokumen_pendukung]) . '?id_ticket=' . $request->id . '" class="btn btn-success"> <i class="fas fa-download"></i> <br> Download</a>';

        $data->download_lampiran_kabagkeu  = '-';

        $data->download_sp                 = "";

        $data->download_kpa = "-";

        if (strtolower($data->status) == "disetujui") {
            $data->download_sp  = '<a href="' . route('pengesahan-ticketing', ['token' => $data->token]) . '" class="btn btn-success btn-block"> <i class="fas fa-download"></i> &nbsp; Download Surat Pengesahan</a>';
        }

        // Dokumen Pengantar Kabagren
        $dokumen_kabagren = $dokumen->where('id', $data->lampiran_kabagren)->first();

        $data->download_nota_pengantar_kabagren  = '-';

        if ($data->kak == "Tidak Ada File") {
            $data->download_kak  = '-';
        }

        if ($data->matrik_rab == "Tidak Ada File") {
            $data->download_matrik_rab  = '-';
        }

        if ($data->dokumen_pendukung == "Tidak Ada File") {
            $data->download_dokumen_pendukung  = '-';
        }

        if ($data->nota_dinas_pptk == "Tidak Ada File") {
            $data->download_nota_dinas_pptk  = '-';
        }

        if ($data->lampiran_kabagren != null || !empty($data->lampiran_kabagren)) {
            $data->download_nota_pengantar_kabagren  = '<a href="' . env('APP_URL') . $dokumen_kabagren->path . $dokumen_kabagren->file . '?id_ticket=' . $request->id . '" class="btn btn-success"> <i class="fas fa-download"></i> <br> Download</a>';
        }

        if ($data->lampiran_kpa != null || !empty($data->lampiran_kpa)) {
            $data->download_kpa  = $data->download_kpa  = '<a href="' . route('download.dokumen', ['jenis_file' => 'lampiran_kpa', 'nama_file' => $data->lampiran_kpa]) . '?id_ticket=' . $request->id . '" class="btn btn-success"> <i class="fas fa-download"></i> <br> Download</a>';
        }

        if ($data->lampiran_kabagkeu != null || !empty($data->lampiran_kabagkeu)) {
            $data->download_lampiran_kabagkeu  = $data->download_lampiran_kabagkeu  = '<a href="' . route('download.dokumen', ['jenis_file' => 'lampiran_kabagkeu', 'nama_file' => $data->lampiran_kabagkeu]) . '?id_ticket=' . $request->id . '" class="btn btn-success"> <i class="fas fa-download"></i> <br> Download</a>';
        }

        $nota_pengantar_kabagren = $dokumen->where(['direktorat' => $data->direktorat, 'owned_by' => '5', 'status' => '1'])->get();

        $data->nota_pengantar_kabagren = "Belum Ada Nota Pengantar";
        $data->id_nota_pengantar_kabagren = "none";

        // if(!empty($nota_pengantar_kabagren))
        // {
        //     $nota_pengantar_kabagren = $dokumen->where(['direktorat' => $data->direktorat, 'owned_by' => '5', 'status' => '1'])->first();

        //     $data->nota_pengantar_kabagren = '<a href="'.env('APP_URL').$nota_pengantar_kabagren->path.$nota_pengantar_kabagren->file.'" target="_blank">'.$nota_pengantar_kabagren->file.'</a>';
        //     $data->id_nota_pengantar_kabagren = $nota_pengantar_kabagren->id;
        // }

        return $data;
    }

    public function removeRevisi(Request $request)
    {
        try {
            $revisi = new TicketRevisi;

            $revisi->where('id', $request->id)->delete();
            $this->record($request->id, "Menghapus Revisi E-Ticketing", Auth::user()->id_akses);

            return response()->json([
                'status'    => 'success',
                'title'     => 'Tiket Revisi Berhasil Dihapus',
                'message'   => 'Tiket Revisi Berhasil Dihapus'
            ]);
        } catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Processing. Please Try Again'
            ]);
        }
    }

    public function verifikasiRevisi(Request $request)
    {
        $catatan    = [];

        if ($request->has('catatan') && !empty($request->catatan)) {
            $catatan    = [];
            $notes      = explode('|', $request->catatan);

            foreach ($notes as $note) {
                if (!empty($note)) {
                    $catatan[] = $note;
                }
            }
        }

        try {
            $user           = new User;
            $dir            = new Direktorat;
            $revisi         = new TicketRevisi;
            $tools          = new ToolsController;

            $created_by     = $revisi->where('id', $request->id)->first()->created_by;
            $nomor_surat    = $revisi->where('id', $request->id)->first()->nomor_surat;
            $approved_by    = $revisi->where('id', $request->id)->first()->approved_by;

            $catatan_simpan = "<ol>";

            foreach ($catatan as $value) {
                $catatan_simpan .= '<li>' . $value . '</li>';
            }

            $catatan_simpan .= "</ol>";

            if ($request->status == "disetujui") {
                $revisi->where('id', $request->id)->update([
                    'catatan_verifikasi'    => $catatan,
                    'status'                => "Selesai Diproses Bagren",
                    'status_verifikasi'     => $request->status,
                    'verified_at'           => date("Y-m-d H:i:s"),
                    'verified_by'           => Auth::user()->id_akses
                ]);

                $message_pptk   = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: " . $nomor_surat . " Sudah Diproses oleh Bagren dan akan diteruskan ke Kepala Bagian Perencanaan untuk ditindak lanjut penerbitan POK";

                $message_ppk   = "Pengajuan Revisi E-Ticketing Nomor Surat: " . $nomor_surat . " Selesai Diproses oleh Bagren";

                $message_bagren    = "Anda sudah melakukan approval dan saat ini usulan Revisi E-Ticketing baru dengan Nomor Surat: " . $nomor_surat . " akan ditindak lanjut penerbitan POK";

                $no_hp_ppk = $user->where([
                    'id_akses'    => $approved_by
                ])->first()->no_hp;

                $no_hp_pptk = $user->where([
                    'id_akses'    => $created_by
                ])->first()->no_hp;

                $tools->sendingWa($no_hp_ppk, $message_ppk, $nomor_surat, "Tickting Revisi");
                $tools->sendingWa($no_hp_pptk, $message_pptk, $nomor_surat, "Tickting Revisi");
                $tools->sendingWa(Auth::user()->no_hp, $message_bagren, $nomor_surat, "Tickting Revisi");

                $this->record($request->id, "Menyetujui Revisi E-Ticketing. Catatan: " . $catatan_simpan, Auth::user()->id_akses);
            } else {
                $tolak = $revisi->where('id', $request->id)->first()->tolak;
                $jumlah_tolak = $tolak + 1;

                if ($jumlah_tolak >= 3) {
                    $revisi->where('id', $request->id)->update([
                        'catatan_verifikasi'    => $catatan,
                        'status'                => "DITOLAK",
                        'status_approval'       => NULL,
                        'status_verifikasi'     => NULL,
                        'verified_at'           => date("Y-m-d H:i:s"),
                        'verified_by'           => Auth::user()->id_akses,
                        'tolak'                 => $jumlah_tolak
                    ]);
                } else {
                    $revisi->where('id', $request->id)->update([
                        'catatan_verifikasi'    => $catatan,
                        'status'                => "BUTUH PERBAIKAN",
                        'status_approval'       => NULL,
                        'status_verifikasi'     => NULL,
                        'verified_at'           => date("Y-m-d H:i:s"),
                        'verified_by'           => Auth::user()->id_akses,
                        'tolak'                 => $jumlah_tolak
                    ]);
                }

                $message_pptk   = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: " . $nomor_surat . " *DITOLAK* oleh Bagren. Segera perbaiki dokumen Anda sesuai catatan dari Bagren";

                $tools->sendingWa(Auth::user()->no_hp, $message_pptk, $nomor_surat, "Tickting Revisi");

                $this->record($request->id, "Menolak Revisi E-Ticketing. Catatan: " . $catatan_simpan, Auth::user()->id_akses);
            }

            $message_bang_arief = "Ijin Bang Arief, " . Auth::user()->nama . " (Bagren) telah memproses Revisi E-Ticketing dengan Nomor Surat: " . $nomor_surat . " [action: " . $request->status . "]";
            $tools->sendingWa("081213833316", $message_bang_arief, $nomor_surat, "Tickting Revisi");

            return response()->json([
                'status'    => 'success',
                'title'     => 'Status Pengajuan Berhasil Diubah',
                'message'   => 'Status Pengajuan Berhasil Diubah'
            ]);
        } catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Processing. Please Try Again'
            ]);
        }
    }

    public function approvalRevisi(Request $request)
    {
        $user       = new User;
        $catatan    = [];

        if ($request->has('catatan') && !empty($request->catatan)) {
            $catatan    = [];
            $notes      = explode('|', $request->catatan);

            foreach ($notes as $note) {
                if (!empty($note)) {
                    $catatan[] = $note;
                }
            }
        }

        try {
            $dir            = new Direktorat;
            $revisi         = new TicketRevisi;
            $nota_dinas_ppk = "Tidak Ada File";
            $tools          = new ToolsController;

            $nomor_surat = $revisi->where('id', $request->id)->first()->nomor_surat;
            $created_by  = $revisi->where('id', $request->id)->first()->created_by;

            $catatan_simpan = "<ol>";

            foreach ($catatan as $value) {
                $catatan_simpan .= '<li>' . $value . '</li>';
            }

            $catatan_simpan .= "</ol>";

            if ($request->hasFile('nota_dinas_ppk')) {
                $direktorat         = $dir->where('id_dir', $revisi->where('id', $request->id)->first()->direktorat)->first()->nama_dir;
                $nota_dinas_ppk     = $this->uploadFile($request, 'nota_dinas_ppk', $direktorat);
            }

            if ($request->status == "disetujui") {
                $revisi->where('id', $request->id)->update([
                    'catatan_approval'  => $catatan,
                    'nota_dinas_ppk'    => $nota_dinas_ppk,
                    'status_approval'   => $request->status,
                    'status'            => "Selesai Diproses PPK",
                    'approved_at'       => date("Y-m-d H:i:s"),
                    'approved_by'       => Auth::user()->id_akses
                ]);

                $message_pptk   = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: " . $nomor_surat . " Sudah Diproses oleh PPK dan akan diteruskan ke Bagian Perencanaan untuk ditindak lanjut";

                $message_bagren = "Revisi E-Ticketing baru dengan Nomor Surat: " . $nomor_surat . " selesai diproses oleh PPK dan diteruskan ke Bagian Perencanaan. Mohon segera ditindak lanjut";

                $message_ppk    = "Anda sudah melakukan approval dan saat ini usulan revisi dengan Nomor Surat: " . $nomor_surat . " telah diteruskan ke Bagian Perencanaan untuk proses lebih lanjut";

                $no_hp_pptk = $user->where([
                    'id_akses'    => $created_by
                ])->first()->no_hp;

                $no_hp_bagren = $user->where('direktorat_handle', 'like', '%' . Auth::user()->id_dir . '%')->where([
                    'level'     => 5,
                    'prov'      => 'pusat'
                ])->first()->no_hp;

                $tools->sendingWa($no_hp_pptk, $message_pptk, $nomor_surat, "Tickting Revisi");
                $tools->sendingWa($no_hp_bagren, $message_bagren, $nomor_surat, "Tickting Revisi");
                $tools->sendingWa(Auth::user()->no_hp, $message_ppk, $nomor_surat, "Tickting Revisi");

                $this->record($request->id, "Menyetujui Revisi E-Ticketing. Dokumen: " . $nota_dinas_ppk . ". Catatan: " . $catatan_simpan, Auth::user()->id_akses);
            } else {
                $revisi->where('id', $request->id)->update([
                    'catatan_approval'  => $catatan,
                    'nota_dinas_ppk'    => $nota_dinas_ppk,
                    'status_approval'   => NULL,
                    'status'            => "BUTUH PERBAIKAN",
                    'approved_at'       => date("Y-m-d H:i:s"),
                    'approved_by'       => Auth::user()->id_akses
                ]);

                $message_pptk   = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: " . $nomor_surat . " *DITOLAK* oleh PPK. Mohon segera diperbaiki sesuai catatan dari PPK";

                $message_ppk    = "Anda sudah menolak usulan revisi dengan Nomor Surat: " . $nomor_surat . ".";

                $no_hp_pptk = $user->where([
                    'id_akses'    => $created_by
                ])->first()->no_hp;

                // $tools->sendingWa(Auth::user()->no_hp, $message_pptk);
                $tools->sendingWa($no_hp_pptk, $message_pptk, $nomor_surat, "Tickting Revisi");
                $tools->sendingWa(Auth::user()->no_hp, $message_ppk, $nomor_surat, "Tickting Revisi");

                $this->record($request->id, "Menolak Revisi E-Ticketing. Dokumen: " . $nota_dinas_ppk . ". Catatan: " . $catatan_simpan, Auth::user()->id_akses);
            }

            $message_bang_arief = "Ijin Bang Arief, " . Auth::user()->nama . " (PPK) telah memproses Revisi E-Ticketing dengan Nomor Surat: " . $nomor_surat . " [action: " . $request->status . "]";
            $tools->sendingWa("081213833316", $message_bang_arief, $nomor_surat, "Tickting Revisi");

            return response()->json([
                'status'    => 'success',
                'title'     => 'Status Pengajuan Berhasil Diubah',
                'message'   => 'Status Pengajuan Berhasil Diubah'
            ]);
        } catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Processing. Please Try Again'
            ]);
        }
    }

    public function submitBagren(Request $request)
    {
        $catatan    = [];
        $tembusan_pengesahan    = [];
        $deskripsi_pengesahan   = [];

        if ($request->has('catatan') && !empty($request->catatan)) {
            $catatan    = [];
            $notes      = explode('|', $request->catatan);

            foreach ($notes as $note) {
                if (!empty($note)) {
                    $catatan[] = $note;
                }
            }
        }

        if ($request->has('deskripsi_pengesahan') && !empty($request->deskripsi_pengesahan)) {
            $deskripsi_pengesahan    = [];
            $deskripsis      = explode('|', $request->deskripsi_pengesahan);

            foreach ($deskripsis as $deskripsi) {
                if (!empty($deskripsi)) {
                    $deskripsi_pengesahan[] = $deskripsi;
                }
            }
        }

        if ($request->has('tembusan') && !empty($request->tembusan)) {
            $tembusans              = explode('|', $request->tembusan);
            $tembusan_pengesahan    = [];

            foreach ($tembusans as $tembusan) {
                if (!empty($tembusan)) {
                    $tembusan_pengesahan[] = $tembusan;
                }
            }
        }

        try {
            $user           = new User;
            $dir            = new Direktorat;
            $revisi         = new TicketRevisi;
            $tools          = new ToolsController;

            $data_old    = $revisi->where('id', $request->id)->first();
            $nomor_surat = $revisi->where('id', $request->id)->first()->nomor_surat;

            $catatan_simpan = "<ol>";

            foreach ($catatan as $value) {
                $catatan_simpan .= '<li>' . $value . '</li>';
            }

            $catatan_simpan .= "</ol>";


            if ($request->status == "disetujui") {

                if ($data_old->provinsi == "undefined") {
                    $revisi->where('id', $request->id)->update([
                        'catatan_verifikasi'    => $catatan,
                        'status'                => "Selesai Diproses Bagren",
                        'status_verifikasi'     => $request->status,
                        'verified_at'           => date("Y-m-d H:i:s"),
                        'verified_by'           => Auth::user()->id_akses
                    ]);

                    $message_ppk   = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: " . $nomor_surat . " Sudah Diproses oleh Bagren dan akan diteruskan ke KPA untuk ditindak lanjut penerbitan POK";

                    $message_kpa = "Revisi E-Ticketing baru dengan Nomor Surat: " . $nomor_surat . " selesai diproses oleh Bagian Perencanaan dan diteruskan ke KPA. Mohon segera ditindak lanjut";

                    $tools->sendingWa(Auth::user()->no_hp, $message_ppk, $nomor_surat, "Tickting Revisi");
                    $tools->sendingWa(Auth::user()->no_hp, $message_kpa, $nomor_surat, "Tickting Revisi");
                } else {
                    if (!empty($request->nomor_surat_pengesahan)) {
                        $revisi->where('id', $request->id)->update([
                            'catatan_verifikasi'    => $catatan,
                            'status'                => "Disetujui",
                            'status_verifikasi'     => 'disetujui',
                            'verified_at'           => date("Y-m-d H:i:s"),
                            'tanggal_pengesahan'    => date("Y-m-d", strtotime($request->tanggal_pengesahan)),
                            'nomor_surat_pengesahan' => $request->nomor_surat_pengesahan,
                            'deskripsi_pengesahan'  => $deskripsi_pengesahan,
                            'tembusan'              => $tembusan_pengesahan,
                            'verified_by'           => Auth::user()->id_akses
                        ]);

                        $message_ppk   = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: " . $nomor_surat . " Sudah Diproses oleh Bagren. Silakan kunjungi link berikut untuk download surat persetujuan revisi: " . env('APP_URL') . "/" . $data_old->token . "/ticketing atau download melalui Aplikasi E-Monev";
                    } else {
                        $revisi->where('id', $request->id)->update([
                            'catatan_verifikasi'    => $catatan,
                            'status'                => "Disetujui Bagren",
                            'status_verifikasi'     => $request->status,
                            'verified_at'           => date("Y-m-d H:i:s"),
                            'verified_by'           => Auth::user()->id_akses
                        ]);

                        $message_ppk    = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: " . $nomor_surat . " Sudah Diproses oleh Bagren.";
                        $message_fasgub = Auth::user()->nama . " Telah menyetujui Revisi E-Ticketing dengan Nomor Surat: " . $nomor_surat . ". Silakan diproses agar bisa diterbitkan surat persetujuan oleh bagren.";

                        $no_hp_fasgub = $user->where('prov_handle', 'like', '%' . $data_old->provinsi . '%')->where([
                            'level'     => 7
                        ])->first()->no_hp;

                        $tools->sendingWa($no_hp_fasgub, $message_fasgub, $nomor_surat, "Tickting Revisi");
                    }

                    $no_hp_ppk = $user->where([
                        'id_akses'    => $data_old->created_by
                    ])->first()->no_hp;

                    $tools->sendingWa($no_hp_ppk, $message_ppk, $nomor_surat, "Tickting Revisi");
                }

                $this->record($request->id, "Menyetujui Revisi E-Ticketing. Catatan: " . $catatan_simpan, Auth::user()->id_akses);
            } else {
                $revisi->where('id', $request->id)->update([
                    'catatan_verifikasi'    => $catatan,
                    'status'                => "BUTUH PERBAIKAN",
                    'status_approval'       => NULL,
                    'status_verifikasi'     => NULL,
                    'status_fasgub'         => NULL,
                    'verified_at'           => date("Y-m-d H:i:s"),
                    'verified_by'           => Auth::user()->id_akses
                ]);

                $message_pptk   = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: " . $nomor_surat . " *DITOLAK* oleh Bagren. Segera perbaiki dokumen Anda sesuai catatan dari Bagren";

                $tools->sendingWa(Auth::user()->no_hp, $message_pptk, $nomor_surat, "Tickting Revisi");

                $this->record($request->id, "Menolak Revisi E-Ticketing. Catatan: " . $catatan_simpan, Auth::user()->id_akses);
            }

            return response()->json([
                'status'    => 'success',
                'title'     => 'Status Pengajuan Berhasil Diubah',
                'message'   => 'Status Pengajuan Berhasil Diubah'
            ]);
        } catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Processing. Please Try Again'
            ]);
        }
    }

    public function submitFasgub(Request $request)
    {
        $catatan    = [];

        if ($request->has('catatan') && !empty($request->catatan)) {
            $catatan    = [];
            $notes      = explode('|', $request->catatan);

            foreach ($notes as $note) {
                if (!empty($note)) {
                    $catatan[] = $note;
                }
            }
        }

        try {
            $user           = new User;
            $dir            = new Direktorat;
            $revisi         = new TicketRevisi;
            $tools          = new ToolsController;

            $data_old    = $revisi->where('id', $request->id)->first();
            $nomor_surat = $revisi->where('id', $request->id)->first()->nomor_surat;

            $no_hp_ppk = $user->where([
                'id_akses'    => $data_old->created_by
            ])->first()->no_hp;

            $no_hp_bagren = $user->where('prov_handle', 'like', '%' . $data_old->provinsi . '%')->where([
                'level'     => 5
            ])->first()->no_hp;

            if ($request->status == "disetujui") {
                $revisi->where('id', $request->id)->update([
                    'catatan_fasgub'    => $catatan,
                    'status_fasgub'     => $request->status,
                    'status_verifikasi' => null,
                    'status'            => "Selesai Diproses Fasgub",
                    'fasgub_at'         => date("Y-m-d H:i:s"),
                    'fasgub_by'         => Auth::user()->id_akses
                ]);

                $message_ppk        = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: " . $nomor_surat . " Sudah Diproses oleh Fasgub dan akan diteruskan ke Bagian Perencanaan untuk ditindak lanjut";

                $message_bagren     = "Revisi E-Ticketing baru dengan Nomor Surat: " . $nomor_surat . " selesai diproses oleh Fasgub dan diteruskan ke Bagian Perencanaan untuk diterbitkan surat pengesahan. Mohon segera ditindak lanjut";

                $tools->sendingWa($no_hp_ppk, $message_ppk, $nomor_surat, "Tickting Revisi");
                $tools->sendingWa($no_hp_bagren, $message_bagren, $nomor_surat, "Tickting Revisi");
            } else {
                $revisi->where('id', $request->id)->update([
                    'catatan_fasgub'  => $catatan,
                    'status_fasgub'   => NULL,
                    'status'          => "BUTUH PERBAIKAN",
                    'fasgub_at'       => date("Y-m-d H:i:s"),
                    'fasgub_by'       => Auth::user()->id_akses
                ]);

                $message_ppk   = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: " . $nomor_surat . " *DITOLAK* oleh Fasgub. Mohon segera diperbaiki sesuai catatan dari Fasgub";

                $tools->sendingWa($no_hp_ppk, $message_ppk, $nomor_surat, "Tickting Revisi");
            }

            $catatan_simpan = "<ol>";

            foreach ($catatan as $value) {
                $catatan_simpan .= '<li>' . $value . '</li>';
            }

            $catatan_simpan .= "</ol>";

            $this->record($request->id, "Melakukan Approval Revisi E-Ticketing. Catatan: " . $catatan_simpan, Auth::user()->id_akses);

            return response()->json([
                'status'    => 'success',
                'title'     => 'Status Pengajuan Berhasil Diubah',
                'message'   => 'Status Pengajuan Berhasil Diubah'
            ]);
        } catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Processing. Please Try Again'
            ]);
        }
    }

    public function submitBan(Request $request)
    {
        $catatan    = [];

        if ($request->has('catatan') && !empty($request->catatan)) {
            $catatan    = [];
            $notes      = explode('|', $request->catatan);

            foreach ($notes as $note) {
                if (!empty($note)) {
                    $catatan[] = $note;
                }
            }
        }

        try {
            $dir            = new Direktorat;
            $revisi         = new TicketRevisi;
            $tools          = new ToolsController;

            $nomor_surat = $revisi->where('id', $request->id)->first()->nomor_surat;

            if ($request->status == "disetujui") {
                $revisi->where('id', $request->id)->update([
                    'catatan_ban'   => $catatan,
                    'status_ban'    => $request->status,
                    'status'        => "Selesai Diproses ban",
                    'ban_at'        => date("Y-m-d H:i:s"),
                    'ban_by'        => Auth::user()->id_akses
                ]);

                $message_ppk        = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: " . $nomor_surat . " Sudah Diproses oleh SUBDIT BAN dan akan diteruskan ke Bagian Perencanaan untuk ditindak lanjut";

                $message_bagren     = "Revisi E-Ticketing baru dengan Nomor Surat: " . $nomor_surat . " selesai diproses oleh SUBDIT BAN dan diteruskan ke Bagian Perencanaan. Mohon segera ditindak lanjut";

                $tools->sendingWa(Auth::user()->no_hp, $message_ppk, $nomor_surat, "Tickting Revisi");
                $tools->sendingWa(Auth::user()->no_hp, $message_bagren, $nomor_surat, "Tickting Revisi");
            } else {
                $revisi->where('id', $request->id)->update([
                    'catatan_ban'  => $catatan,
                    'status_ban'   => NULL,
                    'status'          => "BUTUH PERBAIKAN",
                    'ban_at'       => date("Y-m-d H:i:s"),
                    'ban_by'       => Auth::user()->id_akses
                ]);

                $message_ppk   = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: " . $nomor_surat . " *DITOLAK* oleh SUBDIT BAN. Mohon segera diperbaiki sesuai catatan dari SUBDIT BAN";

                $tools->sendingWa(Auth::user()->no_hp, $message_ppk, $nomor_surat, "Tickting Revisi");
            }

            $catatan_simpan = "<ol>";

            foreach ($catatan as $value) {
                $catatan_simpan .= '<li>' . $value . '</li>';
            }

            $catatan_simpan .= "</ol>";

            $this->record($request->id, "Melakukan Approval Revisi E-Ticketing. Catatan: " . $catatan_simpan, Auth::user()->id_akses);

            return response()->json([
                'status'    => 'success',
                'title'     => 'Status Pengajuan Berhasil Diubah',
                'message'   => 'Status Pengajuan Berhasil Diubah'
            ]);
        } catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Processing. Please Try Again'
            ]);
        }
    }

    public function submitKpa(Request $request)
    {
        $catatan    = [];

        if ($request->has('catatan') && !empty($request->catatan)) {
            $catatan    = [];
            $notes      = explode('|', $request->catatan);

            foreach ($notes as $note) {
                if (!empty($note)) {
                    $catatan[] = $note;
                }
            }
        }

        try {
            $user           = new User;
            $dir            = new Direktorat;
            $revisi         = new TicketRevisi;
            $tools          = new ToolsController;
            $nota_dinas_kpa = "Tidak Ada File";

            $data_old = $revisi->where('id', $request->id)->first();
            $nomor_surat = $revisi->where('id', $request->id)->first()->nomor_surat;

            if ($request->hasFile('nota_dinas_kpa')) {
                $direktorat         = $dir->where('id_dir', $revisi->where('id', $request->id)->first()->direktorat)->first()->nama_dir;
                $nota_dinas_kpa     = $this->uploadFile($request, 'nota_dinas_kpa', $direktorat);
            }

            if ($request->status == "disetujui") {
                $revisi->where('id', $request->id)->update([
                    'catatan_kpa'   => $catatan,
                    'lampiran_kpa'  => $nota_dinas_kpa,
                    'status_kpa'    => $request->status,
                    'no_nota_kpa'   => $request->no_nota_kpa,
                    'status'        => "Selesai Diproses KPA",
                    'kpa_at'     => date("Y-m-d H:i:s"),
                    'kpa_by'     => Auth::user()->id_akses
                ]);

                $no_hp_bagren = $user->where('prov_handle', 'like', '%' . $data_old->provinsi . '%')->where([
                    'level'     => 5
                ])->first()->no_hp;

                $message_ppk        = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: " . $nomor_surat . " Disetujui Oleh KPA";
                $message_bagren     = "Pengajuan Revisi E-Ticketing dengan Nomor Surat: " . $nomor_surat . " Disetujui Oleh KPA dan diteruskan ke Bagren. Silakan diproses";

                $tools->sendingWa(Auth::user()->no_hp, $message_ppk, $nomor_surat, "Tickting Revisi");
                $tools->sendingWa(Auth::user()->no_hp_bagren, $message_bagren, $nomor_surat, "Tickting Revisi");
            } else {
                $revisi->where('id', $request->id)->update([
                    'catatan_fasgub'  => $catatan,
                    'status_kpa'      => NULL,
                    'status_fasgub'   => NULL,
                    'status_verifikasi'   => NULL,
                    'no_nota_kpa'     => NULL,
                    'status'          => "BUTUH PERBAIKAN",
                    'fasgub_at'       => date("Y-m-d H:i:s"),
                    'fasgub_by'       => Auth::user()->id_akses
                ]);

                $message_ppk   = "Pengajuan Revisi E-Ticketing Anda dengan Nomor Surat: " . $nomor_surat . " *DITOLAK* oleh KPA. Mohon segera diperbaiki sesuai catatan dari Fasgub";

                $tools->sendingWa(Auth::user()->no_hp, $message_ppk, $nomor_surat, "Tickting Revisi");
            }

            $catatan_simpan = "<ol>";

            foreach ($catatan as $value) {
                $catatan_simpan .= '<li>' . $value . '</li>';
            }

            $catatan_simpan .= "</ol>";

            $this->record($request->id, "Melakukan Approval Revisi E-Ticketing. Catatan: " . $catatan_simpan, Auth::user()->id_akses);

            return response()->json([
                'status'    => 'success',
                'title'     => 'Status Pengajuan Berhasil Diubah',
                'message'   => 'Status Pengajuan Berhasil Diubah'
            ]);
        } catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Oopps.. Error Processing. Please Try Again'
            ]);
        }
    }

    public function uploadFile($request, $type, $direktorat)
    {
        $files = $request->File($type);

        if (!empty($files)) {
            $ext        = $type . "_" . strtotime(date("Y-m-d H:i:s")) . "." . $files->clientExtension();
            $name_file  = $ext;

            $files->storeAs('./assets/files/' . $direktorat . '/', $ext);

            return $name_file;
        }
    }

    public function uploadFileFormatted($request, $type, $direktorat, $isNew = true)
    {
        $files = $request->File($type);

        if (!empty($files)) {
            $ticket = new TicketRevisi;

            $filenameFormatted = $ticket->getIncrementFilename($request, $type) . '.' . $files->clientExtension();
            $files->storeAs('./assets/files/' . $direktorat . '/', $filenameFormatted);

            return $filenameFormatted;
        }
    }

    public function record($id_ticketing, $activity, $user, $nota_dinas_ppk = null, $matrik_rab = null, $dokumen_pendukung = null)
    {
        $log = new LogTicket;

        $log->create([
            'user'              => $user,
            'activity'          => $activity,
            'nota_dinas_ppk'    => $nota_dinas_ppk,
            'matrik_rab'        => $matrik_rab,
            'dokumen_pendukung' => $dokumen_pendukung,
            'id_ticketing'      => $id_ticketing
        ]);
    }

    public function loadHistory(Request $request)
    {
        $log    = new LogTicket;
        $ticket = new TicketRevisi;

        $revisi = $ticket->where('id', $request->id_ticketing)->first();
        $data   = $log
            ->select('*', 'tb_log_ticketing.created_at as log_time')
            ->leftJoin('tb_akses', 'tb_log_ticketing.user', '=', 'tb_akses.id_akses')
            ->where('id_ticketing', $request->id_ticketing)->orderBy('tb_log_ticketing.created_at', 'DESC')->get();

        $return = '<div class="timeline timeline-inverse">';

        if ($revisi->nomor_surat_pengesahan != null || !empty($revisi->nomor_surat_pengesahan)) {
            $return .= '<div>
                <i class="fas fa-file bg-info"></i>

                <div class="timeline-item">
                    <span class="time">' . date("d/m/Y H:i", strtotime($revisi->updated_at)) . '</span>

                    <h3 class="timeline-header"><a href="#">Link Download Surat Pengesahan Aktif</a> </h3>

                    <div class="timeline-body">
                        Silakan klik link berikut untuk download surat pengesahan: <a href="' . env('APP_URL') . '/' . $revisi->token . '/ticketing">' . env('APP_URL') . '/' . $revisi->token . '/ticketing</a>
                    </div>
                </div>
            </div>';
        }

        foreach ($data as $value) {
            $return .= '<div>
                <i class="fas fa-file bg-info"></i>

                <div class="timeline-item">
                    <span class="time">' . date("d/m/Y H:i", strtotime($value->log_time)) . '</span>

                    <h3 class="timeline-header"><a href="#">' . $value->nama . '</a> </h3>

                    <div class="timeline-body">
                        ' . $value->activity . '
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

    public function summarize(Request $request)
    {
        $model  = new TicketRevisi;
        $model1 = new Usulan;
        $model2 = new Direktorat;

        $return = [
            [
                'jenis_summarize'   => 'Jumlah Revisi',
                'dekon'             => $model
                    ->where([
                        'direktorat'    => '1237',
                        'provinsi'      => 'undefined'
                    ])
                    ->whereMonth('tanggal_surat', $request->bulan)
                    ->whereYear('tanggal_surat', $request->tahun)->count(),
                'waskoban'          => $model
                    ->where([
                        'direktorat'    => '1238',
                        'provinsi'      => 'undefined'
                    ])
                    ->whereMonth('tanggal_surat', $request->bulan)
                    ->whereYear('tanggal_surat', $request->tahun)->count(),
                'polpp'             => $model
                    ->where([
                        'direktorat'    => '1239',
                        'provinsi'      => 'undefined'
                    ])
                    ->whereMonth('tanggal_surat', $request->bulan)
                    ->whereYear('tanggal_surat', $request->tahun)->count(),
                'topobad'           => $model
                    ->where([
                        'direktorat'    => '1241',
                        'provinsi'      => 'undefined'
                    ])
                    ->whereMonth('tanggal_surat', $request->bulan)
                    ->whereYear('tanggal_surat', $request->tahun)->count(),
                'mpbk'              => $model
                    ->where([
                        'direktorat'    => '1240',
                        'provinsi'      => 'undefined'
                    ])
                    ->whereMonth('tanggal_surat', $request->bulan)
                    ->whereYear('tanggal_surat', $request->tahun)->count(),
                'sekre'             => $model
                    ->where([
                        'direktorat'    => '1242',
                        'provinsi'      => 'undefined'
                    ])
                    ->whereMonth('tanggal_surat', $request->bulan)
                    ->whereYear('tanggal_surat', $request->tahun)->count(),
                'total'             => $model
                    ->where([
                        'provinsi'      => 'undefined'
                    ])
                    ->whereMonth('tanggal_surat', $request->bulan)
                    ->whereYear('tanggal_surat', $request->tahun)->count()
            ],
            [
                'jenis_summarize'   => 'Jumlah Usulan Kegiatan',
                'dekon'             => $model1
                    ->where([
                        'direktorat'    => '1237',
                        'provinsi'      => 'undefined'
                    ])
                    ->whereMonth('tanggal_surat', $request->bulan)
                    ->whereYear('tanggal_surat', $request->tahun)->count(),
                'waskoban'          => $model1
                    ->where([
                        'direktorat'    => '1238',
                        'provinsi'      => 'undefined'
                    ])
                    ->whereMonth('tanggal_surat', $request->bulan)
                    ->whereYear('tanggal_surat', $request->tahun)->count(),
                'polpp'             => $model1
                    ->where([
                        'direktorat'    => '1239',
                        'provinsi'      => 'undefined'
                    ])
                    ->whereMonth('tanggal_surat', $request->bulan)
                    ->whereYear('tanggal_surat', $request->tahun)->count(),
                'topobad'           => $model1
                    ->where([
                        'direktorat'    => '1241',
                        'provinsi'      => 'undefined'
                    ])
                    ->whereMonth('tanggal_surat', $request->bulan)
                    ->whereYear('tanggal_surat', $request->tahun)->count(),
                'mpbk'              => $model1
                    ->where([
                        'direktorat'    => '1240',
                        'provinsi'      => 'undefined'
                    ])
                    ->whereMonth('tanggal_surat', $request->bulan)
                    ->whereYear('tanggal_surat', $request->tahun)->count(),
                'sekre'             => $model1
                    ->where([
                        'direktorat'    => '1242',
                        'provinsi'      => 'undefined'
                    ])
                    ->whereMonth('tanggal_surat', $request->bulan)
                    ->whereYear('tanggal_surat', $request->tahun)->count(),
                'total'             => $model1
                    ->where([
                        'provinsi'      => 'undefined'
                    ])
                    ->whereMonth('tanggal_surat', $request->bulan)
                    ->whereYear('tanggal_surat', $request->tahun)->count(),
            ]
        ];

        return $return;
    }
}
