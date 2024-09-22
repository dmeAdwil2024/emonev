<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class TicketRevisi extends Model
{
    protected $table    = 'tb_ticket_rev';
    protected $fillable = ['token', 'key', 'tahun_anggaran', 'nomor_surat', 'tanggal_surat', 'satker', 'kode_satker', 'nama_satker', 'provinsi', 'direktorat', 'jenis_revisi', 'nama_pejabat', 'jabatan', 'perihal', 'nota_dinas_pptk', 'nota_dinas_pptk_old', 'nota_pptk_download_keu_at', 'nota_dinas_ppk', 'nota_dinas_ppk_old', 'nota_dinas_ppk_download_keu_at', 'matrik_rab', 'matrik_rab_old', 'rab_download_keu_at', 'kak', 'kak_old', 'kak_download_keu_at', 'dokumen_pendukung', 'dokumen_pendukung_old', 'dokumen_pendukung_download_keu_at', 'keterangan', 'status', 'current_status', 'status_approval', 'catatan_approval', 'catatan_verifikasi', 'approved_by', 'approved_at', 'verified_by', 'status_verifikasi', 'verified_at', 'status_kabagren', 'lampiran_kabagren', 'lampiran_kabagren_download_keu_at', 'kabagren_by', 'kabagren_at', 'status_kabagkeu', 'lampiran_kabagkeu', 'kabagkeu_by', 'kabagkeu_at', 'status_kpa', 'no_nota_kpa', 'lampiran_kpa', 'kpa_by', 'kpa_at', 'catatan_kabagkeu', 'status_fasgub', 'lampiran_fasgub', 'fasgub_by', 'fasgub_at', 'catatan_fasgub', 'status_ban', 'lampiran_ban', 'ban_by', 'ban_at', 'catatan_ban', 'type', 'tanggal_pengesahan', 'nomor_surat_pengesahan', 'deskripsi_pengesahan', 'tembusan', 'created_by', 'updated_by'];

    protected $casts = [
        'kak_old'               => 'array',
        'tembusan'              => 'array',
        'catatan_kpa'           => 'array',
        'catatan_ban'           => 'array',
        'matrik_rab_old'        => 'array',
        'catatan_fasgub'        => 'array',
        'catatan_kabagkeu'      => 'array',
        'catatan_approval'      => 'array',
        'nota_dinas_ppk_old'    => 'array',
        'catatan_verifikasi'    => 'array',
        'nota_dinas_pptk_old'   => 'array',
        'deskripsi_pengesahan'   => 'array',
        'dokumen_pendukung_old' => 'array',
    ];

    public function getRekap($satker = null, $tahun = null, $bulan = null)
    {
        $where = '';
        $where .= empty($satker) ? '' : (! empty($satker) ? ' WHERE ' : '') . " satker = '" . $satker . "' ";
        $where .= empty($tahun) ? '' : (! empty($satker) ? ' AND ' : ' WHERE ') . " tahun_anggaran = " . $tahun;
        $where .= empty($bulan) ? '' : (! empty($satker) || ! empty($tahun) ? ' AND ' : ' WHERE ') . " MONTH(tanggal_surat) = " . $bulan;

        $validStatus = array_keys(\App\TicketStatus::ACTIVITY);
        $where .= (empty($where) ? ' WHERE ' : ' AND ') . "status in ('" . implode("','", $validStatus) . "')";

        $sql = "SELECT current_status, COUNT(id) AS jml FROM tb_ticket_rev {$where} GROUP BY current_status";

        $rekap = DB::select($sql);

        $rekapJml = [];
        foreach (\App\TicketStatus::OPSI as $opsi) {
            $rekapJml[$opsi] = 0;
        }

        foreach ($rekap as $data) {
            if (isset($data->current_status)) {
                $rekapJml[$data->current_status] = $data->jml;
            }
        }

        return $rekapJml;
    }

    public function getListBy($current_status, $tahun = null, $bulan = null, $provinsi = null, $satker = null)
    {
        $db = $this->where('current_status', $current_status);

        if (! empty($provinsi)) {
            $db->where('provinsi', $provinsi);
        }
        if (! empty($satker) && $satker !== 'undefined') {
            $db->where('satker', $satker);
        }
        if (! empty($tahun)) {
            $db->where('tahun_anggaran', $tahun);
        }
        if (! empty($bulan)) {
            $db->whereMonth('tanggal_surat', (int) $bulan);
        }

        $validStatus = array_keys(\App\TicketStatus::ACTIVITY);
        $db->whereIn('status', $validStatus);

        $db->join('tbm_prov', 'tb_ticket_rev.provinsi', '=', 'tbm_prov.id_prov');
        $db->select('tb_ticket_rev.*', 'tbm_prov.namaprov');

        return $db->distinct()->get();
    }

    public function getByCurrentStatus($current_status)
    {
        return $this->where('current_status', $current_status)->get();
    }

    public function getIncrementFilename($request, $type)
    {
        $fileType = '';

        switch ($type) {
            case 'nota_dinas_ppk':
                $fileType = 'NODIN';
                break;

            case 'matrik_rab':
                $fileType = 'RAB';
                break;

            case 'dokumen_pendukung':
                $fileType = 'PENDUKUNG';
                break;

            default:
                $fileType = $type;
        }

        $incrementNumber = $this->where([
            'provinsi'     => $request->provinsi,
            'kode_satker'  => $request->kode_satker,
            'jenis_revisi' => $request->jenis_revisi,
        ])->whereNotNull($type)->count();

        return 'REV-' . $incrementNumber . '-' . $request->provinsi . '-' . $request->kode_satker . '-' . strtoupper($request->jenis_revisi) . '-' . $fileType . '-' . date("Ymd_Hi");
    }
}
