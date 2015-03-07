<?php

class BidangTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        // truncate record
        DB::table('bidang')->truncate();

        $bidangs = [
            [
                'kewenangan_id' => 1,
                'kode_rekening' => '1.01.00',
                'bidang'        => 'Pemerintah Desa',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 1,
                'kode_rekening' => '1.01.01',
                'bidang'        => 'Pemerintahan Desa',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 2,
                'kode_rekening' => '1.02.02',
                'bidang'        => 'Pembangunan Desa',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 3,
                'kode_rekening' => '1.03.03',
                'bidang'        => 'Kemasyarakatan Desa',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 4,
                'kode_rekening' => '1.04.04',
                'bidang'        => 'Pemberdayaan Masyarakat Desa',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 5,
                'kode_rekening' => '1.05.05',
                'bidang'        => 'Kewenangan Desa Lainnya',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 6,
                'kode_rekening' => '1.06.01',
                'bidang'        => 'Hak Asal Usul Desa',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 7,
                'kode_rekening' => '1.07.01',
                'bidang'        => 'Lokal Berskala Desa',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 8,
                'kode_rekening' => '2.01.01',
                'bidang'        => 'Lokal Berskala Desa Adat',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.01',
                'bidang'        => 'Pendidikan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.02',
                'bidang'        => 'Kesehatan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.03',
                'bidang'        => 'Pekerjaan Umum',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.04',
                'bidang'        => 'Perumahan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.05',
                'bidang'        => 'Penataan Ruang',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.06',
                'bidang'        => 'Perencanaan Pembangunan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.07',
                'bidang'        => 'Perhubungan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.08',
                'bidang'        => 'Lingkungan Hidup',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.09',
                'bidang'        => 'Pertanaan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.10',
                'bidang'        => 'Kependudukan dan Catatan Sipil',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.11',
                'bidang'        => 'Pemberdayaan Perempuan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.12',
                'bidang'        => 'Keluarga Berencana dan Keluarga Sejahtera',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.13',
                'bidang'        => 'Sosial',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.14',
                'bidang'        => 'Tenaga Kerja',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.15',
                'bidang'        => 'Koperasi Usaha Kecil dan Menengah',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.16',
                'bidang'        => 'Penanaman Modal Daerah',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.17',
                'bidang'        => 'Kebudayaan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.18',
                'bidang'        => 'Pemuda dan Olahraga',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.19',
                'bidang'        => 'Kesatuan Bangsa dan Politik Dalam Negeri',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.20',
                'bidang'        => 'Pemerintahan Umum',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.21',
                'bidang'        => 'Pemberdayaan Masyarakat dan Desa',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.22',
                'bidang'        => 'Statistik',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.23',
                'bidang'        => 'Kearsipan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 9,
                'kode_rekening' => '3.1.24',
                'bidang'        => 'Komunikasi dan Informatika',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 10,
                'kode_rekening' => '3.2.01',
                'bidang'        => 'Pertanian',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 10,
                'kode_rekening' => '3.2.02',
                'bidang'        => 'Kehutanan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 10,
                'kode_rekening' => '3.2.03',
                'bidang'        => 'Energi dan Sumberdaya Mineral',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 10,
                'kode_rekening' => '3.2.04',
                'bidang'        => 'Pariwisata',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 10,
                'kode_rekening' => '3.2.05',
                'bidang'        => 'Kelautan dan Perikanan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 10,
                'kode_rekening' => '3.2.06',
                'bidang'        => 'Perdagangan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 10,
                'kode_rekening' => '3.2.07',
                'bidang'        => 'Perindustrian',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 10,
                'kode_rekening' => '3.2.08',
                'bidang'        => 'Transmigrasi',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kewenangan_id' => 11,
                'kode_rekening' => '4.01.01',
                'bidang'        => 'Tugas Pembantuan Lainnya',
                'created_at'    => \Carbon\Carbon::now()
            ],


        ];

        // insert batch
        DB::table('bidang')->insert($bidangs);
    }
} 