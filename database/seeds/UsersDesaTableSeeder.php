<?php

/**
 * Created by PhpStorm.
 * User: Edi Santoso
 * Date: 29/10/2014
 * Time: 8:08
 */
class UsersDesaTableSeeder extends \Illuminate\Database\Seeder
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
                '_id'           => 'f9636a91-8b3c-4829-8d5d-d56de4046462',
                'nama'          => 'FERO RAMDHONI, S.IP',
                'email'         => 'fero.ramdhoni@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '210',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => 'd2bcc140-b416-4177-b5f7-8b22d6ba5044',
                'nama'          => 'Ir. LALU HARIS MUNANDAR',
                'email'         => 'lalu.haris.munandar@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '220',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => '13450bdf-0bc8-437d-8aeb-2a8488497167',
                'nama'          => 'H. MOH. SUHAILI',
                'email'         => 'mohammad.suhaili@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '230',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => '3423fbb1-dd12-4ab5-be93-98096e76a433',
                'nama'          => 'H. LALU NORMAL SUZANA',
                'email'         => 'lalu.normal.suzana@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '230',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => 'ac1e17c7-c435-49f1-979a-a5e15b585979',
                'nama'          => 'Drs. H. LALU SUPARDAN, MM',
                'email'         => 'lalu.supardan@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '230',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => 'ab5f5f4f-d6a2-45ac-9924-d60d2de17f50',
                'nama'          => 'NURSIAH, S.Sos., M.Si.',
                'email'         => 'nursiah@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '230',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => '4df396c0-3fe7-4619-b370-2d0b278d5554',
                'nama'          => 'Ir. LALU M. AMIN, MM',
                'email'         => 'lalu.muhammad.amin@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '230',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => '671283f0-0650-4eeb-82f5-7b63afed1378',
                'nama'          => 'SUNARNO, S.Sos.',
                'email'         => 'sunarno@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '240',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => '4be77177-30f3-4d1f-a0d5-3f3beb5b49f7',
                'nama'          => 'TAHSIN BADRI, AP., M.Si.',
                'email'         => 'tahsin.badri@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '260',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => '3250cf5c-17f6-4cae-9147-bae8dae7f3d0',
                'nama'          => 'Dr. Drs. LALU BUDIMAN, M.Si.',
                'email'         => 'lalu.budiman@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '260',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => 'ae141836-ff35-4e6c-8e59-e6f59fa67c90',
                'nama'          => 'NANANG ASWANHADI, SH',
                'email'         => 'nanang.aswanhadi@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '280',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => '5ca4562b-47a9-4fa2-9fce-ac6e7450ba01',
                'nama'          => 'KUSNA HARIADI, SE., MM',
                'email'         => 'kusna.hariadi@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '290',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => 'fad4ac39-3a43-40db-8046-865d90514261',
                'nama'          => 'KADEK JANUARSIDI, ST',
                'email'         => 'kadek.januarsidi@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '300',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => '89361da3-3d61-4b7c-a09b-e45dc7252d6d',
                'nama'          => 'Drs. LALU RINJANI, M.Si.',
                'email'         => 'lalu.rinjani@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '260',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                '_id'           => '031c7707-b41b-47ad-8f7e-4c510094607d',
                'nama'          => 'ANGGUN CHRISTINA',
                'email'         => 'anggun.christina@gmail.com',
                'password'      => Hash::make('rahasia'),
                'is_active'     => '1',
                'level'         => '320',
                'created_at'    => \Carbon\Carbon::now(),
                'organisasi_id' => ''
            ],
            [
                'organisasi_id' => '4eedba0a-3375-4418-b018-906e6247fa4b',
                'nama'          => 'Mertak Tombok',
                'email'         => 'desa.mertaktombok@gmail.com',
                '_id'           => '4eedba0a-3375-4418-0001-906e6247fa4b',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '44e3889c-0074-49cf-b277-20fe5a5f0644',
                'nama'          => 'Aik Mual',
                'email'         => 'desa.aikmual@gmail.com',
                '_id'           => '44e3889c-0074-49cf-0001-20fe5a5f0644',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '7ec1d26d-5494-47ae-b859-de7325531960',
                'nama'          => 'Montong Terep',
                'email'         => 'desa.montongterep@gmail.com',
                '_id'           => '7ec1d26d-5494-47ae-0001-de7325531960',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'b519196c-4344-4a25-99e2-00635e02e9a9',
                'nama'          => 'Jago',
                'email'         => 'desa.jago@gmail.com',
                '_id'           => 'b519196c-4344-4a25-0001-00635e02e9a9',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'f617e380-2dff-4945-924f-2fac9daa5f99',
                'nama'          => 'Bunut Baok',
                'email'         => 'desa.bunutbaok@gmail.com',
                '_id'           => 'f617e380-2dff-4945-0001-2fac9daa5f99',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '127d9de6-927b-4b7b-84c0-f7397ea83183',
                'nama'          => 'Mekar Damai',
                'email'         => 'desa.mekardamai@gmail.com',
                '_id'           => '127d9de6-927b-4b7b-0001-f7397ea83183',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '74a68dc9-523c-430e-aec1-c632fdc2f323',
                'nama'          => 'Barejulat',
                'email'         => 'desa.barejulat@gmail.com',
                '_id'           => '74a68dc9-523c-430e-001-c632fdc2f323',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'c417807d-711d-4dda-aaa7-29a999a06df3',
                'nama'          => 'Ubung',
                'email'         => 'desa.ubung@gmail.com',
                '_id'           => 'c417807d-711d-4dda-0001-29a999a06df3',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '3a581213-846a-42fc-ab5a-4953fe93cfbd',
                'nama'          => 'Jelantik',
                'email'         => 'desa.jelantik@gmail.com',
                '_id'           => '3a581213-846a-42fc-0001-4953fe93cfbd',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '4b3d397a-072c-4e88-aff1-9cc2c1970900',
                'nama'          => 'Labulia',
                'email'         => 'desa.labulia@gmail.com',
                '_id'           => '4b3d397a-072c-4e88-0001-9cc2c1970900',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '6c2ee6f2-c95b-4c6c-a13b-1079b6c9d518',
                'nama'          => 'Batu Tulis',
                'email'         => 'desa.batutulis@gmail.com',
                '_id'           => '6c2ee6f2-c95b-4c6c-0001-1079b6c9d518',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '1bd1a34a-610f-4d96-90eb-d2fc46e1bd3c',
                'nama'          => 'Perina',
                'email'         => 'desa.perina@gmail.com',
                '_id'           => '1bd1a34a-610f-4d96-0001-d2fc46e1bd3c',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '6542e00f-678c-46d1-b7d1-7ca8522cba06',
                'nama'          => 'Pengenjek',
                'email'         => 'desa.pengenjek@gmail.com',
                '_id'           => '6542e00f-678c-46d1-0001-7ca8522cba06',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '5c072626-0f2c-4d29-a344-5bda05278266',
                'nama'          => 'Puyung',
                'email'         => 'desa.puyung@gmail.com',
                '_id'           => '5c072626-0f2c-4d29-0001-5bda05278266',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '67ba5afa-8878-46a5-be79-9e96ec5c8784',
                'nama'          => 'Nyerot',
                'email'         => 'desa.nyerot@gmail.com',
                '_id'           => '67ba5afa-8878-46a5-0001-9e96ec5c8784',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'b9885db2-d933-490c-9d76-fcaec5c414d2',
                'nama'          => 'Sukarana',
                'email'         => 'desa.sukarana@gmail.com',
                '_id'           => 'b9885db2-d933-490c-0001-fcaec5c414d2',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '1dd5e7cf-f052-494c-9aa7-58c8f4cbee14',
                'nama'          => 'Gemel',
                'email'         => 'desa.gemel@gmail.com',
                '_id'           => '1dd5e7cf-f052-494c-0001-58c8f4cbee14',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '563d9194-4f54-4a7f-a5d9-735c968a3a1f',
                'nama'          => 'Bonjeruk',
                'email'         => 'desa.bonjeruk@gmail.com',
                '_id'           => '563d9194-4f54-4a7f-0001-735c968a3a1f',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '46fea966-be8b-4733-bd19-d98a2a76a97d',
                'nama'          => 'Bunkate',
                'email'         => 'desa.bunkate@gmail.com',
                '_id'           => '46fea966-be8b-4733-0001-d98a2a76a97d',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '3fadfa28-2af7-4a22-b6ae-c929de62e6d9',
                'nama'          => 'Bujak',
                'email'         => 'desa.bujak@gmail.com',
                '_id'           => '3fadfa28-2af7-4a22-0001-c929de62e6d9',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '2195a7e0-4e56-4a39-b5d0-0fafc306b728',
                'nama'          => 'Selebung',
                'email'         => 'desa.selebung@gmail.com',
                '_id'           => '2195a7e0-4e56-4a39-0001-0fafc306b728',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'd4f0d8ab-5c6c-4c7a-accf-6c4cf495662a',
                'nama'          => 'Peresak',
                'email'         => 'desa.peresak@gmail.com',
                '_id'           => 'd4f0d8ab-5c6c-4c7a-0001-6c4cf495662a',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '9fa05359-1703-49aa-bed9-f371c1a602ee',
                'nama'          => 'Mantang',
                'email'         => 'desa.mantang@gmail.com',
                '_id'           => '9fa05359-1703-49aa-0001-f371c1a602ee',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '5c9a765d-1134-409f-a15d-84219f4a5d4f',
                'nama'          => 'Aik Darek',
                'email'         => 'desa.aikdarek@gmail.com',
                '_id'           => '5c9a765d-1134-409f-0001-84219f4a5d4f',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '84449cd7-5b1d-40e6-8562-d8f3b2033b71',
                'nama'          => 'Tampak Sering',
                'email'         => 'desa.tampaksiring@gmail.com',
                '_id'           => '84449cd7-5b1d-40e6-0001-d8f3b2033b71',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '2192213d-cea2-403c-ab4a-cb662391b11f',
                'nama'          => 'Barabali',
                'email'         => 'desa.barabali@gmail.com',
                '_id'           => '2192213d-cea2-403c-0001-cb662391b11f',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '98713907-c1a0-4c6a-b77e-4d19c5285c75',
                'nama'          => 'Beber',
                'email'         => 'desa.beber@gmail.com',
                '_id'           => '98713907-c1a0-4c6a-0001-4d19c5285c75',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'd3768053-8b3c-40e6-8eb9-fd7c328aff7b',
                'nama'          => 'Pagutan',
                'email'         => 'desa.pagutan@gmail.com',
                '_id'           => 'd3768053-8b3c-40e6-0001-fd7c328aff7b',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '82205b03-5c87-4e1b-8833-8626f47ad5f5',
                'nama'          => 'Mekar Bersatu',
                'email'         => 'desa.mekarbersatu@gmail.com',
                '_id'           => '82205b03-5c87-4e1b-0001-8626f47ad5f5',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '05f0f47d-3564-4d3f-9c0a-c5aaf763cd31',
                'nama'          => 'Sengkol',
                'email'         => 'desa.sengkol@gmail.com',
                '_id'           => '05f0f47d-3564-4d3f-0001-c5aaf763cd31',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '0bbefede-c115-4730-a959-ce59119b662f',
                'nama'          => 'Segala Anyar',
                'email'         => 'desa.segalaanyar@gmail.com',
                '_id'           => '0bbefede-c115-4730-0001-ce59119b662f',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '247b694d-6a6f-43f6-8530-c17991a7c7b7',
                'nama'          => 'Sukadana',
                'email'         => 'desa.sukadana@gmail.com',
                '_id'           => '247b694d-6a6f-43f6-0001-c17991a7c7b7',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '767c8d42-a62a-43bd-9924-a26cb977f9b5',
                'nama'          => 'Teruwai',
                'email'         => 'desa.teruwai@gmail.com',
                '_id'           => '767c8d42-a62a-43bd-0001-a26cb977f9b5',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '657517e2-a734-442d-bcbe-9142253e2a13',
                'nama'          => 'Pengengat',
                'email'         => 'desa.pengengat@gmail.com',
                '_id'           => '657517e2-a734-442d-0001-9142253e2a13',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '2ef37a47-58a4-45b7-af13-065e2e177c9e',
                'nama'          => 'Kawo',
                'email'         => 'desa.kawo@gmail.com',
                '_id'           => '2ef37a47-58a4-45b7-0001-065e2e177c9e',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'b1e16153-5c2c-4b4a-a223-2dd9a9f4d86b',
                'nama'          => 'Gapura',
                'email'         => 'desa.gapura@gmail.com',
                '_id'           => 'b1e16153-5c2c-4b4a-0001-2dd9a9f4d86b',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '75a93365-3ec4-4fef-a6cf-aae07f5f1166',
                'nama'          => 'Rembitan',
                'email'         => 'desa.rembitan@gmail.com',
                '_id'           => '75a93365-3ec4-4fef-0001-aae07f5f1166',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '526fefef-a2bd-4a44-9834-102e42d970b4',
                'nama'          => 'Kuta',
                'email'         => 'desa.kuta@gmail.com',
                '_id'           => '526fefef-a2bd-4a44-0001-102e42d970b4',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '7961f337-a9fd-43a4-b5d6-b53b1c032a85',
                'nama'          => 'Pengebur',
                'email'         => 'desa.pengebur@gmail.com',
                '_id'           => '7961f337-a9fd-43a4-000q-b53b1c032a85',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'd514bf57-fd70-491c-be27-963e79ebf5d8',
                'nama'          => 'Tumpak',
                'email'         => 'desa.tumpak@gmail.com',
                '_id'           => 'd514bf57-fd70-491c-be27-963e79ebf5d8',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'bd454678-3b0a-419a-afd6-3c4fa2675a88',
                'nama'          => 'Mertak',
                'email'         => 'desa.mertak@gmail.com',
                '_id'           => 'bd454678-3b0a-419a-0001-3c4fa2675a88',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '4236d9c8-8d2d-4a6e-b4e5-0d92f45e0648',
                'nama'          => 'Prabu',
                'email'         => 'desa.prabu@gmail.com',
                '_id'           => '4236d9c8-8d2d-4a6e-0001-0d92f45e0648',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '706f7dc2-c686-4f6a-a33d-21073d091a46',
                'nama'          => 'Tanak Awu',
                'email'         => 'desa.tanakawu@gmail.com',
                '_id'           => '706f7dc2-c686-4f6a-0001-21073d091a46',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '700d71c1-3fd8-44e4-9afb-ab439e96d02a',
                'nama'          => 'Ketara',
                'email'         => 'desa.ketara@gmail.com',
                '_id'           => '700d71c1-3fd8-44e4-0001-ab439e96d02a',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '76fffeb2-e940-4ea3-a1c2-8b61480f2b43',
                'nama'          => 'Bangket Parak',
                'email'         => 'desa.bangketparak@gmail.com',
                '_id'           => '76fffeb2-e940-4ea3-0001-8b61480f2b43',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '33db6f6b-98b9-42a2-9836-e63d25b2d17b',
                'nama'          => 'Bonder',
                'email'         => 'desa.bonder@gmail.com',
                '_id'           => '33db6f6b-98b9-42a2-0001-e63d25b2d17b',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'c7acb288-bc61-4500-adea-11cf9ec44ab1',
                'nama'          => 'Banyu Urip',
                'email'         => 'desa.banyuurip@gmail.com',
                '_id'           => 'c7acb288-bc61-4500-0001-11cf9ec44ab1',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'b5301874-e679-4d6c-a62a-6554b5eb88cc',
                'nama'          => 'Mangkung',
                'email'         => 'desa.mangkung@gmail.com',
                '_id'           => 'b5301874-e679-4d6c-0001-6554b5eb88cc',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '9981cf21-5a92-4665-bf31-ff733bcc428e',
                'nama'          => 'Kateng',
                'email'         => 'desa.kateng@gmail.com',
                '_id'           => '9981cf21-5a92-4665-0001-ff733bcc428e',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '012ca91a-1894-42a9-a69d-ac786569a593',
                'nama'          => 'Setanggor',
                'email'         => 'desa.setanggor@gmail.com',
                '_id'           => '012ca91a-1894-42a9-0001-ac786569a593',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'f80d656a-cefd-4da2-a72a-d9c7696ac5a0',
                'nama'          => 'Penujak',
                'email'         => 'desa.penujak@gmail.com',
                '_id'           => 'f80d656a-cefd-4da2-0001-d9c7696ac5a0',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '42431caa-b7f5-4df1-93c7-9949a817f17d',
                'nama'          => 'Selong Blanak',
                'email'         => 'desa.selongblanak@gmail.com',
                '_id'           => '42431caa-b7f5-4df1-0001-9949a817f17d',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'ff58c839-9133-4439-81b8-1804ea7f4f30',
                'nama'          => 'Mekar Sari',
                'email'         => 'desa.mekarsari@gmail.com',
                '_id'           => 'ff58c839-9133-4439-0001-1804ea7f4f30',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '1f986a2a-a9c8-4c4e-9cdd-c0529983b1d1',
                'nama'          => 'Batujai',
                'email'         => 'desa.batujai@gmail.com',
                '_id'           => '1f986a2a-a9c8-4c4e-0001-c0529983b1d1',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'ae341c47-affa-4342-8c10-1835bdad8522',
                'nama'          => 'Tanak Rarang',
                'email'         => 'desa.tanakrarang@gmail.com',
                '_id'           => 'ae341c47-affa-4342-0001-1835bdad8522',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '2947d7ab-eb66-4c4e-82e3-87a8d69f3f17',
                'nama'          => 'Sukaraja',
                'email'         => 'desa.sukaraja@gmail.com',
                '_id'           => '2947d7ab-eb66-4c4e-0001-87a8d69f3f17',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'f4b4d9e7-1e59-4ee3-8ccb-07b0cd40dc74',
                'nama'          => 'Beleka',
                'email'         => 'desa.beleka@gmail.com',
                '_id'           => 'f4b4d9e7-1e59-4ee3-0001-07b0cd40dc74',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'b32f7f41-0054-4854-8fae-c7fd4b65eb87',
                'nama'          => 'Semayong',
                'email'         => 'desa.semoyang@gmail.com',
                '_id'           => 'b32f7f41-0054-4854-00001-c7fd4b65eb87',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'c67da767-da38-479a-9413-8ac77cb467b1',
                'nama'          => 'Mujur',
                'email'         => 'desa.mujur@gmail.com',
                '_id'           => 'c67da767-da38-479a-0001-8ac77cb467b1',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'ff71ccb2-f94a-48df-af47-9aa7f4d92d7a',
                'nama'          => 'Landah',
                'email'         => 'desa.landah@gmail.com',
                '_id'           => 'ff71ccb2-f94a-48df-0001-9aa7f4d92d7a',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '52b7465f-31d0-483f-ba20-fc5135106204',
                'nama'          => 'Sengkerang',
                'email'         => 'desa.sengkerang@gmail.com',
                '_id'           => '52b7465f-31d0-483f-0001-fc5135106204',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'bc718b31-5ee1-4134-adc4-bab630ad606a',
                'nama'          => 'Bilelando',
                'email'         => 'desa.bilelando@gmail.com',
                '_id'           => 'bc718b31-5ee1-4134-0001-bab630ad606a',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '404136cc-a91c-4cec-b53a-4e559c357ac5',
                'nama'          => 'Ganti',
                'email'         => 'desa.ganti@gmail.com',
                '_id'           => '404136cc-a91c-4cec-0001-4e559c357ac5',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '16ea001a-4bcb-4813-a0e4-053e14b21bb0',
                'nama'          => 'Marong',
                'email'         => 'desa.marong@gmail.com',
                '_id'           => '16ea001a-4bcb-4813-0001-053e14b21bb0',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '91d0ea51-f8bb-46a1-a80d-5c6629c7cc75',
                'nama'          => 'Kidang',
                'email'         => 'desa.kidang@gmail.com',
                '_id'           => '91d0ea51-f8bb-46a1-0001-5c6629c7cc75',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'd86bc5ea-a929-4b8d-a23a-57f659ae1dc9',
                'nama'          => 'Lekor',
                'email'         => 'desa.lekor@gmail.com',
                '_id'           => 'd86bc5ea-a929-4b8d-0001-57f659ae1dc9',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '4eda99f0-7e28-48b9-a2d8-9559a44d5e62',
                'nama'          => 'Langko',
                'email'         => 'desa.langko@gmail.com',
                '_id'           => '4eda99f0-7e28-48b9-0001-9559a44d5e62',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '59c13cc6-40ab-4afd-ad3d-2c799f999e44',
                'nama'          => 'Janapria',
                'email'         => 'desa.janapria@gmail.com',
                '_id'           => '59c13cc6-40ab-4afd-0001-2c799f999e44',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '97e05d99-c682-42d9-b87a-0f5de7f3099d',
                'nama'          => 'Loang Maka',
                'email'         => 'desa.loangmaka@gmail.com',
                '_id'           => '97e05d99-c682-42d9-0001-0f5de7f3099d',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '33d6a365-fcac-427e-9f2c-59c3847c1e24',
                'nama'          => 'Saba',
                'email'         => 'desa.saba@gmail.com',
                '_id'           => '33d6a365-fcac-427e-0001-59c3847c1e24',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'e6665f24-e7e6-41ab-b667-41bdecc4739e',
                'nama'          => 'Bakan',
                'email'         => 'desa.bakan@gmail.com',
                '_id'           => 'e6665f24-e7e6-41ab-0001-41bdecc4739e',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'a0995ffd-4ef6-4905-b1fe-df6864ef04e4',
                'nama'          => 'Durian',
                'email'         => 'desa.durian@gmail.com',
                '_id'           => 'a0995ffd-4ef6-4905-0001-df6864ef04e4',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '6a2a58d8-ba36-4156-865d-056ee886f745',
                'nama'          => 'Pendem',
                'email'         => 'desa.pendem@gmail.com',
                '_id'           => '6a2a58d8-ba36-4156-0001-056ee886f745',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'bbf8a7bb-8b10-4a7b-87ed-0df89a37d680',
                'nama'          => 'Selebinng Rembika',
                'email'         => 'desa.selebingrembika@gmail.com',
                '_id'           => 'bbf8a7bb-8b10-4a7b-0001-0df89a37d680',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '3d007bd0-3b01-49e7-9296-8368a7470c67',
                'nama'          => 'Karembang',
                'email'         => 'desa.karembong@gmail.com',
                '_id'           => '3d007bd0-3b01-49e7-0001-8368a7470c67',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '96d90835-ade1-4636-96fc-c9ac55ac9610',
                'nama'          => 'Jango',
                'email'         => 'desa.jango@gmail.com',
                '_id'           => '96d90835-ade1-4636-0001-c9ac55ac9610',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'da79d376-c0d6-407a-ad7d-7e6089625844',
                'nama'          => 'Setuta',
                'email'         => 'desa.setuta@gmail.com',
                '_id'           => 'da79d376-c0d6-407a-0001-7e6089625844',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'dce7f58e-9328-420f-aef5-2f538ae22a7b',
                'nama'          => 'Pringgarata',
                'email'         => 'desa.pringgarata@gmail.com',
                '_id'           => 'dce7f58e-9328-420f-0001-2f538ae22a7b',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '2ae619e5-be6d-4541-99bd-c773ef7e58cb',
                'nama'          => 'Sepakek',
                'email'         => 'desa.sepakek@gmail.com',
                '_id'           => '2ae619e5-be6d-4541-0001-c773ef7e58cb',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '679e42d1-519d-46b3-9150-72c145f05f80',
                'nama'          => 'Murbaya',
                'email'         => 'desa.murbaya@gmail.com',
                '_id'           => '679e42d1-519d-46b3-0001-72c145f05f80',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'f6381a82-8f54-4d82-a74e-e60e913d362f',
                'nama'          => 'Bagu',
                'email'         => 'desa.bagu@gmail.com',
                '_id'           => 'f6381a82-8f54-4d82-0001-e60e913d362f',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '1cea62f3-c00d-4a56-9532-4b095278c9ef',
                'nama'          => 'Sintung',
                'email'         => 'desa.sintung@gmail.com',
                '_id'           => '1cea62f3-c00d-4a56-0001-4b095278c9ef',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '6b21d561-c19b-4177-b28e-c9eb4700f416',
                'nama'          => 'Bilebante',
                'email'         => 'desa.bilebante@gmail.com',
                '_id'           => '6b21d561-c19b-4177-0001-c9eb4700f416',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '80b9a5e1-fd0d-4da3-9b29-36e43f7fe07f',
                'nama'          => 'Pemepek',
                'email'         => 'desa.pemepek@gmail.com',
                '_id'           => '80b9a5e1-fd0d-4da3-0001-36e43f7fe07f',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '99f466f6-a855-48b6-b5ef-8c09b40a4264',
                'nama'          => 'Menemeng',
                'email'         => 'desa.menemeng@gmail.com',
                '_id'           => '99f466f6-a855-48b6-0001-8c09b40a4264',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '1ef1f050-797f-40ac-9ecf-65bab4da5537',
                'nama'          => 'Arjangka',
                'email'         => 'desa.arjangka@gmail.com',
                '_id'           => '1ef1f050-797f-40ac-0001-65bab4da5537',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'c99be9ba-a598-4237-ad14-a1a6ec7e4c29',
                'nama'          => 'Taman Indah',
                'email'         => 'desa.tamanindah@gmail.com',
                '_id'           => 'c99be9ba-a598-4237-0001-a1a6ec7e4c29',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '9209f277-a3e4-4b74-9933-674f78a93e5c',
                'nama'          => 'Sisik',
                'email'         => 'desa.sisik@gmail.com',
                '_id'           => '9209f277-a3e4-4b74-0001-674f78a93e5c',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'f9cdb2fc-0912-4a2c-b6a8-50cf557caa24',
                'nama'          => 'Lendang Are',
                'email'         => 'desa.lendangare@gmail.com',
                '_id'           => 'f9cdb2fc-0912-4a2c-0001-50cf557caa24',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '24fa17cf-c16c-4309-9d30-cd66db75e2e0',
                'nama'          => 'Monggas',
                'email'         => 'desa.monggas@gmail.com',
                '_id'           => '24fa17cf-c16c-4309-0001-cd66db75e2e0',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '3f72bd42-3aff-44a2-8173-730f392c082f',
                'nama'          => 'Muncan',
                'email'         => 'desa.muncan@gmail.com',
                '_id'           => '3f72bd42-3aff-44a2-0001-730f392c082f',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '276b5ce2-5a5d-4ff4-a6b4-8194bb46eced',
                'nama'          => 'Berbuak',
                'email'         => 'desa.berbuak@gmail.com',
                '_id'           => '276b5ce2-5a5d-4ff4-0001-8194bb46eced',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'd39db371-3f71-42b8-9c9a-dcee6d901c24',
                'nama'          => 'Kopang Rembiga',
                'email'         => 'desa.kopangrembiga@gmail.com',
                '_id'           => 'd39db371-3f71-42b8-0001-dcee6d901c24',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '6e64b805-642b-4cb7-b57c-c4961b5c0231',
                'nama'          => 'Dasan Baru',
                'email'         => 'desa.dasanbaru@gmail.com',
                '_id'           => '6e64b805-642b-4cb7-0001-c4961b5c0231',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '34a1e417-c20f-4bea-8b39-a438151a8d54',
                'nama'          => 'Montong Gamang',
                'email'         => 'desa.montonggamang@gmail.com',
                '_id'           => '34a1e417-c20f-4bea-0001-a438151a8d54',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '6e93cbf4-1a2d-4bea-88a1-13e942f7c7c4',
                'nama'          => 'Darmaji',
                'email'         => 'desa.darmaji@gmail.com',
                '_id'           => '6e93cbf4-1a2d-4bea-0001-13e942f7c7c4',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'f00fcacc-2cf9-4ab0-b4a3-cf9892235c1f',
                'nama'          => 'Wajageseng',
                'email'         => 'desa.wajageseng@gmail.com',
                '_id'           => 'f00fcacc-2cf9-4ab0-0001-cf9892235c1f',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '938e9624-bc41-4285-a46d-e2dce722b17f',
                'nama'          => 'Aik bual',
                'email'         => 'desa.aikbual@gmail.com',
                '_id'           => '938e9624-bc41-4285-0001-e2dce722b17f',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'e634351a-2986-4e61-b498-0c6272fdd4eb',
                'nama'          => 'Semparu',
                'email'         => 'desa.semparu@gmail.com',
                '_id'           => 'e634351a-2986-4e61-0001-0c6272fdd4eb',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'b06a1869-e241-4fbe-bcba-c50a2054e205',
                'nama'          => 'Jurang Jaler',
                'email'         => 'desa.jurangjaler@gmail.com',
                '_id'           => 'b06a1869-e241-4fbe-0001-c50a2054e205',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '48657ac7-8880-4e58-ad89-21cc854b2b84',
                'nama'          => 'Beraim',
                'email'         => 'desa.beraim@gmail.com',
                '_id'           => '48657ac7-8880-4e58-0001-21cc854b2b84',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'e970b0f3-9636-4e4d-a32c-f711f0cada1a',
                'nama'          => 'Batu Nyala',
                'email'         => 'desa.batunyala@gmail.com',
                '_id'           => 'e970b0f3-9636-4e4d-0001-f711f0cada1a',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '22c67cf3-52c6-47b6-b5fd-48dfa750757e',
                'nama'          => 'Lajut',
                'email'         => 'desa.lajut@gmail.com',
                '_id'           => '22c67cf3-52c6-47b6-0001-48dfa750757e',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '55c96da5-6687-4e31-a9ed-73eb2b92839f',
                'nama'          => 'Pegadang',
                'email'         => 'desa.pegadang@gmail.com',
                '_id'           => '55c96da5-6687-4e31-0001-73eb2b92839f',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'aaea5df6-aedf-47b2-95c9-cb53bcf4999b',
                'nama'          => 'Kelebuh',
                'email'         => 'desa.kelebuh@gmail.com',
                '_id'           => 'aaea5df6-aedf-47b2-0001-cb53bcf4999b',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '84685fa3-bb25-4131-a1b6-551f8d85ad2b',
                'nama'          => 'Pejanggik',
                'email'         => 'desa.pejanggik@gmail.com',
                '_id'           => '84685fa3-bb25-4131-0001-551f8d85ad2b',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '68b38946-2736-4813-89cf-c33022f7ea38',
                'nama'          => 'Dakung',
                'email'         => 'desa.dakung@gmail.com',
                '_id'           => '68b38946-2736-4813-0001-c33022f7ea38',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '190efe82-a452-4921-a201-86bf1487336b',
                'nama'          => 'Prai Meke',
                'email'         => 'desa.praimeke@gmail.com',
                '_id'           => '190efe82-a452-4921-0001-86bf1487336b',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '4b09b509-c84b-4953-a925-bd75f93d1601',
                'nama'          => 'Montong Sapah',
                'email'         => 'desa.montongsapah@gmail.com',
                '_id'           => '4b09b509-c84b-4953-0001-bd75f93d1601',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '6d03f3fc-e9e2-43dd-9eb2-c95ff3ae1ad8',
                'nama'          => 'Ungga',
                'email'         => 'desa.ungga@gmail.com',
                '_id'           => '6d03f3fc-e9e2-43dd-0001-c95ff3ae1ad8',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '7f4e4eab-389f-4740-ac2e-f69b90b52475',
                'nama'          => 'Ul',
                'email'         => 'desa.ul@gmail.com',
                '_id'           => '7f4e4eab-389f-4740-0001-f69b90b52475',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '383e75f5-df38-40bc-8592-f4fbed63b333',
                'nama'          => 'Pelambik',
                'email'         => 'desa.pelambik@gmail.com',
                '_id'           => '383e75f5-df38-40bc-0001-f4fbed63b333',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '143cc9c3-b519-4521-b867-8bfd59e04a73',
                'nama'          => 'Darek',
                'email'         => 'desa.darek@gmail.com',
                '_id'           => '143cc9c3-b519-4521-0001-8bfd59e04a73',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '7e6d2f35-3c40-4905-bb20-e52e92381006',
                'nama'          => 'Ranggagata',
                'email'         => 'desa.ranggagata@gmail.com',
                '_id'           => '7e6d2f35-3c40-4905-0001-e52e92381006',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'e62ec590-de8d-4fef-a9da-e487ca3ffeec',
                'nama'          => 'Pandan Indah',
                'email'         => 'desa.pandanindah@gmail.com',
                '_id'           => 'e62ec590-de8d-4fef-0001-e487ca3ffeec',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '06a3e298-646f-4231-950c-569fc5b4ffed',
                'nama'          => 'Serage',
                'email'         => 'desa.serage@gmail.com',
                '_id'           => '06a3e298-646f-4231-0001-569fc5b4ffed',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '08692412-9798-4e9c-a7af-728e3b97ed3c',
                'nama'          => 'Montong Ajan',
                'email'         => 'desa.montongajan@gmail.com',
                '_id'           => '08692412-9798-4e9c-0001-728e3b97ed3c',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '9aa63509-6192-4b03-9705-45773a4e3b50',
                'nama'          => 'Batu Jangkeh',
                'email'         => 'desa.batujangkih@gmail.com',
                '_id'           => '9aa63509-6192-4b03-0001-45773a4e3b50',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '23db515e-1422-432a-bd89-4c0ad68c78ab',
                'nama'          => 'Teduh',
                'email'         => 'desa.teduh@gmail.com',
                '_id'           => '23db515e-1422-432a-0001-4c0ad68c78ab',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '9fcbee4e-6315-42f1-91c4-152440a5c55f',
                'nama'          => 'Lantan',
                'email'         => 'desa.lantan@gmail.com',
                '_id'           => '9fcbee4e-6315-42f1-0001-152440a5c55f',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '38070340-1b42-48ed-9178-51fe9d6a8089',
                'nama'          => 'Senting',
                'email'         => 'desa.senting@gmail.com',
                '_id'           => '38070340-1b42-48ed-0001-51fe9d6a8089',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'fb8053d0-e2fd-4b6a-8128-c76456d0f5d6',
                'nama'          => 'Tanak Beak',
                'email'         => 'desa.tanakbeak@gmail.com',
                '_id'           => 'fb8053d0-e2fd-4b6a-0001-c76456d0f5d6',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '6f66e386-2f68-488a-96c5-1c3de08573a3',
                'nama'          => 'Aik Bukaq',
                'email'         => 'desa.aikbukaq@gmail.com',
                '_id'           => '6f66e386-2f68-488a-0001-1c3de08573a3',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '897e9f48-5fb7-4500-bd0f-f823dc9ff196',
                'nama'          => 'Teratak',
                'email'         => 'desa.teratak@gmail.com',
                '_id'           => '897e9f48-5fb7-4500-0001-f823dc9ff196',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '4d8e187b-492e-4fb3-91f1-ea3041d5f17e',
                'nama'          => 'Aik berik',
                'email'         => 'desa.aikberik@gmail.com',
                '_id'           => '4d8e187b-492e-4fb3-0001-ea3041d5f17e',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => 'f47b1901-6f02-4152-b186-5b8972f0f87b',
                'nama'          => 'Mas Mas',
                'email'         => 'desa.mas-mas@gmail.com',
                '_id'           => 'f47b1901-6f02-4152-0001-5b8972f0f87b',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'organisasi_id' => '592123d2-670c-409f-a27b-d943a7a4d5d3',
                'nama'          => 'Karangsidemen',
                'email'         => 'desa.karangsidemen@gmail.com',
                '_id'           => '592123d2-670c-409f-0001-d943a7a4d5d3',
                'is_active'     => 1,
                'level'         => '1',
                'password'      => Hash::make('lomboktengah'),
                'created_at'    => \Carbon\Carbon::now()
            ],
        ];

        // insert batch
        DB::table('users')->insert($users);
    }
} 