<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    protected $table    = 'tb_usulan';
    protected $fillable = ['token', 'key', 'tahun_anggaran', 'jenis', 'nomor_surat', 'tanggal_surat', 'satker', 'provinsi', 'direktorat', 'jenis_usulan', 'nama_pejabat', 'jabatan', 'perihal', 'nota_dinas_pptk', 'nota_dinas_pptk_old', 'nota_pptk_download_keu_at', 'nota_dinas_ppk', 'nota_dinas_ppk_old', 'nota_dinas_ppk_download_keu_at', 'matrik_rab', 'matrik_rab_old', 'rab_download_keu_at', 'kak', 'kak_old', 'kak_download_keu_at', 'dokumen_pendukung', 'dokumen_pendukung_old', 'dokumen_pendukung_download_keu_at', 'keterangan', 'status', 'status_approval', 'catatan_approval', 'catatan_verifikasi', 'approved_by', 'approved_at', 'verified_by', 'status_verifikasi', 'verified_at', 'status_kabagren', 'lampiran_kabagren', 'lampiran_kabagren_download_keu_at', 'kabagren_by', 'kabagren_at', 'status_kabagkeu', 'lampiran_kabagkeu', 'kabagkeu_by', 'kabagkeu_at', 'status_kpa', 'lampiran_kpa', 'kpa_by', 'kpa_at', 'catatan_kabagkeu', 'status_fasgub', 'lampiran_fasgub', 'fasgub_by', 'fasgub_at', 'catatan_fasgub', 'status_ban', 'lampiran_ban', 'ban_by', 'ban_at', 'catatan_ban', 'type', 'tanggal_pengesahan', 'nomor_surat_pengesahan', 'deskripsi_pengesahan', 'tembusan', 'created_by', 'updated_by'];

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
}
