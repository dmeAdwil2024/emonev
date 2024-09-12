<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaktiTematik extends Model
{
    protected $table    = 'tb_sakti_tematik';
    protected $fillable = ['tahun', 'kode', 'deskripsi'];
}
