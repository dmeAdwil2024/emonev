<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class POK extends Model
{
    protected $table    = 'tb_pok';
    protected $fillable = [
        'file_bagren', 'file_bagren_old', 'status_bagren', 'bagren_by', 'bagren_at',
        'file_bagkeu', 'file_bagkeu_old', 'status_bagkeu', 'bagkeu_by', 'bagkeu_at', 'catatan_bagkeu', 'bagkeu_download_at',
        'file_kpa', 'file_kpa_old', 'status_kpa', 'kpa_by', 'kpa_at', 'catatan_kpa',
        'zip_pengantar', 'distribusi_pok', 'distribusi_pok_at'
    ];

    protected $casts = [
        'file_bagren_old'   => 'array',
        'file_bagkeu_old'   => 'array',
        'file_kpa_old'      => 'array',
        'catatan_bagkeu'    => 'array',
        'catatan_kpa'       => 'array',
        'distribusi_pok'    => 'array'
    ];
}
