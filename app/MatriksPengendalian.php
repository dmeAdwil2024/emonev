<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatriksPengendalian extends Model
{
    protected $table    = 'tb_matriks_pengendalian';
    protected $fillable = ['kode', 'kode_subdir', 'pagu', 'blokir_aa', 'realisasi', 'to_volume', 'to_satuan', 'co_volume', 'co_satuan', 'status_pemanfaatan', 'pemanfaatan', 'keterangan', 'catatan', 'kendala', 'tinjut', 'evidence', 'bulan', 'tahun', 'persen_kinerja', 'status', 'deadline', 'created_by'];

    protected $casts = [
        'catatan'   => 'array'
    ];
}
