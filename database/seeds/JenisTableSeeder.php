<?php

class JenisTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        // truncate record
        DB::table('jenis')->truncate();

        $jenis = [
            [
                '_id'           => 'f9e66a2f-733a-41f5-9457-d348219ef74e',
                'kode_rekening' => '1.1.1',
                'kelompok_id'   => 1,
                'jenis'         => 'Hasil Usaha Desa',
                'status'        => 'Debet',
                'created_at'    => \Carbon\Carbon::now()

            ],
            [
                '_id'           => '4eedba0a-3375-4418-b018-906e6247fa4b',
                'kode_rekening' => '1.1.2',
                'kelompok_id'   => 1,
                'jenis'         => 'Hasil Usaha Desa',
                'status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                '_id'           => '44e3889c-0074-49cf-b277-20fe5a5f0644',
                'kode_rekening' => '1.1.3',
                'kelompok_id'   => 1,
                'jenis'         => 'Hasil Usaha Desa',
                'status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ]
        ];

        // insert batch
        DB::table('jenis')->insert($jenis);
    }
} 