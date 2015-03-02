'use strict';


// Declare app level module which depends on filters, and services
var app = angular.module('app', [
        'ngAnimate',
        'ngCookies',
        'ngStorage',
        'ui.router',
        'ui.bootstrap',
        'ui.load',
        'ui.jq',
        'ui.validate',
        'pascalprecht.translate',
        'app.filters',
        'app.services',
        'app.directives',
        'app.controllers',
        'ngProgressLite'
    ])
        .run(
        ['$rootScope', '$state', '$stateParams',
            function ($rootScope, $state, $stateParams) {
                $rootScope.$state = $state;
                $rootScope.$stateParams = $stateParams;
            }
        ]
    )
        .config(
        ['$stateProvider', '$urlRouterProvider', '$controllerProvider', '$compileProvider', '$filterProvider', '$provide',
            function ($stateProvider, $urlRouterProvider, $controllerProvider, $compileProvider, $filterProvider, $provide) {

                // lazy controller, directive and service
                app.controller = $controllerProvider.register;
                app.directive = $compileProvider.directive;
                app.filter = $filterProvider.register;
                app.factory = $provide.factory;
                app.service = $provide.service;
                app.constant = $provide.constant;
                app.value = $provide.value;
                app.factory('dashboard', ['$http', function ($http) {
                    return {
                        getUSession: function(){
                            //return $http.get('/api/v1/backoffice/get-session-user')
                            return $http({
                                method: 'get',
                                url: '/api/v1/backoffice/get-session-user',
                                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
                            });
                        }
                    }
                }]);

                $urlRouterProvider
                    .otherwise('/desa/dashboard');
                $stateProvider

                    // routing application
                    .state('desa', {
                        abstract: true,
                        url: '/desa',
                        templateUrl: 'views/front/app_backend.html'
                    })

//------------- Awal Dashboard
                    // dashboard
                    .state('desa.dashboard', {
                        url: '/dashboard',
                        templateUrl: 'views/front/partials/dashboard/dashboard.html',
                        resolve: {
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
                                        [
                                            'js/front/app/dashboard/dashboard.js',
                                            'js/front/app/dashboard/dashboard-service.js'
                                        ]);
                                }]
                        }
                    })
//------------- Akhir Dashboard

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
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
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
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
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
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
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
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
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
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
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
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
                                        [
                                            'js/front/app/rpjmdes/program/program.js',
                                            'js/front/app/rpjmdes/program/program-service.js'
                                        ]);
                                }]
                        }
                    })
                    .state('desa.rpjmdes.indikator', {
                        url: '/indikator/:program_id',
                        templateUrl: 'views/front/partials/rpjmdes/program/indikator.html',
                        // use resolve to load other dependencies
                        resolve: {
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
                                        [
                                            'js/front/app/rpjmdes/program/indikator.js',
                                            'js/front/app/rpjmdes/program/indikator-service.js'
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
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
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
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
                                        [
                                            'js/front/app/rkpdes/rkpdes-detil.js',
                                            'js/front/app/rkpdes/rkpdes-detil-service.js'
                                        ]);
                                }]
                        }
                    })

//-------------- Akhir RKP Desa

//------------- Akhir RPJM Desa

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
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
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
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
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
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
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
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
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
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
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
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
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
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
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
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
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
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
                                        [
                                            'js/front/app/dokumen/dpa/pembiayaan/pembiayaan.js',
                                            'js/front/app/dokumen/dpa/pembiayaan/pembiayaan-service.js'
                                        ]);
                                }]
                        }
                    })
//---------------- Akhir DPA Desa

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
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
                                        [
                                            'js/front/app/pengaturan/data_umum_desa/data_umum_desa.js',
                                            'js/front/app/pengaturan/data_umum_desa/data_umum_desa-service.js'
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
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
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
                            deps: ['uiLoad',
                                function (uiLoad) {
                                    return uiLoad.load(
                                        [
                                            'js/front/app/pengaturan/pejabat_desa/pejabat_desa.js',
                                            'js/front/app/pengaturan/pejabat_desa/pejabat_desa-service.js'
                                        ]);
                                }]
                        }
                    })
//---------------- Akhir Pengaturan

                    .state('404', {
                        url: '/404',
                        templateUrl: 'tpl/page_404.html'
                    })

            }
        ]
    )
        // config for ngProgress
        .config(['ngProgressLiteProvider', function (ngProgressLiteProvider) {
            ngProgressLiteProvider.settings.ease = 'ease-in';
        }])
        .config(['$translateProvider', function ($translateProvider) {

            // Register a loader for the static files
            // So, the module will search missing translation tables under the specified urls.
            // Those urls are [prefix][langKey][suffix].
            $translateProvider.useStaticFilesLoader({
                prefix: 'l10n/',
                suffix: '.json'
            });

            // Tell the module what language to use by default
            $translateProvider.preferredLanguage('en');

            // Tell the module to store the language in the local storage
            $translateProvider.useLocalStorage();

        }])

    /**
     * jQuery plugin config use ui-jq directive , config the js and css files that required
     * key: function name of the jQuery plugin
     * value: array of the css js file located
     */
        .constant('JQ_CONFIG', {
            easyPieChart: ['js/jquery/charts/easypiechart/jquery.easy-pie-chart.js'],
            sparkline: ['js/jquery/charts/sparkline/jquery.sparkline.min.js'],
            plot: ['js/jquery/charts/flot/jquery.flot.min.js',
                'js/jquery/charts/flot/jquery.flot.resize.js',
                'js/jquery/charts/flot/jquery.flot.tooltip.min.js',
                'js/jquery/charts/flot/jquery.flot.spline.js',
                'js/jquery/charts/flot/jquery.flot.orderBars.js',
                'js/jquery/charts/flot/jquery.flot.pie.min.js'],
            slimScroll: ['js/jquery/slimscroll/jquery.slimscroll.min.js'],
            sortable: ['js/jquery/sortable/jquery.sortable.js'],
            nestable: ['js/jquery/nestable/jquery.nestable.js',
                'js/jquery/nestable/nestable.css'],
            filestyle: ['js/jquery/file/bootstrap-filestyle.min.js'],
            slider: ['js/jquery/slider/bootstrap-slider.js',
                'js/jquery/slider/slider.css'],
            chosen: ['js/jquery/chosen/chosen.jquery.min.js',
                'js/jquery/chosen/chosen.css'],
            TouchSpin: ['js/jquery/spinner/jquery.bootstrap-touchspin.min.js',
                'js/jquery/spinner/jquery.bootstrap-touchspin.css'],
            wysiwyg: ['js/jquery/wysiwyg/bootstrap-wysiwyg.js',
                'js/jquery/wysiwyg/jquery.hotkeys.js'],
            dataTable: ['js/jquery/datatables/jquery.dataTables.min.js',
                'js/jquery/datatables/dataTables.bootstrap.js',
                'js/jquery/datatables/dataTables.bootstrap.css'],
            vectorMap: ['js/jquery/jvectormap/jquery-jvectormap.min.js',
                'js/jquery/jvectormap/jquery-jvectormap-world-mill-en.js',
                'js/jquery/jvectormap/jquery-jvectormap-us-aea-en.js',
                'js/jquery/jvectormap/jquery-jvectormap.css'],
            footable: ['js/jquery/footable/footable.all.min.js',
                'js/jquery/footable/footable.core.css']
        }
    )


        .constant('MODULE_CONFIG', {
            select2: ['js/jquery/select2/select2.css',
                'js/jquery/select2/select2-bootstrap.css',
                'js/jquery/select2/select2.min.js',
                'js/modules/ui-select2.js']
        }
    )
    ;