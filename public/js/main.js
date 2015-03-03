'use strict';

/* Controllers */
app.factory('main', ['$http', function ($http) {
    return {
        getusession: function () {
            return $http({
                method: 'get',
                url: '/api/v1/backoffice/get-session-user',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        }
    }
}]);
angular.module('app')
    .controller('AppCtrl', ['$scope', '$translate', '$localStorage', '$window', 'ngProgressLite', '$timeout', '$attrs', 'main',
        function ($scope, $translate, $localStorage, $window, ngProgressLite, $timeout, $attrs, main) {
            $scope.userdata = {};
            main.getusession()
                .success(function (data) {
                    $scope.userdata = data;
                });

            $scope.getfromsession =
                // set csrf_token
                $scope.csrf = $attrs.csrf;

            $scope.sup = function () {
                $("html, body").animate({
                    scrollTop: 0
                }, "slow");
            };

            $scope.convertToRupiah = function (angka) {
                var rupiah = '';
                var angkarev = angka.toString().split('').reverse().join('');
                for (var i = 0; i < angkarev.length; i++) if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
                return rupiah.split('', rupiah.length - 1).reverse().join('');
            };

            // ngProgress
            $scope.show = 0;
            ngProgressLite.start();
            $timeout(function () {
                ngProgressLite.done();
                $scope.show = 1;
            }, 1500);

            $scope.set = function () {
                ngProgressLite.set(0.4);
            };

            $scope.start = function () {
                ngProgressLite.start();
            };

            $scope.inc = function () {
                ngProgressLite.inc();
            };

            $scope.done = function () {
                ngProgressLite.done();
            };

            // redirect if unauthorized
            $scope.redirect = function (data) {
                if (data.action == 'redirect') {
                    window.location = "/" + data.path;
                }
            };
            // add 'ie' classes to html
            var isIE = !!navigator.userAgent.match(/MSIE/i);
            isIE && angular.element($window.document.body).addClass('ie');
            isSmartDevice($window) && angular.element($window.document.body).addClass('smart');

            // config
            $scope.app = {
                name: 'SIPKDes',
                logo: 'img/logo.png',
                title: 'SIPKDes - Lombok Tengah',
                copy: '2015',
                footer: 'Sistem Informasi Pengelolaan Keuangan Desa - Lombok Tengah',
                header: 'KABUPATEN LOMBOK TENGAH',
                version: '2.0.0',
                // for chart colors
                color: {
                    primary: '#7266ba',
                    info: '#23b7e5',
                    success: '#27c24c',
                    warning: '#fad733',
                    danger: '#f05050',
                    light: '#e8eff0',
                    dark: '#3a3f51',
                    black: '#1c2b36'
                },
                settings: {

                    themeID: 1,
                    navbarHeaderColor: 'bg-black',
                    navbarCollapseColor: 'bg-white-only',
                    asideColor: 'bg-black',
                    headerFixed: true,
                    asideFixed: true,
                    asideFolded: false,
                    asideDock: false,
                    container: false
                }
            }

            // save settings to local storage
            if (angular.isDefined($localStorage.settings)) {
                $scope.app.settings = $localStorage.settings;
            } else {
                $localStorage.settings = $scope.app.settings;
            }
            $scope.$watch('app.settings', function () {
                if ($scope.app.settings.asideDock && $scope.app.settings.asideFixed) {
                    // aside dock and fixed must set the header fixed.
                    $scope.app.settings.headerFixed = true;
                }
                // save to local storage
                $localStorage.settings = $scope.app.settings;
            }, true);

            // angular translate
            $scope.lang = {isopen: false};
            $scope.langs = {en: 'English', de_DE: 'German', it_IT: 'Italian', id: 'Indonesian'};
            $scope.selectLang = $scope.langs[$translate.proposedLanguage()] || "English";
            $scope.setLang = function (langKey, $event) {
                // set the current lang
                $scope.selectLang = $scope.langs[langKey];
                // You can change the language during runtime
                $translate.use(langKey);
                $scope.lang.isopen = !$scope.lang.isopen;
            };

            function isSmartDevice($window) {
                // Adapted from http://www.detectmobilebrowsers.com
                var ua = $window['navigator']['userAgent'] || $window['navigator']['vendor'] || $window['opera'];
                // Checks for iOs, Android, Blackberry, Opera Mini, and Windows mobile devices
                return (/iPhone|iPod|iPad|Silk|Android|BlackBerry|Opera Mini|IEMobile/).test(ua);
            }

        }]);