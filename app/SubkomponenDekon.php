<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubkomponenDekon extends Model
{
    protected $table    = 'tbm_subkomponen_dekon';
    protected $fillable = ['kdsatker', 'jenis_satker', 'kode_subkomponen', 'kode_subkomponen_realisasi', 'kode_subkomponen_pagu', 'deskripsi'];
}
