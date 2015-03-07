<?php

class ObyekTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        // truncate record
        DB::table('obyek')->truncate();

        $obyeks = [
            [
                'jenis_id'      => '1',
                'kode_rekening' => '1.1.1.1',
                'obyek'         => 'Dst….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '2',
                'kode_rekening' => '1.1.2.1',
                'obyek'         => 'Tanah Kas Desa',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '2',
                'kode_rekening' => '1.1.2.2',
                'obyek'         => 'Pasar Desa',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '2',
                'kode_rekening' => '1.1.2.3',
                'obyek'         => 'Pasar Hewan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '2',
                'kode_rekening' => '1.1.2.4',
                'obyek'         => 'Tambatan Perahu',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '2',
                'kode_rekening' => '1.1.2.5',
                'obyek'         => 'Bangunan Desa',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '2',
                'kode_rekening' => '1.1.2.6',
                'obyek'         => 'Pelelangan Ikan yang Dikelola Desa',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '2',
                'kode_rekening' => '1.1.2.7',
                'obyek'         => 'Lain-lain Kekayaan Milik Desa',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '2',
                'kode_rekening' => '1.1.2.8',
                'obyek'         => 'Dst….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '3',
                'kode_rekening' => '1.1.3.1',
                'obyek'         => 'Dst….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '4',
                'kode_rekening' => '1.1.4.1',
                'obyek'         => 'Dst….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '5',
                'kode_rekening' => '1.1.5.1',
                'obyek'         => 'Dst….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '12',
                'kode_rekening' => '1.5.1.1',
                'obyek'         => 'Dst….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '13',
                'kode_rekening' => '1.5.2.1',
                'obyek'         => 'Dst….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '14',
                'kode_rekening' => '1.5.3.1',
                'obyek'         => 'Dana Tambahan Penghasilan Tetap Kepala Desa dan Perangkat Desa',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '14',
                'kode_rekening' => '1.5.3.2',
                'obyek'         => 'Dst….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '15',
                'kode_rekening' => '1.5.4.1',
                'obyek'         => 'Dst….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '24',
                'kode_rekening' => '2.1.1.1',
                'obyek'         => 'Honor Tim/Panitia',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '24',
                'kode_rekening' => '2.1.1.2',
                'obyek'         => 'Dst….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '25',
                'kode_rekening' => '2.1.2.1',
                'obyek'         => 'Belanja Perjalanan Dinas',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '25',
                'kode_rekening' => '2.1.2.2',
                'obyek'         => 'Belanja Bahan/Material',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '25',
                'kode_rekening' => '2.1.2.3',
                'obyek'         => 'Dst….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '26',
                'kode_rekening' => '2.1.3.1',
                'obyek'         => 'Belanja Modal Tanah',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '26',
                'kode_rekening' => '2.1.3.2',
                'obyek'         => 'Belanja Modal Jaringan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '26',
                'kode_rekening' => '2.1.3.3',
                'obyek'         => 'Dst….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '27',
                'kode_rekening' => '2.2.1.1',
                'obyek'         => 'Dst….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '28',
                'kode_rekening' => '2.2.3.1',
                'obyek'         => 'Dst….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '29',
                'kode_rekening' => '2.2.4.1',
                'obyek'         => 'Pendidikan Anak Usia Dini',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '29',
                'kode_rekening' => '2.2.4.2',
                'obyek'         => 'Dst….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '30',
                'kode_rekening' => '2.2.5.1',
                'obyek'         => 'Dst….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '31',
                'kode_rekening' => '2.2.6.1',
                'obyek'         => 'Keadaan Darurat',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '31',
                'kode_rekening' => '2.2.6.2',
                'obyek'         => 'Bencana Alam',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'jenis_id'      => '31',
                'kode_rekening' => '2.2.6.3',
                'obyek'         => 'Dst….',
                'created_at'    => \Carbon\Carbon::now()
            ],


        ];

        // insert batch
        DB::table('obyek')->insert($obyeks);
    }
} 