<?php

class KecamatanTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        // truncate record
        DB::table('kecamatan')->truncate();

        $akuns = [
            ['kode_kec' => '01', 'kec' => 'Praya', 'created_at' => \Carbon\Carbon::now()],
            ['kode_kec' => '02', 'kec' => 'Jonggat', 'created_at' => \Carbon\Carbon::now()],
            ['kode_kec' => '03', 'kec' => 'Batukliang', 'created_at' => \Carbon\Carbon::now()],
            ['kode_kec' => '04', 'kec' => 'Pujut', 'created_at' => \Carbon\Carbon::now()],
            ['kode_kec' => '05', 'kec' => 'Praya Barat', 'created_at' => \Carbon\Carbon::now()],
            ['kode_kec' => '06', 'kec' => 'Praya Timur', 'created_at' => \Carbon\Carbon::now()],
            ['kode_kec' => '07', 'kec' => 'Janapria', 'created_at' => \Carbon\Carbon::now()],
            ['kode_kec' => '08', 'kec' => 'Pringgarata', 'created_at' => \Carbon\Carbon::now()],
            ['kode_kec' => '09', 'kec' => 'Kopang', 'created_at' => \Carbon\Carbon::now()],
            ['kode_kec' => '10', 'kec' => 'Praya Tengah', 'created_at' => \Carbon\Carbon::now()],
            ['kode_kec' => '11', 'kec' => 'Praya Barat Daya', 'created_at' => \Carbon\Carbon::now()],
            ['kode_kec' => '12', 'kec' => 'Batukliang Utara', 'created_at' => \Carbon\Carbon::now()],
        ];
        // insert batch
        DB::table('kecamatan')->insert($akuns);
    }
} 