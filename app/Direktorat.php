<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Direktorat extends Model
{
    public $incrementing    = false;
    protected $keyType      = 'string';
    protected $primaryKey   = 'id_dir';
    protected $table        = 'tbm_dir';

    public function getRekapPagu()
    {
        return DB::select("SELECT d.id_dir, d.nama_dir, d.alias_dir, (SELECT SUM(a.total) FROM tb_sakti_anggaran a WHERE a.`hargasat` <> 0 
            AND a.`kode_subkomponen` IN (SELECT s.kode_pagu FROM tbm_subkomponen s WHERE s.`kode_direktorat` = d.id_dir)) AS pagu FROM tbm_dir d
            WHERE d.id_eselon <> '0' order by kode");
    }
}
