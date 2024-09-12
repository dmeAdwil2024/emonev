<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaktiAkun extends Model
{
    protected $table    = 'tb_sakti_akun';
    protected $fillable = ['tahun', 'kode', 'deskripsi'];
}
