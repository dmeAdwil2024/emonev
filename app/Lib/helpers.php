<?php

    use App\Satker;
    use App\SynchLog;
    use App\SaktiUrl;
    use App\SaktiAkun;
    use App\SaktiModul;
    use App\Direktorat;
    use App\SaktiOutput;
    use App\SubKomponen;
    use App\SaktiTematik;
    use App\SaktiProgram;
    use App\SaktiKegiatan;
    use App\SaktiAnggaran;
    use App\SaktiKomponen;
    use App\Subdirektorat;
    use App\SaktiSubOutput;
    use App\SaktiRealisasi;
    use App\SubkomponenDekon;

    function dateMasked($tanggal)
    {
        $tanggal    = date("Y-n-d", strtotime($tanggal));
        $tanggal    = explode("-", $tanggal);

        $hari       = $tanggal[2];
        $bulan      = $tanggal[1];
        $tahun      = $tanggal[0];

        $months     = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $date       = $hari." ".$months[$bulan]." ".$tahun;

        return $date;
    }

    function getProvinsi($id_provinsi)
    {
        $provinsi = new App\Provinsi;

        $nama_prov = $provinsi->where('id_prov', $id_provinsi)->first()->namaprov;

        return $nama_prov;
    }

    function provinsi()
    {
        $provinsi   = new App\Provinsi;
        $data       = $provinsi->where('id_prov', 'NOT LIKE', 'undefined')->get();

        return $data;
    }

    function getDirektorat($id_dir)
    {
        $dir = new App\Direktorat;

        $nama_dir = $dir->where('id_dir', $id_dir)->first()->nama_dir;

        return $nama_dir;
    }

    function dataSatker()
    {
        $satker         = new App\Satker;
        
        $data_satker    = $satker->get();

        return $data_satker;
    }

    function getSatker($kdsatker, $column)
    {
        $satker         = new App\Satker;
        
        $nama_satker    = "Satker Belum Disetting";
        $count          = $satker->where('kode', $kdsatker)->count();

        if($count > 0)
        {
            $nama_satker    = $satker->where('kode', $kdsatker)->first()->$column;
        }

        return $nama_satker;
    }

    function getLevel($kode_level)
    {
        $level  = new App\LevelUser;

        $nama_level = $level->where('id', $kode_level)->first()->nama;

        return $nama_level;
    }

    function dataDirektorat()
    {
        $dir = new App\Direktorat;

        $nama_dir = $dir->where('id_dir', '>', 0)->get();

        return $nama_dir;
    }

    function randomPassword($length)
    {
        $alphabet   = 'ABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
        $pass       = array();

        $alphaLength = strlen($alphabet) - 1;
        
        for ($i = 0; $i < $length; $i++)
        {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        
        return implode($pass);
    }

    function getIp()
    {
        $ipaddress = '';

        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }

    function getInfo()
    {
        $return = [
            'IP Address'    => getIp(),
            'Device Type'   => Browser::deviceType(),
            'Device Model'  => Browser::deviceModel(),
            'OS'            => Browser::platformName(),
            'Browser'       => Browser::browserName(),
            'From APPS'     => Browser::isInApp()
        ];

        return $return;
    }

    function getSumRealisasiPusat()
    {
        $direktorat     = new Direktorat;
        $subkomponen    = new SubKomponen;
        $anggaran       = new SaktiAnggaran;
        $realisasi      = new SaktiRealisasi;
        
        $sum_realisasi  = 0;
        $data           = $direktorat->where('id_dir', 'NOT LIKE', '0')->get();

        $i  = 0;
        $no = 1;

        foreach ($data as $value)
        {
            $kode_subkomponen = $subkomponen->where('kode_direktorat', $value->id_dir)->get();

            $kd_skmpn_pagu      = [];
            $kd_skmpn_realisasi = [];

            foreach ($kode_subkomponen as $value_sk)
            {
                $kd_skmpn_pagu[]        = $value_sk->kode_pagu;
                $kd_skmpn_realisasi[]   = $value_sk->kode_realisasi;
            }

            $data[$i]->no = $no.".";
            $total_anggaran   = $anggaran->where([
                'urutan_header1'    => 0,
                'urutan_header2'    => 0,
                'kdsatker'          => '027486'
            ])->whereIn('kode_subkomponen', $kd_skmpn_pagu)->sum('total');

            // $total_realisasi  = $realisasi->where('kdsatker', '027486')->whereNotNull('no_sp2d')->whereIn('kode_subkomponen', $kd_skmpn_realisasi)->sum('nilai_rupiah');

            $total_realisasi  = $realisasi->where('kdsatker', '027486')->where('status_data', 'Upload SP2D')->whereIn('kode_subkomponen', $kd_skmpn_realisasi)->sum('nilai_rupiah');

            $total_sisa                 = $total_anggaran-$total_realisasi;
            $data[$i]->total_sisa       = number_format($total_sisa);
            $data[$i]->total_anggaran   = number_format($total_anggaran);
            $data[$i]->total_realisasi  = number_format($total_realisasi);
            $data[$i]->total_persentase = "0%";
            $data[$i]->nama_dir         = '<a href="javascript:void(0)" onclick="loadSubDetailPusat(\''.$value->id_dir.'\', \''.$value->nama_dir.'\')">'.$value->nama_dir.'</a>';

            $sum_realisasi += $total_realisasi;
            
            if($total_sisa > 0)
            {
                $data[$i]->total_persentase = number_format((float)$total_realisasi/$total_anggaran*100, 2, '.', '')."%";
            }

            $i++;
            $no++;
        }

        return $sum_realisasi;
    }

    function getSumRealisasiDekon()
    {
        $satker         = new Satker;
        $anggaran       = new SaktiAnggaran;
        $realisasi      = new SaktiRealisasi;
        $data_dekon     = $satker->whereNotIn('kode', ['027486', '356000', '417936', '690639'])->get();

        if(is_numeric(Auth::user()->prov))
        {
            $data_dekon = $satker->where('kode', Auth::user()->kdsatker)->get();
        }

        $i  = 0;
        $no = 1;
        $sum_realisasi  = 0;

        foreach ($data_dekon as $dekon)
        {
            $total_anggaran   = $anggaran->where([
                'kdsatker' => $dekon->kode,
                'urutan_header1' => 0
            ])->sum('total');

            $total_realisasi  = $realisasi->where([
                'kdsatker'      => $dekon->kode,
                'status_data'   => 'Upload SP2D'
            ])->sum('nilai_rupiah');
            
            $total_sisa       = $total_anggaran-$total_realisasi;

            $data_dekon[$i]->nama_satker      = '<a href="javascript:void(0)" onclick="loadSubDetailDekon(\''.$dekon->kode.'\', \''.$dekon->nama_satker.'\')">'.$dekon->nama_satker.'</a>';
            $data_dekon[$i]->total_sisa       = number_format($total_sisa);
            $data_dekon[$i]->total_anggaran   = number_format($total_anggaran);
            $data_dekon[$i]->total_realisasi  = number_format($total_realisasi);
            $data_dekon[$i]->total_persentase = "0%";

            $sum_realisasi += $total_realisasi;

            if($total_sisa > 0)
            {
                $data_dekon[$i]->total_persentase = number_format((float)$total_realisasi/$total_anggaran*100, 2, '.', '')."%";
            }

            $i++;
            $no++;
        }

        return $sum_realisasi;
    }