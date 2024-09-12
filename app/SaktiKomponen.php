<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaktiKomponen extends Model
{
    protected $table    = 'tb_sakti_komponen';
    protected $fillable = ['tahun', 'kode', 'deskripsi'];
}
