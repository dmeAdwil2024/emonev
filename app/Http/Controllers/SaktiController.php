<?php

namespace App\Http\Controllers;

use DB;
use Auth;
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
use App\SatkerEselon1;
use App\SaktiKegiatan;
use App\SaktiAnggaran;
use GuzzleHttp\Client;
use App\SaktiKomponen;
use App\Subdirektorat;
use App\SaktiSubOutput;
use App\SaktiRealisasi;
use App\SubkomponenDekon;
use App\PaguSaktiEselon1;
use App\RealisasiSaktiEselon1;

use Illuminate\Http\Request;

class SaktiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewRefSts()
    {
        $modul      = 'Sakti';
        $current    = "Anggaran - Ref Sts";

        return view('contents.sakti.ref-sts', compact('current', 'modul'));
    }

    public function viewDataAnggaran()
    {
        $modul      = 'Sakti';
        $satker     = new Satker;
        $current    = "Data Anggaran";
        
        $data_satker= $satker->get();

        return view('contents.sakti.data-anggaran', compact('current', 'modul', 'data_satker'));
    }

    public function viewDataRealisasi()
    {
        $modul      = 'Sakti';
        $current    = "Data Realisasi";

        return view('contents.sakti.data-realisasi', compact('current', 'modul'));
    }

    public function synchRefSts()
    {
        $client     = new Client();
        $url        = new SaktiUrl;
        $modul      = new SaktiModul;

        $endpoint   = $url->where('id', 2)->first()->url;
        $token      = $modul->where('kode', 'ANG')->first()->token;

        try
        {
            $response = $client->post($endpoint.'ANG/refSts/KL010/027486', [
                'headers' => [
                    'Authorization' => 'Bearer '.$token
                ]
            ]);
        }
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }

        $statusCode = $response->getStatusCode();

        return $statusCode;

        // while($statusCode == 500)
    }

    public function dataAnggaran()
    {
        $sakti  = new SaktiAnggaran;

        $i      = 0;
        $data   = $sakti->limit(12256)->get();

        foreach($data as $value)
        {
            $data[$i]->total_format  = number_format($value->total);
            $data[$i]->volkeg_format  = number_format($value->volkeg);
            $data[$i]->hargasat_format  = number_format($value->hargasat);

            $i++;
        }

        return $data;
    }

    public function dataRealisasi()
    {
    $sakti  = new SaktiRealisasi;

        $i      = 0;
        $data   = $sakti->get();

        foreach($data as $value)
        {
            $data[$i]->nilai_rupiah_format  = number_format($value->nilai_rupiah);

            $i++;
        }

        return $data;
    }

    public function synchDataAnggaran()
    {
        ini_set('max_execution_time', 0);
        $satker     = new Satker;
        $client     = new Client();
        $url        = new SaktiUrl;
        $modul      = new SaktiModul;
        $anggaran   = new SaktiAnggaran;

        $endpoint   = $url->where('id', 2)->first()->url;
        $token      = $modul->where('kode', 'ANG')->first()->token;
        
        $count_satker   = $satker->where('synch', 0)->count();

        if($count_satker == 0)
        {
            return true;
        }
        
        $count_satker   = $satker->where('synch', 2)->count();

        if($count_satker > 0)
        {
            return true;
        }
        
        $data_satker    = $satker->where('synch', 0)->first();
        $kode_satker    = $data_satker->kode;
        $kode_tarik     = $data_satker->kode_sakti_pagu;

        try
        {
            // if($kode_satker == "484121")
            // {
            //     $response = $client->post($endpoint.'ANG/dataAng/KL010/'.$kode_satker.'/C01', [
            //         'http_errors' => false,
            //         'headers' => [
            //             'Authorization' => 'Bearer '.$token,
            //             'Accept-Encoding' => 'gzip, deflate',
            //         ]
            //     ]);
            // }
            // else
            // {
            //     $response = $client->post($endpoint.'ANG/dataAng/KL010/'.$kode_satker.'/B00', [
            //         'http_errors' => false,
            //         'headers' => [
            //             'Authorization' => 'Bearer '.$token,
            //             'Accept-Encoding' => 'gzip, deflate',
            //         ]
            //     ]);
            // }

            $response = $client->post($endpoint.'ANG/dataAng/KL010/'.$kode_satker.'/'.$kode_tarik, [
                'http_errors' => false,
                'headers' => [
                    'Authorization' => 'Bearer '.$token,
                    'Accept-Encoding' => 'gzip, deflate',
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if($statusCode != 200)
            {
                $response   = $client->post('https://monsakti.kemenkeu.go.id/sitp-monsakti-omspan/webservice/resetToken/ANG/dataAng/KL010', [
                    'http_errors' => false,
                    'headers' => [
                        'Authorization' => 'Bearer '.$token
                    ]
                ]);

                $data   = json_decode($response->getBody());
                $token  = $data[0]->TOKEN;

                $modul->where('kode', 'ANG')->update(['token' => $token]);

                return $this->synchDataAnggaran();
            }
            else
            {
                $anggaran->where('kdsatker', $kode_satker)->delete();
                $data   = json_decode($response->getBody());

                $token  = $data[0][0]->TOKEN;

                $modul->where('kode', 'ANG')->update(['token' => $token]);
                
                $satker->where('id', $data_satker->id)->update(['synch' => 2]);
                
                //$a=1;
                //$jumlah=0;
                foreach($data[1] as $value)
                {
                    $kdsatker           = $value->KDSATKER;
                    $kode_program       = $value->KODE_PROGRAM;
                    $kode_kegiatan      = $value->KODE_KEGIATAN;
                    $kode_output        = $value->KODE_OUTPUT;
                    $kdib               = $value->KDIB;
                    $volume_output      = $value->VOLUME_OUTPUT;
                    $kode_komponen      = $value->KODE_KOMPONEN;
                    $kode_subkomponen   = $value->KODE_SUBKOMPONEN;
                    $uraian_subkomponen = $value->URAIAN_SUBKOMPONEN;
                    $kode_akun          = $value->KODE_AKUN;
                    $kode_jenis_beban   = $value->KODE_JENIS_BEBAN;
                    $kode_cara_tarik    = $value->KODE_CARA_TARIK;
                    $kode_jenis_bantuan = $value->KODE_JENIS_BANTUAN;
                    $kode_register      = $value->KODE_REGISTER;
                    $header1            = $value->HEADER1;
                    $header2            = $value->HEADER2;
                    $kode_item          = $value->KODE_ITEM;
                    $nomor_item         = $value->NOMOR_ITEM;
                    $cons_item          = $value->CONS_ITEM;
                    $uraian_item        = $value->URAIAN_ITEM;
                    $sumber_dana        = $value->SUMBER_DANA;
                    $vol_keg_1          = $value->VOL_KEG_1;
                    $sat_keg_1          = $value->SAT_KEG_1;
                    $vol_keg_2          = $value->VOL_KEG_2;
                    $sat_keg_2          = $value->SAT_KEG_2;
                    $vol_keg_3          = $value->VOL_KEG_3;
                    $sat_keg_3          = $value->SAT_KEG_3;
                    $vol_keg_4          = $value->VOL_KEG_4;
                    $sat_keg_4          = $value->SAT_KEG_4;
                    $volkeg             = $value->VOLKEG;
                    $satkeg             = $value->SATKEG;
                    $hargasat           = $value->HARGASAT;
                    $total              = $value->TOTAL;
                    $kode_blokir        = $value->KODE_BLOKIR;
                    $nilai_blokir       = $value->NILAI_BLOKIR;
                    $kode_sts_history   = $value->KODE_STS_HISTORY;
                    $pok_nilai_1        = $value->POK_NILAI_1;
                    $pok_nilai_2        = $value->POK_NILAI_2;
                    $pok_nilai_3        = $value->POK_NILAI_3;
                    $pok_nilai_4        = $value->POK_NILAI_4;
                    $pok_nilai_5        = $value->POK_NILAI_5;
                    $pok_nilai_6        = $value->POK_NILAI_6;
                    $pok_nilai_7        = $value->POK_NILAI_7;
                    $pok_nilai_8        = $value->POK_NILAI_8;
                    $pok_nilai_9        = $value->POK_NILAI_9;
                    $pok_nilai_10       = $value->POK_NILAI_10;
                    $pok_nilai_11       = $value->POK_NILAI_11;
                    $pok_nilai_12       = $value->POK_NILAI_12;
                    $urutan_header1     = $value->HEADER1;
                    $urutan_header2     = $value->HEADER2;

                    $anggaran->create([
                        'kdsatker'  => $kdsatker,
                        'kode_program'  => $kode_program,
                        'kode_kegiatan' => $kode_kegiatan,
                        'kode_output'   => $kode_output,
                        'kdib'  => $kdib,
                        'volume_output' => $volume_output,
                        'kode_komponen' => $kode_komponen,
                        'kode_subkomponen'  => $kode_subkomponen,
                        'uraian_subkomponen'    => $uraian_subkomponen,
                        'kode_akun' => $kode_akun,
                        'kode_jenis_beban'  => $kode_jenis_beban,
                        'kode_cara_tarik'   => $kode_cara_tarik,
                        'kode_jenis_bantuan'    => $kode_jenis_bantuan,
                        'kode_register' => $kode_register,
                        'header1'   => $header1,
                        'header2'   => $header2,
                        'kode_item' => $kode_item,
                        'nomor_item'    => $nomor_item,
                        'cons_item' => $cons_item,
                        'uraian_item'   => $uraian_item,
                        'sumber_dana'   => $sumber_dana,
                        'vol_keg_1' => $vol_keg_1,
                        'sat_keg_1' => $sat_keg_1,
                        'vol_keg_2' => $vol_keg_2,
                        'sat_keg_2' => $sat_keg_2,
                        'vol_keg_3' => $vol_keg_3,
                        'sat_keg_3' => $sat_keg_3,
                        'vol_keg_4' => $vol_keg_4,
                        'sat_keg_4' => $sat_keg_4,
                        'volkeg'    => $volkeg,
                        'satkeg'    => $satkeg,
                        'hargasat'  => $hargasat,
                        'total' => $total,
                        'kode_blokir'   => $kode_blokir,
                        'nilai_blokir'  => $nilai_blokir,
                        'kode_sts_history'  => $kode_sts_history,
                        'pok_nilai_1'   => $pok_nilai_1,
                        'pok_nilai_2'   => $pok_nilai_2,
                        'pok_nilai_3'   => $pok_nilai_3,
                        'pok_nilai_4'   => $pok_nilai_4,
                        'pok_nilai_5'   => $pok_nilai_5,
                        'pok_nilai_6'   => $pok_nilai_6,
                        'pok_nilai_7'   => $pok_nilai_7,
                        'pok_nilai_8'   => $pok_nilai_8,
                        'pok_nilai_9'   => $pok_nilai_9,
                        'pok_nilai_10'  => $pok_nilai_10,
                        'pok_nilai_11'  => $pok_nilai_11,
                        'pok_nilai_12'  => $pok_nilai_12,
                        'urutan_header1'    => $urutan_header1,
                        'urutan_header2'    => $urutan_header2
                    ]);
                    /**
                    if($urutan_header1==0&&$urutan_header2==0){
                      $jumlah=$jumlah+$total;
                    }
                    $a++;
                    **/
                }
              //echo 'banyak record: '.$a.'<br><br>Total: '.$jumlah;
            }
            $satker->where('id', $data_satker->id)->update(['synch' => 1]);
            
            return $statusCode;
            // return $this->synchDataAnggaran();
            
        }
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }
    }

    public function synchDataAnggaranEselon1()
    {
        ini_set('max_execution_time', 0);
        $satker     = new SatkerEselon1;
        $client     = new Client();
        $url        = new SaktiUrl;
        $modul      = new SaktiModul;
        $anggaran   = new PaguSaktiEselon1;

        $endpoint   = $url->where('id', 2)->first()->url;
        $token      = $modul->where('kode', 'ANG')->first()->token;

        $count_satker   = $satker->where('synch', 0)->count();

        if($count_satker == 0)
        {
            return true;
        }
        
        $count_satker   = $satker->where('synch', 2)->count();

        if($count_satker > 0)
        {
            return true;
        }

        $data_satker    = $satker->where('synch', 0)->first();
        $kode_satker    = $data_satker->kode;
        $kode_tarik     = $data_satker->kode_sakti_pagu;

        try
        {
            $response = $client->post($endpoint.'ANG/dataAng/KL010/'.$kode_satker.'/'.$kode_tarik, [
                'http_errors' => false,
                'headers' => [
                    'Authorization' => 'Bearer '.$token,
                    'Accept-Encoding' => 'gzip, deflate',
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if($statusCode != 200)
            {
                $response   = $client->post('https://monsakti.kemenkeu.go.id/sitp-monsakti-omspan/webservice/resetToken/ANG/dataAng/KL010', [
                    'http_errors' => false,
                    'headers' => [
                        'Authorization' => 'Bearer '.$token
                    ]
                ]);

                $data   = json_decode($response->getBody());
                $token  = $data[0]->TOKEN;

                $modul->where('kode', 'ANG')->update(['token' => $token]);

                return $this->synchDataAnggaranEselon1();
            }
            else
            {
                $anggaran->where('kdsatker', $kode_satker)->delete();
                $data   = json_decode($response->getBody());

                $token  = $data[0][0]->TOKEN;

                $modul->where('kode', 'ANG')->update(['token' => $token]);
                
                $satker->where('id', $data_satker->id)->update(['synch' => 2]);
                
                foreach($data[1] as $value)
                {
                    $kdsatker           = $value->KDSATKER;
                    $kode_program       = $value->KODE_PROGRAM;
                    $kode_kegiatan      = $value->KODE_KEGIATAN;
                    $kode_output        = $value->KODE_OUTPUT;
                    $kdib               = $value->KDIB;
                    $volume_output      = $value->VOLUME_OUTPUT;
                    $kode_komponen      = $value->KODE_KOMPONEN;
                    $kode_subkomponen   = $value->KODE_SUBKOMPONEN;
                    $uraian_subkomponen = $value->URAIAN_SUBKOMPONEN;
                    $kode_akun          = $value->KODE_AKUN;
                    $kode_jenis_beban   = $value->KODE_JENIS_BEBAN;
                    $kode_cara_tarik    = $value->KODE_CARA_TARIK;
                    $kode_jenis_bantuan = $value->KODE_JENIS_BANTUAN;
                    $kode_register      = $value->KODE_REGISTER;
                    $header1            = $value->HEADER1;
                    $header2            = $value->HEADER2;
                    $kode_item          = $value->KODE_ITEM;
                    $nomor_item         = $value->NOMOR_ITEM;
                    $cons_item          = $value->CONS_ITEM;
                    $uraian_item        = $value->URAIAN_ITEM;
                    $sumber_dana        = $value->SUMBER_DANA;
                    $vol_keg_1          = $value->VOL_KEG_1;
                    $sat_keg_1          = $value->SAT_KEG_1;
                    $vol_keg_2          = $value->VOL_KEG_2;
                    $sat_keg_2          = $value->SAT_KEG_2;
                    $vol_keg_3          = $value->VOL_KEG_3;
                    $sat_keg_3          = $value->SAT_KEG_3;
                    $vol_keg_4          = $value->VOL_KEG_4;
                    $sat_keg_4          = $value->SAT_KEG_4;
                    $volkeg             = $value->VOLKEG;
                    $satkeg             = $value->SATKEG;
                    $hargasat           = $value->HARGASAT;
                    $total              = $value->TOTAL;
                    $kode_blokir        = $value->KODE_BLOKIR;
                    $nilai_blokir       = $value->NILAI_BLOKIR;
                    $kode_sts_history   = $value->KODE_STS_HISTORY;
                    $pok_nilai_1        = $value->POK_NILAI_1;
                    $pok_nilai_2        = $value->POK_NILAI_2;
                    $pok_nilai_3        = $value->POK_NILAI_3;
                    $pok_nilai_4        = $value->POK_NILAI_4;
                    $pok_nilai_5        = $value->POK_NILAI_5;
                    $pok_nilai_6        = $value->POK_NILAI_6;
                    $pok_nilai_7        = $value->POK_NILAI_7;
                    $pok_nilai_8        = $value->POK_NILAI_8;
                    $pok_nilai_9        = $value->POK_NILAI_9;
                    $pok_nilai_10       = $value->POK_NILAI_10;
                    $pok_nilai_11       = $value->POK_NILAI_11;
                    $pok_nilai_12       = $value->POK_NILAI_12;
                    $urutan_header1     = $value->HEADER1;
                    $urutan_header2     = $value->HEADER2;

                    $anggaran->create([
                        'kdsatker'  => $kdsatker,
                        'kode_program'  => $kode_program,
                        'kode_kegiatan' => $kode_kegiatan,
                        'kode_output'   => $kode_output,
                        'kdib'  => $kdib,
                        'volume_output' => $volume_output,
                        'kode_komponen' => $kode_komponen,
                        'kode_subkomponen'  => $kode_subkomponen,
                        'uraian_subkomponen'    => $uraian_subkomponen,
                        'kode_akun' => $kode_akun,
                        'kode_jenis_beban'  => $kode_jenis_beban,
                        'kode_cara_tarik'   => $kode_cara_tarik,
                        'kode_jenis_bantuan'    => $kode_jenis_bantuan,
                        'kode_register' => $kode_register,
                        'header1'   => $header1,
                        'header2'   => $header2,
                        'kode_item' => $kode_item,
                        'nomor_item'    => $nomor_item,
                        'cons_item' => $cons_item,
                        'uraian_item'   => $uraian_item,
                        'sumber_dana'   => $sumber_dana,
                        'vol_keg_1' => $vol_keg_1,
                        'sat_keg_1' => $sat_keg_1,
                        'vol_keg_2' => $vol_keg_2,
                        'sat_keg_2' => $sat_keg_2,
                        'vol_keg_3' => $vol_keg_3,
                        'sat_keg_3' => $sat_keg_3,
                        'vol_keg_4' => $vol_keg_4,
                        'sat_keg_4' => $sat_keg_4,
                        'volkeg'    => $volkeg,
                        'satkeg'    => $satkeg,
                        'hargasat'  => $hargasat,
                        'total' => $total,
                        'kode_blokir'   => $kode_blokir,
                        'nilai_blokir'  => $nilai_blokir,
                        'kode_sts_history'  => $kode_sts_history,
                        'pok_nilai_1'   => $pok_nilai_1,
                        'pok_nilai_2'   => $pok_nilai_2,
                        'pok_nilai_3'   => $pok_nilai_3,
                        'pok_nilai_4'   => $pok_nilai_4,
                        'pok_nilai_5'   => $pok_nilai_5,
                        'pok_nilai_6'   => $pok_nilai_6,
                        'pok_nilai_7'   => $pok_nilai_7,
                        'pok_nilai_8'   => $pok_nilai_8,
                        'pok_nilai_9'   => $pok_nilai_9,
                        'pok_nilai_10'  => $pok_nilai_10,
                        'pok_nilai_11'  => $pok_nilai_11,
                        'pok_nilai_12'  => $pok_nilai_12,
                        'urutan_header1'    => $urutan_header1,
                        'urutan_header2'    => $urutan_header2
                    ]);
                }
            }

            $satker->where('id', $data_satker->id)->update(['synch' => 1]);
            return $statusCode;
            // return $this->synchDataAnggaran();
            
        }
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }
    }

    public function checkSynchToday($activity)
    {
        $satker         = new Satker;
        $satker_eselon1 = new SatkerEselon1;

        $log            = new SynchLog;
        
        $ang            = new SaktiAnggaran;
        $real           = new SaktiRealisasi;

        $ang_es1        = new SaktiAnggaran;
        $real_es1       = new SaktiRealisasi;

        $count  = $log->where('activity', $activity)->whereDate('created_at', date("Y-m-d"))->count();

        if($count == 0)
        {
            $log->create([
                'activity'  => $activity
            ]);

            if($activity == "realisasi")
            {
                $real->truncate();
                $real_es1->truncate();

                $satker->where('synch_realisasi', 1)->update([
                    'synch_realisasi'   => 0
                ]);

                $satker_eselon1->where('synch_realisasi', 1)->update([
                    'synch_realisasi'   => 0
                ]);
            }
            else if($activity == "anggaran")
            {
                $satker->where('synch', 1)->update([
                    'synch'   => 0
                ]);

                $satker_eselon1->where('synch', 1)->update([
                    'synch'   => 0
                ]);
            }
        }

        return true;

    }

    public function synchDataRealisasi()
    {
        $satker     = new Satker;
        $client     = new Client();
        $url        = new SaktiUrl;
        $modul      = new SaktiModul;
        $realisasi  = new SaktiRealisasi;

        $endpoint   = $url->where('id', 2)->first()->url;
        $token      = $modul->where('kode', 'PEM')->first()->token;

        $count_satker   = $satker->where('synch_realisasi', 0)->count();

        if($count_satker == 0)
        {
            return true;
        }
        
        $count_satker   = $satker->where('synch_realisasi', 2)->count();

        if($count_satker > 0)
        {
            return true;
        }

        $data_satker    = $satker->where('synch_realisasi', 0)->first();
        $kode_satker    = $data_satker->kode;

        try
        {
            $response = $client->post($endpoint.'PEM/realisasi/KL010/'.$kode_satker.'', [
                'http_errors' => false,
                'headers' => [
                    'Authorization' => 'Bearer '.$token,
                    'Accept-Encoding' => 'gzip, deflate',
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if($statusCode != 200)
            {
                $response   = $client->post('https://monsakti.kemenkeu.go.id/sitp-monsakti-omspan/webservice/resetToken/PEM/realisasi/KL010', [
                    'http_errors' => false,
                    'headers' => [
                        'Authorization' => 'Bearer '.$token
                    ]
                ]);

                $data   = json_decode($response->getBody());
                $token  = $data[0]->TOKEN;

                $modul->where('kode', 'PEM')->update(['token' => $token]);

                return $this->synchDataRealisasi();
            }
            else
            {
                $realisasi->where('kdsatker', $kode_satker)->delete();
                $data   = json_decode($response->getBody());

                $token  = $data[0][0]->TOKEN;

                $modul->where('kode', 'PEM')->update(['token' => $token]);
                
                $satker->where('id', $data_satker->id)->update(['synch_realisasi' => 2]);
                
                foreach($data[1] as $value)
                {
                    $kdsatker           = $value->KDSATKER;
                    $kode_kementerian   = $value->KODE_KEMENTERIAN;
                    $kd_jns_spp         = $value->KD_JNS_SPP;
                    $no_spp             = $value->NO_SPP;
                    $tgl_spp            = $value->TGL_SPP;
                    $no_spm             = $value->NO_SPM;
                    $tgl_spm            = $value->TGL_SPM;
                    $no_sp2d            = $value->TGL_SP2D;
                    $tgl_sp2d           = $value->TGL_SP2D;
                    $no_sp2b            = $value->TGL_SP2B;
                    $tgl_sp2b           = $value->TGL_SP2B;
                    $uraian             = $value->URAIAN;
                    $kode_coa           = $value->KODE_COA;
                    $kode_program       = $value->KODE_PROGRAM;
                    $kode_kegiatan      = $value->KODE_KEGIATAN;
                    $kode_output        = $value->KODE_OUTPUT;
                    $kode_suboutput     = $value->KODE_SUBOUTPUT;
                    $kode_komponen      = $value->KODE_KOMPONEN;
                    $kode_subkomponen   = $value->KODE_SUBKOMPONEN;
                    $kode_akun          = $value->KODE_AKUN;
                    $kode_item          = $value->KODE_ITEM;
                    $mata_uang          = $value->MATA_UANG;
                    $kurs               = $value->KURS;
                    $nilai_valas        = $value->NILAI_VALAS;
                    $nilai_rupiah       = $value->NILAI_RUPIAH;
                    $status_data        = $value->STATUS_DATA;

                    $realisasi->create([
                        'kdsatker'      => $kdsatker,
                        'kode_kementerian'  => $kode_kementerian,
                        'kd_jns_spp'    => $kd_jns_spp,
                        'no_spp'    => $no_spp,
                        'tgl_spp'   => $tgl_spp,
                        'no_spm'    => $no_spm,
                        'tgl_spm'   => $tgl_spm,
                        'no_sp2d'   => $no_sp2d,
                        'tgl_sp2d'  => $tgl_sp2d,
                        'no_sp2b'   => $no_sp2b,
                        'tgl_sp2b'  => $tgl_sp2b,
                        'uraian'    => $uraian,
                        'kode_coa'  => $kode_coa,
                        'kode_program'  => $kode_program,
                        'kode_kegiatan' => $kode_kegiatan,
                        'kode_output'   => $kode_output,
                        'kode_suboutput'    => $kode_suboutput,
                        'kode_komponen' => $kode_komponen,
                        'kode_subkomponen'  => $kode_subkomponen,
                        'kode_akun' => $kode_akun,
                        'kode_item' => $kode_item,
                        'mata_uang' => $mata_uang,
                        'kurs'  => $kurs,
                        'nilai_valas'   => $nilai_valas,
                        'nilai_rupiah'  => $nilai_rupiah,
                        'status_data'   => $status_data
                    ]);
                }
            }

            $satker->where('id', $data_satker->id)->update(['synch_realisasi' => 1]);
            return $statusCode;
            
        }
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }
    }

    public function synchDataRealisasiEselon1()
    {
        $satker     = new SatkerEselon1;
        $client     = new Client();
        $url        = new SaktiUrl;
        $modul      = new SaktiModul;
        $realisasi  = new RealisasiSaktiEselon1;

        $endpoint   = $url->where('id', 2)->first()->url;
        $token      = $modul->where('kode', 'PEM')->first()->token;
 
        $count_satker   = $satker->where('synch_realisasi', 0)->count();

        if($count_satker == 0)
        {
            return true;
        }
        
        $count_satker   = $satker->where('synch_realisasi', 2)->count();

        if($count_satker > 0)
        {
            return true;
        }

        $data_satker    = $satker->where('synch_realisasi', 0)->first();
        $kode_satker    = $data_satker->kode;

        try
        {
            $response = $client->post($endpoint.'PEM/realisasi/KL010/'.$kode_satker.'', [
                'http_errors' => false,
                'headers' => [
                    'Authorization' => 'Bearer '.$token,
                    'Accept-Encoding' => 'gzip, deflate',
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if($statusCode != 200)
            {
                $response   = $client->post('https://monsakti.kemenkeu.go.id/sitp-monsakti-omspan/webservice/resetToken/PEM/realisasi/KL010', [
                    'http_errors' => false,
                    'headers' => [
                        'Authorization' => 'Bearer '.$token
                    ]
                ]);

                $data   = json_decode($response->getBody());
                $token  = $data[0]->TOKEN;

                $modul->where('kode', 'PEM')->update(['token' => $token]);

                return $this->synchDataRealisasiEselon1();
            }
            else
            {
                $realisasi->where('kdsatker', $kode_satker)->delete();
                $data   = json_decode($response->getBody());

                $token  = $data[0][0]->TOKEN;

                $modul->where('kode', 'PEM')->update(['token' => $token]);
                
                $satker->where('id', $data_satker->id)->update(['synch_realisasi' => 2]);
                
                foreach($data[1] as $value)
                {
                    $kdsatker           = $value->KDSATKER;
                    $kode_kementerian   = $value->KODE_KEMENTERIAN;
                    $kd_jns_spp         = $value->KD_JNS_SPP;
                    $no_spp             = $value->NO_SPP;
                    $tgl_spp            = $value->TGL_SPP;
                    $no_spm             = $value->NO_SPM;
                    $tgl_spm            = $value->TGL_SPM;
                    $no_sp2d            = $value->TGL_SP2D;
                    $tgl_sp2d           = $value->TGL_SP2D;
                    $no_sp2b            = $value->TGL_SP2B;
                    $tgl_sp2b           = $value->TGL_SP2B;
                    $uraian             = $value->URAIAN;
                    $kode_coa           = $value->KODE_COA;
                    $kode_program       = $value->KODE_PROGRAM;
                    $kode_kegiatan      = $value->KODE_KEGIATAN;
                    $kode_output        = $value->KODE_OUTPUT;
                    $kode_suboutput     = $value->KODE_SUBOUTPUT;
                    $kode_komponen      = $value->KODE_KOMPONEN;
                    $kode_subkomponen   = $value->KODE_SUBKOMPONEN;
                    $kode_akun          = $value->KODE_AKUN;
                    $kode_item          = $value->KODE_ITEM;
                    $mata_uang          = $value->MATA_UANG;
                    $kurs               = $value->KURS;
                    $nilai_valas        = $value->NILAI_VALAS;
                    $nilai_rupiah       = $value->NILAI_RUPIAH;
                    $status_data        = $value->STATUS_DATA;

                    $realisasi->create([
                        'kdsatker'      => $kdsatker,
                        'kode_kementerian'  => $kode_kementerian,
                        'kd_jns_spp'    => $kd_jns_spp,
                        'no_spp'    => $no_spp,
                        'tgl_spp'   => $tgl_spp,
                        'no_spm'    => $no_spm,
                        'tgl_spm'   => $tgl_spm,
                        'no_sp2d'   => $no_sp2d,
                        'tgl_sp2d'  => $tgl_sp2d,
                        'no_sp2b'   => $no_sp2b,
                        'tgl_sp2b'  => $tgl_sp2b,
                        'uraian'    => $uraian,
                        'kode_coa'  => $kode_coa,
                        'kode_program'  => $kode_program,
                        'kode_kegiatan' => $kode_kegiatan,
                        'kode_output'   => $kode_output,
                        'kode_suboutput'    => $kode_suboutput,
                        'kode_komponen' => $kode_komponen,
                        'kode_subkomponen'  => $kode_subkomponen,
                        'kode_akun' => $kode_akun,
                        'kode_item' => $kode_item,
                        'mata_uang' => $mata_uang,
                        'kurs'  => $kurs,
                        'nilai_valas'   => $nilai_valas,
                        'nilai_rupiah'  => $nilai_rupiah,
                        'status_data'   => $status_data
                    ]);
                }
            }

            $satker->where('id', $data_satker->id)->update(['synch_realisasi' => 1]);
            return $statusCode;
            
        }
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }
    }

    public function synchProgram()
    {
        $client     = new Client();
        $url        = new SaktiUrl;
        $modul      = new SaktiModul;
        $program    = new SaktiProgram;

        $endpoint   = $url->where('id', 2)->first()->url;
        $token      = $modul->where('kode', 'ADM')->first()->token;
        try
        {
            $response = $client->post($endpoint.'ADM/refUraian/KL010/program', [
                'http_errors' => false,
                'headers' => [
                    'Authorization' => 'Bearer '.$token,
                    'Accept-Encoding' => 'gzip, deflate',
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if($statusCode != 200)
            {
                $response   = $client->post('https://monsakti.kemenkeu.go.id/sitp-monsakti-omspan/webservice/resetToken/ADM/refUraian/KL010', [
                    'http_errors' => false,
                    'headers' => [
                        'Authorization' => 'Bearer '.$token
                    ]
                ]);

                $data   = json_decode($response->getBody());
                $token  = $data[0]->TOKEN;

                $modul->where('kode', 'ADM')->update(['token' => $token]);

                return $this->synchProgram();
            }
            else
            {
                $program->truncate();
                $data   = json_decode($response->getBody());
                
                $token  = $data[0][0]->TOKEN;
                
                $modul->where('kode', 'ADM')->update(['token' => $token]);
                
                foreach($data[1] as $value)
                {
                    $tahun      = $value->THANG;
                    $kode       = $value->KODE;
                    $deskripsi  = $value->DESKRIPSI;

                    $program->create([
                        'tahun'     => $tahun,
                        'kode'      => $kode,
                        'deskripsi' => $deskripsi
                    ]);
                }
            }

            return $statusCode;
            
        }
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }
    }

    public function synchKegiatan()
    {
        $client     = new Client();
        $url        = new SaktiUrl;
        $modul      = new SaktiModul;
        $kegiatan   = new SaktiKegiatan;

        $endpoint   = $url->where('id', 2)->first()->url;
        $token      = $modul->where('kode', 'ADM')->first()->token;
        try
        {
            $response = $client->post($endpoint.'ADM/refUraian/KL010/kegiatan', [
                'http_errors' => false,
                'headers' => [
                    'Authorization' => 'Bearer '.$token,
                    'Accept-Encoding' => 'gzip, deflate',
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if($statusCode != 200)
            {
                $response   = $client->post('https://monsakti.kemenkeu.go.id/sitp-monsakti-omspan/webservice/resetToken/ADM/refUraian/KL010', [
                    'http_errors' => false,
                    'headers' => [
                        'Authorization' => 'Bearer '.$token
                    ]
                ]);

                $data   = json_decode($response->getBody());
                $token  = $data[0]->TOKEN;

                $modul->where('kode', 'ADM')->update(['token' => $token]);

                return $this->synchKegiatan();
            }
            else
            {
                $kegiatan->truncate();
                $data   = json_decode($response->getBody());
                
                $token  = $data[0][0]->TOKEN;
                
                $modul->where('kode', 'ADM')->update(['token' => $token]);
                
                foreach($data[1] as $value)
                {
                    $tahun      = $value->THANG;
                    $kode       = $value->KODE;
                    $deskripsi  = $value->DESKRIPSI;

                    $kegiatan->create([
                        'tahun'     => $tahun,
                        'kode'      => $kode,
                        'deskripsi' => $deskripsi
                    ]);
                }
            }

            return $statusCode;
            
        }
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }
    }

    public function synchOutput()
    {
        $client     = new Client();
        $url        = new SaktiUrl;
        $modul      = new SaktiModul;
        $output     = new SaktiOutput;

        $endpoint   = $url->where('id', 2)->first()->url;
        $token      = $modul->where('kode', 'ADM')->first()->token;
        try
        {
            $response = $client->post($endpoint.'ADM/refUraian/KL010/output', [
                'http_errors' => false,
                'headers' => [
                    'Authorization' => 'Bearer '.$token,
                    'Accept-Encoding' => 'gzip, deflate',
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if($statusCode != 200)
            {
                $response   = $client->post('https://monsakti.kemenkeu.go.id/sitp-monsakti-omspan/webservice/resetToken/ADM/refUraian/KL010', [
                    'http_errors' => false,
                    'headers' => [
                        'Authorization' => 'Bearer '.$token
                    ]
                ]);

                $data   = json_decode($response->getBody());
                $token  = $data[0]->TOKEN;

                $modul->where('kode', 'ADM')->update(['token' => $token]);

                return $this->synchOutput();
            }
            else
            {
                $output->truncate();
                $data   = json_decode($response->getBody());
                
                $token  = $data[0][0]->TOKEN;
                
                $modul->where('kode', 'ADM')->update(['token' => $token]);
                
                foreach($data[1] as $value)
                {
                    $tahun      = $value->THANG;
                    $kode       = $value->KODE;
                    $deskripsi  = $value->DESKRIPSI;

                    $output->create([
                        'tahun'     => $tahun,
                        'kode'      => $kode,
                        'deskripsi' => $deskripsi
                    ]);
                }
            }

            return $statusCode;
            
        }
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }
    }

    public function synchSubOutput()
    {
        $client     = new Client();
        $url        = new SaktiUrl;
        $modul      = new SaktiModul;
        $suboutput  = new SaktiSubOutput;

        $endpoint   = $url->where('id', 2)->first()->url;
        $token      = $modul->where('kode', 'ADM')->first()->token;
        try
        {
            $response = $client->post($endpoint.'ADM/refUraian/KL010/suboutput', [
                'http_errors' => false,
                'headers' => [
                    'Authorization' => 'Bearer '.$token,
                    'Accept-Encoding' => 'gzip, deflate',
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if($statusCode != 200)
            {
                $response   = $client->post('https://monsakti.kemenkeu.go.id/sitp-monsakti-omspan/webservice/resetToken/ADM/refUraian/KL010', [
                    'http_errors' => false,
                    'headers' => [
                        'Authorization' => 'Bearer '.$token
                    ]
                ]);

                $data   = json_decode($response->getBody());
                $token  = $data[0]->TOKEN;

                $modul->where('kode', 'ADM')->update(['token' => $token]);

                return $this->synchSubOutput();
            }
            else
            {
                $suboutput->truncate();
                $data   = json_decode($response->getBody());
                
                $token  = $data[0][0]->TOKEN;
                
                $modul->where('kode', 'ADM')->update(['token' => $token]);
                
                foreach($data[1] as $value)
                {
                    $tahun      = $value->THANG;
                    $kode       = $value->KODE;
                    $deskripsi  = $value->DESKRIPSI;

                    $suboutput->create([
                        'tahun'     => $tahun,
                        'kode'      => $kode,
                        'deskripsi' => $deskripsi
                    ]);
                }
            }

            return $statusCode;
            
        }
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }
    }

    public function synchKomponen()
    {
        $client     = new Client();
        $url        = new SaktiUrl;
        $modul      = new SaktiModul;
        $komponen   = new SaktiKomponen;

        $endpoint   = $url->where('id', 2)->first()->url;
        $token      = $modul->where('kode', 'ADM')->first()->token;
        try
        {
            $response = $client->post($endpoint.'ADM/refUraian/KL010/komponen', [
                'http_errors' => false,
                'headers' => [
                    'Authorization' => 'Bearer '.$token,
                    'Accept-Encoding' => 'gzip, deflate',
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if($statusCode != 200)
            {
                $response   = $client->post('https://monsakti.kemenkeu.go.id/sitp-monsakti-omspan/webservice/resetToken/ADM/refUraian/KL010', [
                    'http_errors' => false,
                    'headers' => [
                        'Authorization' => 'Bearer '.$token
                    ]
                ]);

                $data   = json_decode($response->getBody());
                $token  = $data[0]->TOKEN;

                $modul->where('kode', 'ADM')->update(['token' => $token]);

                return $this->synchKomponen();
            }
            else
            {
                $komponen->truncate();
                $data   = json_decode($response->getBody());
                
                $token  = $data[0][0]->TOKEN;
                
                $modul->where('kode', 'ADM')->update(['token' => $token]);
                
                foreach($data[1] as $value)
                {
                    $tahun      = $value->THANG;
                    $kode       = $value->KODE;
                    $deskripsi  = $value->DESKRIPSI;

                    $komponen->create([
                        'tahun'     => $tahun,
                        'kode'      => $kode,
                        'deskripsi' => $deskripsi
                    ]);
                }
            }

            return $statusCode;
            
        }
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }
    }

    public function synchAkun()
    {
        $client     = new Client();
        $url        = new SaktiUrl;
        $akun       = new SaktiAkun;
        $modul      = new SaktiModul;

        $endpoint   = $url->where('id', 2)->first()->url;
        $token      = $modul->where('kode', 'ADM')->first()->token;
        try
        {
            $response = $client->post($endpoint.'ADM/refUraian/KL010/akun', [
                'http_errors' => false,
                'headers' => [
                    'Authorization' => 'Bearer '.$token,
                    'Accept-Encoding' => 'gzip, deflate',
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if($statusCode != 200)
            {
                $response   = $client->post('https://monsakti.kemenkeu.go.id/sitp-monsakti-omspan/webservice/resetToken/ADM/refUraian/KL010', [
                    'http_errors' => false,
                    'headers' => [
                        'Authorization' => 'Bearer '.$token
                    ]
                ]);

                $data   = json_decode($response->getBody());
                $token  = $data[0]->TOKEN;

                $modul->where('kode', 'ADM')->update(['token' => $token]);

                return $this->synchAkun();
            }
            else
            {
                $akun->truncate();
                $data   = json_decode($response->getBody());
                
                $token  = $data[0][0]->TOKEN;
                
                $modul->where('kode', 'ADM')->update(['token' => $token]);
                
                foreach($data[1] as $value)
                {
                    $tahun      = $value->THANG;
                    $kode       = $value->KODE;
                    $deskripsi  = $value->DESKRIPSI;

                    $akun->create([
                        'tahun'     => $tahun,
                        'kode'      => $kode,
                        'deskripsi' => $deskripsi
                    ]);
                }
            }

            return $statusCode;
            
        }
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }
    }

    public function synchTematik()
    {
        $client     = new Client();
        $url        = new SaktiUrl;
        $modul      = new SaktiModul;
        $tematik    = new SaktiTematik;

        $endpoint   = $url->where('id', 2)->first()->url;
        $token      = $modul->where('kode', 'ADM')->first()->token;
        try
        {
            $response = $client->post($endpoint.'ADM/refUraian/KL010/tematik', [
                'http_errors' => false,
                'headers' => [
                    'Authorization' => 'Bearer '.$token,
                    'Accept-Encoding' => 'gzip, deflate',
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if($statusCode != 200)
            {
                $response   = $client->post('https://monsakti.kemenkeu.go.id/sitp-monsakti-omspan/webservice/resetToken/ADM/refUraian/KL010', [
                    'http_errors' => false,
                    'headers' => [
                        'Authorization' => 'Bearer '.$token
                    ]
                ]);

                $data   = json_decode($response->getBody());
                $token  = $data[0]->TOKEN;

                $modul->where('kode', 'ADM')->update(['token' => $token]);

                return $this->synchTematik();
            }
            else
            {
                $tematik->truncate();
                $data   = json_decode($response->getBody());
                
                $token  = $data[0][0]->TOKEN;
                
                $modul->where('kode', 'ADM')->update(['token' => $token]);
                
                foreach($data[1] as $value)
                {
                    $tahun      = $value->THANG;
                    $kode       = $value->KODE;
                    $deskripsi  = $value->DESKRIPSI;

                    $tematik->create([
                        'tahun'     => $tahun,
                        'kode'      => $kode,
                        'deskripsi' => $deskripsi
                    ]);
                }
            }

            return $statusCode;
            
        }
        catch (\Throwable $th)
        {
            return $th->getMessage();
        }
    }

    public function detailDekon()
    {
        $satker         = new Satker;
        $anggaran       = new SaktiAnggaran;
        $realisasi      = new SaktiRealisasi;
        // $data_dekon     = $satker->where('kode', 'NOT LIKE', '027486')->get();
        $data_dekon     = $satker->whereNotIn('kode', ['027486', '356000', '417936', '690639'])->get();

        if(is_numeric(Auth::user()->prov))
        {
            $data_dekon = $satker->where('kode', Auth::user()->kdsatker)->get();
        }

        $i  = 0;
        $no = 1;

        foreach ($data_dekon as $dekon)
        {
            $total_anggaran   = $anggaran->where([
                'kdsatker' => $dekon->kode,
                'urutan_header1' => 0
            ])->where('hargasat', '<>', 0)->sum('total');

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

            if($total_sisa > 0)
            {
                $data_dekon[$i]->total_persentase = number_format((float)$total_realisasi/$total_anggaran*100, 2, '.', '')."%";
            }
            else if($total_sisa == 0)
            {
                $data_dekon[$i]->total_persentase = "100%";
            }

            $i++;
            $no++;
        }

        return $data_dekon;
    }

    public function detailTp()
    {
        $satker         = new Satker;
        $anggaran       = new SaktiAnggaran;
        $realisasi      = new SaktiRealisasi;
        $data_dekon     = $satker->whereIn('kode', ['356000', '417936', '690639'])->get();

        if(is_numeric(Auth::user()->prov))
        {
            $data_dekon = $satker->where('kode', Auth::user()->kdsatker)->get();
        }

        $i  = 0;
        $no = 1;

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

            if($total_sisa > 0)
            {
                $data_dekon[$i]->total_persentase = number_format((float)$total_realisasi/$total_anggaran*100, 2, '.', '')."%";
            }

            $i++;
            $no++;
        }

        return $data_dekon;
    }

    public function subDetailDekon(Request $request)
    {
        $i              = 0;
        $satker         = new Satker;
        $pagu           = new SaktiAnggaran;
        $realisasi      = new SaktiRealisasi;
        $subkomponen    = new SubkomponenDekon;

        // $data           = DB::SELECT('SELECT
        //                     SUM(total) as anggaran, kode_subkomponen
        //                     FROM tb_sakti_anggaran
        //                     WHERE kdsatker like \''.$request->id.'\'
        //                     AND urutan_header1 = \'0\'
        //                     GROUP BY kode_subkomponen ORDER BY kode_subkomponen
        //                 ');

        $data_satker    = $satker->where('kode', $request->id)->first();
        $count          = $subkomponen->where('kdsatker', $request->id)->count();

        if($count == 0)
        {
            $data   = $subkomponen->where([
                'kdsatker'      => "ALL",
                'jenis_satker'  => $data_satker->jenis_satker
            ])->get();
        }
        else
        {
            $data   = $subkomponen->where('kdsatker', $request->id)->get();
        }

        foreach ($data as $value)
        {
            $kode_pagu          = $value->kode_subkomponen_pagu;
            $kode_realisasi     = $value->kode_subkomponen_realisasi;
            
            $total_anggaran     = $pagu->where([
                'kdsatker'          => $request->id,
                'kode_subkomponen'  => $kode_pagu
            ])->where('hargasat', '<>', 0)->sum('total');

            $total_realisasi    = $realisasi->where([
                'kdsatker'          => $request->id,
                'kode_subkomponen'  => $kode_realisasi,
                'status_data'       => 'Upload SP2D'
            ])->sum('nilai_rupiah');

            $total_sisa                 = $total_anggaran-$total_realisasi;
            
            if($total_sisa > 0)
            {
                $data[$i]->total_persentase = number_format((float)$total_realisasi/$total_anggaran*100, 2, '.', '')."%";
            }
            else if($total_sisa == 0)
            {
                $data[$i]->total_persentase = "100%";
            }

            $data[$i]->tugas            = $value->deskripsi;
            $data[$i]->total_sisa       = number_format($total_sisa);
            $data[$i]->total_anggaran   = number_format($total_anggaran);
            $data[$i]->total_realisasi  = number_format($total_realisasi);

            $i++;
        }

        // foreach ($data as $value)
        // {
        //     $kode_realisasi = $value->kode_subkomponen;

        //     $count                      = $subkomponen->where([
        //             'kdsatker'              => $request->id,
        //             'kode_subkomponen_pagu' => $value->kode_subkomponen
        //     ])->count();

        //     if($count == 0)
        //     {
        //         $tugas  = "-";
        //         $count1 = $subkomponen->where([
        //             'kode_subkomponen_pagu' => $value->kode_subkomponen,
        //             'kdsatker'              => 'ALL'
        //         ])->count();

        //         if($count1 > 0)
        //         {
        //             $tugas                  = $subkomponen->where([
        //                 'kode_subkomponen_pagu' => $value->kode_subkomponen,
        //                 'kdsatker'              => 'ALL'
        //             ])->first()->deskripsi;

        //             $kode_realisasi = $subkomponen->where([
        //                 'kode_subkomponen_pagu' => $value->kode_subkomponen,
        //                 'kdsatker'              => 'ALL'
        //             ])->first()->kode_subkomponen_realisasi;
        //         }
        //     }
        //     else
        //     {
        //         $tugas                  = $subkomponen->where([
        //             'kode_subkomponen_pagu' => $value->kode_subkomponen,
        //             'kdsatker'              => $request->id
        //         ])->first()->deskripsi;

        //         $kode_realisasi = $subkomponen->where([
        //             'kode_subkomponen_pagu' => $value->kode_subkomponen,
        //             'kdsatker'              => 'ALL'
        //         ])->first()->kode_subkomponen_realisasi;
        //     }
            
        //     // switch ($value->kode_subkomponen) {
        //     //     case 'A':
        //     //         $kode_subkomponen_real  = "0A";
        //     //         break;
        //     //     case 'B':
        //     //         $kode_subkomponen_real  = "0B";
        //     //         break;
        //     //     case 'C':
        //     //         $kode_subkomponen_real  = "0C";
        //     //         break;
        //     //     case 'D':
        //     //         $kode_subkomponen_real  = "0D";
        //     //         break;
        //     //     case 'E':
        //     //         $kode_subkomponen_real  = "0E";
        //     //         break;
        //     //     case 'F':
        //     //         $kode_subkomponen_real  = "0F";
        //     //         break;
        //     //     case 'G':
        //     //         $kode_subkomponen_real  = "0G";
        //     //         break;

        //     //     default:
        //     //         $kode_subkomponen_real  = $value->kode_subkomponen;
        //     //         break;
        //     // }

        //     $total_anggaran   = $pagu->where([
        //         'kdsatker'          => $request->id,
        //         'kode_subkomponen'  => $kode_realisasi
        //     ])->sum('nilai_rupiah');
            
        //     $total_realisasi  = $realisasi->where([
        //         'kdsatker'          => $request->id,
        //         'kode_subkomponen'  => $kode_realisasi
        //     ])->sum('nilai_rupiah');

        //     $total_sisa                 = $total_anggaran-$total_realisasi;
        //     $data[$i]->tugas            = $tugas;
        //     $data[$i]->total_sisa       = number_format($total_sisa);
        //     $data[$i]->total_anggaran   = number_format($total_anggaran);
        //     $data[$i]->total_realisasi  = number_format($total_realisasi);
        //     $data[$i]->total_persentase = "0%";

        //     if($total_sisa > 0)
        //     {
        //         $data[$i]->total_persentase = number_format((float)$total_realisasi/$total_anggaran*100, 2, '.', '')."%";
        //     }
        //     else if($total_sisa == 0)
        //     {
        //         $data[$i]->total_persentase = "100%";
        //     }

        //     $i++;
        // }

        return $data;
    }

    public function detailPusat()
    {
        $direktorat     = new Direktorat;
        $subkomponen    = new SubKomponen;
        $anggaran       = new SaktiAnggaran;
        $realisasi      = new SaktiRealisasi;
        
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

            $total_realisasi  = $realisasi->where('kdsatker', '027486')->whereNotNull('no_sp2d')->whereIn('kode_subkomponen', $kd_skmpn_realisasi)->sum('nilai_rupiah');
            
            // $kode_subkomponen = $subkomponen->where('kode_direktorat', $value->id_dir)->get();

            // $kd_skmpn = [];

            // foreach ($kode_subkomponen as $value_sk)
            // {
            //     $kd_skmpn[] = $value_sk->kode;
            // }

            // $data[$i]->no = $no.".";
            // $total_anggaran   = $anggaran->where([
            //     'urutan_header1'    => 0,
            //     'urutan_header2'    => 0,
            //     'kdsatker'          => '027486'
            // ])->whereIn('kode_subkomponen', $kd_skmpn)->sum('total');

            // // if($value->id_dir == "1239")
            // // {
            // //     $total_anggaran   = 11684670000;
            // // }
            // // else if($value->id_dir == "1241")
            // // {
            // //     $total_anggaran   = 7003000000;
            // // }
            // // else if($value->id_dir == "1237")
            // // {
            // //     $total_anggaran   = 27524036000;
            // // }
            // // else if($value->id_dir == "1240")
            // // {
            // //     $total_anggaran   = 10387818000;
            // // }
            // // else if($value->id_dir == "1242")
            // // {
            // //     $total_anggaran   = 67605176000;
            // // }
            // // else if($value->id_dir == "1238")
            // // {
            // //     $total_anggaran   = 7998053000;
            // // }
            
            // $total_realisasi  = $realisasi->where('kdsatker', '027486')->whereNotNull('no_sp2d')->whereIn('kode_subkomponen', $kd_skmpn)->sum('nilai_rupiah');

            $total_sisa                 = $total_anggaran-$total_realisasi;
            $data[$i]->total_sisa       = number_format($total_sisa);
            $data[$i]->total_anggaran   = number_format($total_anggaran);
            $data[$i]->total_realisasi  = number_format($total_realisasi);
            $data[$i]->total_persentase = "0%";
            $data[$i]->nama_dir         = '<a href="javascript:void(0)" onclick="loadSubDetailPusat(\''.$value->id_dir.'\', \''.$value->nama_dir.'\')">'.$value->nama_dir.'</a>';
            
            if($total_sisa > 0)
            {
                $data[$i]->total_persentase = number_format((float)$total_realisasi/$total_anggaran*100, 2, '.', '')."%";
            }

            $i++;
            $no++;
        }

        return $data;
    }

    public function subDetailPusat(Request $request)
    {
        $subdit         = new Subdirektorat;
        $subkomponen    = new SubKomponen;
        $anggaran       = new SaktiAnggaran;
        $realisasi      = new SaktiRealisasi;
        
        $data           = $subdit->where('id_dir', $request->direktorat)->get();

        $i  = 0;
        $no = 1;

        foreach ($data as $value)
        {
            $kode_subkomponen = $subkomponen->where('kode_subdirektorat', $value->id)->get();

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

            $total_realisasi  = $realisasi->where('kdsatker', '027486')->whereNotNull('no_sp2d')->whereIn('kode_subkomponen', $kd_skmpn_realisasi)->sum('nilai_rupiah');

            $total_sisa                 = $total_anggaran-$total_realisasi;
            $data[$i]->total_sisa       = number_format($total_sisa);
            $data[$i]->total_anggaran   = number_format($total_anggaran);
            $data[$i]->total_realisasi  = number_format($total_realisasi);
            $data[$i]->total_persentase = "0%";
            $data[$i]->subdirektorat    = strtoupper($value->nama_subdir);
            
            if($total_sisa > 0)
            {
                $data[$i]->total_persentase = number_format((float)$total_realisasi/$total_anggaran*100, 2, '.', '')."%";
            }

            $i++;
            $no++;
        }

        return $data;
    }
}
