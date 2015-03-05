<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
App::bind('SimdesApp\Services\LaraCacheInterface', 'SimdesApp\Services\LaraCache');
Route::get('/', 'WelcomeController@index');
// routing khusus backoffice
Route::get('/', function () {
    return view('index');
});
// login
Route::get('/login', function () {
    return view('login');
});
Route::group(['namespace' => 'Auth', 'prefix' => 'api/v1/auth'], function () {
    // Post login
    Route::post('post-login', 'AuthController@postLogin');
    // Destroy the session login
    Route::get('get-logout', 'AuthController@getLogout');
});
#Diakses oleh Backoffice
Route::group(['namespace' => 'Api\V1\Organisasi', 'prefix' => 'api/v1/backoffice'], function () {
    // Organisasi resource
    Route::resource('organisasi', 'OrganisasiController');
});

Route::group(['namespace' => 'Api\V1\User', 'prefix' => 'api/v1/backoffice'], function () {
    // User resource
    Route::resource('user', 'UserController');
});

Route::group(['namespace' => 'Api\V1\Akun', 'prefix' => 'api/v1'], function () {
    // Akun resource
    Route::resource('apbdes-akun', 'AkunController');
});

Route::group(['namespace' => 'Api\V1\Jenis', 'prefix' => 'api/v1'], function () {
    // Jenis resource
    Route::resource('apbdes-jenis', 'JenisController');
});

Route::group(['namespace' => 'Api\V1\Kelompok', 'prefix' => 'api/v1'], function () {
    // Kelompok resource
    Route::resource('apbdes-kelompok', 'KelompokController');
});

Route::group(['namespace' => 'Api\V1\Obyek', 'prefix' => 'api/v1'], function () {
    // Obyek resource
    Route::resource('apbdes-obyek', 'ObyekController');
});

Route::group(['namespace' => 'Api\V1\Bidang', 'prefix' => 'api/v1'], function () {
    // Bidang resource
    Route::resource('kewenangan-bidang', 'BidangController');
});

Route::group(['namespace' => 'Api\V1\Kegiatan', 'prefix' => 'api/v1'], function () {
    // Kegiatan resource
    Route::resource('kewenangan-kegiatan', 'KegiatanController');
});

Route::group(['namespace' => 'Api\V1\Kewenangan', 'prefix' => 'api/v1'], function () {
    // Kewenangan resource
    Route::resource('kewenangan', 'KewenanganController');
});

Route::group(['namespace' => 'Api\V1\Program', 'prefix' => 'api/v1'], function () {
    // Program resource
    Route::resource('kewenangan-program', 'ProgramController');
});

Route::group(['namespace' => 'Api\V1\RPJMDES', 'prefix' => 'api/v1'], function () {
    // RPJMDES resource
    Route::resource('rpjmdes', 'RpjmdesController');
});

Route::group(['namespace' => 'Api\V1\RPJMDES_Program', 'prefix' => 'api/v1'], function () {
    // RPJMDES Misi resource
    Route::resource('rpjmdes-program', 'RpjmdesProgramController');
});

Route::group(['namespace' => 'Api\V1\RPJMDES_Misi', 'prefix' => 'api/v1'], function () {
    // RPJMDES Misi resource
    Route::resource('rpjmdes-misi', 'RpjmdesMisiController');
});

#Handle Namespace Standar Satuan Harga
Route::group(['namespace' => 'Api\V1\StandarSatuanHarga', 'prefix' => 'api/v1'], function () {
    // Standar Satuan Harga resource
    Route::resource('standar-satuan-harga', 'StandarSatuanHargaController');

    // Get list satuan harga using on modal accessing by frontoffice
    Route::get('get-modal-standar-satuan-harga', 'StandarSatuanHargaController@getListSatuanHarga');
});

#Handle Namespace Pejabat Desa
Route::group(['namespace' => 'Api\V1\PejabatDesa', 'prefix' => 'api/v1'], function () {
    // Rkpdes resource
    Route::resource('pejabat-desa', 'PejabatDesaController');

    // using by detil organisasi
    Route::get('list-pejabat-desa/{organisasi_id}', 'PejabatDesaController@listPejabatDesa');

    // using rpjmdes_program and rkpdes_program
    Route::get('get-list-pejabat-desa', 'PejabatDesaController@getListPejabatDesa');
});

Route::group(['namespace' => 'Api\V1\Transaksi_Pendapatan', 'prefix' => 'api/v1'], function () {
    // Transaksi Pendapatan resource
    Route::resource('transaksi-pendapatan', 'TransaksiPendapatanController');
});

Route::group(['namespace' => 'Api\V1\SumberDana', 'prefix' => 'api/v1'], function () {
    // Sumber Dana resource
    Route::resource('sumber-dana', 'SumberDanaController');
});

#Handle Namespace Transaksi Pendapatan
Route::group(['namespace' => 'Api\V1\Pendapatan', 'prefix' => 'api/v1'], function () {
    // Pendapatan resource
    Route::resource('pendapatan', 'PendapatanController');

    //get by organisasi id
    Route::get('get-transaksi-pendapatan-desa/{organisasi_id}', 'PendapatanController@getTransaksiPendapatanByDesa');

    Route::get('get-chart-by-organisasi-id', 'PendapatanController@getChartByOrganisasiId');
    Route::get('get-chart', 'PendapatanController@getChart');
});

#Handle Namespace Transaksi Belanja
Route::group(['namespace' => 'Api\V1\Belanja', 'prefix' => 'api/v1'], function () {
    // Belanja resource
    Route::resource('belanja', 'BelanjaController');

    //get by organisasi id
    Route::get('get-transaksi-belanja-desa/{organisasi_id}', 'BelanjaController@getTransaksiBelanjaByDesa');

    Route::get('get-chart-by-organisasi-id', 'BelanjaController@getChartByOrganisasiId');
    Route::get('get-chart', 'BelanjaController@getChart');
});

#Handle Namespace RKPDES
Route::group(['namespace' => 'Api\V1\RKPDES', 'prefix' => 'api/v1'], function () {
    // Rkpdes resource
    Route::resource('rkpdes', 'RkpdesController');
    Route::get('get-rkpdes/{program_rpjmdes_id}', 'RkpdesController@getByProgram');

    //Dropdown ajax RKPDes
    Route::get('get-list-rkpdes', 'RkpdesController@getListRkpdes');

    // get by organisasi id
    Route::get('get-rkpdes-desa/{organisasi_id}', 'RkpdesController@getRkpdesByDesa');

    Route::get('find-by-rpjmdes-program/{rpjmdes_program_id}', 'RkpdesController@findByRpjmdesProgram');
});

#Handle Namespace dana desa
Route::group(['namespace' => 'Api\V1\DanaDesa', 'prefix' => 'api/v1'], function () {
    // Dana Desa resource
    Route::resource('dana-desa', 'DanaDesaController');

    // resource dana desa input by frontoffice
    Route::resource('dana-desa-by-desa', 'DanaDesaByDesaController');

    // get list dana desa accessing by Backoffice
    Route::get('list-dana-desa/{organisasi_id}', 'DanaDesaController@getDanaDesa');

    // get list dana desa accessing by frontoffice
    Route::get('list-dana-desa-tersedia', 'DanaDesaController@getDanaDesaTersedia');

});


Route::group(['namespace' => 'Api\V1\Pembiayaan', 'prefix' => 'api/v1'], function () {
    // Pembiayaan resource
    Route::resource('pembiayaan', 'PembiayaanController');
});

Route::group(['namespace' => 'Api\V1\Transaksi_Belanja', 'prefix' => 'api/v1'], function () {
    // Transaksi Belanja resource
    Route::resource('transaksi-belanja', 'TransaksiBelanjaController');
});

Route::group(['namespace' => 'Api\V1\Kecamatan', 'prefix' => 'api/v1'], function () {
    // Dana Desa resource
    Route::resource('kecamatan', 'KecamatanController');
});

Route::group(['namespace' => 'Api\V1\LokasiProgram', 'prefix' => 'api/v1'], function () {
    // Dana Desa resource
    Route::resource('lokasi-program', 'LokasiProgramController');
});

Route::group(['namespace' => 'Auth', 'prefix' => 'api/v1/auth'], function () {
    // Post login
    Route::post('post-login', 'AuthController@postLogin');
});

Route::group(['namespace' => 'Api\V1\Ajax', 'prefix' => 'api/v1'], function () {
    // Akun
    Route::get('get-list-akun', 'AjaxAkunController@getList');

    // Dana desa
    Route::get('get-list-dana-desa-tersedia', 'AjaxDanaDesaController@getListDanaDesa');

    // Dropdown ajax kewenangan
    Route::get('get-list-kewenangan', 'AjaxKewenanganController@getListKewenangan');

    // Dropdown ajax kewenangan bidang
    Route::get('get-list-bidang/{kewenangan_id}', 'AjaxKewenanganController@getListBidang');

    // Dropdown ajax kewenangan bidang no parameter
    Route::get('list-bidang', 'AjaxKewenanganController@ListBidang');

    // Dropdown ajax kewenangan kegiatan
    Route::get('get-list-kegiatan/{program_id}', 'AjaxKewenanganController@getListKegiatan');

    // Dropdown ajax kewenangan program
    Route::get('get-list-program/{bidang_id}', 'AjaxKewenanganController@getListProgram');

    // Dropdown ajax kewenangan program accessing by desa
    Route::get('get-list-program-desa/{bidang_id}', 'AjaxKewenanganController@getListProgramDesa');


    // Kecamatan
    Route::get('get-list-kecamatan', 'AjaxKecamatanController@getList');

    // Organisasi
    Route::get('get-list-organisasi', 'AjaxOrganisasiController@getList');

    //Rpjmdes
    Route::get('get-list-visi', 'AjaxRpjmdesController@getListByOrganisasi');

    //Standar Satuan Harga
    Route::get('get-list-standar-satuan-harga', 'AjaxStandarSatuanHargaController@getList');

    //Sumber Dana
    Route::get('get-list-sumber-dana', 'AjaxSumberDanaController@getList');

    //Transaksi
    Route::get('get-list-pendapatan', 'AjaxTransaksiController@getListPendapatan');
    Route::get('get-list-belanja', 'AjaxTransaksiController@getListBelanja');

});

Route::group(['namespace' => 'Api\V1\Ajax', 'prefix' => 'api/v1/backoffice/dashboard'], function () {
    // Get jumlah Program DPA (Pendapatan, Belanja dan Pembiayaan
    Route::get('get-jumlah-dokumen', 'AjaxDashboardController@getJumlah');

    Route::get('get-jumlah-dokumen-frontoffice', 'AjaxDashboardController@getJumlahFrontOffice');
});

Route::get('get-token', 'TokenController@index');