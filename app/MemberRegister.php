<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberRegister extends Model
{
    protected $table    = 'tb_member_register';
    protected $fillable = ['nip', 'nama', 'pangkat', 'no_hp', 'email', 'jabatan', 'jabatan_dalam_satker', 'sk', 'satker', 'kode_satker', 'provinsi', 'kota', 'bidang', 'status', 'info'];

    protected $casts = [
        'info'  => 'array'
    ];
}
