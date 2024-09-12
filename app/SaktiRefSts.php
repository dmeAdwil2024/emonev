<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaktiRefSts extends Model
{
    protected $table    = 'tb_sakti_refsts';
    protected $fillable = ['kode_kementerian', 'kdsatker', 'kode_sts_history', 'jenis_revisi', 'revisi_ke', 'pagu_belanja', 'no_dipa', 'tgl_revisi', 'approve', 'approve_span', 'validated', 'flag_update_coa', 'owner', 'digital_stamp'];
}
