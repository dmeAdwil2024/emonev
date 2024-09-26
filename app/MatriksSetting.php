<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatriksSetting extends Model
{
    protected $table    = 'tb_matriks_setting';
    protected $fillable = ['tgl_mulai', 'tgl_akhir','created_by'];
}
