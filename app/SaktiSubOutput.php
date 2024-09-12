<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaktiSubOutput extends Model
{
    protected $table    = 'tb_sakti_suboutput';
    protected $fillable = ['tahun', 'kode', 'deskripsi'];
}
