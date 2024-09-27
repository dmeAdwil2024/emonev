<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    public $incrementing    = false;
    protected $keyType      = 'string';
    protected $primaryKey   = 'id_prov';
    protected $table        = 'tbm_prov';

    public function getAll()
    {
        return $this->where('id_prov', 'NOT LIKE', 'undefined')->get();
    }

    public function getById($id_prov = '')
    {
        if (empty($id_prov)) {
            return $this->getAll();
        }

        if (strtolower($id_prov) === 'pusat') {
            $id_prov = 'undefined';
        }

        return $this->where('id_prov', $id_prov)->get();
    }
}
