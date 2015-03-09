<?php

class PejabatDesaTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        // truncate record
        DB::table('pejabat_desa')->truncate();

        $pejabat = [
            [
                '_id'           => 'f9e66a2f-dvdf-erec-5567-d348219ef74e',
                'nama'          => 'Bagoes Abdullah Al Hadromi',
                'fungsi'        => 1,
                'jabatan'       => 'Kepala Desa',
                'level'         => 1,
                'user_id'       => 'bb341e8b-b625-4029-844d-e18d2bbe18f6',
                'organisasi_id' => 'f9e66a2f-733a-41f5-9457-d348219ef74e',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                '_id'           => 'f9e66a2f-dvdf-erec-5569-d348219ef74e',
                'nama'          => 'Rendy Pangabean',
                'fungsi'        => 1,
                'jabatan'       => 'Sekretaris Desa',
                'level'         => 2,
                'user_id'       => 'bb341e8b-b625-4029-844d-e18d2bbe18f6',
                'organisasi_id' => 'f9e66a2f-733a-41f5-9457-d348219ef74e',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                '_id'           => '4eedba0a-3375-0001-b018-906e6247fa4b',
                'organisasi_id' => '4eedba0a-3375-4418-b018-906e6247fa4b',
                'nama'          => 'Lalu Muh. Saleh',
                'fungsi'        => 1,
                'jabatan'       => 'Kepala Desa',
                'level'         => 1,
                'user_id'       => '4eedba0a-3375-4418-0001-906e6247fa4b',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                '_id'           => '44e3889c-0074-0001-b277-20fe5a5f0644',
                'organisasi_id' => '44e3889c-0074-49cf-b277-20fe5a5f0644',
                'nama'          => 'Asrorul Hadi',
                'fungsi'        => 1,
                'jabatan'       => 'Kepala Desa',
                'level'         => 1,
                'user_id'       => '44e3889c-0074-49cf-0001-20fe5a5f0644',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                '_id'           => '7ec1d26d-5494-0001-b859-de7325531960',
                'organisasi_id' => '7ec1d26d-5494-47ae-b859-de7325531960',
                'nama'          => 'Ramdani',
                'fungsi'        => 1,
                'jabatan'       => 'Kepala Desa',
                'level'         => 1,
                'user_id'       => '7ec1d26d-5494-47ae-0001-de7325531960',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                '_id'           => 'b519196c-4344-0001-99e2-00635e02e9a9',
                'organisasi_id' => 'b519196c-4344-4a25-99e2-00635e02e9a9',
                'nama'          => 'H. Abdul Halim',
                'fungsi'        => 1,
                'jabatan'       => 'Kepala Desa',
                'level'         => 1,
                'user_id'       => 'b519196c-4344-4a25-0001-00635e02e9a9',
                'created_at'    => \Carbon\Carbon::now()
            ],
//            [
//                '_id'           => 'f617e380-2dff-0001-924f-2fac9daa5f99',
//                'organisasi_id' => 'f617e380-2dff-4945-924f-2fac9daa5f99',
//                'nama'          => 'Yasir Amrillah, S.Pd.I',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'f617e380-2dff-4945-0001-2fac9daa5f99',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '127d9de6-927b-0001-84c0-f7397ea83183',
//                'organisasi_id' => '127d9de6-927b-4b7b-84c0-f7397ea83183',
//                'nama'          => 'Edy Supriadi, S.IP',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '127d9de6-927b-4b7b-0001-f7397ea83183',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '74a68dc9-523c-0001-aec1-c632fdc2f323',
//                'organisasi_id' => '74a68dc9-523c-430e-aec1-c632fdc2f323',
//                'nama'          => 'Sujiran Aprianta',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '74a68dc9-523c-430e-001-c632fdc2f323',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'c417807d-711d-0001-aaa7-29a999a06df3',
//                'organisasi_id' => 'c417807d-711d-4dda-aaa7-29a999a06df3',
//                'nama'          => 'Rodi Setiawan, S.Sos',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'c417807d-711d-4dda-0001-29a999a06df3',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '3a581213-846a-0001-ab5a-4953fe93cfbd',
//                'organisasi_id' => '3a581213-846a-42fc-ab5a-4953fe93cfbd',
//                'nama'          => 'Mahsun',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '3a581213-846a-42fc-0001-4953fe93cfbd',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '4b3d397a-072c-0001-aff1-9cc2c1970900',
//                'organisasi_id' => '4b3d397a-072c-4e88-aff1-9cc2c1970900',
//                'nama'          => 'L. Arfan M.',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '4b3d397a-072c-4e88-0001-9cc2c1970900',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '6c2ee6f2-c95b-0001-a13b-1079b6c9d518',
//                'organisasi_id' => '6c2ee6f2-c95b-4c6c-a13b-1079b6c9d518',
//                'nama'          => 'Muhit',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '6c2ee6f2-c95b-4c6c-0001-1079b6c9d518',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '1bd1a34a-610f-0001-90eb-d2fc46e1bd3c',
//                'organisasi_id' => '1bd1a34a-610f-4d96-90eb-d2fc46e1bd3c',
//                'nama'          => 'H. M. Khabit Kariadi, A.Md',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '1bd1a34a-610f-4d96-0001-d2fc46e1bd3c',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '6542e00f-678c-0001-b7d1-7ca8522cba06',
//                'organisasi_id' => '6542e00f-678c-46d1-b7d1-7ca8522cba06',
//                'nama'          => 'Irawan Susiadi, S.Pd.',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '6542e00f-678c-46d1-0001-7ca8522cba06',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '5c072626-0f2c-0001-a344-5bda05278266',
//                'organisasi_id' => '5c072626-0f2c-4d29-a344-5bda05278266',
//                'nama'          => 'H. Hermanto',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '5c072626-0f2c-4d29-0001-5bda05278266',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '67ba5afa-8878-0001-be79-9e96ec5c8784',
//                'organisasi_id' => '67ba5afa-8878-46a5-be79-9e96ec5c8784',
//                'nama'          => 'Sahim, SP',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '67ba5afa-8878-46a5-0001-9e96ec5c8784',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'b9885db2-d933-0001-9d76-fcaec5c414d2',
//                'organisasi_id' => 'b9885db2-d933-490c-9d76-fcaec5c414d2',
//                'nama'          => 'Timan',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'b9885db2-d933-490c-0001-fcaec5c414d2',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '1dd5e7cf-f052-0001-9aa7-58c8f4cbee14',
//                'organisasi_id' => '1dd5e7cf-f052-494c-9aa7-58c8f4cbee14',
//                'nama'          => 'H. Achmad Musannip, SP',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '1dd5e7cf-f052-494c-0001-58c8f4cbee14',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '563d9194-4f54-0001-a5d9-735c968a3a1f',
//                'organisasi_id' => '563d9194-4f54-4a7f-a5d9-735c968a3a1f',
//                'nama'          => 'Saiful Anshori',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '563d9194-4f54-4a7f-0001-735c968a3a1f',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '46fea966-be8b-0001-bd19-d98a2a76a97d',
//                'organisasi_id' => '46fea966-be8b-4733-bd19-d98a2a76a97d',
//                'nama'          => 'Sabudin',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '46fea966-be8b-4733-0001-d98a2a76a97d',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '3fadfa28-2af7-0001-b6ae-c929de62e6d9',
//                'organisasi_id' => '3fadfa28-2af7-4a22-b6ae-c929de62e6d9',
//                'nama'          => 'Abdul Rahim QH, S.Pd',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '3fadfa28-2af7-4a22-0001-c929de62e6d9',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '2195a7e0-4e56-0001-b5d0-0fafc306b728',
//                'organisasi_id' => '2195a7e0-4e56-4a39-b5d0-0fafc306b728',
//                'nama'          => 'Drs. H. Muhammad Razikin',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '2195a7e0-4e56-4a39-0001-0fafc306b728',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'd4f0d8ab-5c6c-0001-accf-6c4cf495662a',
//                'organisasi_id' => 'd4f0d8ab-5c6c-4c7a-accf-6c4cf495662a',
//                'nama'          => 'Agus Hendriawan',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'd4f0d8ab-5c6c-4c7a-0001-6c4cf495662a',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '9fa05359-1703-0001-bed9-f371c1a602ee',
//                'organisasi_id' => '9fa05359-1703-49aa-bed9-f371c1a602ee',
//                'nama'          => 'Zaenal Abidin',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '9fa05359-1703-49aa-0001-f371c1a602ee',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '5c9a765d-1134-0001-a15d-84219f4a5d4f',
//                'organisasi_id' => '5c9a765d-1134-409f-a15d-84219f4a5d4f',
//                'nama'          => 'Hasan, SIP',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '5c9a765d-1134-409f-0001-84219f4a5d4f',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '84449cd7-5b1d-0001-8562-d8f3b2033b71',
//                'organisasi_id' => '84449cd7-5b1d-40e6-8562-d8f3b2033b71',
//                'nama'          => 'Mahrum',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '84449cd7-5b1d-40e6-0001-d8f3b2033b71',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '2192213d-cea2-0001-ab4a-cb662391b11f',
//                'organisasi_id' => '2192213d-cea2-403c-ab4a-cb662391b11f',
//                'nama'          => 'Ki Agus Azhar, SH',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '2192213d-cea2-403c-0001-cb662391b11f',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '98713907-c1a0-0001-b77e-4d19c5285c75',
//                'organisasi_id' => '98713907-c1a0-4c6a-b77e-4d19c5285c75',
//                'nama'          => 'Heriatno, ST',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '98713907-c1a0-4c6a-0001-4d19c5285c75',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'd3768053-8b3c-0001-8eb9-fd7c328aff7b',
//                'organisasi_id' => 'd3768053-8b3c-40e6-8eb9-fd7c328aff7b',
//                'nama'          => 'Syamsul Rizal, SH',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'd3768053-8b3c-40e6-0001-fd7c328aff7b',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '82205b03-5c87-0001-8833-8626f47ad5f5',
//                'organisasi_id' => '82205b03-5c87-4e1b-8833-8626f47ad5f5',
//                'nama'          => 'Hasanudin',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '82205b03-5c87-4e1b-0001-8626f47ad5f5',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '05f0f47d-3564-0001-9c0a-c5aaf763cd31',
//                'organisasi_id' => '05f0f47d-3564-4d3f-9c0a-c5aaf763cd31',
//                'nama'          => 'L. Tanauri, S.IP',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '05f0f47d-3564-4d3f-0001-c5aaf763cd31',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '0bbefede-c115-0001-a959-ce59119b662f',
//                'organisasi_id' => '0bbefede-c115-4730-a959-ce59119b662f',
//                'nama'          => 'Muksin, S.Pd.',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '0bbefede-c115-4730-0001-ce59119b662f',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '247b694d-6a6f-0001-8530-c17991a7c7b7',
//                'organisasi_id' => '247b694d-6a6f-43f6-8530-c17991a7c7b7',
//                'nama'          => 'Moh. Nurdin, A.Ma',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '247b694d-6a6f-43f6-0001-c17991a7c7b7',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '767c8d42-a62a-0001-9924-a26cb977f9b5',
//                'organisasi_id' => '767c8d42-a62a-43bd-9924-a26cb977f9b5',
//                'nama'          => 'Mahsun',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '767c8d42-a62a-43bd-0001-a26cb977f9b5',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '657517e2-a734-0001-bcbe-9142253e2a13',
//                'organisasi_id' => '657517e2-a734-442d-bcbe-9142253e2a13',
//                'nama'          => 'Moh. Nurhartawan',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '657517e2-a734-442d-0001-9142253e2a13',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '2ef37a47-58a4-0001-af13-065e2e177c9e',
//                'organisasi_id' => '2ef37a47-58a4-45b7-af13-065e2e177c9e',
//                'nama'          => 'Tandar',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '2ef37a47-58a4-45b7-0001-065e2e177c9e',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'b1e16153-5c2c-0001-a223-2dd9a9f4d86b',
//                'organisasi_id' => 'b1e16153-5c2c-4b4a-a223-2dd9a9f4d86b',
//                'nama'          => 'Rudi',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'b1e16153-5c2c-4b4a-0001-2dd9a9f4d86b',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '75a93365-3ec4-0001-a6cf-aae07f5f1166',
//                'organisasi_id' => '75a93365-3ec4-4fef-a6cf-aae07f5f1166',
//                'nama'          => 'Arifin Tomi',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '75a93365-3ec4-4fef-0001-aae07f5f1166',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '526fefef-a2bd-0001-9834-102e42d970b4',
//                'organisasi_id' => '526fefef-a2bd-4a44-9834-102e42d970b4',
//                'nama'          => 'Lalu Badaruddin',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '526fefef-a2bd-4a44-0001-102e42d970b4',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '7961f337-a9fd-0001-b5d6-b53b1c032a85',
//                'organisasi_id' => '7961f337-a9fd-43a4-b5d6-b53b1c032a85',
//                'nama'          => 'Supardi Yusuf, S.PdI. MM',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '7961f337-a9fd-43a4-000q-b53b1c032a85',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'd514bf57-fd70-0001-be27-963e79ebf5d8',
//                'organisasi_id' => 'd514bf57-fd70-491c-be27-963e79ebf5d8',
//                'nama'          => 'Hamidan',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'd514bf57-fd70-491c-be27-963e79ebf5d8',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'bd454678-3b0a-0001-afd6-3c4fa2675a88',
//                'organisasi_id' => 'bd454678-3b0a-419a-afd6-3c4fa2675a88',
//                'nama'          => 'Bangun',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'bd454678-3b0a-419a-0001-3c4fa2675a88',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '4236d9c8-8d2d-0001-b4e5-0d92f45e0648',
//                'organisasi_id' => '4236d9c8-8d2d-4a6e-b4e5-0d92f45e0648',
//                'nama'          => 'Lalu.Mohamad Saihu',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '4236d9c8-8d2d-4a6e-0001-0d92f45e0648',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '706f7dc2-c686-0001-a33d-21073d091a46',
//                'organisasi_id' => '706f7dc2-c686-4f6a-a33d-21073d091a46',
//                'nama'          => 'Lalu Nudiana',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '706f7dc2-c686-4f6a-0001-21073d091a46',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '700d71c1-3fd8-0001-9afb-ab439e96d02a',
//                'organisasi_id' => '700d71c1-3fd8-44e4-9afb-ab439e96d02a',
//                'nama'          => 'Lalu Buntaran',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '700d71c1-3fd8-44e4-0001-ab439e96d02a',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '76fffeb2-e940-0001-a1c2-8b61480f2b43',
//                'organisasi_id' => '76fffeb2-e940-4ea3-a1c2-8b61480f2b43',
//                'nama'          => 'Ardaman',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '76fffeb2-e940-4ea3-0001-8b61480f2b43',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '33db6f6b-98b9-0001-9836-e63d25b2d17b',
//                'organisasi_id' => '33db6f6b-98b9-42a2-9836-e63d25b2d17b',
//                'nama'          => 'Lalu Hamzan',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '33db6f6b-98b9-42a2-0001-e63d25b2d17b',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'c7acb288-bc61-0001-adea-11cf9ec44ab1',
//                'organisasi_id' => 'c7acb288-bc61-4500-adea-11cf9ec44ab1',
//                'nama'          => 'Mustajab',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'c7acb288-bc61-4500-0001-11cf9ec44ab1',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'b5301874-e679-0001-a62a-6554b5eb88cc',
//                'organisasi_id' => 'b5301874-e679-4d6c-a62a-6554b5eb88cc',
//                'nama'          => 'L. Samsul Rijal,SIP',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'b5301874-e679-4d6c-0001-6554b5eb88cc',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '9981cf21-5a92-0001-bf31-ff733bcc428e',
//                'organisasi_id' => '9981cf21-5a92-4665-bf31-ff733bcc428e',
//                'nama'          => 'L. Syarifudin',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '9981cf21-5a92-4665-0001-ff733bcc428e',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '012ca91a-1894-0001-a69d-ac786569a593',
//                'organisasi_id' => '012ca91a-1894-42a9-a69d-ac786569a593',
//                'nama'          => 'Srijaya',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '012ca91a-1894-42a9-0001-ac786569a593',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'f80d656a-cefd-0001-a72a-d9c7696ac5a0',
//                'organisasi_id' => 'f80d656a-cefd-4da2-a72a-d9c7696ac5a0',
//                'nama'          => 'Lalu Dikjaya',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'f80d656a-cefd-4da2-0001-d9c7696ac5a0',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '42431caa-b7f5-0001-93c7-9949a817f17d',
//                'organisasi_id' => '42431caa-b7f5-4df1-93c7-9949a817f17d',
//                'nama'          => 'H.L. Nurtasim',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '42431caa-b7f5-4df1-0001-9949a817f17d',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'ff58c839-9133-0001-81b8-1804ea7f4f30',
//                'organisasi_id' => 'ff58c839-9133-4439-81b8-1804ea7f4f30',
//                'nama'          => 'Azhar, S. PdI',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'ff58c839-9133-4439-0001-1804ea7f4f30',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '1f986a2a-a9c8-0001-9cdd-c0529983b1d1',
//                'organisasi_id' => '1f986a2a-a9c8-4c4e-9cdd-c0529983b1d1',
//                'nama'          => 'Paesal, S.Sos',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '1f986a2a-a9c8-4c4e-0001-c0529983b1d1',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'ae341c47-affa-0001-8c10-1835bdad8522',
//                'organisasi_id' => 'ae341c47-affa-4342-8c10-1835bdad8522',
//                'nama'          => 'Haji Deboh, S.Pd.I',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'ae341c47-affa-4342-0001-1835bdad8522',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '2947d7ab-eb66-0001-82e3-87a8d69f3f17',
//                'organisasi_id' => '2947d7ab-eb66-4c4e-82e3-87a8d69f3f17',
//                'nama'          => 'Purnama',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '2947d7ab-eb66-4c4e-0001-87a8d69f3f17',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'f4b4d9e7-1e59-0001-8ccb-07b0cd40dc74',
//                'organisasi_id' => 'f4b4d9e7-1e59-4ee3-8ccb-07b0cd40dc74',
//                'nama'          => 'Senang Haris, SE',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'f4b4d9e7-1e59-4ee3-0001-07b0cd40dc74',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'b32f7f41-0054-0001-8fae-c7fd4b65eb87',
//                'organisasi_id' => 'b32f7f41-0054-4854-8fae-c7fd4b65eb87',
//                'nama'          => 'Wire Kasme',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'b32f7f41-0054-4854-00001-c7fd4b65eb87',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'c67da767-da38-0001-9413-8ac77cb467b1',
//                'organisasi_id' => 'c67da767-da38-479a-9413-8ac77cb467b1',
//                'nama'          => 'Nurdji',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'c67da767-da38-479a-0001-8ac77cb467b1',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'ff71ccb2-f94a-0001-af47-9aa7f4d92d7a',
//                'organisasi_id' => 'ff71ccb2-f94a-48df-af47-9aa7f4d92d7a',
//                'nama'          => 'Junaidi',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'ff71ccb2-f94a-48df-0001-9aa7f4d92d7a',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '52b7465f-31d0-0001-ba20-fc5135106204',
//                'organisasi_id' => '52b7465f-31d0-483f-ba20-fc5135106204',
//                'nama'          => 'MUH. IBNUZIR, S.sos',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '52b7465f-31d0-483f-0001-fc5135106204',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'bc718b31-5ee1-0001-adc4-bab630ad606a',
//                'organisasi_id' => 'bc718b31-5ee1-4134-adc4-bab630ad606a',
//                'nama'          => 'Ramayadi, A.Ma',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'bc718b31-5ee1-4134-0001-bab630ad606a',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '404136cc-a91c-0001-b53a-4e559c357ac5',
//                'organisasi_id' => '404136cc-a91c-4cec-b53a-4e559c357ac5',
//                'nama'          => 'L. Bahrun',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '404136cc-a91c-4cec-0001-4e559c357ac5',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '16ea001a-4bcb-0001-a0e4-053e14b21bb0',
//                'organisasi_id' => '16ea001a-4bcb-4813-a0e4-053e14b21bb0',
//                'nama'          => 'H.L. Darmejun',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '16ea001a-4bcb-4813-0001-053e14b21bb0',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '91d0ea51-f8bb-0001-a80d-5c6629c7cc75',
//                'organisasi_id' => '91d0ea51-f8bb-46a1-a80d-5c6629c7cc75',
//                'nama'          => 'Abdul Rajak, SIP',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '91d0ea51-f8bb-46a1-0001-5c6629c7cc75',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'd86bc5ea-a929-0001-a23a-57f659ae1dc9',
//                'organisasi_id' => 'd86bc5ea-a929-4b8d-a23a-57f659ae1dc9',
//                'nama'          => 'Anwar Haris, SIP',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'd86bc5ea-a929-4b8d-0001-57f659ae1dc9',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '4eda99f0-7e28-0001-a2d8-9559a44d5e62',
//                'organisasi_id' => '4eda99f0-7e28-48b9-a2d8-9559a44d5e62',
//                'nama'          => 'Suburman',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '4eda99f0-7e28-48b9-0001-9559a44d5e62',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '59c13cc6-40ab-0001-ad3d-2c799f999e44',
//                'organisasi_id' => '59c13cc6-40ab-4afd-ad3d-2c799f999e44',
//                'nama'          => 'Muhamad Nasir',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '59c13cc6-40ab-4afd-0001-2c799f999e44',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '97e05d99-c682-0001-b87a-0f5de7f3099d',
//                'organisasi_id' => '97e05d99-c682-42d9-b87a-0f5de7f3099d',
//                'nama'          => 'Syamsun Rijal',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '97e05d99-c682-42d9-0001-0f5de7f3099d',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '33d6a365-fcac-0001-9f2c-59c3847c1e24',
//                'organisasi_id' => '33d6a365-fcac-427e-9f2c-59c3847c1e24',
//                'nama'          => 'Abdul Wahid, S.Pd',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '33d6a365-fcac-427e-0001-59c3847c1e24',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'e6665f24-e7e6-0001-b667-41bdecc4739e',
//                'organisasi_id' => 'e6665f24-e7e6-41ab-b667-41bdecc4739e',
//                'nama'          => 'H. Radiah S.Pd.I',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'e6665f24-e7e6-41ab-0001-41bdecc4739e',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'a0995ffd-4ef6-0001-b1fe-df6864ef04e4',
//                'organisasi_id' => 'a0995ffd-4ef6-4905-b1fe-df6864ef04e4',
//                'nama'          => 'H. Lalu Wirama Majas',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'a0995ffd-4ef6-4905-0001-df6864ef04e4',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '6a2a58d8-ba36-0001-865d-056ee886f745',
//                'organisasi_id' => '6a2a58d8-ba36-4156-865d-056ee886f745',
//                'nama'          => 'H. Zaenudin, S.Adm',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '6a2a58d8-ba36-4156-0001-056ee886f745',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'bbf8a7bb-8b10-0001-87ed-0df89a37d680',
//                'organisasi_id' => 'bbf8a7bb-8b10-4a7b-87ed-0df89a37d680',
//                'nama'          => 'Mohamad Mely, S.Pd.',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'bbf8a7bb-8b10-4a7b-0001-0df89a37d680',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '3d007bd0-3b01-0001-9296-8368a7470c67',
//                'organisasi_id' => '3d007bd0-3b01-49e7-9296-8368a7470c67',
//                'nama'          => 'Muhali',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '3d007bd0-3b01-49e7-0001-8368a7470c67',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '96d90835-ade1-0001-96fc-c9ac55ac9610',
//                'organisasi_id' => '96d90835-ade1-4636-96fc-c9ac55ac9610',
//                'nama'          => 'H. Husin jasman',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '96d90835-ade1-4636-0001-c9ac55ac9610',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'da79d376-c0d6-0001-ad7d-7e6089625844',
//                'organisasi_id' => 'da79d376-c0d6-407a-ad7d-7e6089625844',
//                'nama'          => 'Awal Afandi',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'da79d376-c0d6-407a-0001-7e6089625844',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'dce7f58e-9328-0001-aef5-2f538ae22a7b',
//                'organisasi_id' => 'dce7f58e-9328-420f-aef5-2f538ae22a7b',
//                'nama'          => 'Supriadi',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'dce7f58e-9328-420f-0001-2f538ae22a7b',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '2ae619e5-be6d-0001-99bd-c773ef7e58cb',
//                'organisasi_id' => '2ae619e5-be6d-4541-99bd-c773ef7e58cb',
//                'nama'          => 'Mustakim',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '2ae619e5-be6d-4541-0001-c773ef7e58cb',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '679e42d1-519d-0001-9150-72c145f05f80',
//                'organisasi_id' => '679e42d1-519d-46b3-9150-72c145f05f80',
//                'nama'          => 'Muhamad Tauhid, S.Ag.',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '679e42d1-519d-46b3-0001-72c145f05f80',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'f6381a82-8f54-0001-a74e-e60e913d362f',
//                'organisasi_id' => 'f6381a82-8f54-4d82-a74e-e60e913d362f',
//                'nama'          => 'Agus Samsilaturrahman, S.Pd.',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'f6381a82-8f54-4d82-0001-e60e913d362f',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '1cea62f3-c00d-0001-9532-4b095278c9ef',
//                'organisasi_id' => '1cea62f3-c00d-4a56-9532-4b095278c9ef',
//                'nama'          => 'Lalu Asroruddin, S.Pd.',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '1cea62f3-c00d-4a56-0001-4b095278c9ef',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '6b21d561-c19b-0001-b28e-c9eb4700f416',
//                'organisasi_id' => '6b21d561-c19b-4177-b28e-c9eb4700f416',
//                'nama'          => 'Rakyatulliwa uddin, S.Pd.I',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '6b21d561-c19b-4177-0001-c9eb4700f416',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '80b9a5e1-fd0d-0001-9b29-36e43f7fe07f',
//                'organisasi_id' => '80b9a5e1-fd0d-4da3-9b29-36e43f7fe07f',
//                'nama'          => 'Syamsudin, S.HI',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '80b9a5e1-fd0d-4da3-0001-36e43f7fe07f',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '99f466f6-a855-0001-b5ef-8c09b40a4264',
//                'organisasi_id' => '99f466f6-a855-48b6-b5ef-8c09b40a4264',
//                'nama'          => 'M. Saefuddin, SE',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '99f466f6-a855-48b6-0001-8c09b40a4264',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '1ef1f050-797f-0001-9ecf-65bab4da5537',
//                'organisasi_id' => '1ef1f050-797f-40ac-9ecf-65bab4da5537',
//                'nama'          => 'Mahyan',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '1ef1f050-797f-40ac-0001-65bab4da5537',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'c99be9ba-a598-0001-ad14-a1a6ec7e4c29',
//                'organisasi_id' => 'c99be9ba-a598-4237-ad14-a1a6ec7e4c29',
//                'nama'          => 'Jumali',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'c99be9ba-a598-4237-0001-a1a6ec7e4c29',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '9209f277-a3e4-0001-9933-674f78a93e5c',
//                'organisasi_id' => '9209f277-a3e4-4b74-9933-674f78a93e5c',
//                'nama'          => 'Sakarta, S.IP.',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '9209f277-a3e4-4b74-0001-674f78a93e5c',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'f9cdb2fc-0912-0001-b6a8-50cf557caa24',
//                'organisasi_id' => 'f9cdb2fc-0912-4a2c-b6a8-50cf557caa24',
//                'nama'          => 'Lalu Suparmanto',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'f9cdb2fc-0912-4a2c-0001-50cf557caa24',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '24fa17cf-c16c-0001-9d30-cd66db75e2e0',
//                'organisasi_id' => '24fa17cf-c16c-4309-9d30-cd66db75e2e0',
//                'nama'          => 'L. Sahril, SP',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '24fa17cf-c16c-4309-0001-cd66db75e2e0',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '3f72bd42-3aff-0001-8173-730f392c082f',
//                'organisasi_id' => '3f72bd42-3aff-44a2-8173-730f392c082f',
//                'nama'          => 'Arham',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '3f72bd42-3aff-44a2-0001-730f392c082f',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '276b5ce2-5a5d-0001-a6b4-8194bb46eced',
//                'organisasi_id' => '276b5ce2-5a5d-4ff4-a6b4-8194bb46eced',
//                'nama'          => 'kosong',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '276b5ce2-5a5d-4ff4-0001-8194bb46eced',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'd39db371-3f71-0001-9c9a-dcee6d901c24',
//                'organisasi_id' => 'd39db371-3f71-42b8-9c9a-dcee6d901c24',
//                'nama'          => 'Agus Agrianto, S.Pd',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'd39db371-3f71-42b8-0001-dcee6d901c24',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '6e64b805-642b-0001-b57c-c4961b5c0231',
//                'organisasi_id' => '6e64b805-642b-4cb7-b57c-c4961b5c0231',
//                'nama'          => 'Sahrianto',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '6e64b805-642b-4cb7-0001-c4961b5c0231',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '34a1e417-c20f-0001-8b39-a438151a8d54',
//                'organisasi_id' => '34a1e417-c20f-4bea-8b39-a438151a8d54',
//                'nama'          => 'H. M. Amin Abdullah, S.Ag.',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '34a1e417-c20f-4bea-0001-a438151a8d54',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '6e93cbf4-1a2d-0001-88a1-13e942f7c7c4',
//                'organisasi_id' => '6e93cbf4-1a2d-4bea-88a1-13e942f7c7c4',
//                'nama'          => 'L. Arsuman Khairuly, AM.KL',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '6e93cbf4-1a2d-4bea-0001-13e942f7c7c4',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'f00fcacc-2cf9-0001-b4a3-cf9892235c1f',
//                'organisasi_id' => 'f00fcacc-2cf9-4ab0-b4a3-cf9892235c1f',
//                'nama'          => 'H. Makbul Yasin',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'f00fcacc-2cf9-4ab0-0001-cf9892235c1f',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '938e9624-bc41-0001-a46d-e2dce722b17f',
//                'organisasi_id' => '938e9624-bc41-4285-a46d-e2dce722b17f',
//                'nama'          => 'zulkurnain',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '938e9624-bc41-4285-0001-e2dce722b17f',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'e634351a-2986-0001-b498-0c6272fdd4eb',
//                'organisasi_id' => 'e634351a-2986-4e61-b498-0c6272fdd4eb',
//                'nama'          => 'Lalu Ratmaji Hijrat',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'e634351a-2986-4e61-0001-0c6272fdd4eb',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'b06a1869-e241-0001-bcba-c50a2054e205',
//                'organisasi_id' => 'b06a1869-e241-4fbe-bcba-c50a2054e205',
//                'nama'          => 'Mansur, S.PdI',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'b06a1869-e241-4fbe-0001-c50a2054e205',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '48657ac7-8880-0001-ad89-21cc854b2b84',
//                'organisasi_id' => '48657ac7-8880-4e58-ad89-21cc854b2b84',
//                'nama'          => 'Habib',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '48657ac7-8880-4e58-0001-21cc854b2b84',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'e970b0f3-9636-0001-a32c-f711f0cada1a',
//                'organisasi_id' => 'e970b0f3-9636-4e4d-a32c-f711f0cada1a',
//                'nama'          => 'Ir. Harianto',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'e970b0f3-9636-4e4d-0001-f711f0cada1a',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '22c67cf3-52c6-0001-b5fd-48dfa750757e',
//                'organisasi_id' => '22c67cf3-52c6-47b6-b5fd-48dfa750757e',
//                'nama'          => 'Fahrurrozi',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '22c67cf3-52c6-47b6-0001-48dfa750757e',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '55c96da5-6687-0001-a9ed-73eb2b92839f',
//                'organisasi_id' => '55c96da5-6687-4e31-a9ed-73eb2b92839f',
//                'nama'          => 'M. Kasim, S.Pd',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '55c96da5-6687-4e31-0001-73eb2b92839f',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'aaea5df6-aedf-0001-95c9-cb53bcf4999b',
//                'organisasi_id' => 'aaea5df6-aedf-47b2-95c9-cb53bcf4999b',
//                'nama'          => 'Muksin',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'aaea5df6-aedf-47b2-0001-cb53bcf4999b',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '84685fa3-bb25-0001-a1b6-551f8d85ad2b',
//                'organisasi_id' => '84685fa3-bb25-4131-a1b6-551f8d85ad2b',
//                'nama'          => 'Sucipto',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '84685fa3-bb25-4131-0001-551f8d85ad2b',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '68b38946-2736-0001-89cf-c33022f7ea38',
//                'organisasi_id' => '68b38946-2736-4813-89cf-c33022f7ea38',
//                'nama'          => 'H. L. Husnul Mizan',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '68b38946-2736-4813-0001-c33022f7ea38',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '190efe82-a452-0001-a201-86bf1487336b',
//                'organisasi_id' => '190efe82-a452-4921-a201-86bf1487336b',
//                'nama'          => 'H.M. Zaenal Abidin',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '190efe82-a452-4921-0001-86bf1487336b',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '4b09b509-c84b-0001-a925-bd75f93d1601',
//                'organisasi_id' => '4b09b509-c84b-4953-a925-bd75f93d1601',
//                'nama'          => 'Adim',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '4b09b509-c84b-4953-0001-bd75f93d1601',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '6d03f3fc-e9e2-0001-9eb2-c95ff3ae1ad8',
//                'organisasi_id' => '6d03f3fc-e9e2-43dd-9eb2-c95ff3ae1ad8',
//                'nama'          => 'Zohri, SHI',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '6d03f3fc-e9e2-43dd-0001-c95ff3ae1ad8',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '7f4e4eab-389f-0001-ac2e-f69b90b52475',
//                'organisasi_id' => '7f4e4eab-389f-4740-ac2e-f69b90b52475',
//                'nama'          => 'M. Usman Gafar',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '7f4e4eab-389f-4740-0001-f69b90b52475',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '383e75f5-df38-0001-8592-f4fbed63b333',
//                'organisasi_id' => '383e75f5-df38-40bc-8592-f4fbed63b333',
//                'nama'          => 'Juanis Supriadi',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '383e75f5-df38-40bc-0001-f4fbed63b333',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '143cc9c3-b519-0001-b867-8bfd59e04a73',
//                'organisasi_id' => '143cc9c3-b519-4521-b867-8bfd59e04a73',
//                'nama'          => 'L. Harun',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '143cc9c3-b519-4521-0001-8bfd59e04a73',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '7e6d2f35-3c40-0001-bb20-e52e92381006',
//                'organisasi_id' => '7e6d2f35-3c40-4905-bb20-e52e92381006',
//                'nama'          => 'kosong',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '7e6d2f35-3c40-4905-0001-e52e92381006',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'e62ec590-de8d-0001-a9da-e487ca3ffeec',
//                'organisasi_id' => 'e62ec590-de8d-4fef-a9da-e487ca3ffeec',
//                'nama'          => 'Abdul Rahim, S.Ag, M.Pd I',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'e62ec590-de8d-4fef-0001-e487ca3ffeec',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '06a3e298-646f-0001-950c-569fc5b4ffed',
//                'organisasi_id' => '06a3e298-646f-4231-950c-569fc5b4ffed',
//                'nama'          => 'Mese',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '06a3e298-646f-4231-0001-569fc5b4ffed',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '08692412-9798-0001-a7af-728e3b97ed3c',
//                'organisasi_id' => '08692412-9798-4e9c-a7af-728e3b97ed3c',
//                'nama'          => 'Ilham nasrullah, SP',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '08692412-9798-4e9c-0001-728e3b97ed3c',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '9aa63509-6192-0001-9705-45773a4e3b50',
//                'organisasi_id' => '9aa63509-6192-4b03-9705-45773a4e3b50',
//                'nama'          => 'Rusman',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '9aa63509-6192-4b03-0001-45773a4e3b50',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '23db515e-1422-0001-bd89-4c0ad68c78ab',
//                'organisasi_id' => '23db515e-1422-432a-bd89-4c0ad68c78ab',
//                'nama'          => 'Anwar',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '23db515e-1422-432a-0001-4c0ad68c78ab',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '9fcbee4e-6315-0001-91c4-152440a5c55f',
//                'organisasi_id' => '9fcbee4e-6315-42f1-91c4-152440a5c55f',
//                'nama'          => 'H. Ahmad Harun Zain',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '9fcbee4e-6315-42f1-0001-152440a5c55f',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '38070340-1b42-0001-9178-51fe9d6a8089',
//                'organisasi_id' => '38070340-1b42-48ed-9178-51fe9d6a8089',
//                'nama'          => 'kosong',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '38070340-1b42-48ed-0001-51fe9d6a8089',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'fb8053d0-e2fd-0001-8128-c76456d0f5d6',
//                'organisasi_id' => 'fb8053d0-e2fd-4b6a-8128-c76456d0f5d6',
//                'nama'          => 'Ahmad Usman',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'fb8053d0-e2fd-4b6a-0001-c76456d0f5d6',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '6f66e386-2f68-0001-96c5-1c3de08573a3',
//                'organisasi_id' => '6f66e386-2f68-488a-96c5-1c3de08573a3',
//                'nama'          => 'H. L. Gita Isku',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '6f66e386-2f68-488a-0001-1c3de08573a3',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '897e9f48-5fb7-0001-bd0f-f823dc9ff196',
//                'organisasi_id' => '897e9f48-5fb7-4500-bd0f-f823dc9ff196',
//                'nama'          => 'Moh. Ipkan, S.Pd.',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '897e9f48-5fb7-4500-0001-f823dc9ff196',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '4d8e187b-492e-0001-91f1-ea3041d5f17e',
//                'organisasi_id' => '4d8e187b-492e-4fb3-91f1-ea3041d5f17e',
//                'nama'          => 'Muslehudin, S.PdI, M.Si',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '4d8e187b-492e-4fb3-0001-ea3041d5f17e',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => 'f47b1901-6f02-0001-b186-5b8972f0f87b',
//                'organisasi_id' => 'f47b1901-6f02-4152-b186-5b8972f0f87b',
//                'nama'          => 'Azharuddin',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => 'f47b1901-6f02-4152-0001-5b8972f0f87b',
//                'created_at'    => \Carbon\Carbon::now()
//            ],
//            [
//                '_id'           => '592123d2-670c-0001-a27b-d943a7a4d5d3',
//                'organisasi_id' => '592123d2-670c-409f-a27b-d943a7a4d5d3',
//                'nama'          => 'Sanah',
//                'fungsi'        => 'PKPKD',
//                'jabatan'       => 'Kepala Desa',
//                'level'         => 1,
//                'user_id'       => '592123d2-670c-409f-0001-d943a7a4d5d3',
//                'created_at'    => \Carbon\Carbon::now()
//            ],


        ];

        // insert batch
        DB::table('pejabat_desa')->insert($pejabat);
    }
} 