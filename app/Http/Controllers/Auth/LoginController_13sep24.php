<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RealisasiImport;
use Maatwebsite\Excel\Imports\TesImport;

use DB;
use App\PaguHistory;
use App\SaktiAnggaran;
use App\SatkerEselon1;
use App\SaktiRealisasi;
use App\SatkerKemendagri;
use App\RealisasiSaktiEselon1;
use App\SaktiRefSts;
use App\Tes;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Import data from Excel file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
     public function import(Request $request)
    {
         $request->validate([
             'file' => 'required|file|mimes:xlsx,xls|max:2048',
         ]);
 
         if ($request->hasFile('file')) {
             $file = $request->file('file');
             
             try {
                 Excel::import(new TesImport, $file);
                 return redirect()->route('realisasi.index')->with('success', 'Data imported successfully.');
             } catch (\Exception $e) {
                 return redirect()->back()->with('error', 'Error importing data: ' . $e->getMessage());
             }
         }
 
         return redirect()->back()->with('error', 'No file uploaded.');
    }

    
    public function showLoginForm()
    {
        // variable tambahan
        $modul      = "Home";
        $current    = "Dashboard";
        // siapkan table yang digunakan
        $pagu       = new PaguHistory;
        $ang        = new SaktiAnggaran;
        $ses1       = new SatkerEselon1;
        $real       = new SaktiRealisasi;
        $es1        = new SatkerKemendagri;
        $real1      = new RealisasiSaktiEselon1;
        $newMaatlab = new \App\Imports\RealisasiImport();
        $realisasiData = Tes::all();
        // ====================
        // pagu anggaran ditjen
        // query data anggaran
        $anggaran   = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->sum('total');
        // set tahun
        $tahun  = date("Y");
        // query data pagu
        $data_pagu  = $pagu->where("title","like","%{$tahun}%")
                    ->orWhere("tanggal","like","%{$tahun}%")
                    ->orderBy('tanggal', 'DESC')->first();
        // end perihal data pagu
        // =====================
        // realisasi anggaran ditjen
        
        $pagu_pusat = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->where('kdsatker', '027486')->sum('total');
        
        $rm_pusat = $ang->where('kode_register', 'NOT LIKE', '1CZ6CF2A')->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->where('kdsatker', '027486')->sum('total');

        $phln_pusat = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0,
            'kode_register'     => "1CZ6CF2A"
        ])->where('kdsatker', '027486')->sum('total');

        $realisasi_phln = $real->where([
            'kdsatker'      => '027486',
            'kode_kegiatan' => '1237',
            'kode_output'   => 'FBA'
        ])->sum('nilai_rupiah');

        $rm_pusat   = $pagu_pusat-$phln_pusat;
        
        $realisasi = Tes::all();
        $realisasi_anggaran = 0;
        $realisasi_dekon = 0;
        $realisasi_tp = 0;
        $am5 = 0;
        $am6 = 0;
        $am7 = 0;
        foreach ($realisasi as $item) {
            $excelPath = storage_path('app/public/bukti_ref/' . $item->bukti_ref);
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
            $spreadsheet = $reader->load($excelPath);
            $worksheet = $spreadsheet->getActiveSheet();
            $realisasi_anggaran += $worksheet->getCell('AN5')->getValue();
            $realisasi_dekon += $worksheet->getCell('AN6')->getValue();
            $realisasi_tp += $worksheet->getCell('AN7')->getValue();
            $am5 += $worksheet->getCell('AM5')->getValue();
            $am6 += $worksheet->getCell('AM6')->getValue();
            $am7 += $worksheet->getCell('AM7')->getValue();
            $pagu_anggaran = $am5+$am6+$am7;
        }
        $anggaran = $pagu_anggaran;
       
        $sisa_pusat         = $pagu_pusat-$realisasi_anggaran;
        $sisa_rm_pusat      = $rm_pusat-$realisasi_anggaran;     

        $pagu_dekon = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->whereNotIn('kdsatker', ['027486', '356000', '417936', '690639'])->sum('total');
        
        // $realisasi_dekon = $real->whereNotIn('kdsatker', ['027486', '356000', '417936', '690639'])->sum('nilai_rupiah');
        // $realisasi_dekon    = getSumRealisasiDekon();
        $sisa_dekon         = $pagu_dekon-$realisasi_dekon;

        $pagu_tp = $ang->whereIn('kdsatker', ['356000', '417936', '690639'])->sum('total');
        $realisasi_tp = $real->where('status_data', 'Upload SP2D')->whereIn('kdsatker', ['356000', '417936', '690639'])->sum('nilai_rupiah');
        $sisa_tp = $pagu_tp-$realisasi_tp;

        $last_synch_ang = $ang->max('created_at');
        $last_synch_real = $real->max('created_at');

        $data_dekon = DB::SELECT('SELECT sum(nilai_rupiah) as total, kdsatker, nama_satker FROM tb_sakti_realisasi 
        LEFT OUTER JOIN tbm_satker ON tbm_satker.kode=tb_sakti_realisasi.kdsatker
        WHERE kdsatker NOT LIKE \'027486\'
        GROUP BY kdsatker, nama_satker
        ORDER BY SUM(nilai_rupiah) DESC');

        $realisasi_data = $realisasi_anggaran+$realisasi_dekon+$realisasi_tp;
        $selisih            = $anggaran-$realisasi_data;


        $sum_real_eselon1   = 0;
        $sum_pagu_eselon1   = 0;
        $sum_real_eselon2   = 0;
        $sum_pagu_eselon2   = 0;

        $color              = [];
        $real_eselon1       = [];
        $satker_eselon1     = [];
        $rata2_eselon1      = [];
        $rata2_eselon2      = [];
        $data_es1           = DB::table('v_sisa')->orderBy('persentase_realisasi', 'desc')->get();

        foreach ($data_es1 as $value_es1)
        {
            // $real_eselon1[]     = $ses1
            //                     ->leftJoin('tb_sakti_realisasi_eselon1', 'tb_sakti_realisasi_eselon1.kdsatker', '=', 'tbm_satker_eselon1.kode')
            //                     ->where([
            //                         'status_data'           => 'Upload SP2D',
            //                         'id_satker_kemendagri'  => $value_es1->id
            //                     ])->sum('nilai_rupiah');

            // $satker_eselon1[]   = $value_es1->nama_satker;
            $color[]            = $value_es1->bgcolor;
            $satker_eselon1[]   = $value_es1->nama_satker;
            $real_eselon1[]     = number_format((float) $value_es1->persentase_realisasi,2);

            if ((int)$value_es1->id === 11) {
                $sum_pagu_eselon2 = $value_es1->pagu;
                $sum_real_eselon2 = $value_es1->realisasi;
            }

            $sum_pagu_eselon1 += $value_es1->pagu;
            $sum_real_eselon1 += $value_es1->realisasi;
        }

        $color   = json_encode($color);
        $real_eselon1   = json_encode($real_eselon1);
        $satker_eselon1 = json_encode($satker_eselon1);

        $rata2_realisasi_eselon1 = ($sum_real_eselon1/$sum_pagu_eselon1) * 100;
        $rata2_realisasi_eselon2 = ($sum_real_eselon2/$sum_pagu_eselon2) * 100;

        foreach($data_es1 as $row)
        {
            $rata2_eselon1[] = number_format((float)$rata2_realisasi_eselon1, 2);
            $rata2_eselon2[] = number_format((float)$rata2_realisasi_eselon2, 2);
        }
        
        $rata2_eselon1 = json_encode($rata2_eselon1);
        $rata2_eselon2 = json_encode($rata2_eselon2);
        $bukti_ref = json_encode($realisasi);

        // kirim data ke view
        return view('auth.dashboard-login', compact('anggaran','data_pagu', 'realisasi_data', 'selisih', 'pagu_pusat', 
            'realisasi_anggaran', 'sisa_pusat', 'sisa_rm_pusat', 'pagu_dekon', 'realisasi_dekon', 'sisa_dekon', 'pagu_tp', 
            'realisasi_tp', 'sisa_tp', 'last_synch_ang', 'last_synch_real', 'data_dekon', 'rm_pusat', 'phln_pusat', 'data_pagu', 
            'realisasi_phln', 'satker_eselon1', 'real_eselon1', 'data_es1', 'color', 'rata2_eselon1', 'rata2_eselon2', 'bukti_ref', 'pagu_anggaran', 'realisasi'));
    }

    public function username()
    {
        return 'username';
    }
}
