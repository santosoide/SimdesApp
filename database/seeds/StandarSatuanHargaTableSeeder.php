<?php

class StandarSatuanHargaTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        // tuncate record
        DB::table('standar_satuan_harga')->truncate();

        $hargas = [
            [
                'kode_rekening' => '12.01.01.01.01',
                'barang'        => 'Pensil',
                'spesifikasi'   => 'Kayu',
                'satuan'        => 'Dos',
                'harga'         => '32500',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kode_rekening' => '12.01.01.01.02',
                'barang'        => 'Ballpoin Pen',
                'spesifikasi'   => 'Plastik',
                'satuan'        => 'Lusin',
                'harga'         => '175600',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kode_rekening' => '12.01.01.01.03',
                'barang'        => 'Carbon',
                'spesifikasi'   => 'Kertas',
                'satuan'        => 'Pcs',
                'harga'         => '52600',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'kode_rekening' => '12.01.01.01.04',
                'barang'        => 'Stame Rack',
                'spesifikasi'   => 'File Manager',
                'satuan'        => 'Pcs',
                'harga'         => '16900',
                'created_at'    => \Carbon\Carbon::now()
            ]
        ];

        // insert batch
        DB::table('standar_satuan_harga')->insert($hargas);
    }
} 