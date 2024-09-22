<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogTicket extends Model
{
    protected $table    = 'tb_log_ticketing';
    protected $fillable = ['id_ticketing', 'activity', 'user'];
}
