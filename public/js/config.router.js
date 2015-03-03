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
                .otherwise('/app/dashboard');
            $stateProvider

                //routing application
                .state('app', {
                    abstract: true,
                    url: '/app',
                    templateUrl: 'views/app_backend.html'
                })

                //dashboard
                .state('app.dashboard', {
                    url: '/dashboard',
                    templateUrl: 'views/partials/dashboard/dashboard.html',
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(['../js/controllers/chart.js',
                                    'js/app/dashboard/dashboard.js',
                                    'js/app/dashboard/dashboard-service.js']);
                            }]
                    }
                })

                //Backoffice
                .state('app.backoffice', {
                    url: '/backoffice',
                    template: '<div ui-view class="fade-in-up"></div>'
                })

                //Organisasi
                .state('app.backoffice.pemerintah_desa', {
                    url: '/pemerintah_desa',
                    templateUrl: 'views/partials/masterdata/organisasi/organisasi.html',
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/masterdata/organisasi/organisasi.js',
                                        'js/app/masterdata/organisasi/organisasi-service.js'
                                    ]);
                            }]
                    }
                })

                .state('app.backoffice.detil_pemerintah_desa', {
                    url: '/detil_pemerintah_desa/:organisasi_id/:desa',
                    templateUrl: 'views/partials/masterdata/organisasi/organisasi-detil.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/masterdata/organisasi/organisasi-detil.js',
                                        'js/app/masterdata/organisasi/organisasi-detil-service.js'
                                    ]);
                            }]
                    }
                })

                .state('app.backoffice.detil_rpjmdes', {
                    url: '/detil_rpjmdes/:rpjmdes_id/:organisasi_id',
                    templateUrl: 'views/partials/masterdata/organisasi/rpjmdes_detil.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/masterdata/organisasi/rpjmdes_detil.js',
                                        'js/app/masterdata/organisasi/rpjmdes_detil-service.js'
                                    ]);
                            }]
                    }
                })

                //Backoffice User
                .state('app.backoffice.pengguna_desa', {
                    url: '/pengguna_desa',
                    templateUrl: 'views/partials/masterdata/user/user.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/masterdata/user/user.js',
                                        'js/app/masterdata/user/user-service.js'
                                    ]);
                            }]
                    }
                })


                //APBDES
                .state('app.apbdes', {
                    url: '/apbdes',
                    template: '<div ui-view class="fade-in-up"></div>'
                })

                //APBDes Akun
                .state('app.apbdes.akun', {
                    url: '/akun',
                    templateUrl: 'views/partials/apbdes/akun/akun.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/apbdes/akun/akun.js',
                                        'js/app/apbdes/akun/akun-service.js'
                                    ]);
                            }]
                    }
                })

                //APBDes Kelompok
                .state('app.apbdes.kelompok', {
                    url: '/kelompok',
                    templateUrl: 'views/partials/apbdes/kelompok/kelompok.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/apbdes/kelompok/kelompok.js',
                                        'js/app/apbdes/kelompok/kelompok-service.js'
                                    ]
                                );
                            }]
                    }
                })

                //APBDes Jenis
                .state('app.apbdes.jenis', {
                    url: '/jenis',
                    templateUrl: 'views/partials/apbdes/jenis/jenis.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/apbdes/jenis/jenis.js',
                                        'js/app/apbdes/jenis/jenis-service.js'
                                    ]);
                            }]
                    }
                })

                //APBDes Objek
                .state('app.apbdes.obyek', {
                    url: '/obyek',
                    templateUrl: 'views/partials/apbdes/obyek/obyek.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/apbdes/obyek/obyek.js',
                                        'js/app/apbdes/obyek/obyek-service.js'
                                    ]);
                            }]
                    }
                })

                //APBDes Rincian
                .state('app.apbdes.rincian', {
                    url: '/rincian',
                    templateUrl: 'views/partials/apbdes/rincian/rincian.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/apbdes/rincian/rincian.js',
                                        'js/app/apbdes/rincian/rincian-service.js'
                                    ]);
                            }]
                    }
                })
                //Akhir APBDes

                //Awal Kewenangan
                .state('app.kewenangan', {
                    url: '/kewenangan',
                    template: '<div ui-view class="fade-in-up"></div>'
                })

                //Kewenangan
                .state('app.kewenangan.kewenangan', {
                    url: '/kewenangan',
                    templateUrl: 'views/partials/kewenangan/kewenangan/kewenangan.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/kewenangan/kewenangan/kewenangan.js',
                                        'js/app/kewenangan/kewenangan/kewenangan-service.js'
                                    ]);
                            }]
                    }
                })

                //Kewenangan Fungsi
                .state('app.kewenangan.fungsi', {
                    url: '/fungsi',
                    templateUrl: 'views/partials/kewenangan/fungsi/fungsi.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/kewenangan/fungsi/fungsi.js',
                                        'js/app/kewenangan/fungsi/fungsi-service.js'
                                    ]);
                            }]
                    }
                })

                //Kewenangan Bidang
                .state('app.kewenangan.bidang', {
                    url: '/bidang',
                    templateUrl: 'views/partials/kewenangan/bidang/bidang.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/kewenangan/bidang/bidang.js',
                                        'js/app/kewenangan/bidang/bidang-service.js'
                                    ]);
                            }]
                    }
                })

                //kewenangan  program
                .state('app.kewenangan.program', {
                    url: '/program',
                    templateUrl: 'views/partials/kewenangan/program/program.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/kewenangan/program/program.js',
                                        'js/app/kewenangan/program/program-service.js'
                                    ]);
                            }]
                    }
                })

                //kewenangan kegiatan
                .state('app.kewenangan.kegiatan', {
                    url: '/kegiatan',
                    templateUrl: 'views/partials/kewenangan/kegiatan/kegiatan.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/kewenangan/kegiatan/kegiatan.js',
                                        'js/app/kewenangan/kegiatan/kegiatan-service.js'
                                    ]);
                            }]
                    }
                })

                //Belum verifikasi
                //Dokumen Verifikasi
                .state('app.verifikasi', {
                    url: '/verifikasi',
                    template: '<div ui-view class="fade-in-up"></div>'
                })

                //RPJM Desa
                .state('app.verifikasi.rpjmdes_program', {
                    url: '/rpjmdes_program',
                    templateUrl: 'views/partials/dokumen/rpjmdes_program/rpjmdes_program.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/dokumen/rpjmdes_program/rpjmdes_program.js',
                                        'js/app/dokumen/rpjmdes_program/rpjmdes_program-service.js'
                                    ]);
                            }]
                    }
                })

                //DPA
                .state('app.dpa', {
                    url: '/dpa',
                    template: '<div ui-view class="fade-in-up"></div>'
                })

                //DPA Pendapatan
                .state('app.dpa.pendapatan', {
                    url: '/pendapatan',
                    templateUrl: 'views/partials/dokumen/dpa/pendapatan/pendapatan.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/dokumen/dpa/pendapatan/pendapatan.js',
                                        'js/app/dokumen/dpa/pendapatan/pendapatan-service.js'
                                    ]);
                            }]
                    }
                })

                //DPA Belanja
                .state('app.dpa.belanja', {
                    url: '/belanja',
                    templateUrl: 'views/partials/dokumen/dpa/belanja/belanja.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/dokumen/dpa/belanja/belanja.js',
                                        'js/app/dokumen/dpa/belanja/belanja-service.js'
                                    ]);
                            }]
                    }
                })

                //DPA Pembiayaan
                .state('app.dpa.pembiayaan', {
                    url: '/pembiayaan',
                    templateUrl: 'views/partials/dokumen/dpa/pembiayaan/pembiayaan.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/dokumen/dpa/pembiayaan/pembiayaan.js',
                                        'js/app/dokumen/dpa/pembiayaan/pembiayaan-service.js'
                                    ]);
                            }]
                    }
                })

                //Sudah verifikasi
                //Dokumen Verifikasi
                .state('app.verifikasi_selesai', {
                    url: '/verifikasi_selesai',
                    template: '<div ui-view class="fade-in-up"></div>'
                })

                //RPJM Desa
                .state('app.verifikasi_selesai.rpjmdes_program', {
                    url: '/rpjmdes_program',
                    templateUrl: 'views/partials/dokumen/sudah/rpjmdes_program/rpjmdes_program.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/dokumen/sudah/rpjmdes_program/rpjmdes_program.js',
                                        'js/app/dokumen/sudah/rpjmdes_program/rpjmdes_program-service.js'
                                    ]);
                            }]
                    }
                })

                //DPA
                .state('app.dpa_selesai', {
                    url: '/dpa_selesai',
                    template: '<div ui-view class="fade-in-up"></div>'
                })

                //DPA Pendapatan
                .state('app.dpa_selesai.pendapatan', {
                    url: '/pendapatan',
                    templateUrl: 'views/partials/dokumen/sudah/dpa/pendapatan/pendapatan.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/dokumen/sudah/dpa/pendapatan/pendapatan.js',
                                        'js/app/dokumen/sudah/dpa/pendapatan/pendapatan-service.js'
                                    ]);
                            }]
                    }
                })

                //DPA Belanja
                .state('app.dpa_selesai.belanja', {
                    url: '/belanja',
                    templateUrl: 'views/partials/dokumen/sudah/dpa/belanja/belanja.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/dokumen/sudah/dpa/belanja/belanja.js',
                                        'js/app/dokumen/sudah/dpa/belanja/belanja-service.js'
                                    ]);
                            }]
                    }
                })

                //DPA Pembiayaan
                .state('app.dpa_selesai.pembiayaan', {
                    url: '/pembiayaan',
                    templateUrl: 'views/partials/dokumen/sudah/dpa/pembiayaan/pembiayaan.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/dokumen/sudah/dpa/pembiayaan/pembiayaan.js',
                                        'js/app/dokumen/sudah/dpa/pembiayaan/pembiayaan-service.js'
                                    ]);
                            }]
                    }
                })


                //Master
                .state('app.master', {
                    url: '/master',
                    template: '<div ui-view class="fade-in-up"></div>'
                })

                //Kecamatan
                .state('app.master.kecamatan', {
                    url: '/kecamatan',
                    templateUrl: 'views/partials/master/kecamatan/kecamatan.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/master/kecamatan/kecamatan.js',
                                        'js/app/master/kecamatan/kecamatan-service.js'
                                    ]);
                            }]
                    }
                })
                //User
                .state('app.master.user', {
                    url: '/user',
                    templateUrl: 'views/partials/pengaturan/user/user.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/pengaturan/user/user.js',
                                        'js/app/pengaturan/user/user-service.js'
                                    ]);
                            }]
                    }
                })
                //Sumber Dana
                .state('app.master.sumber_dana', {
                    url: '/sumber_dana',
                    templateUrl: 'views/partials/masterdata/sumber_dana/sumber_dana.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/masterdata/sumber_dana/sumber_dana.js',
                                        'js/app/masterdata/sumber_dana/sumber_dana-service.js'
                                    ]);
                            }]
                    }
                })

                //Satuan harga
                .state('app.master.satuan_harga', {
                    url: '/satuan_harga',
                    templateUrl: 'views/partials/masterdata/satuan_harga/satuan_harga.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/masterdata/satuan_harga/satuan_harga.js',
                                        'js/app/masterdata/satuan_harga/satuan_harga-service.js'
                                    ]);
                            }]
                    }
                })

                //Alokasi Dana
                .state('app.master.dana_desa', {
                    url: '/dana_desa',
                    templateUrl: 'views/partials/masterdata/dana_desa/dana_desa.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/masterdata/dana_desa/dana_desa.js',
                                        'js/app/masterdata/dana_desa/dana_desa-service.js'
                                    ]);
                            }]
                    }
                })

                //Profile
                .state('app.profil', {
                    url: '/profil',
                    template: '<div ui-view class="fade-in-up"></div>'
                })

                //Info
                .state('app.profil.info', {
                    url: '/info',
                    templateUrl: 'views/partials/profil/info/info.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/profil/info/info.js',
                                        'js/app/profil/info/info-service.js'
                                    ]);
                            }]
                    }
                })
                //Avatar
                .state('app.profil.avatar', {
                    url: '/avatar',
                    templateUrl: 'views/partials/profil/avatar/avatar.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad){
                                return $ocLazyLoad.load('ngImgCrop').then(
                                    function(){
                                        return $ocLazyLoad.load([
                                            'js/app/profil/avatar/avatar.js',
                                            'js/app/profil/avatar/avatar-service.js'
                                        ]);
                                    }
                                );
                            }]
                    }
                })
                //Password
                .state('app.profil.password', {
                    url: '/password',
                    templateUrl: 'views/partials/profil/password/password.html',
                    //use resolve to load other dependencies
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function ($ocLazyLoad) {
                                return $ocLazyLoad.load(
                                    [
                                        'js/app/profil/password/password.js',
                                        'js/app/profil/password/password-service.js'
                                    ]);
                            }]
                    }
                })
        }
    ]
);