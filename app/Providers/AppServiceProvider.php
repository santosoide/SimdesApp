<?php namespace SimdesApp\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Illuminate\Contracts\Auth\Registrar',
            'SimdesApp\Services\Registrar'
        );
        // bind Akun
        $this->app->bind(
            'SimdesApp\Repositories\Contracts\AkunInterface',
            'SimdesApp\Repositories\Akun\AkunRepository'
        );
        // bind Kelompok
        $this->app->bind(
            'SimdesApp\Repositories\Contracts\KelompokInterface',
            'SimdesApp\Repositories\Kelompok\KelompokRepository'
        );
        // bind Kegiatan
        $this->app->bind(
            'SimdesApp\Repositories\Contracts\KegiatanInterface',
            'SimdesApp\Repositories\Kegiatan\KegiatanRepository'
        );
        // bind Jenis
        $this->app->bind(
            'SimdesApp\Repositories\Contracts\JenisInterface',
            'SimdesApp\Repositories\Jenis\JenisRepository'
        );
        // bind Obyek
        $this->app->bind(
            'SimdesApp\Repositories\Contracts\ObyekInterface',
            'SimdesApp\Repositories\Obyek\ObyekRepository'
        );
        // bind Belanja
        $this->app->bind(
            'SimdesApp\Repositories\Contracts\BelanjaInterface',
            'SimdesApp\Repositories\Belanja\BelanjaRepository'
        );
        // bind Program
        $this->app->bind(
            'SimdesApp\Repositories\Contracts\ProgramInterface',
            'SimdesApp\Repositories\Program\ProgramRepository'
        );
        // bind Bidang
        $this->app->bind(
            'SimdesApp\Repositories\Contracts\BidangInterface',
            'SimdesApp\Repositories\Bidang\BidangRepository'
        );
        // bind Dana Desa
        $this->app->bind(
            'SimdesApp\Repositories\Contracts\DanaDesaInterface',
            'SimdesApp\Repositories\DanaDesa\DanaDesaRepository'
        );
        // bind Dana Desa By Desa
        $this->app->bind(
            'SimdesApp\Repositories\Contracts\DanaDesaByDesaInterface',
            'SimdesApp\Repositories\DanaDesa\DanaDesaByDesaRepository'
        );
        // bind User
        $this->app->bind(
            'SimdesApp\Repositories\Contracts\UserInterface',
            'SimdesApp\Repositories\User\UserRepository'
        );
        // bind Organisasi
        $this->app->bind(
            'SimdesApp\Repositories\Contracts\OrganisasiInterface',
            'SimdesApp\Repositories\Organisasi\OrganisasiRepository'
        );
        // bind Standar Satuan Harga
        $this->app->bind(
            'SimdesApp\Repositories\Contracts\StandarSatuanHargaInterface',
            'SimdesApp\Repositories\StandarSatuanHarga\StandarSatuanHargaRepository'
        );
    }
}
