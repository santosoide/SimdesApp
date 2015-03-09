<?php

class SumberDanaTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        // truncate record
        DB::table('sumber_dana')->truncate();

        $danas = [
            ['sumber_dana' => 'Pendapatan Asli Desa (PADesa)', 'created_at' => \Carbon\Carbon::now()],
            ['sumber_dana' => 'Alokasi APBN', 'created_at' => \Carbon\Carbon::now()],
            ['sumber_dana' => 'Bagi Hasil Pajak dan Retribusi Daerah', 'created_at' => \Carbon\Carbon::now()],
            ['sumber_dana' => 'Perimbangan', 'created_at' => \Carbon\Carbon::now()],
            ['sumber_dana' => 'Bantuan Keuangan', 'created_at' => \Carbon\Carbon::now()],
            ['sumber_dana' => 'Bantuan lain - lain', 'created_at' => \Carbon\Carbon::now()],
        ];

        // insert batch
        DB::table('sumber_dana')->insert($danas);
    }
} 