// A RESTful factory for retreiving dashboard_front from 'dashboard_front.json'
app.factory('dashboard_front', ['$http', function ($http) {
    return {

        getVisi: function (page) {
            //return $http.get('/api/v1/rpjmdes?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/rpjmdes?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getMisi: function (page) {
            return $http({
                method: 'get',
                url: '/api/v1/rpjmdes-misi?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getRPJMDes: function (page) {
            //return $http.get('/api/v1/rpjmdes-program?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/rpjmdes-program?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getRKPDes: function (page) {
            //return $http.get('/api/v1/rpjmdes-program?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/rkpdes?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getPendapatan: function (page) {
            //return $http.get('/api/v1/pendapatan?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/pendapatan?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
                //data: $.param(inputData)
            });
        },
        getBelanja: function (page) {
            //return $http.get('/api/v1/belanja?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/belanja?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getPembiayaan: function (page) {
            //return $http.get('/api/v1/pembiayaan?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/pembiayaan?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getTranPendapatan: function (page) {
            //return $http.get('/api/v1/pembiayaan?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/transaksi-pendapatan?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getTranBelanja: function (page) {
            //return $http.get('/api/v1/pembiayaan?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/transaksi-belanja?page=' + page,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getJumlahDokumen: function () {
            //return $http.get('/api/v1/rpjmdes?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/backoffice/dashboard/get-jumlah-dokumen-frontoffice',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        }

    }
}]);