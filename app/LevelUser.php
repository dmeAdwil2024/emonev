<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelUser extends Model
{
    protected $table    = 'tbm_level';
    protected $fillable = ['nama'];
}
