<?php

class JenisTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        // truncate record
        DB::table('jenis')->truncate();

        $jenis = [
            [
                'kelompok_id'   => '1',
                'kode_rekening' => '1.1.1',
                'jenis'         => 'Hasil Usaha Desa',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '1',
                'kode_rekening' => '1.1.2',
                'jenis'         => 'Hasil Pengelolaan Kekayaan Desa',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '1',
                'kode_rekening' => '1.1.3',
                'jenis'         => 'Hasil Swadaya dan Partisipasi',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '1',
                'kode_rekening' => '1.1.4',
                'jenis'         => 'Hasil Gotong Royong',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '1',
                'kode_rekening' => '1.1.5',
                'jenis'         => 'Lain Lain Pendapatan Asli Desa yang Sah',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '2',
                'kode_rekening' => '1.2.1',
                'jenis'         => 'Bagi Hasil Pajak Kabupaten/Kota',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '2',
                'kode_rekening' => '1.2.2',
                'jenis'         => 'Bagi Hasil PBB',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '2',
                'kode_rekening' => '1.2.3',
                'jenis'         => 'Dst…..',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '3',
                'kode_rekening' => '1.3.1',
                'jenis'         => 'Dst…..',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '4',
                'kode_rekening' => '1.4.1',
                'jenis'         => 'ADD',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '4',
                'kode_rekening' => '1.4.2',
                'jenis'         => 'Dst…..',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '5',
                'kode_rekening' => '1.5.1',
                'jenis'         => 'Bantuan Keuangan Pemerintah',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '5',
                'kode_rekening' => '1.5.2',
                'jenis'         => 'Bantuan Keuangan Pemerintah Provinsi',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '5',
                'kode_rekening' => '1.5.3',
                'jenis'         => 'Bantuan Keuangan Pemerintah Kabupaten/Kota',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '5',
                'kode_rekening' => '1.5.4',
                'jenis'         => 'Bantuan Keuangan Desa Lainnya',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '6',
                'kode_rekening' => '1.6.1',
                'jenis'         => 'Hibah dari Pemerintah',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '6',
                'kode_rekening' => '1.6.2',
                'jenis'         => 'Hibah dari Pemerintah Provinsi',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '6',
                'kode_rekening' => '1.6.3',
                'jenis'         => 'Hibah dari Pemerintah Kabupaten/Kota',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '6',
                'kode_rekening' => '1.6.4',
                'jenis'         => 'Hibah dari Badan/Lembaga/Organisasi Swasta',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '6',
                'kode_rekening' => '1.6.5',
                'jenis'         => 'Hibah dari Kelompok Masyarakat/Perorangan',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '6',
                'kode_rekening' => '1.6.6',
                'jenis'         => 'Dst…..',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '7',
                'kode_rekening' => '1.7.1',
                'jenis'         => 'Sumbangan dari ….',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '7',
                'kode_rekening' => '1.7.2',
                'jenis'         => 'Dst…..',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '8',
                'kode_rekening' => '2.1.1',
                'jenis'         => 'Belanja Pegawai/Honorarium',
                'Status'        => 'Debet',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '8',
                'kode_rekening' => '2.1.2',
                'jenis'         => 'Belanja Barang/Jasa',
                'Status'        => 'Debet',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '8',
                'kode_rekening' => '2.1.3',
                'jenis'         => 'Belanja Modal',
                'Status'        => 'Debet',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '9',
                'kode_rekening' => '2.2.1',
                'jenis'         => 'Belanja Pegawai/Penghasilan Tetap',
                'Status'        => 'Debet',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '9',
                'kode_rekening' => '2.2.3',
                'jenis'         => 'Belanja Hibah',
                'Status'        => 'Debet',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '9',
                'kode_rekening' => '2.2.4',
                'jenis'         => 'Belanja Bantuan Sosial',
                'Status'        => 'Debet',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '9',
                'kode_rekening' => '2.2.5',
                'jenis'         => 'Belanja Bantuan Keuangan',
                'Status'        => 'Debet',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '9',
                'kode_rekening' => '2.2.6',
                'jenis'         => 'Belanja Tak Terduga',
                'Status'        => 'Debet',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '10',
                'kode_rekening' => '3.1.1',
                'jenis'         => 'Sisa Lebih Perhitungan Anggaran (SILPA) Tahun Sebelumnya',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '10',
                'kode_rekening' => '3.1.2',
                'jenis'         => 'Hasil Penjualan Kekayaan Desa Yang Dipisahkan',
                'Status'        => 'Kredit',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '10',
                'kode_rekening' => '3.1.3',
                'jenis'         => 'Penerimaan Pinjaman',
                'Status'        => 'Debet',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '11',
                'kode_rekening' => '3.2.1',
                'jenis'         => 'Pembentukan Dana Cadangan',
                'Status'        => 'Debet',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '11',
                'kode_rekening' => '3.2.2',
                'jenis'         => 'Penyertaan Modal Desa',
                'Status'        => 'Debet',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kelompok_id'   => '11',
                'kode_rekening' => '3.2.3',
                'jenis'         => 'Pembayaran Utang',
                'Status'        => 'Debet',
                'created_at'    => \Carbon\Carbon::now()
            ],


        ];

        // insert batch
        DB::table('jenis')->insert($jenis);
    }
} 