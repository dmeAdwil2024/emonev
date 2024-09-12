<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogPok extends Model
{
    protected $table    = 'tb_log_pok';
    protected $fillable = ['id_pok', 'activity', 'userid'];
}
