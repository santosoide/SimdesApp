<?php

class MisiTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        // truncate record
        DB::table('rpjmdes_misi')->truncate();

        $misi = [
            [
                '_id'           => 'f9e66a2f-733a-898u-9457-d348219ef74e',
                'rpjmdes_id'    => 'f9e66a2f-41f5-733a-9457-d348219ef74e',
                'user_id'       => 'bb341e8b-b625-4029-844d-e18d2bbe18f6',
                'misi'          => 'Mewujudkan dan mengembangkan kegiatan keagamaan untuk menambah keimanan dan ketaqwaan kepada Tuhan Yang Maha Esa.',
                'organisasi_id' => 'f9e66a2f-733a-41f5-9457-d348219ef74e',
                'created_at'    => \Carbon\Carbon::now(),
            ],
            [
                '_id'           => 'f9e66a2f-733a-898u-bhj8-d348219ef74e',
                'rpjmdes_id'    => 'f9e66a2f-41f5-733a-9457-d348219ef74e',
                'user_id'       => 'bb341e8b-b625-4029-844d-e18d2bbe18f6',
                'misi'          => 'Mewujudkan dan mendorong terjadinya Toleransi antar dan intern warga masyarakat yang disebabkan karena adanya perbedaan agama, keyakinan, organisasi, dan lainnya dalam suasana saling menghargai dan menghormati.',
                'organisasi_id' => 'f9e66a2f-733a-41f5-9457-d348219ef74e',
                'created_at'    => \Carbon\Carbon::now(),
            ],
            [
                '_id'           => 'f9e66a2f-udji-89dj-wub8-d348219ef74e',
                'rpjmdes_id'    => 'f9e66a2f-41f5-733a-9457-d348219ef74e',
                'user_id'       => 'bb341e8b-b625-4029-844d-e18d2bbe18f6',
                'misi'          => 'Membangun dan meningkatkan hasil pertanian dengan jalan penataan pengairan, perbaikan jalan sawah / jalan usaha tani, pemupukan, dan polatanam yang baik .',
                'organisasi_id' => 'f9e66a2f-733a-41f5-9457-d348219ef74e',
                'created_at'    => \Carbon\Carbon::now(),
            ]
        ];

        // insert batch
        DB::table('rpjmdes_misi')->insert($misi);
    }
} 