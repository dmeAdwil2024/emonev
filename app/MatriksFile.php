<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatriksFile extends Model
{
    protected $table    = 'tb_matriks_logfile';
    protected $fillable = ['id_matriks', 'evidence', 'created_by'];
}
