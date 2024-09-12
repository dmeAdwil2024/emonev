<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealisasiSaktiEselon1 extends Model
{
    protected $table    = 'tb_sakti_realisasi_eselon1';
    protected $fillable = ["kdsatker", "kode_kementerian", "kd_jns_spp", "no_spp", "tgl_spp", "no_spm", "tgl_spm", "no_sp2d", "tgl_sp2d", "no_sp2b", "tgl_sp2b", "uraian", "kode_coa", "kode_program", "kode_kegiatan", "kode_output", "kode_suboutput", "kode_komponen", "kode_subkomponen", "kode_akun", "kode_item", "mata_uang", "kurs", "nilai_valas", "nilai_rupiah", "status_data"];
}
