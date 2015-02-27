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

//Route::get('home', 'HomeController@index');

Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

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

Route::group(['namespace' => 'Api\V1\StandarSatuanHarga', 'prefix' => 'api/v1'], function () {
    // Standar Satuan Harga resource
    Route::resource('standar-satuan-harga', 'StandarSatuanHargaController');
});

Route::group(['namespace' => 'Api\V1\SumberDana', 'prefix' => 'api/v1'], function () {
    // Sumber Dana resource
    Route::resource('sumber-dana', 'SumberDanaController');
});

Route::group(['namespace' => 'Api\V1\RKPDES', 'prefix' => 'api/v1'], function () {
    // Rkpdes resource
    Route::resource('rkpdes', 'RkpdesController');
});

Route::group(['namespace' => 'Api\V1\PejabatDesa', 'prefix' => 'api/v1'], function () {
    // Rkpdes resource
    Route::resource('pejabat-desa', 'PejabatDesaController');
});

Route::group(['namespace' => 'Api\V1\Pendapatan', 'prefix' => 'api/v1'], function () {
    // Pendapatan resource
    Route::resource('pendapatan', 'PendapatanController');
});

Route::group(['namespace' => 'Api\V1\Pembiayaan', 'prefix' => 'api/v1'], function () {
    // Pembiayaan resource
    Route::resource('pembiayaan', 'PembiayaanController');
});

Route::group(['namespace' => 'Api\V1\Belanja', 'prefix' => 'api/v1'], function () {
    // Belanja resource
    Route::resource('belanja', 'BelanjaController');
});

Route::group(['namespace' => 'Api\V1\Transaksi_Pendapatan', 'prefix' => 'api/v1'], function () {
    // Transaksi Pendapatan resource
    Route::resource('transaksi-pendapatan', 'TransaksiPendapatanController');
});

Route::group(['namespace' => 'Api\V1\Transaksi_Belanja', 'prefix' => 'api/v1'], function () {
    // Transaksi Belanja resource
    Route::resource('transaksi-belanja', 'TransaksiBelanjaController');
});

Route::group(['namespace' => 'Api\V1\DanaDesa', 'prefix' => 'api/v1'], function () {
    // Dana Desa resource
    Route::resource('dana-desa', 'DanaDesaController');
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
    // Organiasasi
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

Route::get('get-token', 'TokenController@index');