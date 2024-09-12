<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PejabatDaerah extends Model
{
    protected $table    = 'tbm_pejabat_daerah';
    protected $fillable = ['nama_pejabat', 'uid'];
}
