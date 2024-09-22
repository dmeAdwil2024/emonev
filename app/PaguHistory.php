<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaguHistory extends Model
{
    protected $table    = 'tbm_pagu_history';
    protected $fillable = ['title', 'tanggal', 'pagu', 'keterangan'];
}
