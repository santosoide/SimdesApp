<?php

/**
 * Created by PhpStorm.
 * User: Edi Santoso
 * Date: 29/10/2014
 * Time: 8:08
 */
class DanaDesaTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        // truncate record
        DB::table('dana_desa')->truncate();

        $organisasis = [
            [
                '_id'               => 'f9e66a2f-1001-41f5-9457-d348219ef74e',
                'organisasi_id'     => 'f9e66a2f-733a-41f5-9457-d348219ef74e',
                'sumber_dana_id'    => '2',
                'jumlah'            => '200000000',
                'anggaran_terpakai' => '50000000',
                'sisa_anggaran'     => '150000000',
                'user_id'           => '5cc101f8-0a73-436c-2007-4425c8ed3976',
                'created_at'        => \Carbon\Carbon::now()
            ],
            [
                '_id'               => 'f9e66a2f-1002-41f5-9457-d348219ef74e',
                'organisasi_id'     => 'f9e66a2f-733a-41f5-9457-d348219ef74e',
                'sumber_dana_id'    => '3',
                'jumlah'            => '150000000',
                'anggaran_terpakai' => '50000000',
                'sisa_anggaran'     => '100000000',
                'user_id'           => '5cc101f8-0a73-436c-2007-4425c8ed3976',
                'created_at'        => \Carbon\Carbon::now()
            ],
            [
                '_id'               => 'f9e66a2f-1003-41f5-9457-d348219ef74e',
                'organisasi_id'     => 'f9e66a2f-733a-41f5-9457-d348219ef74e',
                'sumber_dana_id'    => '4',
                'jumlah'            => '100000000',
                'anggaran_terpakai' => '50000000',
                'sisa_anggaran'     => '50000000',
                'user_id'           => '5cc101f8-0a73-436c-2007-4425c8ed3976',
                'created_at'        => \Carbon\Carbon::now()
            ],
            [
                '_id'               => 'f9e66a2f-1004-41f5-9457-d348219ef74e',
                'organisasi_id'     => 'f9e66a2f-733a-41f5-9457-d348219ef74e',
                'sumber_dana_id'    => '4',
                'jumlah'            => '300000000',
                'anggaran_terpakai' => '100000000',
                'sisa_anggaran'     => '200000000',
                'user_id'           => '5cc101f8-0a73-436c-2007-4425c8ed3976',
                'created_at'        => \Carbon\Carbon::now()
            ]
        ];

        // insert batch
        DB::table('dana_desa')->insert($organisasis);
    }
} 