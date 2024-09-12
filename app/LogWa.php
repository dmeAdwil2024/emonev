<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogWa extends Model
{
    protected $table    = 'tb_whatsapp';
    protected $fillable = ['no_hp', 'no_surat', 'tipe', 'message'];
}
