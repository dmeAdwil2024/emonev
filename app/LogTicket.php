<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogTicket extends Model
{
    protected $table    = 'tb_log_ticketing';
    protected $fillable = ['id_ticketing', 'activity', 'user', 'nota_dinas_ppk', 'matrik_rab', 'dokumen_pendukung'];

    public function getLogs($idTicketing) {
        return $this
            ->select('*', 'tb_log_ticketing.created_at as log_time')
            ->leftJoin('tb_akses', 'tb_log_ticketing.user', '=', 'tb_akses.id_akses')
            ->where('id_ticketing', $idTicketing)
            ->orderBy('tb_log_ticketing.created_at', 'DESC')
            ->get();
    }

    public function getFileLogs($idTicketing) {
        return $this
            ->select('*', 'tb_log_ticketing.created_at as log_time')
            ->leftJoin('tb_akses', 'tb_log_ticketing.user', '=', 'tb_akses.id_akses')
            ->where('id_ticketing', $idTicketing)
            ->hasfile()
            ->notnullfile()
            ->orderBy('tb_log_ticketing.created_at', 'DESC')
            ->get();
    }

    public function scopeNotnullfile($query) {
        return $query->whereNotNull('nota_dinas_ppk')
                ->orWhereNotNull('matrik_rab')
                ->orWhereNotNull('dokumen_pendukung');
    }

    public function scopeHasfile($query) {
        return $query->where('nota_dinas_ppk', '!=', 'Tidak Ada File')
            ->orWhere('matrik_rab', '!=', 'Tidak Ada File')
            ->orWhere('dokumen_pendukung', '!=', 'Tidak Ada File');
    }
}
