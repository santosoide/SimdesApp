<?php

class RPJMDESTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        // truncate record
        DB::table('rpjmdes')->truncate();

        $rpjmdes = [
            [
                '_id'           => 'f9e66a2f-41f5-733a-9457-d348219ef74e',
                'visi'          => 'Terwujudnya Masyarakat Madani dan Berteknologi Tepat Guna',
                'user_id'       => 'bb341e8b-b625-4029-844d-e18d2bbe18f6',
                'organisasi_id' => 'f9e66a2f-733a-41f5-9457-d348219ef74e',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                '_id'           => 'bb341e8b-844d-b625-4029-e18d2bbe18f6',
                'visi'          => 'Terwujudnya Masyarakat bebas buta huruf.',
                'user_id'       => 'bb341e8b-b625-4029-844d-e18d2bbe18f6',
                'organisasi_id' => 'f9e66a2f-733a-41f5-9457-d348219ef74e',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                '_id'           => 'e18d2bbe18f6-b625-4029-844d-bb341e8b',
                'visi'          => 'Kesejahteraan Masyarakat meningkat.',
                'user_id'       => 'bb341e8b-b625-4029-844d-e18d2bbe18f6',
                'organisasi_id' => 'f9e66a2f-733a-41f5-9457-d348219ef74e',
                'created_at'    => \Carbon\Carbon::now()
            ]
        ];

        // insert batch
        DB::table('rpjmdes')->insert($rpjmdes);
    }
} 