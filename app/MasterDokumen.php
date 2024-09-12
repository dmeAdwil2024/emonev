<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterDokumen extends Model
{
    protected $table    = 'tbm_dokumen';
    protected $fillable = ['judul_dokumen', 'file', 'path', 'direktorat', 'owned_by', 'status', 'upload_by'];
}
