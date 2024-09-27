<?php

namespace App\Http\Controllers;

use App\Direktorat;
use App\Subdirektorat;
use DB;
use App\PaguHistory;
use App\SaktiRefSts;
use App\SaktiAnggaran;
use App\SatkerEselon1;
use App\SaktiRealisasi;
use App\SatkerKemendagri;
use App\RealisasiSaktiEselon1;
use App\Provinsi;
use App\Satker;
use Auth;
use App\Tes;
use App\ImportEslon1;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {}

    public function sumRealisasi(Request $request)
    {
        $nama_satker    = $request->nama_satker;
        $data           = DB::table('v_sisa')->where('nama_satker', $nama_satker)->get();
        return $data;
    }

    public function dashboard()
    {
        // if (Auth::user()->level == 27 || Auth::user()->level == 2) {
        // 	return $this->dashboarduke2();
        // } else
        // if (Auth::user()->level == 3) {
        // 	return $this->dashboarduke3();
        // }
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
        $dir          = new Direktorat;
        $provinsi      = new Provinsi;
        // ====================
        // pagu anggaran ditjen
        // query data anggaran
        // $anggaran   = $ang->where([
        //     'urutan_header1'    => 0,
        //     'urutan_header2'    => 0
        // ])->sum('total');

        $realisasi = Tes::latest()->first();
        $realisasi_anggaran = 0;
        $realisasi_dekon = 0;
        $realisasi_tp = 0;
        $an5 = 0;
        $an6 = 0;
        $an7 = 0;

        $am5 = 0;
        $am6 = 0;
        $am7 = 0;
        // foreach ($realisasi as $item) {
        $pagu_new = 0;
        if (!empty($realisasi)) {
            $excelPath = storage_path('app/public/bukti_ref/' . $realisasi->bukti_ref);
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
            $spreadsheet = $reader->load($excelPath);
            $worksheet = $spreadsheet->getActiveSheet();
            $realisasi_anggaran += $worksheet->getCell('AN5')->getValue();
            $realisasi_dekon += $worksheet->getCell('AN6')->getValue();
            $realisasi_tp += $worksheet->getCell('AN7')->getValue();
            $an5 += $worksheet->getCell('AN5')->getValue();
            $an6 += $worksheet->getCell('AN6')->getValue();
            $an7 += $worksheet->getCell('AN7')->getValue();
            // $realisasi_anggaran = $an5+$an6+$an7;

            $am5 += $worksheet->getCell('AM5')->getValue();
            $am6 += $worksheet->getCell('AM6')->getValue();
            $am7 += $worksheet->getCell('AM7')->getValue();
            // $pagu_anggaran = $am5+$am6+$am7;

            // $pagu_pusat_new = $worksheet->getCell('AM5')->getValue();
            // $realisasi_pusat_new = $worksheet->getCell('AN5')->getValue();

            // $pagu_dekon_new = $worksheet->getCell('AM6')->getValue();
            // $realisasi_dekon_new = $worksheet->getCell('AN6')->getValue();

            // $pagu_tp_new = $worksheet->getCell('AM7')->getValue();
            // $realisasi_tp_new = $worksheet->getCell('AN7')->getValue();
            // }
            // $realisasi_anggaran_new = $realisasi_anggaran;
            // $pagu_new = $pagu_anggaran;
            $pagu_new = $am5 + $am6 + $am7;
        }

        // set tahun
        $tahun  = date("Y");
        // query data pagu
        $data_pagu  = $pagu->where("title", "like", "%{$tahun}%")
            ->orWhere("tanggal", "like", "%{$tahun}%")
            ->orderBy('tanggal', 'DESC')->first();
        // end perihal data pagu
        // =====================
        // realisasi anggaran ditjen
        // query realisasi

        // $realisasi  = $real->whereNotNull('no_sp2d')->sum('nilai_rupiah');
        //
        // $pagu_pusat = $ang->where([
        //     'urutan_header1'    => 0,
        //     'urutan_header2'    => 0
        // ])->where('kdsatker', '027486')->sum('total');
        $pagu_pusat = $am5;

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

        $rm_pusat   = $pagu_pusat - $phln_pusat;

        // $realisasi_pusat = $real->where('kdsatker', '027486')->whereNotNull('no_sp2d')->sum('nilai_rupiah');
        // $realisasi_pusat    = getSumRealisasiPusat();
        $realisasi_pusat    = $an5;
        $sisa_pusat         = $pagu_pusat - $realisasi_pusat;
        $sisa_rm_pusat      = $rm_pusat - $realisasi_pusat;

        // $pagu_dekon = $ang->where([
        //     'urutan_header1'    => 0,
        //     'urutan_header2'    => 0
        // ])->whereNotIn('kdsatker', ['027486', '356000', '417936', '690639'])->sum('total');
        $pagu_dekon = $am6;

        // $realisasi_dekon = $real->whereNotIn('kdsatker', ['027486', '356000', '417936', '690639'])->sum('nilai_rupiah');
        // $realisasi_dekon    = getSumRealisasiDekon();
        $realisasi_dekon    = $an6;
        $sisa_dekon         = $pagu_dekon - $realisasi_dekon;

        // $pagu_tp = $ang->whereIn('kdsatker', ['356000', '417936', '690639'])->sum('total'); update_terbaru
        // $realisasi_tp = $real->where('status_data', 'Upload SP2D')->whereIn('kdsatker', ['356000', '417936', '690639'])->sum('nilai_rupiah');
        $pagu_tp = $am7;
        $realisasi_tp = $an7;
        $sisa_tp = $pagu_tp - $realisasi_tp;

        $last_synch_ang = 0;
        // $last_synch_ang = $ang->max('created_at');
        // $last_synch_real = $real->max('created_at');
        // dd($last_synch_real);

        $data_dekon = DB::SELECT('SELECT sum(nilai_rupiah) as total, kdsatker, nama_satker FROM tb_sakti_realisasi
        LEFT OUTER JOIN tbm_satker ON tbm_satker.kode=tb_sakti_realisasi.kdsatker
        WHERE kdsatker NOT LIKE \'027486\'
        GROUP BY kdsatker, nama_satker
        ORDER BY SUM(nilai_rupiah) DESC');

        $realisasi          = $realisasi_pusat + $realisasi_dekon + $realisasi_tp;
        // $selisih            = $anggaran-$realisasi;
        $selisih            = $pagu_new - $realisasi;

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
        $data_es1_cnt = $data_es1->count();
        $real_eselon1_totalpersen = 0;
        foreach ($data_es1 as $value_es1) {
            $color[]            = $value_es1->bgcolor;
            $satker_eselon1[]   = $value_es1->nama_satker;
            $real_eselon1[]     = number_format((float) $value_es1->persentase_realisasi, 2);
            $real_eselon1_totalpersen += number_format((float) $value_es1->persentase_realisasi, 2);

            if ((int)$value_es1->id === 11) {
                $sum_pagu_eselon2 = $value_es1->pagu;
                $sum_real_eselon2 = $value_es1->realisasi;
            }

            $sum_pagu_eselon1 += $value_es1->pagu;
            $sum_real_eselon1 += $value_es1->realisasi;
        }

        $color   = json_encode($color);
        // $real_eselon1   = json_encode($real_eselon1);
        $satker_eselon1 = json_encode($satker_eselon1);
        // $real_eselon1 = "["60.95","44.19","42.46","40.01","39.59","39.19","38.56","38.42","35.56","32.96","32.42","30.89","24.44"]";
        // $real_eselon1 = "["POLPUM","PEMDES","IPDN","BSKDN","DKPP","BANGDA","ITJEN","BPSDM","OTDA","SETJEN","ADWIL","KEUDA","DUKCAPIL"]"
        // dd($real_eselon1);
        $color   = json_encode(['#007bff', '#007bff', '#007bff', '#F39C12', '#007bff', '#007bff', '#007bff', '#007bff', '#007bff', '#007bff', '#007bff', '#007bff', '#007bff']);

        $real_eselon1 = ImportEslon1::latest()->first();
        $last_synch_real = date(now());
        $real_eselon1_new = 0;
        $sum_eselon1 = 0;
        $data_eselon1_count = 0;
        $satker_eselon1 = 0;
        if (!empty($real_eselon1)) {
            $last_synch_real = $real_eselon1->max('created_at');
            // dd($last_synch_real, $real_eselon1);
            $excelPath = storage_path('app/public/bukti_ref/' . $real_eselon1->bukti_ref);
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
            $spreadsheet = $reader->load($excelPath);
            $worksheet = $spreadsheet->getActiveSheet();
            $real_eselon1_new = [
                str_replace("(", '', str_replace("%)", '', $worksheet->getCell('AO5')->getValue())),
                str_replace("(", '', str_replace("%)", '', $worksheet->getCell('AO6')->getValue())),
                str_replace("(", '', str_replace("%)", '', $worksheet->getCell('AO7')->getValue())),
                str_replace("(", '', str_replace("%)", '', $worksheet->getCell('AO8')->getValue())),
                str_replace("(", '', str_replace("%)", '', $worksheet->getCell('AO9')->getValue())),
                str_replace("(", '', str_replace("%)", '', $worksheet->getCell('AO10')->getValue())),
                str_replace("(", '', str_replace("%)", '', $worksheet->getCell('AO11')->getValue())),
                str_replace("(", '', str_replace("%)", '', $worksheet->getCell('AO12')->getValue())),
                str_replace("(", '', str_replace("%)", '', $worksheet->getCell('AO13')->getValue())),
                str_replace("(", '', str_replace("%)", '', $worksheet->getCell('AO14')->getValue())),
                str_replace("(", '', str_replace("%)", '', $worksheet->getCell('AO15')->getValue())),
            ];
            $sum_eselon1 = array_sum($real_eselon1_new);
            $data_eselon1_count = count($real_eselon1_new); // Count the data and store it in $data_eselon1_count
            $real_eselon1 = json_encode($real_eselon1_new);
            $satker_eselon1_new = [
                "SETJEN",
                "ITJEN",
                "POLPUM",
                "ADWIL",
                "PEMDES",
                "BANGDA",
                "OTDA",
                "DUKCAPIL",
                "KEUDA",
                "BSKDN",
                "BPSDM"
            ];
            $satker_eselon1 = json_encode($satker_eselon1_new);
        }

        $data_realisasi_eselon_1 = Collect();
        // dd($data_realisasi_eselon_1);

        //$rata2_realisasi_eselon1 = ($sum_real_eselon1/$sum_pagu_eselon1) * 100;
        // $rata2_realisasi_eselon1=($real_eselon1_totalpersen/$data_es1_cnt);
        $rata2_realisasi_eselon1 = $data_eselon1_count == 0 ? 0 : ($sum_eselon1 / $data_eselon1_count);

        $rata2_realisasi_eselon2 = $sum_pagu_eselon2 == 0 ? 0 : ($sum_real_eselon2 / $sum_pagu_eselon2) * 100;

        foreach ($data_es1 as $row) {
            $rata2_eselon1[] = number_format((float)$rata2_realisasi_eselon1, 2);
            $rata2_eselon2[] = number_format((float)$rata2_realisasi_eselon2, 2);
        }
        $rata2_realisasi_eselon1 = number_format((float)$rata2_realisasi_eselon1, 2);
        $rata2_realisasi_eselon2 = number_format((float)$rata2_realisasi_eselon2, 2);
        // dd($rata2_realisasi_eselon1);

        $rata2_eselon1 = json_encode($rata2_eselon1);
        $rata2_eselon2 = json_encode($rata2_eselon2);

        $history_pagu = $pagu->getHistory();

        $dir = new Direktorat;
        $rekap_eselon2 = $dir->getRekapPagu();

        $satker_eselon2 = [];
        $pagu_eselon2   = [];
        $prosen_eselon2 = [];

        foreach ($rekap_eselon2 as $row) {
            $satker_eselon2[] = $row->alias_dir;
            $pagu_eselon2[]   = $row->pagu; //number_format((float)$row->pagu, 0);
            $prosen_eselon2   = $row->pagu; //number_format((float)$row->pagu, 0);
        }

        $total_eselon2 = array_sum($pagu_eselon2);

        foreach ($satker_eselon2 as $key => $es2) {

            $total_eselon2 == 0 ? $satker_eselon2[$key] = 0 : $satker_eselon2[$key] = ($es2 . ' : ' . number_format(($pagu_eselon2[$key] / $total_eselon2 * 100), 2) . '%');
        }

        $satker_eselon2 = json_encode($satker_eselon2);
        $pagu_eselon2   = json_encode($pagu_eselon2);

        $data_realuke2 = '
		<style>
			.nogap > .col{ padding-left:7.5px; padding-right: 7.5px}
			.nogap > .col:first-child{ padding-left: 15px; }
			.nogap > .col:last-child{ padding-right: 15px; }
			.kotakdonut{
				border: 2px solid #808080;
				border-radius: 25px;
				font-size:12pt;
				text-align:center;
				font-weight:500;
				color:#000;
			}
			.classWithPad { margin:10px; padding:10px; }
			.canvas-container{
				width: 100%;
			   text-align:center;
			}
			.canvas{
				display: inline;
			}
		</style>
		';
        $data_realuke2_js = '';
        $dir_uke2 = [];
        $real_uke2_arr = [];
        $dir_uke2_ratakemendagri = [];
        $dir_uke2_rataeselon = [];
        $real_uke2_totalpersen = 0;

        $str = "select id_dir,nama_dir,alias_dir,
			(select sum(a.nilai_rupiah) from tb_sakti_realisasi a where status_data='Upload SP2D'
			and a.kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = d.id_dir)) as realisasi
			FROM tbm_dir d WHERE d.id_eselon <> '0' order by kode";
        $data_dir = DB::select($str);
        $bgcolor_merah = 'rgb(204,0,0)';
        $bgcolor_kuning = 'rgb(237,245,29)';
        $bgcolor_hijau = 'rgb(41,204,0)';
        $bgcolor_abu = 'rgb(206,206,206)';
        foreach ($data_dir as $item) {
            $dir_uke2[] = $item->alias_dir;
            // $real_uke2[]=number_format((float)($item->realisasi/$anggaran)*100, 2);
            $real_uke2[] = number_format($pagu_new == 0 ? 0 : (float)($item->realisasi / $pagu_new) * 100, 2);
            // $real_uke2_totalpersen+=number_format((float)($item->realisasi/$anggaran)*100, 2);
            $real_uke2_totalpersen += number_format($pagu_new == 0 ? 0 : (float)($item->realisasi / $pagu_new) * 100, 2);
            $dir_uke2_ratakemendagri[] = $rata2_realisasi_eselon1;

            // $persen_realuke2=($item->realisasi/$anggaran)*100;
            $persen_realuke2 = $pagu_new == 0 ? 0 : ($item->realisasi / $pagu_new) * 100;
            $persen_sisa = 100 - $persen_realuke2;
            $bgcolor = '';
            if ($persen_realuke2 <= 30) {
                $bgcolor = $bgcolor_merah;
            } elseif ($persen_realuke2 > 30 && $persen_realuke2 <= 60) {
                $bgcolor = $bgcolor_kuning;
            } elseif ($persen_realuke2 > 60) {
                $bgcolor = $bgcolor_hijau;
            }
            $persen_realuke2 = number_format((float)$persen_realuke2, 2, '.', '');
            $persen_sisa = number_format((float)$persen_sisa, 2, '.', '');
            $data_realuke2 .= '
			<div class="text-center col-md-3">
				<div class="text-center classWithPad kotakdonut">
				' . $item->alias_dir . '<br>
				<div class="canvas-container">
					<canvas id="chartRealUke2_' . $item->id_dir . '" class="canvas" align=center></canvas>
				</div><br>
				Realisasi<br>
				Rp. ' . number_format($item->realisasi) . '<br>
				</div>
			</div>
			';
            $data_realuke2_js .= "
			const chartRealUke2_" . $item->id_dir . " = document.getElementById('chartRealUke2_" . $item->id_dir . "');
            dchartRealUke2_" . $item->id_dir . "= new Chart(chartRealUke2_" . $item->id_dir . ", {
                type: 'doughnut',
                data: {
					labels: [" . $persen_realuke2 . "," . $persen_sisa . "],
                    datasets: [{
                        data: [" . $persen_realuke2 . "," . $persen_sisa . " ],
						backgroundColor: [
                        '" . $bgcolor . "',
                        '" . $bgcolor_abu . "',
                        ],
                        hoverOffset: 4
                    }]
                },
				options: {
					plugins: {
                       legend: {
                           display: false,
                       },
                    },
					onClick: (e, activeEls) => {
					  document.getElementById('div_realuke3').innerHTML='<font color=#000>Loading data realisasi UKE II...</font><br>';
					  $('#modalrealuke3').modal('show');
					  var form_data = new FormData();
					  form_data.append('id_dir', '" . $item->id_dir . "');
					  form_data.append('alias_dir', '" . $item->alias_dir . "');
					  form_data.append('realisasi_dir', '" . $pagu_new . "');
					  form_data.append('_token', '" . csrf_token() . "')
					  $.ajax({
				          url: '" . route('realUke3') . "',
				          type:'POST',
				          data: form_data,
				          cache: false,
				          processData: false,
				          contentType: false,
				          success: function (e)
				          {
							document.getElementById('div_realuke3').innerHTML=e.data_realuke3;
							eval(e.data_realuke3_js)
						  }
					   });
					}
				}
            });
			";
        }
        $dir_uke2_cnt = count($dir_uke2);
        foreach ($dir_uke2 as $item) {
            $dir_uke2_rataeselon[] = $real_uke2_totalpersen / $dir_uke2_cnt;
            $rata2_realisasi_eselon2 = number_format((float)$real_uke2_totalpersen / $dir_uke2_cnt, 2);
        }
        $dir_uke2 = json_encode($dir_uke2);
        $real_uke2 = json_encode($real_uke2);
        $dir_uke2_ratakemendagri = json_encode($dir_uke2_ratakemendagri);
        $dir_uke2_rataeselon = json_encode($dir_uke2_rataeselon);

        $data_sisauke2 = '';
        $data_sisauke2_js = '';
        $str = "select id_dir,nama_dir,alias_dir,
			(select sum(a.total) from tb_sakti_anggaran a where urutan_header1=0 and urutan_header2=0
			and a.kode_subkomponen in (select s.kode_pagu from tbm_subkomponen s where s.`kode_direktorat` = d.id_dir))-
			(select sum(a.nilai_rupiah) from tb_sakti_realisasi a where status_data='Upload SP2D'
			and a.kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = d.id_dir)) as sisa
			FROM tbm_dir d WHERE d.id_eselon <> '0' order by kode";
        $data_dir = DB::select($str);
        foreach ($data_dir as $item) {
            $persen_sisauke2 = $selisih == 0 ? 0 : ($item->sisa / $selisih) * 100;
            $persen_sisa = 100 - $persen_sisauke2;
            $bgcolor = '';
            if ($persen_sisauke2 <= 30) {
                $bgcolor = $bgcolor_hijau;
            } elseif ($persen_sisauke2 > 30 && $persen_sisauke2 <= 60) {
                $bgcolor = $bgcolor_kuning;
            } elseif ($persen_sisauke2 > 60) {
                $bgcolor = $bgcolor_merah;
            }
            $persen_sisauke2 = number_format((float)$persen_sisauke2, 2, '.', '');
            $persen_sisa = number_format((float)$persen_sisa, 2, '.', '');
            $data_sisauke2 .= '
			<div class="text-center col-md-3">
				<div class="text-center classWithPad kotakdonut">
				' . $item->alias_dir . '<br>
				<div class="canvas-container">
					<canvas id="chartsisaUke2_' . $item->id_dir . '" class="canvas" align=center></canvas>
				</div><br>
				sisa<br>
				Rp. ' . number_format($item->sisa) . '<br>
				</div>
			</div>
			';
            $data_sisauke2_js .= "
			const chartsisaUke2_" . $item->id_dir . " = document.getElementById('chartsisaUke2_" . $item->id_dir . "');
            new Chart(chartsisaUke2_" . $item->id_dir . ", {
                type: 'doughnut',
                data: {
					labels: [" . $persen_sisauke2 . "," . $persen_sisa . "],
                    datasets: [{
                        data: [" . $persen_sisauke2 . "," . $persen_sisa . " ],
						backgroundColor: [
                        '" . $bgcolor . "',
                        '" . $bgcolor_abu . "',
                        ],
                        hoverOffset: 4
                    }]
                },
				options: {
					plugins: {
                       legend: {
                           display: false,
                       },
                    },
					onClick: (e, activeEls) => {
					  document.getElementById('div_sisauke3').innerHTML='<font color=#000>Loading data sisa UKE II...</font><br>';
					  $('#modalsisauke3').modal('show');
					  var form_data = new FormData();
					  form_data.append('id_dir', '" . $item->id_dir . "');
					  form_data.append('alias_dir', '" . $item->alias_dir . "');
					  form_data.append('sisa_dir', '" . $selisih . "');
					  form_data.append('_token', '" . csrf_token() . "')
					  $.ajax({
				          url: '" . route('sisaUke3') . "',
				          type:'POST',
				          data: form_data,
				          cache: false,
				          processData: false,
				          contentType: false,
				          success: function (e)
				          {
							document.getElementById('div_sisauke3').innerHTML=e.data_sisauke3;
							eval(e.data_sisauke3_js)
						  }
					   });
					}
				}
            });
			";
        }

        $dir_data = $dir->where('id_dir', '!=', 0)->get();
        $prov_data = $provinsi->where('namaprov', '!=', 'Pusat')->get();

        // kirim data ke view
        return view('home.dashboard', compact(
            'prov_data',
            'dir_data',
            'dir_uke2_ratakemendagri',
            'dir_uke2_rataeselon',
            'rata2_realisasi_eselon2',
            'rata2_realisasi_eselon1',
            'dir_uke2',
            'real_uke2',
            'data_sisauke2',
            'data_sisauke2_js',
            'data_realuke2',
            'data_realuke2_js',
            'data_pagu',
            'realisasi',
            'selisih',
            'pagu_pusat',
            'realisasi_pusat',
            'sisa_pusat',
            'sisa_rm_pusat',
            'pagu_dekon',
            'realisasi_dekon',
            'sisa_dekon',
            'pagu_tp',
            'realisasi_tp',
            'sisa_tp',
            'last_synch_ang',
            'pagu_new',
            'last_synch_real',
            'data_dekon',
            'rm_pusat',
            'phln_pusat',
            'data_pagu',
            'realisasi_phln',
            'satker_eselon1',
            'real_eselon1',
            'data_es1',
            'color',
            'rata2_eselon1',
            'rata2_eselon2',
            'history_pagu',
            'satker_eselon2',
            'pagu_eselon2'
        ));
    }

    public function getsubdir(Request $request)
    {
        $subdir = new Subdirektorat;
        $subdir_data = [];
        $id_dir = $request->id_dir;
        if (!empty($id_dir)) {
            $subdir_data = $subdir->where('id_dir', $id_dir)->get();
        }
        echo json_encode($subdir_data);
    }

    public function getsatker(Request $request)
    {
        $satker = new Satker;
        $satker_data = [];
        $provinsi = $request->provinsi;
        if (!empty($provinsi)) {
            $satker_data = $satker->where('provinsi', strtoupper($provinsi))->get();
        }
        echo json_encode($satker_data);
    }

    public function getrev(Request $request)
    {
        $tipe = $request->tipe;
        $id_dir = $request->id_dir;
        $id_subdir = $request->id_subdir;
        $prov = $request->prov;
        $satker = $request->satker;
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $jml_revisi = 0;
        $jml_usulan_kegiatan = 0;
        $jml_usulan_anggaran = 0;
        if ($tipe == 'pusat') {
            $str = "select count(id) jml from tb_ticket_rev where 1<2 ";
            if ($id_dir != "") {
                $str .= " and direktorat=" . $id_dir;
            }
            if ($tahun != "") {
                $str .= " and year(created_at)=" . $tahun;
            }
            if ($bulan != "") {
                $str .= " and month(created_at)=" . $bulan;
            }
            $data_revisi = DB::select($str);
            if ($data_revisi) {
                foreach ($data_revisi as $item) {
                    $jml_revisi = $item->jml;
                }
            }
            $str = "select count(id) jml from tb_usulan where jenis='kegiatan' ";
            if ($id_dir != "") {
                $str .= " and direktorat=" . $id_dir;
            }
            if ($tahun != "") {
                $str .= " and year(created_at)=" . $tahun;
            }
            if ($bulan != "") {
                $str .= " and month(created_at)=" . $bulan;
            }
            $data_usulan_kegiatan = DB::select($str);
            if ($data_usulan_kegiatan) {
                foreach ($data_usulan_kegiatan as $item) {
                    $jml_usulan_kegiatan = $item->jml;
                }
            }

            $str = "select count(id) jml from tb_usulan where jenis='anggaran' ";
            if ($id_dir != "") {
                $str .= " and direktorat=" . $id_dir;
            }
            if ($tahun != "") {
                $str .= " and year(created_at)=" . $tahun;
            }
            if ($bulan != "") {
                $str .= " and month(created_at)=" . $bulan;
            }
            $data_usulan_anggaran = DB::select($str);
            if ($data_usulan_anggaran) {
                foreach ($data_usulan_anggaran as $item) {
                    $jml_usulan_anggaran = $item->jml;
                }
            }
        } else {
            $str = "select count(id) jml from tb_ticket_rev a
			left join tbm_prov b on a.provinsi=b.id_prov
			where 1<2 ";
            if ($prov != "") {
                $str .= " and lower(b.namaprov)=lower('" . $prov . "')";
            }
            if ($satker != "") {
                $str .= " and lower(b.satker)=lower('" . $satker . "')";
            }
            if ($tahun != "") {
                $str .= " and year(created_at)=" . $tahun;
            }
            if ($bulan != "") {
                $str .= " and month(created_at)=" . $bulan;
            }
            $data_revisi = DB::select($str);
            if ($data_revisi) {
                foreach ($data_revisi as $item) {
                    $jml_revisi = $item->jml;
                }
            }

            $str = "select count(id) jml from tb_usulan a
			left join tbm_prov b on a.provinsi=b.id_prov
			where jenis='kegiatan' ";
            if ($prov != "") {
                $str .= " and lower(b.namaprov)=lower('" . $prov . "')";
            }
            if ($satker != "") {
                $str .= " and lower(b.satker)=lower('" . $satker . "')";
            }
            if ($tahun != "") {
                $str .= " and year(created_at)=" . $tahun;
            }
            if ($bulan != "") {
                $str .= " and month(created_at)=" . $bulan;
            }
            $data_usulan_kegiatan = DB::select($str);
            if ($data_usulan_kegiatan) {
                foreach ($data_usulan_kegiatan as $item) {
                    $jml_usulan_kegiatan = $item->jml;
                }
            }

            $str = "select count(id) jml from tb_usulan a
			left join tbm_prov b on a.provinsi=b.id_prov
			where jenis='anggaran' ";
            if ($prov != "") {
                $str .= " and lower(b.namaprov)=lower('" . $prov . "')";
            }
            if ($satker != "") {
                $str .= " and lower(b.satker)=lower('" . $satker . "')";
            }
            if ($tahun != "") {
                $str .= " and year(created_at)=" . $tahun;
            }
            if ($bulan != "") {
                $str .= " and month(created_at)=" . $bulan;
            }
            $data_usulan_anggaran = DB::select($str);
            if ($data_usulan_anggaran) {
                foreach ($data_usulan_anggaran as $item) {
                    $jml_usulan_anggaran = $item->jml;
                }
            }
        }

        return response()->json([
            'jml_revisi' => $jml_revisi,
            'jml_usulan_kegiatan'   => $jml_usulan_kegiatan,
            'jml_usulan_anggaran'   => $jml_usulan_anggaran,
        ]);
    }
    function grafiksandingan_get($id_dir = null, $id_subdir = null)
    {
        $ang = new SaktiAnggaran;
        if ($id_dir != '' && $id_subdir != '') {
            $anggaran   = $ang->where([
                'urutan_header1'    => 0,
                'urutan_header2'    => 0
            ])->whereIn("kode_subkomponen", function ($query) use ($id_dir) {
                $query->select('kode_pagu')
                    ->from('tbm_subkomponen')
                    ->where('kode_direktorat', $id_dir);
            })->sum('total');
        }
        if ($id_dir != '' && $id_subdir == '') {
            $anggaran   = $ang->where([
                'urutan_header1'    => 0,
                'urutan_header2'    => 0
            ])->whereIn("kode_subkomponen", function ($query) use ($id_dir) {
                $query->select('kode_pagu')
                    ->from('tbm_subkomponen')
                    ->where('kode_direktorat', $id_dir);
            })->sum('total');
        } elseif ($id_dir == '' && $id_subdir == '') {
            $anggaran = $ang->where([
                'urutan_header1'    => 0,
                'urutan_header2'    => 0
            ])->sum('total');
        }

        $tahun = date('Y');
        $totalNomen = 0;
        $str_totalNomen = "select fn_totalNomen() totalNomen";
        $data_totalNomen = DB::select($str_totalNomen);
        if (!empty($data_totalNomen)) {
            foreach ($data_totalNomen as $item_totalNomen) {
                $totalNomen = $item_totalNomen->totalNomen;
            }
        }
        $str_caput = "select format(
					(select count(a.id) from tb_matriks_pengendalian a
					where bulan=1 and a.tahun=" . $tahun . " and a.status=7)/" . $totalNomen . "
					,2) jan,
					format(
					(select count(a.id) from tb_matriks_pengendalian a
					where bulan=2 and a.tahun=" . $tahun . " and a.status=7)/" . $totalNomen . "
					,2) feb,
					format(
					(select count(a.id) from tb_matriks_pengendalian a
					where bulan=3 and a.tahun=" . $tahun . " and a.status=7)/" . $totalNomen . "
					,2) mar,
					format(
					(select count(a.id) from tb_matriks_pengendalian a
					where bulan=4 and a.tahun=" . $tahun . " and a.status=7)/" . $totalNomen . "
					,2) apr,
					format(
					(select count(a.id) from tb_matriks_pengendalian a
					where bulan=5 and a.tahun=" . $tahun . " and a.status=7)/" . $totalNomen . "
					,2) mei,
					format(
					(select count(a.id) from tb_matriks_pengendalian a
					where bulan=6 and a.tahun=" . $tahun . " and a.status=7)/" . $totalNomen . "
					,2) jun,
					format(
					(select count(a.id) from tb_matriks_pengendalian a
					where bulan=7 and a.tahun=" . $tahun . " and a.status=7)/" . $totalNomen . "
					,2) jul,
					format(
					(select count(a.id) from tb_matriks_pengendalian a
					where bulan=8 and a.tahun=" . $tahun . " and a.status=7)/" . $totalNomen . "
					,2) agu,
					format(
					(select count(a.id) from tb_matriks_pengendalian a
					where bulan=9 and a.tahun=" . $tahun . " and a.status=7)/" . $totalNomen . "
					,2) sep,
					format(
					(select count(a.id) from tb_matriks_pengendalian a
					where bulan=10 and a.tahun=" . $tahun . " and a.status=7)/" . $totalNomen . "
					,2) okt,
					format(
					(select count(a.id) from tb_matriks_pengendalian a
					where bulan=11 and a.tahun=" . $tahun . " and a.status=7)/" . $totalNomen . "
					,2) nov,
					format(
					(select count(a.id) from tb_matriks_pengendalian a
					where bulan=12 and a.tahun=" . $tahun . " and a.status=7)/" . $totalNomen . "
					,2) des";
        $data_caput = DB::select($str_caput);
        $dt_caput = "0,0,0,0,0,0,0,0,0,0,0,0";
        if ($totalNomen > 0) {
            if (!empty($data_caput)) {
                foreach ($data_caput as $item) {
                    $dt_caput = $item->jan . ',';
                    $dt_caput .= $item->feb . ',';
                    $dt_caput .= $item->mar . ',';
                    $dt_caput .= $item->apr . ',';
                    $dt_caput .= $item->mei . ',';
                    $dt_caput .= $item->jun . ',';
                    $dt_caput .= $item->jul . ',';
                    $dt_caput .= $item->agu . ',';
                    $dt_caput .= $item->sep . ',';
                    $dt_caput .= $item->okt . ',';
                    $dt_caput .= $item->nov . ',';
                    $dt_caput .= $item->des;
                }
            }
        }

        $str_sanding_real = " select
							format((coalesce((select sum(nilai_rupiah) from tb_sakti_realisasi
							where status_data='Upload SP2D' and instr(tgl_sp2d,'JAN')>0 ";
        if ($id_dir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = " . $id_dir . ") ";
        }
        if ($id_subdir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_subdirektorat = " . $id_subdir . ") ";
        }
        $str_sanding_real .= " ),0)/" . $anggaran . ")*100,2) jan,
							format((coalesce((select sum(nilai_rupiah) from tb_sakti_realisasi
							where status_data='Upload SP2D' and instr(tgl_sp2d,'FEB')>0 ";
        if ($id_dir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = " . $id_dir . ") ";
        }
        if ($id_subdir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_subdirektorat = " . $id_subdir . ") ";
        }
        $str_sanding_real .= " ),0)/" . $anggaran . ")*100,2) feb,
							format((coalesce((select sum(nilai_rupiah) from tb_sakti_realisasi
							where status_data='Upload SP2D' and instr(tgl_sp2d,'MAR')>0 ";
        if ($id_dir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = " . $id_dir . ") ";
        }
        if ($id_subdir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_subdirektorat = " . $id_subdir . ") ";
        }
        $str_sanding_real .= " ),0)/" . $anggaran . ")*100,2) mar,
							format((coalesce((select sum(nilai_rupiah) from tb_sakti_realisasi
							where status_data='Upload SP2D' and instr(tgl_sp2d,'APR')>0 ";
        if ($id_dir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = " . $id_dir . ") ";
        }
        if ($id_subdir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_subdirektorat = " . $id_subdir . ") ";
        }
        $str_sanding_real .= " ),0)/" . $anggaran . ")*100,2) apr,
							format((coalesce((select sum(nilai_rupiah) from tb_sakti_realisasi
							where status_data='Upload SP2D' and instr(tgl_sp2d,'MAY')>0 ";
        if ($id_dir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = " . $id_dir . ") ";
        }
        if ($id_subdir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_subdirektorat = " . $id_subdir . ") ";
        }
        $str_sanding_real .= " ),0)/" . $anggaran . ")*100,2) mei,
							format((coalesce((select sum(nilai_rupiah) from tb_sakti_realisasi
							where status_data='Upload SP2D' and instr(tgl_sp2d,'JUN')>0 ";
        if ($id_dir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = " . $id_dir . ") ";
        }
        if ($id_subdir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_subdirektorat = " . $id_subdir . ") ";
        }
        $str_sanding_real .= " ),0)/" . $anggaran . ")*100,2) jun,
							format((coalesce((select sum(nilai_rupiah) from tb_sakti_realisasi
							where status_data='Upload SP2D' and instr(tgl_sp2d,'JUL')>0 ";
        if ($id_dir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = " . $id_dir . ") ";
        }
        if ($id_subdir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_subdirektorat = " . $id_subdir . ") ";
        }
        $str_sanding_real .= " ),0)/" . $anggaran . ")*100,2) jul,
							format((coalesce((select sum(nilai_rupiah) from tb_sakti_realisasi
							where status_data='Upload SP2D' and instr(tgl_sp2d,'AUG')>0 ";
        if ($id_dir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = " . $id_dir . ") ";
        }
        if ($id_subdir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_subdirektorat = " . $id_subdir . ") ";
        }
        $str_sanding_real .= " ),0)/" . $anggaran . ")*100,2) agu,
							format((coalesce((select sum(nilai_rupiah) from tb_sakti_realisasi
							where status_data='Upload SP2D' and instr(tgl_sp2d,'SEP')>0 ";
        if ($id_dir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = " . $id_dir . ") ";
        }
        if ($id_subdir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_subdirektorat = " . $id_subdir . ") ";
        }
        $str_sanding_real .= " ),0)/" . $anggaran . ")*100,2) sep,
							format((coalesce((select sum(nilai_rupiah) from tb_sakti_realisasi
							where status_data='Upload SP2D' and instr(tgl_sp2d,'OCT')>0 ";
        if ($id_dir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = " . $id_dir . ") ";
        }
        if ($id_subdir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_subdirektorat = " . $id_subdir . ") ";
        }
        $str_sanding_real .= " ),0)/" . $anggaran . ")*100,2) okt,
							format((coalesce((select sum(nilai_rupiah) from tb_sakti_realisasi
							where status_data='Upload SP2D' and instr(tgl_sp2d,'NOV')>0 ";
        if ($id_dir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = " . $id_dir . ") ";
        }
        if ($id_subdir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_subdirektorat = " . $id_subdir . ") ";
        }
        $str_sanding_real .= " ),0)/" . $anggaran . ")*100,2) nov,
							format((coalesce((select sum(nilai_rupiah) from tb_sakti_realisasi
							where status_data='Upload SP2D' and instr(tgl_sp2d,'DEC')>0 ";
        if ($id_dir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = " . $id_dir . ") ";
        }
        if ($id_subdir != '') {
            $str_sanding_real .= " and kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_subdirektorat = " . $id_subdir . ") ";
        }
        $str_sanding_real .= " ),0)/" . $anggaran . ")*100,2) des
							";
        $data_sanding_real = DB::select($str_sanding_real);
        $dt_sanding_real = "0,0,0,0,0,0,0,0,0,0,0,0";
        if (!empty($data_sanding_real)) {
            foreach ($data_sanding_real as $item) {
                $dt_sanding_real = $item->jan . ',';
                $dt_sanding_real .= $item->feb . ',';
                $dt_sanding_real .= $item->mar . ',';
                $dt_sanding_real .= $item->apr . ',';
                $dt_sanding_real .= $item->mei . ',';
                $dt_sanding_real .= $item->jun . ',';
                $dt_sanding_real .= $item->jul . ',';
                $dt_sanding_real .= $item->agu . ',';
                $dt_sanding_real .= $item->sep . ',';
                $dt_sanding_real .= $item->okt . ',';
                $dt_sanding_real .= $item->nov . ',';
                $dt_sanding_real .= $item->des;
            }
        }

        $str_sanding_ro = "select format(coalesce(coalesce((select avg(persen_kinerja) from tb_matriks_pengendalian
						where bulan=1 and tahun=" . $tahun . " and status=7 and kode_komponen is null),0)/
						coalesce((select count(id) from tb_matriks_pengendalian
						where bulan=1 and tahun=" . $tahun . " and status=7 and kode_komponen is null ),0),0),2) jan,
						format(coalesce(coalesce((select avg(persen_kinerja) from tb_matriks_pengendalian
						where bulan=2 and tahun=" . $tahun . " and status=7 and kode_komponen is null),0)/
						coalesce((select count(id) from tb_matriks_pengendalian
						where bulan=2 and tahun=" . $tahun . " and status=7 and kode_komponen is null ),0),0),2) feb,
						format(coalesce(coalesce((select avg(persen_kinerja) from tb_matriks_pengendalian
						where bulan=3 and tahun=" . $tahun . " and status=7 and kode_komponen is null),0)/
						coalesce((select count(id) from tb_matriks_pengendalian
						where bulan=3 and tahun=" . $tahun . " and status=7 and kode_komponen is null ),0),0),2) mar,
						format(coalesce(coalesce((select avg(persen_kinerja) from tb_matriks_pengendalian
						where bulan=4 and tahun=" . $tahun . " and status=7 and kode_komponen is null),0)/
						coalesce((select count(id) from tb_matriks_pengendalian
						where bulan=4 and tahun=" . $tahun . " and status=7 and kode_komponen is null ),0),0),2) apr,
						format(coalesce(coalesce((select avg(persen_kinerja) from tb_matriks_pengendalian
						where bulan=5 and tahun=" . $tahun . " and status=7 and kode_komponen is null),0)/
						coalesce((select count(id) from tb_matriks_pengendalian
						where bulan=5 and tahun=" . $tahun . " and status=7 and kode_komponen is null ),0),0),2) mei,
						format(coalesce(coalesce((select avg(persen_kinerja) from tb_matriks_pengendalian
						where bulan=6 and tahun=" . $tahun . " and status=7 and kode_komponen is null),0)/
						coalesce((select count(id) from tb_matriks_pengendalian
						where bulan=6 and tahun=" . $tahun . " and status=7 and kode_komponen is null ),0),0),2) jun,
						format(coalesce(coalesce((select avg(persen_kinerja) from tb_matriks_pengendalian
						where bulan=7 and tahun=" . $tahun . " and status=7 and kode_komponen is null),0)/
						coalesce((select count(id) from tb_matriks_pengendalian
						where bulan=7 and tahun=" . $tahun . " and status=7 and kode_komponen is null ),0),0),2) jul,
						format(coalesce(coalesce((select avg(persen_kinerja) from tb_matriks_pengendalian
						where bulan=8 and tahun=" . $tahun . " and status=7 and kode_komponen is null),0)/
						coalesce((select count(id) from tb_matriks_pengendalian
						where bulan=8 and tahun=" . $tahun . " and status=7 and kode_komponen is null ),0),0),2) agu,
						format(coalesce(coalesce((select avg(persen_kinerja) from tb_matriks_pengendalian
						where bulan=9 and tahun=" . $tahun . " and status=7 and kode_komponen is null),0)/
						coalesce((select count(id) from tb_matriks_pengendalian
						where bulan=9 and tahun=" . $tahun . " and status=7 and kode_komponen is null ),0),0),2) sep,
						format(coalesce(coalesce((select avg(persen_kinerja) from tb_matriks_pengendalian
						where bulan=10 and tahun=" . $tahun . " and status=7 and kode_komponen is null),0)/
						coalesce((select count(id) from tb_matriks_pengendalian
						where bulan=10 and tahun=" . $tahun . " and status=7 and kode_komponen is null ),0),0),2) okt,
						format(coalesce(coalesce((select avg(persen_kinerja) from tb_matriks_pengendalian
						where bulan=11 and tahun=" . $tahun . " and status=7 and kode_komponen is null),0)/
						coalesce((select count(id) from tb_matriks_pengendalian
						where bulan=11 and tahun=" . $tahun . " and status=7 and kode_komponen is null ),0),0),2) nov,
						format(coalesce(coalesce((select avg(persen_kinerja) from tb_matriks_pengendalian
						where bulan=12 and tahun=" . $tahun . " and status=7 and kode_komponen is null),0)/
						coalesce((select count(id) from tb_matriks_pengendalian
						where bulan=12 and tahun=" . $tahun . " and status=7 and kode_komponen is null ),0),0),2) des";
        $data_sanding_ro = DB::select($str_sanding_ro);
        $dt_sanding_ro = "0,0,0,0,0,0,0,0,0,0,0,0";
        if (!empty($data_sanding_ro)) {
            foreach ($data_sanding_ro as $item) {
                $dt_sanding_ro = $item->jan . ',';
                $dt_sanding_ro .= $item->feb . ',';
                $dt_sanding_ro .= $item->mar . ',';
                $dt_sanding_ro .= $item->apr . ',';
                $dt_sanding_ro .= $item->mei . ',';
                $dt_sanding_ro .= $item->jun . ',';
                $dt_sanding_ro .= $item->jul . ',';
                $dt_sanding_ro .= $item->agu . ',';
                $dt_sanding_ro .= $item->sep . ',';
                $dt_sanding_ro .= $item->okt . ',';
                $dt_sanding_ro .= $item->nov . ',';
                $dt_sanding_ro .= $item->des;
            }
        }
        return [$dt_caput, $dt_sanding_real, $dt_sanding_ro];
    }
    public function grafiksanding(Request $request)
    {
        $id_dir = $request->id_dir;
        $alias_dir = $request->alias_dir;
        $id_subdir = $request->id_subdir;
        list($dt_caput, $dt_sanding_real, $dt_sanding_ro) = $this->grafiksandingan_get($id_dir, $id_subdir);

        echo '<h3 class="mb-b fw-bold h5">Sandingan Realisasi Anggaran, Capaian Output dan Capaian Kinerja</h3>
        <div class="" style="height: 100%; width: 100%">
            <canvas id="chartSanding"></canvas>
        </div>
		';
        echo "
		<script>
			const chartSanding = document.getElementById('chartSanding');
            new Chart(chartSanding, {
			  type: 'line',
			  data: {
			    labels: ['JAN','FEB','MAR','APR','MEI','JUN','JUL','AGU','SEP','OKT','NOV','DES'],
			    datasets: [{
			      label: 'Realisasi',
			      borderColor: '#ff0000',
			      borderWidth: 2,
			      fill: false,
			      data: [" . $dt_sanding_real . "],
			    },{
			      label: 'Capaian Output',
			      borderColor: '#3333cc',
			      borderWidth: 2,
			      fill: false,
			      data: [" . $dt_caput . "],
			    },{
			      label: 'Capaian Kinerja',
			      borderColor: '#009933',
			      borderWidth: 2,
			      fill: false,
			      data: [" . $dt_sanding_ro . "],
			    }]
			  },
			});";
        if ($id_subdir == '') {
            echo "chartSanding.onclick = (evt) => {";
            if ($id_dir != '' && $id_subdir == '') {
                echo "
					  document.getElementById('div_chartsandinguke3').innerHTML='<font color=#000>Loading data sandingan UKE II...</font><br>';
				  	  $('#modalsandinguke3').modal('show');
					  $.post('" . route('sandingUke3') . "',{'id_dir':'" . $id_dir . "','alias_dir':'" . $alias_dir . "','_token':'" . csrf_token() . "'},function(data, status){
					  	document.getElementById('div_chartsandinguke3').innerHTML=data.data_sandinguke3;
						eval(data.data_sandinguke3_js)
					  });";
            } elseif ($id_dir == '' && $id_subdir == '') {
                echo "$('#modalsanding').modal('show');
					  $.post('" . route('sandingUke2') . "',{'_token':'" . csrf_token() . "'},function(data, status){
					  	document.getElementById('div_chartsandinguke2').innerHTML=data.data_sandinguke2;
						eval(data.data_sandinguke2_js)
					  });";
            }
            echo "}; ";
        }
        echo "</script>";
    }
    public function sandinguke2()
    {
        $dir = new Direktorat;
        $dir_data = $dir->where('id_dir', '!=', 0)->get();
        $data_sandinguke2 = '
		<style>
			.nogap > .col{ padding-left:7.5px; padding-right: 7.5px}
			.nogap > .col:first-child{ padding-left: 15px; }
			.nogap > .col:last-child{ padding-right: 15px; }
			.kotakdonut{
				border: 2px solid #808080;
				border-radius: 25px;
				font-size:12pt;
				text-align:center;
				font-weight:500;
				color:#000;;
			}
			.classWithPad { margin:10px; padding:10px; }
			.canvas-container{
				width: 100%;
			   text-align:center;
			}
			.canvas{
				display: inline;
			}
			.fontjudul{
				font-weight:500;
				font-size:13pt;
			}
		</style>
		<br><div class="fontjudul"></div><br>
		';
        $data_sandinguke2_js = '';
        foreach ($dir_data as $item) {
            list($dt_caput, $dt_sanding_real, $dt_sanding_ro) = $this->grafiksandingan_get($item->id_dir);
            $data_sandinguke2 .= '
			<div class="text-center col-md-6">
				<div class="text-center classWithPad kotakdonut">
				' . $item->alias_dir . '<br>
				<div class="canvas-container">
					<canvas id="chartSandingUke2_' . $item->id_dir . '" class="canvas" align=center></canvas>
				</div>
				</div>
			</div>
			';
            $data_sandinguke2_js .= "
			const chartSandingUke2_" . $item->id_dir . " = document.getElementById('chartSandingUke2_" . $item->id_dir . "');
            new Chart(chartSandingUke2_" . $item->id_dir . ", {
			  type: 'line',
			  data: {
			    labels: ['JAN','FEB','MAR','APR','MEI','JUN','JUL','AGU','SEP','OKT','NOV','DES'],
			    datasets: [{
			      label: 'Realisasi',
			      borderColor: '#ff0000',
			      borderWidth: 2,
			      fill: false,
			      data: [" . $dt_sanding_real . "],
			    },{
			      label: 'Capaian Output',
			      borderColor: '#3333cc',
			      borderWidth: 2,
			      fill: false,
			      data: [" . $dt_caput . "],
			    },{
			      label: 'Capaian Kinerja',
			      borderColor: '#009933',
			      borderWidth: 2,
			      fill: false,
			      data: [" . $dt_sanding_ro . "],
			    }]
			  },
			});
			chartSandingUke2_" . $item->id_dir . ".onclick = (evt) => {
			  document.getElementById('div_chartsandinguke3').innerHTML='<font color=#000>Loading data sandingan UKE II...</font><br>';
			  $('#modalsandinguke3').modal('show');
			  $.post('" . route('sandingUke3') . "',{'id_dir':'" . $item->id_dir . "','alias_dir':'" . $item->alias_dir . "','_token':'" . csrf_token() . "'},function(data, status){
			  	document.getElementById('div_chartsandinguke3').innerHTML=data.data_sandinguke3;
				eval(data.data_sandinguke3_js)
			  });
			};
			";
        }
        return response()->json([
            'data_sandinguke2' => $data_sandinguke2,
            'data_sandinguke2_js'   => $data_sandinguke2_js,
        ]);
    }
    public function sandinguke3(Request $request)
    {
        $id_dir = $request->id_dir;
        $alias_dir = $request->alias_dir;
        $subdir = new Subdirektorat;
        $subdir_data = $subdir->where('id_dir', $id_dir)->get();
        $data_sandinguke3 = '<style>
			.nogap > .col{ padding-left:7.5px; padding-right: 7.5px}
			.nogap > .col:first-child{ padding-left: 15px; }
			.nogap > .col:last-child{ padding-right: 15px; }
			.kotakdonut{
				border: 2px solid #808080;
				border-radius: 25px;
				font-size:12pt;
				text-align:center;
				font-weight:500;
				color:#000;;
			}
			.classWithPad { margin:10px; padding:10px; }
			.canvas-container{
				width: 100%;
			   text-align:center;
			}
			.canvas{
				display: inline;
			}
			.fontjudul{
				font-weight:500;
				font-size:13pt;
				color:#000;
			}
		</style>
		<br><div class="fontjudul">' . $alias_dir . '</div><br>
		';
        $data_sandinguke3_js = '';
        foreach ($subdir_data as $item) {
            list($dt_caput, $dt_sanding_real, $dt_sanding_ro) = $this->grafiksandingan_get($id_dir, $item->id);
            $data_sandinguke3 .= '
			<div class="text-center col-md-6">
				<div class="text-center classWithPad kotakdonut">
				' . $item->alias_subdir . '<br>
				<div class="canvas-container">
					<canvas id="chartSandingUke2_' . $item->id_subdir . '" class="canvas" align=center></canvas>
				</div>
				</div>
			</div>
			';
            $data_sandinguke3_js .= "
			const chartSandingUke3_" . $item->id_subdir . " = document.getElementById('chartSandingUke2_" . $item->id_subdir . "');
            new Chart(chartSandingUke3_" . $item->id_subdir . ", {
			  type: 'line',
			  data: {
			    labels: ['JAN','FEB','MAR','APR','MEI','JUN','JUL','AGU','SEP','OKT','NOV','DES'],
			    datasets: [{
			      label: 'Realisasi',
			      borderColor: '#ff0000',
			      borderWidth: 2,
			      fill: false,
			      data: [" . $dt_sanding_real . "],
			    },{
			      label: 'Capaian Output',
			      borderColor: '#3333cc',
			      borderWidth: 2,
			      fill: false,
			      data: [" . $dt_caput . "],
			    },{
			      label: 'Capaian Kinerja',
			      borderColor: '#009933',
			      borderWidth: 2,
			      fill: false,
			      data: [" . $dt_sanding_ro . "],
			    }]
			  },
			});
			";
        }

        return response()->json([
            'data_sandinguke3' => $data_sandinguke3,
            'data_sandinguke3_js'   => $data_sandinguke3_js,
        ]);
    }
    public function realUke3(Request $request)
    {
        $id_dir = $request->id_dir;
        $alias_dir = $request->alias_dir;
        $realisasi_dir = $request->realisasi_dir;
        $data_realuke3 = '
		<style>
			.nogap > .col{ padding-left:7.5px; padding-right: 7.5px}
			.nogap > .col:first-child{ padding-left: 15px; }
			.nogap > .col:last-child{ padding-right: 15px; }
			.kotakdonut{
				border: 2px solid #808080;
				border-radius: 25px;
				font-size:12pt;
				text-align:center;
				font-weight:500;
				color:#000;;
			}
			.classWithPad { margin:10px; padding:10px; }
			.canvas-container{
				width: 100%;
			   text-align:center;
			}
			.canvas{
				display: inline;
			}
			.fontjudul{
				font-weight:550;
				font-size:13pt;
				color:#737373;
				font-weight:#000;
			}
		</style>
		<br><div class="fontjudul">' . $alias_dir . '</div><br>
		';

        $data_realuke3_js = '';
        $str = "select id id_subdir,nama_subdir,alias_subdir,
			(select sum(a.nilai_rupiah) from tb_sakti_realisasi a where status_data='Upload SP2D'
			and a.kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_subdirektorat = d.id)) as realisasi
			FROM tbm_subdir d WHERE d.id_dir='" . $id_dir . "' order by id";
        $data_dir = DB::select($str);
        $bgcolor_merah = 'rgb(204,0,0)';
        $bgcolor_kuning = 'rgb(237,245,29)';
        $bgcolor_hijau = 'rgb(41,204,0)';
        $bgcolor_abu = 'rgb(206,206,206)';
        foreach ($data_dir as $item) {
            $persen_realuke3 = ($item->realisasi / $realisasi_dir) * 100;
            $persen_sisa = 100 - $persen_realuke3;
            $bgcolor = '';
            if ($persen_realuke3 <= 30) {
                $bgcolor = $bgcolor_merah;
            } elseif ($persen_realuke3 > 30 && $persen_realuke3 <= 60) {
                $bgcolor = $bgcolor_kuning;
            } elseif ($persen_realuke3 > 60) {
                $bgcolor = $bgcolor_hijau;
            }
            $persen_realuke3 = number_format((float)$persen_realuke3, 2, '.', '');
            $persen_sisa = number_format((float)$persen_sisa, 2, '.', '');
            $data_realuke3 .= '
			<div class="text-center col-md-3">
				<div class="text-center classWithPad kotakdonut">
				' . $item->alias_subdir . '<br>
				<div class="canvas-container">
					<canvas id="chartRealUke3_' . $item->id_subdir . '" class="canvas" align=center></canvas>
				</div><br>
				Realisasi<br>
				Rp. ' . number_format($item->realisasi) . '<br>
				</div>
			</div>
			';
            $data_realuke3_js .= "
			const chartRealUke3_" . $item->id_subdir . " = document.getElementById('chartRealUke3_" . $item->id_subdir . "');
            new Chart(chartRealUke3_" . $item->id_subdir . ", {
                type: 'doughnut',
                data: {
					labels: [" . $persen_realuke3 . "," . $persen_sisa . "],
                    datasets: [{
                        data: [" . $persen_realuke3 . "," . $persen_sisa . " ],
						backgroundColor: [
                        '" . $bgcolor . "',
                        '" . $bgcolor_abu . "',
                        ],
                        hoverOffset: 4
                    }]
                },
				options: {
					plugins: {
                       legend: {
                           display: false,
                       },
                    },
				},
            });
			";
        }
        return response()->json([
            'data_realuke3' => $data_realuke3,
            'data_realuke3_js'   => $data_realuke3_js,
        ]);
    }
    public function sisaUke3(Request $request)
    {
        $id_dir = $request->id_dir;
        $alias_dir = $request->alias_dir;
        $sisa_dir = $request->sisa_dir;

        $data_sisauke3 = '
		<style>
			.fontjudul{
				font-weight:550;
				font-size:13pt;
				color:#737373;
				font-weight:#000;
			}
		</style>
		<br><div class="fontjudul">' . $alias_dir . '</div><br>
		';
        $data_sisauke3_js = '';
        $str = "select id id_subdir,nama_subdir,alias_subdir,
			(select sum(a.total) from tb_sakti_anggaran a where urutan_header1=0 and urutan_header2=0
			and a.kode_subkomponen in (select s.kode_pagu from tbm_subkomponen s where s.`kode_subdirektorat` = d.id))-
			(select sum(a.nilai_rupiah) from tb_sakti_realisasi a where status_data='Upload SP2D'
			and a.kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_subdirektorat = d.id)) as sisa
			FROM tbm_subdir d WHERE d.id_dir='" . $id_dir . "' order by id";
        $data_dir = DB::select($str);
        $bgcolor_merah = 'rgb(204,0,0)';
        $bgcolor_kuning = 'rgb(237,245,29)';
        $bgcolor_hijau = 'rgb(41,204,0)';
        $bgcolor_abu = 'rgb(206,206,206)';
        foreach ($data_dir as $item) {
            $persen_sisauke3 = ($item->sisa / $sisa_dir) * 100;
            $persen_sisa = 100 - $persen_sisauke3;
            $bgcolor = '';
            if ($persen_sisauke3 <= 30) {
                $bgcolor = $bgcolor_hijau;
            } elseif ($persen_sisauke3 > 30 && $persen_sisauke3 <= 60) {
                $bgcolor = $bgcolor_kuning;
            } elseif ($persen_sisauke3 > 60) {
                $bgcolor = $bgcolor_merah;
            }
            $persen_sisauke3 = number_format((float)$persen_sisauke3, 2, '.', '');
            $persen_sisa = number_format((float)$persen_sisa, 2, '.', '');
            $data_sisauke3 .= '
			<div class="text-center col-md-3">
				<div class="text-center classWithPad kotakdonut">
				' . $item->alias_subdir . '<br>
				<div class="canvas-container">
					<canvas id="chartsisaUke3_' . $item->id_subdir . '" class="canvas" align=center></canvas>
				</div><br>
				sisa<br>
				Rp. ' . number_format($item->sisa) . '<br>
				</div>
			</div>
			';
            $data_sisauke3_js .= "
			const chartsisaUke3_" . $item->id_subdir . " = document.getElementById('chartsisaUke3_" . $item->id_subdir . "');
            new Chart(chartsisaUke3_" . $item->id_subdir . ", {
                type: 'doughnut',
                data: {
					labels: [" . $persen_sisauke3 . "," . $persen_sisa . "],
                    datasets: [{
                        data: [" . $persen_sisauke3 . "," . $persen_sisa . " ],
						backgroundColor: [
                        '" . $bgcolor . "',
                        '" . $bgcolor_abu . "',
                        ],
                        hoverOffset: 4
                    }]
                },
				options: {
					plugins: {
                       legend: {
                           display: false,
                       },
                    },
				},
            });
			";
        }
        return response()->json([
            'data_sisauke3' => $data_sisauke3,
            'data_sisauke3_js'   => $data_sisauke3_js,
        ]);
    }
    public function rekapEselon3(Request $request)
    {
        $subdir = new Subdirektorat;
        $rekap_eselon3 = $subdir->getRekapPaguByAlias($request->id_dir);

        $subdir_eselon3 = [];
        $pagu_eselon3   = [];
        $prosen_eselon3 = [];

        foreach ($rekap_eselon3 as $row) {
            $subdir_eselon3[] = $row->nama_subdir;
            $pagu_eselon3[]   = $row->pagu; //number_format((float)$row->pagu, 0);
            $prosen_eselon3   = $row->pagu; //number_format((float)$row->pagu, 0);
        }

        $total_eselon3 = array_sum($pagu_eselon3);

        foreach ($subdir_eselon3 as $key => $subdir) {
            $subdir_eselon3[$key] = ($subdir . ' : ' . number_format(($pagu_eselon3[$key] / $total_eselon3 * 100), 2) . '%');
        }

        return response()->json([
            'subdir_eselon3' => json_encode($subdir_eselon3),
            'pagu_eselon3'   => json_encode($pagu_eselon3),
        ]);
    }
    public function barRealUke3(Request $request)
    {
        $alias_dir = $request->alias_dir;
        $realisasi = $request->realisasi;
        $rata2_realisasi_eselon2 = $request->rata2_realisasi_eselon2;

        $str = "select id id_subdir,nama_subdir,alias_subdir,
			(select sum(a.nilai_rupiah) from tb_sakti_realisasi a where status_data='Upload SP2D'
			and a.kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_subdirektorat = d.id)) as realisasi
			FROM tbm_subdir d
			inner join tbm_dir e on e.id_dir=d.id_dir
			WHERE id_subdir<>0";
        if ($alias_dir != '') {
            $str .= " and e.alias_dir='" . $alias_dir . "'";
        }
        $str .= " order by id";

        $data_subdir = DB::select($str);

        $real_uke3_totalpersen = 0;
        $subdir_uke3 = [];
        $real_uke3 = [];
        $real_uke3_rata2 = [];
        $real_uke2_rata2 = [];

        foreach ($data_subdir as $row) {
            $subdir_uke3[] = $row->alias_subdir;
            $real_uke3[] = number_format((float)($row->realisasi / $realisasi) * 100, 2);
            $real_uke3_totalpersen += number_format((float)($row->realisasi / $realisasi) * 100, 2);
        }
        $dir_uke3_cnt = count($subdir_uke3);
        foreach ($subdir_uke3 as $item) {
            $real_uke3_rata2[] = number_format($real_uke3_totalpersen / $dir_uke3_cnt);
            $real_uke2_rata2[] = $rata2_realisasi_eselon2;
        }
        return response()->json([
            'subdir_uke3' => json_encode($subdir_uke3),
            'real_uke3'   => json_encode($real_uke3),
            'real_uke3_rata2'   => json_encode($real_uke3_rata2),
            'real_uke2_rata2'   => json_encode($real_uke2_rata2),
            'real_uke3_rata2_legend'   => number_format($real_uke3_totalpersen / $dir_uke3_cnt),
            'real_uke2_rata2_legend'   => $rata2_realisasi_eselon2,
        ]);
    }

    public function dashboarduke2()
    {
        // variable tambahan
        $id_dir = Auth::user()->id_dir;
        $id_dir = ($id_dir != 0 ? $id_dir : '');
        $modul      = "Home";
        $current    = "Dashboard";
        // siapkan table yang digunakan
        $pagu       = new PaguHistory;
        $ang        = new SaktiAnggaran;
        $ses1       = new SatkerEselon1;
        $real       = new SaktiRealisasi;
        $es1        = new SatkerKemendagri;
        $real1      = new RealisasiSaktiEselon1;
        $dir          = new Direktorat;
        $provinsi      = new Provinsi;
        // ====================
        // pagu anggaran ditjen
        // query data anggaran

        $alias_dir_data = $dir->where('id_dir', $id_dir)->first('alias_dir');
        $alias_dir = $alias_dir_data['alias_dir'];

        $anggaran   = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->whereIn("kode_subkomponen", function ($query) use ($id_dir) {
            $query->select('kode_pagu')
                ->from('tbm_subkomponen')
                ->where('kode_direktorat', $id_dir);
        })->sum('total');

        $anggaran_adwil   = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->sum('total');

        // set tahun
        $tahun  = date("Y");
        // query data pagu
        $data_pagu  = $pagu->where("title", "like", "%{$tahun}%")
            ->orWhere("tanggal", "like", "%{$tahun}%")
            ->orderBy('tanggal', 'DESC')->first();
        // end perihal data pagu
        // =====================
        // realisasi anggaran ditjen
        // query realisasi
        $realisasi  = $real->whereNotNull('no_sp2d')->whereIn("kode_subkomponen", function ($query) use ($id_dir) {
            $query->select('kode_realisasi')
                ->from('tbm_subkomponen')
                ->where('kode_direktorat', $id_dir);
        })->sum('nilai_rupiah');
        //
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

        $rm_pusat   = $pagu_pusat - $phln_pusat;

        // $realisasi_pusat = $real->where('kdsatker', '027486')->whereNotNull('no_sp2d')->sum('nilai_rupiah');
        $realisasi_pusat    = getSumRealisasiPusat();
        $sisa_pusat         = $pagu_pusat - $realisasi_pusat;
        $sisa_rm_pusat      = $rm_pusat - $realisasi_pusat;

        $pagu_dekon = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->whereNotIn('kdsatker', ['027486', '356000', '417936', '690639'])->sum('total');

        // $realisasi_dekon = $real->whereNotIn('kdsatker', ['027486', '356000', '417936', '690639'])->sum('nilai_rupiah');
        $realisasi_dekon    = getSumRealisasiDekon();
        $sisa_dekon         = $pagu_dekon - $realisasi_dekon;

        $pagu_tp = $ang->whereIn('kdsatker', ['356000', '417936', '690639'])->sum('total');
        $realisasi_tp = $real->where('status_data', 'Upload SP2D')->whereIn('kdsatker', ['356000', '417936', '690639'])->sum('nilai_rupiah');
        $sisa_tp = $pagu_tp - $realisasi_tp;

        $last_synch_ang = $ang->max('created_at');
        $last_synch_real = $real->max('created_at');

        $data_dekon = DB::SELECT('SELECT sum(nilai_rupiah) as total, kdsatker, nama_satker FROM tb_sakti_realisasi
        LEFT OUTER JOIN tbm_satker ON tbm_satker.kode=tb_sakti_realisasi.kdsatker
        WHERE kdsatker NOT LIKE \'027486\'
        GROUP BY kdsatker, nama_satker
        ORDER BY SUM(nilai_rupiah) DESC');

        //$realisasi          = $realisasi_pusat+$realisasi_dekon+$realisasi_tp;
        $selisih            = $anggaran - $realisasi;

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
        $data_es1_cnt = $data_es1->count();
        $real_eselon1_totalpersen = 0;
        foreach ($data_es1 as $value_es1) {
            $color[]            = $value_es1->bgcolor;
            $satker_eselon1[]   = $value_es1->nama_satker;
            $real_eselon1[]     = number_format((float) $value_es1->persentase_realisasi, 2);
            $real_eselon1_totalpersen += number_format((float) $value_es1->persentase_realisasi, 2);

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

        //$rata2_realisasi_eselon1 = ($sum_real_eselon1/$sum_pagu_eselon1) * 100;
        $rata2_realisasi_eselon1 = ($real_eselon1_totalpersen / $data_es1_cnt);
        $rata2_realisasi_eselon2 = ($sum_real_eselon2 / $sum_pagu_eselon2) * 100;

        foreach ($data_es1 as $row) {
            $rata2_eselon1[] = number_format((float)$rata2_realisasi_eselon1, 2);
            $rata2_eselon2[] = number_format((float)$rata2_realisasi_eselon2, 2);
        }
        $rata2_realisasi_eselon1 = number_format((float)$rata2_realisasi_eselon1, 2);
        $rata2_realisasi_eselon2 = number_format((float)$rata2_realisasi_eselon2, 2);

        $rata2_eselon1 = json_encode($rata2_eselon1);
        $rata2_eselon2 = json_encode($rata2_eselon2);

        $history_pagu = $pagu->getHistory();

        $rekap_eselon2 = $dir->getRekapPagu();

        $satker_eselon2 = [];
        $pagu_eselon2   = [];
        $prosen_eselon2 = [];

        foreach ($rekap_eselon2 as $row) {
            $satker_eselon2[] = $row->alias_dir;
            $pagu_eselon2[]   = $row->pagu; //number_format((float)$row->pagu, 0);
            $prosen_eselon2   = $row->pagu; //number_format((float)$row->pagu, 0);
        }

        $total_eselon2 = array_sum($pagu_eselon2);

        foreach ($satker_eselon2 as $key => $es2) {
            $satker_eselon2[$key] = ($es2 . ' : ' . number_format($total_eselon2 == 0 ? 0 : ($pagu_eselon2[$key] / $total_eselon2 * 100), 2) . '%');
        }

        $satker_eselon2 = json_encode($satker_eselon2);
        $pagu_eselon2   = json_encode($pagu_eselon2);

        $data_realuke2 = '
		<style>
			.nogap > .col{ padding-left:7.5px; padding-right: 7.5px}
			.nogap > .col:first-child{ padding-left: 15px; }
			.nogap > .col:last-child{ padding-right: 15px; }
			.kotakdonut{
				border: 2px solid #808080;
				border-radius: 25px;
				font-size:12pt;
				text-align:center;
				font-weight:500;
				color:#000;
			}
			.classWithPad { margin:10px; padding:10px; }
			.canvas-container{
				width: 100%;
			   text-align:center;
			}
			.canvas{
				display: inline;
			}
		</style>
		';
        $data_realuke2_js = '';
        $dir_uke2 = [];
        $real_uke2_arr = [];
        $dir_uke2_ratakemendagri = [];
        $dir_uke2_rataeselon = [];
        $real_uke2_totalpersen = 0;

        $realisasi = $realisasi;
        $str = "select id_dir,nama_dir,alias_dir,
			(select sum(a.nilai_rupiah) from tb_sakti_realisasi a where status_data='Upload SP2D'
			and a.kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = d.id_dir)) as realisasi
			FROM tbm_dir d WHERE d.id_eselon <> '0' order by kode";
        $data_dir = DB::select($str);
        $bgcolor_merah = 'rgb(204,0,0)';
        $bgcolor_kuning = 'rgb(237,245,29)';
        $bgcolor_hijau = 'rgb(41,204,0)';
        $bgcolor_abu = 'rgb(206,206,206)';
        foreach ($data_dir as $item) {
            $dir_uke2[] = $item->alias_dir;
            //Realisasi Anggaran per UK II
            $pct = ($item->realisasi / $anggaran_adwil) * 100;

            $real_uke2[] = number_format((float)$pct, 2);
            $real_uke2_totalpersen = $real_uke2_totalpersen + $pct;
            $dir_uke2_ratakemendagri[] = $rata2_realisasi_eselon1;

            $persen_realuke2 = $anggaran == 0 ? 0 : ($item->realisasi / $anggaran) * 100;
            $persen_sisa = 100 - $persen_realuke2;
            $bgcolor = '';
            if ($persen_realuke2 <= 30) {
                $bgcolor = $bgcolor_merah;
            } elseif ($persen_realuke2 > 30 && $persen_realuke2 <= 60) {
                $bgcolor = $bgcolor_kuning;
            } elseif ($persen_realuke2 > 60) {
                $bgcolor = $bgcolor_hijau;
            }
            $persen_realuke2 = number_format((float)$persen_realuke2, 2, '.', '');
            $persen_sisa = number_format((float)$persen_sisa, 2, '.', '');

            if ($item->id_dir == $id_dir) {
                $data_realuke2_js = "
				  var form_data = new FormData();
				  form_data.append('id_dir', '" . $item->id_dir . "');
				  form_data.append('alias_dir', '" . $item->alias_dir . "');
				  form_data.append('realisasi_dir', '" . $anggaran . "');
				  form_data.append('_token', '" . csrf_token() . "')
				  $.ajax({
			          url: '" . route('realUke3') . "',
			          type:'POST',
			          data: form_data,
			          cache: false,
			          processData: false,
			          contentType: false,
			          success: function (e)
			          {
						document.getElementById('div_realuke2').innerHTML=e.data_realuke3;
						eval(e.data_realuke3_js)
					  }
				 })";
            }
        }
        $dir_uke2_cnt = count($dir_uke2);
        foreach ($dir_uke2 as $item) {
            $dir_uke2_rataeselon[] = $real_uke2_totalpersen / $dir_uke2_cnt;
            $rata2_realisasi_eselon2 = number_format((float)$real_uke2_totalpersen / $dir_uke2_cnt, 2);
        }
        $dir_uke2 = json_encode($dir_uke2);
        $real_uke2 = json_encode($real_uke2);
        $dir_uke2_ratakemendagri = json_encode($dir_uke2_ratakemendagri);
        $dir_uke2_rataeselon = json_encode($dir_uke2_rataeselon);

        $data_sisauke2 = '';
        $data_sisauke2_js = '';
        $str = "select id_dir,nama_dir,alias_dir,
			(select sum(a.total) from tb_sakti_anggaran a where urutan_header1=0 and urutan_header2=0
			and a.kode_subkomponen in (select s.kode_pagu from tbm_subkomponen s where s.`kode_direktorat` = d.id_dir))-
			(select sum(a.nilai_rupiah) from tb_sakti_realisasi a where status_data='Upload SP2D'
			and a.kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = d.id_dir)) as sisa
			FROM tbm_dir d WHERE d.id_eselon <> '0' order by kode";
        $data_dir = DB::select($str);
        foreach ($data_dir as $item) {
            $persen_sisauke2 = $selisih == 0 ? 0 : ($item->sisa / $selisih) * 100;
            $persen_sisa = 100 - $persen_sisauke2;
            $bgcolor = '';
            if ($persen_sisauke2 <= 30) {
                $bgcolor = $bgcolor_hijau;
            } elseif ($persen_sisauke2 > 30 && $persen_sisauke2 <= 60) {
                $bgcolor = $bgcolor_kuning;
            } elseif ($persen_sisauke2 > 60) {
                $bgcolor = $bgcolor_merah;
            }
            $persen_sisauke2 = number_format((float)$persen_sisauke2, 2, '.', '');
            $persen_sisa = number_format((float)$persen_sisa, 2, '.', '');

            if ($item->id_dir == $id_dir) {
                $data_sisauke2_js = "
				  var form_data = new FormData();
				  form_data.append('id_dir', '" . $item->id_dir . "');
				  form_data.append('alias_dir', '" . $item->alias_dir . "');
				  form_data.append('sisa_dir', '" . $selisih . "');
				  form_data.append('_token', '" . csrf_token() . "')
				  $.ajax({
			          url: '" . route('sisaUke3') . "',
			          type:'POST',
			          data: form_data,
			          cache: false,
			          processData: false,
			          contentType: false,
			          success: function (e)
			          {
						document.getElementById('div_sisauke2').innerHTML=e.data_sisauke3;
						eval(e.data_sisauke3_js)
					  }
				  });";
            }
        }

        $dir_data = $dir->where('id_dir', '!=', 0)->get();
        $prov_data = $provinsi->where('namaprov', '!=', 'Pusat')->get();
        // kirim data ke view
        return view('home.dashboarduke2', compact(
            'anggaran_adwil',
            'id_dir',
            'alias_dir',
            'prov_data',
            'dir_data',
            'dir_uke2_ratakemendagri',
            'dir_uke2_rataeselon',
            'rata2_realisasi_eselon2',
            'rata2_realisasi_eselon1',
            'dir_uke2',
            'real_uke2',
            'data_sisauke2',
            'data_sisauke2_js',
            'data_realuke2',
            'data_realuke2_js',
            'anggaran',
            'data_pagu',
            'realisasi',
            'selisih',
            'pagu_pusat',
            'realisasi_pusat',
            'sisa_pusat',
            'sisa_rm_pusat',
            'pagu_dekon',
            'realisasi_dekon',
            'sisa_dekon',
            'pagu_tp',
            'realisasi_tp',
            'sisa_tp',
            'last_synch_ang',
            'last_synch_real',
            'data_dekon',
            'rm_pusat',
            'phln_pusat',
            'data_pagu',
            'realisasi_phln',
            'satker_eselon1',
            'real_eselon1',
            'data_es1',
            'color',
            'rata2_eselon1',
            'rata2_eselon2',
            'history_pagu',
            'satker_eselon2',
            'pagu_eselon2'
        ));
    }

    public function dashboarduke3()
    {
        // variable tambahan
        $id_dir = Auth::user()->id_dir;
        $id_subdir = Auth::user()->id_subdir;

        $id_dir = ($id_dir != 0 ? $id_dir : '');
        $id_subdir = ($id_subdir != 0 ? $id_subdir : '');


        $modul      = "Home";
        $current    = "Dashboard";
        // siapkan table yang digunakan
        $pagu       = new PaguHistory;
        $ang        = new SaktiAnggaran;
        $ses1       = new SatkerEselon1;
        $real       = new SaktiRealisasi;
        $es1        = new SatkerKemendagri;
        $real1      = new RealisasiSaktiEselon1;
        $dir          = new Direktorat;
        $subdir     = new Subdirektorat;
        $provinsi      = new Provinsi;
        // ====================
        // pagu anggaran ditjen
        // query data anggaran

        $alias_dir_data = $dir->where('id_dir', $id_dir)->first('alias_dir');
        $alias_dir = $alias_dir_data['alias_dir'];

        $alias_subdir_data = $subdir->where('id_subdir', $id_subdir)->first('alias_subdir');
        $alias_subdir = $alias_dir_data['alias_subdir'];

        $anggaran   = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->whereIn("kode_subkomponen", function ($query) use ($id_subdir) {
            $query->select('kode_pagu')
                ->from('tbm_subkomponen')
                ->where('kode_subdirektorat', $id_subdir);
        })->sum('total');

        $anggaran_adwil   = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->sum('total');

        // set tahun
        $tahun  = date("Y");
        // query data pagu
        $data_pagu  = $pagu->where("title", "like", "%{$tahun}%")
            ->orWhere("tanggal", "like", "%{$tahun}%")
            ->orderBy('tanggal', 'DESC')->first();
        // end perihal data pagu
        // =====================
        // realisasi anggaran ditjen
        // query realisasi
        $realisasi  = $real->whereNotNull('no_sp2d')->whereIn("kode_subkomponen", function ($query) use ($id_subdir) {
            $query->select('kode_realisasi')
                ->from('tbm_subkomponen')
                ->where('kode_subdirektorat', $id_subdir);
        })->sum('nilai_rupiah');
        //
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

        $rm_pusat   = $pagu_pusat - $phln_pusat;

        // $realisasi_pusat = $real->where('kdsatker', '027486')->whereNotNull('no_sp2d')->sum('nilai_rupiah');
        $realisasi_pusat    = getSumRealisasiPusat();
        $sisa_pusat         = $pagu_pusat - $realisasi_pusat;
        $sisa_rm_pusat      = $rm_pusat - $realisasi_pusat;

        $pagu_dekon = $ang->where([
            'urutan_header1'    => 0,
            'urutan_header2'    => 0
        ])->whereNotIn('kdsatker', ['027486', '356000', '417936', '690639'])->sum('total');

        // $realisasi_dekon = $real->whereNotIn('kdsatker', ['027486', '356000', '417936', '690639'])->sum('nilai_rupiah');
        $realisasi_dekon    = getSumRealisasiDekon();
        $sisa_dekon         = $pagu_dekon - $realisasi_dekon;

        $pagu_tp = $ang->whereIn('kdsatker', ['356000', '417936', '690639'])->sum('total');
        $realisasi_tp = $real->where('status_data', 'Upload SP2D')->whereIn('kdsatker', ['356000', '417936', '690639'])->sum('nilai_rupiah');
        $sisa_tp = $pagu_tp - $realisasi_tp;

        $last_synch_ang = $ang->max('created_at');
        $last_synch_real = $real->max('created_at');

        $data_dekon = DB::SELECT('SELECT sum(nilai_rupiah) as total, kdsatker, nama_satker FROM tb_sakti_realisasi
        LEFT OUTER JOIN tbm_satker ON tbm_satker.kode=tb_sakti_realisasi.kdsatker
        WHERE kdsatker NOT LIKE \'027486\'
        GROUP BY kdsatker, nama_satker
        ORDER BY SUM(nilai_rupiah) DESC');

        //$realisasi          = $realisasi_pusat+$realisasi_dekon+$realisasi_tp;
        $selisih            = $anggaran - $realisasi;

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
        $data_es1_cnt = $data_es1->count();
        $real_eselon1_totalpersen = 0;
        foreach ($data_es1 as $value_es1) {
            $color[]            = $value_es1->bgcolor;
            $satker_eselon1[]   = $value_es1->nama_satker;
            $real_eselon1[]     = number_format((float) $value_es1->persentase_realisasi, 2);
            $real_eselon1_totalpersen += number_format((float) $value_es1->persentase_realisasi, 2);

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

        //$rata2_realisasi_eselon1 = ($sum_real_eselon1/$sum_pagu_eselon1) * 100;
        $rata2_realisasi_eselon1 = ($real_eselon1_totalpersen / $data_es1_cnt);
        $rata2_realisasi_eselon2 = ($sum_real_eselon2 / $sum_pagu_eselon2) * 100;

        foreach ($data_es1 as $row) {
            $rata2_eselon1[] = number_format((float)$rata2_realisasi_eselon1, 2);
            $rata2_eselon2[] = number_format((float)$rata2_realisasi_eselon2, 2);
        }
        $rata2_realisasi_eselon1 = number_format((float)$rata2_realisasi_eselon1, 2);
        $rata2_realisasi_eselon2 = number_format((float)$rata2_realisasi_eselon2, 2);

        $rata2_eselon1 = json_encode($rata2_eselon1);
        $rata2_eselon2 = json_encode($rata2_eselon2);

        $history_pagu = $pagu->getHistory();

        $rekap_eselon2 = $dir->getRekapPagu();

        $satker_eselon2 = [];
        $pagu_eselon2   = [];
        $prosen_eselon2 = [];

        foreach ($rekap_eselon2 as $row) {
            $satker_eselon2[] = $row->alias_dir;
            $pagu_eselon2[]   = $row->pagu; //number_format((float)$row->pagu, 0);
            $prosen_eselon2   = $row->pagu; //number_format((float)$row->pagu, 0);
        }

        $total_eselon2 = array_sum($pagu_eselon2);

        foreach ($satker_eselon2 as $key => $es2) {
            $satker_eselon2[$key] = ($es2 . ' : ' . number_format(($pagu_eselon2[$key] / $total_eselon2 * 100), 2) . '%');
        }

        $satker_eselon2 = json_encode($satker_eselon2);
        $pagu_eselon2   = json_encode($pagu_eselon2);

        $data_realuke2 = '';
        $data_realuke2_js = '';
        $dir_uke2 = [];
        $real_uke2_arr = [];
        $dir_uke2_ratakemendagri = [];
        $dir_uke2_rataeselon = [];
        $real_uke2_totalpersen = 0;

        $realisasi = $realisasi;
        $str = "select id_dir,nama_dir,alias_dir,
			(select sum(a.nilai_rupiah) from tb_sakti_realisasi a where status_data='Upload SP2D'
			and a.kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = d.id_dir)) as realisasi
			FROM tbm_dir d WHERE d.id_eselon <> '0' order by kode";
        $data_dir = DB::select($str);
        $bgcolor_merah = 'rgb(204,0,0)';
        $bgcolor_kuning = 'rgb(237,245,29)';
        $bgcolor_hijau = 'rgb(41,204,0)';
        $bgcolor_abu = 'rgb(206,206,206)';
        foreach ($data_dir as $item) {
            $dir_uke2[] = $item->alias_dir;
            //Realisasi Anggaran per UK II
            $pct = ($item->realisasi / $anggaran_adwil) * 100;

            $real_uke2[] = number_format((float)$pct, 2);
            $real_uke2_totalpersen = $real_uke2_totalpersen + $pct;
            $dir_uke2_ratakemendagri[] = $rata2_realisasi_eselon1;

            $persen_realuke2 = ($item->realisasi / $anggaran) * 100;
            $persen_sisa = 100 - $persen_realuke2;
            $bgcolor = '';
            if ($persen_realuke2 <= 30) {
                $bgcolor = $bgcolor_merah;
            } elseif ($persen_realuke2 > 30 && $persen_realuke2 <= 60) {
                $bgcolor = $bgcolor_kuning;
            } elseif ($persen_realuke2 > 60) {
                $bgcolor = $bgcolor_hijau;
            }
            $persen_realuke2 = number_format((float)$persen_realuke2, 2, '.', '');
            $persen_sisa = number_format((float)$persen_sisa, 2, '.', '');
        }
        $dir_uke2_cnt = count($dir_uke2);
        foreach ($dir_uke2 as $item) {
            $dir_uke2_rataeselon[] = $real_uke2_totalpersen / $dir_uke2_cnt;
            $rata2_realisasi_eselon2 = number_format((float)$real_uke2_totalpersen / $dir_uke2_cnt, 2);
        }
        $dir_uke2 = json_encode($dir_uke2);
        $real_uke2 = json_encode($real_uke2);
        $dir_uke2_ratakemendagri = json_encode($dir_uke2_ratakemendagri);
        $dir_uke2_rataeselon = json_encode($dir_uke2_rataeselon);

        $data_sisauke2 = '';
        $data_sisauke2_js = '';
        $str = "select id_dir,nama_dir,alias_dir,
			(select sum(a.total) from tb_sakti_anggaran a where urutan_header1=0 and urutan_header2=0
			and a.kode_subkomponen in (select s.kode_pagu from tbm_subkomponen s where s.`kode_direktorat` = d.id_dir))-
			(select sum(a.nilai_rupiah) from tb_sakti_realisasi a where status_data='Upload SP2D'
			and a.kode_subkomponen in (select s.kode_realisasi from tbm_subkomponen s where s.kode_direktorat = d.id_dir)) as sisa
			FROM tbm_dir d WHERE d.id_eselon <> '0' order by kode";
        $data_dir = DB::select($str);
        foreach ($data_dir as $item) {
            $persen_sisauke2 = ($item->sisa / $selisih) * 100;
            $persen_sisa = 100 - $persen_sisauke2;
            $bgcolor = '';
            if ($persen_sisauke2 <= 30) {
                $bgcolor = $bgcolor_hijau;
            } elseif ($persen_sisauke2 > 30 && $persen_sisauke2 <= 60) {
                $bgcolor = $bgcolor_kuning;
            } elseif ($persen_sisauke2 > 60) {
                $bgcolor = $bgcolor_merah;
            }
            $persen_sisauke2 = number_format((float)$persen_sisauke2, 2, '.', '');
            $persen_sisa = number_format((float)$persen_sisa, 2, '.', '');
        }

        $dir_data = $dir->where('id_dir', '!=', 0)->get();
        $prov_data = $provinsi->where('namaprov', '!=', 'Pusat')->get();
        // kirim data ke view
        return view('home.dashboarduke3', compact(
            'anggaran_adwil',
            'id_subdir',
            'id_dir',
            'alias_dir',
            'prov_data',
            'dir_data',
            'dir_uke2_ratakemendagri',
            'dir_uke2_rataeselon',
            'rata2_realisasi_eselon2',
            'rata2_realisasi_eselon1',
            'dir_uke2',
            'real_uke2',
            'data_sisauke2',
            'data_sisauke2_js',
            'data_realuke2',
            'data_realuke2_js',
            'anggaran',
            'data_pagu',
            'realisasi',
            'selisih',
            'pagu_pusat',
            'realisasi_pusat',
            'sisa_pusat',
            'sisa_rm_pusat',
            'pagu_dekon',
            'realisasi_dekon',
            'sisa_dekon',
            'pagu_tp',
            'realisasi_tp',
            'sisa_tp',
            'last_synch_ang',
            'last_synch_real',
            'data_dekon',
            'rm_pusat',
            'phln_pusat',
            'data_pagu',
            'realisasi_phln',
            'satker_eselon1',
            'real_eselon1',
            'data_es1',
            'color',
            'rata2_eselon1',
            'rata2_eselon2',
            'history_pagu',
            'satker_eselon2',
            'pagu_eselon2'
        ));
    }
}
