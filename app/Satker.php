<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satker extends Model
{
    protected $table    = 'tbm_satker';
    protected $fillable = ['kode', 'jenis_satker', 'provinsi', 'nama_satker', 'kode_sakti_pagu', 'synch_realisasi', 'synch'];
}
