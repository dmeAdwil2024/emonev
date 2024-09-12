<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$router->group(['prefix' => 'realisasi',  'as' => 'realisasi.'], function () use ($router) {

    // Realisasi Provinsi
    $router->get('/province', 'ApiController@realisasiProvinsi')->name('realisasi-province');
    $router->get('/{nama_provinsi}/province', 'ApiController@detailRealisasiProvinsi')->name('detail-realisasi-province');
});

$router->group(['prefix' => 'pagu',  'as' => 'pagu.'], function () use ($router) {

    // pagu Provinsi
    $router->get('/province', 'ApiController@paguProvinsi')->name('pagu-province');
    $router->get('/{nama_provinsi}/province', 'ApiController@detailPaguProvinsi')->name('detail-pagu-province');
    
});

$router->group(['prefix' => 'anggaran',  'as' => 'anggaran.'], function () use ($router) {

    // Summarize Anggaran Provinsi
    $router->get('/province', 'ApiController@summarizeProvinsi')->name('summarize-province');
    $router->get('/{nama_provinsi}/province', 'ApiController@summarizeDetailProvinsi')->name('summarize-detail-province');

    // Summarize Anggaran Satker
    $router->get('/{kode_satker}/satker', 'ApiController@summarizeSatker')->name('realisasi-satker');
    
});