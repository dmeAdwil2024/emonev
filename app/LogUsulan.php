<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogUsulan extends Model
{
    protected $table    = 'tb_log_usulan';
    protected $fillable = ['id_ticketing', 'activity', 'user'];
}
