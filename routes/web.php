<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@dashboard')->name('home');
Route::get('/registrasi', 'LandersController@viewRegistrasi')->name('registrasi');
Route::get('/beta-testing', 'SaktiController@synchDataRealisasi')->name('beta-testing');
Route::get('/test', 'ToolsController@testing')->name('test');
Route::get('/{token}/ticketing', 'LandersController@suratPengesahan')->name('pengesahan-ticketing');

Route::post('/satker', 'LandersController@satker')->name('satker');

Route::get('/profile', 'UserController@profile')->name('profile');

Route::get('/dashboard','DashboardController@dashboard')->name('dashboard');
Route::get('/dashboard-admin','DashboardController@dashboardadmin')->name('dashboard-admin');

Route::get('/rekapEselon3/{id_dir}', 'HomeController@rekapEselon3')->name('rekapEselon3');
Route::post('/rekapEselon3', 'HomeController@rekapEselon3')->name('rekapEselon3');
Route::get('/realUke3/{id_dir}', 'HomeController@realUke3')->name('realUke3');
Route::post('/realUke3', 'HomeController@realUke3')->name('realUke3');
Route::post('/sisaUke3', 'HomeController@sisaUke3')->name('sisaUke3');
Route::post('/barRealUke3', 'HomeController@barRealUke3')->name('barRealUke3');
Route::post('/grafiksanding', 'HomeController@grafiksanding')->name('grafiksanding');
Route::post('/sandingUke2', 'HomeController@sandingUke2')->name('sandingUke2');
Route::post('/sandingUke3', 'HomeController@sandingUke3')->name('sandingUke3');
Route::post('/getsubdir', 'HomeController@getsubdir')->name('getsubdir');
Route::post('/getsatker', 'HomeController@getsatker')->name('getsatker');
Route::post('/getrev', 'HomeController@getrev')->name('getrev');
Route::get('/homeuke2', 'HomeUke2Controller@dashboard')->name('homeuke2');
Route::get('/homeuke3', 'HomeUke3Controller@dashboard')->name('homeuke3');
// E-Ticketing
$router->group(['prefix' => 'ticketing',  'as' => 'ticketing.'], function () use ($router) {

    // Revisi
    $router->get('/revisi-ggwp', 'TicketingController@viewGgwpDaerah')->name('view-ggwp-daerah');
    $router->get('/revisi-sarpras', 'TicketingController@viewSarprasDaerah')->name('view-sarpras-daerah');
    $router->get('/revisi-pusat', 'TicketingController@viewRevisiPusat')->name('view-revisi-pusat');
    $router->get('/revisi-daerah', 'TicketingController@viewRevisiDaerah')->name('view-revisi-daerah');

    // Revisi new
    $router->get('/revisi-gwpp', 'TicketingController@viewGwppDaerah')->name('revisi-gwpp');
    $router->get('/baru/{tahun}/{provinsi}/{satker}', 'TicketingController@viewTicketBaru')->name('view-ticket-baru');
    $router->post('/submit-ticket-baru', 'TicketingController@submitTicketBaru')->name('submit-ticket-baru');
    $router->post('/satker-provinsi', 'TicketingController@getSatkerProvinsi')->name('satker-provinsi');
    $router->post('/rekap-satker', 'TicketingController@getRekapSatker')->name('rekap-satker');
    $router->get('/list/{tahun}/{bulan}/{provinsi}/{satker}/{status}', 'TicketingController@viewListGwppDaerah')->name('list-ticket');

    $router->get('/daftar-revisi-baru', 'TicketingController@viewGgwpDaerahListRevBaru')->name('view-daftar-revisi-baru');
    $router->get('/daftar-revisi-perbaikan', 'TicketingController@viewGgwpDaerahListPerbaikan')->name('view-daftar-revisi-perbaikan');
    $router->get('/daftar-revisi-disetujui-kpa-daerah', 'TicketingController@viewGgwpDaerahListOkKpa')->name('view-daftar-revisi-kpa');
    $router->get('/daftar-revisi-disetujui-fasgub', 'TicketingController@viewGgwpDaerahListOkFasgub')->name('view-daftar-revisi-fasgub');
    $router->get('/daftar-revisi-disetujui-bagren', 'TicketingController@viewGgwpDaerahListOkBagren')->name('view-daftar-revisi-bagren');

    $router->get('/revisi-kpa/{id?}', 'TicketingController@viewRevisiKpa')->name('view-revisi-kpa');
    $router->get('/revisi-ppk/{id?}', 'TicketingController@viewRevisiPpk')->name('view-revisi-ppk');
    $router->get('/revisi-bagren/{id?}', 'TicketingController@viewRevisiBagren')->name('view-revisi-bagren');

    $router->post('/submit-revisi-kpa', 'TicketingController@submitRevisiKpa')->name('submit-revisi-kpa');
    $router->post('/submit-revisi-ppk', 'TicketingController@submitRevisiPpk')->name('submit-revisi-ppk');
    $router->post('/submit-revisi-bagren', 'TicketingController@submitRevisiBagren')->name('submit-revisi-bagren');

    // Log Ticketing
    $router->get('/log', 'TicketingController@loadHistory')->name('view-log');
    
    $router->post('/data-revisi', 'TicketingController@dataRevisi')->name('data-revisi');
    $router->post('/submit-revisi', 'TicketingController@submitRevisi')->name('submit-revisi');
    $router->post('/update-revisi', 'TicketingController@updateRevisi')->name('update-revisi');
    $router->post('/detail-revisi', 'TicketingController@detailRevisi')->name('detail-revisi');
    $router->post('/approval-revisi', 'TicketingController@approvalRevisi')->name('approval-revisi');
    $router->post('/verifikasi-revisi', 'TicketingController@verifikasiRevisi')->name('verifikasi-revisi');
    $router->post('/remove-revisi', 'TicketingController@removeRevisi')->name('remove-revisi');

    $router->post('/submit-bagren', 'TicketingController@submitBagren')->name('submit-bagren');
    $router->post('/submit-fasgub', 'TicketingController@submitFasgub')->name('submit-fasgub');
    $router->post('/submit-ban', 'TicketingController@submitBan')->name('submit-ban');
    $router->post('/submit-kpa', 'TicketingController@submitKpa')->name('submit-kpa');

    Route::get('/preview-pengesahan', 'TicketingController@suratPengesahan')->name('preview-pengesahan');
    Route::post('/preview-bagren-daerah', 'TicketingController@previewSuratPengesahan')->name('preview-bagren-daerah');

    $router->post('/summarize', 'TicketingController@summarize')->name('summarize');
});


// POK
$router->group(['prefix' => 'pok',  'as' => 'pok.'], function () use ($router) {

    // Penerbitan POK
    $router->get('/terbit-pok', 'PokController@index')->name('terbit-pok');

    // History POK
    $router->get('/log', 'PokController@loadHistory')->name('view-log');

    // Data Revisi
    $router->post('/submit-kpa', 'PokController@submitKpa')->name('submit-kpa');
    $router->post('/data-revisi', 'PokController@dataRevisi')->name('data-revisi');
    $router->post('/submit-kabagren', 'PokController@submitKabagren')->name('submit-kabagren');
    $router->post('/submit-kabagkeu', 'PokController@submitKabagKeu')->name('submit-kabagkeu');
    $router->post('/jumlah-revisi', 'PokController@jumlahRevisiByDirektorat')->name('jumlah-revisi');

    $router->post('/data-pok', 'PokController@dataPok')->name('data-pok');
    $router->post('/submit-bagren', 'PokController@submitBagren')->name('submit-bagren');
    $router->post('/submit-bagkeu', 'PokController@submitBagkeu')->name('submit-bagkeu');
    $router->post('/update-bagren', 'PokController@updateBagren')->name('update-bagren');
    $router->post('/distribusi-pok', 'PokController@distribusiPok')->name('distribusi-pok');
});

// Tools
$router->group(['prefix' => 'tools',  'as' => 'tools.'], function () use ($router) {

    // Provinsi
    $router->post('/provinsi', 'ToolsController@provinsi')->name('provinsi');

    // Satker
    $router->get('/satker', 'ToolsController@satker')->name('satker');

    // Direktorat
    $router->post('/direktorat', 'ToolsController@direktorat')->name('direktorat');
    $router->get('/subdirektorat', 'ToolsController@subdirektorat')->name('subdirektorat');

    // Pejabat
    $router->post('/pejabat-pptk', 'ToolsController@pejabatPptk')->name('pejabat-pptk');
    $router->post('/detail-pejabat', 'ToolsController@detailPejabat')->name('detail-pejabat');
    $router->post('/pejabat-daerah', 'ToolsController@pejabatDaerah')->name('pejabat-daerah');
    $router->post('/submit-pejabat-daerah', 'ToolsController@submitPejabatDaerah')->name('submit-pejabat-daerah');

    // Jabatan
    $router->post('/jabatan', 'ToolsController@jabatan')->name('jabatan');
    $router->post('/submit-jabatan', 'ToolsController@submitJabatan')->name('submit-jabatan');

    // Dokumen
    $router->post('/upload-master-dokumen', 'ToolsController@uploadMasterDokumen')->name('upload-master-dokumen');

    // Member Register
    $router->post('/detail-request', 'UserController@detailRequest')->name('detail-request');
    $router->post('/register', 'LandersController@register')->name('register');

    // Reset Password
    $router->post('/reset-password', 'LandersController@resetPassword')->name('reset-password');

    // Sending WA
    $router->post('/sending-wa', 'ToolsController@sendWa')->name('sending-wa');
    // sendingWa($phone_no, $message)

});

// Download
$router->group(['prefix' => 'download',  'as' => 'download.'], function () use ($router) {

    // Download Dokumen
	  $router->get('/dokumen-capaian/{id_dir}/{jenis_file}/{nama_file}', 'ToolsController@downloadCapaian')->name('dokumen-capaian');
    $router->get('/dokumen/{jenis_file}/{nama_file}', 'ToolsController@download')->name('dokumen');
    $router->get('/dokumen-pok/{pejabat}/{nama_file}', 'ToolsController@downloadPok')->name('dokumen-pok');
    $router->get('/dokumen-usulan/{jenis_file}/{nama_file}', 'ToolsController@downloadUsulan')->name('dokumen-usulan');
    $router->get('/dokumen-kpa-pok/{pejabat}/{nama_file}', 'ToolsController@downloadKpaPok')->name('dokumen-kpa-pok');

    // Download Master Dokumen
    $router->get('/master-dokumen/{nama_file}', 'ToolsController@downloadMasterDokumen')->name('master-dokumen');

    // Download POK
    $router->get('/pok/{nama_file}', 'ToolsController@downloadDokumenPok')->name('pok');

    // FILE
    $router->get('/all-files', 'ToolsController@downloadFile')->name('all-files');

    // Preview Surat Pengesahan
    Route::get('/preview-pengesahan', 'TicketingController@downloadSuratPengesahan')->name('preview-pengesahan');
});

// Master
$router->group(['prefix' => 'master',  'as' => 'master.'], function () use ($router) {

    // Data Pengguna
    $router->get('/users', 'UserController@viewUsers')->name('view-users');
    $router->post('/data-users', 'UserController@dataUsers')->name('data-users');
    $router->post('/detail-user', 'UserController@detailUser')->name('detail-user');
    $router->post('/hide-user', 'UserController@hideUser')->name('hide-user');
    // $router->get('/pengguna', 'UserController@pengguna')->name('pengguna');

    // Permintaan Pengguna
    $router->get('/users-request', 'UserController@viewRequestUsers')->name('users-request');
    $router->post('/data-request-user', 'UserController@dataRequestUsers')->name('data-request-user');
    $router->post('/proses-user', 'UserController@prosesUser')->name('proses-user');

    // Data Satuan Kerja
    $router->get('/satuan-kerja', 'SatkerController@viewSatker')->name('satuan-kerja');
    $router->post('/data-satuan-kerja', 'SatkerController@data')->name('data-satuan-kerja');
    $router->post('/import-satuan-kerja', 'SatkerController@import')->name('import-satuan-kerja');
    $router->post('/submit-satuan-kerja', 'SatkerController@submit')->name('submit-satuan-kerja');
    $router->post('/destroy-satuan-kerja', 'SatkerController@destroy')->name('destroy-satuan-kerja');

    // Data Satuan Kerja Eselon 1
    $router->get('/satker-eselon-1', 'SatkerController@viewSatkerEselon1')->name('satker-eselon-1');
    $router->post('/satker-eselon1', 'SatkerController@dataSatkerEselon1')->name('satker-eselon1');
    $router->post('/submit-satker-eselon1', 'SatkerController@submitSatkerEselon1')->name('submit-satker-eselon1');
    $router->post('/submit-satker-emonev', 'SatkerController@submitSatkerEmonev')->name('submit-satker-emonev');
    $router->post('/destroy-satker-eselon1', 'SatkerController@destroySatkerEselon1')->name('destroy-satker-eselon1');
    $router->post('/destroy-satker-emonev', 'SatkerController@destroySatkerEmonev')->name('destroy-satker-emonev');

    // History Pagu
    $router->get('/history-pagu', 'PaguController@viewHistory')->name('history-pagu');
    $router->post('/history-pagu', 'PaguController@historyPagu')->name('history-pagu');
    $router->post('/submit-history-pagu', 'PaguController@submitHistoryPagu')->name('submit-history-pagu');
    $router->post('/update-history-pagu', 'PaguController@updateHistoryPagu')->name('update-history-pagu');
    $router->post('/remove-history-pagu', 'PaguController@removeHistoryPagu')->name('remove-history-pagu');

    // Data Subdit
    $router->get('/data-subdit', 'SubditController@view')->name('data-subdit');
    $router->post('/data-subdit', 'SubditController@data')->name('data-subdit');
    $router->post('/destroy-subdit', 'SubditController@destroy')->name('destroy-subdit');
    $router->post('/submit-subdit', 'SubditController@submit')->name('submit-subdit');

    // Kode Subkomponen Dekon
    $router->get('/subkomponen-dekon', 'SubkomponenController@view')->name('subkomponen-dekon');
    $router->post('/data-subkomponen-dekon', 'SubkomponenController@data')->name('data-subkomponen-dekon');
    $router->post('/destroy-subkomponen-dekon', 'SubkomponenController@destroy')->name('destroy-subkomponen-dekon');
    $router->post('/submit-subkomponen-dekon', 'SubkomponenController@submit')->name('submit-subkomponen-dekon');

    // Kode Subkomponen Pusat
    $router->get('/subkomponen-dekon', 'SubkomponenController@view')->name('subkomponen-dekon');
    $router->post('/data-subkomponen-dekon', 'SubkomponenController@data')->name('data-subkomponen-dekon');
    $router->post('/destroy-subkomponen-dekon', 'SubkomponenController@destroy')->name('destroy-subkomponen-dekon');
    $router->post('/submit-subkomponen-dekon', 'SubkomponenController@submit')->name('submit-subkomponen-dekon');

    $router->get('/subkomponen-pusat', 'SubkomponenController@viewPusat')->name('subkomponen-pusat');
    $router->post('/data-subkomponen-pusat', 'SubkomponenController@dataPusat')->name('data-subkomponen-pusat');
    $router->post('/destroy-subkomponen-pusat', 'SubkomponenController@destroyPusat')->name('destroy-subkomponen-pusat');
    $router->post('/submit-subkomponen-pusat', 'SubkomponenController@submitPusat')->name('submit-subkomponen-pusat');
});

// User
$router->group(['prefix' => 'users',  'as' => 'users.'], function () use ($router){

    Route::post("data", "UserController@data")->name('data');
    Route::post("submit", "UserController@submit")->name('submit');
    Route::post("update", "UserController@update")->name('update');
    Route::post("destroy", "UserController@destroy")->name('destroy');
    Route::post("change-password", "UserController@changePassword")->name('change-password');

    Route::get("generate-user", "UserController@generateUser")->name('generate-user');
});

// Usulan Kegiatan
$router->group(['prefix' => 'usulan',  'as' => 'usulan.'], function () use ($router) {

    $router->get('/kegiatan', 'UsulanController@view')->name('kegiatan');
    $router->get('/log', 'UsulanController@loadHistory')->name('view-log');
    
    $router->post('/data', 'UsulanController@data')->name('data');
    $router->post('/detail', 'UsulanController@detail')->name('detail');
    $router->post('/submit', 'UsulanController@submit')->name('submit');
    $router->post('/submit-ppk', 'UsulanController@submitPpk')->name('submit-ppk');
    $router->post('/update-usulan', 'UsulanController@updateUsulan')->name('update-usulan');
    $router->post('/submit-bagren', 'UsulanController@submitBagren')->name('submit-bagren');
});

// Capaian
$router->group(['prefix' => 'capaian',  'as' => 'capaian.'], function () use ($router) {

    $router->get('/capaian-output/{mdl}', 'CapaianController@viewOutput')->name('capaian-output');
  	$router->post('/capaian-output', 'CapaianController@viewOutput')->name('capaian-output');
  	$router->get('/input-capaian', 'CapaianController@inputCapaian')->name('input-capaian');
  	$router->post('/input-capaian', 'CapaianController@inputCapaian')->name('input-capaian');
  	$router->post('/submit-input-capaian', 'CapaianController@submitInputCapaian')->name('submit-input-capaian');
  	$router->post('/submit-validasi-capaian', 'CapaianController@submitValidasiCapaian')->name('submit-validasi-capaian');
  	$router->get('/log-file', 'CapaianController@logfile')->name('log-file');
  	$router->get('/log-approval', 'CapaianController@logapproval')->name('log-approval');
    $router->get('/target-capaian-output', 'CapaianController@viewTargetCaput')->name('target-capaian-output');
    $router->post('/target-capaian-output', 'CapaianController@viewTargetCaput')->name('target-capaian-output');
  	$router->get('/input-target', 'CapaianController@inputTarget')->name('input-target');
  	$router->post('/input-target', 'CapaianController@inputTarget')->name('input-target');
  	$router->post('/submit-input-target', 'CapaianController@submitInputTarget')->name('submit-input-target');
  	$router->post('/check-input-capaian', 'CapaianController@checkInputCapaian')->name('check-input-capaian');
    $router->get('/capaian-setting', 'CapaianController@inputSetting')->name('capaian-setting');
  	$router->post('/capaian-setting', 'CapaianController@inputSetting')->name('capaian-setting');
  	$router->post('/submit-input-setting', 'CapaianController@submitInputSetting')->name('submit-input-setting');
    $router->get('/import-sakti/{mdl}', 'CapaianController@importSakti')->name('import-sakti');
  	$router->post('/import-sakti', 'CapaianController@importSakti')->name('import-sakti');
  	$router->post('/submit-import-sakti', 'CapaianController@submitImportSakti')->name('submit-import-sakti');
 
    $router->get('/capaian-output-daerah', 'CapaianController@viewOutputDaerah')->name('capaian-output-daerah');
    $router->get('/preview-berita-acara', 'CapaianController@previewBeritaAcara')->name('preview-berita-acara');
    $router->get('/validasi-capaian-output', 'CapaianController@viewValidasiOutput')->name('validasi-capaian-output');
    $router->get('/kro', 'CapaianController@viewKRO')->name('kro');
    $router->get('/ro', 'CapaianController@viewRO')->name('ro');
    $router->get('/kegiatan', 'CapaianController@viewKegiatan')->name('kegiatan');
    $router->get('/komponen', 'CapaianController@viewKomponen')->name('komponen');
    $router->get('/subkomponen', 'CapaianController@viewSubKomponen')->name('subkomponen');

    $router->post('/data-kegiatan', 'CapaianController@dataKegiatan')->name('data-kegiatan');
    $router->post('/data-output', 'CapaianController@dataOutput')->name('data-output');

    $router->post('/data-treegrid', 'CapaianController@dataTreegrid')->name('data-treegrid');
    $router->post('/data-treegrid-daerah', 'CapaianController@dataTreegridDaerah')->name('data-treegrid-daerah');
    $router->post('/hide-data', 'CapaianController@hideData')->name('hide-data');
    $router->post('/submit-target', 'CapaianController@submitTarget')->name('submit-target');
    $router->post('/upload-evidence', 'CapaianController@uploadEvidence')->name('upload-evidence');
    $router->post('/delete-upload-evidence', 'CapaianController@deleteUploadEvidence')->name('delete-upload-evidence');
    $router->post('/count-ro', 'CapaianController@countRo')->name('count-ro');
    $router->post('/detail-input', 'CapaianController@detailInput')->name('detail-input');
});

// Sakti
$router->group(['prefix' => 'sakti',  'as' => 'sakti.'], function () use ($router) {

    // Ref Sts
    $router->get('/ref-sts', 'SaktiController@viewRefSts')->name('ref-sts');
    $router->post('/synch-ref-sts', 'SaktiController@synchRefSts')->name('synch-ref-sts');

    // Data Anggaran
    $router->post('/data-anggaran', 'SaktiController@dataAnggaran')->name('data-anggaran');
    $router->get('/data-anggaran', 'SaktiController@viewDataAnggaran')->name('data-anggaran');
    $router->post('/synch-data-anggaran', 'SaktiController@synchDataAnggaran')->name('synch-anggaran');

    // Data Realisasi
    $router->post('/data-realisasi', 'SaktiController@dataRealisasi')->name('data-realisasi');
    $router->get('/data-realisasi', 'SaktiController@viewDataRealisasi')->name('data-realisasi');
    $router->post('/synch-data-realisasi', 'SaktiController@synchDataRealisasi')->name('synch-realisasi');
    $router->post('/detail-tp', 'SaktiController@detailTp')->name('detail-tp');
    $router->post('/detail-pusat', 'SaktiController@detailPusat')->name('detail-pusat');
    $router->post('/detail-dekon', 'SaktiController@detailDekon')->name('detail-dekon');
    $router->post('/subdetail-pusat', 'SaktiController@subDetailPusat')->name('subdetail-pusat');
    $router->post('/subdetail-dekon', 'SaktiController@subDetailDekon')->name('subdetail-dekon');

    // RefUraian
    $router->get('/synch-program', 'SaktiController@synchProgram')->name('synch-program');
    $router->get('/synch-kegiatan', 'SaktiController@synchKegiatan')->name('synch-kegiatan');
    $router->get('/synch-output', 'SaktiController@synchOutput')->name('synch-output');
    $router->get('/synch-suboutput', 'SaktiController@synchSubOutput')->name('synch-suboutput');
    $router->get('/synch-komponen', 'SaktiController@synchKomponen')->name('synch-komponen');
    $router->get('/synch-akun', 'SaktiController@synchAkun')->name('synch-akun');
    $router->get('/synch-tematik', 'SaktiController@synchTematik')->name('synch-tematik');

    $router->post('/sum-realisasi', 'HomeController@sumRealisasi')->name('sum-realisasi');
    
});

Route::post('/rekap-eselon-3', 'HomeController@rekapEselon3')->name('rekap-eselon-3');


// Realisasi
Route::group(['prefix' => 'realisasi', 'as' => 'realisasi.'], function () {
    Route::get('/', 'RealisasiController@index')->name('index');
    Route::get('/create', 'RealisasiController@create')->name('create');
    Route::post('/', 'RealisasiController@store')->name('store');
    Route::get('/{id}', 'RealisasiController@show')->name('show');
    Route::get('/{id}/edit', 'RealisasiController@edit')->name('edit');
    Route::put('/{id}', 'RealisasiController@update')->name('update');
    Route::delete('/{id}', 'RealisasiController@destroy')->name('destroy');
    Route::get('/getData', 'RealisasiController@getData')->name('getData');
    Route::get('/{id}/download', 'RealisasiController@download')->name('download1');
    
});
Route::get('/export-excel', [RealisasiController::class, 'exportExcel']);
// Tes Routes
Route::group(['prefix' => 'tes', 'as' => 'tes.'], function () {
    Route::get('/', 'TesController@index')->name('index');
    Route::get('/create', 'TesController@create')->name('create');
    Route::post('/', 'TesController@store')->name('store');
    Route::get('/{id}', 'TesController@show')->name('show');
    Route::get('/{id}/edit', 'TesController@edit')->name('edit');
    Route::put('/{id}', 'TesController@update')->name('update');
    Route::delete('/{id}', 'TesController@destroy')->name('destroy');
    Route::get('/getData', 'TesController@getData')->name('getData');
    Route::get('/{id}/download', 'TesController@download')->name('download');
});

// Tes Import Eselon1
Route::group(['prefix' => 'importes1', 'as' => 'importes1.'], function () {
    Route::get('/', 'ImportEs1Controller@index')->name('index');
    Route::get('/create', 'ImportEs1Controller@create')->name('create');
    Route::post('/', 'ImportEs1Controller@store')->name('store');
    Route::get('/{id}', 'ImportEs1Controller@show')->name('show');
    Route::get('/{id}/edit', 'ImportEs1Controller@edit')->name('edit');
    Route::put('/{id}', 'ImportEs1Controller@update')->name('update');
    Route::delete('/{id}', 'ImportEs1Controller@destroy')->name('destroy');
    Route::get('/getData', 'ImportEs1Controller@getData')->name('getData');
    Route::get('/{id}/download', 'ImportEs1Controller@download')->name('download');
});
