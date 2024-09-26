<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatriksTarget extends Model
{
    protected $table    = 'tb_matriks_target';
    protected $fillable = ['kode', 'kode_subdir', 'kode_kegiatan', 'kode_output','kode_suboutput','kode_komponen','tahun','co_volume','co_satuan','created_by'];
}
