<?php

class KewenanganTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        // truncate record
        DB::table('kewenangan')->truncate();

        $kewenangans = [
            [
                'kode_rekening' => 1,
                'kewenangan'    => 'Kewenangan Desa',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kode_rekening' => 2,
                'kewenangan'    => 'Kewenangan Desa Adat',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kode_rekening' => 3,
                'kewenangan'    => 'Tugas Pembantuan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kode_rekening' => 4,
                'kewenangan'    => 'Tugas Pembantuan Lainnya',
                'created_at'    => \Carbon\Carbon::now()
            ],
        ];

        // insert batch
        DB::table('kewenangan')->insert($kewenangans);
    }
} 