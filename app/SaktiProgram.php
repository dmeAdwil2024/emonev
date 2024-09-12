<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaktiProgram extends Model
{
    protected $table    = 'tb_sakti_program';
    protected $fillable = ['tahun', 'kode', 'deskripsi'];
}
