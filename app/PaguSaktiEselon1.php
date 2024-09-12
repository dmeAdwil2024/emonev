<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaguSaktiEselon1 extends Model
{
    protected $table    = 'tb_sakti_anggaran_eselon1';
    protected $fillable = ['kdsatker', 'kode_program', 'kode_kegiatan', 'kode_output', 'kdib', 'volume_output', 'kode_komponen', 'kode_subkomponen', 'uraian_subkomponen', 'kode_akun', 'kode_jenis_beban', 'kode_cara_tarik', 'kode_jenis_bantuan', 'kode_register', 'header1', 'header2', 'kode_item', 'nomor_item', 'cons_item', 'uraian_item', 'sumber_dana', 'vol_keg_1', 'sat_keg_1', 'vol_keg_2', 'sat_keg_2', 'vol_keg_3', 'sat_keg_3', 'vol_keg_4', 'sat_keg_4', 'volkeg', 'satkeg', 'hargasat', 'total', 'kode_blokir', 'nilai_blokir', 'kode_sts_history', 'pok_nilai_1', 'pok_nilai_2', 'pok_nilai_3', 'pok_nilai_4', 'pok_nilai_5', 'pok_nilai_6', 'pok_nilai_7', 'pok_nilai_8', 'pok_nilai_9', 'pok_nilai_10', 'pok_nilai_11', 'pok_nilai_12', 'urutan_header1', 'urutan_header2'];
}
