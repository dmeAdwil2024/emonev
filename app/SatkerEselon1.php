<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SatkerEselon1 extends Model
{
    protected $table    = 'tbm_satker_eselon1';
    protected $fillable = ['id_satker_kemendagri', 'kode', 'kode_sakti_pagu', 'nama_satker', 'synch', 'synch_realisasi'];
}
