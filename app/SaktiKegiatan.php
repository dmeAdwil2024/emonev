<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaktiKegiatan extends Model
{
    protected $table    = 'tb_sakti_kegiatan';
    protected $fillable = ['tahun', 'kode', 'deskripsi'];
}
