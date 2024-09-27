<?php

namespace App\Imports;

use App\Realisasi;
use Maatwebsite\Excel\Concerns\ToModel;

class RealisasiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Realisasi([
            'jml_revisi' => $row[0],
            'bukti_revisi' => $row[1],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
