<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table    = 'tbm_jabatan';
    protected $fillable = ['nama', 'provinsi'];
}
