<?php

namespace App;

class TicketStatus
{
    public const BARU = 'PENGAJUAN BARU';
    public const PERBAIKAN = 'BUTUH PERBAIKAN';
    public const PERBAIKAN_FIX = 'SUDAH PERBAIKAN';
    public const DISETUJUI_KPA = 'DISETUJUI KPA';

    public const DICEK_BAGREN     = 'DIVERIFIKASI BAGREN';
    public const DITELITI_BAGREN  = 'DITELITI BAGREN';
    public const DITOLAK_BAGREN   = 'DITOLAK BAGREN';
    public const DISETUJUI_BAGREN = 'DISETUJUI BAGREN';

    public const DITOLAK_FASGUB   = 'DITOLAK FASGUB';
    public const DISETUJUI_FASGUB = 'DISETUJUI FASGUB';
    public const OPSI = [
        self::BARU             => self::BARU,
        self::PERBAIKAN        => self::PERBAIKAN,
        self::DISETUJUI_KPA    => self::DISETUJUI_KPA,
        self::DISETUJUI_FASGUB => self::DISETUJUI_FASGUB,
        self::DISETUJUI_BAGREN     => self::DISETUJUI_BAGREN,
    ];

    public const LABEL = [
        self::BARU             => 'Pengajuan Baru',
        self::PERBAIKAN        => 'Perbaikan',
        self::DISETUJUI_KPA    => 'Disetujui KPA',
        self::DISETUJUI_FASGUB => 'Disetujui Fasgub',
        self::DISETUJUI_BAGREN => 'Disetujui Bagren',
    ];

    public const ACTIVITY = [
        self::BARU             => /* PPK */ 'Mengajukan Revisi E-Ticketing',
        self::PERBAIKAN        => /* KPA|BAGREN|FASGUB */ 'Mengembalikan data Revisi E-Ticketing untuk perbaikan',
        self::PERBAIKAN_FIX    => /* PPK */ 'Telah melakukan Perbaikan Data Revisi E-Ticketing',
        self::DISETUJUI_KPA    => /* KPA */ 'Melakukan Approval (KPA) Revisi E-Ticketing',
        self::DICEK_BAGREN     => /* BAGREN */ 'Melakukan Verifikasi atas Revisi E-Ticketing yang telah disetujui oleh KPA',
        self::DITOLAK_BAGREN   => /* BAGREN */ 'Menolak dan mengembalikan Revisi E-Ticketing yang telah disetujui oleh KPA',
        self::DITELITI_BAGREN  => /* BAGREN */ 'Sedang melakukan penelitian dan pertimbangan atas Revisi E-Ticketing yang telah disetujui oleh KPA',
        self::DISETUJUI_FASGUB => /* FASGUB */ 'Melakukan Approval atas Revisi E-Ticketing',
        self::DITOLAK_FASGUB   => /* FASGUB */ 'Menolak Revisi E-Ticketing',
        self::DISETUJUI_BAGREN => /* BAGREN */ 'Melakukan Approval Final Revisi E-Ticketing',
    ];
}
