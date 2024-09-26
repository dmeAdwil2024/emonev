<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satker extends Model
{
    protected $table    = 'tbm_satker';
    protected $fillable = ['kode', 'jenis_satker', 'provinsi', 'nama_satker', 'kode_sakti_pagu', 'synch_realisasi', 'synch'];

    public function getSatkerProv(string $namaProv, $kodeSatker = null)
    {
        if (! empty($kodeSatker)) {
            return $this->where('provinsi', strtoupper($namaProv))->where('kode', $kodeSatker)->get(['kode', 'nama_satker']);
        }
        return $this->where('provinsi', strtoupper($namaProv))->get(['kode', 'nama_satker']);
    }
}
