<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatriksApproval extends Model
{
    protected $table    = 'tb_matriks_logapproval';
    protected $fillable = ['id_matriks', 'note_status', 'note_perbaikan','status', 'created_by'];
}
