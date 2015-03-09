<?php

class ProgramTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        DB::table('program')->truncate();

        $programs = [
            [
                'bidang_id'     => 1,
                'kode_rekening' => '1.01.00.01',
                'program'       => 'Program Pelayanan Administrasi Perkantoran',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'bidang_id'     => 1,
                'kode_rekening' => '1.01.00.02',
                'program'       => 'Program peningkatan sarana dan prasarana aparatur',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'bidang_id'     => 1,
                'kode_rekening' => '1.01.00.03',
                'program'       => 'Program peningkatan disiplin aparatur',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'bidang_id'     => 1,
                'kode_rekening' => '1.01.00.04',
                'program'       => 'Program fasilitas pindah/purna tugas Perangkat Desa',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'bidang_id'     => 1,
                'kode_rekening' => '1.01.00.05',
                'program'       => 'Program peningkatan kapasitas sumber daya aparatur',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'bidang_id'     => 1,
                'kode_rekening' => '1.01.00.06',
                'program'       => 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'bidang_id'     => 1,
                'kode_rekening' => '1.01.00.07',
                'program'       => 'Program dst……….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'bidang_id'     => 1,
                'kode_rekening' => '1.01.00.08',
                'program'       => 'Program dst……….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'bidang_id'     => 1,
                'kode_rekening' => '1.01.00.09',
                'program'       => 'Program dst……….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'bidang_id'     => 1,
                'kode_rekening' => '1.01.00.10',
                'program'       => 'Program dst……….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'bidang_id'     => 1,
                'kode_rekening' => '1.01.00.11',
                'program'       => 'Program dst……….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'bidang_id'     => 1,
                'kode_rekening' => '1.01.00.12',
                'program'       => 'Program dst……….',
                'created_at'    => \Carbon\Carbon::now()
            ],


        ];

        // insert batch
        DB::table('program')->insert($programs);
    }
} 