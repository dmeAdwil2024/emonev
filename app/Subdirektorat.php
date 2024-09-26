<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Subdirektorat extends Model
{
    protected $table    = 'tbm_subdir';
    protected $fillable = ['id_subdir', 'nama_subdir', 'alias_subdir', 'id_dir',];

    protected $casts    = ['id_subdir'  => 'string'];

    public function getRekapPagu($idDir = false)
    {
        $binding = [];
    
        $sqlSelect = "SELECT sd.id_dir, sd.nama_subdir, (SELECT SUM(a.total) FROM tb_sakti_anggaran a WHERE a.`hargasat` <> 0 AND a.`kode_subkomponen` IN (
            SELECT s.kode_pagu FROM tbm_subkomponen s WHERE s.`kode_subdirektorat` = sd.id
            )) AS pagu FROM tbm_subdir sd
            WHERE sd.id_dir <> '0'";

        if ($idDir) {
            $sqlSelect .= " AND sd.id_dir = :id_dir";
            $binding = ['id_dir' => $idDir];
        }

        return DB::select($sqlSelect . " ORDER BY sd.id_dir", $binding);
    }
	public function getRekapPaguByAlias($aliasDir = null)
    {    
        $sqlSelect = "SELECT sd.id_dir, sd.alias_subdir nama_subdir, (SELECT SUM(a.total) FROM tb_sakti_anggaran a WHERE a.`hargasat` <> 0 AND a.`kode_subkomponen` IN (
            SELECT s.kode_pagu FROM tbm_subkomponen s WHERE s.`kode_subdirektorat` = sd.id
            )) AS pagu FROM tbm_subdir sd
            WHERE sd.id_dir <> '0'";

        if ($aliasDir!='') {
            $sqlSelect .= " AND sd.id_dir = (select id_dir from tbm_dir where lower(alias_dir)=lower('".$aliasDir."') limit 1)";
        }

        return DB::select($sqlSelect . " ORDER BY sd.id_dir");
    }
}
