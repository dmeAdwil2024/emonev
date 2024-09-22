<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    public $incrementing    = false;
    protected $keyType      = 'string';
    protected $primaryKey   = 'id_prov';
    protected $table        = 'tbm_prov';
}
