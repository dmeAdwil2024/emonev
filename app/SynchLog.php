<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SynchLog extends Model
{
    protected $table    = 'synch_log';
    protected $fillable = ['activity'];
}
