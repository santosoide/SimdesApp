<?php

class DatabaseSeeder extends \Illuminate\Database\Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //user
//        $this->call('UsersTableSeeder');
//        // user desa
        $this->call('UsersDesaTableSeeder');
        // organisasi
        $this->call('OrganisasiTableSeeder');
        // akun
        $this->call('AkunTableSeeder');
        // kelompok
        $this->call('KelompokTableSeeder');
        // jenis
        $this->call('JenisTableSeeder');
        // Obyek
        $this->call('ObyekTableSeeder');
        // Kewenangan
        $this->call('KewenanganTableSeeder');
        // Bidang
        $this->call('BidangTableSeeder');
        // Program
        $this->call('ProgramTableSeeder');
        // Kegiatan
        $this->call('KegiatanTableSeeder');
        // SumberDana
        $this->call('SumberDanaTableSeeder');
        // Stanadar Satuan harga
        $this->call('StandarSatuanHargaTableSeeder');
        // RPJMDES
        $this->call('RPJMDESTableSeeder');
        // RPJMDES Misi
        $this->call('MisiTableSeeder');
        // Dana Desa
        $this->call('DanaDesaTableSeeder');
        // Kecamatan
        $this->call('KecamatanTableSeeder');
        // Pejabat Desa
        $this->call('PejabatDesaTableSeeder');
    }
}
