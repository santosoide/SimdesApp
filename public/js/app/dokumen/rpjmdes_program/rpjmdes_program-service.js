app.factory('rpjmdes_program', ['$http', function ($http) {
    return {

        get: function (page, term) {
            //return $http.get('/api/v1/rpjmdes?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/find-not-finish-rpjmdes-program?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        show: function (id) {
            //return $http.get('/api/v1/rpjmdes?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/rpjmdes-program/' + id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        getFinished: function (page, term) {
            //return $http.get('/api/v1/rpjmdes?page=' + page + '&term=' + term);
            return $http({
                method: 'get',
                url: '/api/v1/find-finish-rpjmdes-program?page=' + page + '&term=' + term,
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'}
            });
        },
        request: function (param) {
            return $http({
                method: 'post',
                url: '/api/v1/request-finish-rpjmdes-program',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(param)
            })
        },
        setProgram: function (param) {
            return $http({
                method: 'post',
                url: '/api/v1/set-rpjmdes-program',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
                data: $.param(param)
            })
        }
    }
}]);