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

Route::get('home', 'HomeController@index');

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

Route::group(['namespace' => 'Api\V1\Akun', 'prefix' => 'api/v1/backoffice'], function () {
    // User resource
    Route::resource('akun', 'AkunController');
});

Route::group(['namespace' => 'Api\V1\Jenis', 'prefix' => 'api/v1/backoffice'], function () {
    // Akun resource
    Route::resource('jenis', 'JenisController');
});

Route::group(['namespace' => 'Api\V1\Kelompok', 'prefix' => 'api/v1/backoffice'], function () {
    // Akun resource
    Route::resource('kelompok', 'KelompokController');
});

Route::group(['namespace' => 'Api\V1\Obyek', 'prefix' => 'api/v1/backoffice'], function () {
    // Akun resource
    Route::resource('obyek', 'ObyekController');
});

Route::group(['namespace' => 'Api\V1\Bidang', 'prefix' => 'api/v1/backoffice'], function () {
    // Akun resource
    Route::resource('bidang', 'BidangController');
});

Route::group(['namespace' => 'Api\V1\Kegiatan', 'prefix' => 'api/v1/backoffice'], function () {
    // Akun resource
    Route::resource('kegiatan', 'KegiatanController');
});

Route::group(['namespace' => 'Api\V1\Kewenangan', 'prefix' => 'api/v1/backoffice'], function () {
    // Akun resource
    Route::resource('kewenangan', 'KewenanganController');
});

Route::group(['namespace' => 'Api\V1\Program', 'prefix' => 'api/v1/backoffice'], function () {
    // Akun resource
    Route::resource('program', 'ProgramController');
});

Route::group(['namespace' => 'Api\V1\RPJMDES', 'prefix' => 'api/v1/backoffice'], function () {
    // Akun resource
    Route::resource('rpjmdes', 'RpjmdesController');
});

Route::group(['namespace' => 'Api\V1\RPJMDES_Misi', 'prefix' => 'api/v1/backoffice'], function () {
    // Akun resource
    Route::resource('rpjmdes-misi', 'RpjmdesMisiController');
});

Route::group(['namespace' => 'Api\V1\StandarSatuanHarga', 'prefix' => 'api/v1/backoffice'], function () {
    // Akun resource
    Route::resource('standar-satuan-harga', 'StandarSatuanHargaController');
});

Route::group(['namespace' => 'Api\V1\Pendapatan', 'prefix' => 'api/v1'], function () {
    // Pendapatan resource
    Route::resource('pendapatan', 'PendapatanController');
});

Route::get('get-token', function(){
   return csrf_token();
});