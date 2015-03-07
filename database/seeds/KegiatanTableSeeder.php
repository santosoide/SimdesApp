<?php

class KegiatanTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        // truncate record
        DB::table('kegiatan')->truncate();

        $kegiatans = [
            [
                'program_id'    => 1,
                'kode_rekening' => '1.1.01.00.01',
                'kegiatan'      => 'Penyediaan jasa surat menyurat',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 1,
                'kode_rekening' => '1.1.01.00.02',
                'kegiatan'      => 'Penyediaan jasa komunikasi, sumber daya air dan listrik',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 1,
                'kode_rekening' => '1.1.01.00.03',
                'kegiatan'      => 'Penyediaan jasa peralatan dan perlengkapan kantor',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 1,
                'kode_rekening' => '1.1.01.00.04',
                'kegiatan'      => 'Penyediaan jasa jaminan pemeliharaan kesehatan Aparatur Desa',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 1,
                'kode_rekening' => '1.1.01.00.05',
                'kegiatan'      => 'Penyediaan jasa jaminan barang milik daerah',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 1,
                'kode_rekening' => '1.1.01.00.06',
                'kegiatan'      => 'Penyediaan jasa pemeliharaan dan perizinan kendaraan dinas/operasional',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 1,
                'kode_rekening' => '1.1.01.00.07',
                'kegiatan'      => 'Penyediaan jasa administrasi keuangan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 1,
                'kode_rekening' => '1.1.01.00.08',
                'kegiatan'      => 'Penyediaan jasa kebersihan kantor',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 1,
                'kode_rekening' => '1.1.01.00.09',
                'kegiatan'      => 'Penyediaan jasa perbaikan peralatan kerja',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 1,
                'kode_rekening' => '1.1.01.00.10',
                'kegiatan'      => 'Penyediaan alat tulis kantor',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 1,
                'kode_rekening' => '1.1.01.00.11',
                'kegiatan'      => 'Penyediaan barang cetakan dan penggandaan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 1,
                'kode_rekening' => '1.1.01.00.12',
                'kegiatan'      => 'Penyediaan komponen instalasi listrik/penerangan bangunan kantor',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 1,
                'kode_rekening' => '1.1.01.00.13',
                'kegiatan'      => 'Penyediaan peralatan dan perlengkapan kantor',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 1,
                'kode_rekening' => '1.1.01.00.14',
                'kegiatan'      => 'Penyediaan peralatan rumah tangga',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 1,
                'kode_rekening' => '1.1.01.00.15',
                'kegiatan'      => 'Penyediaan bahan bacaan dan peraturan perundang-undangan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 1,
                'kode_rekening' => '1.1.01.00.16',
                'kegiatan'      => 'Penyediaan bahan logistik kantor',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 1,
                'kode_rekening' => '1.1.01.00.17',
                'kegiatan'      => 'Penyediaan makanan dan minuman',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 1,
                'kode_rekening' => '1.1.01.00.18',
                'kegiatan'      => 'Rapat-rapat kordinasi dan konsultasi ke luar daerah',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 1,
                'kode_rekening' => '1.1.01.00.19',
                'kegiatan'      => 'Kegiatan Dst…..',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.01',
                'kegiatan'      => 'Pembangunan rumah jabatan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.02',
                'kegiatan'      => 'Pembangunan rumah dinas',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.03',
                'kegiatan'      => 'Pembangunan gedung kantor',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.04',
                'kegiatan'      => 'Pengadaan mobil jabatan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.05',
                'kegiatan'      => 'Pengadaan kendaraan dinas/operasional',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.06',
                'kegiatan'      => 'Pengadaan perlengkapan rumah jabtan/dinas',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.07',
                'kegiatan'      => 'Pengadaan perlengkapan gedung kantor',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.08',
                'kegiatan'      => 'Pengadaan peralatan rumah jabatan/dinas',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.09',
                'kegiatan'      => 'Pengadaan peralatan gedung kantor',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.10',
                'kegiatan'      => 'Pengadaan mebeleur',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.11',
                'kegiatan'      => 'Pengadaan ……………….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.12',
                'kegiatan'      => 's/d',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.13',
                'kegiatan'      => 'dst………….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.14',
                'kegiatan'      => 'Pemeliharaan rutin/berkala rumah jabatan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.15',
                'kegiatan'      => 'Pemeliharaan rutin/berkala rumah dinas',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.16',
                'kegiatan'      => 'Pemeliharaan rutin/berkala gedung kantor',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.17',
                'kegiatan'      => 'Pemeliharaan rutin/berkala mobil jabatan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.18',
                'kegiatan'      => 'Pemeliharaan rutin/berkala kendaraan dinas/operasional',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.19',
                'kegiatan'      => 'Pemeliharaan rutin/berkala perlengkapan rumah jabatan/dinas',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.20',
                'kegiatan'      => 'Pemeliharaan rutin/berkala perlengkapan gedung kantor',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.21',
                'kegiatan'      => 'Pemeliharaan rutin/berkala peralatan rumah jabatan/dinas',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.22',
                'kegiatan'      => 'Pemeliharaan rutin/berkala peralatan gedung kantor',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.23',
                'kegiatan'      => 'Pemeliharaan rutin/berkala mebeleur',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.24',
                'kegiatan'      => 'Pemeliharaan rutin/berkala ……………….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.25',
                'kegiatan'      => 's/d',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.26',
                'kegiatan'      => 'dst………….',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.27',
                'kegiatan'      => 'Rehabilitasi sedang/berat rumah jabatan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.28',
                'kegiatan'      => 'Rehabilitasi sedang/berat rumah dinas',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.29',
                'kegiatan'      => 'Rehabilitasi sedang/berat rumah gedung kantor',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.30',
                'kegiatan'      => 'Rehabilitasi sedang/berat mobil jabatan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.31',
                'kegiatan'      => 'Rehabilitasi sedang/berat kendaraan dinas/operasional',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 2,
                'kode_rekening' => '1.01.00.02.32',
                'kegiatan'      => 'Kegiatan Dst…..',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 3,
                'kode_rekening' => '1.01.00.03.01',
                'kegiatan'      => 'Pengadaan mesin/kartu absensi',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 3,
                'kode_rekening' => '1.01.00.03.02',
                'kegiatan'      => 'Pengadaan pakaian dinas beserta perlengkapannya',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 3,
                'kode_rekening' => '1.01.00.03.03',
                'kegiatan'      => 'Pengadaan pakaian kerja lapangan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 3,
                'kode_rekening' => '1.01.00.03.04',
                'kegiatan'      => 'Pengadaan pakaian APDESI',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 3,
                'kode_rekening' => '1.01.00.03.05',
                'kegiatan'      => 'Pengadaan pakaian khusus hari-hari tertentu',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 3,
                'kode_rekening' => '1.01.00.03.06',
                'kegiatan'      => 'Kegiatan Dst…..',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 4,
                'kode_rekening' => '1.01.00.04.01',
                'kegiatan'      => 'Pemulangan pegawai yang pensiun',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 4,
                'kode_rekening' => '1.01.00.04.02',
                'kegiatan'      => 'Pemulangan pegawai yang tewas dalam melaksanakan tugas',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 4,
                'kode_rekening' => '1.01.00.04.03',
                'kegiatan'      => 'Kegiatan Dst…..',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 5,
                'kode_rekening' => '1.01.00.05.01',
                'kegiatan'      => 'Pendidikan dan pelatihan formal',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 5,
                'kode_rekening' => '1.01.00.05.02',
                'kegiatan'      => 'Sosialisasi peraturan perundang-undangan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 5,
                'kode_rekening' => '1.01.00.05.03',
                'kegiatan'      => 'Bimbingan teknis implementasi peraturan perundang-undangan',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 5,
                'kode_rekening' => '1.01.00.05.04',
                'kegiatan'      => 'Kegiatan Dst…..',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 6,
                'kode_rekening' => '1.01.00.06.01',
                'kegiatan'      => 'Penyusunan laporan capaian kinerja dan ikhtisar realisasi kinerja SKPD',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 6,
                'kode_rekening' => '1.01.00.06.02',
                'kegiatan'      => 'Penyusunan laporan keuangan semesteran',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 6,
                'kode_rekening' => '1.01.00.06.03',
                'kegiatan'      => 'Penyusunan pelaporan prognosis realisasi anggaran',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 6,
                'kode_rekening' => '1.01.00.06.04',
                'kegiatan'      => 'Penyusunan pelaporan keuangan akhir tahun',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 6,
                'kode_rekening' => '1.01.00.06.05',
                'kegiatan'      => 'Kegiatan Dst…..',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 7,
                'kode_rekening' => '1.01.00.06.15',
                'kegiatan'      => 'Kegiatan Dst…..',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 8,
                'kode_rekening' => '1.01.00.06.16',
                'kegiatan'      => 'Kegiatan Dst…..',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 9,
                'kode_rekening' => '1.01.00.06.17',
                'kegiatan'      => 'Kegiatan Dst…..',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 10,
                'kode_rekening' => '1.01.00.06.18',
                'kegiatan'      => 'Kegiatan Dst…..',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 11,
                'kode_rekening' => '1.01.00.06.19',
                'kegiatan'      => 'Kegiatan Dst…..',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'program_id'    => 12,
                'kode_rekening' => '1.01.00.06.20',
                'kegiatan'      => 'Kegiatan Dst…..',
                'created_at'    => \Carbon\Carbon::now()
            ],

        ];

        // insert batch
        DB::table('kegiatan')->insert($kegiatans);
    }
} 