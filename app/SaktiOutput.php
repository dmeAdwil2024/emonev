<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaktiOutput extends Model
{
    protected $table    = 'tb_sakti_output';
    protected $fillable = ['tahun', 'kode', 'deskripsi'];
}
