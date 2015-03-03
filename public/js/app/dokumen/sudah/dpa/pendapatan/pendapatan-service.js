app.factory('sudah_dpa_pendapatan', ['$http', function ($http) {
    return {

        get: function (page, term) {
            //return $http.get('/api/v1/rpjmdes?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/find-finish-dpa-pendapatan?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        verifikasi: function (param) {
            return $http({
                method: 'post',
                url: '/api/v1/set-finish-pendapatan',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(param)
            })
        }
    }
}]);