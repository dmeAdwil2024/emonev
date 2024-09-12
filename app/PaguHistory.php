<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaguHistory extends Model
{
    protected $table    = 'tbm_pagu_history';
    protected $fillable = ['title', 'tanggal', 'pagu', 'keterangan'];

    public function getHistory()
    {
        $i      = 0;
        $no     = 1;
        $tahun  = date("Y");
        $data   = $this->where("title","like","%{$tahun}%")
                  ->orWhere("tanggal","like","%{$tahun}%")
                  ->orderBy('created_at',"DESC")->get();
        
        $history = [];
        foreach ($data as $value)
        {
            $history[$i] = new \stdClass();
            $jenisRevisi        = stripos($value->title, 'DIPA') !== FALSE ? 'DIPA' : 'POK';
            $keterangan         = preg_replace( "/\r|\n/", "", $value->keterangan);
            $history[$i]->no       = $no.".";
            $history[$i]->tgl      = date("d/m/Y", strtotime($value->tanggal));
            $history[$i]->nominal  = number_format($value->pagu);
            $history[$i]->judul    = '<a href="javascript:void(0)" onclick="openModalAction(\''.$value->id.'\', \''.$value->pagu.'\', \''.$value->title.'\', \''.$value->tanggal.'\', \''.$keterangan.'\')">'.$value->Title.'</a>';
            $history[$i]->jenis    = $jenisRevisi;
            $history[$i]->keterangan = $value->keterangan;
            $history[$i]->date_sort  = date("Ymd", strtotime($value->tanggal));

            $i++;
            $no++;
        }

        return $history;
    }
}
