<?php

/**
 * Created by PhpStorm.
 * User: Edi Santoso
 * Date: 29/10/2014
 * Time: 8:08
 */
class UsersTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        // truncate record
        DB::table('users')->truncate();

        $users = [
            [
                '_id'           => 'bb341e8b-b625-4039-844d-e18d2bbe18f6',
                'nama'          => 'Edi Santoso',
                'email'         => 'edi@app.dev',
                'password'      => Hash::make('password'),
                'is_active'     => '1',
                'level'         => '210',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => 'bb341e8b-b625-4029-844d-e18d2bbe18f6',
                'nama'          => 'Iwan Riwayanto',
                'email'         => 'iwan@appdev.com',
                'password'      => Hash::make('password'),
                'is_active'     => '1',
                'level'         => '1',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => 'f9e66a2f-733a-41f5-9457-d348219ef74e'
            ],
            [
                '_id'           => Webpatser\Uuid\Uuid::generate(4),
                'nama'          => 'FERO RAMDHONI, S.IP',
                'email'         => 'fero.ramdhoni@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '210',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => Webpatser\Uuid\Uuid::generate(4),
                'nama'          => 'Ir. LALU HARIS MUNANDAR',
                'email'         => 'lalu.haris.munandar@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '220',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => Webpatser\Uuid\Uuid::generate(4),
                'nama'          => 'H. MOH. SUHAILI',
                'email'         => 'mohammad.suhaili@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '230',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => Webpatser\Uuid\Uuid::generate(4),
                'nama'          => 'H. LALU NORMAL SUZANA',
                'email'         => 'lalu.normal.suzana@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '230',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => Webpatser\Uuid\Uuid::generate(4),
                'nama'          => 'Drs. H. LALU SUPARDAN, MM',
                'email'         => 'lalu.supardan@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '230',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => Webpatser\Uuid\Uuid::generate(4),
                'nama'          => 'NURSIAH, S.Sos., M.Si.',
                'email'         => 'nursiah@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '230',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => Webpatser\Uuid\Uuid::generate(4),
                'nama'          => 'Ir. LALU M. AMIN, MM',
                'email'         => 'lalu.muhammad.amin@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '230',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => Webpatser\Uuid\Uuid::generate(4),
                'nama'          => 'SUNARNO, S.Sos.',
                'email'         => 'sunarno@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '240',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => Webpatser\Uuid\Uuid::generate(4),
                'nama'          => 'TAHSIN BADRI, AP., M.Si.',
                'email'         => 'tahsin.badri@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '260',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => Webpatser\Uuid\Uuid::generate(4),
                'nama'          => 'Dr. Drs. LALU BUDIMAN, M.Si.',
                'email'         => 'lalu.budiman@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '260',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => Webpatser\Uuid\Uuid::generate(4),
                'nama'          => 'NANANG ASWANHADI, SH',
                'email'         => 'nanang.aswanhadi@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '280',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => Webpatser\Uuid\Uuid::generate(4),
                'nama'          => 'KUSNA HARIADI, SE., MM',
                'email'         => 'kusna.hariadi@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '290',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => Webpatser\Uuid\Uuid::generate(4),
                'nama'          => 'KADEK JANUARSIDI, ST',
                'email'         => 'kadek.januarsidi@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '300',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => Webpatser\Uuid\Uuid::generate(4),
                'nama'          => 'Drs. LALU RINJANI, M.Si.',
                'email'         => 'lalu.rinjani@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '260',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => Webpatser\Uuid\Uuid::generate(4),
                'nama'          => 'ANGGUN CHRISTINA',
                'email'         => 'anggun.christina@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '320',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],


        ];

        // insert batch
        DB::table('users')->insert($users);
    }
} 