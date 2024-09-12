<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvidenceCapaian extends Model
{
    protected $table    = 'tb_evidence_capaian';
    protected $fillable = ['kode', 'pertanyaan', 'jawaban', 'evidence', 'answered_by', 'answered_at'];
}
