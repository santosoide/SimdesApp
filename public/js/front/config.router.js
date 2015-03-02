'use strict';

/**
 * Config for the router
 */
angular.module('app')
    .run(['$rootScope', '$state', '$stateParams',
        function ($rootScope, $state, $stateParams) {
            $rootScope.$state = $state;
            $rootScope.$stateParams = $stateParams;
        }
    ]
)
    .config(['$stateProvider', '$urlRouterProvider',
        function ($stateProvider, $urlRouterProvider) {

            $urlRouterProvider
                .otherwise('/desa/dashboard');
            $stateProvider

                // routing application
                .state('desa', {
                    abstract: true,
                    url: '/desa',
                    templateUrl: 'views/front/app_backend.html'
                })

                // dashboard
                .state('desa.dashboard', {
                    url: '/dashboard',
                    templateUrl: 'views/front/partials/dashboard/dashboard.html',
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(['../js/controllers/chart.js',
                                    'js/front/app/dashboard/dashboard.js',
                                    'js/front/app/dashboard/dashboard-service.js']);
                            }]
                    }
                })

                //------------- Awal RPJM Desa
                .state('desa.rpjmdes', {
                    url: '/rpjmdes',
                    template: '<div ui-view class="fade-in-up"></div>'
                })

                //APBDes Akun
                .state('desa.rpjmdes.visi', {
                    url: '/visi',
                    templateUrl: 'views/front/partials/rpjmdes/visi/visi.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/rpjmdes/visi/visi.js',
                                        'js/front/app/rpjmdes/visi/visi-service.js'
                                    ]);
                            }]
                    }
                })

                .state('desa.rpjmdes.misi', {
                    url: '/misi',
                    templateUrl: 'views/front/partials/rpjmdes/misi/misi.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/rpjmdes/misi/misi.js',
                                        'js/front/app/rpjmdes/misi/misi-service.js'
                                    ]);
                            }]

                    }
                })

                .state('desa.rpjmdes.masalah', {
                    url: '/masalah',
                    templateUrl: 'views/front/partials/rpjmdes/masalah/masalah.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/rpjmdes/masalah/masalah.js',
                                        'js/front/app/rpjmdes/masalah/masalah-service.js'
                                    ]);
                            }]
                    }
                })

                .state('desa.rpjmdes.potensi', {
                    url: '/potensi',
                    templateUrl: 'views/front/partials/rpjmdes/potensi/potensi.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/rpjmdes/potensi/potensi.js',
                                        'js/front/app/rpjmdes/potensi/potensi-service.js'
                                    ]);
                            }]
                    }
                })

                .state('desa.rpjmdes.pemetaan', {
                    url: '/pemetaan',
                    templateUrl: 'views/front/partials/rpjmdes/pemetaan/pemetaan.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/rpjmdes/pemetaan/pemetaan.js',
                                        'js/front/app/rpjmdes/pemetaan/pemetaan-service.js'
                                    ]);
                            }]
                    }
                })

                .state('desa.rpjmdes.program', {
                    url: '/program',
                    templateUrl: 'views/front/partials/rpjmdes/program/program.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/rpjmdes/program/program.js',
                                        'js/front/app/rpjmdes/program/program-service.js'
                                    ]);
                            }]
                    }
                })
                .state('desa.rpjmdes.lokasi', {
                    url: '/lokasi/:rpjmdes_program_id',
                    templateUrl: 'views/front/partials/rpjmdes/program/lokasi.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/rpjmdes/program/lokasi.js',
                                        'js/front/app/rpjmdes/program/lokasi-service.js'
                                    ]);
                            }]
                    }
                })

//-------------- Awal RKP Desa

                .state('desa.rkpdes', {
                    url: '/rkpdes',
                    templateUrl: 'views/front/partials/rkpdes/rkpdes.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/rkpdes/rkpdes.js',
                                        'js/front/app/rkpdes/rkpdes-service.js'
                                    ]);
                            }]
                    }
                })

                .state('desa.rkpdes_detil', {
                    url: '/desa.rkpdes_detil/:program_id',
                    templateUrl: 'views/front/partials/rkpdes/rkpdes-detil.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/rkpdes/rkpdes-detil.js',
                                        'js/front/app/rkpdes/rkpdes-detil-service.js'
                                    ]);
                            }]
                    }
                })

//-------------- Akhir RKP Desa

//------------- Awal Penganggaran
                .state('desa.penganggaran', {
                    url: '/penganggaran',
                    template: '<div ui-view class="fade-in-up"></div>'
                })

                //Pendapatan
                .state('desa.penganggaran.pendapatan', {
                    url: '/pendapatan',
                    templateUrl: 'views/front/partials/penganggaran/pendapatan/pendapatan.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/penganggaran/pendapatan/pendapatan.js',
                                        'js/front/app/penganggaran/pendapatan/pendapatan-service.js',
                                        'js/front/goto.min.js',
                                        'js/front/parseScripts.js'
                                    ]);
                            }]
                    }
                })

                //Belanja
                .state('desa.penganggaran.belanja', {
                    url: '/belanja',
                    templateUrl: 'views/front/partials/penganggaran/belanja/belanja.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/penganggaran/belanja/belanja.js',
                                        'js/front/app/penganggaran/belanja/belanja-service.js'
                                    ]);
                            }]
                    }
                })

                //Pembiayaan
                .state('desa.penganggaran.pembiayaan', {
                    url: '/pembiayaan',
                    templateUrl: 'views/front/partials/penganggaran/pembiayaan/pembiayaan.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/penganggaran/pembiayaan/pembiayaan.js',
                                        'js/front/app/penganggaran/pembiayaan/pembiayaan-service.js'
                                    ]);
                            }]
                    }
                })
//--------------- Akhir Penganggaran


//--------------- Awal RKA Desa
                .state('desa.rka', {
                    url: '/rka',
                    template: '<div ui-view class="fade-in-up"></div>'
                })
                //Pendapatan
                .state('desa.rka.pendapatan', {
                    url: '/pendapatan',
                    templateUrl: 'views/front/partials/dokumen/rka/pendapatan/pendapatan.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/dokumen/rka/pendapatan/pendapatan.js',
                                        'js/front/app/dokumen/rka/pendapatan/pendapatan-service.js'
                                    ]);
                            }]
                    }
                })

                //Belanja
                .state('desa.rka.belanja', {
                    url: '/belanja',
                    templateUrl: 'views/front/partials/dokumen/rka/belanja/belanja.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/dokumen/rka/belanja/belanja.js',
                                        'js/front/app/dokumen/rka/belanja/belanja-service.js'
                                    ]);
                            }]
                    }
                })

                //Pembiayaan
                .state('desa.rka.pembiayaan', {
                    url: '/pembiayaan',
                    templateUrl: 'views/front/partials/dokumen/rka/pembiayaan/pembiayaan.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/dokumen/rka/pembiayaan/pembiayaan.js',
                                        'js/front/app/dokumen/rka/pembiayaan/pembiayaan-service.js'
                                    ]);
                            }]
                    }
                })
//---------------- Akhir RKA Desa

//---------------- Awal DPA Desa
                .state('desa.dpa', {
                    url: '/dpa',
                    template: '<div ui-view class="fade-in-up"></div>'
                })
                //Pendapatan
                .state('desa.dpa.pendapatan', {
                    url: '/pendapatan',
                    templateUrl: 'views/front/partials/dokumen/dpa/pendapatan/pendapatan.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/dokumen/dpa/pendapatan/pendapatan.js',
                                        'js/front/app/dokumen/dpa/pendapatan/pendapatan-service.js'
                                    ]);
                            }]
                    }
                })

                //Belanja
                .state('desa.dpa.belanja', {
                    url: '/belanja',
                    templateUrl: 'views/front/partials/dokumen/dpa/belanja/belanja.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/dokumen/dpa/belanja/belanja.js',
                                        'js/front/app/dokumen/dpa/belanja/belanja-service.js'
                                    ]);
                            }]
                    }
                })

                //Pembiayaan
                .state('desa.dpa.pembiayaan', {
                    url: '/pembiayaan',
                    templateUrl: 'views/front/partials/dokumen/dpa/pembiayaan/pembiayaan.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/dokumen/dpa/pembiayaan/pembiayaan.js',
                                        'js/front/app/dokumen/dpa/pembiayaan/pembiayaan-service.js'
                                    ]);
                            }]
                    }
                })
//---------------- Akhir DPA Desa

//---------------- Awal APBDesa
                .state('desa.apbdes', {
                    url: '/apbdes',
                    template: '<div ui-view class="fade-in-up"></div>'
                })
                //Obyek
                .state('desa.apbdes.obyek', {
                    url: '/obyek',
                    templateUrl: 'views/front/partials/struktur/apbdes/obyek/obyek.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/struktur/apbdes/obyek/obyek.js',
                                        'js/front/app/struktur/apbdes/obyek/obyek-service.js'
                                    ]);
                            }]
                    }
                })

                //Rincian
                .state('desa.apbdes.rincian', {
                    url: '/rincian',
                    templateUrl: 'views/front/partials/struktur/apbdes/rincian/rincian.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/struktur/apbdes/rincian/rincian.js',
                                        'js/front/app/struktur/apbdes/rincian/rincian-service.js'
                                    ]);
                            }]
                    }
                })
//---------------- Akhir APBdesa

//---------------- Awal Kewenangan
                .state('desa.kewenangan', {
                    url: '/kewenangan',
                    template: '<div ui-view class="fade-in-up"></div>'
                })
                //Obyek
                .state('desa.kewenangan.program', {
                    url: '/program',
                    templateUrl: 'views/front/partials/struktur/kewenangan/program/program.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/struktur/kewenangan/program/program.js',
                                        'js/front/app/struktur/kewenangan/program/program-service.js'
                                    ]);
                            }]
                    }
                })

                //Rincian
                .state('desa.kewenangan.kegiatan', {
                    url: '/kegiatan',
                    templateUrl: 'views/front/partials/struktur/kewenangan/kegiatan/kegiatan.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/struktur/kewenangan/kegiatan/kegiatan.js',
                                        'js/front/app/struktur/kewenangan/kegiatan/kegiatan-service.js'
                                    ]);
                            }]
                    }
                })
//---------------- Akhir Kewenangan

                .state('desa.dana', {
                    url: '/dana',
                    templateUrl: 'views/front/partials/struktur/dana/dana.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/struktur/dana/dana.js',
                                        'js/front/app/struktur/dana/dana-service.js'
                                    ]);
                            }]
                    }
                })

//---------------- Awal Pengaturan
                .state('desa.pengaturan', {
                    url: '/pengaturan',
                    template: '<div ui-view class="fade-in-up"></div>'
                })
                //Data Umum Desa
                .state('desa.pengaturan.data_umum_desa', {
                    url: '/data_umum_desa',
                    templateUrl: 'views/front/partials/pengaturan/data_umum_desa/data_umum_desa.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/pengaturan/data_umum_desa/data_umum_desa.js',
                                        'js/front/app/pengaturan/data_umum_desa/data_umum_desa-service.js'
                                    ]);
                            }]
                    }
                })
                //Password
                .state('desa.pengaturan.password', {
                    url: '/password',
                    templateUrl: 'views/front/partials/pengaturan/password/password.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/pengaturan/password/password.js',
                                        'js/front/app/pengaturan/password/password-service.js'
                                    ]);
                            }]
                    }
                })

                //Pengguna
                .state('desa.pengaturan.pengguna', {
                    url: '/pengguna',
                    templateUrl: 'views/front/partials/pengaturan/pengguna/pengguna.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/pengaturan/pengguna/pengguna.js',
                                        'js/front/app/pengaturan/pengguna/pengguna-service.js'
                                    ]);
                            }]
                    }
                })

                //Pejabat Desa
                .state('desa.pengaturan.pejabat_desa', {
                    url: '/pejabat_desa',
                    templateUrl: 'views/front/partials/pengaturan/pejabat_desa/pejabat_desa.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/pengaturan/pejabat_desa/pejabat_desa.js',
                                        'js/front/app/pengaturan/pejabat_desa/pejabat_desa-service.js'
                                    ]);
                            }]
                    }
                })
//---------------- Akhir Pengaturan

//---------------- Awal Penaausahaan

                //Penerimaan
                .state('desa.terima', {
                    url: '/terima',
                    template: '<div ui-view class="fade-in-up"></div>'
                })
                //Transaksi
                .state('desa.terima.transaksi', {
                    url: '/transaksi',
                    templateUrl: 'views/front/partials/usaha/masuk/transaksi/transaksi.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/usaha/masuk/transaksi/transaksi.js',
                                        'js/front/app/usaha/masuk/transaksi/transaksi-service.js'
                                    ]);
                            }]
                    }
                })
                //Mutasi
                .state('desa.terima.mutasi', {
                    url: '/mutasi',
                    templateUrl: 'views/front/partials/usaha/masuk/mutasi/mutasi.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/usaha/masuk/mutasi/mutasi.js',
                                        'js/front/app/usaha/masuk/mutasi/mutasi-service.js'
                                    ]);
                            }]
                    }
                })
                //Bukti
                .state('desa.terima.bukti', {
                    url: '/bukti',
                    templateUrl: 'views/front/partials/usaha/masuk/bukti/bukti.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/usaha/masuk/bukti/bukti.js',
                                        'js/front/app/usaha/masuk/bukti/bukti-service.js'
                                    ]);
                            }]
                    }
                })

                //Pengeluaran
                .state('desa.keluar', {
                    url: '/keluar',
                    template: '<div ui-view class="fade-in-up"></div>'
                })
                //Transaksi
                .state('desa.keluar.transaksi', {
                    url: '/transaksi',
                    templateUrl: 'views/front/partials/usaha/keluar/transaksi/transaksi.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/usaha/keluar/transaksi/transaksi.js',
                                        'js/front/app/usaha/keluar/transaksi/transaksi-service.js'
                                    ]);
                            }]
                    }
                })
                //Mutasi
                .state('desa.keluar.mutasi', {
                    url: '/mutasi',
                    templateUrl: 'views/front/partials/usaha/keluar/mutasi/mutasi.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/usaha/keluar/mutasi/mutasi.js',
                                        'js/front/app/usaha/keluar/mutasi/mutasi-service.js'
                                    ]);
                            }]
                    }
                })
                //Bukti
                .state('desa.keluar.bukti', {
                    url: '/bukti',
                    templateUrl: 'views/front/partials/usaha/keluar/bukti/bukti.html',
                    // use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/front/app/usaha/keluar/bukti/bukti.js',
                                        'js/front/app/usaha/keluar/bukti/bukti-service.js'
                                    ]);
                            }]
                    }
                })

                .state('404', {
                    url: '/404',
                    templateUrl: 'tpl/page_404.html'
                })
        }
    ]
);