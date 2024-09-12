<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubKomponen extends Model
{
    protected $table    = 'tbm_subkomponen';
    protected $fillable = ['kode', 'kode_pagu', 'kode_realisasi', 'kode_direktorat', 'kode_subdirektorat']; 
}
