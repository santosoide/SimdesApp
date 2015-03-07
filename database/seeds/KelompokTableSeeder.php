<?php

class KelompokTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        // truncate record
        DB::table('kelompok')->truncate();

        $kelompoks = [
            [
                'akun_id'       => '1',
                'kode_rekening' => '1.1',
                'kelompok'      => 'Pendapatan Asli Desa',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'akun_id'       => '1',
                'kode_rekening' => '1.2',
                'kelompok'      => 'Bagi Hasil Pajak',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'akun_id'       => '1',
                'kode_rekening' => '1.3',
                'kelompok'      => 'Bagi Hasil Retribusi',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'akun_id'       => '1',
                'kode_rekening' => '1.4',
                'kelompok'      => 'Bagian Dana Perimbangan Keuangan Pusat dan Daerah',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'akun_id'       => '1',
                'kode_rekening' => '1.5',
                'kelompok'      => 'Bantuan Keuangan Pemerintah Provinsi, Kabupaten/Kota, dan Desa Lainnya',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'akun_id'       => '1',
                'kode_rekening' => '1.6',
                'kelompok'      => 'Hibah',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'akun_id'       => '1',
                'kode_rekening' => '1.7',
                'kelompok'      => 'Sumbangan Pihak Ketiga',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'akun_id'       => '2',
                'kode_rekening' => '2.1',
                'kelompok'      => 'Belanja Langsung',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'akun_id'       => '2',
                'kode_rekening' => '2.2',
                'kelompok'      => 'Belanja Tidak Langsung',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'akun_id'       => '3',
                'kode_rekening' => '3.1',
                'kelompok'      => 'Penerimaan Pembiayaan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'akun_id'       => '3',
                'kode_rekening' => '3.2',
                'kelompok'      => 'Pengeluaran Pembiayaan',
                'created_at'    => \Carbon\Carbon::now()
            ],


        ];

        // insert batch
        DB::table('kelompok')->insert($kelompoks);
    }
} 