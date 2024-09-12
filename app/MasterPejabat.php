<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterPejabat extends Model
{
    protected $table    = 'tbm_pejabat';
    protected $fillable = ['nama_pejabat', 'nip', 'jabatan', 'no_hp', 'email', 'type', 'keterangan'];
}
