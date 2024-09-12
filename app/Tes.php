<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tes extends Model
{
    protected $table = 'realisasi_anggaran';

    protected $fillable = [
        'id',
        'bukti_ref',
        'created_at',
        'updated_at'
    ];

    protected $guarded = [];

    public static function getAllData()
    {
        return self::all();
    }

    public function getAll()
    {
        return $this->all();
    }
    
    
}
