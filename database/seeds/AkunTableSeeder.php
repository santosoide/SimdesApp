<?php

class AkunTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        // truncate record
        DB::table('akun')->truncate();

        $akuns = [
            ['kode_rekening' => '1', 'akun' => 'Pendapatan', 'created_at' => \Carbon\Carbon::now()],
            ['kode_rekening' => '2', 'akun' => 'Belanja', 'created_at' => \Carbon\Carbon::now()],
            ['kode_rekening' => '3', 'akun' => 'Pembiayaan', 'created_at' => \Carbon\Carbon::now()]
        ];

        // insert batch
        DB::table('akun')->insert($akuns);
    }
} 